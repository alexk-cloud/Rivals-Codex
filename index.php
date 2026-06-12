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
            <button id="filter">
                <img src="images/filter.png" alt="Filter heroes">
            </button>

            <dialog id="popup">
                <form method="dialog">
                    <h3> Filter by role: </h3>

                    <div class="role-radio">
                        <label>
                            <input type="radio" name="role" value="" checked>
                            All
                        </label>
                        <label>
                            <input type="radio" name="role" value="Vanguard">
                            Vanguard
                        </label>
                        <label>
                            <input type="radio" name="role" value="Duelist">
                            Duelist
                        </label>
                        <label>
                            <input type="radio" name="role" value="Strategist">
                            Strategist
                        </label>
                    </div>

                    <div class="actions">
                        <button type="button" id="cancelBtn"> Cancel </button>
                        <button type="submit" id="confirmBtn"> Confirm </button>
                    </div>
                </form>
            </dialog>
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