<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
    <link rel="icon" type="image/x-icon" href="../IMAGES/logo.png">
    <link rel="stylesheet" href="../CSS/login.css">
</head>
    <body>
    <div class="login-box">
        <p>Admin Login</p>
        <form method="post" action="adminlogin.php">
          <div class="user-box">
            <input required type="text" name="username">
            <label>Email</label>
          </div>
          <div class="user-box">
            <input required placeholder="" type="password" name="password">
            <label>Password</label>
          </div>
          
          <center><a href="#">
            <button class="submit" name ="submit"><p>S U B M I T</p></button>
            <span></span>
            <span></span>
            <span></span>
            <span></span>   
            </a></center>
          <?php
              $conn = mysqli_connect(
                'localhost','root','','targetclient'
              );
            
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
            
                $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
                $result = $conn->query($sql);
            
                if ($result->num_rows == 1) {
                    // User is authenticated, redirect to a secure page
                    session_start();
                    $_SESSION['username'] = $email;
                    header("Location:/Clinic/PAGES/admin.html");
                } else {
                    echo "Invalid username or password";
                }
            }
?>
        </form>
      </div>
      
</body>

</html>