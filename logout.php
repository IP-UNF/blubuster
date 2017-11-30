<?php
        session_start();

        if($_SESSION['validated'] = "")
        {
                header("Location: login.php?error=2");
        }
  	    session_destroy();
        header("Location: index.php");
?>
