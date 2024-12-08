@extends('layouts.app')

@section('content')
<div class="contact_link_box " >
    <div class="row justify-content-center">
        <div class="col-md-8 ">
                <div class="card-body p-5 shadow-lg" style="background-color: rgb(37, 150, 190); border-radius: 5rem;">
                    <h1 class="text-center mb-4 text-light font-weight-bold">Login</h1> <!-- Added Title -->
            
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
            
                        <!-- Email Field -->
                        <div class="row mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
            
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <!-- Password Field -->
                        <div class="row mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
            
                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror custom-input" name="password" required autocomplete="current-password">
            
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <!-- Remember Me Checkbox -->
                        <div class="row mb-3">
                            <div class="col-md-8 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
            
                        <!-- Submit Button -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success px-5 py-2">
                                    {{ __('Login') }}
                                </button>
            
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-decoration-none text-primary" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
            </div>
            
        </div>
    </div>
</div>
@endsection
