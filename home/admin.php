<?php
  session_start();
  $user_id = "";

  if (isset($_SESSION["user_id"]) || isset($_SESSION["admin"])) { 
    if (isset($_SESSION["user_id"])) {
      $user_id = $_SESSION["user_id"]; 
      if ($user_id != 'admin') {
        header("Location: user.php");
        exit();
      }
    }
     
  } else { 
      header("Location: login.php"); 
      exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="admin-container">
 
  <aside class="sidebar">
    <div class="profile-section">
      <img src="../img/user-1.jpg" alt="Profile Picture" class="profile-pic">
      <div class="profile-info">
        <h3>Osama bin Laden</h3>
        <p>ID:admin123</p>
      </div>
    </div>
    <nav class="menu">
      <ul>
        <li><a href="admin.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="manageuser.php"><i class="fas fa-users"></i> Users</a></li>
        <li><a href="../Admin0/home.php"><i class="fas fa-graduation-cap"></i> Courses</a></li>
        <li><a href="announcementadmin.php"><i class="fas fa-bullhorn"></i> Announcements</a></li>
        <li><a href="feedbackadmin.php" ><i class="fas fa-comment"></i> Feedback</a></li>
      </ul>
    </nav>
    <form method="post" action="logoff.php">
        <button name="logoff" type="submit" class="logout-btn">
          <i class="fas fa-sign-out-alt"></i> Log Out 
        </button>
    </form>
  </aside>

 
  <main class="main-content">
    <div class="grid-container">
      <a href="manageuser.php" style="text-decoration: none;">
      <div class="card">
        <div class="card-icon"><i class="fas fa-users"></i></div>
        <div class="card-content">
          <h3>Users</h3>
          <p>Number of users</p>
        </div>
      </div>
      </a>
      <a href="../Admin0/home.php"style="text-decoration: none;">
      <div class="card" >
        <div class="card-icon"><i class="fas fa-graduation-cap"></i></div>
        <div class="card-content">
          <h3>Courses</h3>
          <p>Number of courses</p>
        </div>
      </div>
      </a>
     <a href="announcementadmin.php" style="text-decoration: none;">
      <div class="card" >
        <div class="card-icon"><i class="fas fa-bullhorn"></i></div>
        <div class="card-content">
          <h3>Announcements</h3>
          <p>Number of announcements</p>
        </div>
      </div>
     </a>
      <a href="feedbackadmin.php" style="text-decoration: none;">
        <div class="card" >
          <div class="card-icon"><i class="fas fa-comment"></i></div>
          <div class="card-content">
            <h3>Feedback</h3>
            <p>Number of feedbacks</p>
          </div>
        </div>
      </a>
    </div>
  </main>
</div>


</body>
</html>
