<?php
    function getAllWorkshops() {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Workshop');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function getAllSpeakerWorkshop() {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM SpeakerWorkshop');
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
    function getAllParticipantWorkshop() {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM ParticipantWorkshop');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function getRegistrationById($id) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Registration WHERE registration_id=?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }
    function getNumberOfWorkshops() {
        global $dbh;
        $stmt = $dbh->prepare('SELECT COUNT(*) as count FROM Workshop');
        $stmt->execute();
        return $stmt->fetch()['count'];
    }
    function countParticipants($room, $start_time) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT COUNT(*) FROM ParticipantWorkshop WHERE room = :room AND start_time = :start_time');
        $stmt->bindParam(':room', $room, PDO::PARAM_STR);
        $stmt->bindParam(':start_time', $start_time, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count;
    }
    function signUpForWorkshop($user_id, $room, $start_time) {
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO ParticipantWorkshop (participant, room, start_time) VALUES (:participant, :room, :start_time)');
        $stmt->bindParam(':participant', $user_id, PDO::PARAM_STR);
        $stmt->bindParam(':room', $room, PDO::PARAM_STR);
        $stmt->bindParam(':start_time', $start_time, PDO::PARAM_STR);
        $stmt->execute();
    }
?>