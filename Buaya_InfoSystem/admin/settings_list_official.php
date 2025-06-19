<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>List of Officials</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">


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


/* table design */
:root {
    --primary-dark: #000155;
    --primary-gradient: linear-gradient(135deg, #000155 0%, #0066cc 100%);
    --shadow-soft: 0 4px 20px rgba(0, 1, 85, 0.1);
    --shadow-medium: 0 8px 30px rgba(0, 1, 85, 0.15);
    --shadow-strong: 0 12px 40px rgba(0, 1, 85, 0.2);
    --border-radius: 12px;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}


.content-wrapper {
    background: transparent;
}

.enhanced-card {
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-medium);
    border: none;
    overflow: hidden;
    transition: var(--transition);
    position: relative;
}

.enhanced-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--primary-gradient);
}

.enhanced-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-strong);
}

.card-header-enhanced {
    background: linear-gradient(135deg, #000155, #0FCDA7);
    padding: 1rem;
    border: none;
    position: relative;
    overflow: hidden;
}

.card-header-enhanced::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    animation: shimmer 3s ease-in-out infinite;
}

@keyframes shimmer {
    0%, 100% { transform: rotate(0deg); }
    50% { transform: rotate(180deg); }
}

.header-content {
    position: relative;
    z-index: 2;
}

.stats-badge {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    color: white;
    font-weight: 600;
    font-size: 1.1rem;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: var(--transition);
}

.stats-badge:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.05);
}

.legend-text {
    color: white;
    font-size: 1.5rem;
    font-weight: 600;
    margin: 0;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    letter-spacing: 0.5px;
}

.table-container {
    background: white;
    border-radius: 0 0 var(--border-radius) var(--border-radius);
    overflow: hidden;
}

.table-responsive-enhanced {
    max-height: 500px;
    overflow: auto;
    scrollbar-width: thin;
    scrollbar-color: var(--primary-dark) #f1f5f9;
}

.table-responsive-enhanced::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

.table-responsive-enhanced::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 4px;
}

.table-responsive-enhanced::-webkit-scrollbar-thumb {
    background: var(--primary-dark);
    border-radius: 4px;
}

.table-responsive-enhanced::-webkit-scrollbar-thumb:hover {
    background: #0066cc;
}

.enhanced-table {
    margin: 0;
    border-collapse: separate;
    border-spacing: 0;
}

.enhanced-table thead th {
    background: linear-gradient(135deg, #000155, #0FCDA7);
    color: white;
    font-weight: 600;
    font-size: 0.9rem;
    letter-spacing: 0.5px;
    padding:10px;
    border: none;
    position: sticky;
    top: 0;
    z-index: 10;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

}

.enhanced-table thead th:first-child {
    border-top-left-radius: 0;
}

.enhanced-table thead th:last-child {
    border-top-right-radius: 0;
}

.enhanced-select {
    background: rgba(255, 255, 255, 0.95);
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 8px;
    color: var(--primary-dark);
    font-weight: 500;
    padding: 0.5rem 1rem;
    transition: var(--transition);
    backdrop-filter: blur(5px);
}

.enhanced-select:focus {
    background: white;
    border-color: rgba(255, 255, 255, 0.8);
    box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
    outline: none;
}

.enhanced-table tbody tr {
    transition: var(--transition);
    border: none;
}

.enhanced-table tbody tr:nth-child(even) {
    background-color: #f8fafc;
}

.enhanced-table tbody tr:hover {
    background: linear-gradient(90deg, rgba(0, 1, 85, 0.05) 0%, rgba(0, 102, 204, 0.05) 100%);
    transform: scale(1.01);
    box-shadow: 0 4px 12px rgba(0, 1, 85, 0.1);
}

.enhanced-table tbody td {
    padding: 1rem;
    border: none;
    vertical-align: middle;
    color: #334155;
    font-weight: 500;
}

.enhanced-table tbody td:first-child {
    border-left: 3px solid transparent;
    transition: var(--transition);
}

.enhanced-table tbody tr:hover td:first-child {
    border-left-color: var(--primary-dark);
}

.content-section {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.icon-accent {
    color: rgba(255, 255, 255, 0.8);
    margin-right: 0.5rem;
}

.fieldset-enhanced {
    border: none;
    padding: 0;
    margin: 0;
}

/* Loading animation for future use */
.loading-shimmer {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% {
        background-position: 200% 0;
    }
    100% {
        background-position: -200% 0;
    }
}

/* Responsive enhancements */
@media (max-width: 768px) {
    .content-wrapper {
        padding: 1rem;
    }
    
    .card-header-enhanced {
        padding: 1.5rem;
    }
    
    .legend-text {
        font-size: 1.25rem;
    }
    
    .enhanced-table thead th {
        font-size: 0.8rem;
        padding: 1rem 0.5rem;
    }
    
    .enhanced-table tbody td {
        padding: 0.75rem 0.5rem;
    }
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
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt" style="color:black;"></i>
          </a>
        </li>
        <!-- ADMIN -->
        <li class="nav-item mr-4 font-inter">
          <a class="nav-link" href="admin_profile.php" >
            <i class="fa-solid fa-user mr-1" style="color:black;"></i>
            <span style="color:black;">Admin</span>
          </a>
        </li>
        <!-- SIGN OUT -->
        <li class="nav-item mr-4 font-inter">
          <a class="nav-link" href="../views/admin/sign_out.php" role="button">
            <i class="fa-solid fa-right-from-bracket mr-1" style="color:black;"></i>
            <span style="color:black;">Sign Out</span>
          </a>
        </li>
      </ul>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="content-wrapper m-0 p-5 pt-0">
        <section class="content content-section">
            <div class="container-fluid">
                <div class="enhanced-card">
                    <div class="card-header-enhanced">
                        <fieldset class="fieldset-enhanced">
                            <div class="header-content d-flex justify-content-between align-items-center flex-wrap gap-3">
                                <div class="d-flex align-items-center gap-3">
                                    <i class="fas fa-users icon-accent fs-4"></i>
                                    <h2 class="legend-text mb-0">NUMBER OF OFFICIALS</h2>
                                </div>
                                <div class="stats-badge" id="total">
                                    <i class="fas fa-chart-line"></i>
                                    <span>0</span>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    
                    <div class="table-container">
                        <div class="table-responsive-enhanced">
                            <table class="table enhanced-table" id="officialTable">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">
                                            <i class="fas fa-image icon-accent"></i>
                                            IMAGE
                                        </th>
                                        <th style="width: 20%;">
                                            <i class="fas fa-briefcase icon-accent"></i>
                                            <select name="position" id="position" class="form-control enhanced-select text-uppercase">
                                                <option value="">POSITION</option>
                                            </select>
                                        </th>
                                        <th style="width: 15%;">
                                            <i class="fas fa-hashtag icon-accent"></i>
                                            OFFICIAL NUMBER
                                        </th>
                                        <th style="width: 20%;">
                                            <i class="fas fa-user icon-accent"></i>
                                            NAME
                                        </th>
                                        <th style="width: 20%;">
                                            <i class="fas fa-building icon-accent"></i>
                                            COMMITTEE
                                        </th>
                                        <th style="width: 15%;">
                                            <i class="fas fa-cogs icon-accent"></i>
                                            ACTION
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- template of every row -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>   
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    
</div>
<!-- ./wrapper -->




<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../assets/dist/js/adminlte.js"></script>



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
  document.addEventListener("DOMContentLoaded", () => {
    fetchOfficials();
    
    // Add the event listener AFTER DOM is loaded
    document.getElementById("position").addEventListener("change", (e) => {
      const selectedPosId = e.target.value.trim();
      console.log("Selected position ID:", selectedPosId);
      fetchOfficials(selectedPosId); 
    });

  });

  function capitalizeEachWord(str) {

    return str.replace(/\w\S*/g, (word) =>
      word.charAt(0).toUpperCase() + word.slice(1).toLowerCase()
    );

  }

  function fetchOfficials(positionId = "") {
  fetch('../views/admin/get_all_officials.php')
    .then(res => res.json())
    .then(response => {
      if (response.status === 'success') {

        const allData = response.data; // ✅ Define allData FIRST

        // Fill filter dropdown only once
        const positionDropdown = document.getElementById("position");
        if (!positionDropdown.dataset.loaded) {
          fillPositionFilter(response.positions);
          positionDropdown.dataset.loaded = "true";
        }

        let filteredData = allData; // Start with all data

        // Apply position filtering if a position is selected
        if (positionId) {
          filteredData = allData.filter(off => {
            console.log(`Checking: ${off.pos_id} == ${positionId}`);
            return String(off.pos_id).trim() === String(positionId).trim();
          });
        }

        displayOfficials(filteredData);
        document.getElementById("total").textContent = filteredData.length;

      } else {
        console.error(response.message);
      }
    })
    .catch(error => {
      console.error("Error fetching officials:", error);
    });
}


  
  function displayOfficials(data) {
    const tbody = document.querySelector("#officialTable tbody");
    tbody.innerHTML = ""; // clear previous

    if (data.length === 0) {

      // Show a message if no officials are found
      const emptyRow = document.createElement("tr");
      emptyRow.innerHTML = `<td colspan="6" class="text-center py-3">No officials found for the selected position</td>`;
      tbody.appendChild(emptyRow);
      return;

    }

    data.forEach((official, index) => {

      const row = document.createElement("tr");
      row.className = "bg-white text-center align-middle rounded-row";
      row.style.height = "40px";

      const imgEl = official.res_image ? `../${official.res_image}` : '../server_imgs/default_user_img.jpg';
      const fullName = `${official.res_first_name} ${official.res_last_name}`;
      console.log("res_id:", official.res_id);

      row.innerHTML = `
        <td class="text-center align-middle">
          <img src="${imgEl}" alt="Official Image" class="img-fluid rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
        </td>
        <td class="text-center align-middle">${capitalizeEachWord(official.pos_name)}</td>
        <td class="text-center align-middle">${official.off_id}</td>
        <td class="text-center align-middle">${fullName}</td>
        <td class="text-center align-middle">${capitalizeEachWord(official.off_committee)}</td>
        <td class="text-center align-middle">
          <button class="btn btn-sm bg-white edtBtn" data-res-id="${official.res_id}">
            <i class="nav-icon fa-solid fa-solid fa-eye text-success"></i>
            </button>
          <button class="btn btn-sm bg-white rmvBtn"><i class="nav-icon fas fa-trash-alt text-danger"></i></button>
        </td>
      `;

      tbody.appendChild(row);

       // 🔍 View details events
      row.querySelector(".edtBtn").addEventListener("click", (e) => {
        const resId = e.currentTarget.dataset.resId;
        window.location.href = `settings_officials_profile.php?res_id=${resId}`;
      });

        // Add event listener for the delete (trash) button
        row.querySelector(".rmvBtn").addEventListener("click", () => {
          deleteOfficial(official.off_id); // Call function to delete
        });

    });
  }




  function fillPositionFilter(positions) {

    const select = document.getElementById("position");
    
    // Clear existing options first to avoid duplicates
    select.innerHTML = "";

    // Default option for "All Positions"
    const defaultOpt = document.createElement("option");
    defaultOpt.value = "";
    defaultOpt.textContent = "All Positions";
    select.appendChild(defaultOpt);

    positions.forEach(pos => {

      const opt = document.createElement("option");
      opt.value = pos.pos_id;
      opt.textContent = capitalizeEachWord(pos.pos_name);
      select.appendChild(opt);

    });
    
  }



  // Function to handle deletion
function deleteOfficial(officialId) {
  // Send a request to the views to update the off_is_deleted field to true
  fetch('../views/admin/delete_official.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ off_id: officialId }),
  })
  .then(res => res.json())
  .then(response => {
    if (response.status === 'success') {
      // SweetAlert Success Popup
      Swal.fire({
        title: 'Deleted!',
        text: 'Official marked as deleted.',
        icon: 'success',
        confirmButtonText: 'OK',
      }).then(() => {
        fetchOfficials(); // Refresh the officials list
      });
    } else {
      console.error("Failed to delete official:", response.message);

      // SweetAlert Error Popup
      Swal.fire({
        title: 'Error!',
        text: 'Failed to mark official as deleted.',
        icon: 'error',
        confirmButtonText: 'OK',
      });
    }
  })
  .catch(error => {
    console.error("Error deleting official:", error);

    // SweetAlert Error Popup
    Swal.fire({
      title: 'Error!',
      text: 'An error occurred while deleting the official.',
      icon: 'error',
      confirmButtonText: 'OK',
    });
  });
}
</script>




</body>
</html>
