<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="bg-image"></div>
    
    <?php
        $heroes = json_decode(file_get_contents("heroes.json"), true);
        $id = $_GET['id'] ?? '';

        if (!isset($heroes[$id])) {
            header("Location: index.php");
            exit;
        }

        $hero = $heroes[$id];

        include "includes/header.php";
    ?>

    <section class="hero-banner">
        <div class="hero-banner-image">
            <img src="<?=$hero['image']?>" alt="<?=$hero['name']?>" width="300px" height="300px">
        </div>
        
        <div class="hero-banner-info">
            <h1> <?= $hero['name']?> </h1>
            <h2> <?= $hero['real_name']?> </h2>
            <h3> <?= $hero['role']?> </h3>
            <p> <?= $hero['bio']?> </p>
        </div>
    </section>

    <section class="appearances">
        <h2> Appears in: </h2>

        <div class="comics">
            <?php foreach($hero['comics'] as $comic): ?>
                <a 
                    href="<?= $comic['link']?>" target="_blank"> 
                    <h3 class="comic-title"> <?= $comic['title'] ?> </h3>
                </a>
                
                <p> <?= $comic['description'] ?></p>

            <?php endforeach; ?>

            <?php foreach($hero['entertainment'] as $media): ?>
                <a
                    href="<?= $media['link']?>" target="_blank">
                    <h3 class="media-title"> <?= $media['title'] ?> </h3>
                </a>

                <p> <?= $media['description'] ?></p>
            <?php endforeach; ?>
    </div>
</section>

<?php include "includes/footer.php"; ?>
</body>


</html>

