<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="../styleeCss/reg.css">
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
        <div class="form-container">
            <h2>Create Account</h2>
            <?php
            session_start();
            if (isset($_SESSION['msg'])) {
                echo '<p class="message">' . htmlspecialchars($_SESSION['msg']) . '</p>';
                unset($_SESSION['msg']); // Clear the message after displaying
            }
            ?>
            <form method="post" action="../Back-end/regP.php">
                <label for="fullname">Full Name</label>
                <input type="text" name="name" id="fullname" placeholder="Enter your full name" required>
                <span>
                    <?php
                    if (isset($_SESSION['nameError'])) {
                        echo "<br><p style='color: red; margin-top: -1.1rem;'>" . $_SESSION['nameError'] . "</p>";
                    }
                    ?>
                </span>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="ex: name@gmail.com" required>
                <span>
                    <?php
                    if (isset($_SESSION['emailError'])) {
                        echo "<br><p style='color: red; margin-top: -1.1rem;'>" . $_SESSION['emailError'] . "</p>";
                    }
                    ?>
                </span>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
                <span>
                    <?php
                    if (isset($_SESSION['passwordError'])) {
                        echo "<br><p style='color: red; margin-top: -1.1rem;'>" . $_SESSION['passwordError'] . "</p>";
                    }
                    ?>
                </span>
                <label for="contact">Contact No</label>
                <input type="text" name="number" id="contact" placeholder="Enter your contact number" required>
                <span>
                    <?php
                    if (isset($_SESSION['numberError'])) {
                        echo "<br><p style='color: red; margin-top: -1.1rem;'>" . $_SESSION['numberError'] . "</p>";
                    }
                    ?>
                </span>
                <label for="guardian">Guardian Name</label>
                <input type="text" name="parent" id="guardian" placeholder="Enter guardian's name" required>
                <span>
                    <?php
                    if (isset($_SESSION['parentError'])) {
                        echo "<br><p style='color: red; margin-top: -1.1rem;'>" . $_SESSION['parentError'] . "</p>";
                    }
                    session_unset();
                    session_destroy();
                    ?>
                </span>
                <label for="userType">User Type</label>
                <select name="type" id="userType" required>
                    <option value="" required>Select Type</option>
                    <option value="student" required>Student</option>
                    <option value="teacher" required>Teacher</option>
                </select>
                <div class="button-group">
                    <button type="button" class="login-btn">
                        <a href="../Html/loginPage.php">Login</a>
                    </button>
                    <button type="submit" class="submit-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
