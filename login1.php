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
        <a class="nav-link" href="#">Contact</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="#"> Cart</a>
      </li>
      
     
    </ul>
	
   <form class="form-inline my-2 my-lg-0" method="POST" action="book_search.php" > 
      <input class="form-control mr-sm-2" type="search" id="search" name="search"  placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"  value="search" >Search</button>
    </form>
  </div>
</nav>
</div>


	</br></br>	
	</br></br>	
	</br></br>	
	
<div id="message">

  <?php
											if(isset($_GET['error']))
											{
												echo '<font color="red">'.$_GET['error'].'</font>';
												echo '<br><br>';
											}
											
											if(isset($_GET['signup']))
											{
												echo '<font color="blue">Signup successfully..</font>';
												echo '<br><br>';
											}
										
										?>
										</div>
	
<div class="conainer" id="container_Signup">
<p id="p1">Login</p>
<form  action="login_user1.php" method="POST">
<div class="form-group row">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" name="usernm" class="form-control"  id="usernm" placeholder="name@example.com">
  </div>
   <div class="form-group row">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Password" required>
    
  </div>
  
 
<button type="submit" name="Login" value="Login" class="btn btn-primary">Login</button>
<div class="form-group row">
 <p id="p2">Don,t have an account?</p>  
	  <button class="btn btn-outline-success my-2 my-sm-0"><a  href="signup.php">Signup Now!</a></button>
	  </div>

<form/>

 </br></br>	
	</br></br>	
	</br></br>	
	</br></br>	
		
 </br></br>	
	</br></br>	
		
	 
	
</div>

<div class="fotersection temp clear">

  
 <p>(c) 2018 <a class="navbar-brand" href="webdemo.php" >BookShop.com</a> Design by Athik Hasan Imad</p>
 

</div>	


</body>
</html>