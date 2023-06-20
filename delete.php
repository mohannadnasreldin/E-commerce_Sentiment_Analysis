<?php 
require("inc/db.php");

if (isset($_GET['PID'])) {
    // Delete record
    try {
        // SQL Statement
        $sql = "DELETE FROM product WHERE PID = :PID LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":PID", $_GET['PID'], PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: admin.php?status=deleted");
            exit();
        }
        header("Location: admin.php?status=fail_delete");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    // Redirect to index.php
    header("Location: admin.php?status=fail_delete");
    exit();
}

?>
