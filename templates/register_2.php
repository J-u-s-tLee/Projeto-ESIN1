<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Register - Step 2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/register_2.css" rel="stylesheet">
</head>
<body>
    <main>
        <?php include('banner.php'); ?>
        <section id="register">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <?php if ($is_speaker === 'yes'): ?>
                    <fieldset>
                        <h1>Speaker Details</h1>
                        <?php if (!empty($error_message)): ?>
                            <div class="error-message">
                                <p><?php echo htmlspecialchars($error_message); ?></p>
                            </div>
                        <?php endif; ?>
                        <div class="field-row">
                            <label>Speaker ID:
                                <input type="text" name="speaker_identifier" value="<?php echo $speaker_identifier; ?>" required>
                            </label>
                            <label>Speaker Type:
                                <select name="speaker_type">
                                    <option value="lecture" <?php if ($speaker_type == 'lecture') echo 'selected'; ?>>Lecture</option>
                                    <option value="workshop" <?php if ($speaker_type == 'workshop') echo 'selected'; ?>>Workshop</option>
                                </select>
                            </label>
                        </div>
                        <div class="field-row">
                            <label>Nationality:
                                <input type="text" name="nationality" value="<?php echo $nationality; ?>" required>
                            </label>
                            <label>Place of Residence:
                                <input type="text" name="place_residence" value="<?php echo $place_residence; ?>" required>
                            </label>
                        </div>
                    </fieldset>
                <?php endif; ?>
                <fieldset>
                    <h1>Account Setup</h1>
                    <?php if (!empty($error_message)): ?>
                        <div class="error-message">
                            <p><?php echo htmlspecialchars($error_message); ?></p>
                        </div>
                        <?php endif; ?>
                    <div class="field-row">
                        <label>Password:
                            <input type="password" name="password" required pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
                            title="Must be at least 8 characters long, include an uppercase letter, number, and special character.">
                        </label>
                        <label>Confirm Password:
                            <input type="password" name="password_confirm" required>
                        </label>
                    </div>
                </fieldset>
                <p class="submit-container">
                    <input type="submit" value="Finish Registration">
                </p>
            </form>
        </section>
    </main>
    <?php include('footer.php'); ?>
</body>
</html>
