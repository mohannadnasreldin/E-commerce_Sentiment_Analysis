<?php 
require("inc/db.php");

$PID = $_GET['PID'] ? intval($_GET['PID']) : 0;

if ($_POST) {
    $PID      = (int) $_POST['PID'];
    $Name    = trim($_POST['Name']);
    $Price   = (float) $_POST['Price'];
    $Image   = trim($_POST['Image']);
    $Description = trim($_POST['Description']);
    $Category = trim($_POST['Category']);

    try {
        $sql = 'UPDATE product
                    SET Name = :Name, Price = :Price, Image = :Image, Description = :Description, Categogry = :Category
                WHERE PID = :PID';

        $stmt = $conn->prepare($sql);
       
        if ($stmt->rowCount()) {
            header("Location: admin.php?PID=".$PID."&status=updated");
            exit();
        }
        header("Location: admin.php?PID=".$PID."&status=fail_update");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} 
?>
