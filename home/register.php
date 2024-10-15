<?php
include 'db_connect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Collect form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Calculate age
    $age = date_diff(date_create($dob), date_create('today'))->y;

   

        // Insert user into the database
        $sql = "INSERT INTO users (first_name, last_name, user_name, user_id, email, mobile, dob, age, gender, password)
                VALUES ('$first_name', '$last_name', '$user_name', '$user_id', '$email', '$mobile', '$dob', '$age', '$gender', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo  "<script>alert('Register successful successful!');</script>";
            session_start();
            $_SESSION['user_id'] = $user_id;
            header('Location: index.php');
        } else {
            header('Location:login.php');
        }
    }




$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="../css/register.css"> <!-- Registration-specific CSS -->
</head>
<body>

  <div class="form">
      <div class="title">Welcome</div>
      <div class="subtitle">Let's create your account!</div>

      <!-- Registration Form -->
      <form action="register.php" method="POST">
          <!-- First Name and Last Name on the same line -->
          <div class="name-container">
              <div class="input-container ic-half">
                  <input id="first-name" name="first_name" class="input" type="text" placeholder=" " required />
                  <div class="cut"></div>
                  <label for="first-name" class="placeholder">First Name</label>
              </div>
              <div class="input-container ic-half">
                  <input id="last-name" name="last_name" class="input" type="text" placeholder=" " required />
                  <div class="cut"></div>
                  <label for="last-name" class="placeholder">Last Name</label>
              </div>
          </div>

          <!-- User ID Input -->
          <div class="input-container ic2">
              <input id="user-name" name="user_name" class="input" type="text" placeholder=" " required />
              <div class="cut"></div>
              <label for="user-id" class="placeholder">User Name</label>
              <div class="validation-message" id="user-name-message"></div>
          </div>

          <!-- Email Input -->
          <div class="input-container ic2">
              <input id="email" name="email" class="input" type="email" placeholder=" " required />
              <div class="cut"></div>
              <label for="email" class="placeholder">Email</label>
              <div class="validation-message" id="email-message"></div>
          </div>

          <!-- Mobile Number Input -->
          <div class="input-container ic2">
              <input id="mobile" name="mobile" class="input" type="text" placeholder=" " required />
              <div class="cut"></div>
              <label for="mobile" class="placeholder">Mobile Number</label>
              <div class="validation-message" id="mobile-message"></div>
          </div>

          <!-- Date of Birth Input -->
          <div class="input-container ic2">
              <input id="dob" name="dob" class="input" type="date" placeholder=" " required />
              <div class="cut"></div>
              <label for="dob" class="placeholder">Date of Birth</label>
              <div class="validation-message" id="dob-message"></div>
          </div>

          <!-- Gender Selection -->
          <div class="input-container ic2">
              <select id="gender" name="gender" class="input" required>
                  <option value="" disabled selected>Select Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
              </select>
              <div class="cut"></div>
              <label for="gender" class="placeholder">Gender</label>
          </div>

          <!-- Password Input -->
          <div class="input-container ic2">
              <input id="password" name="password" class="input" type="password" placeholder=" " required />
              <div class="cut"></div>
              <label for="password" class="placeholder">Create Password</label>
              <div class="validation-message" id="password-message"></div>
          </div>

          <!-- Confirm Password Input -->
          <div class="input-container ic2">
              <input id="confirm-password" name="confirm_password" class="input" type="password" placeholder=" " required />
              <div class="cut"></div>
              <label for="confirm-password" class="placeholder">Confirm Password</label>
              <div class="validation-message" id="confirm-password-message"></div>
          </div>

          <!-- Terms and Conditions Checkbox -->
          <div class="input-container ic2">
              <input type="checkbox" id="terms" name="terms" required />
              <label for="terms">I accept the <a href="tearmsandC.php">Terms and Conditions</a></label>
          </div>

          <!-- Submit Button -->
          <button type="submit" class="submit">Register</button>
      </form>

      <!-- Link to Log In Page -->
      <div class="links">
          Already have an account? <a href="login.php">Log in here</a>
      </div>
  </div>

  <script src="../js/registration.js"></script> <!-- Registration-specific JavaScript -->
</body>
</html>
