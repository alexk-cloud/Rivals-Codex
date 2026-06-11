<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Contrail+One&family=Lexend:wght@100..900&family=Odibee+Sans&display=swap" rel="stylesheet">
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
            <img src="<?=$hero['image']?>" alt="<?=$hero['name']?>" width="500px" height="500px">
        </div>
        
        <div class="hero-banner-info">
            <h1 id="name" style="color: <?= $hero['color'] ?>">
                <?= $hero['name']?>
            </h1>
            <h2 id="real-name"> <?= $hero['real_name']?> </h2>
            <h3 id="role" style="color: gray"> <?= $hero['role']?> </h3>
            <p id="bio"> <?= $hero['bio']?> </p>
        </div>
    </section>

    <section class="appearances">
        <h2> Appears in: </h2>

        <div class="appears-grid">
                <?php foreach($hero['comics'] as $comic): ?>
                    <div class="comic-card"> 
                        <a href="<?= $comic['link']?>" target="_blank"> 
                            <img class="comic-cover" src="<?= $comic['cover'] ?>" alt="" height="300px">
                            <h3 class="comic-title" style="color: <?= $hero['color'] ?>">
                                <?= $comic['title'] ?> 
                            </h3>
                        </a>
                    
                        <p class="comic-desc"> <?= $comic['description'] ?></p>
                    </div>

                <?php endforeach; ?>

                <?php foreach($hero['entertainment'] as $media): ?>
                    <div class="media-card">
                        <a
                            href="<?= $media['link']?>" target="_blank">
                            <img class="media-cover" src="<?= $media['cover'] ?>" alt="" height="300px">
                            <h3 class="media-title" style="color: <?= $hero['color'] ?>">
                                <?= $media['title'] ?> 
                            </h3>
                        </a>

                        <p class="media-desc"> <?= $media['description'] ?></p>
                    </div>
                    
                <?php endforeach; ?>
        </div>
        
    </section>

<?php include "includes/footer.php"; ?>
</body>


</html>

