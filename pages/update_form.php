<?php include '../includes/header.php'; ?>

<div class="form-container">
    <h2>Update User</h2>
    <?php
    include '../includes/Database.php';
    include '../includes/User.php';

    // Get Matric from URL parameters
    $Matric = $_GET['Matric'];

    // Create database connection and fetch user details
    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);

    // Fetch user details by Matric
    $userDetails = $user->getUser($Matric);
    if (!$userDetails) {
        echo "User not found.";
        exit();
    }
    ?>

    <form action="../actions/update.php" method="post">
        <!-- Hidden input for Matric -->
        <input type="hidden" name="Matric" value="<?php echo htmlspecialchars($userDetails['Matric']); ?>">

        <!-- Name field -->
        <label for="Name">Name:</label>
        <input type="text" name="Name" value="<?php echo htmlspecialchars($userDetails['Name']); ?>" required>

        <!-- Role selection -->
        <label for="Role">Role:</label>
        <select name="Role" required>
            <option value="lecturer" <?php echo $userDetails['Role'] === 'lecturer' ? 'selected' : ''; ?>>Lecturer</option>
            <option value="student" <?php echo $userDetails['Role'] === 'student' ? 'selected' : ''; ?>>Student</option>
        </select>

        <!-- Submit button -->
        <button type="submit">Update</button>
    </form>
</div>

</body>
</html>
