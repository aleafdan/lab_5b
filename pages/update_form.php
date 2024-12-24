<?php include '../includes/header.php'; ?>

<div class="form-container">
    <h2>Update User</h2>
    <?php
    include '../includes/Database.php';
    include '../includes/User.php';

    $Matric = $_GET['Matric'];

    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);

    $userDetails = $user->getUser($Matric);
    if (!$userDetails) {
        echo "User not found.";
        exit();
    }
    ?>
    <form action="../actions/update.php" method="post">
        <input type="hidden" name="Matric" value="<?php echo $userDetails['Matric']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="Name" value="<?php echo $userDetails['Name']; ?>" required>
        <label for="Role">Role:</label>
        <select name="Role" required>
            <option value="lecturer" <?php echo $userDetails['Role'] === 'lecturer' ? 'selected' : ''; ?>>Lecturer</option>
            <option value="student" <?php echo $userDetails['Role'] === 'student' ? 'selected' : ''; ?>>Student</option>
        </select>
        <button type="submit">Update</button>
    </form>
</div>

</body>
</html>
