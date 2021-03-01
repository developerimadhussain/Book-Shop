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


	</br></br>	
	</br></br>	
	</br></br>	
	
<div id="message1">

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
<form  action="signup_process.php" method="POST">
<p id="p3">SIGNUP</p>
<div class="form-group row">
    <label for="exampleFormControlInput1">Full Name</label>
    <input type="text" name="fullname" class="form-control"  id="fullname" placeholder="Full Name">
  </div>
<div class="form-group row">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" name="email" class="form-control"  id="email" placeholder="name@example.com">
  </div>
  <div class="form-group row">
    <label for="exampleFormControlInput1">Mobile</label>
    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number">
  </div>
   <div class="form-group row">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Password" required>
    
  </div>
  
  <div class="form-group row">
    <label for="exampleFormControlSelect1">Gender</label>
    <select class="form-control" name="gender"  id="gender">
      <option>Male</option>
      <option>Female</option>
    </select>
  </div>
   <div class="form-group row">
    <label for="exampleFormControlSelect1">City</label>
    <select class="form-control" name="city" id="city">
      <option>Dhaka</option>
      <option>Chittagong</option>
      <option>Kulna</option>
      <option>Rajshahi</option>
      <option>Barisal</option>
      <option>Sylhet</option>
      <option>Rangpur</option>
      <option>Comilla</option>
      <option>Gazipur</option>
      <option>Narayanganj</option>
    </select>
  </div>
  <div class="form-group row">
    <label for="exampleFormControlTextarea1">Address</label>
    <textarea class="form-control" name="address" id="address" rows="3"></textarea>
	
  </div>
<button type="submit" name="Register" value="Register" class="btn btn-primary">Create Account</button>
<div class="form-group row">
 <p id="p2">Already have an account?</p>  
	  <button class="btn btn-outline-success my-2 my-sm-0"><a  href="login.php">Login Now!</a></button>
	  </div

</form>

 </br></br>	
	</br></br>	
	</br></br>	
		
</div>


<div class="fotersection temp clear">

  
 <p>(c) 2018 <a class="navbar-brand" href="webdemo.php" >BookShop.com</a> Design by Athik Hasan Imad</p>
 

</div>	

</body>
</html>