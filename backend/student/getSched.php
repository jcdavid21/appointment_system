<?php 
require_once("../config/db.php");

$query = "SELECT COUNT(*) as total_appointments, apt_date FROM tbl_appointment WHERE status_id = 1 GROUP BY apt_date HAVING total_appointments >= 80;";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$sessionData = array();

if($result->num_rows > 0){
    while($data = $result->fetch_assoc()){
        $sessionData[] = array(
            "total_appointments" => $data["total_appointments"],
            "apt_date" => $data["apt_date"]
        );
    }
} else {
    // If there are no appointments, return an empty array
    $sessionData = array();
}

echo json_encode($sessionData);
?>
