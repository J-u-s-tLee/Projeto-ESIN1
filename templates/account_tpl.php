<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Levarage From Learning</title>    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/accountstyle.css" rel="stylesheet">
    </head>
    <body>
        <main>
        <?php include('banner.php') ?>
            <div class='details'>
                <div class="profile-picture">
                <?php 
                    $profile_picture = $userInfo['photo'] ? $userInfo['photo'] : 'default.png';
                ?>
                <img src="../Images/<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture" class="profile-picture">
                <form action="../view/list_editprofile.php" method="POST"> 
                    <button type="submit" name="edit_profile" class="edit-button">Edit Profile</button>
                </form>
                </div>
                <div class="ID">
                    <p><strong>ID:</strong> <?php echo htmlspecialchars($userInfo['identifier']); ?></p>
                </div>
                <div class="name">
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($userInfo['name']); ?></p>
                </div>
                <div class="age">
                    <p><strong>Age:</strong> <?php echo htmlspecialchars($userInfo['age']); ?></p>
                </div>
                <div class="food_restrictions">
                    <p><strong>Food Restrictions:</strong> <?php echo htmlspecialchars($userInfo['food_restrictions']); ?></p>
                </div>
                <div class="description">
                    <p><strong>Description:</strong> <?php echo htmlspecialchars($userInfo['job_description']); ?></p>
                </div>
                <?php if ($isSpeakerLecture || $isSpeakerWorkshop) {
                        $speakerData = $isSpeakerLecture ? $speakerLecture : $speakerWorkshop;?>
                    <div class="nationality">
                        <p><strong>Nationality:</strong> <?php echo htmlspecialchars($speakerData['nationality']); ?></p>
                    </div>
                    <div class="residence">
                        <p><strong>Place of Residence:</strong> <?php echo htmlspecialchars($speakerData['place_residence']); ?></p>
                    </div>
                <?php } ?>
            </div>
            <hr class="divisoria"></hr>
            <?php if ($isParticipant) { ?>
                <div class="lecture-workshop-grid">
                    <?php
                    $max_rows = max(count($userLectures), count($userWorkshops));
                    $lectureIndex = 0;
                    $workshopIndex = 0;
                    ?> 
                    <h1 class="title-lecture">Lectures</h1>
                    <h1 class="title-workshop">Workshops</h1>
                    <?php
                    for ($i = 0; $i < $max_rows; $i++) {
                        if ($lectureIndex < count($userLectures)) {
                            $lecture = $userLectures[$lectureIndex];
                            $start_date = new DateTime($lecture['start_time']);
                            $start_time = $start_date->format('H:i');
                            $end_date = new DateTime($lecture['end_time']);
                            $end_time = $end_date->format('H:i');
                            echo "<div class='lecture-item'>
                                    <p><strong>" . htmlspecialchars($lecture['title']) . "</strong></p>
                                    <p>by " . htmlspecialchars($lecture['speaker_name']) . "</p>
                                    <p><strong>Room:</strong> " . htmlspecialchars($lecture['room']) . " | <strong>Duration:</strong> " . htmlspecialchars($start_time) . 
                                    " - " . htmlspecialchars($end_time) . "</p>
                                </div>";
                            $lectureIndex++;
                        }
                        if ($workshopIndex < count($userWorkshops)) {
                            $workshop = $userWorkshops[$workshopIndex];
                            $start_date = new DateTime($workshop['start_time']);
                            $start_time = $start_date->format('H:i');
                            $end_date = new DateTime($workshop['end_time']);
                            $end_time = $end_date->format('H:i');

                            echo "<div class='workshop-item'>
                                    <p><strong>" . htmlspecialchars($workshop['title']) . "</strong></p>
                                    <p>by " . htmlspecialchars($workshop['workshop_name']) . "</p>
                                    <p><strong>Room:</strong> " . htmlspecialchars($workshop['room']) . " | <strong>Price:</strong> " . htmlspecialchars($workshop['price']) . "€ | <strong>Duration:</strong> " . htmlspecialchars($start_time) . 
                                    " - " . htmlspecialchars($end_time) . "</p>
                                </div>";
                            $workshopIndex++;
                        }
                    }?>
                </div>
        
            <?php }?>
                <?php if ($isSpeakerLecture) {
                    echo "<div class='speaker-information'>";
                        $departure_date = new DateTime($travelInfo['departure_time']);
                        $departure_time = $departure_date->format('d/m/Y - H:i');
                        $arrival_date = new DateTime($travelInfo['arrival_time']);
                        $arrival_time = $arrival_date->format('d/m/Y - H:i');
                        echo "<div class='lecture'>
                            <h1>Lecture</h1>";
                            echo"
                            <form action='../actions/action_updatelecture.php' method='POST'>
                                <label for='title'><strong>Title:</strong></label><br>
                                <input type='text' id='title' name='title' value='" . htmlspecialchars($lectureInfo['title'] ?? '') . "' required><br><br>
                                <label for='description'><strong>Description:</strong></label><br>
                                <textarea id='description' name='description' required>" . htmlspecialchars($lectureInfo['lecture_description'] ?? '') . "</textarea><br><br>
                                <button type='submit' name='update_lectures'>Save Lecture</button>
                            </form>";
                        echo"</div>";  
                        echo "<div class='travel'>
                            <h1>Travel Information</h1>
                            <div class='content'>";
                            echo"<p><strong>From:</strong> " . htmlspecialchars($travelInfo['start_location']) . "</p>
                            <p><strong>Departure:</strong> ". htmlspecialchars($departure_time) ."</p>
                            <p><strong>To: </strong>" . htmlspecialchars($travelInfo['end_location']) . "</p>
                            <p><strong>Arrival:</strong> ". htmlspecialchars($arrival_time) ."</p>
                            </div>
                            <div class='picture'>";
                            echo " <img src='../Images/Plane.gif' alt=''>
                            </div>
                        </div>";
                        echo "<div class='hotel'>
                        <h1>Hotel</h1>";
                            echo "<div class='content'>";
                            echo"<p><strong>Name: </strong>" . htmlspecialchars($hotelInfo['name']) . "</p>
                            <p><strong>Address: </strong> ". htmlspecialchars($hotelInfo['address']) ."</p>
                            </div>
                            <div class='picture'>";
                            echo " <img src='../Images/Hotel.gif' alt=''>
                            </div>";
                        echo "</div>
                    </div>";
                } ?>
                <?php if ($isSpeakerWorkshop) {
                    echo "<div class='workshop'>
                        <h1>Workshop</h1>";
                        echo"
                        <form action='../actions/action_updateworkshop.php' method='POST'>
                            <label for='title'><strong>Title:</strong></label><br>
                            <input type='text' id='title' name='title' value='" . htmlspecialchars($workshopInfo['title'] ?? '') . "' required><br><br>
                            <label for='description'><strong>Description:</strong></label><br>
                            <textarea id='description' name='description' required>" . htmlspecialchars($workshopInfo['workshop_description'] ?? '') . "</textarea><br><br>
                            <button type='submit' name='update_workshops'>Save Workshop</button>
                        </form>";
                    echo"</div>";  
                } ?>
            </div>
        </div>
        <div class="button">
        <form action='../actions/action_logout.php' method='POST'>
            <button type='submit' name='logout'>Logout</button>
        </form>
        </div>
        </main>
        <?php include('footer.php') ?>
    </body>
</html>