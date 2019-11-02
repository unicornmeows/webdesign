<?php
session_start();
if(!isset($_SESSION['user'])){
    echo '<script>alert("Please loggin in first");';
    echo 'location.href="login.php";';
    echo '</script>';
}
?>
<style type="text/css">
  <style type="text/css">
        * { 
            padding:0; 
            margin:0; 
        } 
        body {
            margin: 0px;
            background-color: white;
        }
        .top {
            position: fixed;
            background-color: white;
            top:0;
            width: 100%;
            height: 40px;
            z-index: 3;
            border-bottom: 1px solid grey;

        }

        .top a {
            text-decoration: none;
            color: #A9A9A9;

        }
        .top .rightM a:hover {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        .rightM {
            position:absolute;
            right: 70px;
            top: 5px;
        }
        .leftM {
            position: absolute;
            top:5px;
            left:40px;
            padding-right: 20px;
            border-right: 1px solid grey;
        }
        .content {
            position: relative;
            background-color: #FAEEE3;
            top:41px;
            text-align: center;
            z-index: 1;
            padding-top: 50px;
            width: 90%;
            margin:auto;
        }
        .content footer {
            text-align: center;
            background-color: #E8E0D9;
            padding: 20px 0;
            margin-top: 50px;
        }
        .content footer a {
            text-decoration: none;
            color: black;
        }
        a{color:#666;text-decoration:none;}
        table{border-collapse:collapse;border-spacing:0;border:0;width: 1000px;}
        table{text-align:center;margin: auto;}
        table th,table td{border:1px solid #CADEFF;}
        table th{background:#e2f2ff;border-top:3px solid #a7cbff;height:30px;}
        table td{padding:10px;color:#444;}
        table tbody tr:hover{background:RGB(238,246,255);}
        table tbody tr td img {
            width: 100px;

        }
        .priceInfo {
            width: 1000px;
            margin: auto;
        }
        .totalPrice {
            padding-top: 30px;
            font-size: 1.5em;
        }
        .totalPrice span {
            font-weight: bold;
        }
        .checkout {
            margin-top: 20px;
            font-weight: bold;
        }
        .checkout div {
            margin-top: 20px;
            font-size: 1.5em;
            padding: 5px;
            display: inline-block;
            border-radius: 10px;
            background-color: #E8E5E5;
        }
</style>


</style>
</head>
<body>
<div class="top">
	<div class="leftM"><strong style="font: italic 1.5em Georgia, serif;"><a href='home.php' style='text-decoration: none;color: black'>F&F Designer Bags</a></strong></div>
    <div class="rightM">
    <?php 
    session_start();
    if(!isset($_SESSION['user'])) {
    	echo '<a href="register.php">Register&nbsp;&nbsp;</a>
    <a href="login.php">Login&nbsp;&nbsp;</a>';
    }
    else {
    	echo '<div style="color:#A9A9A9;display:inline-block;">Welcome,'.$_SESSION['user'].' &nbsp;&nbsp;</div>';
    	echo '<a href="logoff.php">Logoff&nbsp;&nbsp;</a>';
    }

    ?>
    <a href="myAccount.php">Account&nbsp;&nbsp;</a>
    <a href="cart.php">Cart</a>
    </div> 
</div>
<div class="content">
<?php
    $user = $_SESSION['user'];
    $item = $_GET['item'];
    @ $db = new mysqli('localhost', 'f31ee', 'f31ee', 'f31ee');

    if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
    }
    $sql = "SELECT carts.username,carts.title,carts.quantity,items.img,items.price from carts join items on items.title=carts.title where username='".$_SESSION['user']."'";
    $result = $db->query($sql);
    $num_results = $result->num_rows;
    $totalPrice = 0;
    if($num_results==0){
        echo '<h2>You have not added any item yet!</h2>';
        echo '<a href="home.php">Browse now</a>';
    }
    else{
        echo '<div class="priceInfo">';
        echo '<table><thead><tr><th>Title</th><th>View</th><th>Quantity</th><th>Price</th><th>SubTotal</th><th>Action</th></tr></thead><tbody>';
        for($i=0; $i <$num_results; $i++) {
                    $row = $result->fetch_assoc();
                    echo '<tr><td style="{word-wrap:break-word;}">'.$row['title'].'</td>';
                    echo '<td><img src='.$row['img'].'></td>';
                    echo '<td>'.$row['quantity'].'</td>';
                    echo '<td>'.$row['price'].'</td>';
                    echo '<td>'.$row['price']*$row['quantity'].'</td>';
                    echo '<td><a href="delete.php?item='.$row['title'].'">Delete</a></td></tr>';
                    $totalPrice = $totalPrice+$row['quantity']*$row['price'];
                }
        echo '</tbody></table>';
        echo '<div class="totalPrice">Total Price: <span>$'.$totalPrice.'</span></div>';
        echo '<a href="checkout.php" class="checkout"><div>Check Out!</div></a>';
        echo '</div>';
    }
    $result->free();
    $db->close();
?>

<footer>
	<div id="footer">
	<i>Copyright &copy; 2019 F&F Designer Bags<br>
	<a href="mailto:shihao@feng.com">shihao@feng.com</i></a>
	</div>
</footer>

</div>


</body>

