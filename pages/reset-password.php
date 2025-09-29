<?php include '../config/config.php';
redirectIfAuth();

// password reset
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - CrudOps</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card card">
            <h2 style="text-align: center; margin-bottom: 2rem;">Reset Password</h2>
            
            <div class="message" style="background: #fef3c7; color: #92400e; border-left-color: #f59e0b;">
                <p>Password reset functionality requires email integration. Contact administrator for assistance.</p>
            </div>
            
            <form method="POST">
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-input" required>
                </div>
                
                <button type="submit" class="btn btn-primary" style="width: 100%;" disabled>Send Reset Link</button>
            </form>
            
            <p style="text-align: center; margin-top: 2rem;">
                <a href="../pages/login.php">Back to Login</a>
            </p>
        </div>
    </div>

    <script src="../assets/js/theme.js"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>