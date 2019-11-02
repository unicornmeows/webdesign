<?php
	session_start();
    $user = $_SESSION['user'];
    $item = $_GET['item'];
    @ $db = new mysqli('localhost', 'f31ee', 'f31ee', 'f31ee');

    if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
    }
    $address = htmlspecialchars($_POST['newAddress']);
    $sql = "update users set address='".$address."' where username = '".$user."'";
    echo $sql;