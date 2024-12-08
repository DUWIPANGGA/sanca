<!-- Input Content -->
@extends('layouts.app')

@section('title', 'Create a Post')

@section('content')
    <div class="container-fluid h-100 ">
        <div class="row">
            @include('admin.sidebar')

            <div class="col" style="overflow-x: auto; height:92vh;padding-bottom: 5rem;">
                <div class="container h-100 w-100" style=" height:100px;padding-bottom: 5rem;">
                    <h1>Create a Post</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ $article->id }}">
                        <div class="mb-3">
                            <label for="picture_article" class="form-label">Picture</label>
                            <input type="file" id="picture_article" name="picture_article" class="form-control" @if(!$article->picture_article) required @endif>
                        </div>
                        <!-- Input Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" id="title" name="title" class="form-control"
                                value="{{ $article->judul }}" required>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Content -->
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <!-- Hidden input untuk menyimpan data -->
                            <input id="content" type="hidden" name="content" value="{{ $article->content }}" required>
                            <!-- Trix Editor -->
                            <div class="more-stuff-inbetween"></div>
                            <trix-toolbar id="my_toolbar"></trix-toolbar>
                            <trix-editor toolbar="my_toolbar" input="content" class=""
                                style="height: 50vh" ></trix-editor>
                            @error('content')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
