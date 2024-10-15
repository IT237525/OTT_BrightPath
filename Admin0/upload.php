<?php

require_once 'connection.php';

if(isset($_POST["submit"])){
  $productname = $_POST["productname"];
  $caption = $_POST["caption"];
  $description = $_POST["description"];

  //For uploads photos
  $upload_dir = "uploads/"; //this is where the uploaded photo stored
  $product_image = $upload_dir.$_FILES["imageUpload"]["name"];
  $upload_dir.$_FILES["imageUpload"]["name"];
  $upload_file = $upload_dir.basename($_FILES["imageUpload"]["name"]);
  $imageType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION)); //used to detected the image format
  $check = $_FILES["imageUpload"]["size"]; // to detect the size of the image
  $upload_ok = 0;

  if(file_exists($upload_file)){
      echo "<script>alert('The file already exist')</script>";
      $upload_ok = 0;
  }else{
      $upload_ok = 1;
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
  }

  if($upload_ok == 0){
     echo '<script>alert("sorry your file is doesn\'t uploaded. Please try again")</script>';
  }else{
      if($productname != "" && $caption !=""){
          move_uploaded_file($_FILES["imageUpload"]["tmp_name"],$upload_file);

          $sql = "INSERT INTO product(product_name,product_caption,product_description,product_image)
          VALUES('$productname','$caption','$description','$product_image')";

          if($conn->query($sql) === TRUE){
              echo "<script>alert('your product uploaded successfully')</script>";
              header("Location: home.php");
          }
          else{
            header("Location: edit.php");
          }
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
    <title>Document</title>
    <link rel="stylesheet" href="upload.css">
</head>
<body>
    <?php
         include_once 'header.php';

    ?>
    <section id="upload_container">
        <form action="upload.php" method="POST" enctype="multipart/form-data" >
            <input type="text" name="productname" id="productname" placeholder="Course Name" required>
            <input type="text" name="caption" id="caption" placeholder="Course Caption" required>
            <!-- <input type="text" name="description" id="description" placeholder="Course Description"> -->
            <textarea name="description" id="description" placeholder="Course Description"></textarea>
            <input type="file" name="imageUpload" id="imageUpload" required hidden>
            <button id="choose" onclick="upload();">Choose Image</button>
            <input type="submit" value="Upload" name="submit">
        </form>
    </section>

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
</body>
</html>