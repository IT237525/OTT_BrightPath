<?php
    session_start();
    if(isset($_SESSION["admin"])) { //Already logged in
        header("Location:admin.php"); //Redirect to the admin page
    }
    else if(isset($_SESSION["user_id"])){
        header("Location:user.php"); //Redirect to the user page
    }
?>

<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $admin = "admin";
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
      
        if (password_verify($password, $user['password'])) {
            echo "Login successful!";
            
            // Check if user is admin based on their email
            if ($user['email'] == $admin) {
                session_start();
                $_SESSION['admin'] = $user['email']; // Store email for session
                header('Location: admin.php');
                exit();
            } else if($user['email'] == $email){
                session_start();
                $_SESSION['user_id'] = $user['user_id']; // Store user_id for session
                $_SESSION['email_address'] = $_POST['email'];
                header('Location:user.php');
                exit();
            }else{
                header('Location:login.php');
                exit();
            }
        } else {
            echo "<script>alert('Invalid Password!');</script>";
        }
    } else {
        echo "<script>alert('No user fund in this email!');</script>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/login.css"> 
</head>
<body>

  <div class="form">
      <div class="title">Welcome</div>
      <div class="subtitle">Let's log in to your account!</div>

      <form action="login.php" method="POST">
          
      <div class="input-container ic2">
        <input id="email" name="email" class="input" type="text" placeholder="Email" required />
        <div class="cut"></div>
        <label for="email" class="placeholder">Email</label>
        <small id="emailMessage" style="color: red;"></small> 
      </div>

      <script>
        const emailInput = document.getElementById('email');
        const emailMessage = document.getElementById('emailMessage');

        emailInput.addEventListener('input', () => {
            const emailValue = emailInput.value;
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (emailValue.toLowerCase() === 'admin') {
                emailInput.style.borderColor = '';
                emailMessage.textContent = '';
            } else if (!regex.test(emailValue)) {
                emailInput.style.borderColor = 'red';
                emailMessage.textContent = 'Invalid Email';
            } else {
                emailInput.style.borderColor = '';
                emailMessage.textContent = '';
            }
    });
    </script>
<script>
        const emailInput = document.getElementById('email');
        const emailMessage = document.getElementById('emailMessage');

        emailInput.addEventListener('input', () => {
        const emailValue = emailInput.value;
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regex.test(emailValue)) {
        emailInput.style.borderColor = 'red';
        emailMessage.textContent = 'Invalid Email';
        } else {
        emailInput.style.borderColor = '';
        emailMessage.textContent = '';
        }
        });
      </script>
        

          <div class="input-container ic2">
              <input id="password" name="password" class="input" type="password" placeholder="Password" required />
              <div class="cut"></div>
              <label for="password" class="placeholder">Password</label>
          </div>

        

          <button type="submit" class="submit">Log In</button>
      </form>

   
       
      <div class="links">
          <a href="register.php">Don't have an account? Register here.</a>
      </div>
  </div>
</body>
</html>