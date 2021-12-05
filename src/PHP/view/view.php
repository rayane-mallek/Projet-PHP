<DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $pagetitle ?></title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<header>
    <div class="navbar">
        <h1 class="navbar_title">Hack-King</h1>
        <nav class="navbar_navigation">
            <ul class="navbar_list">
                <li><a href="">Homepage</a></li>
                <li class="scrollable"><a href="">Our products</a>
                    <ul class="navbar_undermenu">
                        <li><a href="">League of Legends</a></li>
                        <li><a href="">Counter Strick - Global Offensive</a></li>
                        <li><a href="">Among Us</a></li>
                        <li><a href="">incoming..</a></li>
                    </ul>
                </li>
                <li class="scrollable"><a href="">My account</a>
                    <ul class="navbar_undermenu">
                        <li><a href="">Login</a></li>
                        <li><a href="">Register</a></li>
                    </ul>
                </li>
                <li><a href="">My cart</a></li>
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
</html>