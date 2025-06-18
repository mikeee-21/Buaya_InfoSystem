<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Submit Feedback</title>

  
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


/* GLOVAL BACKGROUND */
.bg{
  background-color: #EFF9F8;
}

.border-none{
  border: none;
}


/* FEEDBACK CONTAINER */
.feedback-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.feedback-header {
  background-color: #000155;
  border-radius: 10px;
  color:white;
  width: 650px;
}

.feedback-header h6{
  font-size: 25px;
  font-weight: bold;
}

.form-content{
  background-color:white;
  width: 650px;
  border-radius: 10px;
}

.form-control{
  height: 250px !important;
}

.btn{
  background-color: #000155; 
  padding: 6px 20px;
  border-radius: 4px;
  transition: .5s ease-in-out;
  }
.btn:hover {
  background-color:rgb(27, 29, 140);
  transition: .5s ease-in-out;
  }

.btn-reset{
  background-color: #000155;
  transition: .5s ease-in-out;
}




#feedbackForm {
      width: 100%;
      max-width: 500px;
    }

    .rating {
      display: flex;
      justify-content: space-between;
      max-width: 250px;
      margin: 0 auto;
    }

    .rating input {
      display: none;
    }

    .rating label {
      font-size: 30px;
      color: lightgray;
      cursor: pointer;
      transition: color 0.3s;
    }

    .rating input:checked ~ label,
    .rating label:hover,
    .rating label:hover ~ label {
      color: gold;
    }

    .form-label{
      color:rgb(140, 140, 140);
    }
</style>



<body class="hold-transition sidebar-mini bg">
  <div class="wrapper bg">

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
        <div class="content-wrapper ml-0 mr-0 mt-0 bg">   
            <div class="content">
                <div class="container-fluid">
                    <!-- Feedback Form Container -->
                    <div class="row feedback-container pt-3">
                        <!-- Green Feedback Header -->
                        <div class="feedback-header font-inter p-3">
                            <h5>Submit Feedback</h5>
                        </div>
                        
                        <!-- Form Content -->
                        <div class="form-content p-5 font-inter">
                            <form id="feedbackForm">
                                <div class="mb-3">
                                    <textarea class="form-control font-inter elevation-1" id="feedbackText" placeholder="Type your message here..."></textarea>
                                </div>

                                 <!-- Star Rating -->
                              <div class="mb-3 text-center">
                                <label class="form-label ">Rate your experience:</label>
                                <div class="rating">
                                  <input type="radio" id="star5" name="rating" value="5" /><label for="star5">&#9733;</label>
                                  <input type="radio" id="star4" name="rating" value="4" /><label for="star4">&#9733;</label>
                                  <input type="radio" id="star3" name="rating" value="3" /><label for="star3">&#9733;</label>
                                  <input type="radio" id="star2" name="rating" value="2" /><label for="star2">&#9733;</label>
                                  <input type="radio" id="star1" name="rating" value="1" /><label for="star1">&#9733;</label>
                                </div>
                              </div>
                              
                                <div class="d-flex justify-content-end mt-3">
                                    <button type="reset" id="" class="btn btn-reset text-white font-inter">Reset</button>
                                    <button type="submit" id="" class="btn btn-submit text-white font-inter ml-3">Submit</button>
                                </div>
                            </form>
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




<!-- REQUIRED SCRIPTS -->
 
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('feedbackForm');

    form.addEventListener('submit', function (e) {
      e.preventDefault();

      const feedback = document.getElementById('feedbackText').value.trim();
      const rating = document.querySelector('input[name="rating"]:checked')?.value || '';

      if (!feedback || !rating) {
        Swal.fire({
          icon: 'warning',
          title: 'Missing Information',
          text: 'Please enter your feedback and select a rating.',
        });
        return;
      }

      // Ask for guest name using SweetAlert input
      Swal.fire({
        title: 'Enter your name',
        input: 'text',
        inputPlaceholder: 'Your name...',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        cancelButtonText: 'Cancel',
        inputValidator: (value) => {
          if (!value) {
            return 'Name is required!';
          }
        }
      }).then((result) => {
        if (result.isConfirmed) {
          const guestName = result.value;

          fetch('../views/resident/submit_feeback.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
              feedback: feedback,
              rating: rating,
              guest_name: guestName,
            }),
          })
          .then(response => response.json())
          .then(result => {
            if (result.status === 'success') {
              Swal.fire({
                icon: 'success',
                title: 'Thank you!',
                text: 'Your feedback has been submitted.',
              });
              form.reset();
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Submission Failed',
                text: result.message || 'An error occurred while submitting your feedback.',
              });
            }
          })
          .catch(error => {
            console.error(error);
            Swal.fire({
              icon: 'error',
              title: 'Oops!',
              text: 'Something went wrong while submitting your feedback.',
            });
          });
        }
      });
    });
  });
</script>



</body>
</html>
