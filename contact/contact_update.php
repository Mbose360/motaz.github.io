<?php
session_start();
@include '../config.php';
?>

<?php
if(isset($_GET['id'])){
  
  $id = $_GET['id'];

  $sql="SELECT * FROM contact WHERE id = '$id'";
  $result = mysqli_query($conn,$sql);
//count the number of contact to see if the cenvention exist  
  $count = mysqli_num_rows($result);
  if($count==1){
  $row=mysqli_fetch_assoc($result);
  $information=$row["information"];
  $type = $row["type"];
  
  }
 else{
//if the id is not valid
  $_SESSION['contact-update']= 'the id is not valid';
  header('location: contact_index') ; 
 } 
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../convention/logi.css">
    <title>Document</title>
</head>
<body>
<div id="login-form-wrap">
  <h2>update contact</h2>
  <form action="" method="post" enctype="multipart/form-data" id="login-form">
    <p>
    <input type="<?php if($type=='email'){
        echo 'email';
    }else{
        echo 'number';
    } ?>" name="information" value="<?php echo $information ?>" placeholder="<?php echo $information ?>">
    </p>
   
   
    <p>
      
      <input type="hidden" name="id" value="<?php echo $id?>">
      <input type="submit" name="submit" value="update contact" class="form-btn">
    </p>
    <p class="a-style"><a href="contact_index">return</a></p>
    <br>
  </form>

    
</div>  
<?php
if(isset($_POST['submit'])) {
// getting the information about the contact
$informatio=$_POST['information'];

$id=$_POST['id'];





//update the new options to database
$sql2 ="UPDATE contact SET information ='$informatio'  WHERE id ='$id'";

$res2 =mysqli_query($conn,$sql2);
header('location: contact_index') ; 
}
?>


</body>
</html>