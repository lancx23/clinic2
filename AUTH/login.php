<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Customer Login</title>
    <link rel="icon" type="image/x-icon" href="../IMAGES/logo.png">
    <link rel="stylesheet" href="../CSS/login.css">
</head>
    <body>
    <div class="login-box">
        <p>Login</p>
        <form method="post" action="login.php">
          <div class="user-box">
            <input required type="text" name="user">
            <label>Email</label>
          </div>
          <div class="user-box">
            <input required placeholder="" type="password" name="pass">
            <label>Password</label>
          </div>
          
          <center><a href="#">
            <span></span>
            <span></span>
            <span></span>
            <span></span> 
            <button class="submit" name ="submit"><p>S U B M I T</p></button>  
            </a></center>
          <?php
              $conn = mysqli_connect(
                'localhost','root','','targetclient'
              );
            
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $user = mysqli_real_escape_string($conn, $_POST['user']);
                $pass = mysqli_real_escape_string($conn, $_POST['pass']);
            
                $sql = "SELECT * FROM client WHERE user='$user' AND pass='$pass'";
                $result = $conn->query($sql);
            
                if ($result->num_rows == 1) {
                    // User is authenticated, redirect to a secure page
                    session_start();
                    $_SESSION['user'] = $email;
                    header("Location:/Clinic/PAGES/customer.html");
                } else {
                    echo "Invalid username or password";
                }
            }
?>
        </form>
        <p>Don't have an account? <a href="register.php" class="a2">Sign up!</a></p>
      </div>
      
</body>

</html>