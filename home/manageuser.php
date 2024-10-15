<?php

include 'db_connect.php';
// Check if form was submitted for user update
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['user_name'];
    $mobile = $_POST['mobile'];

    $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', user_name='$user_name', mobile='$mobile' WHERE id=$id";
    $conn->query($sql);
}

// Delete user
if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM users WHERE id=$id";
    $conn->query($sql);
}

// Fetch users
$result = $conn->query("SELECT * FROM users");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Users</title>
    <link rel="stylesheet" href="../css/manageuser.css">
</head>
<body>
    <h2>Manage Users</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Mobile</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <form method="POST" action="">
                    <td><?= $row['id'] ?></td>
                    <td><input type="text" name="first_name" value="<?= $row['first_name'] ?>" disabled></td>
                    <td><input type="text" name="last_name" value="<?= $row['last_name'] ?>" disabled></td>
                    <td><input type="text" name="user_name" value="<?= $row['user_name'] ?>" disabled></td>
                    <td><input type="text" name="mobile" value="<?= $row['mobile'] ?>" disabled></td>
                    <td>
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="button" class="edit-btn">Edit</button>
                        <button type="submit" name="update" class="done-btn" style="display:none;">Done</button>
                        <button type="submit" name="delete">Delete</button>
                    </td>
                </form>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <script src="../js/manageuser.js"></script>
</body>
</html>
