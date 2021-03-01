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
	
   <form class="form-inline my-2 my-lg-0" method="POST" action="book_search_user.php" > 
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
												echo '<font color="red">Alredy added this book</font>';
												echo '<br><br>';
											}
																						
											if(isset($_GET['cart']))
											{
												echo '<font color="blue">Book add successfully in Cart..</font>';
												echo '<br><br>';
											}
											
											
										
										?>	</div>	
<div class="sidebar temp clear ">
<div class="sidebar1 clear">
 
		 
	
				

		
	
		<br /> 	<br /> 
		<br /> 	<br /> 
		<br /> 	<br /> 
			


<h3>Category</h3>

                     <ul >
				   
				   <?php
										
			                             	require('database/Db_Connection.php');
										$query="select * from category ";
			
										$res=mysqli_query($conn,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
												echo '<li id="list"><a id="a" href="category_books_user.php?b_cat='.$row['cat_nm'].'">'.$row["cat_nm"].'</a></li>';
												
											}
			
											mysqli_close($conn);
								?>
				   
				   
                   </ul>
					
					
			
</div>
</div>
<div class="maincontent temp clear ">
<div class="samepost temp clear" >
  <div class="samepost3" >
<?php
	require('database/Db_Connection.php');
	
	$id=$_GET['id'];
	$q="select * from book where id=$id";
	$res=mysqli_query($conn,$q) or die("Can't Execute Query..");
	$row=mysqli_fetch_assoc($res);
	$location="bookdetail_user.php";
    $str="id={$id}&redirect={$location}";								  


												echo'
													<td width="50%" height="100%">
													
														<table  id="table4" border="0"  width="100%" height="100%">
															<tr valign="top">
															
														
																<td align="center" width="10%">NAME</td>
													
																<td width="6%">: </td>
																
																<td align="left">'.$row['b_title'].'</td>
																<tr>
													<td><hr color="purple"></td>
												</tr>
															</tr>

															
																								
															
															<tr >
																<td align="center"> Category</td>
																<td>: </td>
																<td align="left">'.$row['b_cat'].'</td>
																
															</tr>
															<tr>
													<td><hr color="purple"></td>
												</tr>
															
															
															<tr >
																<td align="center"> PRICE</td>
																<td>: </td>
																<td align="left">'.$row['b_price'].' Tk.</td>
															</tr>
															<tr>
													<td><hr color="purple"></td>
												</tr>
															
															
														
														</table>
										
														
													</td>
												</tr>
											
													
									<br>	
												
												
								
												
														
												
						
															
				 <td> <button id="cart_button" class="btn btn-outline-success my-2 my-sm-0" type="submit"><a id="a1" href="cart_process.php?';echo $str; echo'"><span class="badge badge-pill badge-success">Add to Cart</span></a>
                                                       </button></td>
			
			</table>
			</tr>';
			?>
			</div>
			
		<div class ="bookdetail">
	<?php
	require('database/Db_Connection.php');
	$id=$_GET['id'];	
	$q="select * from book where id=$id";
	
	$res=mysqli_query($conn,$q) or die("Can't Execute Query..");
	$row=mysqli_fetch_assoc($res);
	
																				
											
													echo'
																	<img id="img3" src="'.$row['b_img'].'" width="100">	';
																	
																	
																	?>
																	
																	
																	
								
	
	</div>
	
	
 <div class="details" >

						<?php
								
                   
												echo'  <table id="table5" border="0" width="100%">
												 
												 <tr align="center" bgcolor="beige" margin-left=50px; >
													 <td color="white" >  DESCRIPTION</td>
												</tr>
												<tr>
													<td><hr color="blue"></td>
												</tr>
												<tr valign="top">
																<td align="center" width="10%">Book Title </td>
																<td width="8%">: </td>
																<td align="left">'.$row['b_title'].'</td>
															</tr>
																	<tr>
													<td><hr color="purple"></td>
												</tr>
															<tr>
																<td align="center"> Author</td>
																<td>: </td>
																<td align="left">'.$row['b_author'].'</td>
															</tr>
															
												<tr>
													<td><hr color="purple"></td>
												</tr>
															
															<tr>
																<td align="center">ISBN</td>
																<td>: </td>
																<td align="left">'.$row['b_isbn'].'</td>
																
															</tr>
															
																	<tr>
													<td><hr color="purple"></td>
												</tr>
																					
															<tr>
																<td align="center">Publisher </td>
																<td>: </td>
																<td align="left">'.$row['b_publisher'].'</td>
																
															</tr>	
																	<tr>
													<td><hr color="purple"></td>
												</tr>
															
															<tr>
																<td align="center"> Edition</td>
																<td>: </td>
																<td align="left">'.$row['b_edition'].'</td>
																
															</tr>
															
																	<tr>
													<td><hr color="purple"></td>
												</tr>
															<tr>
																<td align="center">  Language</td>
																<td>: </td>
																<td align="left">'.$row['b_language'].'</td>
															</tr>
															
																	<tr>
													<td><hr color="purple"></td>
												</tr>
															
																		
											 </table>

			</tr>';
			?>
	
		
			</div>
			</div>
			</div>
<div id="maincontent1" class="maincontent temp clear ">
<div id="samepost1" class="samepost temp clear" >

		
<div class="bookshow">

	<h3 id= "h3"> Related Books</h3>   
	
											<?php
												require('database/Db_Connection.php');
										
											    $cat=$row['b_cat'];
												$id=$_GET['id'];
												$query="select *from book where b_cat='$cat'";
	
												$res=mysqli_query($conn,$query) or die("Can't Execute Query...");
	                                              
												$count=0;
												while($row=mysqli_fetch_assoc($res))
												{
													if($id!=$row['id'])
													{
														$location="bookdetail_user.php";
												       	$id=$row['id'];
														$str="id={$id}&redirect={$location}";
								
													echo '
											
														<ul>														
														<li id="list1"><a href="bookdetail_user.php?id='.$row['id'].'">
														<img src="'.$row['b_img'].'">
														<h6 id="bname">'.$row['b_title'].'</h6>	
														<h6 id="bname">'.$row['b_author'].'</h6>	
														<h6 id="bprice"> Price '.$row['b_price'].' Tk.(25% Off)</h6>	
														<button id="cart_button" class="btn btn-outline-success my-2 my-sm-0" type="submit"><a id="a1" href="cart_process.php?';echo $str; echo'"><span class="badge badge-pill badge-success">Add to Cart</span></a>
                                                       </li></button>
														</ul>
													';
												 }
												}
																						
													
																			
													
													
												
											?>
											
											
						
								
</div>
</div>
</div>








<div class="fotersection temp clear">
<div class="conainer">
  
 <p>(c) 2018 <a class="navbar-brand" href="webdemo.php" >BookShop.com</a> Design by Athik Hasan Imad</p>
 
  </div>
</nav>
</div>	

</body>
</html>