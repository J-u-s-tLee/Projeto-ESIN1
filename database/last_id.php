<?php
function get_last_id($prefix, $db_connection) {
    try {
        $stmt = $db_connection->prepare("SELECT MAX(CAST(SUBSTR(identifier, LENGTH(:prefix) + 1) AS INTEGER)) AS last_id FROM Person WHERE identifier LIKE :prefix_pattern");
        $prefix_pattern = $prefix . '%';
        $stmt->bindParam(':prefix', $prefix);
        $stmt->bindParam(':prefix_pattern', $prefix_pattern);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['last_id'] ?? null;

    } catch (PDOException $e) {
        die("Error retrieving last ID: " . htmlspecialchars($e->getMessage()));
    }
}
?>
