<section id="categories">
  <h2>Categories</h2>
  <ul>

  <?php if ($error_msg == null) { ?>
    <?php foreach ($categories as $row) { ?>
      <li>
        <a href="list_products.php?cat=<?php echo $row['id']?>">
          <?php echo $row['name']?>
        </a>
      </li>
    <?php } ?>
  <?php } else {
    echo $error_msg;
  } ?>

  </ul>
</section>