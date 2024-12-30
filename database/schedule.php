<?php
function getSchedule($dbh) {
    $query = "
        SELECT 
        Activity.room,
        Activity.start_time,
        Activity.end_time,
        COALESCE(Lecture.title, Workshop.title, 'Coffee Break') AS title,
        CASE 
            WHEN Workshop.title IS NOT NULL THEN 'workshop'
            WHEN Lecture.title IS NOT NULL THEN 'lecture'
            ELSE 'coffee-break'
        END AS activity_type
    FROM Activity
    LEFT JOIN Lecture 
        ON Activity.room = Lecture.room 
        AND Activity.start_time = Lecture.start_time 
        AND Lecture.title IS NOT NULL
    LEFT JOIN Workshop 
        ON Activity.room = Workshop.room 
        AND Activity.start_time = Workshop.start_time 
        AND Workshop.title IS NOT NULL
    LEFT JOIN CoffeeBreak 
        ON Activity.room = CoffeeBreak.room 
        AND Activity.start_time = CoffeeBreak.start_time
    WHERE 
        Lecture.title IS NOT NULL 
        OR Workshop.title IS NOT NULL 
        OR CoffeeBreak.room IS NOT NULL
    ORDER BY Activity.start_time;
    ";
    return $dbh->query($query)->fetchAll(PDO::FETCH_ASSOC);
}

function formatTimeRange($start_time, $end_time) {
    $start = date('H:i', strtotime($start_time));
    $end = date('H:i', strtotime($end_time));
    return "$start to $end";
}
?>

