<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Levarage From Learning</title>    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/bannerstyle.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <a href="../templates/index.php">
            <img src="../Images/Banner.png" alt="Banner" style="width:100%;vertical-align:middle;">
            </a>
        </header>
        <nav id="menu">
            <ul>
                <li><a href="../templates/index.php">About</a></li>
                <li><a href="../view/list_enrollment.php">Enrollment</a></li>
                <li><a href="../view/list_lectures.php">Lectures</a></li>
                <li><a href="../view/list_workshops.php">Workshops</a></li>
                <li><a href="../view/list_schedule.php">Schedule</a></li>
                <li><a href="../view/list_coffeebreaks.php">Coffee Breaks</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="../view/list_account.php">My Account</a></li>
                <?php else: ?>
                    <li><a href="../view/list_login.php">Login/Signup</a></li>
                <?php endif; ?>
            </li>
            </ul>
        </nav>
    </body>
</html>     