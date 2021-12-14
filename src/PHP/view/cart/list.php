<div class="all_products">
<h2>MY CART</h2>
<?php foreach ($tab_p as $p): ?>
        <div class="product_window">
            <div class="box_products">
                <a class="card-img-tiles" href="./index.php?action=read&name=<?= rawurlencode($p->getName()) ?>">
                    <div><img class="main-img" src="<?php echo $p->getImage() ?>" alt="<?= htmlentities($p->getName()) ?>"></div>
                </a>
                <div class="desc_box">
                    <h2 class="h5 mb-1"><?= $p->getName() ?></h2>
                    <p><?= $p->getDescription() ?></p>
                    <span class="price">Price: 
                        <span class="font-weight-semibold"><?= $p->getPrice() . "€"?></span>
                    </span>
                    <a class="article_show" href="./index.php?action=read&name=<?= rawurlencode($p->getName()) ?>"> Show article</a>
                </div>
            </div>
            <a href="./index.php?controller=cart&action=removefromcart&name=<?= rawurlencode($p->getName()) ?>">Remove</a>
        </div>
<?php endforeach; ?>
</div>

