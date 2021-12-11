<?php
    echo '<p>The product <b>' . htmlentities($p->getName()) . '</b> has been updated successfully.</p>';
    require File::build_path(array("view", "product", "list.php"));
?>