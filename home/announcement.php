<!-- announcement_sidebar.php -->
<?php
include 'db_connect.php';
// Fetch all announcements
$result = $conn->query("SELECT announcement_text, announcement_date FROM announcements ORDER BY announcement_date DESC");
$conn->close();
?>

<head>
    <link rel="stylesheet" href="../css/announcement.css"> <!-- External CSS -->
</head>

<div class="sidebar" id="announcement-sidebar">
    <div class="sidebar-header">
        <h2>Announcements</h2>
        <button class="close-btn" onclick="closeSidebar()">×</button>
    </div>
    <div class="announcement-list">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='announcement-item'>";
                echo "<span class='announcement-date'>" . date("F j, Y", strtotime($row['announcement_date'])) . "</span>";
                echo "<p class='announcement-text'>{$row['announcement_text']}</p>";
                echo "</div>";
            }
        } else {
            echo "<p class='no-announcements'>No announcements available.</p>";
        }
        ?>
    </div>
</div>


<!-- Overlay for when sidebar is open -->
<div class="overlay" id="overlay" onclick="closeSidebar()"></div>

<script>
    function openSidebar() {
        document.getElementById('announcement-sidebar').style.display = 'block';
        document.body.classList.add('sidebar-open');
        document.body.classList.add('blur');
    }

    function closeSidebar() {
        document.body.classList.remove('sidebar-open');
        document.body.classList.remove('blur');
    }
</script>


