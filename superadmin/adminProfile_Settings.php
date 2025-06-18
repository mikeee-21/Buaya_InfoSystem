



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.9/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.9/dist/sweetalert2.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background-color:rgb(255, 255, 255);
        }
        .top-bar {
            background-color: #0a0a6b;
            color: white;
            padding: 10px 0;
        }
        .logo-container {
            display: flex;
            align-items: center;
        }
            .icon-link {
            text-decoration: none !important;
            font-size: 1.2rem;
        }
        .logo-container img {
            height: 40px;
            margin-right: 10px;
            border-radius: 50%;
        }


        /* FONT */
        .font-inter {
        font-family: 'Inter', sans-serif;
        }









        /* Avatar Circle Styling */
        .avatar-container {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            padding: 10px;
        }


        .admin-card {
            width: 150px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .avatar-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid #ccc;
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            border-radius: 50%;
        }

        .role-name, .permission-group {
            font-size: 12px;
            color: #333;
            text-align: center;
            margin-top: 5px;
            word-wrap: break-word; /* Ensures long words break */
            white-space: normal;    /* Ensures multi-word phrases wrap */
        }

        .role-name {
            font-size: 13px;
            font-weight: bold;
            color: #007bff; /* Role color */
        }

        .permission-group {
            color:rgb(0, 0, 0); /* Permission group color */
        }
        .admin-name {
            font-weight: bold;
            font-size: 15px;
            color:rgb(0, 0, 0); /* Role color */
            margin-top: 4px;
        }








        .stat-card {
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }
        .arrow-pagination .arrow-btn {
            text-decoration: none; 
        }
        .stat-icon {
            font-size: 24px;
            width: 50px;
            height: 50px;
            line-height: 50px;
            border-radius: 50%;
            margin: 0 auto 10px;
            color: white;
        }
        .bg-gold {
            background-color: #ffc107;
        }
        .bg-teal {
            background-color: #20c997;
        }
        .bg-danger {
            background-color: #dc3545;
        }
        .bg-info {
            background-color: #17a2b8;
        }
        .stat-number {
            font-size: 24px;
            font-weight: bold;
        }
        .activity-list {
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-height: 350px;
            overflow-y: auto;
        }
        .activity-item {
            padding: 10px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
        }
        .activity-item:last-child {
            border-bottom: none;
        }
        .activity-indicator {
            min-width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #28a745;
            margin-right: 15px;
        }
        .activity-content {
            flex-grow: 1;
        }
        .activity-time {
            text-align: right;
            font-size: 0.85rem;
            color: #6c757d;
        }
        .activity-item:nth-child(even) {
            background-color: #f9f9f9;
        }
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }
        /* New styles for arrow pagination */
        .arrow-pagination {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .arrow-pagination .arrow-btn {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0;
            border-radius: 50%;
            color: #333;
            transition: all 0.2s;
        }

        .custom-gap {
      margin-right: 45px;
    }
        .arrow-pagination .arrow-btn:hover {
            background-color: #0a0a6b;
            color: white;
            cursor: pointer;
        }
        .arrow-pagination .arrow-btn.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>
</head>
<body >


  <!-- Top Navigation Bar -->
  <div class="top-bar font-inter">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-8">
          <div class="logo-container">
            <a href="buayaProfile.php">
                <img src="img/logo.jpg" alt="Logo" class="logo" />
            </a>
            <h5 class="mb-0">Super Admin</h5>
          </div>
        </div>
        <div class="col-4 text-end d-flex justify-content-end align-items-center">
            <a href="dashboard.php" class="text-white icon-link custom-gap"><i class="fas fa-home "></i></a>
          <div class="dropdown custom-gap">
            <button class="btn btn-link text-white p-0 icon-link" type="button" id="settingsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-cog"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingsDropdown">
                <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                <li><a class="dropdown-item" href="acc_mngmnt.php">Admin Account Management</a></li>
                <li><a class="dropdown-item" href="audit_log.php">Audit Logs</a></li>
                <li><a class="dropdown-item" href="adminProfile_Settings.php">Buaya Profile Settings</a></li>
            </ul>
          </div>
          <a href="../backend/admin/sign_out.php" class="text-white text-decoration-none"><i class="fas fa-sign-out-alt"></i> Sign out</a>
        </div>
      </div>
    </div>
   </div>

        <!-- MAIN CONTENT -->
        <div class="content-wrapper bg-white pl-5 pr-5 pt-3 m-4 mt-0 font-inter" >
            <div class="container-fluid  elevation-2" style=" background-color:rgb(255, 255, 255);">
                <div class="content p-5 pt-0" style=" height: 700px; max-height: 700px; overflow: auto;">

                  <div class="content-header p-3 m-0" style=" background-color:rgb(255, 255, 255); position: sticky; top: 0; z-index: 10;">
                    <h4>Barangay Buaya Settings</h4>
                  </div>

                    <div class=" row-12 d-flex align-item-center justify-content-center p-2" >
                        <img class="profile-user-img img-fluid img-thumbnail" src="img/logo.jpg" alt="User profile picture" style="border: none; cursor: pointer; width:200px; height: 200px; border-radius:50%;" id="image_official">
                        <input type="file" name="add_image" id="add_image" style="display: none;">
                    </div>




                    <div class="row-12 text-center  mb-5">
                      <h5>Barangay Logo</h5>
                    </div>


                    <div class="row mb-5 p-1 d-flex pl-4 pr-5 justify-content-between">
                      <div class="col-sm-5 p-2 font-weight-bold">
                        <label for="mission" class="p-2 ml-1 mb-1">Mission</label>
                        <textarea class="form-control" rows="10" style="  height: 300px; border:1px solid rgb(208, 208, 208);" id="mission" name="mission">Our mission goes here...</textarea>
                      </div>

                      <div class="col-sm-5 p-2 font-weight-bold">
                        <label for="vision" class="p-2 ml-1 mb-1">Vision</label>
                        <textarea class="form-control" rows="10" style=" height: 300px; border:1px solid rgb(208, 208, 208);" id="vision" name="vision">Our vision goes here...</textarea>
                      </div>
                    </div>




                    <div class="row-12 text-center p-2">
                      <h3>Contact</h3>
                    </div>

                    <div class="row p-1 d-flex pl-4 pr-5 justify-content-between">
                        <div class="col-sm-5 p-2 font-weight-bold">
                            <label for="brgyName" class="p-2 ml-1 mb-1">Smart phone</label>
                            <input type="text" class="form-control p-4" style="border:1px solid rgb(208, 208, 208);" id="smart_contact" name="smart_contact" value="">
                        </div>

                        <div class="col-sm-5 p-2 font-weight-bold">
                            <label for="brgyName" class="p-2 ml-1 mb-1">Telephone</label>
                            <input type="text" class="form-control p-4" style="border:1px solid rgb(208, 208, 208);" id="telep_contact" name="telep_contact" value="">
                        </div>
                        
                    </div>

                    <div class="row mb-5 p-1 d-flex pl-4 pr-5 justify-content-between">
                        <div class="col-sm-5 p-2 font-weight-bold">
                            <label for="brgyZipCode" class="p-2 ml-1 mb-1">Email</label>
                            <input type="text" class="form-control p-4" style="border:1px solid rgb(208, 208, 208);" id="email" name="email" value="">
                        </div>
                    </div>

















                    <div class="row-12 text-center p-2">
                      <h3>Information</h3>
                    </div>
                    

                    <div class="row mb-3 p-1 d-flex pl-4 pr-5 justify-content-between">
                        <div class="col-sm-5 p-2 font-weight-bold">
                            <label for="brgyName" class="p-2 ml-1 mb-1">Barangay</label>
                            <input type="text" class="form-control p-4" style="border:1px solid rgb(208, 208, 208);" id="brgyName" name="brgyName" value="">
                        </div>

                        <div class="col-sm-5 p-2 font-weight-bold">
                            <label for="brgyZipCode" class="p-2 ml-1 mb-1">Zip Code</label>
                            <input type="text" class="form-control p-4" style="border:1px solid rgb(208, 208, 208);" id="brgyZipCode" name="brgyZipCode" value="">
                        </div>
                    </div>

                    <div class="row mb-5 d-flex pl-4 pr-5 justify-content-between">
                        <div class="col-sm-5 p-2 font-weight-bold">
                            <label for="brgyProvince" class="p-2 ml-1 mb-1">Provincial</label>
                            <input type="text" class="form-control p-4" style="border:1px solid rgb(208, 208, 208);" id="brgyProvince" name="brgyProvince" value="">
                        </div>

                        <div class="col-sm-5 p-2 font-weight-bold">
                            <label for="brgyMunicipality" class="p-2 ml-1 mb-1">Municipality</label>
                            <input type="text" class="form-control p-4" style="border:1px solid rgb(208, 208, 208);" id="brgyMunicipality" name="brgyMunicipality" value="">
                        </div>
                    </div>











                    <div class="row-12 text-center p-2 mt-5">
                      <h3>Available Time and Day</h3>
                    </div>
                    

                    <div class="row- mb-3 p-1 d-flex pl-4 pr-5 justify-content-between">
                        <div class="col-sm-5 p-2 font-weight-bold">
                            <label for="brgyName" class="p-2 ml-1 mb-1">Available Time Start</label>
                            <input type="time" class="form-control p-4" style="border:1px solid rgb(208, 208, 208);" id="avail_start_time" name="avail_start_time" value="">
                        </div>

                        <div class="col-sm-5 p-2 font-weight-bold">
                            <label for="brgyZipCode" class="p-2 ml-1 mb-1">Available Time End</label>
                            <input type="time" class="form-control p-4" style="border:1px solid rgb(208, 208, 208);" id="avail_end_time" name="avail_end_time" value="">
                        </div>
                    </div>

                    <div class="row mb-3 d-flex pl-4 pr-5 justify-content-between">
                    <div class="col-sm-5 p-2 font-weight-bold">
                      <label for="dayStart" class="p-2 ml-1 mb-1">Available Day Start</label>
                      <select class="form-control p-2 text-dark" style="border:1px solid rgb(208, 208, 208);" id="dayStart" name="dayStart">

                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>

                      </select>
                    </div>

                    <div class="col-sm-5 p-2 font-weight-bold">
                      <label for="dayEnd" class="p-2 ml-1 mb-1">Available Day End</label>
                      <select class="form-control p-2 text-dark" style="border:1px solid rgb(208, 208, 208);" id="dayEnd" name="dayEnd">

                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                        
                      </select>
                    </div>
                  </div>

                    <div class="card-footer d-flex justify-content-end " style=" background-color:rgb(255, 255, 255);">
                        <button type="submit" id="savedBtn" class="btn text-dark elevation-3" style="background-color: #FFF153;">
                            <i class="fas fa-share-square"></i> Save Changes
                        </button>
                    </div>

                </div>
            </div>
            <!-- end of container-fluid -->
        </div>
        <!-- end of content-wrapper -->

    </div>
    <!-- end of wrapper -->



    <script>
    document.getElementById('image_official').addEventListener('click', function () {
      document.getElementById('add_image').click();
    });

    document.getElementById('add_image').addEventListener('change', function (e) {
      const reader = new FileReader();
      reader.onload = function () {
        document.getElementById('image_official').src = reader.result;
      };
      reader.readAsDataURL(e.target.files[0]);
    });
  </script>


<script>
$(document).ready(function() {
    // Load barangay data on page load
    $.ajax({
        url: '../backend/superadmin/get_barangay_profile.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                const data = response.data;
                
                // Populate form fields
                $('#image_official').attr('src',   `../server_imgs/${data.bar_logo}`);
                $('#mission').val(data.bar_mission);
                $('#vision').val(data.bar_vision);
                $('#smart_contact').val(data.bar_contact_cellphone);
                $('#telep_contact').val(data.bar_contact_telephone);
                $('#email').val(data.bar_email);
                $('#brgyName').val(data.bar_name);
                $('#brgyZipCode').val(data.bar_zip_code);
                $('#brgyProvince').val(data.bar_province);
                $('#brgyMunicipality').val(data.bar_municipality);
                $('#avail_start_time').val(data.bar_available_start_time.substring(0,5));
                $('#avail_end_time').val(data.bar_available_end_time.substring(0,5));
                $('#dayStart').val(data.bar_available_start_day);
                $('#dayEnd').val(data.bar_available_end_day);
            } else {
                Swal.fire('Error', response.message, 'error');
            }
        }
    });

    // Save button handler
    $('#savedBtn').click(function() {
        const formData = new FormData();
        const imageFile = $('#add_image')[0].files[0];
        
        // Append all form data
        formData.append('mission', $('#mission').val());
        formData.append('vision', $('#vision').val());
        formData.append('smart_contact', $('#smart_contact').val());
        formData.append('telep_contact', $('#telep_contact').val());
        formData.append('email', $('#email').val());
        formData.append('brgyName', $('#brgyName').val());
        formData.append('brgyZipCode', $('#brgyZipCode').val());
        formData.append('brgyProvince', $('#brgyProvince').val());
        formData.append('brgyMunicipality', $('#brgyMunicipality').val());
        formData.append('avail_start_time', $('#avail_start_time').val());
        formData.append('avail_end_time', $('#avail_end_time').val());
        formData.append('dayStart', $('#dayStart').val());
        formData.append('dayEnd', $('#dayEnd').val());
        
        // Append image if selected
        if (imageFile) {
            formData.append('image', imageFile);
        }

        // Send data to server
        $.ajax({
            url: '../backend/superadmin/update_barangay_profile.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                const result = JSON.parse(response);
                if (result.success) {
                    Swal.fire('Success', result.message, 'success');
                } else {
                    Swal.fire('Error', result.message, 'error');
                }
            },
            error: function() {
                Swal.fire('Error', 'Failed to update profile', 'error');
            }
        });
    });
});
</script>


</body>
</html>
