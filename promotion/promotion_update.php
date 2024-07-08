<?php
session_start();
@include '../config.php';
if(!isset($_SESSION['valid'])){
  header("Location: login/login.php");
 }
?>

<?php
if(isset($_GET['id'])){
  
  $id = $_GET['id'];

  $sql="SELECT * FROM promotion WHERE id = '$id'";
  $result = mysqli_query($conn,$sql);
//count the number of promotion to see if the cenvention exist  
  $count = mysqli_num_rows($result);
  if($count==1){
    
  $row=mysqli_fetch_assoc($result);
 
  $promotion_name=$row["name"];
  $img_name = $row["img"];
  $end_date = $row['enddate'];
  }
 else{
//if the id is not valid
  $_SESSION['promotion-update']= 'the id is not valid';
  header('location: promotion_index') ; 
 } 
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="log.css">
    <title>Document</title>
</head>
<body>
<div id="login-form-wrap">
  <h2>Add promotion</h2>
  <form action="" method="post" enctype="multipart/form-data" id="login-form">
    <p>
    <input type="text" name="full_name" value="<?php echo $promotion_name ?>" placeholder="<?php echo $promotion_name ?>">
    </p>
    <p>
        <input type="date" name="promotion-date" value="<?php echo $end_date ?>" >
    </p>
    <h4>curent image</h4>
    <img src="../images/<?php echo $img_name ?>" height="150px" alt="">

    <h4>add new image</h4>
    <input type="file" name="image_name" >
   
    <p>
      <input type="hidden" name="current_img" value="<?php echo $img_name ?>">
      <input type="hidden" name="id" value="<?php echo $id?>">
      <input type="submit" name="submit" value="add promotion" class="form-btn">
    </p>
    <p class="a-style"><a href="promotion_index">return</a></p>
    <br>
  </form>

    
</div>  
<?php
if(isset($_POST['submit'])) {
// getting the information about the promotion
$promo_name=$_POST['full_name'];
$id=$_POST['id'];
$current_img=$_POST['current_img'];
 $promotion_date=$_POST['promotion-date'] ;            

if(isset($_FILES['image_name']['name'])){
  $img_name=$_FILES['image_name']['name'];
  $tmp_name=$_FILES['image_name']['tmp_name'];
  $error=$_FILES['image_name']['error'];
 echo  $img_name;
  if($error== 0) {
   // geting image extention and allowed extentions
  $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
  $img_ex_lc = strtolower($img_ex);
  echo $img_ex_lc;
  $allowed_exs= array("jpg","jpeg","png");
  
  // check if the extension is permisible
    if(in_array($img_ex_lc,$allowed_exs)){
  //setting the image name and extention
        $new_img_name=uniqid("img-", true).".".$img_ex_lc;
        echo $new_img_name;
  //setting the image upload path
        $img_upload_path ='../images/'.$new_img_name;
  // downloading image to the selected path      
        move_uploaded_file($tmp_name,$img_upload_path);
     
        $current_img=$new_img_name;
   
  }
  else{
    $_SESSION['error_msg']='incorect file type';
  }
  
  }
}

//update the new options to database
$sql2 ="UPDATE promotion SET name ='$promo_name' ,enddate='$promotion_date' , img ='$current_img' WHERE id ='$id'";

$res2 =mysqli_query($conn,$sql2);
header('location: promotion_index') ; 
}
?>


</body>
</html>