<?php
require('database/Db_Connection.php');
	

			$id=$_GET['id'];			
			$query="delete from category where cat_id ='$id' ";	
			mysqli_query($conn,$query) or die("can't Execute...");		
			$query1="select * from category where cat_id ='$id' ";
			$res=mysqli_query($conn,$query1);
	     	$row=mysqli_fetch_assoc($res);
			$cat_nm=$row['cat_nm'];		
			$query2="delete from book where b_cat ='$cat_nm' ";		
			mysqli_query($conn,$query2) or die("can't Execute...");
			header("location:admin_category.php?del=1");
			
?>
	
	