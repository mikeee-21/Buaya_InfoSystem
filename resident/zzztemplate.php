<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Template</title>

  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->



<!-- ADDED STYLE -->
<style>


html, body {
  height: 100%;
  margin: 0;
}

.wrapper {
  min-height: calc(100vh - 200px); /* adjust 200px to match your footer height */
}



.nav-link {
  display: flex;
  align-items: center;   /* Align icon and text vertically */
  gap: 8px;              /* Optional: spacing between icon and text */
  color: black;          /* Ensures the text color matches icon if needed */
}

.nav-link p {
  margin: 0;             /* Remove default margins from <p> */
}

/* For main menu items */
.nav-sidebar .nav-item > .nav-link:hover {
  background-color:rgb(255, 255, 255); /* hover background color */
  border-radius: 10px;
  color: white !important;
}

/* For submenu items */
.nav-treeview .nav-link:hover {
  background-color:rgb(255, 255, 255); /* submenu hover background color */
  border-radius: 10px;
  color: white !important;
}

.nav-icon {
  font-size: 20px !important;
  color: black;
}


li a p{
  font-size: 18px !important; 
  font-weight: 200;
}

.nav-item i{
  font-size: 19px !important;  
  margin-right: 60px;
  margin-top: 10px;
}

.logo {
  height: 50px;
  width: 50px;
  border-radius: 50%;
  margin-right: 30px;
}


.dropdown-menu{
    margin-right: 50px;
    box-shadow:  2px 2px 3px  #2E8C7C !important;  }

/* SETTINGS DD STYLE */
/* Hover effect for submenu links */
#directorySubmenu .dropdown-item:hover {
  color: #0FCDA7;
  transition: 0.2s ease-in-out;
}

#directoryToggle{
  color: black;
  text-decoration: none;
  transition: 0.2s ease-in-out; 
}

#directoryToggle:focus,
#directoryToggle:hover,
#directoryToggle:active {
  color: #0FCDA7 ; 
  text-decoration: none ;
}


/* Font color on hover */
.dropdown-menu .dropdown-item:hover,
.dropdown-menu .dropdown-item:focus,
.dropdown-menu .dropdown-item:active {
  color: #0FCDA7; 
  background-color: transparent;
  text-decoration: none;
  transition: 0.2s ease-in-out;
}

.sub a{
  font-size: 15px !important; 
  font-weight: 200;
}

.dropdown-item {
  font-size: 17px !important; 
  font-weight: 200;
}


/* FONT */
.font-inter {
  font-family: 'Inter', sans-serif;
}


/* GLOVAL BACKGROUND */
.bg{
  background-color: #EFF9F8;
}

.border-none{
  border: none;
}


</style>



<body class="hold-transition sidebar-mini bg">
  <div class="wrapper">

                    <!-- Navbar -->
                    <nav class="main-header px-0 navbar navbar-expand ml-0 mr-0 border-none"  >

                      <!-- Right navbar links -->
                      <ul class="navbar-nav d-flex justify-content-end w-100" >

                        <!-- HOME -->
                        <li class="nav-item">  <!-- Added m-2 for margin around each icon -->
                          <a href="#" class="nav-link">
                            <i class="nav-icon fa-solid fa-house"></i>
                          </a>
                        </li>

                        <!-- ABOUT US -->
                        <li class="nav-item dropdown">  <!-- Added m-2 for margin around each icon -->
                          <a class="nav-link" href="#" data-toggle="dropdown">
                            <i class="nav-icon fa-solid fa-address-card"></i>
                          </a>
                        </li>

                        <!-- CONTACT -->
                        <li class="nav-item ">  <!-- Added m-2 for margin around each icon -->
                          <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="nav-icon fa-solid fa-phone"></i>
                          </a>
                        </li>

                        <!-- MENU -->
                        <li class="nav-item ">  <!-- Added m-2 for margin around each icon -->
                          <a class="nav-link" href="#" id="settingsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="nav-icon fa-solid fa-bars"></i>
                          </a>

                          <ul class="dropdown-menu dropdown-menu-right font-inter" aria-labelledby="settingsDropdown" style="width: 250px;">
                            <!-- Directory Management -->
                            <li><a class="dropdown-item" href="#">Barangay Buaya Profile</a></li>
                            <li><a class="dropdown-item" href="#">Announcements</a></li>
                            <li><a class="dropdown-item" href="#">Officials</a></li>
                            <li><a class="dropdown-item" href="#">Request Document</a></li>
                            <li><a class="dropdown-item" href="#">Even Calendar</a></li>
                          </ul>

                        </li>

                        <!-- LOGO -->
                        <li class="nav-item">  <!-- Added m-2 for margin around each icon -->
                          <img src="img/d1.jpg" alt="logo" class="logo">
                        </li>

                      </ul>
                      </nav>






                      
  </div>
  <!-- end of wrapper -->


<!-- footer -->
<footer class="p-2 pt-5 bg">
    
    <div class="row m-2 p-2 pt-3" style=" background-color: #B2E5DC; border-radius: 40px;">
        
        <div class="col-3 text-center" style=" height: 150px; ">
          <img src="img/m1.jpg" alt="" style=" height: 100%; object-fit:cover; border-radius: 50%; box-shadow: 0 5px 10px #808080;">
        </div>

        <div class="col-3  pl-2" >
            <div class="row mb-2">
              <a href="#" class="nav-link  font-inter " role="button" style="color:black; font-weight: bold;">
                <i class="nav-icon fa-solid fa-location-dot m-0 mr-3"></i>
                <span id="location_value" class="mr-4"> Barangay Buaya, Lapu-lapu City</span>
              </a>
            </div>
            <div class="row mb-2">
              <a href="#" class="nav-link  font-inter" role="button" style="color:black; font-weight: bold;">
                  <i class="nav-icon fa-solid fa-phone-volume m-0 mr-2"></i>
                  <span >Contact: <span id="contact_value">09323766225</span> </span>
              </a>
            </div>
            <div class="row mb-2">
              <a href="#" class="nav-link  font-inter" role="button" style="color:black; font-weight: bold;">
                  <i class="nav-icon fa-solid fa-clock m-0 mr-2"></i>
                  <span>Open : Mon - Fri 8:00 am - 5:00 pm </span>
              </a>
            </div>
            <div class="row mb-2">
              <a href="../admin/dashboard.php" class="nav-link font-inter" style="color:black; font-weight: bold;"  role="button">
                    <i class="nav-icon fa-solid fa-user-tie m-0 mr-2"></i>
                    <span  id="app_name_value" class="ml-1 ">Buaya InfoSystem </span>
                </a>
            </div>
        </div>

        <div class="col-3 text-center">
            <h5 class=" pr-3 font-inter">Navigations</h5>
            <div class="row mt-4 pl-5 pr-5">

              <div class="row w-100 mb-3">
                <div class="col">  <a href=""> <i class="nav-icon fa-solid fa-house"></i></a> </div>
                <div class="col">  <a href=""> <i class="nav-icon fa-solid fa-address-card"></i> </a></div>
                <div class="col">  <a href=""> <i class="nav-icon fa-solid fa-phone"></i></a></div>
                <div class="col">  <a href=""> <i class="nav-icon fa-solid fa-bullhorn"></i></a> </div>
              </div>

              <div class="row w-100">
                <div class="col">  <a href=""> <i class="nav-icon fa-solid fa-users"></i></a> </div>
                <div class="col">  <a href=""> <i class="nav-icon fa-solid fa-file"></i></a> </div>
                <div class="col"> <a href=""> <i class="nav-icon fa-solid fa-calendar-days"></i></a> </div>
              </div>

            </div>
        </div>

        <div class="col-3 font-inter">
            <h3 class="mb-4 font-inter " style="font-weight: bold;">Help us improve the <br> design system</h3>
            <a href="#" style=" padding:10px; border: 1px solid rgb(0, 0, 0); text-decoration: none; color: black;">Send us a message</a>
        </div>
    </div>

    <div class="row m-2 p-1 font-inter text-white justify-content-center align-items-center" 
         style="background-color: #2E8C7C; font-weight:bold; border-radius: 50px; display: flex; text-align: center;">
        <p class="mb-0">© 2025 Buaya Info System. <br> All rights reserved.</p>
    </div>

  </footer>





<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.min.js"></script>


</body>
</html>
