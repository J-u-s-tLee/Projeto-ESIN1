<?php
  function insertOrderAndReturnId($username) {
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO Orders (date, username) VALUES(?, ?)');
    $stmt->execute(array(time(), $username));
    return $dbh->lastInsertId();
  }

  function insertOrderProduct($order_id, $prod_id, $quantity) {
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO OrderProduct VALUES(?, ?, ?)');
    $stmt->execute(array($order_id, $prod_id, $quantity));
  }
?>