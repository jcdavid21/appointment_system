<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/details.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <script src="../scripts/sweetalert2.js"></script>
    <script src="../jquery/jquery.js"></script>
    <title>Details</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<?php include("./navbar.php"); ?>
<?php session_start(); ?>
<div class="con">
    <h1>Concierge Appointment - Personal Details <?php echo $_SESSION["date_sched"]. " ". $_SESSION["time_sched"]; ?></h1>
    <form action="#" id="detailsForm">
        <div class="flex">
            <div class="con-in">
                <label for="fname"><span>*</span>First Name</label>
                <input type="text" placeholder="Enter First Name" id="fname" required>
            </div>

            <div class="con-in">
                <label for="mname">Middle Name</label>
                <input type="text" placeholder="Enter Middle Name" id="mname">
            </div>

            <div class="con-in">
                <label for="lname"><span>*</span>Last Name</label>
                <input type="text" placeholder="Enter Last Name" id="lname" required>
            </div>
        </div>
        <div class="flex">
            <div class="con-in">
                <label for=""><span>*</span>Program</label>
                <input type="text" placeholder="Ex: BSIT" id="program" required>
            </div>

            <div class="con-in">
                <label for=""><span>*</span>Year Level & Section</label>
                <input type="text" placeholder="Ex: 2-YB-2" id="yearlvl" required>
            </div>
        </div>

        <div class="flex">
            <div class="con-in">
                <label for="pemail"><span>*</span>Personal Email</label>
                <input type="email" placeholder="Enter Personal Email" id="pEmail" required>
            </div>

            <div class="con-in">
                <label for="semal"><span>*</span>School Email</label>
                <input type="email" placeholder="Enter School Email" id="sEmail" required>
            </div>

            <div class="con-in">
                <label for="contact"><span>*</span>Contact</label>
                <input type="text" placeholder="Contact Number" id="contact" required>
                <span id="contactError" class="error"></span>
            </div>
        </div>

        <div class="txt-div">
            <label for=""><span>*</span>Concern</label>
            <textarea name="concern" id="concern" cols="20" rows="5"></textarea>
        </div>

        <div class="btn-flex">
            <div class="btn-back">
                <a href="./unset.php"><button type="button" id="back" class="back">Back</button></a>
            </div>

            <div class="btn">
                <button type="submit" id="submit" class="next">Submit</button>
            </div>
        </div>
    </form>
</div>

<script>
    

    document.getElementById('contact').addEventListener('input', function(event) {
        const input = event.target;
        input.value = input.value.replace(/\D/g, '').slice(0, 11); // Remove non-numeric characters and restrict to 11 digits
    });
</script>
<script src="../jquery/details.js"></script>

</body>
</html>
