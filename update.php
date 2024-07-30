<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background: url('imglp.jpg') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.update-password-container {
    background-color: rgba(255, 255, 255, 0.5); /* Increased transparency */
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    text-align: center;
    width: 100%;
    max-width: 350px;
    backdrop-filter: blur(10px);
    transition: transform 0.3s ease;
}

.update-password-container:hover {
    transform: translateY(-10px);
}

.update-password-container h2 {
    margin-bottom: 20px;
    color: #333;
    font-size: 2em;
    font-weight: bold;
}

.update-password-container label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
}

.update-password-container input[type="text"],
.update-password-container input[type="password"] {
    width: calc(100% - 20px);
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

.update-password-container input[type="text"]:focus,
.update-password-container input[type="password"]:focus {
    border-color: #007bff;
    outline: none;
}

.update-password-container input[type="submit"] {
    width: calc(100% - 20px);
    padding: 12px;
    margin-top: 10px;
    border: none;
    border-radius: 8px;
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: #fff;
    cursor: pointer;
    box-sizing: border-box;
    transition: background 0.3s;
}

.update-password-container input[type="submit"]:hover {
    background: linear-gradient(135deg, #0056b3, #007bff);
}

.update-password-container a {
    display: block;
    margin-top: 10px;
    color: #007bff;
    text-decoration: none;
    transition: color 0.3s;
}

.update-password-container a:hover {
    text-decoration: underline;
    color: #0056b3;
}

.error-message {
    color: red;
    margin-top: 10px;
}

    </style>
</head>
<body>
    <div class="update-password-container">
        <h2>Update Password</h2>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Update Password">
        </form>
        <a href="login.php">Back to Login</a>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Define your database connection details
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "login_db";

        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Process form data
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Check if username already exists
        $check_username_query = "SELECT * FROM loginpage WHERE username='$username'";
        $result = $conn->query($check_username_query);
        if ($result->num_rows > 0) {
            // Username already exists, update password
            $update_query = "UPDATE loginpage SET password='$password' WHERE username='$username'";
            if ($conn->query($update_query) === TRUE) {
                echo "Password updated successfully";
                header("Location: login.php");
                exit();
            } else {
                echo "Error updating password: " . $conn->error;
            }
        } else {
            // Username doesn't exist, display error message
            echo "Username does not exist. Please register first.";
        }

        // Close connection
        $conn->close();
    }
    ?>
</body>
</html>
