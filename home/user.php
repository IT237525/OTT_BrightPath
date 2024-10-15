<?php
    include('db_connect.php');
    session_start();
    $user_id = "";
    if(isset($_SESSION["user_id"])) { //Already logged in
        $user_id = $_SESSION["user_id"]; //Use the session value
    }
    else {// Not logged in
        header("Location:login.php"); //Redirect to the login page
    }

    // Fetch user details from the database
    $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    // Check if user details were fetched successfully
    if (!$user) {
        echo "User not found.";
        exit();
    }
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Teacher Trainer</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../css/index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
  
    <header>
      <nav class="navbar">
        <a href="#" class="nav-logo">
          <h2 class="logo-text"><i class="fa-solid fa-lightbulb"></i>Bright Path</h2>
        </a>

        <ul class="nav-menu">
          <button id="menu-close-button" class="fas fa-times"></button>

          <li class="nav-item">
            <a href="#" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#about" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="#course" class="nav-link">Course</a>
          </li>
          <li class="nav-item">
            <a href="#testimonials" class="nav-link">Testimonials</a>
          </li>
          <li class="nav-item">
            <a href="#gallery" class="nav-link">Gallery</a>
          </li>
          <li class="nav-item">
            <a href="#contact" class="nav-link">Contact</a>
          </li>
          <li class="nav-item">
            <a onclick="openSidebar()" class="nav-link" ><i class="fa fa-bullhorn" style="font-size:36px"></i></a>
            <?php include 'announcement.php'; ?>
          </li>
          <li class="nav-item">
            <a href="profile.php" class="nav-link" ><i class='fas fa-user-circle' style='font-size:36px'></i></a>
          </li>
        </ul>

        <button id="menu-open-button" class="fas fa-bars"></button>
      </nav>
    </header>

    <main>
      <!-- Hero section -->
      <section class="hero-section">
        <div class="section-content">
          <div class="hero-details">
            <h2 class="title">Welcome to Bright Path!</h2>
            <h3 class="subtitle">Unlock your potential and take the first step toward teaching excellence today!</h3>
            <p class="description">Empowering educators, one course at a time. Bright Path is your gateway to mastering the art of teaching with advanced techniques, expert guidance, and practical resources. Whether you're an aspiring educator or an experienced teacher looking to enhance your skills, we're here to support your journey.</p>

            <div class="buttons">
              <a href="profile.php" class="button order-now">Profile</a>
              <a href="#contact" class="button contact-us">Contact Us</a>
            </div>
          </div>
          <div class="hero-image-wrapper">
            <img src="../img/home.png" alt="learning" class="hero-image" />
          </div>
        </div>
      </section>

      <!-- About section -->
     <a href="aboutus.php" class="about">
      <section class="about-section" id="about">
        <div class="section-content">
          <div class="about-image-wrapper">
            <img src="../img/about-image.jpg" alt="About" class="about-image" />
          </div>
          <div class="about-details">
            <h2 class="section-title">About Us</h2>
            <p class="text">Welcome to Bright Path, your ultimate destination for innovative and flexible online teacher training. Our mission is to empower educators with the tools and knowledge they need to excel in today’s dynamic educational landscape.</p>
            <div class="social-link-list">
              <a href="#" class="social-link"><i class="fa-brands fa-facebook"></i></a>
              <a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a>
              <a href="#" class="social-link"><i class="fa-brands fa-x-twitter"></i></a>
            </div>
          </div>
        </div>
      </section>
     </a>

      <!-- Course section -->
      <section class="menu-section" id="course">
        <h2 class="section-title">Trending Course</h2>
        <div class="section-content">
          <ul class="menu-list">
            <li class="menu-item">
             <a href="course.php" class="course">
              <img src="../img/python.png" alt="phyton" class="menu-image" />
              <div class="menu-details">
                <h3 class="name">Python</h3>
                <p class="text">Learn Python from scratch and master the language behind AI.</p>
              </div>
             </a>
            </li>
            <li class="menu-item">
              <a href="course.php" class="course">
              <img src="../img/code.png" alt="Bash" class="menu-image" />
              <div class="menu-details">
                <h3 class="name">Bash</h3>
                <p class="text">Gain control of your system with Bash scripting.</p>
              </div>
            </a>
            </li>
            <li class="menu-item">
              <a href="course.php" class="course">
              <img src="../img/3d.png" alt="Node.js" class="menu-image" />
              <div class="menu-details">
                <h3 class="name">Node.js</h3>
                <p class="text">Build lightning-fast, scalable applications with Node.js.</p>
              </div>
            </a>
            </li>
            <li class="menu-item">
              <a href="course.php" class="course">
              <img src="../img/php.png" alt="PHP" class="menu-image" />
              <div class="menu-details">
                <h3 class="name">PHP</h3>
                <p class="text">Dive into PHP and learn how to create dynamic, data-driven websites.</p>
              </div>
            </a>
            </li>
            <li class="menu-item">
              <a href="course.php" class="course">
              <img src="../img/typescript.png" alt="TypeScript" class="menu-image" />
              <div class="menu-details">
                <h3 class="name">TypeScript</h3>
                <p class="text">TypeScript takes JavaScript to the next level with type safety and powerful features.</p>
              </div>
            </a>
            </li>
            <li class="menu-item">
            <a href="course.php" class="course">
              <img src="../img/mysql.png" alt="MySQL" class="menu-image" />
              <div class="menu-details">
                <h3 class="name">MySQL</h3>
                <p class="text">Understand the power of databases with MySQL.</p>
              </div>
            </a>
            </li>
          </ul>
        </div>
      </section>

      <!-- Testimonials section -->
      <section class="testimonials-section" id="testimonials">
        <h2 class="section-title">Testimonials</h2>
        <div class="section-content">
          <div class="slider-container swiper">
            <div class="slider-wrapper">
              <ul class="testimonials-list swiper-wrapper">
                <li class="testimonial swiper-slide">
                  <img src="../img/user-1.jpg" alt="User" class="user-image" />
                  <h3 class="name">Sarah Johnson</h3>
                  <i class="feedback">"Earn recognized certifications online at your own pace, directly from Bright Path."</i>
                </li>
                <li class="testimonial swiper-slide">
                  <img src="../img/user-2.jpg" alt="User" class="user-image" />
                  <h3 class="name">James Wilson</h3>
                  <i class="feedback">"Access a wide array of teaching resources, from lesson plans to assessments.
                  "</i>
                </li>
                <li class="testimonial swiper-slide">
                  <img src="../img/user-3.jpg" alt="User" class="user-image" />
                  <h3 class="name">Michael Brown</h3>

                  <i class="feedback">"Monitor your growth with tailored feedback and progress reports."</i>
                </li>
                <li class="testimonial swiper-slide">
                  <img src="../img/user-4.jpg" alt="User" class="user-image" />
                  <h3 class="name">Emily Harris</h3>

                  <i class="feedback">"Engage with expert trainers and peers through real-time discussions and activities."</i>
                </li>
                <li class="testimonial swiper-slide">
                  <img src="../img/user-5.jpg" alt="User" class="user-image" />
                  <h3 class="name">Anthony Thompson</h3>

                  <i class="feedback">"Get trained from anywhere with our easy-to-use platform designed for educators."</i>
                </li>
              </ul>

              <div class="swiper-pagination"></div>
              <div class="swiper-slide-button swiper-button-prev"></div>
              <div class="swiper-slide-button swiper-button-next"></div>
            </div>
          </div>
        </div>
      </section>

      <!-- Gallery section -->
      <section class="gallery-section" id="gallery">
        <h2 class="section-title">Gallery</h2>
        <div class="section-content">
          <ul class="gallery-list">
            <li class="gallery-item">
              <img src="../img/courses-1.jpg" alt="Gallery Image" class="gallery-image" />
            </li>
            <li class="gallery-item">
              <img src="../img/courses-2.jpg" alt="Gallery Image" class="gallery-image" />
            </li>
            <li class="gallery-item">
              <img src="../img/courses-3.jpg" alt="Gallery Image" class="gallery-image" />
            </li>
            <li class="gallery-item">
              <img src="../img/courses-4.jpg" alt="Gallery Image" class="gallery-image" />
            </li>
            <li class="gallery-item">
              <img src="../img/courses-5.jpg" alt="Gallery Image" class="gallery-image" />
            </li>
            <li class="gallery-item">
              <img src="../img/courses-6.jpg" alt="Gallery Image" class="gallery-image" />
            </li>
          </ul>
        </div>
      </section>

      <!-- Contact section -->
      <section class="contact-section" id="contact">
        <h2 class="section-title">Contact Us</h2>
        <div class="section-content">
          <ul class="contact-info-list">
            <li class="contact-info">
              <i class="fa-solid fa-location-crosshairs"></i>
              <p>123 Campsite Avenue, Wilderness, CA 98765</p>
            </li>
            <li class="contact-info">
              <i class="fa-regular fa-envelope"></i>
              <p>info@brightpath.com</p>
            </li>
            <li class="contact-info">
              <i class="fa-solid fa-phone"></i>
              <p>(123) 456-78909</p>
            </li>
            <li class="contact-info">
              <i class="fa-solid fa-globe"></i>
              <p>www.brightpath.com</p>
            </li>
          </ul>

          <!-- Contact Form -->
          <form method="POST" action="contactUs.php" class="contact-form" id="form" //onsubmit="return validateForm();">
              <input type="hidden" name="first_name" value="<?php echo $user['first_name']; ?>">
              <input type="hidden" name="last_name" value="<?php echo $user['last_name']; ?>">
              <input type="hidden" name="phone_number" value="<?php echo $user['mobile']; ?>">
              <input type="hidden" name="email_address" value="<?php echo $user['email']; ?>">
              <textarea name="message" placeholder="Your message" class="form-input" required></textarea>
              <button type="submit" class="button submit-button">Submit</button>
          </form>
        </div>
      </section>

      <!-- Footer section -->
      <footer class="footer-section">
        <div class="section-content">
          <p class="copyright-text">© 2024 Bright Path</p>

          <div class="social-link-list">
            <a href="#" class="social-link"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" class="social-link"><i class="fa-brands fa-x-twitter"></i></a>
          </div>

          <p class="policy-text">
            <a href="privacyandP.php" class="policy-link">Privacy policy</a>
          </p>
        </div>
      </footer>
    </main>

    <!-- Linking Swiper script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Linking custom script -->
    <script src="../js/index.js"></script>

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
  </body>
</html>
