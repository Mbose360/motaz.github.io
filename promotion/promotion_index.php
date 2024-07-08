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
    <link rel="stylesheet" href="sty.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Promotion</title>
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
    <span>Promotion</span>
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

<div class="divv"><a href="promotion_add" class="btn-add">Add a promotion</a></div>
<div class="table-container">
    <table class="content-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Convention Name</th>
            <th>Image</th>
            <th>End Date</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Fetch images from the database
        $sql = "SELECT * FROM promotion";
        $result = $conn->query($sql);
        $i = 1;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imagePath = $row['img'];
                $promotion_name = $row['name'];
                $end_date = $row['enddate'];
                $convention_id = $row['id'];
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $promotion_name ?></td>
                    <td><img src="../images/<?php echo $imagePath; ?>" height="150px" alt=""></td>
                    <td><?php echo $end_date ?></td>
                    <td class="options">
                        <a href="promotion_delete.php?id=<?php echo $convention_id ?>&imagename=<?php echo $imagePath ?>" class="btn-delete">Delete</a>
                        <a href="promotion_update.php?id=<?php echo $convention_id ?>" class="btn-modify">Modify</a>
                    </td>
                </tr>
                <?php
                $i++;
            }
        }
        $currentDate = date("Y-m-d");
        $sql = "DELETE FROM promotion WHERE enddate >= '$currentDate'";
        $conn->query($sql);
        $conn->close();
        ?>
        </tbody>
    </table>
</div>
</body>
</html>

