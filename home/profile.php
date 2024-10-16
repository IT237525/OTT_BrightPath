<?php
session_start(); // Start session
include('db_connect.php');

// Initialize success_message to avoid undefined variable error
$success_message = "";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id']; // Get user ID from session

// Fetch user details from database
$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        // Delete user account
        $delete_sql = "DELETE FROM users WHERE user_id = '$user_id'";
        $conn->query($delete_sql);
        session_destroy();
        header('Location: login.php');
        exit();
    } elseif (isset($_POST['logoutuser'])) {
        // Logout
        session_destroy();
        header('Location: index.php');
        exit();
    } elseif (isset($_POST['update_profile'])) {
        // Get form data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_name = $_POST['user_name'];
        $mobile = $_POST['mobile'];
        $update_sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', user_name = '$user_name', mobile = '$mobile' WHERE user_id = '$user_id'";
        $success_message = "Profile updated successfully!";
    
        $conn->query($update_sql);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
  
    <style>
 


.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 999;
}


.profile-popup {
    background: #f0f8ff;
    width: 40%;
    max-height: 80vh;
    overflow-y:scroll;
    scrollbar-width: none;
    border-radius: 20px;
    padding: 20px;
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
    text-align: center;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}


.profile-popup h2 {
    font-size: 28px;
    font-weight: bold;
    color: #004e92;
    margin-bottom: 15px;
}

.profile-popup form label {
    display: block;
    margin-bottom: 10px;
    font-size: 16px;
    font-weight: 600;
    color: #007acc;
}

.profile-popup form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #cce7ff;
    border-radius: 8px;
    font-size: 16px;
    background: #f7fbff;
    color: #004e92;
}


.profile-popup form button {
    padding: 10px 20px;
    background: #007acc;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

#delete_button {
    background: #ff4d4d;
}

#logout_button {
    background: #ff6b6b;
}

.success-message {
    color: #007acc;
    font-weight: bold;
    margin-bottom: 20px;
    background: #e6f2ff;
    padding: 10px;
    border-radius: 5px;
}


.close-button {
    position: absolute;
    top: 10px;
    right: 20px;
    font-size: 30px;
    color: #007acc;
    cursor: pointer;
}

    </style>
</head>
<body>
    <div class="profile-popup">
        <h2>Your Profile</h2>
        <?php if ($success_message): ?>
            <div id="success_message" class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <a href="index.php"><span class="close-button" id="close_button">&times;</span></a>
        <form method="POST" action="">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>" disabled required><br>
            
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>" disabled required><br>
            
            <label for="user_name">Username:</label>
            <input type="text" id="user_name" name="user_name" value="<?php echo $user['user_name']; ?>" disabled required><br>
            
            <label for="mobile">Mobile Number:</label>
            <input type="text" id="mobile" name="mobile" value="<?php echo $user['mobile']; ?>" disabled required><br>
            
           
            
            <button type="button" id="edit_button">Edit</button>
            <button type="submit" id="done_button" name="update_profile" disabled style="display:none;">Done</button>
            <button type="submit" name="delete" id="delete_button">Delete Account</button>
            <form action="logoutuser.php" method="POST">
                <button type="submit" name="logoutuser" id="logout_button">Logout</button>
            </form>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButton = document.getElementById("edit_button");
            const doneButton = document.getElementById("done_button");
            const successMessage = document.getElementById("success_message");

            const formFields = document.querySelectorAll('#first_name, #last_name, #user_name, #mobile');

            // Enable editing when Edit button is clicked
            editButton.addEventListener('click', () => {
                formFields.forEach(field => field.disabled = false);
                doneButton.disabled = false;
                editButton.style.display = "none";
                doneButton.style.display = "inline-block";

              
            });

            // Automatically hide success message after a few seconds
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 3000);
            }
        });
    </script>
</body>
</html>
