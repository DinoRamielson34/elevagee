<?php
$base_url = Flight::get('flight.base_url');
?>
<script>
    function toggleMenu() {
        const menu = document.querySelector('.menu');
        menu.classList.toggle('active');
    }
</script>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - E-commerce</title>
    <link rel="stylesheet" href="<?php echo $base_url ?>/public/assets/css/styles.css">
    <script src="https://kit.fontawesome.com/0c87a70838.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap">

</head>

<body>
    <header>
        <div class="container">
            <nav>
                <a href="<?= $base_url ?>/home" class="logo">
                    <img src="<?php echo $base_url ?>/public/assets/images/logo.png" alt="">airbnb
                </a>
                <div class="menu-toggle" onclick="toggleMenu()">
                    <div>izy</div>
                    <div>izy</div>
                    <div>izy</div>
                </div>
                <ul class="menu">
                    <li><a href="<?= $base_url ?>/home">Accueil</a></li>
                    <li><a href="#categorie1">Catégorie 1</a></li>
                    <li><a href="#categorie2">Catégorie 2</a></li>
                    <li><a href="<?php echo $base_url ?>/liste" > Admin </a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <?php include($page . '.php'); ?>
    </main>

    <footer>
        <p>&copy; 2025 airbnb</p>
    </footer>
</body>

</html>