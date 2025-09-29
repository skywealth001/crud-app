<?php include '../config/config.php'; 
redirectIfAuth();
?>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $username]);
    $user = $stmt->fetch();
    
    if($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        
        header("Location:../pages/dashboard.php");
        exit();
    } else {
        $error = "Invalid username/email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CrudOps</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card card">
            <h2 style="text-align: center; margin-bottom: 2rem;">Welcome Back</h2>
            
            <?php if(isset($_SESSION['success'])): ?>
                <div class="message success">
                    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>
            
            <?php if(isset($error)): ?>
                <div class="message error">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="form-group">
                    <label class="form-label">Username or Email</label>
                    <input type="text" name="username" class="form-input" value="<?php echo $_POST['username'] ?? ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-input" required>
                </div>
                
                <div style="text-align: right; margin-bottom: 1.5rem;">
                    <a href="../pages/reset-password.php" style="color: var(--primary); text-decoration: none;">Forgot Password?</a>
                </div>
                
                <button type="submit" class="btn btn-primary" style="width: 100%;">Sign In</button>
            </form>
            
            <p style="text-align: center; margin-top: 2rem;">
                Don't have an account? <a href="../pages/register.php">Create one here</a>
            </p>
        </div>
    </div>

    <script src="../assets/js/theme.js"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>