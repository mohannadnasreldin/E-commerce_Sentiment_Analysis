<?php
$category = $_GET['id'] ? intval($_GET['id']) : 0;

try {
    $sql = "SELECT * FROM product WHERE id = :id LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();    
} catch (Exception $e) {
    echo "Error " . $e->getMessage();
    exit();
}


?>