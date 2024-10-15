<?php
if (isset($_GET['product_id'])) {
    include("connection.php");
    $product_id = $_GET['product_id'];
    $sql = "DELETE FROM product WHERE product_id='$product_id'";
    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION["delete"] = "Item Deleted Successfully!";
        echo "Deleted";
    } else {
        die("Something went wrong");
    }
} else {
    echo "Item does not exist";
}
?>