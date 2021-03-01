<?php
	require('database/Db_Connection.php');
	
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['fullname']) || empty($_POST['gender']) || empty($_POST['city'])||empty($_POST['mobile'])||empty($_POST['address']))
		{
			$msg.="<li>Please full fill all requirement";
		}
		
		
		if(is_numeric($_POST['fullname']))
		{
			$msg.="<li>Name must be in String Format...";
		}
		
		if($msg!="")
		{
			header("location:signup.php?error=".$msg);
		}
		else
		{
			$fnm=$_POST['fullname'];		
			$gender=$_POST['gender'];
			$mobile=$_POST['mobile'];
			$city=$_POST['city'];
			$address=$_POST['address'];
			
			
		
			
			
			$query="INSERT INTO `shipping_details`(`name`, `gender`,  `mobile`, `city`, `address`) 
			VALUES('$fnm','$gender','$mobile','$city','$address')";
			
			mysqli_query($conn,$query) or die("Can't Execute Query...");
			header("location:shipping_process2.php?");
		}
	}
	else
	{
		header("location:shipping_details.php");
	}
?>