<div class="all_products">
<h2>MY CART</h2>
<?php $totalPrice = 0; ?>
<?php foreach ($tab_p as $p): ?>
        <?php $totalPrice = $totalPrice + $p->getPrice(); ?>
        <div class="product_window">
            <div class="box_products">
                <a class="card-img-tiles" href="./index.php?action=read&name=<?= rawurlencode($p->getName()) ?>">
                    <div><img class="main-img" src="<?php echo $p->getImage() ?>" alt="<?= htmlentities($p->getName()) ?>"></div>
                </a>
                <div class="desc_box">
                    <h2 class="h5 mb-1"><?= htmlentities($p->getName()) ?></h2>
                    <p><?= htmlentities($p->getDescription()) ?></p>
                    <span class="price">Price: 
                        <span class="font-weight-semibold"><?= htmlentities($p->getPrice()) . "€"?></span>
                    </span>
                    <a class="article_show" href="./index.php?action=read&name=<?= rawurlencode($p->getName()) ?>"> Show article</a>
                </div>
            </div>
            <a href="./index.php?controller=cart&action=removefromcart&name=<?= rawurlencode($p->getName()) ?>">Remove</a>
        </div>
<?php endforeach; ?>
<?= "<p>Total price of the cart: " . $totalPrice . "€</p>"?>
</div>

