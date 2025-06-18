<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reviews</title>

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


  
  <!-- SweetAlert2 CSS (optional, for styling) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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

.nav-link {
  display: flex;
  align-items: center;   /* Align icon and text vertically */
  gap: 8px;              /* Optional: spacing between icon and text */
  color: black;          /* Ensures the text color matches icon if needed */
}

.nav-link p {
  margin: 0;             /* Remove default margins from <p> */
}

.brand-image {
  max-height: none !important;
  height: 180px !important;
  width: 180px !important; 
  margin-top: 30px !important;
  border-radius: 50% !important;

  transition: all 0.3s ease-in-out;
}

.sidebar-collapse .brand-image {
  height: 60px !important;
  width: 60px !important;
  margin-left: 7px;
  transition: all 0.3s ease-in-out;
}

.nav-sidebar .nav-link .nav-select{
  margin: 0;  
  font-size: 17px !important;
}

/* For main menu items */
.nav-sidebar .nav-item > .nav-link:hover {
  background-color: #a0dfd4; /* hover background color */
  border-radius: 5px;
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
}



.nav-sidebar .nav-link .nav-dr-icon, 
.nav-sidebar .nav-link .nav-residence-icon,
.nav-sidebar .nav-link .nav-direct-icon{
  font-size: 15px !important;
  margin-left: 20px;
}

li a p{
  font-size: 18px !important; 
  font-weight: 200;
}

.nav-item i{
  font-size: 19px !important;  
}

/* SETTINGS DD STYLE */
/* Hover effect for submenu links */
#directorySubmenu .dropdown-item:hover {
  color: rgb(0, 34, 144);
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
  color: rgb(0, 34, 144) ; 
  text-decoration: none ;
}


/* Font color on hover */
.dropdown-menu .dropdown-item:hover,
.dropdown-menu .dropdown-item:focus,
.dropdown-menu .dropdown-item:active {
  color: rgb(0, 34, 144); 
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

.cards{
  transition: .5s ease-in-out;
}


.cards:hover{
  transform: translateY(-5px);
  transition: .5s ease-in-out;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

/* FONT */
.font-inter {
  font-family: 'Inter', sans-serif;
}

.active-icon{
  margin-left: 5px;
  margin-right: 10px;
  color: green;
  font-size: 11px;
}

.bord{
  border: 1px solid rgba(202, 202, 202, 0.85);
  border-radius: 10px;
}

.tc{
  color: #147662;
}
</style>



<body class="hold-transition sidebar-mini">
    <div class="wrapper">
  
     <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white" style="border: none; box-shadow: none;">




<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">

  <!-- HOME -->
  <li class="nav-item mr-4">
    <a href="dashboard.php" class="nav-link">
      <i class="fa-solid fa-house" style="color:black;"></i>
    </a>
  </li>

  <!-- REVIEWS -->
  <li class="nav-item mr-3">
    <a class="nav-link"  href="reviews_settings.php">
      <i class="fa-solid fa-comment-dots" style="color:black;"></i>
    </a>
  </li>

  <!-- SETTINGS -->
  <li class="nav-item dropdown mr-3">
    <a class="nav-link " href="#" id="settingsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fa-solid fa-gear" style="color:black;"></i>
    </a>

    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="settingsDropdown" style="width: 250px;">
      
      <!-- Directory Management -->
      <li class="dropdown-item">
        <a href="#" class="d-block w-100" id="directoryToggle">
          Directory Management <i class="fas fa-caret-down float-right"></i>
        </a>

          <!-- Submenu -->
        <div id="directorySubmenu" style="display: none;" class="sub mt-2">
          <a class="dropdown-item ml-3 font-inter" href="settings_addNew_off.php">Add New Official</a>
          <a class="dropdown-item ml-3 font-inter" href="settings_list_official.php">List of Officials</a>
          <a class="dropdown-item ml-3 font-inter" href="settings_officials_endterm.php">Officials End Terms</a>
        </div>

      </li>

      <li><a class="dropdown-item" href="document_rqst_management.php">Document Management</a></li>
      <li><a class="dropdown-item" href="zonepurokSettings.php">Zone and Purok Management</a></li>
    </ul>
  </li>



  <!-- FULL SCREEN -->
  <li class="nav-item mr-4">
    <a class="nav-link" data-widget="fullscreen" href="notification." role="button">
      <i class="fas fa-expand-arrows-alt" style="color:black;"></i>
    </a>
  </li>

  <!-- ADMIN -->
  <li class="nav-item mr-4">
    <a class="nav-link" href="admin_profile.php" >
      <i class="fa-solid fa-user mr-1" style="color:black;"></i>
      <span style="color:black;">Admin</span>
    </a>
  </li>

  <!-- SIGN OUT -->
  <li class="nav-item mr-4">
    <a class="nav-link" href="../backend/admin/sign_out.php" role="button">
      <i class="fa-solid fa-right-from-bracket mr-1" style="color:black;"></i>
      <span style="color:black;">Sign Out</span>
    </a>
  </li>

</ul>
</nav>









        <!-- main content -->
        <div class="content-wrapper mr-5 ml-5 bg-white">   
            <div class="content p-2" >
                <div class="container-fluid p-2 center " >
                  <div class="card w-50 mx-auto font-inter elevation-2">
                      <div class="card-header text-white" style="background-color: #000155;">
                          <h5>Reviews</h5>
                      </div>
                      <div class="card-body" style="max-height: 600px; overflow-y: auto;" id="reviews-container">
                          <!-- Reviews will be loaded here dynamically -->
                          <div class="text-center py-5">
                              <div class="spinner-border text-primary" role="status">
                                  <span class="sr-only">Loading reviews...</span>
                              </div>
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


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>



<script>
  $(function () {
    // Prevent the dropdown from closing when clicking inside
    $('.dropdown-menu').on('click', function (e) {
      e.stopPropagation();
    });

    // Toggle submenu visibility
    $("#directoryToggle").on("click", function (e) {
      e.preventDefault();
      $("#directorySubmenu").slideToggle("fast");
    });
  });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Load reviews when page loads
    loadReviews();

    // Function to load reviews from server
    function loadReviews() {
        fetch('../backend/admin/get_reviews.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(reviews => {
                displayReviews(reviews);
            })
            .catch(error => {
                console.error('Error loading reviews:', error);
                document.getElementById('reviews-container').innerHTML = `
                    <div class="alert alert-danger">
                        Failed to load reviews. Please try again later.
                    </div>
                `;
            });
    }

    // Function to display reviews in the container
    function displayReviews(reviews) {
        const container = document.getElementById('reviews-container');
        
        if (reviews.length === 0) {
            container.innerHTML = `
                <div class="alert alert-info">
                    No reviews found.
                </div>
            `;
            return;
        }

        let html = '';
        reviews.forEach(review => {
            html += createReviewCard(review);
        });
        
        container.innerHTML = html;
        setupEventListeners();
    }

    // Function to create HTML for a single review
    function createReviewCard(review) {
        const time = formatTime(review.rev_posted_time);
        const date = formatDate(review.rev_posted_date);
        const isPending = review.rev_status === 'pending';
        
        return `
        <div class="row mb-2 elevation-1 cards" data-review-id="${review.rev_id}">
            <div class="row m-0 w-100 bord">
                <div class="col-9 pt-3 d-flex flex-row align-items-center">
                    <i class="${isPending ? 'active-icon' : ''} fa-solid fa-circle mr-3 " style="font-size: 12px;sss"></i>
                    <p class="mb-0">${escapeHtml(review.rev_description)}</p>
                </div>
                <div class="col-3 w-100 p-2 d-flex flex-column align-items-center">
                    <p class="mb-0 fs-3 font-weight-bold">${time}</p>
                    <p class="mb-0 fs-3 font-weight-bold">${date}</p>
                </div>
               <div class="row w-100 p-2 pl-4 font-inter font-weight-bold d-flex justify-content-between align-items-center">
                  <p class="mb-0 flex-grow-1 pe-2">From: ${escapeHtml(review.rev_guest_name)}</p>
                  <button class="btn ${isPending ? 'btn-primary' : 'btn-secondary'} mark-read" 
                          style="width: 140px; min-width: 140px; white-space: nowrap;"
                          data-review-id="${review.rev_id}">
                      ${isPending ? 'Mark as Read' : 'Read'}
                  </button>
              </div>
            </div>
        </div>
        `;
    }

    // Helper function to format time (HH:MM:SS to 12-hour format)
    function formatTime(timeString) {
        const [hours, minutes] = timeString.split(':');
        const period = hours >= 12 ? 'pm' : 'am';
        const hours12 = hours % 12 || 12;
        return `${hours12}:${minutes} ${period}`;
    }

    // Helper function to format date (YYYY-MM-DD to Month Day, Year)
    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('en-US', { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        });
    }

    // Helper function to prevent XSS
    function escapeHtml(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    // Set up event listeners for mark-as-read buttons
    function setupEventListeners() {
        document.querySelectorAll('.mark-read').forEach(button => {
            button.addEventListener('click', function() {
                const reviewId = this.dataset.reviewId;
                markAsRead(reviewId, this);
            });
        });
    }

    // Function to mark a review as read
    function markAsRead(reviewId, button) {
        fetch('../backend/admin/update_review_status.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `review_id=${reviewId}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update UI
                const card = button.closest('.cards');
                card.querySelector('.fa-circle').classList.remove('active-icon');
                button.classList.remove('btn-primary');
                button.classList.add('btn-secondary');
                button.textContent = 'Read';
            }
        })
        .catch(error => {
            console.error('Error marking review as read:', error);
            alert('Failed to mark review as read. Please try again.');
        });
    }
  });
</script>








</body>
</html>
