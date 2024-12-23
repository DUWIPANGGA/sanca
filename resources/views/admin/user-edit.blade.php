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

                    <form action="{{ route('user.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
    @csrf
    @method('put')
    <div class="form-group">
        <input type="hidden" name="id" value="{{ $item->id }}">
    </div>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $item->name }}" class="form-control" required>
        <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $item->email }}" class="form-control" required>
        <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" value="" class="form-control" required>
        <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
        <label for="role">Role:</label>
        <select name="role" class="form-control" required>
            <option value="admin" {{ $item->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="user" {{ $item->role == 'user' ? 'selected' : '' }}>User</option>
        </select>
        <div class="invalid-feedback">Please select a role.</div>
    </div>
    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
                </div>
            </div>
        </div>
    </div>
@endsection
