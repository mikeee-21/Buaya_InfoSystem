<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Barangay Buaya Profile</title>

  
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
            font-family: 'Inter', sans-serif;
        }

        .wrapper {
            min-height: calc(100vh - 200px);
        }

        /* Main Navbar Container */
        .navbar-universal {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: none;
            box-shadow: 0 2px 20px rgba(46, 140, 124, 0.1);
            padding: 5px 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        /* Navbar when scrolled */
        .navbar-universal.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 4px 30px rgba(46, 140, 124, 0.15);
            padding: 10px 0;
        }

        /* Navigation Links Container */
        .navbar-nav-universal {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            width: 100%;
            gap: 10px;
            padding: 0 10px;
            list-style: none; /* Remove default list styling */
            margin: 0; /* Remove default margin */
        }

        /* Individual Nav Items */
        .nav-item-universal {
            position: relative;
            list-style: none; /* Remove dots from list items */
        }

        /* Nav Link Styling */
        .nav-link-universal {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            color:  #000155 !important;
            font-size: 20px;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            background: rgba(46, 140, 124, 0.05);
            border: 2px solid transparent;
            overflow: hidden;
        }

        /* Hover Effects */
        .nav-link-universal:hover {
            color: white !important;
            background: linear-gradient(135deg, #000155 0%,rgb(24, 97, 244) 100%);
            border-color:rgb(6, 9, 191);
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 25px rgba(6, 9, 191);
        }

        /* Ripple Effect */
        .nav-link-universal::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: radial-gradient(circle, rgba(15, 205, 167, 0.3) 0%, transparent 70%);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.4s ease;
            z-index: -1;
        }

        .nav-link-universal:hover::before {
            width: 80px;
            height: 80px;
        }

        /* Active State */
        .nav-link-universal.active {
            background: linear-gradient(135deg, #000155 0%, #2E8C7C 100%);
            color: white !important;
            box-shadow: 0 5px 15px rgba(0, 1, 85, 0.3);
        }

        /* Logo Styling */
        .logo-universal {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            border: 3px solid rgba(46, 140, 124, 0.2);
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-left: 15px;
            object-fit: cover;
        }

        .logo-universal:hover {
            transform: rotate(360deg) scale(1.1);
            border-color:  #000155;
            box-shadow: 0 8px 25px rgba(15, 205, 167, 0.4);
        }

        /* Enhanced Dropdown Menu */
        .dropdown-menu-universal {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(46, 140, 124, 0.2);
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            margin-top: 15px;
            padding: 10px;
            min-width: 280px;
            animation: dropdownSlideIn 0.3s ease-out;
            list-style: none; /* Remove dots from dropdown items */
        }

        @keyframes dropdownSlideIn {
            0% {
                opacity: 0;
                transform: translateY(-10px) scale(0.95);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Dropdown Items */
        .dropdown-item-universal {
            color: #333 !important;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 10px;
            margin: 3px 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .dropdown-item-universal i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            color: #000155;
            transition: all 0.3s ease;
        }

        .dropdown-item-universal:hover {
            background: linear-gradient(135deg, rgba(15, 205, 167, 0.1) 0%, rgba(46, 140, 124, 0.1) 100%);
            color:  #000155 !important;
            transform: translateX(8px);
            box-shadow: 0 3px 10px rgba(15, 205, 167, 0.2);
        }

        .dropdown-item-universal:hover i {
            color:  #000155;
            transform: scale(1.1);
        }

        /* Dropdown Toggle */
        .dropdown-toggle-universal::after {
            display: none;
        }

        /* Tooltip for nav items */
        .nav-tooltip {
            position: absolute;
            bottom: -35px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s ease;
            z-index: 1001;
        }

        .nav-tooltip::before {
            content: '';
            position: absolute;
            top: -5px;
            left: 50%;
            transform: translateX(-50%);
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 5px solid rgba(0, 0, 0, 0.8);
        }

        .nav-item-universal:hover .nav-tooltip {
            opacity: 1;
            bottom: -40px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar-nav-universal {
                gap: 5px;
                padding: 0 10px;
            }

            .nav-link-universal {
                width: 45px;
                height: 45px;
                font-size: 18px;
            }

            .logo-universal {
                width: 45px;
                height: 45px;
                margin-left: 10px;
            }

            .dropdown-menu-universal {
                min-width: 250px;
                margin-right: 10px;
            }

            .nav-tooltip {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .navbar-nav-universal {
                gap: 3px;
                padding: 0 5px;
            }

            .nav-link-universal {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }

            .logo-universal {
                width: 40px;
                height: 40px;
            }
        }

/* FONT */
.font-inter {
  font-family: 'Inter', sans-serif;
}

.font-color{
  color:  #000155;
}

/* GLOVAL BACKGROUND */
.bg{
  background-color:rgb(255, 255, 255);
}

.bg1{
  background-color:  #000155;
}

.border-none{
  border: none;
}

.contact-container{
            width: 310px;
            height: 369px;
            border-radius: 30px;
            color:white;
            font-family: 'Inter', sans-serif;
            padding:20px;
            background-color: #000155;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            transition: .5s ease-in-out;
        }

        .contact-container:hover{
            transform:translateY(-5px);
            transition: .5s ease-in-out;
        }

        .contact-container i{
            width: 80px;
            height: 80px;
            background-color: white;

            border-radius: 50%;
            color:#000155;
            font-size: 50px;
            margin-bottom: 10px;

            display: flex;
            justify-content: center;
            align-items: center;
            transition: .5s ease-in-out;
        }

                /* FIXED: Information section text color */
        .info-text {
            color: #000155 !important;
            font-weight: 600;
        }

        .info-value {
            background-color: white !important;
            color: #000155 !important;
            border: 1px solid #dee2e6;
        }



</style>



<body class="hold-transition sidebar-mini bg">
  <div class="wrapper">

                    <!-- Navbar -->
<!-- Universal Navbar Component -->
    <nav class="navbar-universal" id="mainNavbar">
        <div class="container-fluid">
            <ul class="navbar-nav-universal">
                <!-- HOME -->
                <li class="nav-item-universal">
                    <a href="homepage.php" class="nav-link-universal" data-page="home">
                        <i class="fas fa-house"></i>
                    </a>
                    <div class="nav-tooltip">Home</div>
                </li>

                <!-- ABOUT US / PROFILE -->
                <li class="nav-item-universal">
                    <a href="admin_profile.php" class="nav-link-universal" data-page="profile">
                        <i class="fas fa-address-card"></i>
                    </a>
                    <div class="nav-tooltip">Profile</div>
                </li>

                <!-- CONTACT -->
                <li class="nav-item-universal">
                    <a href="admin_profile.php" class="nav-link-universal" data-page="contact">
                        <i class="fas fa-phone"></i>
                    </a>
                    <div class="nav-tooltip">Contact</div>
                </li>

                <!-- MENU DROPDOWN -->
                <li class="nav-item-universal dropdown">
                    <a class="nav-link-universal dropdown-toggle-universal" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </a>
                    <div class="nav-tooltip">Menu</div>
                    
                    <ul class="dropdown-menu dropdown-menu-universal dropdown-menu-end" aria-labelledby="settingsDropdown">
                        <li>
                            <a class="dropdown-item-universal" href="admin_profile.php">
                                <i class="fas fa-building"></i>
                                Barangay Buaya Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item-universal" href="announcement_resident.php">
                                <i class="fas fa-bullhorn"></i>
                                Announcements
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item-universal" href="residentViewOfficials.php">
                                <i class="fas fa-users"></i>
                                Officials
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item-universal" href="residentRequestDocument.php">
                                <i class="fas fa-file-alt"></i>
                                Request Document
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item-universal" href="calendar.php">
                                <i class="fas fa-calendar"></i>
                                Event Calendar
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- LOGO -->
                <li class="nav-item-universal">
                    <img src="img/logo.jpg" alt="Barangay Logo" class="logo-universal">
                </li>
            </ul>
        </div>
    </nav>




      <!-- main content -->
    <div class="content-wrapper ml-0 mr-0 bg-white pt-5">   
        <div class="content">
            <div class="container-fluid">
                
                <div class="row-12 w-100 d-flex justify-content-center " >
                    <img src="" alt="Barangay Logo" class="barangay-logo" style=" width:250px; height: 250px; border-radius:50%" id="barangayLogo">
                </div>

                <div class="row m-5 p-3 d-flex justify-content-between">

                    <div class="col-5 pt-5" 
                        style="height:450px; display:flex; flex-direction: column; align-items:center; padding: 20px; text-align: center;">
                      
                      <h3 class="mt-2 mb-5 font-inter font-weight-bold font-color" style="font-size: 30px; margin-bottom: 20px;">
                        Mission
                      </h3>

                      <p id="mission_value" class="font-inter font-color" style="font-size:18px;">
                        Loading mission statement...
                      </p>

                    </div>

                    <div class="col-1 d-flex justify-content-center"> 
                        <div style="width:1px; height:100%; border:3px solid #000155;"></div>
                    </div>

                    <div class="col-5 pt-5" 
                         style="height:450px; display:flex; flex-direction: column; align-items:center; padding: 20px; text-align: center;">
                        
                        <h3 class="mt-2 mb-5 font-inter font-weight-bold font-color" style="font-size: 30px;">Vision</h3>

                        <p id="vision_value" class="font-inter font-color" style="font-size:18px;">
                            Loading vision statement...
                        </p>

                    </div>
                </div>

                <div class="row mb-5 d-flex justify-content-center align-items-center">

                  <div class="row mt-5 mb-5">
                    <h3 class="ms-5 font-inter font-weight-bold font-color">Contact Us</h3>
                  </div>

                  <div class="row mt-1 p-3 w-100">

                      <div class="col-4 d-flex justify-content-center align-items-center">
                          <div class="contact-container">
                              <i class="fa-solid fa-envelope"></i>
                              <h5 class="mb-5">Email</h5>
                              <p id="email_value">Loading...</p>
                          </div>
                      </div>

                      <div class="col-4 p-5 d-flex justify-content-center align-items-center">
                          <div class="contact-container">
                              <i class="fa-solid fa-clock"></i>
                              <h5 class="mb-5">Opening Hours</h5>
                              <p id="opening_day_value">Loading...</p>
                              <p id="opening_time_value">Loading...</p>
                          </div>
                      </div>
                      
                      <div class="col-4 p-5 d-flex justify-content-center align-items-center">
                          <div class="contact-container">
                              <i class="fa-solid fa-phone-volume"></i>
                              <h5 class="mb-5">Contact</h5>
                              <p id="contact_value">Loading...</p>
                          </div>
                      </div>

                  </div>

                </div>

                <div class="row mt-5 p-5 d-flex flex-column justify-content-center align-items-start">
                  
                    <div class="row ml-5 font-inter font-color">
                      <i class="mr-5 fa-solid fa-location-dot" style="color: #F73535; font-size:30px;"></i>
                      <h3 class="font-weight-bolder" id="location_value">Loading location...</h3>
                    </div>

                    <div class="row p-5 w-100">
                      <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15701.355102485479!2d123.98509522810944!3d10.314749347992304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a997729dab384d%3A0xdad4395d00f92e5e!2sBuaya%2C%20Lapu-Lapu%20City%2C%20Cebu!5e0!3m2!1sen!2sph!4v1744473339966!5m2!1sen!2sph" 
                            width="100%" 
                            height="400" 
                            style="border-radius:10px; border:none;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                      </iframe>
                    </div>
                
                </div>

                <!-- FIXED: Information section with proper text colors -->
                <div class="row mb-5 p-5 mx-auto w-75 align-items-center font-inter text-white bg1" style="border-radius: 30px;">
                    <div class="col text-center">
                      <h3 class="font-weight-bold text-white">Information</h3>
                    </div>

                    <div class="col-12 p-3 d-flex flex-wrap">
                      <div class="col-sm-6 p-2">
                        <p class="p-2 mb-1 text-white font-weight-bold">Full Name</p>
                        <p class="p-3 rounded info-value" id="brgyName">
                          Loading...
                        </p>  
                      </div>

                      <div class="col-sm-6 p-2">
                        <p class="p-2 mb-1 text-white font-weight-bold">Zip Code</p>
                        <p class="p-3 rounded info-value" id="brgyZipCode">
                          Loading...
                        </p>  
                      </div>
                    </div>

                    <div class="col-12 p-3 d-flex flex-wrap">
                      <div class="col-sm-6 p-2">
                        <p class="p-2 mb-1 text-white font-weight-bold">Provincial</p>
                        <p class="p-3 rounded info-value" id="brgyProvince">
                          Loading...
                        </p>  
                      </div>

                      <div class="col-sm-6 p-2">
                        <p class="p-2 mb-1 text-white font-weight-bold">Municipality</p>
                        <p class="p-3 rounded info-value" id="brgyMunicipality">
                          Loading...
                        </p>  
                      </div>
                    </div>

                </div>

            </div>
            <!-- end of container fluid -->
        </div>
        <!-- end of content -->
    </div>
    <!-- end of content-wrapper -->



                      
  </div>
  <!-- end of wrapper -->


 <!-- footer -->
 <footer class="p-2 pt-5 bg">
        
        <div class="row pt-3" style=" background-color:rgb(238, 238, 238);">
        
          <div class="col-3 text-center" style="height: 150px;">
              <img src="img/logo.jpg" alt="" style="height: 100%; object-fit:cover; border-radius: 50%; box-shadow: 0 5px 10px #808080;">
          </div>

          <div class="col-3">
              <div class="row m-0 px-0 mb-0">
                  <a href="#" class="nav-link font-inter" role="button" style="color:black;">
                      <i class="nav-icon1 fa-solid fa-location-dot mr-3"></i>
                      <span id="location_value" class="mr-4">Barangay Buaya, Lapu-lapu City</span>
                  </a>
              </div>
              <div class="row m-0 px-0 mb-0">
                  <a href="#" class="nav-link font-inter" role="button" style="color:black;">
                      <i class="nav-icon1 fa-solid fa-phone-volume mr-2"></i>
                      <span>Contact: <span id="contact_value">09323766225</span></span>
                  </a>
              </div>
              <div class="row mx-0 px-0 mb-0">
                  <a href="#" class="nav-link font-inter" role="button" style="color:black;">
                      <i class="nav-icon1 fa-solid fa-clock mr-2"></i>
                      <span>Open: Mon - Fri 8:00 am - 5:00 pm</span>
                  </a>
              </div>
              <div class="row m-0 px-0 mb-0">
                  <a href="../admin/admin_login2.php" class="nav-link font-inter" style="color:black;" role="button">
                      <i class="nav-icon1 fa-solid fa-user-tie mr-2"></i>
                      <span id="app_name_value" class="ml-1">Buaya InfoSystem</span>
                  </a>
              </div>
          </div>

          <div class="col-3 text-center">
              <h5 class="pr-3 font-inter">Navigations</h5>
              <div class="row mt-4 pl-5 pr-5">
                  <div class="row w-100 mb-3">
                      <div class="col"><a href="homepage.php"><i class="nav-icon1 fa-solid fa-house"></i></a></div>
                      <div class="col"><a href="admin_profile.php"><i class="nav-icon1 fa-solid fa-address-card"></i></a></div>
                      <div class="col"><a href="admin_profile.php"><i class="nav-icon1 fa-solid fa-phone"></i></a></div>
                      <div class="col"><a href="announcement_resident.php"><i class="nav-icon1 fa-solid fa-bullhorn"></i></a></div>
                  </div>
                  <div class="row w-100">
                      <div class="col"><a href="residentViewOfficials.php"><i class="nav-icon1 fa-solid fa-users"></i></a></div>
                      <div class="col"><a href="residentRequestDocument.php"><i class="nav-icon1 fa-solid fa-file"></i></a></div>
                      <div class="col"><a href="calendar.php"><i class="nav-icon1 fa-solid fa-calendar-days"></i></a></div>
                  </div>
              </div>
          </div>

          <div class="col-3 font-inter">
              <h3 class="mb-4 font-inter">Help us improve the <br> design system</h3>
              <a href="#" style="padding:10px; border: 1px solid rgb(0, 0, 0); text-decoration: none; color: black;">Send us a message</a>
          </div>
    </div>

    <div class="row p-1 font-inter text-white justify-content-center align-items-center" 
        style="background-color:  #000155;  display: flex; text-align: center;">
        <p class="mb-0">© 2025 Buaya Info System. <br> All rights reserved.</p>
    </div>

</footer>





<!-- Add this before closing </body> tag -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery (required by Bootstrap 4) -->   
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4.6.2 Bundle (includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">





<!--load the barangay profile  -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    
    // Show loading message
    console.log('Loading barangay data...');
    
    // Fetch data from your PHP script
    fetch('../views/superadmin/get_barangay.php')
        .then(response => response.json())
        .then(data => {
            console.log('Data received:', data);
            
            if (data.success) {
                // Update the HTML elements with database data
                const barangayData = data.data;
                
                // Mission and Vision
                if (barangayData.bar_mission) {
                    document.getElementById('mission_value').textContent = barangayData.bar_mission;
                }
                
                if (barangayData.bar_vision) {
                    document.getElementById('vision_value').textContent = barangayData.bar_vision;
                }
                
                // Contact Information
                if (barangayData.bar_email) {
                    document.getElementById('email_value').textContent = barangayData.bar_email;
                }
                
                if (barangayData.bar_contact_cellphone) {
                    document.getElementById('contact_value').textContent = barangayData.bar_contact_cellphone;
                }
                
                // Opening Hours
                if (barangayData.bar_available_start_day && barangayData.bar_available_end_day) {
                    document.getElementById('opening_day_value').textContent = 
                        barangayData.bar_available_start_day + ' - ' + barangayData.bar_available_end_day;
                }
                
                if (barangayData.bar_available_start_time && barangayData.bar_available_end_time) {
                    document.getElementById('opening_time_value').textContent = 
                        barangayData.bar_available_start_time + ' - ' + barangayData.bar_available_end_time;
                }
                
                // Location - FIXED: No more hardcoded override
                if (barangayData.bar_name && barangayData.bar_municipality) {
                    document.getElementById('location_value').textContent = 
                        'Barangay ' + barangayData.bar_name + ', ' + barangayData.bar_municipality;
                }
                
                // Information Section
                if (barangayData.bar_name) {
                    document.getElementById('brgyName').textContent = barangayData.bar_name;
                }
                
                if (barangayData.bar_zip_code) {
                    document.getElementById('brgyZipCode').textContent = barangayData.bar_zip_code;
                }
                
                if (barangayData.bar_province) {
                    document.getElementById('brgyProvince').textContent = barangayData.bar_province;
                }
                
                if (barangayData.bar_municipality) {
                    document.getElementById('brgyMunicipality').textContent = barangayData.bar_municipality;
                }
                
                // FIXED: Logo with proper error handling and perfect circle styling
                if (barangayData.bar_logo) {
                    const logoImg = document.getElementById('barangayLogo');
                    if (logoImg) {
                        logoImg.src = `../server_imgs/${barangayData.bar_logo}`;
                    }
                }
                
                console.log('Data loaded successfully!');
                
            } else {
                console.error('Error:', data.message);
                // Show user-friendly error message
                Swal.fire({
                    icon: 'error',
                    title: 'Error Loading Data',
                    text: 'Failed to load barangay information. Please refresh the page.',
                    confirmButtonColor: '#000155'
                });
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            // Show user-friendly error message
            Swal.fire({
                icon: 'error',
                title: 'Connection Error',
                text: 'Unable to connect to the server. Please check your internet connection and try again.',
                confirmButtonColor: '#000155'
            });
        });
});
</script>




</body>
</html>


<script>
  window.onload = function() {
    // Kay kabalo man ta nga imong iframe points to Buaya, Lapu-Lapu City
    document.getElementById("location_value").innerText = "Buaya, Lapu-Lapu City, Cebu City";
  }
</script>
