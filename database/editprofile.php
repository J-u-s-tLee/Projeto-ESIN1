<?php
    function getPersonInfo($id) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Person WHERE identifier=?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }
    function getSpeakerLecture($id) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM SpeakerLecture WHERE identifier =?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }
    function getSpeakerWorkshop($id) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM SpeakerWorkshop WHERE identifier =?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }
    function getPersonPhoto($id) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT photo FROM Person WHERE identifier=?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }
    function UpdatePersonPhoto($id, $target_file) {
        global $dbh;
        $stmt = $dbh->prepare('UPDATE Person SET photo = :profile_picture WHERE identifier = :user_id');
        $stmt->bindParam(':profile_picture', $target_file, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }
    function UpdatePerson($id, $name, $age, $job_description, $food_restrictions) {
        global $dbh;
        $stmt = $dbh->prepare('UPDATE Person
            SET name = :name, age = :age, job_description = :job_description, food_restrictions = :food_restrictions
            WHERE identifier = :user_id');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':job_description', $job_description);
        $stmt->bindParam(':food_restrictions', $food_restrictions);
        $stmt->bindParam(':user_id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    function UpdateSpeakerLecture($id, $nationality, $place_residence) {
        global $dbh;
        $stmt = $dbh->prepare('UPDATE SpeakerLecture 
                SET nationality = :nationality, 
                    place_residence = :place_residence 
                WHERE identifier = :user_id');
        $stmt->bindParam(':nationality', $nationality);
        $stmt->bindParam(':place_residence', $place_residence);
        $stmt->bindParam(':user_id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    function UpdateSpeakerWorkshop($id, $nationality, $place_residence) {
        global $dbh;
        $stmt = $dbh->prepare('UPDATE SpeakerWorkshop 
                SET nationality = :nationality, 
                    place_residence = :place_residence 
                WHERE identifier = :user_id');
        $stmt->bindParam(':nationality', $nationality);
        $stmt->bindParam(':place_residence', $place_residence);
        $stmt->bindParam(':user_id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

?>