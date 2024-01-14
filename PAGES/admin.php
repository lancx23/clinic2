<!--after confirming admin login, redirect the page here! CONSULTATIONS/APPOINTMENTS(SMTP), MANAGEMENT(PATIENT CRUD)/APPOINTMENTS-->
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
                <a href="../PAGES/patient.php">
                    <i class="fa-solid fa-shield-dog"></i>
                    <span class="nav-item"> Patients</span>
                </a>
                <span class="tooltip">Records</span>
            </li>
            <li>
                <a href="#"> 
                    <i class="fa-regular fa-calendar-check"></i>
                    <span class="nav-item">Appointments</span>
                </a>
                <span class="tooltip">Appointments</span>
            </li>
            <li>
                <a href="#">
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

