<?php 
    session_start();
?>
<link rel="icon" type="image/x-icon" href="IMAGES/logo.jpg">
<link rel="stylesheet" href="../CSS/register.css">
<form class="form" action="" method="post">
  <p class="title">Register </p>
  <p class="message">Signup now and get full access to our app. </p>
  <label>
          <input required="" placeholder="" type="text" class="input" name="name">
          <span>Name</span>
      </label>

      <label>
          <input required="" placeholder="" type="text" class="input" name ="user">
          <span>Username</span>
      </label>

      <label>
          <input required="" placeholder="" type="text" class="input" name ="address">
          <span>Address</span>
      </label>
          
  <label>
      <input required="" placeholder="" type="text" class="input" name="contact">
      <span>Contact Number</span>
  </label> 
      
  <label>
      <input required="" placeholder="" type="password" class="input" name="password">
      <span>Password</span>
  </label>
  <label>
      <input required="" placeholder="" type="password" class="input" name="cpassword">
      <span>Confirm password</span>
  </label>
  <center><button class="submit" name ="submit"><p>S U B M I T</p></button></center>
  <?php
  $conn = mysqli_connect(
    'localhost','root','','targetclient'
  );
  if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $user=$_POST['user'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $password=$_POST['password'];
    $confirmpass=$_POST['cpassword'];

    if($password == $confirmpass){
   mysqli_query($conn,"insert into client(name,user,address,contact,pass)VALUES('$name','$user','$address','$contact','$password')");
  echo"<script>alert('Successfully Registered')</script>";
  header("Location: /Clinic/AUTH/login.php");
  }else{
  echo"<script>alert('Password do not match')</script>";
  }
}
  ?>
  <p class="signin">Already have an acount ? <a href="LOGIN.php">Signin</a> </p>
</form>