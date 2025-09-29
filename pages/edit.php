<?php include '../config/config.php'; 
requireAuth();

$user_id = $_SESSION['user_id'];

// Get item to edit
$item_id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM items WHERE id = ? AND user_id = ?");
$stmt->execute([$item_id, $user_id]);
$item = $stmt->fetch();

if(!$item) {
    header("Location: ../pages/dashboard.php");
    exit();
}

// Update item
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    
    if (!empty($title)) {
        $stmt = $pdo->prepare("UPDATE items SET title = ?, description = ? WHERE id = ? AND user_id = ?");
        $stmt->execute([$title, $description, $item_id, $user_id]);
        $_SESSION['success'] = "Item updated successfully!";
        header("Location: ../pages/dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item - CrudOps</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header class="header">
        <nav class="nav container">
            <div class="logo">CrudOps</div>
            <div class="nav-links">
                <a href="../pages/dashboard.php" class="nav-link">Dashboard</a>
                <a href="../pages/logout.php" class="nav-link">Logout</a>
            </div>
        </nav>
    </header>

    <main class="dashboard container">
        <div class="dashboard-header">
            <h1 class="dashboard-title">Edit Item</h1>
            <a href="../pages/dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        </div>

        <div class="card">
            <form method="POST">
                <div class="form-group">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-input" value="<?php echo htmlspecialchars($item['title']); ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-input" rows="4"><?php echo htmlspecialchars($item['description']); ?></textarea>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <button type="submit" class="btn btn-primary">Update Item</button>
                    <a href="../pages/dashboard.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </main>

    <script src="../assets/js/theme.js"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>