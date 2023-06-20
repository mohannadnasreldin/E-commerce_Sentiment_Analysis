<?php
include("inc/db.php");
include("connection.php");

$select_category= $_GET['Category'];

if($select_category=='Electronics')
{
    $query = "SELECT * FROM product WHERE Category='Electronics'";
}
elseif($select_category=='Clothes')
{
    $query = "SELECT * FROM product WHERE Category='Clothes'";
}
elseif($select_category=='Food')
{
    $query = "SELECT * FROM product WHERE Category='Food'";
}
Else
{
    $query = "SELECT * FROM products";
}
$sql = mysqli_query($con, $query);

if( $sql ){
    // success! check results
    while( $row = mysqli_fetch_assoc( $sql ) ){
        echo $row['Name']."<br/>";

    }
    }
    else{
    echo "error";
    }
?>