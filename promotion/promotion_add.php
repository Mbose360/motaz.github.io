<?php
session_start();
@include '../config.php';
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
    <link rel="stylesheet" href="../convention/log.css">
    <title>Document</title>
</head>
<body>
<div id="login-form-wrap">
  <h2>Add convention</h2>
   <form action="" method="post" enctype="multipart/form-data" id="login-form">
    
    <p>
    <input type="text" name="full_name" placeholder="Enter promotion name">
    </p>

     <p>
        <input type="date" name="promotion-date" >
    </p>
                
         <input type="file" name="image_name" >
       
    <p>
      <input type="submit" name="submit" value="add promotion" class="form-btn">
    </p>  
       
    <p class="a-style"><a href="promotion_index">return</a></p>
         <br>
    </form>
</div>   
<?php
if(isset($_FILES['image_name'])&&isset($_POST['submit'])) {
$promo_name=$_POST['full_name'];    
$date=$_POST['promotion-date'];
$img_name=$_FILES['image_name']['name'];
$tmp_name=$_FILES['image_name']['tmp_name'];
$error=$_FILES['image_name']['error'];
if($error== 0) {
$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
$img_ex_lc = strtolower($img_ex);
$allowed_exs= array("jpg","jpeg","png");
if(in_array($img_ex_lc,$allowed_exs)){
    $new_img_name=uniqid("img-", true).".".$img_ex_lc;

    $img_upload_path ='../images/'.$new_img_name;
    move_uploaded_file($tmp_name,$img_upload_path);
     $sql = "INSERT INTO `promotion`(name,img,enddate) VALUES('$promo_name','$new_img_name','$date')" or die('query failed');
  $res = mysqli_query($conn,$sql);
  $_SESSION['error_msg'] ="the promotion has been successfully added.";
 
  header("location: promotion_index.php?message=Record added successfully");
 
}

}else{
    $_SESSION['error_msg']="unkown error occurred";
    header("location: promotion_add.php");
}


echo $_SESSION['error_msg'] ;
}
?>


</body>
</html>