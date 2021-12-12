<div class="article">
    <div class="box_article">
        <img src="<?php echo $p->getImage() ?>" class="img_article"></img>

        <div class="black_bar"></div>

        <h3><?php echo 'Article ' . htmlentities($p->getName()) ; ?></h3>

        <h1 class="h__article">Description</h1>
        <p> <?= $p->getDescription() ?></p>

        <h1 class="h__article__price">Price</h1>
        <p class="p__price"> <?= $p->getPrice() ?>&#8364;</p>
    </div>
        <div class="purchs_btns">
                <button class="buying_btn">Acheter maintenant</button>
                <button class="cart_btn">Ajouter au panier</button>
        </div>

</div>