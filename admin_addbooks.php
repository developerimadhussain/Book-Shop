<?php session_start();
$un=$_SESSION['unm'];
require('database/Db_Connection.php');
?>
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
      <?php  

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


	</br></br>	
	</br></br>	
	</br></br>	
	
<div id="message2">

  <?php
											if(isset($_GET['error']))
											{
												echo '<font color="red">'.$_GET['error'].'</font>';
												echo '<br><br>';
											}
											
											if(isset($_GET['admin_books']))
											{
												echo '<font color="blue">Book Add successfully..</font>';
												echo '<br><br>';
											}
												if(isset($_GET['del']))
											{
												echo '<font color="blue">Book Add successfully..</font>';
												echo '<br><br>';
											}
										
										?>
										</div>
<div class="conainer" id="container_Signup">
<form  action="process_add_book.php" method="POST" enctype="multipart/form-data">
<p id="p4">ADD BOOK</p>
<div class="form-group row">
    <label for="exampleFormControlInput1">Book Title:</label>
    <input type="text" name="name" class="form-control"  id="name" placeholder="Book title">
  </div>
   <div class="form-group row">
    <label for="exampleFormControlSelect1">Category:</label>
    <select class="form-control" name="category"  id="category">
	<?php
									
										
			
											$query="select * from category ";
			
											$res=mysqli_query($conn,$query);
											
											while($row=mysqli_fetch_assoc($res))
											{
												echo '<option>'.$row['cat_nm'].'</option>';
											}
			
											
									
											
								?>
      
    </select>
  </div>

  <div class="form-group row">
    <label for="exampleFormControlInput1">Author:</label>
    <input type="text" class="form-control" name="author" id="author" placeholder="Author name">
  </div>
  <div class="form-group row">
    <label for="exampleFormControlInput1">Publisher:</label>
    <input type="text" class="form-control" name="publisher" id="publisher" placeholder="Publisher">
  </div>
  <div class="form-group row">
    <label for="exampleFormControlInput1">Edition:</label>
    <input type="text" class="form-control" name="edition" id="edition" placeholder="Edition">
  </div>
  
   <div class="form-group row">
    <label for="exampleFormControlInput1">ISBN:</label>
    <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN">
  </div>
  <div class="form-group row">
    <label for="exampleFormControlInput1">Language:</label>
    <input type="text" class="form-control" name="language" id="language" placeholder="Language">
  </div>
  <div class="form-group row">
    <label for="exampleFormControlInput1">Price:</label>
    <input type="text" class="form-control" name="price" id="price" placeholder="Price">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlFile1">Image:</label>
    <input type="file" class="form-control-file" name="img" id="img">
  </div>

	  <button class="btn btn-outline-success my-2 my-sm-0" id="OK" >OK</button>
	  </div>

</form>

 </br></br>	
	</br></br>	
	</br></br>	
		
</div>


<div class="fotersection temp clear">

  
 <p>(c) 2018 <a class="navbar-brand" href="user.php" >BookShop.com</a> Design by Athik Hasan Imad</p>
 

</div>	

</body>
</html>