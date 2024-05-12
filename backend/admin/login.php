<?php 
    session_start();
    require_once("../config/db.php");

    if(isset($_POST["username"]) && isset($_POST["password"])){

        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM tbl_account WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        echo "success";
    }
?>