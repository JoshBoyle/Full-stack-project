<?php
session_start();
header("Location:AdvancedSearch.php");
?>
<html>
    <?php include "head-tag.php" ?>
    <body>
        <?php include "header.php" ?>
        <div id="search-box">
            <input type="text" placeholder="Enter Property Address...">
        </div>
    </body>
    <?php include "footer.php" ?>
</html>
