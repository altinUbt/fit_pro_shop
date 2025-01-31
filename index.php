<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['useremail'])) {
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
    <title>FitProShop</title>
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>
<div class="navbar">
    <h1>FitProShop</h1>
    <a href="">HOME</a>
    <a href="AboutUs.html">ABOUT US</a>
    <a href="AllProduct.php">PRODUCT</a>
    <a href="News.php">NEWS</a>
    <a href="contact.html">CONTACT</a>
    <a href="logout.php">LOGOUT</a>
</div>

<body>
    <div class="words">
        <h1>Take the first step.
            <br>Your best self starts now.
        </h1>
        <p>A fit body is a powerful reflection of a disciplined mind.</p>
    </div>

    <div class="gallery">
        <div class="gallery-container">
            <img class="gallery-item gallery-item-1" src="assets/images/IMG_3154.jpg" data-index="1">
            <img class="gallery-item gallery-item-2" src="assets/images/IMG_3156.jpeg" data-index="2">
            <img class="gallery-item gallery-item-3" src="assets/images/IMG_3175.jpg" data-index="3">
            <img class="gallery-item gallery-item-4" src="assets/images/IMG_3176.jpg" data-index="4">
            <img class="gallery-item gallery-item-5" src="assets/images/IMG_3180.jpg" data-index="5">
        </div>
        <div class="gallery-controls"></div>
    </div>


    <footer>
        <div class="container">
            <div class="footer-content">
                <h3>Contact us</h3>
                <p>Email:fitproshop@gmail.com</p>
                <p>Phone:+38349123456</p>
                <p>Adress:Prishtine</p>
            </div>
            <div class="footer-content">
                <h3>Quick Links</h3>
                <ul class="list">
                    <li><a href="">Home</a></li>
                    <li><a href="AboutUs.html">About</a></li>
                    <li><a href="AllProduct.php">Products</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="footer-content">
                <h3>Follow Us</h3>
                <ul class="social-icons">
                    <li><a href=""><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li><a href=""><i class="fab fa-instagram"></i></a></li>
                    <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="bottom-bar">
            <p>&copy;2024 FitProShop . All rights reserved</p>
        </div>
    </footer>
    <script src="Homepage.js"></script>
</body>

</html>