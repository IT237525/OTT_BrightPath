<?php
require_once 'connection.php';

if (isset($_POST['update_product'])) {
    $productname = $_POST["productname"];
    $caption = $_POST["caption"];
    $description = $_POST["description"];

    if(!empty($_FILES["imageUpload"]["name"]))
    {
        //For uploads photos
        $upload_dir = "uploads/"; //this is where the uploaded photo stored
        $product_image = $upload_dir.$_FILES["imageUpload"]["name"];
        $upload_dir.$_FILES["imageUpload"]["name"];
        $upload_file = $upload_dir.basename($_FILES["imageUpload"]["name"]);
        $imageType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION)); //used to detected the image format
        $check = $_FILES["imageUpload"]["size"]; // to detect the size of the image
        $upload_ok = 0;

        if($check !== false){
            $upload_ok = 1;
            if($imageType == 'jpg' || $imageType == 'png' || $imageType == 'jpeg' || $imageType == 'gif'){
                $upload_ok = 1;
            }else{
                echo '<script>alert("please change the image format")</script>';
            }
        }else{
            echo '<script>alert("The photo size is 0 please change the photo ")</script>';
            $upload_ok = 0;
        }

        if($productname != "" && $caption !=""){
            move_uploaded_file($_FILES["imageUpload"]["tmp_name"],$upload_file);

            $sql = "UPDATE product SET product_name='$productname', product_caption='$caption', product_description='$description', product_image='$product_image' WHERE product_id='" . $_POST["product_id"] . "';";

            if($conn->query($sql) === TRUE){
                echo "<script>alert('your product uploaded successfully')</script>";
                header("Location: home.php");
            }
        }
    }
    else
    {
        $sql = "UPDATE product SET product_name='$productname', product_caption='$caption', product_description='$description', product_image='" . $_POST["oldImage"]. "' WHERE product_id='" . $_POST["product_id"] . "';";
    
        if($conn->query($sql) === TRUE){
            echo "<script>alert('your product uploaded successfully')</script>";
            header("Location: home.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css">
    <title>Course Panel</title>
</head>
<body>
    <?php
      include_once 'connection.php';
      include_once 'header.php';
      $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
   ?>

   <main>
        <?php
        $sql = "SELECT * FROM product";
        $all_product = $conn->query($sql);
            while($row = mysqli_fetch_array($all_product)){
                if($row['product_id'] == $product_id){
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
                <p class="caption">caption<br><?php echo $row["product_caption"]; ?></p>
                <!-- <p class="description"><b><?php //echo $row["product_description"]; ?></b></p> -->
            </div>
        </div>
        <?php
                }
            }
        ?>


    <?php
        if(isset($_GET['id']))
        {
            $query = "SELECT * FROM product WHERE product_id='$product_id' ";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                $product = mysqli_fetch_array($query_run);
    ?>
    <section id="upload_container">
        <form action="edit.php" method="POST" enctype="multipart/form-data" >
            <input type="text" name="product_id" value="<?=$product['product_id'];?>" class="form-control" id="product_id" placeholder="Course Name" hidden>
            <input type="text" name="productname" value="<?=$product['product_name'];?>" class="form-control" id="productname" placeholder="Course Name">
            <input type="text" name="caption" value="<?=$product['product_caption'];?>" class="form-control" id="caption" placeholder="Course Caption">
            <!-- <input type="text" name="description" value="<?php //$product['product_description'];?>" class="form-control" id="description" placeholder="Course Description"> -->
            <textarea name="description" id="description" placeholder="Course Description"><?=$product['product_description'];?></textarea>
            <input type="file" name="imageUpload" id="imageUpload" value="<?=$product['product_image'];?>" hidden>
            <input type="hidden" name="oldImage" id="oldImage" value="<?=$product['product_image'];?>" hidden>
            <button type="button" id="choose" onclick="upload();">Choose Image</button>
            <input type="submit" value="Save" name="update_product">
        </form>
    </section>
    <?php
            }
            else
            {
                echo "<h4>No Such Id Found</h4>";
            }
        }
    ?>
</body>

<script>
        var productname = document.getElementById("productname");
        var caption = document.getElementById("caption");
        var description = document.getElementById("description");
        var choose = document.getElementById("choose");
        var uploadImage = document.getElementById("imageUpload");

        function upload(){
            uploadImage.click();
        }

        uploadImage.addEventListener("change",function(){
            var file = this.files[0];
            if(productname.value == ""){
                productname.value = file.name;
            }
            choose.innerHTML = "You can change("+file.name+") picture";
        })
    </script>

</html>