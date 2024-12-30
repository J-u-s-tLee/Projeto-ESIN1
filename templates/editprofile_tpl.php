<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Levarage From Learning</title>    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/editprofilestyle.css" rel="stylesheet">

    </head>
    <body>
        <main>
        <?php include('banner.php') ?>
            <div class='details'>
                <div class="profile-picture">
                    <?php 
                        $profile_picture = $userInfo['photo'] ? $userInfo['photo'] : 'default.png';
                    ?>
                    <img src="../Images/<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture">
                    <form action="../actions/action_uploadpicture.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="profile_picture" class="upload-input" accept="image/*"><br>
                        <button type="submit" name="upload_picture">Upload</button>
                    </form>
                </div> 
                <form action="../actions/action_savechanges.php" method="POST">
                    <div class="Information">
                        <h1>Personal Information</h1>
                        <label class="name" ><strong>Name: </strong> <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($userInfo['name']); ?>" required></label>
                        <label class ="age"><strong>Age:</strong> <input type="number" name="age" id="age" value="<?php echo htmlspecialchars($userInfo['age']); ?>"required min="1"></label>
                        <label class="description"><strong>Description</strong>
                            <textarea name="job_description" id="description" required><?php echo htmlspecialchars($userInfo['job_description']); ?></textarea>
                        </label>                        
                        <div class="food_restrictions">
                            <label><strong>Food Restrictions:</strong></label><br>
                            <input type="radio" id="none" name="food_restrictions" value="None" <?php if ($userInfo['food_restrictions'] == 'None') echo 'checked'; ?>; required>
                            <label for="none">None</label><br>
                            <input type="radio" id="vegetarian" name="food_restrictions" value="Vegetarian" <?php if ($userInfo['food_restrictions'] == 'Vegetarian') echo 'checked'; ?>; required>
                            <label for="vegetarian">Vegetarian</label><br>
                            <input type="radio" id="vegan" name="food_restrictions" value="Vegan" <?php if ($userInfo['food_restrictions'] == 'Vegan') echo 'checked'; ?>; required>
                            <label for="vegan">Vegan</label><br>
                            <input type="radio" id="other" name="food_restrictions" value="Other" ; required>
                            <label for="other">Other</label><br>
                        </div>
                    <?php if ($isSpeakerLecture) { ?>
                        <label class="nationality"><strong>Nationality: </strong><input type="text" id="nationality" name="nationality" value="<?php echo htmlspecialchars($LectureInfo['nationality']); ?>"></label>
                        <label class="residence"><strong>Place of Residence: </strong><input type="text" id="residence" name="place_residence" value="<?php echo htmlspecialchars($LectureInfo['place_residence']); ?>"></label>
                    <?php } 
                    if ($isSpeakerWorkshop) { ?>
                        <label class="nationality"><strong>Nationality: </strong><input type="text" id="nationality" name="nationality" value="<?php echo htmlspecialchars($WorkshopInfo['nationality']); ?>"></label>
                        <label class="residence"><strong>Place of Residence: </strong><input type="text" id="residence" name="place_residence" value="<?php echo htmlspecialchars($WorkshopInfo['place_residence']); ?>"></label>
                    <?php } ?>
                    <button type='submit' name='save_changes'>Save Changes</button>
                    </div>
                </form>     
            </div>
        </main>
        <?php include('footer.php') ?>
    </body>
</html>