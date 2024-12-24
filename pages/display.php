<?php include '../includes/header.php'; ?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    .form-container {
        background-color: #fff;
        padding: 20px;
        max-width: 800px;
        margin: 0 auto;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    td a {
        text-decoration: none;
        color: #007BFF;
        padding: 5px;
    }

    td a:hover {
        background-color: #f1f1f1;
    }

    td[colspan="4"] {
        text-align: center;
        color: #888;
        font-style: italic;
    }

    /* Button Style */
    .login-btn {
        display: block;
        width: 200px;
        padding: 10px;
        background-color: #007BFF;
        color: white;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        margin: 20px auto;
        font-size: 16px;
    }

    .login-btn:hover {
        background-color: #0056b3;
    }
</style>

<div class="form-container">
    <h2>User List</h2>
    <table>
        <thead>
            <tr>
                <th>Matric</th>
                <th>Name</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../includes/Database.php';
            include '../includes/User.php';

            $database = new Database();
            $db = $database->getConnection();

            if (!$db) {
                echo "<tr><td colspan='4'>Database connection failed</td></tr>";
                exit();
            }

            $user = new User($db);
            $result = $user->getUsers();

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['Matric']) . "</td>
                            <td>" . htmlspecialchars($row['Name']) . "</td>
                            <td>" . htmlspecialchars($row['Role']) . "</td>
                            <td>
                                <a href='../actions/delete.php?Matric=" . $row['Matric'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a> |
                                <a href='../pages/update_form.php?Matric=" . $row['Matric'] . "'>Update</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No Users Found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Login Button -->
    <a href="../pages/login_form.php" class="login-btn">Go to Login</a>
</div>

</body>
</html>
