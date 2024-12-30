<?php 
    function getAllLectures() {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Lecture');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function getAllSpeakerLecture() {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM SpeakerLecture');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function getAllPerson() {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Person');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function getAllActivity() {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Activity');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function getAllParticipantLecture() {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM ParticipantLecture');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function getRegistrationById($id) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Registration WHERE registration_id=?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }
    function getNumberOfLectures() {
        global $dbh;
        $stmt = $dbh->prepare('SELECT COUNT(*) as count FROM Lecture');
        $stmt->execute();
        return $stmt->fetch()['count'];
    }
    function countParticipants($room, $start_time) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT COUNT(*) FROM ParticipantLecture WHERE room =? AND start_time =?');
        $stmt->execute(array($room, $start_time));
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    function signUpForLecture($user_id, $room, $start_time) {
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO ParticipantLecture (participant, room, start_time) VALUES (:participant, :room, :start_time)');
        $stmt->bindParam(':participant', $user_id, PDO::PARAM_STR);
        $stmt->bindParam(':room', $room, PDO::PARAM_STR);
        $stmt->bindParam(':start_time', $start_time, PDO::PARAM_STR);
        $stmt->execute();
    }
?>