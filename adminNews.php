<?php
include_once 'NewsController.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['adminemail'])) {
    header('Location: login.php');
    exit;
}

$newsController = new NewsController();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image'];

    $newsController->addNews($name, $description, $image);
    $news = $newsController->getAllNews();
}
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete'])) {
    $newsId = $_GET['delete'];

    $newsController->deleteNews($newsId);
    $news = $newsController->getAllNews();
    header('location: adminNews.php');
}

$news = $newsController->getAllNews();
$errMessage = $newsController->getErrorMessage();
$successMessage = $newsController->getSuccedMessage();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Admin News</title>
</head>

<body>
    <div class="sidebar">
        <h2>FitProShop</h2>
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="AdminUser.php"><i class="fas fa-users"></i> Users</a></li>
            <li><a href="adminProducts.php"><i class="fas fa-box"></i> Products</a></li>
            <li><a href="#"><i class="fas fa-cogs"></i> Settings</a></li>
            <li><a href="#"><i class="fas fa-question-circle"></i> Support</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>News</h1>
            <div class="actions">
                <i class="fas fa-bell"></i>
                <i class="fas fa-user-circle"></i>

                <a href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>

        <div class="add-product-container">
            <form method="POST" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Product Name" required>
                <textarea class="description" name="description" placeholder="Product Description" required></textarea>
                <input class="file" type="file" name="image" accept="image/*">
                <input class="submit" type="submit" name="add" value="Add Product">
            </form>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            <tr>
                <?php foreach ($news as $new): ?>
                <tr>
                    <td>
                        <?php echo htmlspecialchars($new['id']); ?>
                    </td>
                    <td><img src=" <?php echo htmlspecialchars($new['image']); ?>" alt=""
                            style="width: 50px; height: 50px; border-radius: 5px;"></td>
                    <td>
                        <?php echo htmlspecialchars($new['name']); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($new['description']); ?>
                    </td>

                    <td>
                        <a href="adminNews.php?delete=<?php echo $new['id']; ?>"
                            onclick="return confirm('Are you sure you want to delete this new?')">Delete</a>
                        <a href="EditNews.php?id=<?php echo $new['id']; ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>

</body>

</html>