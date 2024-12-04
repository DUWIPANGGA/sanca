<x-guest-layout>
    
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="card mx-auto mt-5 p-4 shadow-lg rounded" style="max-width: 500px;">
        <div class="card-body">
            <h2 class="text-center text-primary font-weight-bold mb-4">Reset Password</h2>
            
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
    
                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="form-label text-muted">{{ __('Email Address') }}</label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        class="form-control custom-input @error('email') is-invalid @enderror" 
                        :value="old('email')" 
                        required 
                        autofocus
                    >
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
    
                <!-- Submit Button -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-gradient btn-lg">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    
</x-guest-layout>
