<?php
require_once 'init.php';
require_once '../actions/action_generate_id.php';

if ($password !== $password_confirm) {
    $error_message = "Passwords do not match. Please try again!";
} else {
    if ($is_speaker === 'yes') {
        require 'speaker_registration.php';
    } else {
        try {
            $new_id = generate_sequential_id('P', $dbh);
            $_SESSION['participant_id'] = $new_id;

            $stmt = $dbh->prepare("
                INSERT INTO Person (identifier, name, age, job_description, food_restrictions, password) 
                VALUES (:identifier, :name, :age, :job_description, :food_restrictions, :password)
            ");
            $hashed_password = password_hash($password, PASSWORD_BCRYPT); 
            $stmt->bindParam(':identifier', $new_id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':job_description', $job_description);
            $stmt->bindParam(':food_restrictions', $food_restrictions);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->execute();

            echo "<link href='../CSS/register_2.css' rel='stylesheet'>";
            echo "<div class='complete'>";
            include('../templates/banner.php');
            echo "<div class='registration-complete'>";
            echo "<h2>Registration complete!</h2>";
            echo "<p>Your ID is: <strong>" .htmlspecialchars($new_id) . "</strong></p>";
            echo "<p>You will be redirected to the login page in 5 seconds...</p>";
            echo "</div>";
            include ('../templates/footer.php');
            echo "</div>";
            echo '<meta http-equiv="refresh" content=5;url=../view/list_login.php>';
            exit();
        } catch (PDOException $e) {
            die("Error registering data: " . htmlspecialchars($e->getMessage()));
        }
    }
}
?>
