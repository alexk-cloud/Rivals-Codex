<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta charset="UTF-8">
        <title> Rivals Codex </title>
        <!-- insert css file here -->
    </head>

    <?php
        $heroes = json_decode(file_get_contents("heroes.json"), true);
    ?>

    <div class="top-header"> 
        <h1> Rivals Codex </h1>
    </div>

    <div class="hero-grid" id="heroGrid">
        <?php foreach($heroes as $id => $hero): ?>

        <a href="hero.php?id=<?= $id ?>" class="hero-card"
        data-name="<?=$hero['name'] ?>"
        data-role="<?= $hero['role'] ?>">

        <div class="hero-image">
            <img src="<?=$hero['image'] ?>" alt="<?=$hero['name']?>" width="300px" height="300px">
        </div>
        
        <p> <?= $hero['name'] ?> </p>
        

        </a>
        <?php endforeach; ?>
    </div>

    <?php include "includes/footer.php" ?>
</html>