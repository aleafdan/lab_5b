<?php
include '../includes/Database.php';
include '../includes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the values from the form
    $Matric = $_POST['Matric'];
    $Name = $_POST['Name'];
    $Role = $_POST['Role'];

    // Create database connection and User instance
    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);

    // Attempt to update the user details
    if ($user->updateUser($Matric, $Name, $Role)) {
        header("Location: ../pages/display.php"); // Redirect after successful update
        exit();
    } else {
        echo "Error: Unable to update user.";
    }
}
?>
