<?php
session_start();
include 'db_connect.php'; // Database connection

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Insert feedback
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_feedback'])) {
    $feedback = $_POST['feedback'];

    // Insert new feedback
    $sql = "INSERT INTO feedback (user_id, feedback) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user_id, $feedback);
    $stmt->execute();
    $stmt->close();
}

// Update feedback
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_feedback'])) {
    $feedback_id = $_POST['feedback_id'];
    $feedback = $_POST['feedback'];

    // Update existing feedback
    $sql = "UPDATE feedback SET feedback = ? WHERE feedback_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $feedback, $feedback_id, $user_id);
    $stmt->execute();
    $stmt->close();
}

// Fetch user's feedback
$sql = "SELECT * FROM feedback WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Feedback</title>
    <link rel="stylesheet" href="../css/feedback.css">
   
</head>
<body>

<div class="container">
    <h2>Submit Feedback</h2>
    <form method="POST" action="feedback.php">
        <textarea name="feedback" placeholder="Enter your feedback here"></textarea>
        <button type="submit" name="submit_feedback">Submit</button>
    </form>

    <h3>Your Feedback</h3>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="feedback-entry">
            <form method="POST" action="feedback.php" class="edit-form">
                <input type="hidden" name="feedback_id" value="<?php echo $row['feedback_id']; ?>">
                <textarea name="feedback"><?php echo $row['feedback']; ?></textarea>
                <button type="button" class="edit-btn">Edit</button>
                <button type="submit" name="update_feedback" class="done-btn" style="display:none;">Done</button>
            </form>
            <small>Submitted on: <?php echo $row['created_at']; ?></small>
        </div>
    <?php } ?>
</div>

</body>
</html>
<script src="../js/feedback.js"></script>
<?php
$stmt->close();
$conn->close();
?>
