<?php session_start();

require('database/Db_Connection.php');
	
	if(!empty($_POST))
	{
		$msg="";
		if(empty($_POST['name']))
			
		{
			$msg.="<li>Name field empty........";
		}
		
		if(empty($_POST['email']))
		{
			$msg.="<li>Email field empty........";
		}
			if(empty($_POST['query']))
		{
			$msg.="<li>Query field empty........";
		}
		
		   if($msg!="")
		{
			 header("location:contact.php?error=".$msg);
		}
		else
		{
			
			
	
			
			$name=$_POST['name'];
			$email=$_POST['email'];
			$query=$_POST['query'];
		    $query1="insert into contact(name,email,query)
			values('$name','$email','$query')";
			
			mysqli_query($conn,$query1) or die($query."Can't Connect to Query...");
			header("location:contact.php?contact=1");
			
		}	
	}
	else
	{
		header("location:contact.php");
	}
			
?>