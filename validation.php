<?php
session_start();

$file = fopen("users.txt", "r");
$user = fgetcsv($file);
fclose($file);

if ($_POST['username'] === $user[1] && $_POST['password'] === $user[4]) {
    $_SESSION['logged_in'] = true;
    $_SESSION['user'] = $user;
    header("Location: view.php");
} else {
    echo "Invalid login. <a href='login.php'>Try again</a>";
}
?>
