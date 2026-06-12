<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta charset="UTF-8">
        <title> Rivals Codex </title>
        
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Contrail+One&family=Lexend:wght@100..900&family=Odibee+Sans&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="bg-image"></div>

        <?php
            $heroes = json_decode(file_get_contents("heroes.json"), true);
            include "includes/header.php";
        ?>
        
        <div class="search">
            <input type="text" id="text-search" placeholder="Search for heroes...">
        </div>
        
        <div class="hero-grid" id="heroGrid">
                <?php foreach($heroes as $id => $hero): ?>
                    <a href="hero.php?id=<?= $id ?>" class="hero-card"
                        data-name="<?=$hero['name'] ?>"
                        data-role="<?= $hero['role'] ?>">

                        <div class="hero-image">
                            <img src="<?=$hero['image'] ?>" alt="<?=$hero['name']?>" width="300px" height="300px">
                        </div>
                        
                        <p class="hero-name"> <?= $hero['name'] ?> </p>
                    </a>
                <?php endforeach; ?>
            
        </div>

        <?php include "includes/footer.php" ?>
    </body>
    
    <script src="script.js"></script>
</html>