<?php session_start();

require('database/Db_Connection.php');
	
	if(!empty($_POST))
	{
		$msg="";
		if(empty($_POST['usernm']))
			
		{
			$msg[]="Username field empty";
		}
		
		if(empty($_POST['pwd']))
		{
			$msg[]="Password field empty........";
		}
		
		
		if(!empty($msg))
		{
			echo '<b>Error:-</b><br>';
			
			foreach($msg as $k)
			{
				echo '<li>'.$k;
			}
		}
		else
		{
			
			
	
			
			$unm=$_POST['usernm'];
			
			$q="select * from registration where Email='$unm'";
			
			$res=mysqli_query($conn,$q) or die("wrong query");
			
			$row=mysqli_fetch_assoc($res);
			
			if(!empty($row))
			{
				if($_POST['pwd']==$row['Password'])
				{
					$_SESSION=array();
					$_SESSION['unm']=$row['Email'];
					$_SESSION['uid']=$row['Password'];
					$_SESSION['status']=true;
					
					
						header("location:cart_user.php");
					
					
				}
				
				else
				{
					echo 'Incorrect Password....';
				}
			}
			else
			{
				echo 'Invalid User';
			}
		}
	
	}
	else
	{
		header("location:login1.php");
	}
			
?>