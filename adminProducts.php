<?php
include_once('DbConnection.php');
include_once('AllProductControll.php');

$productController = new ProductControll();
$productController->loadPurchase();
$product = $productController->getProducts();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Admin Products</title>
</head>

<body>
    <div class="sidebar">
        <h2>FitProShop</h2>
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Users</a></li>
            <li><a href="AllProduct.php"><i class="fas fa-box"></i> Products</a></li>
            <li><a href="#"><i class="fas fa-chart-line"></i> Analytics</a></li>
            <li><a href="#"><i class="fas fa-cogs"></i> Settings</a></li>
            <li><a href="#"><i class="fas fa-question-circle"></i> Support</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <h1>Products</h1>
            <div class="actions">
                <button class="edit-btn" title="Edit Product">
                    <i class="fas fa-pencil-alt"></i>
                </button>
                <i class="fas fa-bell"></i>
                <i class="fas fa-user-circle"></i>

                <a href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>

        <div class="add-product-container">
            <form action="addProduct.php" method="POST">
                <input type="name" placeholder="Name" required>
                <input type="name" placeholder="Description" required>
                <input type="number" placeholder="Price" required>
                <input class="submit" type="submit" value="Add Product">
            </form>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            <tr>
                <?php foreach ($product as $products): ?>
                    <td>
                        <?= htmlspecialchars($products->getId()) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($products->getName()) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($products->getDescription()) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($products->getPrice()) ?>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>

</body>

</html>