<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/print.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <title>Success</title>
</head>
<body>
<?php session_start(); ?>
<?php include("./navbar.php"); ?>
    <div class="con">
        <h1>You have successfully created an appointment!</h1>
        <div class="title">REGISTRAR</div>
        <div class="apt">APPOINTMENT</div>
        <div class="name">Name: <strong><?php echo $_SESSION["apt_name"] ?></strong></div>
        <div class="flex">
            <div class="date">Date: <strong>
            <?php 
                $apt_date = $_SESSION["date_sched"];
                $formatted_date = date("F j, Y", strtotime($apt_date));
                echo $formatted_date;
            ?>
            </strong></div>
            <div class="time">Time: <strong><?php echo $_SESSION["time_sched"] ?></strong></div>
        </div>
    </div>
</body>
</html>