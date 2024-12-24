<?php include '../includes/header.php'; ?>
<div class="form-container">
    <h2>Register</h2>
    <form action="../actions/insert.php" method="post">
        <label for="Matric">Matric:</label>
        <input type="text" name="Matric" id="Matric" required>
        <label for="name">Name:</label>
        <input type="text" name="Name" id="Name" required>
        <label for="Password">Password:</label>
        <input type="Password" name="Password" id="Password" required>
        <label for="Role">Role:</label>
        <select name="Role" id="Role" required>
            <option value="lecturer">Lecturer</option>
            <option value="student">Student</option>
        </select>
        <input type="submit" value="Register">
    </form>
</div>
</body>
</html>
