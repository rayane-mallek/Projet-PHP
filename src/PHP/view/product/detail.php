<div class="article">
    <div class="box_article">
        <img src="<?php echo $p->getImage() ?>" class="img_article"></img>

        <div class="black_bar"></div>

        <h3><?php echo htmlentities($p->getName()) ?></h3>

        <h1 class="h__article">Description</h1>
        <p> <?= $p->getDescription() ?></p>

        <h1 class="h__article__price">Price</h1>
        <p class="p__price"> <?= $p->getPrice() ?>&#8364;</p>
    </div>
        <div class="purchs_btns">
                <a class="buying_btn" href="#">Acheter maintenant</a>
                <a class="incart_btn" href="./index.php?controller=cart&action=addtocart&name=<?= $p->getName() ?>">Ajouter au panier</a>
        </div>
</div>