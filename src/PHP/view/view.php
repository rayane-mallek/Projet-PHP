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
                <li><a href="index.php?action=profil&controller=user">Profil</a></li>
                <li><a href="">My cart</a></li>
                <?php 
                    } else {
                ?>
                <li><a href="index.php?action=register&controller=user">Register</a></li>
                <li><a href="index.php?action=login&controller=user">Login</a></li>
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
