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
    <link rel="stylesheet" href="sty.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>

</head>
<body>
<header>
    <nav>
        <ul class='nav-bar'>
            <li class='logo'><a href='#'><img class="logo" src='logo.jpg'/></a></li>
            <input type='checkbox' id='check' />
            <span class="menu">
                <li><a href="../index1.php">Home</a></li>
                <li><a href="../Promotion/promotion_index">Promotion</a></li>
                <li><a href="../convention/convention_index">Convention</a></li>
                <li><a href="../contact/contact_index">Contact</a></li>
                <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
            </span>
            <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
        </ul>
    </nav>
</header>
    <div class="span">
      <span>convention</span>
    </div>


 <?php
if (isset($_SESSION['error_msg'])) {
  echo '<div class="alert alert-error">' . $_SESSION['error_msg'] . '</div>';
  unset($_SESSION['error_msg']);
}
if (isset($_SESSION['delete'])) {
  echo '<div class="alert alert-success">' . $_SESSION['delete'] . '</div>';
  unset($_SESSION['delete']);
}
if (isset($_SESSION['convention-update'])) {
  echo '<div class="alert alert-info">' . $_SESSION['convention-update'] . '</div>';
  unset($_SESSION['convention-update']);
}
     
     ?>
    
    
    <div class="divv"><a href="convention_add" class="btn-add">Add a convention </a></div>
<div class="table-container">
<table class="content-table">
   <thead>
     <tr>
     <th>ID</th>
            <th>Convention Name</th>
            <th>Image</th>
            <th>Options</th>
     </tr>
   </thead>
   <tbody>
     
     <?php
    

    // Fetch images from the database
    $sql = "SELECT * FROM convention";
    $result = $conn->query($sql);
     $i= 1;
    if ($result->num_rows > 0) {
      $active = true; // To mark the first item as active
      while($row = $result->fetch_assoc()) {
        $imagename = $row['img'];
        $convention_name = $row['name']; 
        $convention_id = $row['id'];
  ?>
  <tr>
            <td> <?php echo $i ?></td>
       <td> <?php echo $convention_name ?></td> 
       <td><img src="../images/<?php echo  $imagename; ?>" height="150px" alt=""></td> 
       <td class="options">
        
        

        <a  href="convention_delete.php?id=<?php echo $convention_id ?>&imagename=<?php echo $imagename  ?>" class="btn-delete">delete </a>
       <a href="convention_update.php?id=<?php echo $convention_id ?>" class="btn-modify">modifie</a>
            
          </td>    
          
            </tr>  
  <?php
      $i = $i + 1 ;  // Set to false after the first iteration
      }
    }
    $conn->close();
  ?>
  
     
     <br>
   </tbody>
 </table> 
</div>


</body>
</html>