<?php 
require("connection.php");
include("inc/db.php");

if ($_POST) {
    $name    = trim($_POST['name']);
    $price   = (float) $_POST['price'];
    $image   = trim($_POST['image']);
    $description = trim($_POST['description']);
    $category = trim($_POST['category']);

    try {
        $sql = 'INSERT INTO product(name, price, image, description, category) 
                VALUES( :name, :price, :image, :description, :category)';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam("category", $category);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: admin.php?status=created");
            exit();
        }
        header("Location: admin.php?status=fail_create");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} 
?>