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


        footer {
            text-align: center;
            background-color: #E8E0D9;
            padding: 20px 0;
            margin-top:47px;
        }
        footer a {
            text-decoration: none;
            color: black;
        }

        .title {

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

<div class="main">
<div class="item">
<?php
    @ $db = new mysqli('localhost', 'f31ee', 'f31ee', 'f31ee');

    if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
    }

    if(isset($_GET['cat'])&isset($_GET['subCat'])) {
        $cat = $_GET['cat'];
        $subCat = $_GET['subCat'];
        $sql = "select title,description,color,img,price from items where cat = '".$cat."' and subCat='".$subCat."'";
        $result = $db->query($sql);
        $num_results = $result->num_rows;
        $total_row = (int)($num_results/4) + 1;
        echo '<ul class="totalItem">';
        for($j=0;$j<$total_row;$j++) {
            echo '<li class="row"><ul>';
            for ($i=0; $i <min($num_results-$j*4,4); $i++) {
                $row = $result->fetch_assoc();
                echo '<li class="eachItem"><ul>';
                echo '<li class="img"><a href="detail.php?item='.$row['title'].'">'.'<img width="300px" height="300px" src="'.$row['img'].'"></a></li>';
                echo '<li class="title"><b>'.$row['title'].'</b></li>';
                echo '<li class="desc">'.$row['description'].'</li>';
                echo '<li class="price"> Price: $'.$row['price'].'</li>';
                echo "</ul></li>";
            }
            echo '</ul></li>';
        }
        
        echo '</ul>';

    }
    elseif (isset($_GET['cat'])) {
        $cat = $_GET['cat'];

        $sql = "select title,description,color,img,price from items where cat = '".$cat."'";
        $result = $db->query($sql);
        $num_results = $result->num_rows;
        $total_row = (int)($num_results/4) + 1;
        echo '<ul class="totalItem">';
        for($j=0;$j<$total_row;$j++) {
            echo '<li class="row"><ul>';
            for ($i=0; $i <min($num_results-$j*4,4); $i++) {
                $row = $result->fetch_assoc();
                echo '<li class="eachItem"><ul>';
                echo '<li class="img"><a href="detail.php?item='.$row['title'].'">'.'<img width="300px" height="300px" src="'.$row['img'].'"></a></li>';
                echo '<li class="title"><b>'.$row['title'].'</b></li>';
                echo '<li class="desc">'.$row['description'].'</li>';
                echo '<li class="price"> Price: $'.$row['price'].'</li>';
                echo "</ul></li>";
            }
            echo '</ul></li>';
        }
        
        echo '</ul>';
    }

    if(isset($_GET['sp'])) {
        $cat = $_GET['sp'];
        $sql = "select title,description,color,img,price from items where cat = '".$sp."'";
        $result = $db->query($sql);
        $num_results = $result->num_rows;
        $total_row = (int)($num_results/4) + 1;
        echo '<ul class="totalItem">';
        for($j=0;$j<$total_row;$j++) {
            echo '<li class="row"><ul>';
            for ($i=0; $i <min($num_results-$j*4,4); $i++) {
                $row = $result->fetch_assoc();
                echo '<li class="eachItem"><ul>';
                echo '<li class="img"><a href="detail.php?item='.$row['title'].'">'.'<img width="300px" height="300px" src="'.$row['img'].'"></a></li>';
                echo '<li class="title"><b>'.$row['title'].'</b></li>';
                echo '<li class="desc">'.$row['description'].'</li>';
                echo '<li class="price"> Price: $'.$row['price'].'</li>';
                echo "</ul></li>";
            }
            echo '</ul></li>';
        }
        
        echo '</ul>';

    }

    $result->free();
    $db->close(); 


    ?>
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