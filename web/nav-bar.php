<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<nav>
    <ul class="left-nav">
        <li class="nav-button <?php echo ($currentPage === 'index.php') ? 'active' : ''; ?>">
            <a href="index.php">Basic</a>
        </li>
        <li class="nav-button <?php echo ($currentPage === 'AdvancedSearch.php') ? 'active' : ''; ?>">
            <a href="AdvancedSearch.php">Advanced</a>
        </li>
    </ul>
    <div class="logo">
        <img src="img/LOGO.png" alt="logo prototype">
    </div>
    <div class="login-button">
        <a href="login.php">Log Out</a>
    </div>
</nav>
