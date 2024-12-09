<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register as Passenger</title>
    <link rel="stylesheet" href="../../All/allCss.css">
    <link rel="stylesheet" href="registerPassenger.css">
</head>
<body>
    <h2 class="regPasLogoH">Trackie<sup>BDL</sup></h2>
    <h1 class="regPasHeaH">Register</h1>

    <form action="registerPassengerP.php" method="post" class="regPasForm">
        <div class="regPasNames">
            <div class="regErrorH">
                <input type="text" name="firstNameH" class="regPasFname" placeholder="First Name">
                <span>
                    <?php
                    if(isset($_SESSION['firstNameError'])){
                        echo "<br><p style='color: red; margin-top: -1.1rem;'>".$_SESSION['firstNameError']."</p>";
                    }
                    ?>
                </span>
            </div>
            
            <div class="regErrorH">
            <input type="text" name="secondNameH" class="regPasSname" placeholder="Second Name">
                <span>
                    <?php
                    if(isset($_SESSION['secondNameError'])){
                        echo "<br><p style='color: red; margin-top: -1.1rem;'>".$_SESSION['secondNameError']."</p>";
                        }
                    ?>
                </span>
            </div>
        </div>
    
        <div class="regErrorH">
            <input type="text" name="gmailH" class="regPasGmail" placeholder="Gmail">
            <span>
                <?php
                        if(isset($_SESSION['gmailError'])){
                            echo "<br><p style='color: red; margin-top: -1.1rem;'>".$_SESSION['gmailError']."</p>";
                        }
                ?>
            </span>
        </div>
        
        <div class="regPasPasses">
            <div class="regErrorH">
                <input type="text" name="passwordH" class="regPasPassL" placeholder="Password">
                <span>
                    <?php
                    if(isset($_SESSION['passwordError'])){
                        echo "<br><p style='color: red; margin-top: -1.1rem;'>".$_SESSION['passwordError']."</p>";
                    }
                    ?>
                </span>
            </div>
            
            <div class="regErrorH">
            <input type="text" name="rePasswordH" class="regPasPassR" placeholder="Re-password">
                <span>
                    <?php
                    if(isset($_SESSION['rePasswordError'])){
                        echo "<br><p style='color: red; margin-top: -1.1rem;'>".$_SESSION['rePasswordError']."</p>";
                    }
                    ?>
                </span>
            </div>
        </div>

        <div class="regErrorH">
        <input type="text" name="phoneH" class="regPasPhone" placeholder="Phone no">
            <span>
                <?php
                    if(isset($_SESSION['phoneError'])){
                        echo "<br><p style='color: red; margin-top: -1.1rem;'>".$_SESSION['phoneError']."</p>";
                        session_unset();
                        session_destroy();
                    }
                ?>
            </span>
        </div>
        
        <input type="submit" name="registerH" class="regPasSign" value="Sign Up">
        <p class="regPasAlre">Already Signed up?</p>
    </form>
</body>
</html>
