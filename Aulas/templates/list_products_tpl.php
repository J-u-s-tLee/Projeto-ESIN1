<section id="products">
  <h2><a href="list_categories.php">Categories</a> &gt; <?php echo $category['name'] ?> Products</h2>
  
  <form id="search" action="list_products.php">
    <input type="hidden" name="cat" value="<?php echo $cat_id ?>">
    <input type="text" name="search_name" placeholder="product name" value="<?php echo $search_name ?>">
    <input type="number" name="search_min" placeholder="min price" value="<?php echo $search_min ?>">
    <input type="number" name="search_max" placeholder="max price" value="<?php echo $search_max ?>">
    <button>Search</button>
    <a href="list_products.php?cat=<?php echo $cat_id ?>">Clear</a>
  </form>
  
  <div class="list">

    <?php if ($error_msg == null) { ?>
      <?php foreach ($products as $row) { ?>
        <article>
          <h3><?php echo $row['name'] ?></h3>
          <img src="images/products/<?php echo $row['id'] ?>.png" alt="">
          <span class="price"><?php echo $row['price'] ?></span>
        
          <form action="action_add_to_cart.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']?>">
            <input type="hidden" name="name" value="<?php echo $row['name']?>">
            <input type="hidden" name="price" value="<?php echo $row['price']?>">
            <input type="number" value="1" min="1" name="quantity">
            <button>Add to cart</button>
          </form>
        </article>
      <?php } ?>
    <?php } else {
      echo $error_msg;
    } ?>

  </div>

  <?php if (!isset($search_name) && !isset($search_min) && !isset($search_max)) { ?>
    <div id="pagination">
      <a href="list_products.php?cat=<?php echo $cat_id ?>&page_num=<?php echo $page_num-1 ?>">&lt;</a>
        <?php echo $page_num ?>
      <a href="list_products.php?cat=<?php echo $cat_id ?>&page_num=<?php echo $page_num+1 ?>">&gt;</a>
    </div>
  <?php } ?>

</section>