<?php
  /*Database Connection*/
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'hellouit_todolist';
  Global $dbconfig;
  $dbconfig = mysqli_connect($host,$username,$password,$database) or die("An Error occured while connecting to the database");

  $result=mysqli_query($dbconfig,"SELECT * FROM todos");
    $todo_result=mysqli_fetch_assoc($result);
	#include 'todo_list.php';
	while($res = mysqli_fetch_assoc($result))
	{
		echo $res['todoname'];
	}
?>