<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $username = trim($_GET['username']);
    $email = trim($_GET['email']);
    $password = trim($_GET['password']);

    // Validate inputs
    if (empty($username) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // Ensure the users directory exists
    if (!file_exists('users')) {
        mkdir('users', 0777, true);
    }

    // Define the path to the users file
    $usersFile = 'users/users.json';

    // Load existing users
    if (file_exists($usersFile)) {
        $usersData = json_decode(file_get_contents($usersFile), true);
    } else {
        $usersData = [];
    }

    // Check if the user already exists
    foreach ($usersData as $user) {
        if ($user['username'] == $username || $user['email'] == $email) {
            echo "User already exists.";
            exit;
        }
    }

    // Store new user data
    $newUser = [
        'username' => $username,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT) // Hash the password
    ];

    $usersData[] = $newUser;

    if (file_put_contents($usersFile, json_encode($usersData, JSON_PRETTY_PRINT))) {
        echo "User registered successfully!";
    } else {
        echo "Error registering user.";
    }
}
?>
