<?php
require('database/Db_Connection.php');

	if(!empty($_POST))
	{
		$msg="";
		if(empty($_POST['name']) || empty($_POST['author']) || empty($_POST['publisher'])|| empty($_POST['edition']) || empty($_POST['isbn']) || empty($_POST['language']) || empty($_POST['price']))
		{
			$msg.="<li>Please full fill the requirement";
		}
		if(!(is_numeric($_POST['price'])))
		{
			$msg.="<li>Price must be in Numeric  Format...";
		}
		
		if(empty($_FILES['img']['name']))
		$msg.="<li>Please provide a file";
	
		if($_FILES['img']['error']>0)
		$msg.="<li>Error uploading file";
		
				
		if(!(strtoupper(substr($_FILES['img']['name'],-4))==".JPG" || strtoupper(substr($_FILES['img']['name'],-5))==".JPEG"|| strtoupper(substr($_FILES['img']['name'],-4))==".GIF"))
			$msg.="<li>wrong file  type";
			
		if(file_exists("../upload_image/".$_FILES['img']['name']))
			$msg.="<li>File already uploaded. Please do not updated with same name";
		

	      if($msg!="")
		{
			 header("location:admin_addbooks.php?error=".$msg);
		}
		else
		{
			move_uploaded_file($_FILES['img']['name'],"../upload_image/".$_FILES['img']['name']);
			$b_img = "upload_image/".$_FILES['img']['name'];	
			$b_title=$_POST['name'];
			$b_cat=$_POST['category'];
			$b_author=$_POST['author'];
			$b_publisher=$_POST['publisher'];
            $b_edition=$_POST['edition'];			
			$b_isbn=$_POST['isbn'];
			$b_language=$_POST['language'];
			$b_price=$_POST['price'];
		    echo $b_id=$_GET['b_id'];
			
		     $msg.="<li>Edit Succesfuly ....";
			
			$query=" Update book set b_title='$b_title',b_cat='$b_cat',b_author='$b_author',b_publisher='$b_publisher',b_edition='$b_edition',b_isbn='$b_isbn',b_language='$b_language',b_price='$b_price',b_img='$b_img' where id='$b_id'";
			
			mysqli_query($conn,$query) or die($query."Can't Connect to Query...");
			header("location:admin_books.php?update=".$msg);
		
		}
	}
	else
	{
		header("location:user.php");
	}
?>
	
	