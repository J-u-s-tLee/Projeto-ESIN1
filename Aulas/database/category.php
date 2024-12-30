<?php
  function getAllCategories() {
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM Category');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getCategoryById($id) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT name FROM Category WHERE id=?');
    $stmt->execute(array($id));
    return $stmt->fetch();
  }
?>