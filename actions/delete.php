<?php
include '../includes/Database.php';
include '../includes/User.php';

if (isset($_GET['Matric'])) {
    $Matric = $_GET['Matric'];

    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);

    if ($user->deleteUser($Matric)) {
        header("Location: ../pages/display.php");
        exit();
    } else {
        echo "Error: Unable to delete user.";
    }
}
?>
