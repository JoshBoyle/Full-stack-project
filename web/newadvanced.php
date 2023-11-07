<?php
//session_start();
//header("Location:AdvancedSearch.php");
include_once("AdvancedSearch.php");
?>
</section>
<section id="output">
    <h2>Output</h2>
    <?php
    if (isset($_SESSION["total"])) {
        echo "<div id='total'> $" .  round($_SESSION["total"], 2) . " per month </div>";
        unset($_SESSION["total"]);
    }
    ?>
<!--    <div id="login-error-msg-holder">-->
<!--        <p id="login-error-msg">Invalid email <span id="error-msg-second-line">and/or password</span></p>-->
<!--    </div>-->
</section>
</body>
<?php include "footer.php" ?>
</html>
