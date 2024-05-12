<?php

    require_once("../config/db.php");

    if(isset($_POST["apt_id"])){
        $apt_id = $_POST["apt_id"];

        $query = "UPDATE tbl_appointment SET status_id = 3 WHERE apt_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $apt_id);
        if($stmt->execute()){
            echo "success";
        }else{
            echo "error";
        }
        
    }

?>