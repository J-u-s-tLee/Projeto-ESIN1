<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Levarage From Learning</title>    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/lecturestyle.css" rel="stylesheet">
    </head>
    <body>
        <main>
        <?php include('banner.php') ?>
        <div class="content">
            <?php 
            $haslectures = false;
            foreach ($Activity as $activity) {   
                foreach ($Lecture as $lecture) { 
                    if($activity['room'] == $lecture['room'] && $activity['start_time'] == $lecture['start_time']){
                        foreach ($SpeakerLecture as $speakerLecture) {
                            if ($speakerLecture['identifier'] == $lecture['identifier']) {
                                $start_date = new DateTime($lecture['start_time']);
                                $start_time = $start_date->format('H:i');
                                $end_date = new DateTime($activity['end_time']);
                                $end_time = $end_date->format('H:i');
                                
                                foreach ($Person as $person) {
                                    if (!empty($lecture['title']) && !empty($lecture['lecture_description'])) {
                                        $haslectures = true;
                                        if ($person['identifier'] == $speakerLecture['identifier']) {
                                            echo "<div class='information'>
                                                <h1 class='title' id='lecture-" . htmlspecialchars($lecture['identifier']) . "'>" . htmlspecialchars($lecture['title']) . "</h1>
                                                <div class='photo'>
                                                    <img src='" .(!empty($person['photo']) ? htmlspecialchars($person['photo']) : "../Images/default.png"). "' alt='Speaker'>
                                                </div>
                                                <div class='description'>
                                                    <p>" . htmlspecialchars($lecture['lecture_description']) . "</p>
                                                    <p>" . htmlspecialchars($person['name']) . "</p>
                                                    <p>" . htmlspecialchars($person['job_description']) . "</p>
                                                    <p>Room: " . htmlspecialchars($lecture['room']) . " | Duration: " . htmlspecialchars($start_time) . " - " . htmlspecialchars($end_time) . "</p>
                                                    <p> Capacity: " . htmlspecialchars($lecture['capacity'] -  countParticipants($lecture['room'], $lecture['start_time'])) . " participants </p>";
                                                    
                                                if (isset($_SESSION['user_id'])) {
                                                    $isAlreadySignedUp = false;
                                                    if($firstLetter == 'P') {
                                                        if($Enrollment['registration_id'] == $_SESSION['user_id']) {
                                                            if (countParticipants($lecture['room'], $lecture['start_time']) < $lecture['capacity']) {
                                                                foreach ($ParticipantLecture as $participantLecture) {
                                                                    if($_SESSION['user_id'] == $participantLecture['participant'] &&
                                                                        $activity['room'] == $participantLecture['room'] &&
                                                                        $activity['start_time'] == $participantLecture['start_time']){
                                                                        $isAlreadySignedUp = true;
                                                                    }
                                                                }
                                                                if ($isAlreadySignedUp) {
                                                                    echo "<p>You are already signed up for this lecture!</p>";
                                                                } else {
                                                                    echo "<form method='POST' action='../actions/action_lectures.php'>
                                                                            <input type='hidden' name='room' value='" . htmlspecialchars($lecture['room']) . "'>
                                                                            <input type='hidden' name='start_time' value='" . htmlspecialchars($lecture['start_time']) . "'>
                                                                            <input type='hidden' name='lecture_id' value='" . htmlspecialchars($lecture['identifier']) . "'>
                                                                            <button type='submit' name='sign_up' value='1'>Sign Up</button>
                                                                        </form>";
                                                                }
                                                            } else {
                                                                echo "<p>This lecture has reached its maximum capacity. Check out other lectures.</p>";
                                                            }
                                                        } else {
                                                            echo "<p>Please enroll to sign up for this lecture.</p>";
                                                        }
                                                    } else {
                                                        echo "<p>As a speaker, you can't sign up.</p>";
                                                    }
                                                } else {
                                                    echo "<p>Please log in to sign up for this lecture.</p>";
                                                }
                                            echo "</div></div>";
                                        }
                                    }
                                }
                            }
                        }
                    }
                } 
            }?>
        </div>
        <?php if(!$haslectures) { echo "<div class='no-lectures'>No Lectures available at the moment!</div>";} ?>
        </main>
        <?php include('footer.php') ?>
    </body>
</html>