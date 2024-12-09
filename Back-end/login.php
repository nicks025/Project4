<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'educationportal'); // Update with your DB credentials

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Query to find user with matching username and password
    $query = "SELECT * FROM user WHERE Email = '$username' AND password = '$password'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $user = mysqli_fetch_assoc($result);

        // Set session variables
        $_SESSION['username'] = $user['username']; // Store username
        $_SESSION['role'] = $user['userType'];     // Store role
        $_SESSION['full_name'] = $user['fullName']; // Store full name

        // Redirect based on user role
        switch ($user['userType']) {
            case 'student':
                header("Location: ../Html/p.php?username=" . urlencode($user['username']));
                break;
            case 'admin':
                header("Location: ../Html/a.php");
                break;
            case 'teacher':
                header("Location: ../Html/t.php?username=" . urlencode($user['username']));
                break;
            default:
                $_SESSION['msg'] = "User role is invalid!";
                header("Location: ../Html/loginPage.php?username=" . urlencode($username));
        }
        exit();
    } else {
        // Invalid credentials
        $_SESSION['msg'] = "Invalid username or password!";
        header("Location: ../Html/loginPage.php?username=" . urlencode($username));
        exit();
    }
}
?>
