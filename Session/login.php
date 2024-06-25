<?php
session_start();

// Check if user is already logged in, redirect to profile page if yes
if (isset($_SESSION['username'])) {
    header("Location: profile.php");
    exit;
}

// Check login credentials
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simulated user authentication
    $username = "john";
    $password = "password";

    // Validate login
    if ($_POST['username'] == $username && $_POST['password'] == $password) {
        // Successful login, store username in session
        $_SESSION['username'] = $username;
        header("Location: profile.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($error)) echo "<p>$error</p>"; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
