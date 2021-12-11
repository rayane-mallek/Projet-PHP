<div class="article">
    <div class="box_article">
        <img src="<?php echo $p->getImage() ?>" class="img_article"></img>
        <div class="black_bar"></div>
        <h3><?php echo 'Article ' . htmlentities($p->getName()) ; ?></h3>
        <p> <?= $p->getDescription() ?></p>
        <p> <?= $p->getPrice() ?></p>
    </div>

</div>