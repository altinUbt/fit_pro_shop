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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitProShop - Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    <div class="sidebar">
        <h2>FitProShop</h2>
        <ul>
            <li><a href="#"><i class="fas fa-home"></i> Dashboard</a></li>
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
            <h1>Welcome, Admin!</h1>
            <div class="actions">
                <i class="fas fa-bell"></i>
                <i class="fas fa-user-circle"></i>

                <a href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>

        <!-- Dashboard Cards -->
        <div class="cards">
            <div class="card">
                <h3>1100</h3>
                <p>Active Users</p>
            </div>
            <div class="card">
                <h3>320</h3>
                <p>Products</p>
            </div>
            <div class="card">
                <h3>45</h3>
                <p>Orders Today</p>
            </div>
            <div class="card">
                <h3>$12,000</h3>
                <p>Total Revenue</p>
            </div>
        </div>
    </div>

</body>

</html>

<!-- Next code -->
<?php
// Lidhja me bazën e të dhënave
include('DbConnection.php');

// Krijoni instancën e lidhjes me DB
$db = new DBConnection();
$conn = $db->startConn();

if (!$conn) {
    die("Nuk mund të lidhemi me bazën e të dhënave.");
}

// Merrni përdoruesit nga baza e të dhënave
$query_users = "SELECT * FROM users";
$result_users = mysqli_query($conn, $query_users);

// Merrni produktet nga baza e të dhënave
$query_products = "SELECT * FROM products";
$result_products = mysqli_query($conn, $query_products);
?>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitProShop - Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #2c3e50;
            color: #ecf0f1;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px 10px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 22px;
            text-transform: uppercase;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: #ecf0f1;
            text-decoration: none;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #34495e;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
        }

        .header .actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header .actions i {
            font-size: 18px;
            cursor: pointer;
        }

        /* Tabela për Përdoruesit dhe Produktet */
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </styl>
</head>
<body>
    -->
<div class="sidebar">
    <h2>FitProShop</h2>
    <ul>
        <li><a href="#"><i class="fas fa-home"></i> Dashboard</a></li>
        <li><a href="#"><i class="fas fa-users"></i> Users</a></li>
        <li><a href="adminProducts.php"><i class="fas fa-box"></i> Products</a></li>
        <li><a href="#"><i class="fas fa-chart-line"></i> Analytics</a></li>
        <li><a href="#"><i class="fas fa-cogs"></i> Settings</a></li>
        <li><a href="#"><i class="fas fa-question-circle"></i> Support</a></li>
    </ul>
</div>

<!-- Main Content -->
<div class="main-content">
    <!-- Header -->
    <div class="header">
        <h1>Welcome, Admin!</h1>
        <div class="actions">
            <i class="fas fa-bell"></i>
            <i class="fas fa-user-circle"></i>
            <a href="logout.php">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>

    <!-- Tabela për Përdoruesit -->
    <h2>Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
        <?php
        while ($user = mysqli_fetch_assoc($result_users)) {
            echo "<tr>";
            echo "<td>" . $user['id'] . "</td>";
            echo "<td>" . $user['name'] . "</td>";
            echo "<td>" . $user['email'] . "</td>";
            echo "<td>" . $user['role'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <!-- Tabela për Produktet -->
    <h2>Products</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
        <?php
        while ($product = mysqli_fetch_assoc($result_products)) {
            echo "<tr>";
            echo "<td>" . $product['id'] . "</td>";
            echo "<td>" . $product['name'] . "</td>";
            echo "<td>$" . $product['price'] . "</td>";
            echo "<td>" . $product['stock'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</div>

</body>

</html>