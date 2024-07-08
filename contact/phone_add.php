<?php
session_start();
@include '../config.php';
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
  <h2>Add contact</h2>
  <form action="" method="post"  id="login-form">
    <p>
    <input type="number" name="full_name" placeholder="Enter phone number">
    </p>
    
    
      
    <p>
      <input type="submit" name="submit" value="add contact" class="form-btn">
    </p>
    <p class="a-style"><a href="contact_index">return</a></p>
    <br>
  </form>

    
</div>  
<?php
if(isset($_POST['submit'])) {
// getting the information about the contact
$phone_numbre=$_POST['full_name'];    



// uploading the convetion to the data base      
       $sql = "INSERT INTO `contact`(information,type) VALUES('$phone_numbre','phone')" or die('query failed');
      $res = mysqli_query($conn,$sql);
//message about the state of the contact       
     $_SESSION['error_msg'] ="the contact has been successfully added.";
 //heading to the contact index
  header("location: contact_index.php?message=Record added successfully");
 
}


?>


</body>
</html>
