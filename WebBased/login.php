<?php
include 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Hash password before checking

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.html"); // Redirect to dashboard
        exit;
    } else {
        header("Location: index.html?error=Invalid username or password"); // Stay on login page with error message
        exit;
    }
}
?>
