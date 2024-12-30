<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Breaks - LFL</title>
    <link rel="stylesheet" href="../CSS/coffeebreakstyle.css">
</head>
<body>
    <?php include('banner.php')?>
    <main>
        <section id="coffeebreaks">
            <h2>Coffee Breaks: Schedules and Menus</h2>
            <?php $counter = 1; ?>
            <?php foreach ($coffeeBreaks as $coffeeBreak): ?>
            <article class="coffee-break">
                <div class="coffee-break-info">
                    <h3><?php echo "Coffee Break " . $counter; ?></h3>
                    <?php  
                        $start_date = new DateTime($coffeeBreak['start_time']);
                        $start_time = $start_date->format('H:i');
                        $end_date = new DateTime($coffeeBreak['end_time']);
                        $end_time = $end_date->format('H:i');
                    ?>
                    <p>
                        From <strong><?php echo($start_time); ?></strong> to <strong><?php echo htmlspecialchars($end_time);?></strong> at <strong><?php echo($coffeeBreak['room']); ?></strong>
                    </p>
                </div>

                <div class="menu-options">
                    <div class="menu-card">
                        <img src="../Images/food.png" alt="Meat option" />
                        <h4>No Restrictions</h4>
                        <p> <?php echo formatMenuList($coffeeBreak['meat']); ?></p> 
                    </div>
                    <div class="menu-card">
                        <img src="../Images/vegetarian.png" alt="Vegetarian option" />
                        <h4>Vegetarian</h4>
                        <p><?php echo formatMenuList($coffeeBreak['veggie']); ?></p> 
                    </div>
                    <div class="menu-card">
                        <img src="../Images/vegan.png" alt="Vegan option" />
                        <h4>Vegan</h4>
                        <p><?php echo formatMenuList($coffeeBreak['vegan']); ?></p>
                    </div>
                    <div class="menu-card">
                        <img src="../Images/gluten_free.png" alt="Gluten Free option" />
                        <h4>Gluten Free</h4>
                        <p><?php echo formatMenuList($coffeeBreak['gluten_free']); ?></p>
                    </div>
                </div>
            </article>
            <?php $counter++;
            endforeach; ?>
        </section>
    </main>
    <?php include('footer.php')?>
</body>
</html>