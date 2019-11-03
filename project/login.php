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
        .main {
            width: 100%;
            background-color: #FAEEE3;
            margin:auto;
            height: 600px;
        }
        body,input{
            margin: 0;
            padding: 0;
        }
        input{
            display: inline-block;
            background: #fff;
        }
        .container{
            width: 100%;
            position: relative;
            top:100px;
        }
        .register-box{
            position: relative;
            height: 400px;
            width: 800px;
            margin: 0 auto;
            z-index: 99999;
            background:#ffffff;
            border: 7px solid #ccc;
            font-family: 'Playfair Display SC', serif;
        }
        .title-box{
            position: absolute;
            width: 300px;
            height: 50px;
            margin-left: 250px;
            margin-top: 5px;
            text-align: center;
            font-size: 28px;
            font-weight: 800;
            color: black;
            line-height: 50px;
            font-family: 'Playfair Display SC', serif;
        }
        form {
            position: relative;
            top:50px;
            left:150px;
        }
        .box{
            width: 420px;
            height: 100px;
            font-weight: 500;
            font-family: 'Playfair Display SC', serif;
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
            background: white;
            position: relative;
            left: 200px;
        }
        .content {
            position: relative;
            top:150px;
            text-align: center;
            z-index: 1;
        }
        footer {
            position: relative;
            text-align: center;
            background-color: #E8E0D9;
            padding: 20px 0;
        }
        footer a {
            text-decoration: none;
            color: black;
        }
        #login {
            text-align: center;
            padding-top: 70px;
            padding-right: 10px;
        }
        #login a{
            text-decoration: none;
        }
 
    </style>
<?php 
session_start();
if(isset($_SESSION['user'])) {
    echo '<script>alert("You have logged in");';
    echo 'location.href="home.php"';
    echo '</script>';
}
?>
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
<div class="container">
    <div class="register-box">
        <div class="title-box">
            <span>Login</span>
        </div>
        <form action="doLogin.php" method="post" onsubmit="return check()">
            <div class="box">
                <span style="color: red;">*</span>
                <label for="email">Email</label><br>
                <div class="input-field">
                    <input type="email" id="email" name="email" placeholder=" Please enter your email" required />
                </div>
            </div>

            <div class="box">
                <span style="color: red;">*</span>
                <label for="userPassword">Password</label><br>
                <div class="input-field">
                    <input type="password" id="userPassword" name="password" placeholder=" Please enter your password" required/>
                </div>
            </div>
                <input type="hidden" name="referer" value=<?php 
                if(isset($_GET['referer'])){
                    echo $_GET['referer'];
                }
                else {
                    echo $_SERVER['HTTP_REFERER'];
                }
                ?> >
                <input id = "submit-button" type="submit" value="Login">
            

        </form>
        <div id="login"><a href="register.php">Don't have account? Register</a></div>
    </div>
</div>
</div>
</body>

<footer>
    <div id='footer'>
    <i>Copyright &copy; 2019 F&F Designer Bags<br>
    <a href="mailto:shihao@feng.com">shihao@feng.com</a>
    <a href="mailto:fannyee@liow.com">fannyee@liow.com</a></i>
    </div>
</footer>

<script type="text/javascript">
</script>
