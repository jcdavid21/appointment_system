<?php 
    session_start();
    unset($_SESSION["date_sched"]);
    unset($_SESSION["time_sched"]); 
    unset($_SESSION["apt_name"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/general.css">
    <link rel="stylesheet" href="./styles/navbar.css">
    <title>Home</title>
</head>
<body>
    <nav>
        <div class="img-con">
            <img src="./assets/imgs/OLFU_official_logo.png" alt="">
        </div>
        <div class="text">
            OUR LADY OF FATIMA <br>
            <span>UNIVERSITY</span>
        </div>
    </nav>

    <main>
        <div class="center">
            <div class="con">
                <h1>Schedule an Appointment</h1>
                <div class="title">Welcome to the Our Lady of Fatima Concierge Appointment System.</div>
                <div class="context">
                    <span>Disclaimer: </span> This appointment and scheduling system allocates slots on
                    <span>a first-come-first-serve basis.</span> If you book an appointment but have
                    not yet arrived during the designated time, the client(s) already at the place
                    will be accommodated first. This ensures the continuous accommodation throughout
                    business operating hours.
                </div>
                <div class="flex">
                    <div class="check">
                        <input type="checkbox" id="agreeCheckbox">
                        <label for="agreeCheckbox">I agree to the terms and conditions</label>
                    </div>
                </div>
                <div class="btn">
                    <button id="startBtn" onclick="startAppointment()">Start Appointment</button>
                </div>
            </div>
        </div>
    </main>

    <script>
        function startAppointment() {
            console.log("startAppointment function called"); // Debugging statement
            var agreeCheckbox = document.getElementById("agreeCheckbox");
            if (!agreeCheckbox.checked) {
                alert("Please agree to the terms and conditions before proceeding.");
            } else {
               window.location.href = "./components/schedule.php"
            }
        }
    </script>
</body>
</html>
