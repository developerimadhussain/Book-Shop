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
											
										echo $b_id=$_GET['b_id'];
										$b_title=$_GET['b_title'];	
										$b_cat=$_GET['b_cat'];	
										$b_author=$_GET['b_author'];	
										$b_publisher=$_GET['b_publisher'];	
										$b_edition=$_GET['b_edition'];	
										$b_isbn=$_GET['b_isbn'];	
										$b_language=$_GET['b_language'];	
										$b_price=$_GET['b_price'];	
										$b_img=$_GET['b_img'];	
										
										?>
										</div>
<div class="conainer" id="container_Signup">
<form  action="process_update_book.php?b_id=<?php echo $b_id ;?>" method="POST" enctype="multipart/form-data">
<p id="p4">ADD BOOK</p>
<div class="form-group row">
    <label for="exampleFormControlInput1">Book Title:</label>
	 <?php
    echo '<input type="text" value="'.$b_title.'" name="name" class="form-control"  id="name" placeholder="Book title">';

?>
	</div>
   <div class="form-group row">
    <label for="exampleFormControlSelect1">Category:</label>
    <select class="form-control" value ="" name="category"  id="category">
	<?php
									
										
			
											$query="select * from category ";
			
											$res=mysqli_query($conn,$query);
											$ck=0;
											while($row=mysqli_fetch_assoc($res))
											{
												if($b_cat==$row['cat_nm']){
												echo '<option>'.$row['cat_nm'].'</option>';
											
												
										       $res=mysqli_query($conn,$query);
												  	while($row=mysqli_fetch_assoc($res))
										    	{ 
											       if($b_cat!=$row['cat_nm'])
												echo '<option>'.$row['cat_nm'].'</option>';
												
												}
											    
											}
											}
									
										
									
											
								?>
      
    </select>
  </div>

  <div class="form-group row">
    <label for="exampleFormControlInput1">Author:</label>
   <?php  echo '  <input type="text" class="form-control" value ="'.$b_author.'" name="author" id="author" placeholder="Author name">';
 ?>
 </div>
  <div class="form-group row">
    <label for="exampleFormControlInput1">Publisher:</label>
    <?php  echo ' <input type="text" class="form-control" value ="'.$b_publisher.'" name="publisher" id="publisher" placeholder="Publisher">';
  ?>
  </div>
  <div class="form-group row">
    <label for="exampleFormControlInput1">Edition:</label>
   <?php  echo '  <input type="text" class="form-control" value ="'.$b_edition.'" name="edition" id="edition" placeholder="Edition">';
 ?> </div>
  
   <div class="form-group row">
    <label for="exampleFormControlInput1">ISBN:</label>
   <?php  echo '  <input type="text" class="form-control" value ="'.$b_isbn.'" name="isbn" id="isbn" placeholder="ISBN">';
 ?> </div>
  <div class="form-group row">
    <label for="exampleFormControlInput1">Language:</label>
   <?php  echo '  <input type="text" class="form-control" value ="'.$b_language.'" name="language" id="language" placeholder="Language">';
 ?> </div>
  <div class="form-group row">
    <label for="exampleFormControlInput1">Price:</label>
    <?php  echo ' <input type="text" class="form-control" value ="'.$b_price.'" name="price" id="price" placeholder="Price">';
  ?> </div>
  
  <div class="form-group">
    <label for="exampleFormControlFile1">Image:</label>
  <?php  echo '<input type="file" class="form-control-file" value ="'.$b_img.'" name="img" id="img">';
 ?> </div>

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