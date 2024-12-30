<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/register_1.css" rel="stylesheet">
</head>
<body>
    <main>
    <?php include('banner.php'); ?>
    <section id="register">
        <h1>Create your own account!</h1>
        <form action="../actions/action_register_1.php" method="POST">
            <div class="name-age">
                <label>Name: <input type="text" name="name" required></label>
                <label>Age: <input type="number" name="age" required min="1"></label>
            </div>
            <div class="job-description">
                <label>Job Description: <input type="text" name="job_description" required></label>
            </div>
            <div class="food-restrictions">
                <label>Food Restrictions:</label>
                <input type="radio" id="none" name="food_restrictions" value="None" required>
                <label for="none">None</label>
                <input type="radio" id="vegetarian" name="food_restrictions" value="Vegetarian" required>
                <label for="vegetarian">Vegetarian</label>
                <input type="radio" id="vegan" name="food_restrictions" value="Vegan" required>
                <label for="vegan">Vegan</label>
                <input type="radio" id="other" name="food_restrictions" value="Other" required>
                <label for="other">Other</label>
            </div>
            <div class="joining-as-speaker">
                <label>Are you joining as a speaker for the event?</label>
                <input type="radio" id="yes_speaker" name="is_speaker" value="yes" requied>
                <label for="yes_speaker">Yes</label>
                <input type="radio" id="no_speaker" name="is_speaker" value="no" required>
                <label for="no_speaker">No</label>
            </div>
            <p class="submit-container">
                <input type="submit" value="Next">
            </p>
        </form>
    </section>
    </main>
</body>
<?php include('footer.php'); ?>
</html>
