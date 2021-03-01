<?php session_start();

require('database/Db_Connection.php');

	if(!empty($_POST))
	{
		$msg="";
		if(empty($_POST['cat']))
		{
			$msg.="<li>Please full fill the requirement";
		}
		
		if($msg!="")
		{
          header("location:admin_category.php?error=".$msg);
		}
		else
		{
	
		
			$cat=$_POST['cat'];
			
			$query="insert into category(cat_nm) values('$cat')";
			
			mysqli_query($conn,$query) or die("can't Execute...");
			header("location:admin_category.php?admin_category=1");
		}
	}
	else
	{
		header("location:user.php");
	}
?>
	
	