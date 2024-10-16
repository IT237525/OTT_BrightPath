<?php
include 'db_connect.php';


$action = $_POST['action'] ?? '';

if ($action === 'create') {
    
    $announcement_text = $_POST['announcement_text'];
    $conn->query("INSERT INTO announcements (announcement_text) VALUES ('$announcement_text')");
} elseif ($action === 'update') {
    
    $announcement_text = $_POST['announcement_text'];
    $announcement_id = $_POST['announcement_id'];
    $conn->query("UPDATE announcements SET announcement_text = '$announcement_text' WHERE announcement_id = $announcement_id");
} elseif ($action === 'delete') {
   
    $announcement_id = $_POST['announcement_id'];
    $conn->query("DELETE FROM announcements WHERE announcement_id = $announcement_id");
}


$result = $conn->query("SELECT * FROM announcements ORDER BY announcement_date DESC");

$conn->close();


?>
