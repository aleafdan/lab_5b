<?php include '../includes/header.php'; ?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 40px;
    }

    .form-container {
        background-color: #fff;
        padding: 30px;
        max-width: 400px;
        margin: 0 auto;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    label {
        display: block;
        margin: 10px 0 5px;
        color: #555;
    }

    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 14px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    p {
        text-align: center;
        margin-top: 20px;
    }

    a {
        color: #007BFF;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .error-message {
        color: red;
        text-align: center;
        margin-top: 15px;
    }
</style>

<div class="form-container">
    <h2>Login</h2>
    <form action="../actions/authenticate.php" method="post">
        <label for="Matric">Matric:</label>
        <input type="text" name="Matric" id="Matric" required>

        <label for="Password">Password:</label>
        <input type="password" name="Password" id="Password" required>

        <input type="submit" name="submit" value="Login">
    </form>

    <p>Don't have an account? <a href="register_form.php">Register here</a>.</p>

    <?php
    if (!empty($error_message)) {
        echo "<p class='error-message'>$error_message</p>";
    }
    ?>
</div>

</body>
</html>
