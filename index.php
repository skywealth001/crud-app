<?php include 'config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster - Professional CRUD Application</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="header">
        <nav class="nav container">
            <div class="logo">CrudOps</div>
            <div class="nav-links">
                <?php if(isset($_SESSION['user_id'])): ?>
                    <a href="pages/dashboard.php" class="nav-link">Dashboard</a>
                    <a href="pages/profile.php" class="nav-link">Profile</a>
                    <a href="pages/logout.php" class="nav-link">Logout</a>
                <?php else: ?>
                    <a href="pages/login.php" class="nav-link">Login</a>
                    <a href="pages/register.php" class="btn btn-primary">Get Started</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Master CRUD operations with CrudOps</h1>
                <p class="hero-subtitle">Every modern web Application relies on four core operations known as <b>CRUD.</b></p>
                <div class="hero-actions">
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <a href="pages/dashboard.php" class="btn btn-primary">Go to Dashboard</a>
                    <?php else: ?>
                        <a href="pages/register.php" class="btn btn-primary">Start Free Trial</a>
                    
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="container" style="padding: 100px 0;">
        <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 3rem;"> What is CRUD?</h2>
        <div class="features-grid">
            <div class="feature-card card">
                <div class="feature-icon">📝</div>
                <h3>Create</h3>
                <p>This means adding new records or information to the system, like registering a new user or creating a task.</p>
            </div>
            <div class="feature-card card">
                <div class="feature-icon">📖</div>
                <h3>Read</h3>
                <p>This is about viewing or retrieving stored data, such as checking a profile, looking at list of items, or reading details.</p>
            </div>
            <div class="feature-card card">
                <div class="feature-icon">✏️</div>
                <h3>Update</h3>
                <p>Updating allows changes to existing records, like editing your profile information or modifying an item in the database.</p>
            </div>
            <div class="feature-card card">
                <div class="feature-icon">🚮</div>
                <h3>Delete</h3>
                <p>Delete removes unwanted records from the system, keeping the database clean and accurate.</p>
            </div>
        </div>
    </section>

  </div>
</footer>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/script.js"></script>
    <?php include 'includes/footer.php'; ?>
</body>
</html>