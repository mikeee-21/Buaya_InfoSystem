<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Calendar</title>

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

  <!-- fullCalendar -->
  <link rel="stylesheet" href="../assets/plugins/fullcalendar/main.css">
  <link href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" rel="stylesheet">

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
  background-color:rgb(131, 131, 131); /* hover background color */
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
  color: white !important;
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
  color:white !important;
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

#event-description {
    min-height: 100px;
    resize: vertical;
}

.input-group.mb-3 {
    margin-bottom: 15px !important;
}

.form-control {
    border-radius: 0.25rem;
}


/* display event */
.fc-event-container {
    padding: 2px 4px;
    border-radius: 3px;
    font-size: 0.85em;
    line-height: 1.3;
}

.fc-event-time {
    font-weight: bold;
    font-size: 0.8em;
    margin-bottom: 2px;
}

.fc-event-title {
    white-space: normal;
    word-break: break-word;
}

/* Make events taller to accommodate time + title */
.fc-daygrid-event {
    margin-bottom: 1px;
    min-height: 40px;
}

</style>



<body class="hold-transition sidebar-mini">
  
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white font-inter" style="border: none; box-shadow: none;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item mr-3">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button">
            <i class="fas fa-bars" style="color:black;"></i>
          </a>
      </li>
      <li class="nav-item">
          <span class="navbar-text font-weight-bold" style="color:black; font-size: 18px;"> BARANGAY BUAYA</span>
      </li>
    </ul>
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
              <a class="dropdown-item ml-3" href="settings_addNew_off.php">Add New Official</a>
              <a class="dropdown-item ml-3" href="settings_list_official.php">List of Officials</a>
              <a class="dropdown-item ml-3" href="settings_officials_endterm.php">Officials End Terms</a>
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
      <li class="nav-item mr-4">
        <a class="nav-link" href="admin_profile.php" >
          <i class="fa-solid fa-user mr-1" style="color:black;"></i>
          <span style="color:black;">Admin</span>
        </a>
      </li>
      <!-- SIGN OUT -->
      <li class="nav-item mr-4">
        <a class="nav-link" href="../views/admin/sign_out.php" role="button">
          <i class="fa-solid fa-right-from-bracket mr-1" style="color:black;"></i>
          <span style="color:black;">Sign Out</span>
        </a>
      </li>
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4" style="background: linear-gradient(135deg, #000155, #0FCDA7);">
    <!-- Brand Logo -->
    <a href="buayaProfile.php">    
      <div class="brand-link d-flex justify-content-center align-items-center">
        <img src="img/logo.jpg" alt="BrgyBuaya Logo" class="brand-image elevation-4" >
      </div>
      </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt" style="color:black;"></i>
              <p style="color:black;">
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="announcement.php" class="nav-link">
            <i class="nav-icon fa-solid fa-circle-info" style="color:black;"></i>
              <p style="color:black;">
                Announcements
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy" style="color:black;"></i>
              <p style="color:black;">
               Document Requests
                <i class="fas fa-angle-left right" ></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pending_request.php" class="nav-link">
                  <i class="nav-dr-icon nav-icon fa-solid fa-hourglass-end" ></i>
                  <p class="nav-select" style="color:black; font-size: 15px; margin-left: 8px;">Pending Requests</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="approved_request.php" class="nav-link" style="color:black;">
                <i class="nav-dr-icon nav-icon fa-solid fa-person-circle-check"></i>
                  <p class="nav-select" style="color:black; ">Approved Requests</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-users" style="color:black;"></i>
              <p style="color:black;">
                Directory
                <i class="right fas fa-angle-left" ></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="brgy_officials.php" class="nav-link">
                  <i class="nav-direct-icon nav-icon fa-solid fa-users-line"></i>
                  <p class="nav-select" style="color:black;">Barangay Officials</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="brgy_sk_officials.php" class="nav-link">
                  <i class="nav-direct-icon nav-icon fa-solid fa-users-line"></i>
                  <p class="nav-select" style="color:black;">SK Officials</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-users-line" style="color:black;"></i>
              <p style="color:black;">
                Residence
                <i class="fas fa-angle-left right" ></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" >
                  <a href="admin_addNewResidence.php" class="nav-link" >
                    <i class=" nav-residence-icon nav-icon fa-solid fa-user-plus"></i>
                    <p class="nav-select" style="color:black;">New Residence</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="admin_allResidence.php" class="nav-link">
                    <i class="nav-residence-icon nav-icon fa-solid fa-users-line"></i>
                    <p class="nav-select" style="color:black;">All Residence</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="admin_archieveResidence.php" class="nav-link">
                    <i class="nav-residence-icon nav-icon fa-solid fa-users-slash" ></i>
                    <p class="nav-select" style="color:black;">Archive Residence</p>
                  </a>
                </li>
            </ul>
          </li>
          <li class="nav-header text-white">OTHERS</li>
          <li class="nav-item">
            <a href="calendar.php" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt" style="color:black;"></i>
              <p style="color:black;">
                Calendar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="reports.php" class="nav-link">
            <i class="nav-icon fa-solid fa-file" style="color:black;"></i>
              <p style="color:black;">
                Reports
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="position.php" class="nav-link">
              <i class="nav-icon fa-solid fa-user" style="color:black;"></i>
                <p style="color:black;">
                  Position
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="activity_Log.php" class="nav-link">
              <i class="nav-icon fa-solid fa-user" style="color:black;"></i>
                <p style="color:black;">
                  Activity logs
                </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper font-inter bg-white">
      <!-- Content Header (Page header) -->
      <section class="content-header" >
        <div class="container-fluid" >
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Calendar</h1>
            </div>
            </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
              <div class="sticky-top mb-3">
                <div class="card elevation-2" style="background-color:hsl(160, 100%, 95%);">
                  <div class="card-header">
                    <h3 class="card-title">Create Event</h3>
                  </div>
                  <div class="card-body">
                    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                      <ul class="fc-color-picker" id="color-chooser">
                        <li><a class="text-primary" href="#" data-color="#3c8dbc"><i class="fas fa-square"></i></a></li>
                        <li><a class="text-warning" href="#" data-color="#f39c12"><i class="fas fa-square"></i></a></li>
                        <li><a class="text-success" href="#" data-color="#00a65a"><i class="fas fa-square"></i></a></li>
                        <li><a class="text-danger" href="#" data-color="#dd4b39"><i class="fas fa-square"></i></a></li>
                        <li><a class="text-info" href="#" data-color="#00c0ef"><i class="fas fa-square"></i></a></li>
                      </ul>
                    </div>
                    <div class="input-group mb-3">
                      <input id="new-event" type="text" class="form-control" placeholder="Event Title">
                    </div>
                    <div class="input-group mb-3">
                      <textarea id="event-description" class="form-control" placeholder="Event Description"></textarea>
                    </div>
                    <div class="input-group mb-3">
                      <input type="date" id="event-date" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                      <input type="time" id="event-time-start" class="form-control" placeholder="Start Time">
                      <input type="time" id="event-time-end" class="form-control" placeholder="End Time">
                    </div>
                    <div class="input-group">
                      <button id="add-new-event" type="button" class="btn btn-primary">Add Event</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-9">
              <div class="card card-primary">
                <div class="card-body p-0 elevation-2" style="background-color:hsl(160, 100%, 95%);">
                  <div id="calendar" style="height: 500px; overflow: auto;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Edit Event Modal -->
      <div class="modal fade" id="edit-event-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Event</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Event Title</label>
                <input type="text" class="form-control" id="edit-event-title">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" id="edit-event-description"></textarea>
              </div>
              <div class="form-group">
                <label>Date</label>
                <input type="date" class="form-control" id="edit-event-date">
              </div>
              <div class="form-group">
                <label>Time</label>
                <div class="row">
                  <div class="col">
                    <input type="time" class="form-control" id="edit-event-time-start" placeholder="Start">
                  </div>
                  <div class="col">
                    <input type="time" class="form-control" id="edit-event-time-end" placeholder="End">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Color</label>
                <ul class="fc-color-picker" id="edit-color-chooser">
                  <li><a class="text-primary" href="#" data-color="#3c8dbc"><i class="fas fa-square"></i></a></li>
                  <li><a class="text-warning" href="#" data-color="#f39c12"><i class="fas fa-square"></i></a></li>
                  <li><a class="text-success" href="#" data-color="#00a65a"><i class="fas fa-square"></i></a></li>
                  <li><a class="text-danger" href="#" data-color="#dd4b39"><i class="fas fa-square"></i></a></li>
                  <li><a class="text-info" href="#" data-color="#00c0ef"><i class="fas fa-square"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" id="delete-event-btn">Delete Event</button>
              <button type="button" class="btn btn-primary" id="save-event-changes">Save changes</button>
            </div>
          </div>
        </div>
      </div>
  </div>



<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../assets/dist/js/adminlte.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/fullcalendar/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>




<!-- Page specific script -->
<script>
    $(function () {
        // Initialize the calendar
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            editable: true,
            eventStartEditable: true,
            eventDurationEditable: true,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth'
            },
            events: '../views/admin/get_event.php',
            eventContent: function(arg) {
                const startTime = arg.event.start ? formatTimeForDisplay(arg.event.start) : '';
                const endTime = arg.event.end ? formatTimeForDisplay(arg.event.end) : '';
                
                return {
                    html: `<div class="fc-event-container" style="background:${arg.event.backgroundColor}">
                            <div class="fc-event-time" style="color:${getContrastColor(arg.event.backgroundColor)}; font-size:13px;">${startTime}${endTime ? ' - ' + endTime : ''}</div>
                            <div class="fc-event-title" style="color:${getContrastColor(arg.event.backgroundColor)}; font-size:15px;">
                                ${arg.event.extendedProps?.rawTitle || arg.event.title}
                            </div>
                        </div>`
                };
            },
            eventClick: function(info) {
                info.jsEvent.preventDefault();
                showEditModal(info.event);
            },
            eventDrop: function(info) {
                updateEventInDatabase(info.event);
            }
        });
        
        calendar.render();

        // Helper functions
        function getContrastColor(hexcolor) {
            hexcolor = hexcolor || '#3c8dbc';
            const r = parseInt(hexcolor.substr(1,2), 16);
            const g = parseInt(hexcolor.substr(3,2), 16);
            const b = parseInt(hexcolor.substr(5,2), 16);
            const yiq = ((r*299)+(g*587)+(b*114))/1000;
            return (yiq >= 128) ? '#000000' : '#ffffff';
        }

        function formatTimeForDisplay(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        }

        function formatDate(date) {
            return date.toISOString().split('T')[0];
        }

        function formatTime(date) {
            return date.toTimeString().substring(0, 8);
        }

        // Show the modal with event data
        function showEditModal(event) {
          // Get the LOCAL date and time values
          const localDate = new Date(event.start.getTime() - (event.start.getTimezoneOffset() * 60000)).toISOString().split('T')[0];
          const localStartTime = event.start.toTimeString().substring(0, 8);
          const localEndTime = event.end ? event.end.toTimeString().substring(0, 8) : localStartTime;
          
          // Get color
          const color = event.backgroundColor || event.color || '#3c8dbc';
          
          // Set form values with LOCAL times
          $('#edit-event-title').val(event.extendedProps?.rawTitle || event.title);
          $('#edit-event-description').val(event.extendedProps?.description || '');
          $('#edit-event-date').val(localDate);
          $('#edit-event-time-start').val(localStartTime);
          $('#edit-event-time-end').val(localEndTime);
          
          // Set color
          $('#edit-color-chooser li a').removeClass('active').css('border', 'none');
          $('#edit-color-chooser li a').each(function() {
              if ($(this).data('color') === color) {
                  $(this).addClass('active').css('border', '2px solid #333');
              }
          });
          
          // Store event reference
          $('#edit-event-modal').data('event-id', event.id);
          $('#edit-event-modal').data('event', event);
          
          // Show modal
          $('#edit-event-modal').modal('show');
      }

        // Add new event handler
        $('#add-new-event').click(function(e) {
            e.preventDefault();
            
            const formData = {
                event_title: $('#new-event').val(),
                event_description: $('#event-description').val(),
                event_date: $('#event-date').val(),
                event_time_start: $('#event-time-start').val(),
                event_time_end: $('#event-time-end').val(),
                event_color: $('#color-chooser li a.active').data('color') || '#3c8dbc',
            };
            
            // Validate required fields
            if (!formData.event_title || !formData.event_date || 
                !formData.event_time_start || !formData.event_time_end) {
                showNotification('Please fill in all required fields', 'error');
                return;
            }
            
            $.ajax({
                url: '../views/admin/calendar-events.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Format time for display
                        const startTime = formatTimeForDisplay(response.event.start);
                        const endTime = formatTimeForDisplay(response.event.end);
                        
                        calendar.addEvent({
                            id: response.event_id,
                            title: `${response.event.title}\n${startTime} - ${endTime}`,
                            start: response.event.start,
                            end: response.event.end,
                            description: response.event.description,
                            color: response.event.color,
                            editable: true,
                            extendedProps: {
                                rawTitle: response.event.title,
                                startTime: response.event.start.split('T')[1],
                                endTime: response.event.end.split('T')[1]
                            }
                        });
                        
                        // Clear form
                        $('#new-event, #event-description, #event-date, #event-time-start, #event-time-end').val('');
                        showNotification('Event added successfully!', 'success');
                    } else {
                        showNotification('Error: ' + (response.error || 'Failed to add event'), 'error');
                    }
                },
                error: function() {
                    showNotification('Failed to connect to server', 'error');
                }
            });
        });

        // Update event when dragging
        function updateEventInDatabase(event) {
            if (!event || !event.start) {
                console.error('Invalid event object:', event);
                return;
            }

            // Convert to UTC before sending to server
            const utcDate = new Date(event.start.getTime() - (event.start.getTimezoneOffset() * 60000));
            const eventDate = utcDate.toISOString().split('T')[0];
            const startTime = utcDate.toISOString().split('T')[1].substring(0, 8);
            
            const endUTC = event.end ? new Date(event.end.getTime() - (event.end.getTimezoneOffset() * 60000)) : utcDate;
            const endTime = event.end ? endUTC.toISOString().split('T')[1].substring(0, 8) : startTime;
            
            $.ajax({
                url: '../views/admin/update_event_time.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    id: event.id,
                    event_date: eventDate,
                    event_time_start: startTime,
                    event_time_end: endTime
                }),
                success: function(response) {
                    if (!response.success) {
                        showNotification('Update failed: ' + (response.error || 'Unknown error'), 'error');
                        calendar.refetchEvents();
                    }
                },
                error: function(xhr, status, error) {
                    showNotification('Update failed: ' + error, 'error');
                    calendar.refetchEvents();
                }
            });
        }

        // Save changes from modal
        $('#save-event-changes').click(function() {
          const eventId = $('#edit-event-modal').data('event-id');
          const event = $('#edit-event-modal').data('event');
          
          if (!eventId) {
              showNotification('Error: Missing event ID', 'error');
              return;
          }

          // Get form values
          const formData = {
              id: eventId,
              event_title: $('#edit-event-title').val(),
              event_description: $('#edit-event-description').val(),
              event_date: $('#edit-event-date').val(),
              event_time_start: $('#edit-event-time-start').val().padEnd(8, ':00'), // Ensure HH:MM:SS
              event_time_end: $('#edit-event-time-end').val().padEnd(8, ':00'), // Ensure HH:MM:SS
              event_color: $('#edit-color-chooser li a.active').data('color') || '#3c8dbc'
          };

          // Convert to UTC for server
          const utcStart = new Date(`${formData.event_date}T${formData.event_time_start}Z`);
          const utcEnd = new Date(`${formData.event_date}T${formData.event_time_end}Z`);
          
          // Prepare data for server
          const serverData = {
              id: eventId,
              event_title: formData.event_title,
              event_description: formData.event_description,
              event_date: utcStart.toISOString().split('T')[0], // UTC date
              event_time_start: utcStart.toTimeString().substring(0, 8), // UTC time
              event_time_end: utcEnd.toTimeString().substring(0, 8), // UTC time
              event_color: formData.event_color
          };

          console.log('Submitting:', serverData);
          
          $.ajax({
              url: '../views/admin/update_event.php',
              type: 'POST',
              contentType: 'application/json',
              data: JSON.stringify(serverData),
              dataType: 'json',
              success: function(response) {
                  console.log('Response:', response);
                  if (response.success) {
                      // Update event with LOCAL times for display
                      const newStart = `${formData.event_date}T${formData.event_time_start}`;
                      const newEnd = `${formData.event_date}T${formData.event_time_end}`;
                      
                      event.setProp('title', formData.event_title);
                      event.setProp('description', formData.event_description);
                      event.setStart(newStart);
                      event.setEnd(newEnd);
                      event.setProp('color', formData.event_color);
                      
                      $('#edit-event-modal').modal('hide');
                      showNotification('Event updated successfully!', 'success');
                  } else {
                      showNotification('Update failed: ' + (response.error || 'Unknown error'), 'error');
                  }
              },
              error: function(xhr) {
                  const error = xhr.responseJSON?.error || 'Server error';
                  showNotification('Error: ' + error, 'error');
              }
          });
      });




        // Delete event
        $('#delete-event-btn').click(function() {
            const event = $('#edit-event-modal').data('event');
            
            if (confirm('Are you sure you want to delete this event?')) {
                $.ajax({
                    url: '../views/admin/delete_event.php',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ id: event.id }),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            event.remove();
                            $('#edit-event-modal').modal('hide');
                            showNotification('Event deleted successfully!', 'success');
                        } else {
                            showNotification('Delete failed: ' + (response.error || 'Unknown error'), 'error');
                        }
                    },
                    error: function() {
                        showNotification('Failed to connect to server', 'error');
                    }
                });
            }
        });

        // Show notification
        function showNotification(message, type) {
            if (typeof Toastify !== 'undefined') {
                Toastify({
                    text: message,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    style: {
                        background: type === 'success' 
                            ? "linear-gradient(to right, #00b09b, #96c93d)"
                            : "linear-gradient(to right, #ff5f6d, #ffc371)"
                    },
                }).showToast();
            } else {
                alert(message);
            }
        }

        // Initialize color picker interaction
        $('#edit-color-chooser li a, #color-chooser li a').click(function(e) {
            e.preventDefault();
            $(this).closest('ul').find('li a').removeClass('active').css('border', 'none');
            $(this).addClass('active').css('border', '2px solid #333');
        });
    });
</script>


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


</body>
</html>
