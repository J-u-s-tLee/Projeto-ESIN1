<?php 
    function getPersonInfo($id) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Person WHERE identifier=?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }
    function getLecture($id) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Lecture WHERE identifier =?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }
    function getWorkshop($id) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Workshop WHERE identifier =?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }
    function getTravelInfo($id) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Travel WHERE travel_id =?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }
    function getHotelInfo($id) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Hotel WHERE reservation_id =?');
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
    function UpdateLecture($id, $title, $description) {
        global $dbh;
        $stmt = $dbh->prepare('UPDATE Lecture
                    SET title = :title, lecture_description = :description
                    WHERE identifier = :user_id');
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
    function UpdateWorkshop($id, $title, $description) {
        global $dbh;
        $stmt = $dbh->prepare('UPDATE Workshop
                    SET title = :title, workshop_description = :description
                    WHERE identifier = :user_id');
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
    function getFullLecture($id) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT 
            L.title, 
            P.name AS speaker_name, 
            PL.room, 
            PL.start_time, 
            A.end_time
        FROM 
            ParticipantLecture PL
        JOIN 
            Lecture L ON PL.room = L.room AND PL.start_time = L.start_time
        JOIN 
            SpeakerLecture SL ON L.identifier = SL.identifier
        JOIN 
            Person P ON SL.identifier = P.identifier
        JOIN 
            Activity A ON L.room = A.room AND L.start_time = A.start_time
        WHERE 
            PL.participant = :userLecture_id');
        $stmt->bindParam(':userLecture_id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
    function getFullWorkshop($id) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT 
        W.title, 
        P.name AS workshop_name, 
        PW.room, 
        PW.start_time, 
        A.end_time,
        W.price
    FROM 
        ParticipantWorkshop PW
    JOIN 
        Workshop W ON PW.room = W.room AND PW.start_time = W.start_time
    JOIN 
        SpeakerWorkshop SW ON W.identifier = SW.identifier
    JOIN 
        Person P ON SW.identifier = P.identifier
    JOIN 
        Activity A ON W.room = A.room AND W.start_time = A.start_time
    WHERE 
        PW.participant = :userWorkshop_id');
        $stmt->bindParam(':userWorkshop_id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
?>