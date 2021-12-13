<div style="display: flex; flex-wrap: wrap;justify-content: center;">
<?php foreach ($tab_p as $p): ?>

        <div class="col-md-4 col-sm-6" style="flex: 0 0 400px; margin: 10px;">
            <div class="card border-0 mb-grid-gutter">
                <a class="card-img-tiles" href="./index.php?controller=product&action=read&name=<?= rawurlencode($p->getName()) ?>">
                    <div><img class="main-img" src="<?php echo $p->getImage() ?>" alt="<?= htmlentities($p->getName()) ?>"></div>
                </a>
                <div class="card-body border mt-n1 py-4 text-center">
                    <h2 class="h5 mb-1"><?= $p->getName() ?></h2><p><?= $p->getDescription() ?></p><span class="d-block mb-3 font-size-xs text-muted">Price: <span class="font-weight-semibold"><?= $p->getPrice() . "€"?></span></span><a class="btn btn-pill btn-outline-primary btn-sm" href="./index.php?controller=product&action=read&name=<?= rawurlencode($p->getName()) ?>"> Show article</a>
                </div>
            </div>
        </div>
>
<?php endforeach; ?>
</div>

<a href="./index.php?controller=product&action=create">Add a product</a>
