<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBDEV LAB 5B</title>
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
<?php
session_start();

$current_page = basename($_SERVER['PHP_SELF']);

// Restrict access to pages except login and registration
if (!isset($_SESSION['logged_in']) && !in_array($current_page, ['login_form.php', 'register_form.php'])) {
    header("Location: ../pages/login_form.php");
    exit();
}
?>
