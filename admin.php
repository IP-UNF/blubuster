<?php
session_start();
if($_SESSION['validated'] ="")
{
  header("Location: login.php?error=2");
}
include'./sharedlayout/header.php';
include'./sharedlayout/body.php';
echo "welcome admin";
include'./sharedlayout/footer.php';
?>
