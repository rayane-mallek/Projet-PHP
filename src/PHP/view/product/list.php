<?php foreach ($tab_p as $p): ?>
    <a href="./index.php?action=read&name=<?= rawurlencode($p->getName()) ?>">Product name : <?= htmlentities($p->getName()) ?></a>
    <br />
<?php endforeach; ?>