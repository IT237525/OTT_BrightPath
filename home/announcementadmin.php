<?php
include 'db_connect.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_announcement'])) {
    $announcementText = $_POST['announcementText'];
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO announcements (announcement_text,announcement_date) VALUES ('$announcementText', '$date')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert(' ". "Announcement added successfully" . " ')</script>";
        // header("Location: announcementadmin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['edit_announcement'])) {
    $id = $_POST['announcement_id'];
    $newText = $_POST['newText'];

    $sql = "UPDATE announcements SET announcement_text='$newText' WHERE announcement_id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert(' ". "Announcement updated successfully" . " ')</script>";
        // header("Location: announcementadmin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['delete_announcement'])) {
    $id = $_POST['announcement_id'];

    $sql = "DELETE FROM announcements WHERE announcement_id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert(' ". "Announcement deleted successfully" . " ')</script>";
        // header("Location: announcementadmin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Announcements</title>
    <link rel="stylesheet" href="../css/announcementadmin.css">
</head>
<body>
    <div class="container">
        <h1>Manage Announcements</h1>

        
        <form id="announcementForm" method="POST" action="">
            <textarea id="announcementText" name="announcementText" placeholder="Enter your announcement here..." required></textarea>
            <button type="submit" name="add_announcement">Add Announcement</button>
        </form>

       
        <table id="announcementTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Announcement</th>
                    <th>Date & Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                        $sql = "SELECT * FROM announcements ORDER BY announcement_date DESC";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['announcement_id']; ?></td>
                            <td><?php echo $row['announcement_text']; ?></td>
                            <td><?php echo $row['announcement_date']; ?></td>
                            <td>
                            
                                <form method="POST" action="" style="display:inline-block;">
                                    <input type="hidden" name="announcement_id" value="<?php echo $row['announcement_id']; ?>">
                                    <input type="text" name="newText" placeholder="Edit announcement" required>
                                    <button type="submit" name="edit_announcement" class="edit-btn">Edit</button>
                                </form>

                                <form method="POST" action="" style="display:inline-block;">
                                    <input type="hidden" name="announcement_id" value="<?php echo $row['announcement_id']; ?>">
                                    <button type="submit" name="delete_announcement" class="delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="4">No announcements found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
