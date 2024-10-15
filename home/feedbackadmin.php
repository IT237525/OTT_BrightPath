<?php
session_start();
include 'db_connect.php';

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

// Delete feedback
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_feedback'])) {
    $feedback_id = $_POST['feedback_id'];

    $sql = "DELETE FROM feedback WHERE feedback_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $feedback_id);
    $stmt->execute();
    $stmt->close();
}

// Fetch all feedback
$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Feedback Management</title>
    <link rel="stylesheet" href="../css/feedback.css">
</head>
<body>

<div class="container">
    <h2>Feedback Management</h2>

    <table>
        <thead>
            <tr>
                <th>Feedback ID</th>
                <th>User ID</th>
                <th>Feedback</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['feedback_id']; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['feedback']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td>
                    <form method="POST" action="admin_feedback.php">
                        <input type="hidden" name="feedback_id" value="<?php echo $row['feedback_id']; ?>">
                        <button type="submit" name="delete_feedback">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script src="../js/feedback.js"></script>
</body>
</html>

<?php
$conn->close();
?>
