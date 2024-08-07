<?php
require_once 'db_handeler.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare('DELETE FROM feedback WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    echo 'Feedback deleted successfully!';
}
?>