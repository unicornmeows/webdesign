<?php
    @ $db = new mysqli('localhost', 'f31ee', 'f31ee', 'f31ee');
    if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
    }
    $firstname = $_POST['firstname'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $password = md5($password);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "select username from users where username = '".$username."' and email = '".$email."'";
    $result = $db->query($sql);
    $num_results = $result->num_rows;
    if ($num_results!=0) {
        echo '<script>alert("This user has been registered");';
        echo 'location.href="register.php"';
        echo '</script>';
    }
    else {
        $sql = "INSERT INTO users (firstname, username, gender, password, email, phone) 
        VALUES ('$firstname', '$username', '$gender', '$password','$email','$phone')";
        $result2 = $db->query($sql);
    }
    $result->free();
    $db->close();
?>
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
            position: fixed;
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
        .top .ritghM a:hover {
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
        .main {
            width: 100%;
            background-color: #FAEEE3;
            margin:auto;
            text-align: center;
        }
        .content {
            position: relative;
            top:50px;
            height: 450px;
            text-align: center;
            z-index: 1;
            font-family: 'Playfair Display SC', serif;
        }
        footer {
            text-align: center;
            background-color: #E8E0D9;
            padding: 20px 0;
            position: relative;
            bottom: 0px;
        }
        footer a {
            text-decoration: none;
            color: black;
        }
        .content p a {
            text-decoration: none;
        }
</style>

<header style="background: white;">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC&display=swap" rel="stylesheet">
<div class="top" style="border-bottom: 1px solid grey">
    <div class="leftM">
        <a href='home.php'><img height="30px" src="logo.jpg"></a>
    </div>
    <div class="rightM">
    <a href="register.php">Register&nbsp;&nbsp;</a>
    <a href="login.php">Login&nbsp;&nbsp;</a>
    <a href="cart.php">Cart</a>
    </div> 
</div>
</header>

<body>
<div class="main">
    <div class="content">

    <h2 style="padding: 30px 0;">Thank you for registering with us!</h2>
    <p><a href='login.php'>Login Now!</a></p>
</div>
</div>
</body>

    <footer style="margin-top: 60px;">
        <div id='footer'>
        <i>Copyright &copy; 2019 F&F Designer Bags<br>
        <a href="mailto:shihao@feng.com">shihao@feng.com</a>
        <a href="mailto:fannyee@liow.com">fannyee@liow.com</a>
        </div>
    </footer>
