<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Announcements</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 for the success message -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
       html, body {
            height: 100%;
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color:rgb(248, 248, 248);
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


    /* Add these styles to your CSS */
#dynamic-announcements {
    max-height: 650px;
    overflow-y: auto;
    scrollbar-width: none; /* For Firefox */
    -ms-overflow-style: none; /* For IE/Edge */
    
    /* Smooth scrolling */
    scroll-behavior: smooth;
    
    /* Custom scrollbar for Webkit browsers (Chrome, Safari) */
    &::-webkit-scrollbar {
        display: none;
    }
    
    /* Optional: Add padding to prevent content from touching edges */
    padding-right: 8px;
}

/* For smoother transitions when content changes */
#dynamic-announcements {
    transition: max-height 0.3s ease;
}

        .main-content {
    max-width: 800px;
    margin: 0 auto;
}
.filter-header {
    background-color: #000155;
    padding: 15px 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
}
.filter-header h5 {
    color: white;
    margin: 0;
    padding: 0;
    font-size: 1.5rem;
}
.filter-controls {
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.filter-top-row, .filter-bottom-row {
    display: flex;
    gap: 10px;
    align-items: center;
    justify-content: flex-end;
}
.filter-label {
    color: white;
    margin: 0;
    white-space: nowrap;
}
.announcement-card {
    margin-bottom: 15px;
    border-radius: 10px;
    overflow: hidden;
    border: none;
    transition: box-shadow 0.3s ease;
}
.announcement-card:hover {
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
}
.announcement-header {
    display: flex;
    align-items: center;
    padding: 10px 15px;
}
.profile-img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}
.announcement-type {
    font-size: 0.8rem;
    color: #666;
    margin-left: auto;
}
.announcement-body {
    padding: 15px;
}
.announcement-image {
    width: 100%;
    max-height: 300px;
    object-fit: cover;
    margin-bottom: 10px;
}
.announcement-footer {
    display: flex;
    justify-content: space-between;
    padding: 10px 15px;
    border-top: 1px solid #eee;
}
.actions-container {
    display: flex;
    align-items: center;
}
.action-btn {
    background: none;
    border: none;
    color: #666;
    cursor: pointer;
    display: flex;
    align-items: center;
    margin-right: 15px;
}
.action-btn:last-child {
    margin-right: 0;
}
.action-btn i {
    margin-right: 5px;
}
.action-btn.active {
    color: #4dbaac;
}
.timestamp {
    font-size: 0.8rem;
    color: #666;
    text-align: right;
}
#no-announcements {
    text-align: center;
    padding: 30px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    margin: 20px 0;
}
.comments-section {
    padding: 0 15px 15px;
    display: none;
}
.comment-form {
    margin-bottom: 15px;
}
.comment-item {
    background-color: #f9f9f9;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 8px;
}
.comment-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 5px;
}
.comment-author {
    font-weight: bold;
    font-size: 0.9rem;
}
.comment-date {
    font-size: 0.75rem;
    color: #777;
}
.comment-text {
    font-size: 0.9rem;
    margin-bottom: 0;
}
.badge-count {
    background-color:#000155;
    color: #ffffff;
    font-size: 0.75rem;
    border-radius: 5px;
    margin-left: 5px;
}
.admin-reply-section {
    margin-top: 8px;
    padding-left: 15px;
    border-left: 3px solid #4dbaac;
}
.admin-reply {
    background-color: #e8f5f5;
    padding: 8px;
    border-radius: 8px;
    margin-top: 5px;
}
.date-input-group {
    position: relative;
}
.date-input-group .form-control {
    padding-right: 3%;
}
.date-input-group .bi-calendar {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
    color: #777;
}



/* ENHANCED IMAGE STYLES (SIMPLIFIED) */
.announcement-images-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 5px;
    margin: 12px 0;
}

.image-container {
    position: relative;
    aspect-ratio: 1;
    overflow: hidden;
    border-radius: 6px;
    cursor: pointer;
    background-color: #f5f5f5;
    max-height: 150px;
    max-width: 150px;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;

}

.ann-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}

.image-container:hover .ann-image {
    transform: scale(1.03);
}

.more-count {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.5);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    font-weight: bold;
    z-index: 2;
}

/* GALLERY MODAL STYLES */
.gallery-modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.9);
}

.modal-content {
    position: relative;
    margin: auto;
    width: 90%;
    max-width: 800px;
    height: 80vh;
    margin-top: 5vh;
}

.close-modal {
    position: absolute;
    top: -40px;
    right: 0;
    color: white;
    font-size: 35px;
    font-weight: bold;
    cursor: pointer;
}

.gallery-slide {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.gallery-image {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.gallery-counter {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    color: white;
    background: rgba(0,0,0,0.5);
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 14px;
}

.gallery-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 40px;
    height: 40px;
    background: rgba(0,0,0,0.5);
    color: white;
    border: none;
    border-radius: 50%;
    font-size: 20px;
    cursor: pointer;
}

.gallery-nav.prev {
    left: 10px;
}

.gallery-nav.next {
    right: 10px;
}

@media (max-width: 768px) {
    .modal-content {
        width: 95%;
        height: 60vh;
    }
    
    .gallery-nav {
        width: 30px;
        height: 30px;
        font-size: 16px;
    }
}


/* Notification Styles */
.notification-container {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 1000;
    max-width: 300px;
}

.notification {
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 4px;
    color: white;
    background-color: #4CAF50;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    animation: slideIn 0.5s, fadeOut 0.5s 2.5s forwards;
    display: flex;
    align-items: center;
}

.notification.error {
    background-color: #f44336;
}

.notification.warning {
    background-color: #ff9800;
}

@keyframes slideIn {
    from { transform: translateX(100%); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

@keyframes fadeOut {
    from { opacity: 1; }
    to { opacity: 0; }
}

.notification i {
    margin-right: 10px;
    font-size: 20px;
}

</style>

</head>

<body >

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













    <div class="notification-container" id="notification-container"></div>


    <div class="main-content font-inter ">
        <!-- filter bar -->
        <div class="filter-header">
            <h5>Announcements</h5>
            <div class="filter-controls">
                <div class="filter-top-row">
                    <span class="filter-label">Filter by :</span>
                    <select class="form-select" id="announcement-type-filter">
                        <option value="ALL" selected>All Announcements</option>
                        <!-- Options will be dynamically inserted here -->
                    </select>
                </div>
                <div class="filter-bottom-row">
                    <button class="btn btn-light" id="search-btn">Search</button>
                    <div class="date-input-group">
                        <input type="date" class="form-control" id="date-filter">
                    </div>
                </div>
            </div>
        </div>

        <!-- dynamic announcements -->
        <div id="dynamic-announcements" style="max-height: 650px; overflow-y: auto;">
            <!-- dynamic announcements diri nga part ma display -->
        </div>

        <!-- if walay announcements, mao ni madisplay -->
        <div id="no-announcements" style="display: none;">
            <p class="mb-0">No announcements found matching your criteria.</p>
        </div>

    </div>

</div>


<!-- Add this before closing </body> tag -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery (required by Bootstrap 4) -->   
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4.6.2 Bundle (includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">



    
<!-- JavaScript for handling dynamic content -->
<script>

    // MAIN ANNOUNCEMENTS DISPLAY SCRIPT
    document.addEventListener('DOMContentLoaded', function() {
    // DOM Elements
    const announcementsContainer = document.getElementById('dynamic-announcements');
    const noAnnouncementsMsg = document.getElementById('no-announcements');
    const typeFilter = document.getElementById('announcement-type-filter');
    const dateFilter = document.getElementById('date-filter');
    const searchBtn = document.getElementById('search-btn');

    // State
    let allAnnouncements = [];
    let currentUser = {}; 
    let announcementTypes = []; // Store loaded types

    // Initialize
    loadAnnouncementTypes(); 
    loadAnnouncements();
    setupEventListeners();
    initGallery();


    function loadAnnouncementTypes() {
        fetch('../backend/resident/get_announcement_type.php')
            .then(handleResponse)
            .then(data => {
                announcementTypes = data;
                populateTypeFilter(data);
            })
            .catch(error => {
                console.error('Error loading announcement types:', error);
                // Fallback to hardcoded types if needed
                const fallbackTypes = [
                    {ann_type_name: 'Notice'},
                    {ann_type_name: 'Event'},
                    {ann_type_name: 'Project Update'},
                    {ann_type_name: 'Emergency Alert'}
                ];
                populateTypeFilter(fallbackTypes);
            });
    }

    function populateTypeFilter(types) {
        // Clear existing options (keep the ALL option)
        while (typeFilter.options.length > 1) {
            typeFilter.remove(1);
        }
        
        // Add new options from the database
        types.forEach(type => {
            const option = document.createElement('option');
            option.value = type.ann_type_name.toUpperCase().replace(/ /g, '_');
            option.textContent = type.ann_type_name;
            typeFilter.appendChild(option);
        });
    }

    // Main Functions
    function loadAnnouncements() {
        fetch('../backend/resident/get_all_announcement.php')
            .then(handleResponse)
            .then(data => {
                allAnnouncements = data;
                renderAnnouncements(data);
            })
            .catch(handleError);
    }

    function renderAnnouncements(announcements) {

        const container = document.getElementById('dynamic-announcements');
        container.style.scrollBehavior = 'auto';
        container.scrollTop = 0; 
        container.style.scrollBehavior = 'smooth'; 

        announcementsContainer.innerHTML = '';
        
        if (announcements.length === 0) {
            noAnnouncementsMsg.style.display = 'block';
            return;
        }
        
        noAnnouncementsMsg.style.display = 'none';
        
        announcements.forEach(announcement => {
            const announcementEl = createAnnouncementElement(announcement);
            announcementsContainer.appendChild(announcementEl);
        });
    }

    function createAnnouncementElement(announcement) {
        const date = new Date(announcement.pos_ann_date);
        const formattedDate = date.toLocaleDateString('en-US', { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        });
        const formattedTime = date.toLocaleTimeString('en-US', { 
            hour: '2-digit', 
            minute: '2-digit' 
        });

        const profileImgPath = announcement.admin_image 
            ? `../server_img/${announcement.admin_image}`
            : '../server_imgs/default_user_img.jpg';

        const element = document.createElement('div');
        element.className = 'card shadow-sm announcement-card ';
        element.dataset.id = announcement.pos_ann_id;
        element.dataset.type = announcement.ann_type_name.toUpperCase().replace(' ', '_');
        element.dataset.date = announcement.pos_ann_date.split(' ')[0];

        element.innerHTML = `
            <div class="announcement-header">
                <img src="${profileImgPath}" alt="Barangay Avatar" class="profile-img"
                     onerror="this.src='../server_imgs/default_user_img.jpg'">
                <div>
                    <h6 class="mb-0">${announcement.admin_fname} ${announcement.admin_lname}</h6>
                </div>
                <span class="announcement-type text-white p-2 rounded" style="background-color: #000155;">${announcement.ann_type_name}</span>
            </div>
            <div class="announcement-body">
                <h6> <strong> ${announcement.pos_ann_title} </strong></h6>
                <p>${announcement.pos_ann_description.replace(/\n/g, '</p><p>')}</p>
                ${renderAnnouncementImages(announcement.images, announcement.pos_ann_id)}
            </div>
            <div class="announcement-footer">
                <div class="actions-container">
                   
                    <button class="action-btn comment-btn" 
                            data-announcement-id="${announcement.pos_ann_id}">
                        <i class="bi bi-chat"></i> Comment <span class="badge-count p-1">${announcement.comment_count || 0}</span>
                    </button>
                </div>
                <div class="timestamp">
                    <div>${formattedDate}</div>
                    <div>${formattedTime}</div>
                </div>
            </div>
            <div class="comments-section" id="comments-${announcement.pos_ann_id}">
                <div class="comment-form">
                    <div class="mb-2">
                        <input type="text" class="form-control name-input" 
                            placeholder="Your alias (optional)" maxlength="50"
                            pattern="[A-Za-z0-9 ]{2,50}" title="2-50 letters/numbers">
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control comment-input" 
                               placeholder="Write a comment...">
                        <button class="btn btn-outline-secondary submit-comment-btn" 
                                type="button" 
                                data-announcement-id="${announcement.pos_ann_id}">
                            <i class="nav-icon fa-solid fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
                <div class="comments-list" style="max-height: 350px; overflow-y: auto;">
                    ${renderComments(announcement.comments)}
                </div>
            </div>
        `;

        return element;
    }

    // Enhanced Image Rendering with Gallery
    function renderAnnouncementImages(images, announcementId) {
            if (!images || images.length === 0) return '';
            
            const MAX_PREVIEW = 4;
            const remainingCount = Math.max(0, images.length - MAX_PREVIEW);
            
            return `
                <div class="announcement-images-grid" data-announcement-id="${announcementId}">
                    ${images.slice(0, MAX_PREVIEW).map((img, index) => `
                        <div class="image-container" 
                            data-index="${index}" 
                            data-announcement-id="${announcementId}">
                            <img src="../backend/${img.pos_img_img}" 
                                alt="Announcement Image ${index + 1}"
                                class="ann-image"
                                onerror="this.style.display='none'">
                            ${index === MAX_PREVIEW - 1 && remainingCount > 0 ? 
                                `<div class="more-count">+${remainingCount}</div>` : ''}
                        </div>
                    `).join('')}
                </div>
            `;
        }
    // Gallery Management
    function initGallery() {
        // Create modal element if it doesn't exist
        if (!document.getElementById('galleryModal')) {
            const modal = document.createElement('div');
            modal.id = 'galleryModal';
            modal.className = 'gallery-modal';
            modal.innerHTML = `
                <div class="modal-content">
                    <span class="close-modal">&times;</span>
                    <div class="gallery-slide">
                        <img src="" alt="Gallery Image" class="gallery-image">
                    </div>
                    <div class="gallery-counter"></div>
                    <button class="gallery-nav prev">&#10094;</button>
                    <button class="gallery-nav next">&#10095;</button>
                </div>
            `;
            document.body.appendChild(modal);
        }

        // Event delegation for image clicks
        document.addEventListener('click', function(e) {
            const imgContainer = e.target.closest('.image-container');
            if (imgContainer) {
                const announcementId = imgContainer.dataset.announcementId;
                const startIndex = parseInt(imgContainer.dataset.index);
                const announcement = allAnnouncements.find(a => a.pos_ann_id == announcementId);
                
                if (announcement && announcement.images) {
                    openGallery(startIndex, announcement.images, announcementId);
                }
            }
        });
    }

    function openGallery(startIndex, images, announcementId) {
        const modal = document.getElementById('galleryModal');
        const slide = modal.querySelector('.gallery-slide');
        const counter = modal.querySelector('.gallery-counter');
        
        // Update modal with current image
        const currentImage = images[startIndex];
        slide.innerHTML = `
            <img src="../backend/${currentImage.pos_img_img}" 
                 alt="Gallery Image ${startIndex + 1}"
                 class="gallery-image">
        `;
        counter.textContent = `${startIndex + 1}/${images.length}`;
        
        // Set up navigation
        modal.querySelector('.prev').onclick = () => navigateGallery(-1, images, announcementId);
        modal.querySelector('.next').onclick = () => navigateGallery(1, images, announcementId);
        modal.querySelector('.close-modal').onclick = closeGallery;
        
        // Show modal
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
        
        // Keyboard navigation
        document.addEventListener('keydown', handleKeyDown);
        
        function handleKeyDown(e) {
            if (e.key === 'Escape') closeGallery();
            if (e.key === 'ArrowLeft') navigateGallery(-1, images, announcementId);
            if (e.key === 'ArrowRight') navigateGallery(1, images, announcementId);
        }
        
        // Store current state
        modal._currentIndex = startIndex;
        modal._images = images;
        modal._announcementId = announcementId;
        modal._keyHandler = handleKeyDown;
    }

        function navigateGallery(direction, images, announcementId) {
            const modal = document.getElementById('galleryModal');
            let currentIndex = modal._currentIndex;
            const totalImages = images.length;
            
            currentIndex = (currentIndex + direction + totalImages) % totalImages;
            modal._currentIndex = currentIndex;
            
            // Update modal with new image
            const currentImage = images[currentIndex];
            modal.querySelector('.gallery-slide').innerHTML = `
                <img src="../backend/${currentImage.pos_img_img}" 
                    alt="Gallery Image ${currentIndex + 1}"
                    class="gallery-image">
            `;
            modal.querySelector('.gallery-counter').textContent = `${currentIndex + 1}/${totalImages}`;
        }

        function closeGallery() {
            const modal = document.getElementById('galleryModal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
            document.removeEventListener('keydown', modal._keyHandler);
        }

        function renderComments(comments) {
            if (!comments || comments.length === 0) {
                return '<p class="text-muted">No comments yet</p>';
            }
            
            return comments.map(comment => {
                const commentDate = new Date(comment.com_date);
                return `
                    <div class="comment mt-3">
                        <div class="comment-header">
                            <span class="comment-author">${comment.commenter_name}</span>
                            <span class="comment-time" style="font-size: 12px;">
                                ${commentDate.toLocaleDateString()} 
                                ${commentDate.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}
                            </span>
                        </div>
                        <div class="comment-text">${comment.com_description}</div>
                    </div>
                `;
            }).join('');
        }

        function filterAnnouncements() {
            const typeValue = typeFilter.value;
            const dateValue = dateFilter.value;
            
            let filtered = allAnnouncements;
            
            if (typeValue !== 'ALL') {
                filtered = filtered.filter(ann => {
                    // Normalize both values for comparison
                    const announcementType = ann.ann_type_name.toUpperCase().replace(/ /g, '_');
                    return announcementType === typeValue;
                });
            }
            
            if (dateValue) {
                filtered = filtered.filter(ann => 
                    ann.pos_ann_date.startsWith(dateValue)
                );
            }
            
            renderAnnouncements(filtered);
        }


        function handleCommentSubmit(e) {
            const btn = e.target.closest('.submit-comment-btn');
            if (!btn) return;
            
            const announcementId = btn.dataset.announcementId;
            const form = btn.closest('.comment-form');
            const commentInput = form.querySelector('.comment-input');
            const nameInput = form.querySelector('.name-input');
            const commentText = commentInput.value.trim();
            const anonymousName = nameInput.value.trim();
            
            if (!commentText) {
                showNotification('Please enter a comment before submitting', 'warning');
                return;
            }
            
            // Show loading state
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Posting...';
            
            fetch('../backend/resident/submit_comment.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ 
                    announcement_id: announcementId,
                    comment_text: commentText,
                    anonymous_name: anonymousName || undefined
                })
            })
            .then(handleResponse)
            .then(data => {
                if (data.success) {
                    showNotification('Comment posted successfully!');
                    
                    // Update comment count
                    const commentBtn = document.querySelector(`.comment-btn[data-announcement-id="${announcementId}"]`);
                    if (commentBtn) {
                        const badge = commentBtn.querySelector('.badge-count');
                        badge.textContent = data.comment_count;
                    }
                    
                    // Clear inputs
                    commentInput.value = '';
                    nameInput.value = '';
                    
                    // Fetch and refresh all comments
                    return fetch(`../backend/resident/get_all_announcement.php?comments_for=${announcementId}`);
                } else {
                    showNotification(data.message || 'Failed to post comment', 'error');
                }
            })
            .then(handleResponse)
            .then(response => {
                if (response.success && response.comments) {
                    const commentsList = document.querySelector(`#comments-${announcementId} .comments-list`);
                    if (commentsList) {
                        commentsList.innerHTML = renderComments(response.comments);
                        const noCommentsMsg = commentsList.querySelector('.text-muted');
                        if (noCommentsMsg) noCommentsMsg.remove();
                    }
                }
            })
            .catch(error => {
                showNotification('An error occurred while posting your comment', 'error');
                console.error('Error:', error);
            })
            .finally(() => {
                // Reset button state
                btn.disabled = false;
                btn.innerHTML = '<i class="nav-icon fa-solid fa-paper-plane"></i>';
            });
        }


        

        function toggleComments(e) {
                const btn = e.target.closest('.comment-btn');
                if (!btn) return;
                
                const announcementId = btn.dataset.announcementId;
                const commentsSection = document.getElementById(`comments-${announcementId}`);
                
                if (commentsSection) {
                    commentsSection.style.display = commentsSection.style.display === 'none' ? 'block' : 'none';
                }
            }

            function handleResponse(response) {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            }

            function handleError(error) {
                console.error('Error:', error);
                // You might want to show a user-friendly error message here
            }

            function setupEventListeners() {
                // Filter controls
                typeFilter.addEventListener('change', filterAnnouncements);
                dateFilter.addEventListener('change', filterAnnouncements);
                searchBtn.addEventListener('click', filterAnnouncements);
                
                // Dynamic content event delegation
                announcementsContainer.addEventListener('click', function(e) {
                    handleCommentSubmit(e);
                    toggleComments(e);
                });
            }

            function showNotification(message, type = 'success', duration = 3000) {
                const container = document.getElementById('notification-container');
                const notification = document.createElement('div');
                notification.className = `notification ${type}`;
                
                // Add icon based on notification type
                let icon = '';
                switch(type) {
                    case 'success':
                        icon = '<i class="bi bi-check-circle-fill"></i>';
                        break;
                    case 'error':
                        icon = '<i class="bi bi-exclamation-triangle-fill"></i>';
                        break;
                    case 'warning':
                        icon = '<i class="bi bi-exclamation-circle-fill"></i>';
                        break;
                    default:
                        icon = '<i class="bi bi-info-circle-fill"></i>';
                }
                
                notification.innerHTML = `${icon}${message}`;
                container.appendChild(notification);
                
                // Remove notification after duration
                setTimeout(() => {
                    notification.remove();
                }, duration);
            }

    });
</script>


</body>
</html>