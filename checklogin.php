<?php

// Start the session
session_start();

// Include the database connection file
require_once("db.php");

// Check if the login form was submitted
if (isset($_POST)) {

    // Escape special characters in the input fields
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Encrypt the password
    $password = base64_encode(strrev(md5($password)));

    // SQL query to check user login credentials
    $sql = "SELECT id_user, firstname, lastname, email FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    // If user table has matching login details
    if ($result->num_rows > 0) {
        // Output data
        while ($row = $result->fetch_assoc()) {
            // Set session variables for easy reference
            $_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];
            $_SESSION['id_user'] = $row['id_user'];

            // Redirect user based on the previous session location or to the dashboard
            if (isset($_SESSION['callFrom'])) {
                $location = $_SESSION['callFrom'];
                unset($_SESSION['callFrom']);
                header("Location: " . $location);
                exit();
            } else {
                header("Location: user/index.php");
                exit();
            }
        }
    } else {
        // If no matching record is found in the user table, redirect to the login page
        $_SESSION['loginError'] = "Invalid Email/Password! Try Again!";
        header("Location: login-candidates.php");
        exit();
    }

    // Close the database connection
    $conn->close();

} else {
    // Redirect to the login page if the form was not submitted
    header("Location: login-candidates.php");
    exit();
}
