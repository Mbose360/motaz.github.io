
<?php
session_start();
@include '../config.php';
if(!isset($_SESSION['valid'])){
   header("Location: login/login.php");
  }
  if(isset($_GET['id']) and isset ($_GET['imagename'])) {
// getting information about the promotion
   $id = $_GET['id'];
   $imagename = $_GET['imagename'];
   
//    delete img from the computer
   if($imagename!=""){
    $img_upload_path ='../images/'.$imagename;
    $remove= unlink($img_upload_path);
   }
//    delete the promotion from the database
   $sql = "DELETE FROM promotion WHERE id = $id";
   mysqli_query($conn, $sql);
   $_SESSION['delete']= "promotion has been deleted";
// go back to the promotion index after the deletion   
   header("Location: promotion_index.php");
  } 
  //    if the id is not found
  else{
    $_SESSION['delete']= "an unknown error occurred";
  }
  ?>