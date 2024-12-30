<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Levarage From Learning</title>    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/workshopstyle.css" rel="stylesheet">
    </head>
    <body>
        <main>
        <?php include('banner.php') ?>
        <section id="workshops">
            <?php
            foreach ($Activity as $activity) {   
                foreach ($Workshop as $workshop) {  
                    if($activity['room'] == $workshop['room'] && $activity['start_time'] == $workshop['start_time']){
                        foreach ($SpeakerWorkshop as $speakerWorkshop) {
                            if ($speakerWorkshop['identifier'] == $workshop['identifier']) {
                                $start_date = new DateTime($workshop['start_time']);
                                $start_time = $start_date->format('H:i');
                                $end_date = new DateTime($activity['end_time']);
                                $end_time = $end_date->format('H:i');
                                
                                foreach ($Person as $person) {
                                    if (!empty($workshop['title']) && !empty($workshop['workshop_description'])) {
                                        $hasworkshops = true;
                                        if ($person['identifier'] == $speakerWorkshop['identifier']) {
                                            echo "<div class='Workshop'>
                                                <h1 class='title' id='workshop-" . htmlspecialchars($workshop['identifier']) . "'>" . htmlspecialchars($workshop['title']) . "</h1>
                                                <div class='infos'>
                                                    <h2>From " . htmlspecialchars($start_time) . " to " . htmlspecialchars($end_time) . " at " . htmlspecialchars($workshop['room']) .  
                                                    " | Instructor: " . htmlspecialchars($person['name']) . "</p>
                                                        <h3> Capacity: " . htmlspecialchars($workshop['capacity'] -  countParticipants($pdo, $workshop['room'], $workshop['start_time'])) . " participants 
                                                        | Price: " . htmlspecialchars($workshop['price']) . "€ </h4>    
                                                </div>
                                                <div class='description'>
                                                    <p>" . htmlspecialchars($workshop['workshop_description']) . "</p>";
                                                    if (isset($_SESSION['user_id'])) {
                                                        $isAlreadySignedUp = false;
                                                        if($firstLetter == 'P') {
                                                            if($Enrollment['registration_id'] == $_SESSION['user_id']) {
                                                                if (countParticipants($pdo, $workshop['room'], $workshop['start_time']) < $workshop['capacity']) {
                                                                    foreach ($ParticipantWorkshop as $participantWorkshop) {
                                                                        if($_SESSION['user_id'] == $participantWorkshop['participant'] &&
                                                                        $activity['room'] == $participantWorkshop['room'] &&
                                                                        $activity['start_time'] == $participantWorkshop['start_time']){
                                                                            $isAlreadySignedUp = true;
                                                                        }
                                                                    }
                                                                    if ($isAlreadySignedUp) { //Alterar aqui
                                                                        echo "<p>You are already signed up for this workshop!</p>";
                                                                    } else {
                                                                        echo "<form method='POST'>
                                                                                <input type='hidden' name='room' value='" . htmlspecialchars($workshop['room']) . "'>
                                                                                <input type='hidden' name='start_time' value='" . htmlspecialchars($workshop['start_time']) . "'>
                                                                                <input type='hidden' name='workshop_id' value='" . htmlspecialchars($workshop['identifier']) . "'>
                                                                                <button type='submit' name='sign_up' value='1'>Sign Up</button>
                                                                            </form>";
                                                                    }
                                                                } else {
                                                                    echo "<p>This workshop has reached its maximum capacity. Check out other workshops.</p>";
                                                                }
                                                            } else {
                                                                echo "<p>Please enroll to sign up for this workshop.</p>";
                                                            }
                                                        } else {
                                                            echo "<p>As a speaker, you can't sign up.</p>";
                                                        }
                                                    } else {
                                                        echo "<p>Please log in to sign up for this workshop.</p>";
                                                    }
                                                echo "</div>";
                                            echo "</div>";
                                        }
                                    }
                                }
                            }
                        }
                    }
                } 
            }?>
            <?php if(!$hasworkshops) { echo "<div class='no-lectures'>No Workshops available at the moment!</div>";} ?>
        </main>
            <?php include('footer.php') ?>
    </body>
</html>