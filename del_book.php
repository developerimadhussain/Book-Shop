<?php
require('database/Db_Connection.php');
	

			$b_id=$_GET['b_id'];
			
			$query="delete from book where id ='$b_id'";
		
			mysqli_query($conn,$query) or die("can't Execute...");
			
			
			header("location:admin_books.php?del=1");
		
	

?>
	
	