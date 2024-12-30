<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule - LFL</title>
    <link rel="stylesheet" href="../CSS/schedulestyle.css">
</head>
<body>
    <main>
    <?php include('banner.php')?>
        <section id="schedule">
            <h2>Schedule</h2>
            <?php foreach ($activities as $activity): ?>
                <?php
                $typeClass = htmlspecialchars($activity['activity_type']);
                ?>
                <?php if(!empty($activity['title'])) { ?>
                    <article class="activity <?php echo $typeClass; ?>">
                        <ul>
                            <li class="time">
                                <span>
                                    <?php 
                                       echo formatTimeRange($activity['start_time'], $activity['end_time']);
                                    ?>
                                </span>
                            </li>
                            <li class="title">
                                <span><?php echo htmlspecialchars($activity['title']); ?></span>
                            </li>
                            <li class="room">
                                <span>Room: <?php echo htmlspecialchars($activity['room']); ?></span>
                            </li>
                        </ul>
                    </article>
                <?php } ?>
            <?php endforeach; ?>
        </section>
    </main>
    <?php include('footer.php')?>
</body>
</html>