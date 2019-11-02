<?php
    session_start();
    $user = $_SESSION['user'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    @ $db = new mysqli('localhost', 'f31ee', 'f31ee', 'f31ee');

    if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
    }
    $sql = "update users set phone=".$phone.", email='".$email."', address='".$address."' where username='".$user."'";
    echo $sql;
    $result = $db->query($sql);
    $num_results = $result->num_rows;
    // $num_results = $result->num_rows;
    echo '<script>alert("Updated Successfully");';
    echo 'location.href="myAccount.php?search=profile"';
    echo '</script>';
?>