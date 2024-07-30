<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page - Blogster</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background: url('imglp.jpg') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.login-container {
    background: rgba(255, 255, 255, 0.5); /* Increased transparency */
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    text-align: center;
    width: 100%;
    max-width: 350px;
    backdrop-filter: blur(10px);
    transition: transform 0.3s ease;
}

.login-container:hover {
    transform: translateY(-10px);
}

.login-container h1 {
    margin-bottom: 20px;
    color: #333;
    font-size: 2.5em;
    font-weight: bold;
}

.login-container h2 {
    margin-bottom: 20px;
    color: #555;
    font-size: 1.2em;
}

.login-container input[type="text"],
.login-container input[type="password"] {
    width: calc(100% - 20px);
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

.login-container input[type="text"]:focus,
.login-container input[type="password"]:focus {
    border-color: #007bff;
    outline: none;
}

.login-container button {
    width: calc(100% - 20px);
    padding: 12px;
    margin: 10px 0;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: #fff;
    font-size: 16px;
    box-sizing: border-box;
    transition: background 0.3s;
}

.login-container button:hover {
    background: linear-gradient(135deg, #0056b3, #007bff);
}

.login-container button.register-button {
    background: linear-gradient(135deg, #6c757d, #5a6268);
}

.login-container button.register-button:hover {
    background: linear-gradient(135deg, #5a6268, #6c757d);
}

.login-container a {
    display: block;
    margin-top: 10px;
    color: #007bff;
    text-decoration: none;
    transition: color 0.3s;
}

.login-container a:hover {
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
    <div class="login-container">
        <h1>Blogster</h1> <!-- Added Blogster as the app name -->
        <h2>Login</h2>
        <form action="authentication.php" method="POST">
            <input type="text" placeholder="Username" name="username" required>
            <input type="password" placeholder="Password" name="password" required>
            <button type="submit">Login</button>
            <button type="button" class="register-button" onclick="window.location.href='register.php'">Register</button>
            <a href="update.php">Forgot Password</a>
        </form>
        <?php if (!empty($_GET['error'])): ?>
            <div class="error-message"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
