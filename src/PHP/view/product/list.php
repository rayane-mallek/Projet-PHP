<div class="all_products">
<?php foreach ($tab_p as $p): ?>
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
                    <?php if ($_SESSION['admin'] == 1): ?>
                        <a class="article_upd" href="./index.php?controller=product&action=update&name=<?= rawurlencode($p->getName()) ?>" style="font-family: TommyREGULAR, Arial;">Update article</a>
                        <a class="article_del" href="./index.php?controller=product&action=delete&name=<?= rawurlencode($p->getName()) ?>" style="font-family: TommyREGULAR, Arial;">Delete article</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
<?php endforeach; ?>
</div>

<?php if ($_SESSION['admin'] == 1): ?>
<div class="add_product">
    <a href="./index.php?controller=product&action=create">Add a product</a>
</div>
<?php endif; ?>