<?php
	session_start();
	session_unset();
    echo '<script>alert("You have successfully logged off");';
    echo 'location.href="home.php";';
    echo '</script>';

?>