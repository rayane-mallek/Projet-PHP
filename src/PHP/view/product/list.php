<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des voitures</title>
</head>
<body>
<?php
foreach ($tab_p as $p)
    echo '<p> Product with id=' . $p->getIDProduct() . '.</p>';
?>
</body>
</html>
