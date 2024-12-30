<?php
  function getProductsByCategoryId($id, $page_num) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM Product WHERE cat_id=? LIMIT ? OFFSET ?');
    $stmt->execute(array($id, 2, ($page_num-1)*2));
    return $stmt->fetchAll();
  }

  function getNumberOfProductsByCategoryId($id) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT COUNT(*) AS count FROM Product WHERE cat_id=?');
    $stmt->execute(array($id));
    return $stmt->fetch()['count'];
  }

  function getProductsBySearch($cat_id, $search_name, $search_min, $search_max) {
    global $dbh;

    $query = 'SELECT * FROM product WHERE cat_id = ?';
    $params = array($cat_id);

    if ($search_name != '') {
      $query = $query . ' AND name LIKE ?';
      $params[] = "%$search_name%";
    }
  
    if ($search_min != '') {
      $query = $query . ' AND price >= ?';
      $params[] = $search_min;
    }
  
    if ($search_max != '') {
      $query = $query . ' AND price <= ?';
      $params[] = $search_max;
    }

    $stmt = $dbh->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll();
  }
?>