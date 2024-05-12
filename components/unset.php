<?php 
    session_start();
    unset($_SESSION["date_sched"]);   
    unset($_SESSION["time_sched"]); 
    unset($_SESSION["apt_name"]);
    header("Location: ./schedule.php");
?>