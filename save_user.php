<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = [
        'fullname' => $_POST['fullname'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'gender' => $_POST['gender']
    ];

    $users = json_decode(file_get_contents("users.json"), true) ?? [];
    $users[] = $user;
    file_put_contents("users.json", json_encode($users, JSON_PRETTY_PRINT));
    
    header("Location: login.php");
    exit();
}
?>