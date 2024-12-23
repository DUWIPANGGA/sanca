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
                    <div class="position-relative">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">Add
                            User</button>
                        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog"
                            aria-labelledby="addUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('user.create') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select class="form-control" id="role" name="role" required>
                                                    <option value="">Select Role</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="user">User</option>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>ID</th>
                                <th>nama</th>
                                <th>email</th>
                                {{-- <th>Picture</th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($item as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    {{-- <td>
                                            @if ($article->picture_article)
                                                <img src="{{ asset('storage/' . $article->picture_article) }}" alt="Picture" style="width: 100px;">
                                            @else
                                                No Image
                                            @endif
                                        </td> --}}
                                    <td>
                                        <a href="{{ route('user.edit', $user->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">Delete</button>
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
