<?php
session_start();
$user = $_SESSION['user'];
$item = $_GET['item'];
@ $db = new mysqli('localhost', 'f31ee', 'f31ee', 'f31ee');

if (mysqli_connect_errno()) {
 echo "Error: Could not connect to database.  Please try again later.";
 exit;
}
$sql = "delete from carts where username='".$user."' and title='".$item."'";
$result = $db->query($sql);
echo '<script>';
echo 'location.href="cart.php";';
echo '</script>';
$result->free();
$db->close();

?>
