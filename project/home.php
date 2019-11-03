<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
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
        .top rightM a:hover {
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
            width: 90%;
            background-color: #FAEEE3;
            margin:auto;
            height: 3000px;
        }
        .top2 {
            position: absolute;
            background-color: #eee;
            top:40px;
            width: 100%;
            height: 50px;
            border-top: 1px solid grey;
            min-width: 800px;
            z-index: 3;
        }
        .top2 a {
            text-decoration: none;
            color: #A9A9A9;
            font-size:100%;
        }
        #nav{ width:1000px; height:50px; background-color:#eee; margin:0 auto;text-align: center;}
        #nav ul{ list-style:none;}
        #nav ul li{ float:left; line-height:55px; text-align:center; width:250px;}
         
        #nav a:hover{ color:black;border-bottom: 1em;}
         
         
         
        #nav ul li ul li{ float:none;background-color:#eee; margin:0px 0px;text-align: left;width:250px;padding-left: 20px}
        #nav ul li ul li:hover {
            background-color: #E7E0DF;
        } 
        #nav ul li ul{ display:none;}
        #banner,
        #banner li{
            list-style: none;
            margin: 0;
            padding: 0;
        }
        #banner{
            position: absolute;
        }
        #banner li{
            float: left;
        }
        #banner li img{
            display: block;
        }
        #container{
            position: relative;
            margin:20px auto 0;
            top:90px;
            z-index: 2;
        }
        #buttons{
            position: absolute; 
            height: 10px;
            width: 100px;
            bottom: 20px;  
            left: 45%;  
            z-index: 100;
        }
        #buttons span{
            cursor: pointer;
            float: left;
            width: 10px;
            height: 10px;
            border-radius: 50%; 
            background: #333;
            margin-right: 5px;
        }
        #buttons .on{
            background: orangered;
        }
        .arrow{
            cursor: pointer;
            display: none; 
            height: 40px;
            line-height: 40px;
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            width: 40px;
            height: 40px;
            position: absolute;
            z-index: 200;
            top: 250px;
            background: RGBA(0,0,0,.3); 
            color: #fff;
            text-decoration: none;
        }
        .arrow:hover {
            background-color: #A9A9A9;
        }
        #prev{
            left: 20px;
        }
        #next{
            right: 20px;
        }
         #container:hover .arrow {
             display: block;
         }
        div.search {padding: 10px 0;position: relative;z-index: 2;}
 
        form {
            position: relative;
            width: 500px;
            margin: 0 auto;
        }
 
        input, button {
            border: none;
            outline: none;
        }
 
        input {
            width: 150%;
            height: 42px;
            padding-left: 13px;
            padding-right:46px;
        }
 
        button {
            height: 42px;
            width: 42px;
            cursor: pointer;
            position: absolute;
        }
        .bar3 {top:100px;}
        .bar3 form {background: #E7E0DF;}
        .bar3 input, .bar3 button {
            background: transparent;
        }
        .bar3 button {
            top: 0;
            right: 0;
        }
        .bar3 button:before {
            content: "\f002";
            font-family: FontAwesome;
            font-size: 16px;
            color: #F9F0DA;
        }
        .content1, .content2, .content3 {
            background-image: url('bg.jpg');
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 200px;
            padding-top: 10px;
            position: relative;
            top:150px;
            text-align: center;
            z-index: 1;
            font-family: 'Playfair Display SC', serif;
        }
        .content2 {
            background-image: url('bg1.jpg');
        }
        .content3 {
            background-image: url('bg2.jpg');
        }
        .content1-1, .content2-1, .content3-1 {
             position: relative;
             padding: 20px;
            top:150px;
            text-align: center;
            z-index: 1;
        }
        footer {
             position: relative;
            top:150px;
            text-align: center;
            z-index: 1;
            background-color: #E8E0D9;
            padding: 20px 0;
            margin-top:47px;
        }
        footer a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<header>
<div class="header">
<div class="top">
    <div class="leftM">
        <a href='home.php'><img height="30px" src="logo.jpg"></a>
    </div>
    <div class="rightM">
    <?php 
    session_start();
    if(!isset($_SESSION['user'])) {
        echo '<a href="register.php">Register&nbsp;&nbsp;</a>
    <a href="login.php">Login&nbsp;&nbsp;</a>';
    }
    else {
        echo ' <a href="myAccount.php">Account&nbsp;&nbsp;</a>';
        echo '<a href="logoff.php">Logoff&nbsp;&nbsp;</a>';
    }
    ?>
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
</header>

<body>
<div class="main">
<div class="search bar3">
    <form>
        <input type="text" placeholder="Search here...">
        <button type="submit"></button>
    </form>
</div>

<div id="container">
    <ul id="banner">
        <li><img width="600px" height="300px" src="promo5.jpg"></a></li>
        <li><img width="600px" height="300px" src="promo1.jpg"></a></li>
        <li><img width="600px" height="300px" src="promo2.jpg"></a></li>
        <li><img width="600px" height="300px" src="promo3.jpg"></a></li>
        <li><img width="600px" height="300px" src="promo4.jpg"></a></li>
        <li><img width="600px" height="300px" src="promo5.jpg"></a></li>
        <li><img width="600px" height="300px" src="promo1.jpg"></a></li>
    </ul>

    <div id="buttons">
        <span index="1" class="on"></span>
        <span index="2"></span>
        <span index="3"></span>
        <span index="4"></span>
        <span index="5"></span>
    </div>
    <a href="javascript:;" id="prev" class="arrow">&lt;</a> 
    <a href="javascript:;" id="next" class="arrow">&gt;</a>  
</div>

<div class="content1">
    <h2 style="padding: 120px 0; font-size:40px" align="center">Fall/Winter 2019-2020</h2>
</div>
<div class="content1-1">
    <a href="#"><img src="fw3.jpg" width="400px" height="500px"></a>
    <a href="#"><img src="fw10.jpg" width="400px" height="500px" style="padding-left: 30px"></a>
</div>

<div class="content2">
    <h2 style="padding: 120px 0; font-size: 40px" align="center">World of F&F</h2>
</div>
<div class="content2-1">
    <a href="#"><img src="fnf5.jpg" width="450px" height="500px"></a>
    <a href="#"><img src="fnf6.jpg" width="400px" height="500px" style="padding-left: 30px"></a>
</div>

<div class="content3">
    <h2 style="padding: 120px 0; color: white; font-size: 40px">Mosiac Wonders</h2>
</div>
<div class="content3-1">
    <a href="#"><img src="mos6.jpg" width="400px" height="500px"></a>
    <a href="#"><img src="mos3.jpg" width="400px" height="500px" style="padding-left: 30px"></a>
</div>
</div>
</body>

<footer>
    <div id='footer'>
    <i>Copyright &copy; 2019 F&F Designer Bags<br>
    <a href="mailto:shihao@feng.com">shihao@feng.com</a>
    <a href="mailto:fannyee@liow.com">fannyee@liow.com</i></a>
    </div>
</footer>
</div>

<script> 
window.onload = function () {
        var container =  document.getElementById("container");
        var banner = document.getElementById("banner");
        var li = document.querySelectorAll("#banner li");
        var spanNode = document.querySelectorAll("#buttons span");
        var img = document.getElementsByTagName("img")[1];
        var prev = document.getElementById('prev');
        var next = document.getElementById('next');
        var index = 1;
        var timer = 0;
        container.style.width = img.offsetWidth + "px";
        container.style.height = img.offsetHeight + "px";
        container .style.overflow = "hidden";
        banner.style.height = img.offsetHeight + "px";
        banner.style.width = img.offsetWidth * li.length + "px";
        banner.style.left = "-600px";
        function animate(offset) {
        banner.style.transition = "0.5s";
          banner.style.left = -parseInt(offset )* index + "px";
        }
        next.onclick = function () {
             if(index == spanNode.length){
                index = 0;
            }
            index ++;
            animate(img.offsetWidth)
            showButton()
        }
        prev.onclick = function () {
              if(index == 1){
                index = li.length-1;
            }
            index--;
            animate(img.offsetWidth)
            showButton()
        }
    function showButton() {
        for (var i = 0; i< spanNode.length; i++){
            spanNode[i].className = '';
        }
        console.log("小圆点的index值："+index);
        spanNode[index-1].className = "on";
    }
        function play() {
            timer = setInterval(function () {
                banner.style.transition = "none";
            setTimeout(function () {
                 next.onclick();
            },200)
        },1500);
        }
        container.onmouseover = function () {
            clearInterval(timer);
        }
        container.onmouseout = function () {
            play()
        }
        function ButtonImage() {
            for (var i = 0; i< spanNode.length; i++){
                spanNode[i].onclick = function () {
                    var myIndex = parseInt(this.getAttribute('index'));
                        index = myIndex;
                       animate(img.offsetWidth);
                        showButton();
                }
            }
        }
        ButtonImage()
    }
     function displaySubMenu(li) {
 
            var subMenu = li.getElementsByTagName("ul")[0];
 
            subMenu.style.display = "block";
        }
 
    function hideSubMenu(li) {
        var subMenu = li.getElementsByTagName("ul")[0];
        subMenu.style.display = "none";
    }
 </script>
</html>
