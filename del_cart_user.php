<?php session_start();
require('database/Db_Connection.php');
			$id=$_GET['id'];
			$query="delete from cart where b_id='$id'";
			mysqli_query($conn,$query) or die("can't Execute...");
			header("location:cart_user.php?del=1");
			
?>