<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #8A92FF, #C7D2FE);
        }

        .register-container {
            display: grid;
            grid-template-columns: 1fr;
            height: 100vh;
            justify-items: center;
            align-items: center;
        }

        .register-card {
            background: #4A56E2;
            padding: 30px 50px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            color: #fff;
        }

        .register-card h1 {
            font-size: 28px;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: #4A56E2;
            outline: none;
        }

        .register-btn {
            background: linear-gradient(to right, #4A56E2, #6A75F0);
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s, transform 0.3s;
        }

        .register-btn:hover {
            background: linear-gradient(to right, #6A75F0, #4A56E2);
            transform: scale(1.05);
        }

        .footer {
            background: #4A56E2;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .login-link {
            font-size: 14px;
            color: #C7D2FE;
            text-align: center;
            display: block;
            margin-top: 10px;
        }

        .login-link:hover {
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="register-container">

        <div class="register-card">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1>Register</h1>

            <form method="POST" action="/register">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <!-- Name Field -->
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" type="text" class="form-control" name="name" required
                        autocomplete="name" autofocus>
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" type="email" class="form-control" name="email" required
                        autocomplete="email">
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required
                        autocomplete="new-password">
                </div>

                <!-- Confirm Password Field -->
                <div class="form-group">
                    <label for="password-confirm" class="form-label">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="register-btn">Register</button>
            </form>

            <a href="/login" class="login-link">Already have an account? Login here</a>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2023 Your Company. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
