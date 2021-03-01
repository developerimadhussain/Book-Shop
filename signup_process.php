<?php
	require('database/Db_Connection.php');
	
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['fullname']) || empty($_POST['gender']) || empty($_POST['pwd']) || empty($_POST['email'])|| empty($_POST['city'])||empty($_POST['mobile'])||empty($_POST['address']))
		{
			$msg.="<li>Please full fill all requirement";
		}
		
		
		
		if(strlen($_POST['pwd'])>15)
		{
			$msg.="<li>Please Enter Your Password in limited Format....";
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
			$pwd=$_POST['pwd'];
			$gender=$_POST['gender'];
			$email=$_POST['email'];
			$mobile=$_POST['mobile'];
			$city=$_POST['city'];
			$address=$_POST['address'];
			
			
		
			
			
			$query="INSERT INTO `registration`(`FullName`,`Password`, `Gender`, `Email`, `Mobile`, `City`, `Address`) 
			VALUES('$fnm','$pwd','$gender','$email','$mobile','$city','$address')";
			
			mysqli_query($conn,$query) or die("Can't Execute Query...");
			header("location:signup.php?signup=1");
		}
	}
	else
	{
		header("location:webdemo.php");
	}
?>