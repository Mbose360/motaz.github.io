
<?php
session_start();
@include '../config.php';

  if(isset($_GET['id']) and isset ($_GET['imagename'])) {
// getting information about the convention
   $id = $_GET['id'];
   $imagename = $_GET['imagename'];
   
//    delete img from the computer
   if($imagename!=""){
    $img_upload_path ='../images/'.$imagename;
    $remove= unlink($img_upload_path);
   }
//    delete the convention from the database
   $sql = "DELETE FROM convention WHERE id = $id";
   mysqli_query($conn, $sql);
   $_SESSION['delete']= "convention has been deleted";
// go back to the convention index after the deletion   
   header("Location: convention_index.php");
  } 
  //    if the id is not found
  else{
    $_SESSION['delete']= "an unknown error occurred";
  }
  ?>