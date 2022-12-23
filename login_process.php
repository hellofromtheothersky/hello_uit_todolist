<?php
  /*Database Connection*/
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'hellouit_todolist';
  Global $dbconfig;
  $dbconfig = mysqli_connect($host,$username,$password,$database) or die("An Error occured while connecting to the database");
?>
<?php 
	#ACT LIKE CONTROLLER
	session_start();
	if(!isset($_SESSION['user_id']))
	{
		if (isset($_POST['login']))
		{
			$my_username = $_POST['my_username']; 
			$my_password = $_POST['my_password'];
			$result=mysqli_query($dbconfig,"SELECT * FROM users WHERE username ='$my_username' and password = '$my_password'");
			if(!$result || mysqli_num_rows($result) == 0) 
				#header('location: login.php');
				echo "Tên user hoặc mật khẩu sai";
			else
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$_SESSION['user_name']=$row['username'];
					$_SESSION['user_email']=$row['email'];
					$_SESSION['user_id']=$row['user_id'];
				}
				header('location: home_process.php?load_init=1');
			}
		}
		else
			#header('location: login.php');
			include 'login.php';
	}
	else
	{
		header('location: home_process.php?load_init=1');
	}