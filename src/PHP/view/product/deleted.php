<?php
    echo '<p>The product <b>' . htmlentities($_GET['name']) . '</b> has been removed.</p>';
    require File::build_path(array("view", "product", "list.php"));
?>
