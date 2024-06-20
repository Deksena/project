<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Save user data in session array
    if (!isset($_SESSION['users'])) {
        $_SESSION['users'] = [];
    }

    // Check if username already exists
    if (isset($_SESSION['users'][$username])) {
        echo "Username already exists. Please choose another one.";
    } else {
        $_SESSION['users'][$username] = $hashed_password;
        echo "Registration successful. You can now login.";
    }
} else {
    echo "Invalid request method.";
}
?>
