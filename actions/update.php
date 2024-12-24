<?php
include '../includes/Database.php';
include '../includes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Matric = $_POST['Matric'];
    $Name = $_POST['Name'];
    $Role = $_POST['Role'];

    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);

    if ($user->updateUser($Matric, $Name, $Role)) {
        header("Location: ../pages/display.php");
        exit();
    } else {
        echo "Error: Unable to update user.";
    }
}
?>
