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
	if (isset($_GET['load_init']))
	{
		$username=$_SESSION['user_name'];
		include 'home.php';
    }

	if (isset($_REQUEST['load_list']))
	{
		$result=mysqli_query($dbconfig,"SELECT * FROM todos");
		include 'todo_list.php';
    }

	if (isset($_GET['insert_description'])) 
	{
		$desc=$_GET['insert_description'];

  		if(mysqli_query($dbconfig,"INSERT INTO todos(todoname) values('$desc')"))
  			$response_array['status']="success";
  		else
  			$response_array['status']="error";
  		header('Content-type: application/json');//preparing correct format for json_encode
    	echo json_encode($response_array);//sending response to ajax
	}

    if (isset($_GET['delete_id'])) 
	{
    	$delete_id=$_GET['delete_id'];
     	if(mysqli_query($dbconfig,"DELETE FROM todos WHERE todo_id=$delete_id"))
        		$response_array['delete_status']="success";
      	else 
			$response_array['delete_status']="error";
		header('Content-type: application/json');//sending response to ajax
		echo json_encode($response_array);
  	}

    if (isset($_GET['edit_id']))
	{
		$edit_id= $_GET['edit_id']; 
		$new_desc= $_GET['new_desc'];
			if(mysqli_query($dbconfig,"UPDATE todos SET todoname='$new_desc' WHERE todo_id=$edit_id")){
			$response_array['edit_status']="success";
			}else {
			$response_array['edit_status']="error";
			}
			header('Content-type: application/json');//sending response to ajax
			echo json_encode($response_array);
    }
 ?>
  

