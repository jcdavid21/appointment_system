<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/schedule.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <script src="../scripts/sweetalert2.js"></script>
    <script src="../jquery/jquery.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <title>Schedule Appointment</title>
</head>
<body>
    <?php include("./navbar.php"); ?>
    <?php
    session_start();
    require_once('../backend/config/db.php');
    ?>

    <div class="con">
        <h1>Concierge Appointment Date and Time</h1>
        <div class="note"><span>*</span><strong>Note:</strong> All the date that has red cicle are fully booked</div>
        <div class="flex">
            <div class="wrapper">
                <header>
                    <p class="current-date"></p>
                    <div class="icons">
                        <span id="prev" class="material-symbols-rounded">chevron_left</span>
                        <span id="next" class="material-symbols-rounded">chevron_right</span>
                    </div>
                </header>
                <div class="calendar">
                    <ul class="weeks">
                        <li>Sun</li>
                        <li>Mon</li>
                        <li>Tue</li>
                        <li>Wed</li>
                        <li>Thu</li>
                        <li>Fri</li>
                        <li>Sat</li>
                    </ul>
                    <ul class="days"></ul>
                </div>
            </div>

            <div class="time-selection">
                <h2>Select Time:</h2>
                <div class="time-buttons">
                    <input type="radio" id="time-09" name="time" value="09:00AM">
                    <label for="time-09">09:00 AM</label>
                    
                    <input type="radio" id="time-11" name="time" value="11:00AM">
                    <label for="time-11">11:00 AM</label>
                    
                    <input type="radio" id="time-13" name="time" value="13:00PM">
                    <label for="time-13">01:00 PM</label>
                    
                    <input type="radio" id="time-15" name="time" value="15:00PM">
                    <label for="time-15">03:00 PM</label>
                    
                    <input type="radio" id="time-16" name="time" value="16:00PM">
                    <label for="time-16">04:00 PM</label>
                </div>
            </div>

        </div>
        <div class="btn-con">
            <a href="../index.php"><button class="back">BACK</button></a>
            <button class="next">NEXT</button>
        </div>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const daysTag = document.querySelector(".days");

    // Function to handle date selection
    function handleDateSelection(event) {
        // Remove the 'active-date' class from all date elements
        const allDates = document.querySelectorAll(".days li");
        allDates.forEach(date => {
            date.classList.remove("active-date");
        });

        // Add the 'active-date' class to the clicked date element
        const selectedDate = event.target;
        selectedDate.classList.add("active-date");

        // You can perform any further actions here, such as submitting the selected date to the server or updating UI
    }

    // Add click event listener to the days container
    daysTag.addEventListener("click", handleDateSelection);
});

    </script>
    <script src="../jquery/schedule.js"></script>
    <script src="../scripts/schedule.js"></script>
</body>
</html>
