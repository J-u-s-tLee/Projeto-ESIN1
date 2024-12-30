<?php
try {
    $stmt = $dbh->prepare("SELECT 1 FROM Person WHERE identifier = :speaker_identifier LIMIT 1");
    $stmt->bindParam(':speaker_identifier', $speaker_identifier);
    $stmt->execute();

    if (!$stmt->fetch()) {
        $error_message = "The provided Speaker ID does not exist. Please check and try again.";
    }
} catch (PDOException $e) {
    die("Error checking Speaker ID: " . htmlspecialchars($e->getMessage()));
}

if (empty($error_message)) {
    $prefix_valid = (strpos($speaker_identifier, 'L') === 0 && $speaker_type === 'lecture') ||
                    (strpos($speaker_identifier, 'W') === 0 && $speaker_type === 'workshop');

    if (!$prefix_valid) {
        $error_message = "The Speaker ID does not match the selected type.";
    }
}

if (empty($error_message)) {
    try {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $dbh->prepare("
            UPDATE Person 
            SET 
                name = :name,
                age = :age,
                job_description = :job_description,
                food_restrictions = :food_restrictions, 
                password = :password 
            WHERE identifier = :speaker_identifier
        ");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':job_description', $job_description);
        $stmt->bindParam(':food_restrictions', $food_restrictions);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':speaker_identifier', $speaker_identifier);
        $stmt->execute();

        if ($speaker_type === 'lecture') {
            $stmt = $dbh->prepare("
                UPDATE SpeakerLecture 
                SET nationality = :nationality,
                    place_residence = :place_residence
                WHERE identifier = :speaker_identifier
            ");
        } else {
            $stmt = $dbh->prepare("
                UPDATE SpeakerWorkshop 
                SET nationality = :nationality,
                    place_residence = :place_residence 
                WHERE identifier = :speaker_identifier
            ");
        }
        $stmt->bindParam(':speaker_identifier', $speaker_identifier);
        $stmt->bindParam(':nationality', $nationality);
        $stmt->bindParam(':place_residence', $place_residence);
        $stmt->execute();

        echo "<link href='../CSS/register_2.css' rel='stylesheet'>";
        echo "<div class='complete'>";
        include('../templates/banner.php');
        echo "<div class='registration-complete'>";
        echo "<h2>Registration complete!</h2>";
        echo "<p>Your ID is: <strong>" .htmlspecialchars($speaker_identifier) . "</strong></p>";
        echo "<p>You will be redirected to the login page in 5 seconds...</p>";
        echo "</div>";
        include ('../templates/footer.php');
        echo "</div>";
        echo '<meta http-equiv="refresh" content=5;url=../view/list_login.php>';
        exit();
    } catch (PDOException $e) {
        die("Error updating speaker data: " . htmlspecialchars($e->getMessage()));
    }
}
?>
