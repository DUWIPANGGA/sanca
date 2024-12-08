<!-- Input Content -->
@extends('layouts.app')

@section('title', 'Create a Post')

@section('content')
    <div class="container-fluid h-100 ">
        <div class="row">
            @include('admin.sidebar')

            <div class="col" style="overflow-x: auto; height:92vh;padding-bottom: 5rem;">
                <div class="container h-100 w-100" style=" height:100px;padding-bottom: 5rem;">
                        <h1>List of Articles</h1>
                    
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                    
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Picture</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($articles as $article)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $article->judul }}</td>
                                        <td>{{ Str::limit(strip_tags($article->content, 50)) }}</td>
                                        <td>
                                            @if ($article->picture_article)
                                                <img src="{{ asset('storage/' . $article->picture_article) }}" alt="Picture" style="width: 100px;">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('article.update', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('article.destroy', $article->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No articles found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    {{-- @endsection --}}
                </div>
            </div>
        </div>
    </div>
@endsection
