<?php
    session_start();

    //Initialize variable.
    $fullName = $Email= $password= $gender = 
    $number = $parent = $type= $isValid = "";

    //If submitted using Register button.
    // if(isset($_POST['registerH'])){
        //If submitted using post method.
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $fullName = $_POST['name'];
            $Email = $_POST['email'];
            $password = $_POST['password'];
            $number = $_POST['number'];
            $parent = $_POST['parent'];
            $usertype = $_POST['type']; 

            $isValid = true;
    
            //Validate fullname.
            if(!preg_match("/^[a-zA-Z]{3,}/", $fullName)){
                $_SESSION['nameerror'] = "Invalid first Name.";
                $isValid = false;
            }          

            //Validate gmail.
            if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
                $_SESSION['emailError'] = "Invalid gmail.";
                $isValid = false;
            }
    
            //Validate password.
            if(!preg_match("/^(?=(.*[a-zA-Z]))(?=(.*\d))(?=(.*\w)).{8,}$/", $password)){
                $_SESSION['passwordError'] = "Not proper password used";
                $isValid = false;
            }

            //Validate phone number.
            if(!preg_match("/^9[\d]{9}/", $phone)){
                $_SESSION['numberError'] = "Invalid phone number";
                $isValid = false;
            }

            //Validate Parent Name.
            if(!preg_match("/^[a-zA-Z]{3,}/", $parent)){
                $_SESSION['parenterror'] = "Invalid first Name.";
                $isValid = false;
            }   

            //If validated.
            if($isValid){
                // Database connection
                $con = mysqli_connect('localhost', 'root', '', 'educationportal');
             if (!$con) {
                    $_SESSION['msg'] = "Registration Failed: Unable to connect to the database.";
                    header('Location: ../Html/reg.php');
                    exit();
                    }
  
                    // Check for duplicate email
                    $emailCheckQuery = "SELECT * FROM user WHERE Email = '$email'";
                    $emailCheckResult = mysqli_query($con, $emailCheckQuery);

               if (mysqli_num_rows($emailCheckResult) > 0) {
                  $_SESSION['msg'] = "Registration Failed: Email already registered.";
                header('Location: ../Html/reg.php');
                 exit();
                }

                // Insert data into the database
                 $sql = "INSERT INTO user (fullName, phone, Email, password, parents, userType) 
                        VALUES ('$name', '$number', '$email', '$password', '$parent', '$usertype')";

                if (mysqli_query($con, $sql)) {
                $_SESSION['msg'] = "Registration Successful! Please login to continue.";
                header('Location: ../Html/loginPage.php');
                exit();
            } else {
                $_SESSION['msg'] = "Registration Failed: " . mysqli_error($con);
                header('Location: ../Html/reg.php');
                exit();
            }
        }
?>
