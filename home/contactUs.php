<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../css/contactUs.css">
    <script>
        function validateForm() {
            var firstName = document.getElementById("first_name").value;
            var lastName = document.getElementById("last_name").value;
            var phoneNumber = document.getElementById("phone_number").value;
            var emailAddress = document.getElementById("email_address").value;
            var message = document.getElementById("message").value;

            if (firstName == "" || lastName == "" || phoneNumber == "" || emailAddress == "" || message == "") {
                alert("All fields must be filled out");
                return false;
            }

            var phonePattern = /^[0-9]{10}$/;
            if (!phoneNumber.match(phonePattern)) {
                alert("Please enter a valid 10-digit phone number");
                return false;
            }

            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailAddress.match(emailPattern)) {
                alert("Please enter a valid email address");
                return false;
            }

            return true;
        }
    </script>
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

    <div class="cont">
        <h1>Contact Us</h1>
    </div>

    <div class="detail">
        <h2>Send message</h2>

        <div>
            <form id="form" method="POST" onsubmit="return validateForm();">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name"><br>

                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name"><br>

                <label for="phone_number">Phone number:</label>
                <input type="text" id="phone_number" name="phone_number"><br>

                <label for="email_address">Email Address:</label>
                <input type="text" id="email_address" name="email_address"><br>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4"></textarea><br>

                <button type="submit" class="sub">Submit</button>
            </form>
        </div>

        <div>
            <h4>Contact Us</h4>
            <h4>Hotline Contact</h4>
            <div>Email: brightpath@gmail.com</div>
            <div>Phone: +94987654321</div>
            <div>Address: Kantharmadam, Jaffna.</div>
        </div>
    </div>

    <?php
         include 'footer.php';
     ?>

    <?php
        // PHP back-end script to handle form submission and SQL insertion
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form input values
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $phoneNumber = $_POST['phone_number'];
            $emailAddress = $_POST['email_address'];
            $message = $_POST['message'];

            // MySQL database connection
            $servername = "localhost";
            $username = "root";
            $password = "";  // Change this according to your database credentials
            $dbname = "online_teacher_trainer";  // Use your database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to insert form data into 'contacts' table
            $sql = "INSERT INTO contacts (first_name, last_name, phone_number, email_address, message)
                    VALUES ('$firstName', '$lastName', '$phoneNumber', '$emailAddress', '$message')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Message sent successfully!');</script>";
            } else {
                echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
            }

            // Close connection
            $conn->close();
        }
    ?>

</body>
</html>
