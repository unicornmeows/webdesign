  <style type="text/css">
        * { 
            padding:0; 
            margin:0; 
        } 
        body {
            margin: 0px;
            background-color: #FAEEE3;
        }
        .top {
            position: absolute;
            background-color: white;
            top:0;
            width: 100%;
            height: 40px;
            z-index: 3;
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
            bottom: 5px;
            font-family: 'Playfair Display SC', serif;
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
            width: 100%;
            margin:auto;
            height: 410px;
            font-family: 'Playfair Display SC', serif;
        }
        footer {
            text-align: center;
            background-color: #E8E0D9;
            padding: 20px 0;
            margin-top: 50px;
            font-family: 'Times New Roman', sans-serif;
        }
        footer a {
            text-decoration: none;
            color: black;
        }
</style>

<header style="background: white;">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC&display=swap" rel="stylesheet">
<div class="top" style="border-bottom: 1px solid grey">
    <div class="leftM">
        <a href='home.php'><img height="30px" src="logo.jpg"></a></div>
    <div class="rightM">
    <a href="register.php">Register&nbsp;&nbsp;</a>
    <a href="myAccount.php">Account&nbsp;&nbsp;</a>
    <a href="cart.php">Cart</a>
    </div> 
</div>
</header>
<body>
<?php 
    session_start();
    @ $db = new mysqli('localhost', 'f31ee', 'f31ee', 'f31ee');
    if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    $referer = $_POST['referer'];
    if($referer=="http://192.168.56.2/f31ee/project/doRegister.php") {
        $referer="http://192.168.56.2/f31ee/project/home.php";
    }
    $sql = "select username,email,password from users where email = '".$email."'";
    $result = $db->query($sql);
    $num_results = $result->num_rows;
    if ($num_results==0) {
        echo '<script>alert("User not registered");';
        echo 'location.href="login.php";';
        echo '</script>';
    }
    else {
        $row = $result->fetch_assoc();
        if($row['password']=$password){
            $_SESSION['user'] = $row['username']; 
            echo '<div class="content">';
            echo '<h1>Login successfully</h1>';
            echo '<h2>Welcome, '.$row['username'].'</h2>';
            echo '<a href="'.$referer.'">back</a>';
            echo '</div>';
            echo '<footer>
                    <div id="footer">
                    <i>Copyright &copy; 2019 F&F Designer Bags<br>
                    <a href="mailto:shihao@feng.com">shihao@feng.com</i></a>
                    </div>
                  </footer>';
        }
        else {
            echo '<script>alert("Wrong password")';
            echo 'location.href="login.php"';
            echo '</script>';
        }
    }
 ?>


</body>
