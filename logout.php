<?php
session_start();

setcookie("MobileShopBD", "", time()- (30*86400), '/');

session_destroy();
header("Location: index.php");
?>