<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Barangay Officials</title>

  
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<!--
body tag options:

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


.border-none{
  border: none;
}



/* ======================================================================================== */
/* MAIN CONTENT STYLE */
body {
    background-color: #E2F5F3;
}

.officials-container {
    background-color: #000155;
    border-radius: 20px;
    padding: 30px;
    max-height: 700px;
    overflow-y: auto;
}

.official-card {
    background-color:rgb(246, 247, 255);
    border-radius: 15px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    position: relative;
    margin-bottom: 20px;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.official-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

/* Special cards */
.official-card-captain {
    border: 3px solid #FFD700;
    background: linear-gradient(135deg, #ffffff 0%, #fff9e6 100%);
}

.official-card-skchair {
    border: 3px solid #4A90E2;
    background: linear-gradient(135deg, #ffffff 0%, #f0f7ff 100%);
}

/* Position badges */
.position-badge {
    position: absolute;
    top: -10px;
    right: 15px;
    padding: 3px 15px;
    border-radius: 15px;
    font-weight: bold;
    font-size: 12px;
    color: white;
    z-index: 2;
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.captain-badge {
    background: #FFD700;
    color: #000;
}

.sk-badge {
    background: #4A90E2;
}

/* Image styling */
.official-image-container {
    width: 120px;
    height: 120px;
    margin: 0 auto 15px;
    border-radius: 50%;
    padding: 5px;
    background: white;
}

.official-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.img-border-gold {
    border: 3px solid #FFD700;
}

.img-border-blue {
    border: 3px solid #4A90E2;
}

/* Text styling */
.official-name {
    font-weight: bold;
    margin: 10px 0 5px;
    font-size: 1.1rem;
    color: #333;
}

.official-title {
    font-weight: 600;
    color: #000155;
    margin-bottom: 8px;
    font-size: 0.95rem;
}

.official-role {
    font-size: 0.85rem;
    color: #555;
    margin-top: auto;
    font-style: italic;
}

.scrollbar::-webkit-scrollbar {
    width: 5px;
}

.scrollbar::-webkit-scrollbar-thumb {
    background: #FFFFFF;
    border-radius: 10px;
}

.bg {
    background-color: rgb(255, 255, 255);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .official-card {
        padding: 15px;
    }
    
    .official-image-container {
        width: 100px;
        height: 100px;
    }
    
    .official-name {
        font-size: 1rem;
    }
}

</style>



<body class="hold-transition sidebar-mini bg">
  <div class="wrapper">

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



                      
                <!-- MAIN CONTENT -->
                <div class="container mt-0 text-center">
                    <h3 class="mb-4">Meet Your Barangay Officials</h3>
                    <div class="officials-container scrollbar">
                        <div class="row g-4" id="main-officials-container">
                            <!-- Loading spinner will appear here initially -->
                            <div class="col-12 text-center my-5">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="text-white">Loading officials...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container text-center" style="margin-top: 150px; margin-bottom: 150px;">
                    <h3 class="mb-4">Meet Your SK Officials</h3>
                    <div class="officials-container mb-5 scrollbar">
                        <div class="row g-4" id="sk-officials-container">
                            <!-- Loading spinner will appear here initially -->
                            <div class="col-12 text-center my-5">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="text-white">Loading SK officials...</p>
                            </div>
                        </div>
                    </div>
                </div>





                <!-- VIEW OFFICIAL MODAL -->
                <div class="modal fade" id="officialModal" tabindex="-1" aria-labelledby="officialModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
                        <div class="modal-content text-center" style="background-color:rgb(243, 243, 255);">
                            <div class="modal-header p-2" style="border: none;">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body ps-5 pe-5">
                                <img id="modalImage" src="" class="rounded mb-3" alt="Official" style="width: 150px; height: 150px; object-fit: cover; box-shadow: 50px;">
                                <h5 id="modalName" class="mb-1"></h5>
                                <p id="modalTitle" class="mb-3" style="color: black;"></p>
                                <p id="modalRole" style="color: #555555;"></p>

                                <div class="p-3 mb-5" style="border: 1px solid #000000; border-radius: 40px;">
                                    <p id="modalDescription" class="mb-0"></p>
                                </div>

                                <div class="d-flex justify-content-center gap-5">
                                    <div>📞 <span id="modalPhone">Not available</span></div>
                                    <div>✉️ <span id="modalEmail">Not available</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



    </div>
    <!-- end of wrapper -->





    <!-- footer -->
    <footer class="p-2 pt-5 bg">
        
        <div class="row p-2 pt-3" style=" background-color:rgb(238, 238, 238);">
            
            <div class="col-3 text-center mb-2" style=" height: 150px; ">
            <img src="img/logo.jpg" alt="" style=" height: 100%; object-fit:cover; border-radius: 50%; box-shadow: 0 5px 10px #808080;">
            </div>

            <div class="col-3  pl-2" >
                <div class="row mb-2">
                <a href="#" class="nav-link  font-inter " role="button" style="color:black;">
                    <i class="nav-icon1 fa-solid fa-location-dot mr-3"></i>
                    <span id="location" class="mr-4"></span>
                </a>
                </div>
                <div class="row mb-2">
                <a href="#" class="nav-link  font-inter" role="button" style="color:black;">
                    <i class="nav-icon1 fa-solid fa-phone-volume mr-2"></i>
                    <span >Contact: <span id="contact"></span> </span>
                </a>
                </div>
                <div class="row mb-2">
                <a href="#" class="nav-link  font-inter"  role="button" style="color:black;">
                    <i class="nav-icon1 fa-solid fa-clock mr-2"></i> Open:
                    <span id="available"> </span>
                </a>
                </div>
                <div class="row mb-2">
                <a href="../admin/admin_login2.php" class="nav-link font-inter" style="color:black;"  role="button">
                        <i class="nav-icon1 fa-solid fa-user-tie mr-2"></i>
                        <span  id="app_name_value" class="ml-1 ">Buaya InfoSystem </span>
                    </a>
                </div>
            </div>

            <div class="col-3 text-center">
                <h5 class=" pr-3 font-inter">Navigations</h5>
                <div class="row mt-4 pl-5 pr-5">

                <div class="row w-100 mb-3">
                    <div class="col">  <a href="homepage.php"> <i class="nav-icon1 fa-solid fa-house"></i></a> </div>
                    <div class="col">  <a href="admin_profile.php"> <i class="nav-icon1 fa-solid fa-address-card"></i> </a></div>
                    <div class="col">  <a href="admin_profile.php"> <i class="nav-icon1 fa-solid fa-phone"></i></a></div>
                    <div class="col">  <a href="announcement_resident.php"> <i class="nav-icon1 fa-solid fa-bullhorn"></i></a> </div>
                  </div>

                  <div class="row w-100">
                    <div class="col">  <a href="residentViewOfficials.php"> <i class="nav-icon1 fa-solid fa-users"></i></a> </div>
                    <div class="col">  <a href="residentRequestDocument.php"> <i class="nav-icon1 fa-solid fa-file"></i></a> </div>
                    <div class="col"> <a href="calendar.php"> <i class="nav-icon1 fa-solid fa-calendar-days"></i></a> </div>
                  </div>


                </div>
            </div>

            <div class="col-3 font-inter">
                <h3 class="mb-4 font-inter " >Help us improve the <br> design system</h3>
                <a href="#" style=" padding:10px; border: 1px solid rgb(0, 0, 0); text-decoration: none; color: black;">Send us a message</a>
            </div>
        </div>

        <div class="row p-1 font-inter text-white justify-content-center align-items-center" 
            style="background-color:  #000155; display: flex; text-align: center;">
            <p class="mb-0">© 2025 Buaya Info System. <br> All rights reserved.</p>
        </div>

    </footer>








<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fetch officials data from PHP endpoint
    fetch('../backend/resident/get_all_officials.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Sort and render main officials with captain first
            const sortedMain = sortOfficials(data.main, 'captain');
            renderOfficials(sortedMain, 'main-officials-container', 'main');
            
            // Sort and render SK officials with chairman first
            const sortedSK = sortOfficials(data.sk, 'sk chairman');
            renderOfficials(sortedSK, 'sk-officials-container', 'sk');
        })
        .catch(error => {
            console.error('Error fetching officials:', error);
            
            // Show error messages
            document.getElementById('main-officials-container').innerHTML = `
                <div class="col-12">
                    <div class="alert alert-danger">
                        Failed to load officials. Please try again later.
                    </div>
                </div>`;
            
            document.getElementById('sk-officials-container').innerHTML = `
                <div class="col-12">
                    <div class="alert alert-danger">
                        Failed to load SK officials. Please try again later.
                    </div>
                </div>`;
        });

    // Sort officials with specific position first
    function sortOfficials(officials, firstPosition) {
        return [...officials].sort((a, b) => {
            if (a.pos_name === firstPosition) return -1;
            if (b.pos_name === firstPosition) return 1;
            return 0;
        });
    }

    // Function to render officials with type-specific styling
    function renderOfficials(officials, containerId, type) {
        const container = document.getElementById(containerId);
        
        if (!officials || officials.length === 0) {
            container.innerHTML = '<div class="col-12"><p>No officials found.</p></div>';
            return;
        }

        container.innerHTML = officials.map(official => {
            // Handle image path
            const imgPath = official.res_image 
                ? `../${official.res_image}` 
                : '../server_imgs/default_user_img.jpg';
            
            const fullName = `${official.res_first_name} ${official.res_last_name}`;
            const displayName = `Hon. ${fullName}`;
            
            // Determine special styling
            const isCaptain = official.pos_name === 'captain';
            const isSKChairman = official.pos_name === 'sk chairman';
            const specialClass = isCaptain ? 'official-card-captain' : 
                               isSKChairman ? 'official-card-skchair' : '';
            
            // Position label for important roles
            const positionLabel = isCaptain ? 'BARANGAY CAPTAIN' : 
                                 isSKChairman ? 'SK CHAIRMAN' : 
                                 official.pos_name.toUpperCase();
            
            return `
                <div class="col-md-3">
                    <div class="official-card ${specialClass}" 
                        data-img="${escapeHtml(imgPath)}"
                        data-name="${escapeHtml(displayName)}"
                        data-title="${escapeHtml(official.pos_name)}"
                        data-role="${escapeHtml(official.off_committee || '')}"
                        data-description="${escapeHtml(official.off_description || '')}"
                        data-phone="${escapeHtml(official.res_contact_number || '')}"
                        data-email="${escapeHtml(official.res_email_address || '')}">
                        
                        ${isCaptain ? '<div class="position-badge captain-badge">CAPTAIN</div>' : ''}
                        ${isSKChairman ? '<div class="position-badge sk-badge">CHAIRMAN</div>' : ''}
                        
                        <div class="official-image-container">
                            <img src="${escapeHtml(imgPath)}" 
                                alt="${escapeHtml(fullName)}"
                                class="official-image ${isCaptain ? 'img-border-gold' : isSKChairman ? 'img-border-blue' : ''}">
                        </div>
                        <div class="official-name">${escapeHtml(displayName)}</div>
                        <div class="official-title">${escapeHtml(positionLabel)}</div>
                        ${official.off_committee ? 
                            `<div class="official-role">${escapeHtml(official.off_committee)}</div>` : ''}
                    </div>
                </div>
            `;
        }).join('');

        // Add click event listeners to all cards
        container.querySelectorAll('.official-card').forEach(card => {
            card.addEventListener('click', function() {
                const imgSrc = this.getAttribute('data-img');
                const name = this.getAttribute('data-name');
                const title = this.getAttribute('data-title');
                const role = this.getAttribute('data-role');
                const description = this.getAttribute('data-description');
                const phone = this.getAttribute('data-phone');
                const email = this.getAttribute('data-email');

                // Set modal content
                document.getElementById('modalImage').src = imgSrc;
                document.getElementById('modalName').textContent = name;
                document.getElementById('modalTitle').textContent = title;
                document.getElementById('modalRole').textContent = role || 'No specific role';
                document.getElementById('modalDescription').textContent = 
                    description || `${name} is a dedicated barangay official.`;
                document.getElementById('modalPhone').textContent = phone || 'Not available';
                document.getElementById('modalEmail').textContent = email || 'Not available';

                // Show the modal
                const modal = new bootstrap.Modal(document.getElementById('officialModal'));
                modal.show();
            });
        });
    }

    // Helper function to escape HTML
    function escapeHtml(unsafe) {
        if (!unsafe) return '';
        return unsafe.toString()
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }
});
</script>



    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="dist/js/adminlte.min.js"></script>



    <!-- get some barangay info -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
    
    // Show loading message
    console.log('Loading barangay data...');
    
    // Fetch data from your PHP script
    fetch('../backend/resident/get_barangay.php')
        .then(response => response.json())
        .then(data => {
            console.log('Data received:', data);
            
            if (data.success) {
                // Update the HTML elements with database data
                const barangayData = data.data;
                
               
                if (barangayData.bar_available_start_time && barangayData.bar_available_end_time) {
                    document.getElementById('available').textContent = 
                        barangayData.bar_available_start_time + ' - ' + barangayData.bar_available_end_time;
                } 

                // Location - FIXED: No more hardcoded override
                if (barangayData.bar_name && barangayData.bar_municipality) {
                    document.getElementById('location').textContent = 
                        'Barangay ' + barangayData.bar_name + ', ' + barangayData.bar_municipality;
                }

                 if (barangayData.bar_contact_cellphone) {
                    document.getElementById('contact').textContent = barangayData.bar_contact_cellphone;
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