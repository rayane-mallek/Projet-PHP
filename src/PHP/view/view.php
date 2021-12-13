<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $pagetitle; ?></title>
</head>
<body>
<div class="navbar">
        <h1 class="navbar_title">Hack-King</h1>
        <nav class="navbar_navigation">
            <ul class="navbar_list">
                <li><a href="">Homepage</a></li>
                <li class="scrollable"><a href="">Our products</a></li>
                <?php
                    if(isset($_SESSION['id'])){
                ?>
                <li><a href="index.php?controller=user&action=profil">Profil</a></li>
                <li><a href="">My cart</a></li>
                <?php 
                    } else {
                ?>
                <li><a href="index.php?controller=user&action=create">Register</a></li>
                <li><a href="index.php?controller=user&action=login">Login</a></li>
                <?php
                    }
                ?>
            </ul>
        </nav>
    </div>

<?php
    // Si $controleur='user' et $view='list',
    // alors $filepath="/chemin_du_site/view/user/list.php"
    $filepath = File::build_path(array("view", $controller, "$view.php"));
    require $filepath;
?>

<p style="border: 1px solid black;text-align:right;padding-right:1em;">
    Euh user
</p>
</body>
</html>
=======
<DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $pagetitle ?></title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <header>
        <div class="navbar">
            <h1 class="navbar_title">Hack-King</h1>
            <nav class="navbar_navigation">
                <ul class="navbar_list">
                <?php
                if(isset($_SESSION['id'])){
                ?>
                    <li><a href="./index.php">Homepage</a></li>
                    <li><a href="./index.php?action=readAll">Our products</a></li>
                    <li><a href="./index.php?action=profil">My account</a></li>
                    <li><a href="./index.php?action=readAllCart">My cart</a></li>
                <?php
                } else {
                ?>
                    <li><a href="./index.php">Homepage</a></li>
                    <li><a href="./index.php?controller=product&action=readAll">Our products</a></li>
                    <li><a href="./index.php?controller=account&action=login">Login</a></li>
                    <li><a href="./index.php?controller=account&action=register">Register</a></li>
                    <li><a href="./index.php?controller=product&action=readAllCart">My cart</a></li>
                <?php
                }
                ?>
                </ul>
            </nav>
        </div>
    </header>

    <?php
        $filepath = File::build_path(array("view", $controller, "$view.php"));
        require $filepath;
    ?>

    <footer>
        <p>&copy; , A. Mathiou, R. Mallek, F. Rivals, J. Renaud.</p>
    </footer>

</body>
</html>
>>>>>>> master
