<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Dark Theme Styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dark-theme {
            background-color: #343a40;
            color: white;
        }
        .card {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>

<!-- Navbar (optional) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Admin Dashboard</a>
</nav>

<!-- Profile Page -->
<div class="container py-5">
    <h2 class="text-center mb-5">Profile</h2>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <!-- Profile Information Section -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5>Update Profile Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        <!-- Form Fields -->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>

            <!-- Password Update Section -->
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <h5>Update Password</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <!-- Form Fields -->
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation">Confirm New Password</label>
                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-warning">Update Password</button>
                    </form>
                </div>
            </div>

            <!-- Delete User Section -->
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h5>Delete Account</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.destroy') }}" method="POST">
                        @method('delete')
                        @csrf
                        <!-- Delete Confirmation -->
                        <p>Are you sure you want to delete your account?</p>
                        <button type="submit" class="btn btn-danger">Delete Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
