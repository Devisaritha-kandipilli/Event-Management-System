<!DOCTYPE html>
<html lang="en">
<head>
<title> Eventrix | Create Account</title>
    <!-- Your head content here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add any additional CSS styles here -->
    <style>
        /* Center the form vertically and horizontally */
        .centered-form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* This ensures the form is centered vertically on the entire viewport height. */
        }
    </style>
	<link rel="shortcut icon" href="./dist/img/eventrix.png">
        <link rel="icon" href="./dist/img/eventrix.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="row centered-form">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Create an Account</h2>
                        <form action="user.php" method="post" onsubmit="return validateForm()";>
                                     <div class="form-group">
                                <label for="new_username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="New Username" required>
                            </div>
                            <div class="form-group">
                                <label for="new_password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="New Password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;

            if (password !== confirm_password) {
                alert("Password and Confirm Password must match.");
                return false;
            }
            return true;
        }
    </script>

</body>
</html>