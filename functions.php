<?php

function check_login($con)
{
	if(isset($_SESSION['user_name']))
	{
		$id = $_SESSION['user_name'];
		$query = "select * from User where UserName = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	//redirect to login
	

	header("Location: login.php");

	die;
	
}

function AddKeyword($keyword,$type){
    $flag=1;
    $conn = new mysqli('localhost','root','','project');
    $select = "SELECT * FROM keyword";
    $resultofselect = mysqli_query($conn,$select);
    while($row = mysqli_fetch_array($resultofselect,MYSQLI_NUM)){
        if($row[1]==$keyword){
            $flag=0;
        }}
    if($flag){
        $sql ="INSERT INTO keyword (word, type) VALUES ('$keyword','$type')";
        mysqli_query($conn, $sql);
        }
}



function DeleteKeyword($word){
    $conn = new mysqli('localhost','root','','project');
    $select = "SELECT * FROM keyword";
    $resultofselect = mysqli_query($conn,$select);
    
    while($row = mysqli_fetch_array($resultofselect,MYSQLI_NUM)){
        if($row[1]==$word){
            $sql = "DELETE FROM keyword WHERE Word='$word'";
            mysqli_query($conn, $sql);
            return;
    }}
    echo "Keyword doesn't exist";
}

function EditKeyword($old,$new,$newtype){

    $conn = new mysqli('localhost','root','','project');

    $query = "select * from keyword where Word = '$old' limit 1";
    $result = mysqli_query($conn, $query);
    $word_data = mysqli_fetch_assoc($result);

    $select = "SELECT * FROM keyword";
    $resultofselect = mysqli_query($conn,$select);

    while($row = mysqli_fetch_array($resultofselect,MYSQLI_NUM)){
        if($row[1]==$old){
                $sql = "UPDATE keyword SET Word='$new',Type='$newtype' WHERE KID='$word_data[KID]'";
                mysqli_query($conn, $sql);
                die;
            }
        }

}

function SentimentAnalysis($comment){
    $score = 0;
    echo $comment;
    $conn = new mysqli('localhost','root','','project');
    
    $select = "SELECT * FROM keyword";
    $resultofselect = mysqli_query($conn,$select);
    
    while ($row = mysqli_fetch_array($resultofselect,MYSQLI_NUM)) {
        if(stripos($comment,$row[1])!==FALSE){
            if($row[2]=="Good"){
                $score++;
            }
            else{
                $score--;
            }
        } 
    }
    
    $insertinReview = "UPDATE review SET Score='$score' WHERE Feedback='$comment'";
    mysqli_query($conn, $insertinReview);
    }

    function OverallRate($PID){

        $conn = new mysqli('localhost','root','','project');
        $overallrate = 0;
        $sum = 0;
        $count = 0;
        $rate = 0;
        
        $select = "SELECT * FROM review";
        $resultofselect = mysqli_query($conn,$select);
        
        while ($row = mysqli_fetch_array($resultofselect,MYSQLI_NUM)) {
            if($row[2]==$PID and $row[4]){
                $rate=($row[4]+10)/2;
                $sum+=$rate;
                $count++; 
            }
        
        }
        
        $overallrate = $sum/$count;
        
        $insertinReview = "UPDATE product SET OverallScore='$overallrate' WHERE PID='$PID'";
        mysqli_query($conn, $insertinReview);
        
        }


// function random_num($length)
// {

// 	$text = "";
// 	if($length < 5)
// 	{
// 		$length = 5;
// 	}

// 	$len = rand(4,$length);

// 	for ($i=0; $i < $len; $i++) { 
// 		# code...

// 		$text .= rand(0,9);
// 	}

// 	return $text;
// }
