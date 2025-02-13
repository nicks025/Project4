<?php
session_start();

// Initialize variables
$fullName = $Email = $password = $number = $parent = $usertype = "";
$isValid = true;

// If submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $parent = $_POST['parent'];
    $usertype = $_POST['type'];

    // Validate full name
    if (!preg_match("/^[a-zA-Z ]$/", $fullname)) {
        $_SESSION['nameError'] = "Invalid full name.";
        $isValid = false;
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emailError'] = "Invalid email address.";
        $isValid = false;
    }

    // Validate password
    if (!preg_match("/^(?=.*[a-zA-Z])(?=.*\d)(?=.*\W).{8,}$/", $password)) {
        $_SESSION['passwordError'] = "Password must be at least 8 characters, include letters, numbers, and symbols.";
        $isValid = false;
    }

    // Validate phone number
    if (!preg_match("/^9\d{9}$/", $number)) {
        $_SESSION['numberError'] = "Invalid phone number.";
        $isValid = false;
    }

    // Validate guardian's name
    if (!preg_match("/^[a-zA-Z ]$/", $parent)) {
        $_SESSION['parentError'] = "Invalid guardian name.";
        $isValid = false;
    }
   
            if($isValid){
                $con = mysqli_connect('localhost', 'root', '', 'educationportal');
             if (!$con) {
                    $_SESSION['msg'] = "Registration Failed: Unable to connect to the database.";
                    header('Location: ../Html/reg.php');
                    exit();
                    }

                    $emailCheckQuery = "SELECT * FROM user WHERE Email = '$email'";
                    $emailCheckResult = mysqli_query($con, $emailCheckQuery);

               if (mysqli_num_rows($emailCheckResult) > 0) {
                  $_SESSION['msg'] = "Registration Failed: Email already registered.";
                header('Location: ../Html/reg.php');
                 exit();
                }

                 $sql = "INSERT INTO user (fullName, Email, password, phone, parents, userType) 
                        VALUES ('$fullname','$email', '$password',  '$number', '$parent', '$usertype')";

                if (mysqli_query($con, $sql)) {
                $_SESSION['msg'] = "Registration Successful! Please login to continue.";
                header("Location: ../Html/reg.php");
            } else {
                $_SESSION['msg'] = "Registration Failed: " . mysqli_error($con);
                header('Location: ../Html/reg.php');
            }
        } else {
            header('Location: ../Html/reg.php');
        }
    } 
?>
