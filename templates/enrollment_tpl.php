<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Leverage From Learning - Enrollment</title>    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/enrollmentstyle.css" rel="stylesheet">
    </head>
    <body>
        <main>
        <?php include('banner.php')?>
        <section id="enrollment">
            <?php
            if (isset($_SESSION['user_id'])) {
                if ($firstLetter == 'P') {
                    if ($_SESSION['registration']) {
                        echo "<p>You are successfully enrolled for the event.</p>";
                    } else {
                        echo "<h1>Welcome to the enrollment page for the LFL event!</h1>
                        <p>Check if the information below is correct!</p>
                        <div class='info'>
                            <p><strong> Name: </strong> " . htmlspecialchars($userInfo['name']) . "</p>
                            <p><strong> Age:  </strong>" . htmlspecialchars($userInfo['age']) . "</p>
                            <p><strong> Job Description:  </strong>" . htmlspecialchars($userInfo['job_description']) . "</p>
                            <p><strong> Food restrictions:  </strong>" . htmlspecialchars($userInfo['food_restrictions']) . "</p>
                        </div>
                        <form action='../actions/action_enroll.php' method='POST'> 
                            <button type='submit'>Enroll Now</button>
                        </form>";
                    }
                } else {
                    echo "<p>As a speaker, you can't sign up.</p>";
                }
            } else {
                echo "<h1>Welcome to the enrollment page for the LFL event!</h1>";
                echo "<p>You are currently not logged in. Please log in to access enrollment features.</p>";
                echo "<p>Alternatively, feel free to explore the event details or register for an account!</p>";
            }
            ?>
        </section>
        </main>
        <?php include('footer.php')?>
    </body>
</html>
