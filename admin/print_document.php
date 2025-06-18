<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Barangay Certificate</title>
  <style>
    @page {
      size: letter;
      margin: 0;
    }
    body {
      font-family: 'Times New Roman', Times, serif;
      font-size: 14pt;
      line-height: 1.5;
      margin: 0;
      padding: 0;
      background-color: #fff;
      
    }
    @media print {
    .certificate-container {
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
        background-image: url("img/patik.jpg");
        background-repeat: no-repeat;
        background-position: center;
    }
    }

    .header {
      text-align: center;
      margin-bottom: 30px;
      line-height: 1.3;
      position: relative;
    }
    .header-logos {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 20px;
      height: 120px;
    }
    .logo-left, .logo-right {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      border: 2px solid #333;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 10pt;
      text-align: center;
      background-color: #f9f9f9;
      flex-shrink: 0;
    }
    .header-text {
      flex: 1;
      padding: 0 20px;
      margin-top: 10px;
    }
    .republic {
      font-weight: bold;
      font-size: 16pt;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 5px;
    }
    .city {
      font-weight: bold;
      font-size: 15pt;
      margin-bottom: 3px;
    }
    .barangay {
      font-weight: bold;
      font-size: 15pt;
      margin-bottom: 3px;
    }
    .contact {
      font-size: 12pt;
      margin-bottom: 30px;
    }
    .office-title {
      font-weight: bold;
      margin: 25px 10px;
      font-size: 14pt;
      font-style: italic;
    }
    .divider {
      width: 100%;
      height: 2px;
      background-color: #000;
      margin: 20px 0;
    }
    .certificate-title {
      text-align: center;
      font-weight: bold;
      font-size: 18pt;
      margin: 30px 0;
      text-transform: uppercase;
      letter-spacing: 2px;
    }
    .content {
      text-align: justify;
      line-height: 1.8;
      margin: 0 20px;
      font-size: 14pt;
    }
    .content p {
      margin-bottom: 20px;
      text-indent: 0;
    }
    .to-whom {
      font-weight: bold;
      margin-bottom: 25px;
    }
    .signature-section {
      margin-top: 80px;
      display: flex;
      justify-content: flex-end;
      padding-right: 50px;
    }
    .signature {
      text-align: center;
      min-width: 300px;
    }
    .signature-line {
      width: 300px;
      border-top: 2px solid #000;
      margin: 0 auto 10px auto;
    }
    .signature-name {
      font-weight: bold;
      text-transform: uppercase;
      margin-bottom: 5px;
      font-size: 14pt;
    }
    .signature-title {
      font-style: italic;
      font-size: 13pt;
    }
    .footer {
      position: absolute;
      bottom: 0.5in;
      left: 0.5in;
      font-style: italic;
      font-size: 11pt;
      font-weight: bold;
    }
    .underline {
      border-bottom: 1px solid #000;
      padding-bottom: 2px;
      min-width: 100px;
      display: inline-block;
      text-align: center;
      font-weight: bold;
    }
    .small-underline {
      border-bottom: 1px solid #000;
      padding-bottom: 2px;
      min-width: 50px;
      display: inline-block;
      text-align: center;
      font-weight: bold;
    }
    .medium-underline {
      border-bottom: 1px solid #000;
      padding-bottom: 2px;
      min-width: 200px;
      display: inline-block;
      text-align: center;
      font-weight: bold;
    }
    .large-underline {
      border-bottom: 1px solid #000;
      padding-bottom: 2px;
      min-width: 300px;
      display: inline-block;
      text-align: center;
      font-weight: bold;
    }
    .text-center {
      text-align: center;
    }
    
    /* Certificate-specific content templates */
    .content-template {
      display: none;
    }
    .content-template.active {
      display: block;
    }
    
    @media print {
      body {
        margin: 0;
        padding: 0;
      }
      .certificate-container {
        padding: 0.5in;
      }
    }
  </style>
</head>
<body>
<div class="certificate-container">
  <!-- Header Section -->
  <div class="header">
    <div class="header-logos">
      <div class="logo-left">
        <img src="img/logo.jpg" alt="" style="width: 100%; height: 100%; border-radius: 50%;">
      </div>
      
      <div class="header-text">
        <div class="republic">REPUBLIC OF THE PHILIPPINES</div>
        <div class="city">CITY OF LAPU-LAPU</div>
        <div class="barangay">BARANGAY BUAYA</div>
        <div class="contact">TEL.NO.(032)328-8279</div>
        <div class="office-title mb-5">Office of the Punong Barangay</div>
      </div>
      
      <div class="logo-right">
        <img src="img/lapu-lapu.jpg" alt="" style="width: 100%; height: 100%; border-radius: 50%;">
      </div>
    </div>
    
    <div class="divider"></div>
    
    <div class="certificate-title" id="certificate-title">CERTIFICATE OF RESIDENCY</div>
  </div>

  <!-- Content Section -->
  <div class="content">
    <p class="to-whom">TO WHOM IT MAY CONCERN:</p>
    
    <!-- Certificate of Residency Template -->
    <div class="content-template active" id="residency-template">
      <p>This is to certify that <span class="large-underline" id="resident-name">&nbsp;</span>, 
      <span class="small-underline" id="resident-age">&nbsp;</span> years of age, is a bona fide resident at Zone 
      <span class="small-underline" id="resident-zone">&nbsp;</span>, Barangay Buaya, City of Lapu-Lapu City, Cebu for about 
      <span class="small-underline" id="resident-years">&nbsp;</span> years now.</p>
      
      <p>This further certifies that he/she is known as a person of good moral character, a law-abiding citizen, and has never violated any law, ordinance, or rule duly implemented by the government authorities.</p>
      
      <p>This certification is hereby issued upon the request of the above-mentioned person in connection with his/her <span class="medium-underline" id="purpose">&nbsp;</span> or for whatever legal purpose it may serve him/her best.</p>
    </div>
    
    <!-- Barangay Clearance Template -->
    <div class="content-template" id="clearance-template">
      <p>This is to certify that <span class="large-underline" id="clearance-name">&nbsp;</span>, 
      <span class="small-underline" id="clearance-age">&nbsp;</span> years of age, is a bona fide resident of Zone 
      <span class="small-underline" id="clearance-zone">&nbsp;</span>, Barangay Buaya, City of Lapu-Lapu City, Cebu.</p>
      
      <p>This further certifies that the above-mentioned person has no derogatory and/or criminal records filed in this barangay and is a person of good moral character in the community.</p>
      
      <p>This clearance is hereby issued upon the request of the interested party for <span class="medium-underline" id="clearance-purpose">&nbsp;</span> and for whatever legal purpose it may serve him/her best.</p>
    </div>
    
    <!-- Certificate of Indigency Template -->
    <div class="content-template" id="indigency-template">
      <p>This is to certify that <span class="large-underline" id="indigency-name">&nbsp;</span>, 
      <span class="small-underline" id="indigency-age">&nbsp;</span> years of age, is a bonafide resident of Zone 
      <span class="small-underline" id="indigency-zone">&nbsp;</span>, Barangay Buaya, City of Lapu-Lapu City, Cebu.</p>
      
      <p>This is to certify further that the above-mentioned person belongs to the indigent family in this barangay whose family income falls below the poverty threshold as set by the National Economic and Development Authority (NEDA).</p>
      
      <p>This certification is hereby issued upon the request of the interested party for <span class="medium-underline" id="indigency-purpose">&nbsp;</span> and for whatever legal purpose it may serve him/her best.</p>
    </div>
    
    <!-- Business Permit Template -->
    <div class="content-template" id="business-template">
      <p>This is to certify that <span class="large-underline" id="business-name">&nbsp;</span>, 
      <span class="small-underline" id="business-age">&nbsp;</span> years of age, is a bonafide resident of Zone 
      <span class="small-underline" id="business-zone">&nbsp;</span>, Barangay Buaya, City of Lapu-Lapu City, Cebu.</p>
      
      <p>This is to certify further that the above-mentioned person is hereby permitted to operate/conduct business of <span class="medium-underline" id="business-type">&nbsp;</span> at the above-mentioned address.</p>
      
      <p>This certification is issued subject to compliance with existing barangay ordinances, city ordinances, and national laws.</p>
    </div>
    
    <p class="text-center">Issued on this <span class="small-underline" id="day">&nbsp;</span> day of 
    <span class="medium-underline" id="month">&nbsp;</span>, 20<span class="small-underline" id="year">&nbsp;</span> at Barangay Buaya, Lapu-Lapu City.</p>
  </div>

  <!-- Signature Section -->
  <div class="signature-section">
    <div class="signature">
      <div class="signature-line"></div>
      <div class="signature-name">HON. FELIX DAITOL CASIO</div>
      <div class="signature-title">Punong Barangay</div>
    </div>
  </div>

  <!-- Footer Section -->
  <div class="footer">
    not valid<br>without seal
  </div>
</div>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
// Certificate templates mapping
const certificateTemplates = {
    'CERTIFICATE OF RESIDENCY': 'residency-template',
    'BARANGAY CLEARANCE': 'clearance-template',
    'CERTIFICATE OF INDIGENCY': 'indigency-template',
    'BUSINESS PERMIT': 'business-template'
};

$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const requestId = urlParams.get('id');

    if (requestId) {
        loadRequestData(requestId);
    } else {
        alert('Error: No request ID specified');
    }
});

function loadRequestData(requestId) {
    $.ajax({
        url: "../views/admin/get_request_data.php",
        type: "GET",
        data: { id: requestId },
        dataType: "json",
        success: function(response) {
            if (response.success) {
                populateCertificate(response.data);
                // Auto print
                setTimeout(function() {
                    window.print();
                }, 500);
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            alert('Error loading document: ' + error);
        }
    });
}

function populateCertificate(data) {
    // Set certificate title and show appropriate template
    let certificateType = 'CERTIFICATE OF RESIDENCY'; // default
    if (data.cer_type_name) {
        certificateType = data.cer_type_name.toUpperCase();
    }
    
    $('#certificate-title').text(certificateType);
    
    // Hide all templates and show the appropriate one
    $('.content-template').removeClass('active');
    const templateId = certificateTemplates[certificateType] || 'residency-template';
    $('#' + templateId).addClass('active');
    
    // Set full name
    const fullName = buildFullName(data);
    
    // Populate based on certificate type
    switch(certificateType) {
        case 'CERTIFICATE OF RESIDENCY':
            populateResidencyData(data, fullName);
            break;
        case 'BARANGAY CLEARANCE':
            populateClearanceData(data, fullName);
            break;
        case 'CERTIFICATE OF INDIGENCY':
            populateIndigencyData(data, fullName);
            break;
        case 'BUSINESS PERMIT':
            populateBusinessData(data, fullName);
            break;
        default:
            populateResidencyData(data, fullName); // fallback
    }
    
    // Set common date fields
    populateDateFields(data);
}

function buildFullName(data) {
    if (data.req_first_name && data.req_last_name) {
        let middle = data.req_middle_name ? ` ${data.req_middle_name}` : '';
        let suffix = data.req_suffix ? ` ${data.req_suffix}` : '';
        return `${data.req_first_name}${middle} ${data.req_last_name}${suffix}`;
    }
    return '';
}

function populateResidencyData(data, fullName) {
    $('#resident-name').text(fullName || '\u00A0');
    $('#resident-age').text(calculateAge(data.req_date_of_birth) || '\u00A0');
    $('#resident-zone').text(data.zone_name || '\u00A0');
    $('#resident-years').text(data.req_years_resident || '\u00A0');
    $('#purpose').text(data.req_purpose || '\u00A0');
}

function populateClearanceData(data, fullName) {
    $('#clearance-name').text(fullName || '\u00A0');
    $('#clearance-age').text(calculateAge(data.req_date_of_birth) || '\u00A0');
    $('#clearance-zone').text(data.zone_name || '\u00A0');
    $('#clearance-purpose').text(data.req_purpose || '\u00A0');
}

function populateIndigencyData(data, fullName) {
    $('#indigency-name').text(fullName || '\u00A0');
    $('#indigency-age').text(calculateAge(data.req_date_of_birth) || '\u00A0');
    $('#indigency-zone').text(data.zone_name || '\u00A0');
    $('#indigency-purpose').text(data.req_purpose || '\u00A0');
}

function populateBusinessData(data, fullName) {
    $('#business-name').text(fullName || '\u00A0');
    $('#business-age').text(calculateAge(data.req_date_of_birth) || '\u00A0');
    $('#business-zone').text(data.zone_name || '\u00A0');
    $('#business-type').text(data.req_business_type || data.req_purpose || '\u00A0');
}

function calculateAge(dateOfBirth) {
    if (!dateOfBirth) return null;
    
    const dob = new Date(dateOfBirth);
    const today = new Date();
    let age = today.getFullYear() - dob.getFullYear();
    const monthDiff = today.getMonth() - dob.getMonth();
    
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
        age--;
    }
    
    return age;
}

function populateDateFields(data) {
    const issueDate = data.req_requested_date ? new Date() : new Date();
    $('#day').text(issueDate.getDate());
    $('#month').text(issueDate.toLocaleString('default', { month: 'long' }));
    $('#year').text(issueDate.getFullYear().toString().slice(-2));
}
</script>

</body>
</html>