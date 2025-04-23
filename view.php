<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("Location: login.php");
  exit();
}

$user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View - IPT Finals</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <div class="title">User Information</div>
  <div class="content">
    <table>
      <tr><th>Full Name</th><td><?php echo $user["fullname"]; ?></td></tr>
      <tr><th>Username</th><td><?php echo $user["username"]; ?></td></tr>
      <tr><th>Email</th><td><?php echo $user["email"]; ?></td></tr>
      <tr><th>Phone</th><td><?php echo $user["phone"]; ?></td></tr>
      <tr><th>Gender</th><td><?php echo $user["gender"]; ?></td></tr>
    </table>
    <br>
    <div class="button">
      <a href="logout.php">
        <button type="button">Logout</button>
      </a>
    </div>
  </div>
</div>
</body>
</html>
