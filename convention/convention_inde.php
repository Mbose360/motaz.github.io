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
    <link rel="stylesheet" href="styl.css">
    <title>Document</title>

</head>
<body>
<nav>
      <div class="nav-container">
        <div>
            <a href="">logo</a>
        </div>
        <div>
            <a href="../index1.php">Home</a>
            <a href="../Promotion/promotion_index">Promotion</a>
            <a href="../convention/convention_index">convention</a>
            <a href="../contact/contact_index">contact</a>
        </div>
      </div>
    </nav>
   
    <div class="span">
      <span>convention</span>
    </div>


 <?php
      if(isset($_SESSION['error_msg'])){
        $num = $_SESSION['error_msg'];
           echo  $num;
           
           unset ($_SESSION['error_msg']);
          
     }
     if(isset($_SESSION['delete'])){
      $num = $_SESSION['delete'];
         echo  $num;
         
         unset ($_SESSION['delete']);
   }

   if(isset($_SESSION['convention-update'])){
    $num = $_SESSION['convention-update'];
       echo  $num;
       
       unset ($_SESSION['convention-update']);
 }
     
     ?>
    
    
    <div class="divv"><a href="convention_add" class="add">Add a convention </a></div>
<div>
<table class="content-table">
   <thead>
     <tr>
       <th>id</th>
       <th>convention_name</th>
       <th>image</th>
       <th>options</th>
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
       <td>
        
        

        <a  href="convention_delete.php?id=<?php echo $convention_id ?>&imagename=<?php echo $imagename  ?>" class="delete">delete </a>
       <a href="convention_update.php?id=<?php echo $convention_id ?>" class="modifie">modifie</a>
            
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