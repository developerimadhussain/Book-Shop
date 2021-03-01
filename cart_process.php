<?php session_start();
require('database/Db_Connection.php');
			$id=$_GET['id'];
            $redirect=$_GET['redirect'];			
            $search=$_GET['search'];			
			$query="insert into cart (b_id,quantity) values('$id',1)";
			if($redirect=="detail.php"){
			mysqli_query($conn,$query) or die(header("location:$redirect?error=1&id=$id"));
			header("location:$redirect?cart=1&id=$id");
			}
			
			else if($redirect=="bookdetail_user.php"){
			mysqli_query($conn,$query) or die(header("location:$redirect?error=1&id=$id"));
			header("location:$redirect?cart=1&id=$id");
			}
			else if($redirect=="book_search_user.php"){
				
				mysqli_query($conn,$query) or die(header("location:$redirect?error=1&search=$search"));
			    header("location:$redirect?cart=1&search=$search");
				
				
			}
			
			else if($redirect=="book_search.php"){
				
				mysqli_query($conn,$query) or die(header("location:$redirect?error=1&search=$search"));
			    header("location:$redirect?cart=1&search=$search");
				
				
			}
			
		    else if($redirect=="category_books.php"){
				 $q="select * from book where id=$id";	
                 $res=mysqli_query($conn,$q) or die("Can't Execute Query..");
	             $row=mysqli_fetch_assoc($res);
			     $cat=$row['b_cat'];				 
			    mysqli_query($conn,$query) or die(header("location:$redirect?error=1&b_cat=$cat"));
				header("location:$redirect?cart=1&b_cat=$cat");
			
			}
			
			
			else if($redirect=="category_books_user.php"){
				 $q="select * from book where id=$id";	
                 $res=mysqli_query($conn,$q) or die("Can't Execute Query..");
	             $row=mysqli_fetch_assoc($res);
			     $cat=$row['b_cat'];				 
			    mysqli_query($conn,$query) or die(header("location:$redirect?error=1&b_cat=$cat"));
				header("location:$redirect?cart=1&b_cat=$cat");
			
			}
			else{
			mysqli_query($conn,$query) or die(header("location:$redirect?error=1"));
			header("location:$redirect?cart=1");
			}
		
		
			
			
?>
	
	