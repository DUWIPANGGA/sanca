<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #8A92FF, #C7D2FE);
        }

        .login-container {
            display: grid;
            grid-template-columns: 1fr;
            height: 100vh;
            justify-items: center;
            align-items: center;
        }

        .login-card {
            background: #4A56E2;
            padding: 30px 50px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            color: #fff;
        }

        .login-card h1 {
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

        .login-btn {
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

        .login-btn:hover {
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

        .forgot-password {
            font-size: 14px;
            color: #C7D2FE;
            text-align: center;
            display: block;
            margin-top: 10px;
        }

        .forgot-password:hover {
            color: #fff;
        }

        .register-link {
            font-size: 14px;
            color: #C7D2FE;
            display: block;
            margin-top: 10px;
            text-align: center;
        }

        .register-link:hover {
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <h1>Login</h1>

            <form method="POST" action="/login">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus>
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                </div>

                <!-- Remember Me Checkbox -->
                <div class="form-group">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="login-btn">Login</button>
            </form>

            <a href="/password/request" class="forgot-password">Forgot Your Password?</a>
            <a href="/register" class="register-link">Don't have an account? Register here</a>
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
