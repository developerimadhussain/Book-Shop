<!DOCTYPE html>
<html>
<head>
<title> BookShop.com</title>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"src="js/jquery-3.3.1.min.js" ></script>
<script type="text/javascript"src="js/bootstrap.min.js" ></script>
</head>
<body>
<div class="conainer">

<nav class="navbar navbar-expand-lg navbar-light bg-light">    
  <a href="#" id="link_title">BookShop.com</a> 
  <a class="navbar-brand" href="user.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
	<?php  session_start();
      $un=$_SESSION['unm'];
     if(isset($_SESSION['status'])&& $_SESSION['unm']=="admin02@gmail.com")
				{
     echo ' <li class="nav-item">
        <a class="nav-link" href="admin_category.php">Category</a>
      </li>';
	  echo ' <li class="nav-item">
        <a class="nav-link" href="admin_books.php">Books</a>
      </li>';
	  echo ' <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>';
	  echo ' <li class="nav-item">
        <a class="nav-link" href="webdemo.php">Logout</a>
      </li>';
	  echo ' <li class="nav-item">
        <a class="nav-link" href="#">';echo "Hi ";
		echo  $un;
		echo'</a>
      </li>';
				}
				
				
				?> 
	
     
    </ul>
	
    <form class="form-inline my-2 my-lg-0" method="POST" action="book_search_user.php" > 
      <input class="form-control mr-sm-2" type="search" id="search" name="search"  placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"  value="search" >Search</button>
    </form>
  </div>
</nav>
</div>
		
<div class="contentsection temp clear" id="content">



				<form id ="form2" class="form-inline my-2 my-lg-0" action='add_category.php' method='POST'>
				<b id="b">ADD CATEGORY:</b>
							
							
							
      <input class="form-control mr-sm-2" type="search" name= 'cat'>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value='  ADD  '>ADD</button>
    </form>
				
			<div id="message2">
				
			<?php
											if(isset($_GET['error']))
											{
												echo '<font color="red">'.$_GET['error'].'</font>';
												echo '<br><br>';
											}
											
											if(isset($_GET['admin_category']))
											{
												echo '<font color="blue">Category add successfully..</font>';
												echo '<br><br>';
											}
											if(isset($_GET['del']))
											{
												echo '<font color="blue">Category delete successfully..</font>';
												echo '<br><br>';
											}
										
										?>	
				</div>
				
				
				<table  id="table2" border='1' WIDTH='100%'>
						
				
				<td id="td"><b><u>SR.NO</u></b></td>
				<TD id="td" ><b><u>CATEGORY</u></b></TD>				
				<TD id="td" ><b><u>DELETE</u></b></TD>				
               			
						</tr>
						<?php
						require('database/Db_Connection.php');

	                     $q="select * from category";
	                     $res=mysqli_query($conn,$q) or die("Can't Execute Query...");
							$count=1;
							while($row=mysqli_fetch_assoc($res))
							{
								$cat_nm=$row['cat_nm'];
							echo '<tr id="tr">
										<td id="td">'.$count.'										
										<td id="td">'.$row['cat_nm'];
										
										
								
								         echo 	'<td><img id="image" src="images/drop.png"<input type="button" onclick="show_confirm('.$row['cat_id'].')" > 
										        
												
									
									</tr>';
									$count++;
							}
						?>

					</TABLE>
				
			
				
				
		<br>
<br>
<br>		
							
</div>



<div class="fotersection temp clear">
<div class="conainer">
  
 <p>(c) 2018 <a class="navbar-brand" href="user.php" >BookShop.com</a> Design by Athik Hasan Imad</p>
 
  </div>
</nav>
</div>	
<script type="text/JavaScript" language="JavaScript">

 function show_confirm($id){
var c=confirm("Do you want to delete this book");
if(c==true)
{
window.location.href='del_category.php?&id='+$id+'';

}

}

</script>
</body>
</html>