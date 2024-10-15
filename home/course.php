<?php
  require 'db_connect.php';

  $sql = "SELECT * FROM product";
  $all_product = $conn->query($sql);
?>

<?php
        session_start();
        // Check if user_id is set in the session
        if (isset($_SESSION["user_id"])) {
            // Include announcements if user is logged in
            include('header.php');
        }else{
            include('header0.php');
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/course.css">
</head>
<body> 
    
    <div style="height:100px; width:100vw;"></div>

  <h1 class="title">Available Courses</h1>
 

  <main>
        <?php
            while($row = mysqli_fetch_array($all_product)){
        ?>
        <div class="card">
            <div class="image">
                <img src="../Admin0/<?php echo $row["product_image"]; ?>" alt="">
            </div>
            <div class="caption">
                <p class="rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </p>
                <p class="product_name"><b><?php echo $row["product_name"];  ?></b></p>
                <p class="caption"><?php echo $row["product_caption"]; ?></p>
                <!-- <p class="description"><b><?php //echo $row["product_description"]; ?></b></p> -->
            </div>
        </div>
        <?php
            }
        ?>
  </main>
        <?php
        include('footer.php');
        ?>
</body>
</html>