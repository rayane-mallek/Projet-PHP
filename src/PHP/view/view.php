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
                    <li><a href="./index.php?controller=user&action=login">Login</a></li>
                    <li><a href="./index.php?controller=user&action=register">Register</a></li>
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

<!--    <footer>
        <p>&copy; , A. Mathiou, R. Mallek, F. Rivals, J. Renaud.</p>
    </footer> -->

</body>
</html>
