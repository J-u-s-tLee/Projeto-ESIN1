<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Leverage From Learning</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/loginstyle.css" rel="stylesheet">
    </head>
    <body>
        <main>
            <?php include('banner.php'); ?>
            <section id="login">
                <h1>Not logged in yet? Login to your account!</h1>
                <h2>If you don't have an account, <a href="list_register_1.php">Register here</a></h2>
                <?php if (!empty($error_message)): ?>
                    <div class="error-message">
                        <?php echo htmlspecialchars($error_message); ?>
                    </div>
                <?php endif; ?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <fieldset>
                        <label>
                            Username (ID):
                            <input type="text" name="identifier" required>
                        </label>
                        <br>
                        <label>
                            Password:
                            <input type="password" name="password" required>
                        </label>
                        <br>
                            <input type="submit" value="Login">
                    </fieldset>
                </form>
            </section>
        </main>
    </body>
    <?php include('footer.php'); ?>
</html>
