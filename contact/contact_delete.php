
<?php
session_start();
@include '../config.php';

  if(isset($_GET['id']) ) {
// getting information about the convention
   $id = $_GET['id'];
   
   

  
//    delete the convention from the database
   $sql = "DELETE FROM contact WHERE id = $id";
   mysqli_query($conn, $sql);
   $_SESSION['delete']= "contact has been deleted";
// go back to the convention index after the deletion   
   header("Location: contact_index.php");
  } 
  //    if the id is not found
  else{
    $_SESSION['delete']= "an unknown error occurred";
  }
  ?>