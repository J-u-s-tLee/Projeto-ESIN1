<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Levarage From Learning</title>    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/indexstyle.css" rel="stylesheet">
    </head>
    <body>
      <main>
          <?php include('banner.php') ?>
          <section id="description">
            <h1><strong>What is Leverage From Learning about?</strong></h1>
            <section id="text">
             <p>Leverage From Learning is a dynamic event designed to inspire growth, ignite curiosity, and foster connections. Featuring an exciting lineup of engaging Lectures, hands-on Workshops, and thought-provoking discussions led by international Speakers, this event offers a unique opportunity to expand your knowledge and skills.</p>
             <p>Beyond learning, enjoy delicious food and network with like-minded individuals in a vibrant and inclusive atmosphere. Whether you're seeking personal development or professional insights, Leverage from Learning is the perfect space to elevate your potential. Join us for a memorable experience that blends education, inspiration, and community!</p>
            </section>
          </section>
          <section id="content">
              <section id="lectures">
                <img src="../Images/Lectures-01.png" alt="">
                <p>Lectures</p>
              </section>
              <section id="workshops">
                <img src="../Images/Lectures-02.png" alt="">
                <p>Workshops</p>
              </section>
              <section id="coffeebreaks">
                <img src="../Images/Lectures-03.png" alt="">
                <p>Coffee Breaks</p>
              </section>
          </section>
        </main>
          <?php include('footer.php') ?>
    </body>
  </html>