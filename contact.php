

<!DOCTYPE html>
<html>
<head>
<title> BookShop.com</title>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css" />


</head>
<body>

<div class="conainer">

<nav class="navbar navbar-expand-lg navbar-light bg-light">  
<a href="#" id="link_title">BookShop.com</a>  
  <a class="navbar-brand" href="webdemo.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="signup.php">Signup</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
	  <li class="nav-item">
	  <?php
			$c=0;
											
										
										require('database/Db_Connection.php');
										$query="select * from cart ";
										$res=mysqli_query($conn,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
												
													$c++;
											}
										
											
											?>
						<a class="nav-link" href="cart.php">Cart   <?php echo '(',$c,')'; ?></a>
										
        
      </li>
      
     
    </ul>
	
      <form class="form-inline my-2 my-lg-0" method="POST" action="book_search.php" > 
      <input class="form-control mr-sm-2" type="search" id="search" name="search"  placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"  value="search" >Search</button>
    </form>
  </div>
</nav>
</div>

<div class="contentsection temp clear">
		
		  <div id="message2"><?php
	                                  if(isset($_GET['error']))
											{
												echo '<font color="red">'.$_GET['error'].'</font>';
												echo '<br><br>';
											}
																						
											if(isset($_GET['contact']))
											{
												echo '<font color="blue">Message successfully send..</font>';
												echo '<br><br>';
											}
											
											
										
										?>	</div>	
<div class="sidebar temp clear ">
<div class="sidebar1 clear">

<h3>Login</h3>

		  <form  method="POST" action="login_user.php">
		  
		  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="usernm" class="form-control" id="usernm" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Password" required>
    
  </div>
  <button type="submit" name="Login" value="Login" class="btn btn-primary">Login</button>
</form>
				

<h3>Category</h3>

                     <ul >
				   
				   <?php
										
			                             	require('database/Db_Connection.php');
										$query="select * from category ";
			
										$res=mysqli_query($conn,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
												echo '<li id="list"><a id="a" href="category_books.php?b_cat='.$row['cat_nm'].'">'.$row["cat_nm"].'</a></li>';
												
											}
			
											mysqli_close($conn);
								?>
				   
				   
                   </ul>
					
					
			
</div>
</div>
</br></br>	
	</br></br>

<div class="conainer" id="container_Signup">
<form  action="contact_process.php" method="POST" enctype="multipart/form-data">
<p id="p4">CONTACT</p>
<div class="form-group ">
    <label for="exampleFormControlInput1">Name:</label>
    <input type="text" name="name" class="form-control"  id="name" placeholder="Name">
  </div>
  
 	  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="usernm" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
   <div class="form-group">
    <label for="exampleFormControlTextarea1">Query</label>
    <textarea class="form-control" name="query" id="exampleFormControlTextarea1" rows="7"></textarea>
  </div>
	  <button class="btn btn-outline-success my-2 my-sm-0" id="OK" >OK</button>
	

</form>
  </div>

 </br></br>	
	</br></br>	
	</br></br>	
		
</div>


<div class="maincontent temp clear ">
<div class="samepost temp clear" >
</div>
		</div>




<div class="fotersection temp clear">
<div class="conainer">
  
 <p>(c) 2018 <a class="navbar-brand" href="webdemo.php" >BookShop.com</a> Design by Athik Hasan Imad</p>
 
  </div>
</nav>
</div>	
<script type="text/javascript"src="js/jquery-3.3.1.min.js" ></script>
<script type="text/javascript"src="js/bootstrap.min.js" ></script>
</body>
</html>