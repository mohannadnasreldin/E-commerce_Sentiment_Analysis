<?php 
session_start();

	require("connection.php");
	//require("functions.php");	


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{	 
				//something was posted
				$user_name = $_POST['user_name'];
				$name = $_POST['name'];
				$email = $_POST['email'];
				$age = $_POST['age'];
				$password = $_POST['password'];

				if(!empty($user_name) && !empty($password) && !empty($name) && !empty($email) && !empty($age) && !is_numeric($user_name))
				{
					$query2 = "select * from User where UserName = '$user_name' ";
					$result2 = mysqli_query($con, $query2);
					if (mysqli_num_rows($result2) ==0)
					{
					//save to database
					$query = "insert into User (UserName,Name,Email,Age,Password) values ('$user_name','$name','$email','$age','$password')";
					mysqli_query($con, $query);
					header("Location: login.php");
					die;	
					}
					else
					{
						echo "You already have an account. Try to login!"; //=====>>>>> needs style <<<<<<=====\\
					}
				}
				else
				{
					echo "Please fill in all fields!"; //=====>>>>> needs style <<<<<<=====\\
				}
			
	} 
?>
