<?php
session_start(); 

include '../config/config.php';
requireAuth();


$user_id  = $_SESSION['user_id'] ?? null;
$username = $_SESSION['username'] ?? '';

if (!$user_id) {
    header('Location: ../pages/login.php');
    exit();
}


function flash($key) {
    if (isset($_SESSION[$key])) {
        $msg = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $msg;
    }
    return null;
}


$sticky_title = '';
$sticky_description = '';

try {
    // CREATE
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');

        if ($title === '') {
            $_SESSION['error'] = 'Title is required.';
            $sticky_title = $title;
            $sticky_description = $description;
        } else {
            
            $stmt = $pdo->prepare("INSERT INTO items (user_id, title, description) VALUES (?, ?, ?)");
            $stmt->execute([$user_id, $title, $description]);

            $_SESSION['success'] = 'Item created successfully!';
            header('Location: ../pages/dashboard.php');
            exit();
        }
    }

    // DELETE
    if (isset($_GET['delete'])) {
        $item_id = (int) $_GET['delete'];
        $stmt = $pdo->prepare("DELETE FROM items WHERE id = ? AND user_id = ?");
        $stmt->execute([$item_id, $user_id]);

        if ($stmt->rowCount() > 0) {
            $_SESSION['success'] = 'Item deleted successfully!';
        } else {
            $_SESSION['error'] = 'Delete failed or item not found.';
        }
        header('Location: dashboard.php');
        exit();
    }

    // READ
    $stmt = $pdo->prepare("SELECT id, title, description, created_at FROM items WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->execute([$user_id]);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (Throwable $e) {
    $_SESSION['error'] = 'Database error: ' . $e->getMessage();
    $items = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CrudOps</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<header class="header">
    <nav class="nav container">
        <div class="logo">CrudOps</div>
        <div class="nav-links">
            <span>Welcome, <?php echo htmlspecialchars($username); ?></span>
            <a href="../pages/profile.php" class="nav-link">Profile</a>
            <a href="../pages/logout.php" class="nav-link">Logout</a>
        </div>
    </nav>
</header>

<main class="dashboard container">
    <div class="dashboard-header">
        <h1 class="dashboard-title">Your Dashboard</h1>
        <div style="display: flex; gap: 1rem;">
            <span>Total Items: <?php echo count($items); ?></span>
            <a href="../index.php" class="btn btn-secondary">Home</a>
        </div>
    </div>

    <?php if ($msg = flash('success')): ?>
        <div class="message success"><?php echo htmlspecialchars($msg); ?></div>
    <?php endif; ?>

    <?php if ($msg = flash('error')): ?>
        <div class="message error"><?php echo htmlspecialchars($msg); ?></div>
    <?php endif; ?>

    <!-- Create Item Form -->
    <div class="card">
        <h3 style="margin-bottom: 1rem;">Create New Item</h3>
        <form method="POST" action="../pages/dashboard.php">
            <div class="form-group">
                <input type="text" name="title" class="form-input" placeholder="Item title" required 
                       value="<?php echo htmlspecialchars($sticky_title); ?>">
            </div>
            <div class="form-group">
                <textarea name="description" class="form-input" placeholder="Item description" rows="3"><?php echo htmlspecialchars($sticky_description); ?></textarea>
            </div>
            <button type="submit" name="create" class="btn btn-primary">Add Item</button>
        </form>
    </div>

    <!-- Items List -->
    <div style="margin-top: 2rem;">
        <h3 style="margin-bottom: 1rem;">Your Items</h3>

        <?php if (empty($items)): ?>
            <div class="card" style="text-align: center; padding: 3rem;">
                <p style="font-size: 1.2rem; color: var(--secondary);">No items yet. Create your first item above!</p>
            </div>
        <?php else: ?>
            <div class="items-grid">
                <?php foreach ($items as $item): ?>
                    <div class="item-card card">
                        <h4 class="item-title"><?php echo htmlspecialchars($item['title']); ?></h4>
                        <p class="item-description"><?php echo nl2br(htmlspecialchars($item['description'])); ?></p>
                        <small style="color: var(--secondary);">
                            Created: <?php echo date('M j, Y g:i A', strtotime($item['created_at'])); ?>
                        </small>
                        <div class="item-actions">
                            <a href="../pages/edit.php?id=<?php echo $item['id']; ?>" class="btn btn-primary" style="padding:0.5rem 1rem;">Edit</a>
                            <a href="../pages/dashboard.php?delete=<?php echo $item['id']; ?>" class="btn btn-danger" style="padding:0.5rem 1rem;" onclick="return confirm('Delete this item?');">Delete</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>
    <script src="../assets/js/theme.js"></script>
    <script src="../assets/js/test.js"></script>
</body>
</html>
