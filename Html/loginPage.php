<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="../styleeCss/login.css">

</head>
<body>

<nav>
            <a href="./index.php"><img src="images/logo.png" alt=""></a>
            <div class="nav-links">
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Courses</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </div>
    </nav>
   
    <div class="background">
        <div class="login-container">
            <h2>Student Login</h2>
            <form action="../Back-end/login.php" method="POST">
            <?php
                session_start();
                if (isset($_SESSION['msg'])) {
               echo "<p style='color:red;'>" . $_SESSION['msg'] . "</p>";
                  unset($_SESSION['msg']); 
                    }
            ?>
                <label for="email">Email</label>
                <input type="email" id="email" name="username" placeholder="Enter your email" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                
                <input type="submit" name="submit">
            </form>
            <div class="links">
                <a href="#">Forgot password?</a>
                <a href="./reg.php">Create account</a>
            </div>
        </div>
    </div>
</body>
</html>
