<?php

if(isset($_GET["UserName"])){
    $UserName = $_GET["UserName"];
    $conn = new mysqli('localhost','root','','project');

$sql = "DELETE FROM user WHERE UserName='$UserName'";

if(mysqli_query($conn, $sql)){
    echo "Data Deleted";
}
else{
    echo "Error: ".$sql. "<br>" .$conn->error;
}
}
header("Location: login.php");
                    die;
?>