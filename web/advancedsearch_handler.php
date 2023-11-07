<?php
require_once "form_handler_template.php";
if (isset($_SESSION["status"])) {
    header("Location:index.php");
}
exit();
