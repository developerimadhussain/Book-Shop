<?php
require('database/Db_Connection.php');
	

			 $id=$_GET['id'];
			
			$query="delete from contact where id ='$id'";
		
			mysqli_query($conn,$query) or die("can't Execute...");
						
			header("location:admin_contact.php?del=1");
			
		
	

?>
	