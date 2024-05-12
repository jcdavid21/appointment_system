<?php 
    session_start();
    require_once("../config/db.php");

    if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["program"])
    && isset($_POST["yearlvl"]) && isset($_POST["pEmail"]) && isset($_POST["sEmail"])
    && isset($_POST["contact"]) && isset($_POST["concern"]))
    {

        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $program = $_POST['program'];
        $yearlvl = $_POST['yearlvl'];
        $pEmail = $_POST['pEmail'];
        $sEmail = $_POST['sEmail'];
        $contact = $_POST['contact'];
        $concern = $_POST['concern'];
        $apt_date = $_SESSION["date_sched"];
        $apt_time = $_SESSION["time_sched"];

        // Insert the appointment record
        $query = "INSERT INTO tbl_appointment (apt_date, apt_time) VALUES (?, ?)";
        $stmt1 = $conn->prepare($query);
        $stmt1->bind_param("ss", $apt_date, $apt_time);

        if ($stmt1->execute()) {
            // Retrieve the auto-generated appointment ID
            $apt_id = $stmt1->insert_id;

            // Prepare SQL statement to insert appointment details into the database
            $sql = "INSERT INTO tbl_appointment_details (apt_id, first_name, middle_name, last_name, program, year_level, email, contact, concern) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issssssss", $apt_id, $fname, $mname, $lname, $program, $yearlvl, $sEmail, $contact, $concern);

            // Execute the statement to insert appointment details
            if ($stmt->execute()) {
                $_SESSION["apt_name"] = $fname.' '.$mname.' '.$lname;
                echo "success";
            } else {
                echo "Error inserting appointment details: " . $stmt->error;
            }

            // Close the statement for appointment details
            $stmt->close();
        } else {
            echo "Error inserting appointment record: " . $stmt1->error;
        }

        // Close the statement for appointment record
        $stmt1->close();
    }
?>
