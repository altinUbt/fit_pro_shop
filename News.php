<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once 'newsController.php';

$controller = new NewsController();


$news = $controller->getAllNews();
$errorMsg = $controller->getErrorMessage();
$succedMsg = $controller->getSuccedMessage();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="css/News.css">
</head>

<body>

    <div class="container">
        <div class="blog-section">
            <div class="title">
                <h2>Blog & News</h2><br>
                <p><b>FitProShop is your main source for news and up-to-date information about supplements, sports
                        nutrition and the latest trends in the world of fitness.</b></p>
            </div>
            <div style="color: red;">
                <?= htmlspecialchars($errorMsg ? $errorMsg : "") ?>
            </div>
            <div style="color: green;">
                <?= htmlspecialchars($succedMsg ? $succedMsg : '') ?>
            </div>
            <div class="cards">
                <div class="card">
                    <?php foreach ($news as $new): ?>
                        <div class="image-section">
                            <img src="<?= htmlspecialchars($new['image']) ?>" alt="">
                        </div>
                        <div class="content">
                            <h4><b>
                                    <?= htmlspecialchars($new['name']) ?>
                                </b></h4>
                            <p>
                                <?= htmlspecialchars($new['description']) ?>
                            </p>

                            <a href="">Read More</a>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</body>

</html>