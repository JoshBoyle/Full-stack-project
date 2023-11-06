<?php
// this page requires a user with the MEMBER permission to view
require_once "UserDao.php";

$dao = new Dao();
try {
    // get the user object from the data store
    $user = $dao->getUser("theeye@mordor.net");
    if ($user->hasPermission(User::MEMBER)) {
        echo "User has the permission";
    } else {
        echo "User does NOT have the permission";
    }

} catch (Exception $e) {
    echo $e->getMessage();
}

?>

<html>
    <head>
        <title>Property Page</title>
        <?php include "head-tag.php" ?>
    </head>
    <body>
        <?php include "nav-bar.php" ?>
        <div class="container">
            <div class="image">
                <img src="img/property-img.jpg" alt="Image Description">
            </div>
            <div class="text-box">
                <h1>Good/Bad</h1>
                <p>#bed #bath #sqft</p>
                <br>
                <p>1234 Address Random St. Id. 98712</p>
                <br>
                <p><strong>ROI</strong>% $<strong>Cashflow</strong></p>

            </div>
        </div>
    </body>
</html>
