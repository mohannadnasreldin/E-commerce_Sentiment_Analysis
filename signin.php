<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			//read from database
			$query = "select * from User where UserName = '$user_name' limit 1";
			$result = mysqli_query($con, $query);
			$query2 = "select * from Admin where UserName = '$user_name' limit 1";
			$result2 = mysqli_query($con, $query2);

			if($result || $result2)
			{
				if(mysqli_num_rows($result) > 0 )
				{
					$user_data = mysqli_fetch_assoc($result);
				}
				elseif (mysqli_num_rows($result2) > 0) 
				{
					$user_data = mysqli_fetch_assoc($result2);
				}
				else 
				{
					echo "The user name is incorrect "; //=====>>>>> needs style <<<<<<=====\\
					echo "<br>";
				}
				if($user_data['Password'] == $password && mysqli_num_rows($result) > 0 ) // ==> USER
				{
					$_SESSION['user_name'] = $user_data['UserName'];
					header("Location: user.php"); // ==> to USER home page;
					die;
				}
				elseif($user_data['Password'] == $password && mysqli_num_rows($result2) > 0 ) // ==> ADMIN
				{
					$_SESSION['user_name'] = $user_data['UserName'];
					header("Location: admin.php"); // ==> to ADMIN home page;
					die;
				}
				else{
					echo "The password is incorrect"; //=====>>>>> needs style <<<<<<=====\\
				}
			}
		}
		else
		{
			echo "Please fill all fields"; //=====>>>>> needs style <<<<<<=====\\
		}
	}

?>