<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav>
    <ul class="left-nav">
        <li>
            <div id="basic-btn" class="<?php echo ($currentPage === 'index.php') ? 'current-page-button' : 'page-button'; ?>">
                <a href="index.php">Basic</a>
            </div>
        </li>
        <li>

            <div id="advanced-btn" class="<?php echo ($currentPage === 'AdvancedSearch.php') ? 'current-page-button' : 'page-button'; ?>">
                <a href="AdvancedSearch.php">Advanced</a>
            </div>
        </li>
    </ul>
    <div class="logo">
        <img src="img/LOGO.png" alt="logo prototype">
    </div>
    <div class="login-button">
        <a href="login.php">Log Out</a>
    </div>
</nav>

<!--<nav>-->
<!--    <ul class="left-nav">-->
<!--        <div id="basic-btn" class="nav-button">-->
<!--            <li class="active">-->
<!--                       <li class="nav-button ?php //echo ($currentPage === 'index.php') ? 'active' : ''; ?">-->
<!--                <a href="index.php">Basic</a>-->
<!--            </li>-->
<!--        </div>-->
<!--        <li class="nav-button --><?php //echo ($currentPage === 'AdvancedSearch.php') ? 'active' : ''; ?><!--">-->
<!--            <a href="AdvancedSearch.php">Advanced</a>-->
<!--        </li>-->
<!--    </ul>-->
<!--    <div class="logo">-->
<!--        <img src="img/LOGO.png" alt="logo prototype">-->
<!--    </div>-->
<!--    <div class="login-button">-->
<!--        <a href="login.php">Log Out</a>-->
<!--    </div>-->
<!--</nav>-->
