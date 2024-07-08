<?php 
   session_start();

   include("config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: login/login.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Document</title>
</head>
<body>
<header>
    <nav>
        <ul class='nav-bar'>
            <li class='logo'><a href='#'><img class="logo" src='logo.jpg'/></a></li>
            <input type='checkbox' id='check' />
            <span class="menu">
                <li><a href="index1.php">Home</a></li>
                <li><a href="Promotion/promotion_index">Promotion</a></li>
                <li><a href="convention/convention_index">Convention</a></li>
                <li><a href="contact/contact_index">Contact</a></li>
                <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
            </span>
            <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
        </ul>
    </nav>
</header>
 <div class="container">
 <a href="promotion/promotion_index">
    <div class="btn-style">
        Promotion 
    </div></a>
    <a href="convention/convention_index">
    <div class="btn-style">
        Convention 
    </div>
    </a>

    <a href="contact/contact_index">
    <div class="btn-style">
        Contact 
    </div>
    </a>
 </div>
</body>
</html>