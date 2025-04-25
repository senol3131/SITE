<?php
    session_start();
    unset($_SESSION["admin"]);
    ob_clean();
    header("Location:".$base_url."login.php");
?>
