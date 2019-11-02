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
            clear: both;
        }
        .content footer a {
            text-decoration: none;
            color: black;
        }

        .nav {
        	width: 200px;
        	float: left;
        	padding-left: 100px;
        }
        .nav ul li {
        	list-style: none;
        	padding-top: 30px;
        	padding-bottom: 20px;
        	background-color: #DCD6D6;
        }
        .nav ul li a {
        	text-decoration: none;
        	padding: 2px 5px; 
        	font-size: 1.4em;
        	font-weight: bold;
        	color: black;
        }
        .nav ul li a:hover {
        	background-color: #ABA2A2;
        }
        .right {
        	float: left;
        	padding-left: 100px;
        	padding-top: 10px;
        	padding-bottom: 50px;
        	
        }
        .right .profile ul li {
        	list-style: none;
        	text-align: left;
        	padding-top: 20px;
        	font-weight: bold;
        	font-size: 1.2em;
        }
        .right .profile ul li a{
        	text-decoration: none;
        	background-color: #ABA2A2;
        	border-radius: 10px;
        	padding:2px 4px;
        	color: black;
        }

        .register-box{
            position: relative;
            height: 600px;
            width: 800px;
            margin: 0 auto;
            z-index: 99999;
            background:#ffffff;
            border: 7px solid #ccc;
            margin-bottom: 50px;
        }
        form {
            position: relative;
            top:50px;
            left:150px;

        }
        .box{
            width: 420px;
            height: 100px;
            font-weight: 700;
            text-align: left;
        }
        .box label {
        	text-align: left;
        }
        .input-field{
            display: inline-block;
            position: relative;
            left: 50px;
            top:10px;

            /*background: green;*/
        }
        .input-field input {   
            height: 35px;
            width: 290px;
            border: 2px solid #ccc;
            border-radius: 5px;
        }


        #submit-button{
            display: inline-block;
            width: 80px;
            height: 40px;
            border-radius: 5px;
            background: red;
            position: relative;
            left:-200px;
       
          
        }
        table{border-collapse:collapse;border-spacing:0;border:0;width: 700px;}
        table{text-align:center;margin: auto;}
        table th,table td{border:1px solid #CADEFF;}
        table th{background:#e2f2ff;border-top:3px solid #a7cbff;height:30px;}
        table td{padding:10px;color:#444;}
        table tr td:nth-child(1) {width: 150px;}
        table tbody tr:hover{background:RGB(238,246,255);}
        table tbody tr td img {
            width: 100px;

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
	<div class="main">
	<div class="nav"><ul><li><a href="myAccount.php?search=profile">Profile</a></li><li><a href="myAccount.php?search=orders">Orders</a></li></ul></div>
	<div class="right">
		<?php 
			if(!isset($_GET['search'])){
				$search='profile';
			}
			else{
				$search = $_GET['search'];
			}
			if($search=='profile'){
				echo '<div class="profile">';
				@ $db = new mysqli('localhost', 'f31ee', 'f31ee', 'f31ee');

			    if (mysqli_connect_errno()) {
			     echo "Error: Could not connect to database.  Please try again later.";
			     exit;
			    }
			    $sql = "SELECT * from users where username='".$_SESSION['user']."'";
			    $result = $db->query($sql);
			    $row = $result->fetch_assoc();
				echo '<ul>';
				echo '<li><span>Username:  </span>'.$_SESSION['user'].'</li>';
				echo '<li><span>Email:  </span> '.$row['email'].'</li>';
				echo '<li><span>Phone:  </span> '.$row['phone'].'</li>';
				echo '<li><span>Address:  </span> '.$row['address'].'</li>';
				echo '<li><a href="myAccount.php?search=update">Update</a></li>';
				echo '</ul></div>';
			}
			if($search=='update'){
				echo '<div class="register-box">
        <form action="updateProfile.php" method="post" onsubmit="return check()">

            <div class="box">
             
                <label for="userPhone">Phone number</label><br>
                <div class="input-field">
                    <input type="text" id="userPhone" name="phone"  required/>
                </div>
            </div>
            
            <div class="box">
                
                <label for="userEmail">Email</label><br>
                <div class="input-field">
                    <input type="email" id="userEmail" name="email" required/>
                </div>
            </div>

            <div class="box">
                
                <label for="userAddress">Address</label><br>
                <div class="input-field">
                    <textarea rows="4" cols="50" type="text" id="userEmail" name="address"></textarea> 
                </div>
            </div>
            

        
                <input id = "submit-button" type="submit" value="Confirm">
            

        </form>
    </div>';
			}
			if($search=='orders'){
				@ $db = new mysqli('localhost', 'f31ee', 'f31ee', 'f31ee');

			    if (mysqli_connect_errno()) {
			     echo "Error: Could not connect to database.  Please try again later.";
			     exit;
			    }
			    $sql = "SELECT * from orders where username='".$_SESSION['user']."' order by ordertime desc";
			    $result = $db->query($sql);
			    $num_results = $result->num_rows;
				echo '<table><thead><tr><th>Title</th><th>Quantity</th><th>Price</th><th>SubTotal</th><th>Place Time</th></tr></thead><tbody>';
				for($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					echo '<tr><td style="{word-wrap:break-word;}">'.$row['title'].'</td>';
                    echo '<td>'.$row['quantity'].'</td>';
                    echo '<td>'.$row['price'].'</td>';
                    echo '<td>'.$row['price']*$row['quantity'].'</td>';
                    echo '<td>'.$row['ordertime'].'</td></tr>';

				}
				echo '</tbody></table>';
			}

		 ?>


	</div>
</div>
<footer>
	<div id="footer">
	<i>Copyright &copy; 2019 F&F Designer Bags<br>
	<a href="mailto:shihao@feng.com">shihao@feng.com</i></a>
	</div>
</footer>

</div>


</body>
