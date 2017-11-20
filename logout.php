<?php
        session_start();

        if($_SESSION['validated'] != "true")
        {
                header("Location: login.php?error=2");
        }
        include'header.php';
        include'body.php';
	      echo "Good bye, ". $_SESSION['Email'];
  	    session_destroy();
        include'footer.php';
?>
