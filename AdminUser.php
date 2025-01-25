<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['adminemail'])) {
    header("Location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Admin Users</title>
</head>

<body>
    <div class="sidebar">
        <h2>FitProShop</h2>
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="adminUsers.php"><i class="fas fa-users"></i> Users</a></li>
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
            <h1>Users</h1>
            <div class="actions">
                <button class="edit-btn" title="Edit User">
                    <i class="fas fa-pencil-alt"></i>
                </button>
                <i class="fas fa-bell"></i>
                <i class="fas fa-user-circle"></i>

                <a href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>

        <div class="add-user-container">
             <form action="addUser.php" method="POST"> 
                <input type="text" name="id" placeholder="ID" required>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input class="submit" type="submit" value="Add User">
            </form>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
            <!-- <?php foreach ($users as $user): ?> -->
                <tr>
                    <td><?php echo htmlspecialchars($user['id']) ?></td>
                    <td><?= htmlspecialchars($user->getName()) ?></td>
                    <td><?= htmlspecialchars($user->getEmail()) ?></td>
                    <td><?= htmlspecialchars($user->getRole()) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>