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

        .main {
            width: 90%;
            background-color: #FAEEE3;
            margin:auto;
            height: 800px;
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
        }
        .register-box{
            position: relative;
            height: 600px;
            width: 800px;
            top: 50px;
            margin: 0 auto;
            z-index: 99999;
            background:#ffffff;
            border: 7px solid #ccc;
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
            color: #ff5000;
            line-height: 50px;
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
            left: 200px;
        }
        .content {
            position: relative;
            top:150px;
            text-align: center;
            z-index: 1;
        }
        .content footer {
            text-align: center;
            background-color: #E8E0D9;
            padding: 20px 0;
        }
        .content footer a {
            text-decoration: none;
            color: black;
        }
 
    </style>

<body style="background: white;">
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

<div class="main">
<div class="container">
    <div class="register-box">
        <div class="title-box">
            <span>Registration</span>
        </div>
        <form action="doRegister.php" method="post" onsubmit="return check()">
            <div class="box">
                <span style="color: red;">*</span>
                <label for="username">Username</label><br>
                <div class="input-field">
                    <input type="text" id="username" name="username" placeholder=" Please enter your username" required />
                </div>
            </div>

            <div class="box">
                <span style="color: red;">*</span>
                <label for="userPassword">Password</label><br>
                <div class="input-field">
                    <input type="password" id="userPassword" name="password" placeholder=" Please enter your password" required/>
                </div>
            </div>

            <div class="box">
            <span style="color: red;">*</span>
                    <label for="userRePassword">Re-enter password</label><br>
                <div class="input-field">
                    <input type="password" id="userRePassword" name="rePassword" placeholder=" Please enter the password again" required/>
                </div>
            </div>

            <div class="box">
                <span style="color: red;">*</span>
                <label for="userPhone">Phone number</label><br>
                <div class="input-field">
                    <input type="text" id="userPhone" name="phone" placeholder=" Please enter your phone number" required/>
                </div>
            </div>
            
            <div class="box">
                <span style="color: red;">*</span>
                <label for="userEmail">Email</label><br>
                <div class="input-field">
                    <input type="email" id="userEmail" name="email" placeholder=" Please enter your email" required/>
                </div>
            </div>
            

        
                <input id = "submit-button" type="submit" value="register">
            

        </form>
    </div>
</div>

<div class="content">
<footer>
    <div id="footer">
    <i>Copyright &copy; 2019 F&F Designer Bags<br>
    <a href="mailto:shihao@feng.com">shihao@feng.com</i></a>
    </div>
</footer>
</div>
</div>

<script type="text/javascript">
    function check() {
        pass = document.getElementById("userPassword");
        rpass = document.getElementById("userRePassword");
        phone = document.getElementById("userPhone");
        console.log(phone.value);
        if(pass.value!=rpass.value) {
            alert('Please enter the same password');
            pass.select();
            pass.focus();
            return false;
        }

        var reg = /^[0-9]+$/;
        var result = reg.test(phone.value);
        if(!result) {
            alert('Please enter number only for phone numbers');
            phone.focus();
            phone.select();
            return false;
        }
    }

</script>
</body>
