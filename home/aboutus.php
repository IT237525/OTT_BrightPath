<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "online_teacher_trainer"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_question'])) {
    $question = $_POST['question'];

    $sql = "INSERT INTO user_questions (question) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $question);

    if ($stmt->execute()) {
        echo "<script>alert('Question submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error submitting question: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM user_questions WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Question deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting question: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    echo "<script>alert('Update functionality not implemented yet.');</script>";
}

$sql = "SELECT * FROM user_questions";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Online Teacher Trainer Portal</title>
    <link rel="stylesheet" href="../css/aboutUs.css">
</head>
<body>
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
    <div style="height:100px; width:100vw;"></div>

    <div class="about-section">
        <h1 class="heading">About Us</h1>
        <img src="../img/about.jpg" alt="Teacher Training" class="about-image">
        <p>Welcome to the Online Teacher Trainer Portal. We provide high-quality training to help educators enhance their teaching skills and adapt to modern educational methodologies. Our courses are tailored to meet the needs of teachers around the globe, offering practical knowledge and certifications.</p>
    </div>

    <div class="help-section">
        <h2 class="heading">Ask for Help</h2>
        <form method="POST" action="aboutus.php">
            <label for="question">Your Question:</label><br>
            <textarea id="question" name="question" rows="4" cols="50" required></textarea><br>
            <button type="submit" name="submit_question" class="b1">Submit</button>
        </form>
    </div>

    <div class="question-section">
        <h2 class="heading">User Questions</h2>
        <?php

        include 'db_connect.php';

      
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='question'>";
                echo "<p>" . htmlspecialchars($row['question']) . "</p>";
                echo "<form method='POST' action='aboutUs.php'>
                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                        <button type='submit' name='delete'>Delete</button>
                        <button type='submit' name='update'>Update</button>
                      </form>";
                echo "</div>";
            }
        } else {
            echo "<p>No questions yet.</p>";
        }
        $conn->close();
        ?>
        <button class="b1"> <a href="feedback.php">feed back</button>
            
        </a>
    </div>
    <?php
        include 'footer.php';
     ?>
</body>
</html>
