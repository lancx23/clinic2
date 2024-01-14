<!--after confirming admin login, redirect the page here! CONSULTATIONS/APPOINTMENTS(SMTP), MANAGEMENT(PATIENT CRUD)/APPOINTMENTS-->
<?php include('server.php'); ?>
<?php 
	if(isset($_GET['edit']))
	{
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "select * from client where ClientID = $id");
		
		if(mysqli_num_rows($record) == 1)
		{
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$user = $n['user'];
			$address = $n['address'];
			$contact = $n['contact'];
			$pass = $n['pass'];
		}
	}
	if(isset($_GET['del']))
	{
		$id = $_GET['del'];
		$record = mysqli_query($db, "delete from info where ClientID = $id");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/x-icon" href="../IMAGES/logo.png">
    <link rel="stylesheet" href="../CSS/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <style>
        table, th, td {
			border: 2px solid black;
			background-color: #4682B4;
			border-collapse: collapse;
			padding:10px;
		}
		th, td {
			border:1px solid black;
			height:30px;
			padding: 2px;
			text-align:center;
		}
		table{
			width: 50%;
			margin: 30px auto;
			border-collapse: collapse;
			text-align:left;
		}
		.btn {
			padding: 10px;
			font-size: 25px;
			color: #1F4659;;
			background: black;
			border: none;
			border-radius: 10px;
		}
		.input-group{
			margin: 10px 0px 10px 0px;
			text-align:center;
		}
		a:link {
		color: yellow;
		background-color: transparent;
		text-decoration: none;
		}
		a:visited {
		color: pink;
		background-color: transparent;
		text-decoration: none;
		}
		#ip{
		border-radius: 50%;
		border: 2px solid black;
		padding: 20px; 
		width: 215px;
		height: 20px;
		} 
        </style>
  <div class="sidebar">
    <div class="top">
        <div class="logo">
            <img src="../IMAGES/logo.png" class="clogo">
            <span>Vetter Health Clinic</span>    
        </div>
        <i class="fa-solid fa-bars" id="btn"></i>
    </div>
    <div class="user">
        <i class="fa-solid fa-user-doctor fa-2xl" style="color: #ffffff;"></i>
        <div>
            <p class="bold">Doctor</p>
            <p>Admin</p>
        </div>
    </div>
        <ul>
            <li>
                <a href="/Clinic/PAGES/patients.php">
                    <i class="fa-solid fa-shield-dog"></i>
                    <span class="nav-item"> Patients</span>
                </a>
                <span class="tooltip">Records</span>
            </li>
            <li>
                <a href="/Clinic/PAGES/adminAppointment.php"> 
                    <i class="fa-regular fa-calendar-check"></i>
                    <span class="nav-item">Appointments</span>
                </a>
                <span class="tooltip">Appointments</span>
            </li>
            <li>
                <a href="/Clinic/index.html">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span class="nav-item">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
        </ul>    
  </div>
<div class="main-content">
    <div class="container">
        <h1>Clinic Management</h1>
    </div>
    <?php $results = mysqli_query($db,"SELECT * from client"); ?>
    <table>
	<thead>
		<tr>
            <th>Name</th>
			<th>Username</th>
			<th>Address</th>
			<th>Contact</th>
			<th>Password</th>
			<th colspan="2">Manage</th>
		</tr>
	</thead>
<?php while($row = mysqli_fetch_array($results)) { ?>
	<tr>
		<td><?php echo $row['name'];?></td>
		<td><?php echo $row['user'];?></td>
		<td><?php echo $row['address'];?></td>
		<td><?php echo $row['contact'];?></td>
		<td><?php echo $row['pass'];?></td>
		<td><a href="patients.php?edit=<?php echo $row['ClientID'];?>">Edit</a></td>
		<td><a href="server.php?del=<?php echo $row['ClientID'];?>">Delete</a></td>
	</tr>
<?php }?>
	<form action="server.php" method="post">
    <input type = "hidden" name="id" value="<?php echo $id; ?>">
	<div class="input-group">
	<table>
		<tr>
			<th><label>Name:</label></th>
			<td><input type="text" id="ip" name="name" placeholder="Please enter your name" value="<?php echo $name; ?>" required></td>
        </tr>   
        <tr>
			<th><label>Username:</label></th>
			<td><input type="text" id="ip" name="user" placeholder="Please enter your username" value="<?php echo $user; ?>" required></td>
		</tr>
		<tr>
			<th><label>Address:</label></th>
			<td><input type="text" id="ip" name="address" placeholder="Please enter your address" value="<?php echo $address; ?>" required></td>
        </tr>
		<tr>
			<th><label>Contact:</label></th>
			<td><input type="text" id="ip" name="contact" placeholder="Please enter contact information" value="<?php echo $contact; ?>" required></td>
		</tr>
		<tr>
			<th><label>Password:</label></th>
			<td><input type="text" id="ip" name="pass" placeholder="Please enter password" value="<?php echo $pass; ?>" required></td>
		</tr>
	</table>
	</div>
	<div class="input-group">
	<?php if($update == true ):?>
		<button type="submit" name="update" class="btn">Update</input>
	<?php else:?>
		<button type="submit" name="save" class="btn">Save</input>
	<?php endif ?>
	</div>
	</form>
</div> 
</body>
<script>
    let btn = document.querySelector('#btn');
    let sidebar = document.querySelector('.sidebar');

    btn.onclick = function () {
        sidebar.classList.toggle('active');
    };
</script>
</html>