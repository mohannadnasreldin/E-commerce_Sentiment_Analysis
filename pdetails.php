<?php 
include("connection.php");
$PID = $_GET['PID'] ? intval($_GET['PID']) : 0;


    $sql = "SELECT * FROM product WHERE PID = $PID LIMIT 1";
    $stmt = mysqli_query($con, $sql);
    
    // $stmt->bindParam(":PID", $PID, PDO::PARAM_INT);
    // $stmt->execute();    
// } catch (Exception $e) {
//     echo "Error " . $e->getMessage();
//     exit();
// }

$product = mysqli_fetch_assoc($stmt);

?>