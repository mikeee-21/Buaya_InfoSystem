<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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









.calendar-container {
    width: 80%;
    max-width: 1100px;
    margin: 0 auto;
    padding: 0; 
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow: hidden; 
}

.event-header {
    color: #000155 !important;
    font-weight: 700 !important;
    font-size: 2rem !important;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    padding-bottom: 1rem;
    border-bottom: 2px solid rgba(255, 255, 255, 0.1);
}

.calendar-content {
    padding: 15px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}



       
.calendar-table {
    width: 100%;
    border-collapse: collapse;
    flex-grow: 1;
}

.calendar-table th, .calendar-table td {
    text-align: center;
    padding: 6px;
    border: 1px solid #f0f0f0;
}

.calendar-table th {
    background-color: #f8f9fa;
    font-weight: 500;
}

.calendar-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.month-year {
    font-size: 1.5rem;
    font-weight: 500;
}

.day-cell {
    height: 60px;
    width: 14.28%;
    vertical-align: top;
    position: relative;
    cursor: pointer;
    transition: background-color 0.2s;
}

.day-cell:hover {
    background-color: #f0f0f0;
}

.day-number {
    position: absolute;
    top: 5px;
    left: 5px;
    font-weight: 500;
}

.inactive-day {
    color: #aaa;
    background-color: #f8f9fa;
}

.current-day {
    background-color: rgba(77, 186, 172, 0.1);
    font-weight: bold;
}

.event-indicator {
    position: absolute;
    bottom: 5px;
    left: 50%;
    transform: translateX(-50%);
    width: 6px;
    height: 6px;
    background-color: #4dbaac;
    border-radius: 50%;
}

.view-buttons {
    display: flex;
    gap: 5px;
    margin-bottom: 10px;
    margin-left: auto; 
}

.btn-nav {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    color: #4dbaac;
}

.btn-nav:hover {
    color: #3a8a80;
}

#calendarContainer {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.main-container {
    display: flex;
    flex-direction: column;
    height: 100vh;
    padding: 10px;
    padding-top: 0 !important;
}

td.current-day {
    background-color: rgb(45, 130, 84);
    color: white;
    font-weight: bold;
}

.calendar-header h6 {
    font-size: 25px;
    font-weight: bold;
}

.view-button {
    background-color: #000155;
    color: white;
    padding: 5px 15px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    border: none;
    transition: all 0.2s;
}

.view-button:hover {
    background-color: #000155;
    opacity: 0.9;
}

.view-button.active {
    background-color: white;
    color: #52AB98;
    border: 1px solid #52AB98;
}

/* Week View Styles */
.week-view-events {
    margin-top: 25px;
    max-height: 300px;
    overflow-y: auto;
}

.week-event {
    padding: 5px;
    margin: 3px 0;
    font-size: 12px;
    text-align: left;
    background-color: #f8f9fa;
    border-radius: 3px;
}

/* Day View Styles */
.day-view {
    padding: 15px;
}

.day-events-container {
    margin-top: 20px;
}

.day-event {
    padding: 15px;
    margin-bottom: 15px;
    background-color: #f8f9fa;
    border-radius: 5px;
}

.event-time {
    font-size: 14px;
    color: #666;
    margin-bottom: 5px;
}

.event-title {
    font-size: 16px;
    margin-bottom: 5px;
}

.event-description {
    font-size: 14px;
    color: #555;
    margin-top: 5px;
}

.event-desc {
    display: inline-block;
    margin: 0 1px;
    cursor: pointer;
    padding: 5px;
    border-radius: 5px;
}

/* FONT */
.font-inter {
font-family: 'Inter', sans-serif;
}

</style>




</head>
<body>
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





        <div class="main-container p-0 bg-white" >
            
            <!-- calendar section -->
            <div class="calendar-container px-0 font-inter">
                <div class="calendar-header">
                    <h6>Calendar Event</h6>
                </div>
                <div class="calendar-content">
                    <div class="calendar-nav">
                        <button class="btn-nav" id="prevMonth"><i class="bi bi-chevron-left"></i></button>
                        <div class="month-year" id="monthYear"></div>
                        <button class="btn-nav" id="nextMonth"><i class="bi bi-chevron-right"></i></button>
                    </div>
                    <div class="view-buttons">
                        <button class="view-button active" id="monthView">Month</button>
                        <button class="view-button" id="weekView">Week</button>
                        <button class="view-button" id="dayView">Day</button>
                    </div>
                    <div id="calendarContainer"></div>
                </div>
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
    


<!-- FULL EVENT CALENDAR SCRIPT -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // initial variables
        let currentDate = new Date();
        let currentView = 'month';
        let events = [];
        
        // Fetch events from views
        fetchEvents();
        
        // initialize calendar
        updateCalendar();
        
        // Event listeners
        document.getElementById('prevMonth').addEventListener('click', function() {
            navigate(-1);
        });
        
        document.getElementById('nextMonth').addEventListener('click', function() {
            navigate(1);
        });
        
        document.getElementById('monthView').addEventListener('click', function() {
            currentView = 'month';
            updateActiveViewButton(this);
            updateCalendar();
        });
        
        document.getElementById('weekView').addEventListener('click', function() {
            currentView = 'week';
            updateActiveViewButton(this);
            updateCalendar();
        });
        
        document.getElementById('dayView').addEventListener('click', function() {
            currentView = 'day';
            updateActiveViewButton(this);
            updateCalendar();
        });
        
        function navigate(direction) {
            if (currentView === 'month') {
                currentDate.setMonth(currentDate.getMonth() + direction);
            } else if (currentView === 'week') {
                currentDate.setDate(currentDate.getDate() + (7 * direction));
            } else if (currentView === 'day') {
                currentDate.setDate(currentDate.getDate() + direction);
            }
            updateCalendar();
        }
        
        function updateActiveViewButton(activeButton) {
            document.querySelectorAll('.view-button').forEach(button => {
                button.classList.remove('active');
            });
            activeButton.classList.add('active');
        }
        
        function updateCalendar() {
            if (currentView === 'month') {
                renderMonthView();
            } else if (currentView === 'week') {
                renderWeekView();
            } else if (currentView === 'day') {
                renderDayView();
            }
        }
        
        // Helper functions
        function formatDate(date) {
            const d = new Date(date);
            let month = '' + (d.getMonth() + 1);
            let day = '' + d.getDate();
            const year = d.getFullYear();
            
            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;
            
            return [year, month, day].join('-');
        }
        
        function hasEvents(date) {
            const dateStr = formatDate(date);
            return events.some(event => {
                // Handle both date-only and datetime strings
                const eventDate = new Date(event.date);
                const eventDateStr = formatDate(eventDate);
                return eventDateStr === dateStr;
            });
        }
        
        function getEventsForDate(date) {
            const dateStr = formatDate(date);
            return events.filter(event => {
                const eventDate = new Date(event.date);
                const eventDateStr = formatDate(eventDate);
                return eventDateStr === dateStr;
            });
        }
        
        function formatTime(timeStr) {
            if (!timeStr) return '';
            try {
                // Handle both HH:MM:SS and HH:MM formats
                const timeParts = timeStr.split(':');
                const hours = timeParts[0];
                const minutes = timeParts[1] || '00';
                return new Date(`1970-01-01T${hours}:${minutes}:00`).toLocaleTimeString([], { 
                    hour: '2-digit', 
                    minute: '2-digit',
                    hour12: true 
                });
            } catch (e) {
                console.error('Error formatting time:', e);
                return timeStr; // Return original if formatting fails
            }
        }
        
        // Fetch events from views
        function fetchEvents() {
            fetch('../views/resident/get_events.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Fetched events:', data); // Debug log
                    events = Array.isArray(data) ? data : [];
                    updateCalendar();
                })
                .catch(error => {
                    console.error('Error fetching events:', error);
                });
        }
        
        // Render functions
        function renderMonthView() {
            const now = new Date();
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();
            
            document.getElementById('monthYear').textContent = new Date(year, month, 1).toLocaleString('default', { 
                month: 'long', 
                year: 'numeric' 
            });
            
            const firstDayOfMonth = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const daysInPrevMonth = new Date(year, month, 0).getDate();
            
            let calendarHTML = '<table class="calendar-table"><thead><tr>';
            const weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            weekdays.forEach(day => {
                calendarHTML += `<th>${day}</th>`;
            });
            calendarHTML += '</tr></thead><tbody>';
            
            let dayCount = 1;
            let nextMonthDayCount = 1;
            const rows = Math.ceil((firstDayOfMonth + daysInMonth) / 7);
            
            for (let i = 0; i < rows; i++) {
                calendarHTML += '<tr>';
                
                for (let j = 0; j < 7; j++) {
                    if (i === 0 && j < firstDayOfMonth) {
                        // Previous month
                        const prevDay = daysInPrevMonth - (firstDayOfMonth - j - 1);
                        const prevDate = new Date(year, month - 1, prevDay);
                        const hasEvent = hasEvents(prevDate);
                        
                        calendarHTML += `<td class="day-cell inactive-day">
                            <div class="day-number">${prevDay}</div>
                            ${hasEvent ? '<div class="event-indicator"></div>' : ''}
                        </td>`;
                    } else if (dayCount > daysInMonth) {
                        // Next month
                        const nextDate = new Date(year, month + 1, nextMonthDayCount);
                        const hasEvent = hasEvents(nextDate);
                        
                        calendarHTML += `<td class="day-cell inactive-day">
                            <div class="day-number">${nextMonthDayCount}</div>
                            ${hasEvent ? '<div class="event-indicator"></div>' : ''}
                        </td>`;
                        nextMonthDayCount++;
                    } else {
                        // Current month
                        const cellDate = new Date(year, month, dayCount);
                        const isToday = dayCount === now.getDate() && month === now.getMonth() && year === now.getFullYear();
                        const cellClass = isToday ? 'day-cell current-day' : 'day-cell';
                        const hasEvent = hasEvents(cellDate);
                        
                         calendarHTML += `<td class="${cellClass}" data-date="${formatDate(cellDate)}">
                              <div class="day-number">${dayCount}</div>
                              <div class="event-description">${getEventDescriptions(cellDate)}</div>
                          </td>`;
                          dayCount++;
                    }
                }
                
                calendarHTML += '</tr>';
            }
            
            calendarHTML += '</tbody></table>';
            document.getElementById('calendarContainer').innerHTML = calendarHTML;
            
            // Add click handlers for each day cell
            document.querySelectorAll('.day-cell').forEach(cell => {
                cell.addEventListener('click', function() {
                    const dateStr = this.getAttribute('data-date');
                    if (dateStr) {
                        currentDate = new Date(dateStr);
                        currentView = 'day';
                        updateActiveViewButton(document.getElementById('dayView'));
                        updateCalendar();
                    }
                });
            });
        }
        
        function renderWeekView() {
            const date = new Date(currentDate);
            const now = new Date();
            const dayOfWeek = date.getDay();
            const firstDayOfWeek = new Date(date);
            firstDayOfWeek.setDate(date.getDate() - dayOfWeek);
            
            const lastDayOfWeek = new Date(firstDayOfWeek);
            lastDayOfWeek.setDate(firstDayOfWeek.getDate() + 6);
            
            let title = '';
            if (firstDayOfWeek.getMonth() === lastDayOfWeek.getMonth()) {
                title = `${firstDayOfWeek.toLocaleString('default', { month: 'long' })} ${firstDayOfWeek.getFullYear()}`;
            } else {
                title = `${firstDayOfWeek.toLocaleString('default', { month: 'short' })} - ${lastDayOfWeek.toLocaleString('default', { month: 'short' })} ${lastDayOfWeek.getFullYear()}`;
            }
            document.getElementById('monthYear').textContent = title;
            
            let weekHTML = '<table class="calendar-table"><thead><tr>';
            
            for (let i = 0; i < 7; i++) {
                const day = new Date(firstDayOfWeek);
                day.setDate(firstDayOfWeek.getDate() + i);
                weekHTML += `<th>${day.toLocaleString('default', { weekday: 'short' })} ${day.getDate()}</th>`;
            }
            
            weekHTML += '</tr></thead><tbody><tr>';
            
            for (let i = 0; i < 7; i++) {
                const day = new Date(firstDayOfWeek);
                day.setDate(firstDayOfWeek.getDate() + i);
                
                const isToday = day.getDate() === now.getDate() && 
                              day.getMonth() === now.getMonth() && 
                              day.getFullYear() === now.getFullYear();
                
                const cellClass = isToday ? 'day-cell current-day' : 'day-cell';
                const dayEvents = getEventsForDate(day);
                
                weekHTML += `<td class="${cellClass}" data-date="${formatDate(day)}">`;
                
                if (dayEvents.length > 0) {
                    weekHTML += `<div class="week-view-events">`;
                    dayEvents.forEach(event => {
                        weekHTML += `<div class="week-event" style="border-left: 3px solid ${event.color || '#3c8dbc'}; ">
                            <strong>${event.title}</strong>
                            <div>${formatTime(event.start)}</div>
                        </div>`;
                    });
                    weekHTML += `</div>`;
                }
                
                weekHTML += `</td>`;
            }
            
            weekHTML += '</tr></tbody></table>';
            document.getElementById('calendarContainer').innerHTML = weekHTML;
            
            // Add click handlers for each day cell
            document.querySelectorAll('.day-cell').forEach(cell => {
                cell.addEventListener('click', function() {
                    const dateStr = this.getAttribute('data-date');
                    if (dateStr) {
                        currentDate = new Date(dateStr);
                        currentView = 'day';
                        updateActiveViewButton(document.getElementById('dayView'));
                        updateCalendar();
                    }
                });
            });
        }
        
        function renderDayView() {
            document.getElementById('monthYear').textContent = currentDate.toLocaleString('default', { 
                weekday: 'long', 
                month: 'long', 
                day: 'numeric', 
                year: 'numeric' 
            });
            
            const dayEvents = getEventsForDate(currentDate);
            
            let dayHTML = '<div class="day-view">';
            
            if (dayEvents.length === 0) {
                dayHTML += '<p class="text-center mt-3">No events scheduled for this day.</p>';
            } else {
                dayHTML += '<div class="day-events-container">';
                dayEvents.forEach(event => {
                    dayHTML += `
                    <div class="day-event" style="border-left: 3px solid ${event.color || '#3c8dbc'}  ">
                        <div class="event-time">${formatTime(event.start)} - ${formatTime(event.end)}</div>
                        <div class="event-title"><strong>${event.title}</strong></div>
                        ${event.description ? `<div class="event-description">${event.description}</div>` : ''}
                    </div>`;
                });
                dayHTML += '</div>';
            }
            
            dayHTML += '</div>';
            document.getElementById('calendarContainer').innerHTML = dayHTML;
        }

        // New helper function to get event descriptions
        function getEventDescriptions(date) {
            const events = getEventsForDate(date);
            if (events.length === 0) return '';
            
            return events.map(event => 
                `<div class="event-desc" style="color: ${event.color || '#3c8dbc'}">
                ${event.title}
                </div>`
            ).join('');
        }

        function getEventDescriptions(date) {
          const events = getEventsForDate(date);
          if (events.length === 0) return '';
          
          return events.map(event => 
              `<div class="event-desc" style="background-color: ${event.color || '#3c8dbc'}; color: white">
              ${event.title}
              </div>`
          ).join('');
      }

    });
</script>




</body>
</html>