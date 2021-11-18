<?php

class File {
	public static function build_path($path_array) {
    	$ROOT_FOLDER = __DIR__;
    	$DS = DIRECTORY_SEPARATOR;
    	return $ROOT_FOLDER . $DS . '..' . $DS . join($DS, $path_array);
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hack-King</title>
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
<body>
    <section class="present_section_block">
        <div class="present_block">
            <h1 class="present_block_title">Are you looking for a hack for your favourite game?</h1>
            <p>At Hack-King, we offer our best services by selling you quality hacks, guaranteed not to get banned or caught.</p>
        </div>
    </section>

    <article class="example_article">
        <p>For example, you are looking for...</p>
        <div class="example_block">
            <div class="lol">
                <h1>League of Legends</h1>
                <img class="lol_img" src="IMG/lol.png">
            </div>
            <div class="lol_desc">
                <h1>Description :</h1>
                <p>League of Legends is a Team Strategy MOBA. Our service allows you to predict spells and their hitbox, auto attacks or movements.</p>
                <h3>Price : 13.99$</h3>
            </div>
            <button class="accordion-button">Article link</button>
        </div>
    </article>
</body>
</html>