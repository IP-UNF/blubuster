<?php
session_start();
unset($_SESSION['cart']);
unset($_SESSION['subTotal']);
unset($_SESSION['total']);
header("Location: cart.php");
?>
