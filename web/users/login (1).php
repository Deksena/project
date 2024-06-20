<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $email = trim($_GET['email']);
    $password = trim($_GET['password']);

    // Validate inputs
    if (empty($email) || empty($password)) {
        echo "Both fields are required.";
        exit;
    }

    // Define the path to the users file
    $usersFile = 'users/users.json';

    // Load existing users
    if (!file_exists($usersFile)) {
        echo "User not found.";
        exit;
    }

    $usersData = json_decode(file_get_contents($usersFile), true);

    // Find the user
    $userFound = false;
    foreach ($usersData as $user) {
        if ($user['email'] == $email) {
            $userFound = true;
            // Verify password
            if (password_verify($password, $user['password'])) {
                echo "Login successful!";
            } else {
                echo "Invalid password.";
            }
            break;
        }
    }

    if (!$userFound) {
        echo "User not found.";
    }
}
?>
