<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $newUser = [
    "fullname" => $_POST["fullname"],
    "username" => $_POST["username"],
    "email" => $_POST["email"],
    "phone" => $_POST["phone"],
    "password" => $_POST["password"],
    "gender" => $_POST["gender"]
  ];

  $file = 'data.json';
  $users = [];

  if (file_exists($file)) {
    $users = json_decode(file_get_contents($file), true) ?? [];
  }

  $users[] = $newUser;
  file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));

  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - IPT Finals</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <div class="title">Registration</div>
  <div class="content">
    <form method="post" action="">
      <div class="user-details">
        <div class="input-box"><span class="details">Full Name</span><input type="text" name="fullname" required></div>
        <div class="input-box"><span class="details">Username</span><input type="text" name="username" required></div>
        <div class="input-box"><span class="details">Email</span><input type="text" name="email" required></div>
        <div class="input-box"><span class="details">Phone Number</span><input type="text" name="phone" required></div>
        <div class="input-box"><span class="details">Password</span><input type="password" name="password" required></div>
        <div class="input-box"><span class="details">Confirm Password</span><input type="password" required></div>
      </div>
      <div class="gender-details">
        <input type="radio" name="gender" id="dot-1" value="Male" required>
        <input type="radio" name="gender" id="dot-2" value="Female">
        <input type="radio" name="gender" id="dot-3" value="Prefer not to say">
        <span class="gender-title">Gender</span>
        <div class="category">
          <label for="dot-1"><span class="dot one"></span><span class="gender">Male</span></label>
          <label for="dot-2"><span class="dot two"></span><span class="gender">Female</span></label>
          <label for="dot-3"><span class="dot three"></span><span class="gender">Prefer not to say</span></label>
        </div>
      </div>
      <div class="button"><input type="submit" value="Register"></div>
    </form>
  </div>
</div>
</body>
</html>
