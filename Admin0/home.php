<?php
  include 'connection.php';

  $sql = "SELECT * FROM product";
  $all_product = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Courses</title>
</head>
<body>
    <?php
      include 'header.php';

   ?>

   <main>
        <?php
            while($row = mysqli_fetch_array($all_product)){
        ?>
        <div class="card">
            <div class="image">
                <img src="<?php echo $row["product_image"]; ?>" alt="">
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
            <button class="edit" data-id="<?php echo $row["product_id"]; ?>">Edit</button>
            <button class="delete" data-id="<?php echo $row["product_id"]; ?>">Delete</button>
        </div>
        <?php
            }
        ?>
   </main>
   <script>
   document.addEventListener("DOMContentLoaded", function() {
        var removeButtons = document.getElementsByClassName("delete");
        for (var i = 0; i < removeButtons.length; i++) {
            removeButtons[i].addEventListener("click", function(event) {
                var target = event.target;
                var product_id = target.getAttribute("data-id");

                fetch("delete.php?product_id=" + product_id)
                    .then(response => {
                        if (response.ok) {
                            target.parentElement.remove(); // Remove the product card from the DOM
                        } else {
                            console.error('Error:', response.statusText);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        }
        var editButtons = document.getElementsByClassName("edit");
        for (var i = 0; i < editButtons.length; i++) {
            editButtons[i].addEventListener("click", function(event) {
                var target = event.target;
                var product_id = target.getAttribute("data-id");

                window.location.href = "edit.php?id=" + product_id;
            });
        }

    });
    </script>
</body>
</html>