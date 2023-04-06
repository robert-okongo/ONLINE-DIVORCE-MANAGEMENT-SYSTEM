
<?php
include 'config\connect.php'
?>

<?php
    
  if (isset($_POST["submit"])) {
    $username = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Insert the form data into the "message" table
    $sql = "INSERT INTO messages (name, email, phone, message) 
            VALUES ('$username', '$email', '$phone', '$message')";
    
    if (mysqli_query($con, $sql)) {
      echo "<script>
      alert('Your message has been sent...The system admin will reach out soon.');
      window.location.href = '../';
  </script>";
    }
    else {
      echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }
  

  }
  
  mysqli_close($con);
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Split Smart | send us a message</title>
    <link rel="stylesheet" href="style.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      <span class="big-circle"></span>
      <img src="img/shape.png" class="square" alt="" />
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
            
          </p>

          <div class="info">
            <div class="information">
              <img src="img/location.png" class="icon" alt="" />
              <p>Kabarak University, Nakuru</p>
            </div>
            <div class="information">
              <img src="img/email.png" class="icon" alt="" />
              <p>splitsmart@gmail.com</p>
            </div>
            <div class="information">
              <img src="img/phone.png" class="icon" alt="" />
              <p>+254702098824</p>

            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="" method="post" autocomplete="off">
            <h3 class="title">Contact us</h3>
            <div class="input-container">
              <input type="text" name="name" class="input" required/>
              <label for="">Username</label>
              <span>Username</span>
            </div>
            <div class="input-container">
              <input type="email" name="email" class="input"  required/>
              <label for="">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container">
              <input type="tel" name="phone" class="input" required />
              <label for="">Phone</label>
              <span>Phone</span>
            </div>
            <div class="input-container textarea">
              <textarea name="message" class="input" required></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" name="submit" value="Send" class="btn" />
            <br />
            <br />
            <button onclick="window.location.href='../'" name="submit" value="" class="btn">Go back to home page</button>
          </form>
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
