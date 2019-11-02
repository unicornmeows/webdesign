<style type="text/css">
    	* { 
			padding:0; 
			margin:0; 
		} 
        body {
            margin: 0px;
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
            position: relative;
            top: 100px;
            width: 90%;
            background-color: #FAEEE3;
            margin:auto;
            text-align: center;
        }

        .top2 {
            position: fixed;
            background-color: #eee;
            top:40px;
            width: 100%;
            height: 60px;
            border-top: 1px solid grey;
            min-width: 800px;
            z-index: 3;

        }
        .top2 a {
            text-decoration: none;
            color: #A9A9A9;
            font-size:130%;
        }
        #nav{ width:700px; height:60px; background-color:#eee; margin:0 auto;text-align: center;}
        #nav ul{ list-style:none;}
        #nav ul li{ float:left; line-height:60px; text-align:center; width:160px;}
         

        #nav a:hover{ color:black;border-bottom: 1em;}
         
         
         
        #nav ul li ul li{ float:none;background-color:#eee; margin:0px 0px;text-align: left;width:200px;padding-left: 20px}
        #nav ul li ul li:hover {
            background-color: #E7E0DF;
        } 
        #nav ul li ul{ display:none;}

        li {
            list-style: none;
        }
        .item {padding-top: 50px; }
        .totalItem { padding: 0 100px; }
        .eachItem { float:left; padding: 0 40px; }
        .row {height: 400px;}

        .content {
            position: relative;
            top: 100px;
            margin:auto;
            width: 90%;
            background-color: #FAEEE3;

        }
        footer {
            text-align: center;
            background-color: #E8E0D9;
            padding: 20px 0;
            margin-top:47px;
            clear:both;
        }
        footer a {
            text-decoration: none;
            color: black;
        }

        .left {
            padding-left: 100px;
            padding-top: 30px;
            padding-bottom: 50px;
            float: left;
        }
        .right {
            float: left;
            padding-top: 30px;
            padding-left: 400px;
        }
        h3 {
            padding-top: 20px;
        }
        .desc {
            padding: 10px;
            font: normal 1.4em Arial;
            max-width: 500px;
            background-color: #DFDEDE;
            border-radius: 10px;
            margin-top: 20px;

            word-wrap:break-word; 
            word-break:break-all; 
        }
        .addcart a {
            text-decoration: none;
            font-weight:bold;
            color:black;
        }
        .addcart {
            margin-top: 50px;
            background-color: #DFDEDE;
            border-radius: 10px;
            text-align: center;
            padding: 5px;
        }
</style>
<body>
<div class="header">
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
<div class="top2">
    <div id='nav'>
    <ul>
        <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
            <a href="shopping.php?cat=women">WOMEN</a> 
            <ul> 
            <li><a href="shopping.php?cat=women&subCat=totes">Totes</a></li> 
            <li><a href="shopping.php?cat=women&subCat=shoulder">Shoulder Bags</a></li> 
            <li><a href="shopping.php?cat=women&subCat=boston">Boston Bags</a></li> 
            <li><a href="shopping.php?cat=women&subCat=clutches">Clutches</a></li> 
            </ul> 
        </li>
        <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
            <a href="shopping.php?cat=men">MEN</a> 
            <ul> 
            <li><a href="shopping.php?cat=men&subCat=briedcase">Briedcases</a></li> 
            <li><a href="shopping.php?cat=men&subCat=backpack">Backpacks</a></li> 
            </ul> 
        </li>

        <li onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"> 
            <a href="#">COLLECTIONS</a> 
            <ul> 
            <li style="width: 300px"><a href="shopping.php?sp=fall">Fall/Winter 2019-2020</a></li> 
            <li style="width: 300px"><a href="shopping.php?sp=world">World of F&F</a></li> 
            </ul> 
        </li>
        <li > 
            <a href="#">ABOUT US</a> 
        </li>
    </ul> 
    </div>
</div>
</div>

<div class="content">
<div class="itemDetail">
    <?php

    @ $db = new mysqli('localhost', 'f31ee', 'f31ee', 'f31ee');

    if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
    }

    $sql = "select title,description,color,img,cat,subCat,price,sp from items where title='".$_GET['item']."'";
    $result = $db->query($sql);
    $num_results = $result->num_rows;
    $row = $result->fetch_assoc();
    ?>

    <div class="left"><?php echo '<img src='.$row['img'].' width="450px" height="550px"></div>';  ?>
    <div class="right">
    <?php
        echo '<h1>'.$_GET['item'].'</h1>';
        echo '<h3>Color: '.$row['color'].'</h3>';
        echo '<h3>Price: $'.$row['price'].'</h3>';
        echo '<div class="desc" >'.$row['description'].'</div>';
        echo '<div class="addcart"><a href="addCart.php?item='.$_GET['item'].'">Add to Cart</a></div>';

    ?>


    </div>
    

</div>
<footer>
    <div id='footer'>
    <i>Copyright &copy; 2019 F&F Designer Bags<br>
    <a href="mailto:shihao@feng.com">shihao@feng.com</i></a>
    </div>
</footer>
</div>

<script type="text/javascript">
    
    function displaySubMenu(li) {

        var subMenu = li.getElementsByTagName("ul")[0];

        subMenu.style.display = "block";
    }
 
    function hideSubMenu(li) {

        var subMenu = li.getElementsByTagName("ul")[0];

        subMenu.style.display = "none";

    }
</script>
</body>