<?php
session_start();
$error = "";

$file = 'data.json'; // Correct file path

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  if (file_exists($file)) {
    $data = json_decode(file_get_contents($file), true); // Decoding the JSON data to an array

    // Debugging step to check the structure of $data
    echo "<pre>";
    print_r($data);
    echo "</pre>";

    // Ensure $data is an array before proceeding
    if (is_array($data)) {
      foreach ($data as $user) {
        if ($user["username"] === $username && $user["password"] === $password) {
          $_SESSION["loggedin"] = true;
          $_SESSION["user"] = $user;
          header("Location: view.php");
          exit();
        }
      }
      $error = "Invalid username or password!";
    } else {
      $error = "Failed to decode data or data is not in the correct format!";
    }
  } else {
    $error = "No registered user found!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - IPT Finals</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <div class="title">Login</div>
  <div class="content">
    <form method="post" action="">
      <div class="user-details">
        <div class="input-box"><span class="details">Username</span><input type="text" name="username" required></div>
        <div class="input-box"><span class="details">Password</span><input type="password" name="password" required></div>
      </div>
      <div class="button"><input type="submit" value="Logout"></div>
      <?php if ($error): ?>
        <p style="color:red; text-align:center;"><?php echo $error; ?></p>
      <?php endif; ?>
    </form>
  </div>
</div>
</body>
</html>
