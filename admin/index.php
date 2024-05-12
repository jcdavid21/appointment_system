<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="../styles/adminLogin.css" rel="stylesheet" />
    <script src="../jquery/jquery.js"></script>
    <script src="../scripts/sweetalert2.js"></script>
</head>
<body>
<div class="container">
    <div class="login form">
      <div class="img-container">
        <img src="../assets/imgs/OLFU_official_logo.png" alt="Company_logo">
      </div>
      <header>Admin Login</header>
      <form id="loginAdmin" method="post">
        <input type="text" placeholder="Enter your username" id="adminUsername" password="adminUsername">
        <input type="password" placeholder="Enter your password" id="adminPassword" name="adminPassword">
        <!-- <a href="#">Forgot password?</a> -->
        <input type="submit" name="adminLoginBtn" class="button" value="Login">
      </form>
    </div>
  </div>
<script src="../jquery/adminLogin.js"></script>
</body>
</html>