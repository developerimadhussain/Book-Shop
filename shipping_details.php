			
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
				else{
					echo ' <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>';
	  echo ' <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>';
	  echo ' <li class="nav-item">';
       
			$c=0;
											
										
										require('database/Db_Connection.php');
										$query="select * from cart ";
										$res=mysqli_query($conn,$query);
										$c=mysqli_num_rows($res);
										
										
											
											
					 echo ' 	<a class="nav-link" href="cart_user.php">Cart '; echo '(',$c,')</a>
										
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
	
    <form class="form-inline my-2 my-lg-0" method="POST" action="book_search.php" > 
      <input class="form-control mr-sm-2" type="search" id="search" name="search"  placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"  value="search" >Search</button>
    </form>
  </div>
</nav>
</div>
	
</br></br>	
	</br></br>
							
			<div class="conainer" id="container_Signup">
<form  action="shipping_process1.php" method="POST">
<p id="p3">Shipping Details</p>
<div class="form-group row">
    <label for="exampleFormControlInput1">Full Name</label>
    <input type="text" name="fullname" class="form-control"  id="fullname" placeholder="Full Name">
  </div>
  <div class="form-group row">
    <label for="exampleFormControlSelect1">Gender</label>
    <select class="form-control" name="gender"  id="gender">
      <option>Male</option>
      <option>Female</option>
    </select>
  </div>
  <div class="form-group row">
    <label for="exampleFormControlInput1">Mobile</label>
    <input type="text" name="mobile" class="form-control"  id="mobile" placeholder="Mobile">
  </
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
<button type="submit" name="confirm" value="confirm" class="btn btn-primary">Confirm&Proceed</button>


</form>

 </br></br>	
	</br></br>	
	</br></br>	
		
</div>
				
							
							
							
							</div>
							
						


		<br /> 	<br /> 
		<br /> 	<br /> 
		<br /> 	<br /> 
			




<div class="fotersection temp clear">
<div class="conainer">
  
 <p>(c) 2018 <a class="navbar-brand" href="webdemo.php" >BookShop.com</a> Design by Athik Hasan Imad</p>
 
  </div>
</nav>
</div>	

</body>
</html>