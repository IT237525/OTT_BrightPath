<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    // Handle Create/Update Announcement
    if ($action === 'create' || $action === 'update') {
        $announcement_text = $_POST['announcement_text'];
        $announcement_id = isset($_POST['announcement_id']) ? $_POST['announcement_id'] : null;

        if ($action === 'create') {
            // Insert new announcement
            $stmt = $conn->prepare("INSERT INTO announcements (announcement_text) VALUES (?)");
            $stmt->bind_param("s", $announcement_text);
            $stmt->execute();
        } else if ($action === 'update' && $announcement_id) {
            // Update existing announcement
            $stmt = $conn->prepare("UPDATE announcements SET announcement_text = ? WHERE announcement_id = ?");
            $stmt->bind_param("si", $announcement_text, $announcement_id);
            $stmt->execute();
        }
    }

    // Handle Delete Announcement
    if ($action === 'delete' && isset($_POST['announcement_id'])) {
        $announcement_id = $_POST['announcement_id'];
        $stmt = $conn->prepare("DELETE FROM announcements WHERE announcement_id = ?");
        $stmt->bind_param("i", $announcement_id);
        $stmt->execute();
    }
}

// Fetch all announcements
$result = $conn->query("SELECT * FROM announcements ORDER BY announcement_date DESC");

$conn->close();
?>
