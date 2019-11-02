<?php
session_start();
if(!isset($_SESSION['user'])){
    echo '<script>alert("Please loggin in first");';
    echo 'location.href="login.php?referer='.$_SERVER['HTTP_REFERER'].'";';
    echo '</script>';
}
else {
    $user = $_SESSION['user'];
    $item = $_GET['item'];
    @ $db = new mysqli('localhost', 'f31ee', 'f31ee', 'f31ee');

    if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
    }
    $sql = "SELECT * from carts where username='".$user."' and title='".$item."'";
    $result = $db->query($sql);
    $num_results = $result->num_rows;
    if ($num_results==0){
        $sql2 = "INSERT INTO carts(username, title, quantity) VALUES ('$user', '$item',1)";
    }
    else{
        $row = $result->fetch_assoc();
        $newQuant = $row['quantity']+1;
        $sql2 = "UPDATE carts set quantity=".$newQuant." where username = '".$user."' and title = '".$item."'";
    }
    $result2 = $db->query($sql2);

    echo '<script>alert("Added Successfully");';
    echo 'location.href="'.$_SERVER['HTTP_REFERER'].'";';
    echo '</script>';
}

$result->free();
$result2->free();
$db->close();
?>
