<?php 
session_start();
require_once("../config/db.php");

if(isset($_POST["formattedDate"]) && isset($_POST["selectedTime"])) {
    $apt_date = $_POST["formattedDate"];
    $apt_time = $_POST["selectedTime"];

    // Prepare the SQL query
    $query = "SELECT COUNT(*) as total_appointments FROM tbl_appointment WHERE apt_date = ?";
    
    // Prepare and bind the parameters
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $apt_date);
    
    // Execute the query
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    // Fetch the data
    $data = $result->fetch_assoc();
    
    // Check if data exists
    if($data) {
        if($data["total_appointments"] >= 80){
            echo "invalid";
        }else{
            $_SESSION["date_sched"] = $apt_date;
            $_SESSION["time_sched"] = $apt_time;
            echo "success";
        }
    } else {
        echo "0"; // If no appointments found for the selected date
    }
}
?>
