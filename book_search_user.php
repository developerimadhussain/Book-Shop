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

		 <h3 id= "h3"><?php
                                       if(isset($_GET['search']))
											{
											     	 echo $_GET['search'];echo'</h3>';  
											}


		else echo $_POST['search'];?></h3>  
	
	<?php 

require('database/Db_Connection.php');
	
	if(!empty($_POST))
	{
		$msg="";
		if(empty($_POST['search']))
			
		{
			$msg[]="Search field empty";
		}
		
		if(!empty($msg))
		{
			echo '<b>Error:-</b><br>';
			
			foreach($msg as $k)
			{
				echo '<li>'.$k;
			}
		}
		else
		{
									
		 	$search=$_POST['search'];
			
									     
			
											
												$query="select *from book";
	
												$res=mysqli_query($conn,$query) or die("Can't Execute Query...");
	
										     $ck=0;
												while($row=mysqli_fetch_assoc($res))
												{
													
													
													
												
														$location="book_search_user.php";
													    $id=$row['id'];
													    $str="id={$id}&redirect={$location}&search={$search}";
														
															if(isset($_SESSION['status'])&& $_SESSION['unm']!="admin02@gmail.com")
													{
														
														if($search==$row['b_title'])
														{
												        $ck=1;
														
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
													break;
														}
													 if($search==$row['b_author'])
														{
												       $ck=1;
											
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
													
														 if($search==$row['b_cat'])
														{
															$ck=1;
												
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
														
														else{
															
															
																if($search==$row['b_title'])
														{
												        $ck=1;
														
													echo '
											
															<ul>														
														<li id="list1"><a href="#s">
														<img src="'.$row['b_img'].'">
														<h6 id="bname">'.$row['b_title'].'</h6>	
														<h6 id="bname">'.$row['b_author'].'</h6>	
														<h6 id="bprice"> Price '.$row['b_price'].' Tk.(25% Off)</h6>													
													    <button id="cart_button" class="btn btn-outline-success my-2 my-sm-0" type="submit"><a id="a1" href="#"><span class="badge badge-pill badge-success">Add Discount</span></a>
                                                       </li></button>
														</ul>
													';
													break;
														}
													 if($search==$row['b_author'])
														{
												       $ck=1;
											
													echo '
											
															<ul>														
														<li id="list1"><a href="#s">
														<img src="'.$row['b_img'].'">
														<h6 id="bname">'.$row['b_title'].'</h6>	
														<h6 id="bname">'.$row['b_author'].'</h6>	
														<h6 id="bprice"> Price '.$row['b_price'].' Tk.(25% Off)</h6>													
													    <button id="cart_button" class="btn btn-outline-success my-2 my-sm-0" type="submit"><a id="a1" href="#"><span class="badge badge-pill badge-success">Add Discount</span></a>
                                                       </li></button>
														</ul>
													';
												}
													
														 if($search==$row['b_cat'])
														{
															$ck=1;
												
													echo '
											
														<ul>														
														<li id="list1"><a href="#s">
														<img src="'.$row['b_img'].'">
														<h6 id="bname">'.$row['b_title'].'</h6>	
														<h6 id="bname">'.$row['b_author'].'</h6>	
														<h6 id="bprice"> Price '.$row['b_price'].' Tk.(25% Off)</h6>													
													    <button id="cart_button" class="btn btn-outline-success my-2 my-sm-0" type="submit"><a id="a1" href="#"><span class="badge badge-pill badge-success">Add Discount</span></a>
                                                       </li></button>
														</ul>
													';
												}
													
														}
														
												}		
													
												if($ck==0)
												echo'books not found';
		}
	}
	
	if(isset($_GET['search']))
										

									{
										
										
											if(isset($_SESSION['status'])&& $_SESSION['unm']!="admin02@gmail.com")
													{
														
										
										
										
												$search=$_GET['search'];
												
												
												$query="select *from book";
	
												$res=mysqli_query($conn,$query) or die("Can't Execute Query...");
	
										     $ck=0;
												while($row=mysqli_fetch_assoc($res))
												{
														$location="book_search_user.php";
													    $id=$row['id'];
													    $str="id={$id}&redirect={$location}&search={$search}";
														if($search==$row['b_title'])
														{
												        $ck=1;
														
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
													break;
														}
													 if($search==$row['b_author'])
														{
												       $ck=1;
											
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
													
														 if($search==$row['b_cat'])
														{
															$ck=1;
												
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
												
												
												
												
                                            }


															else{
																

										
												$search=$_GET['search'];
												
												
												$query="select *from book";
	
												$res=mysqli_query($conn,$query) or die("Can't Execute Query...");
	
										     $ck=0;
												while($row=mysqli_fetch_assoc($res))
												{
														$location="book_search_user.php";
													    $id=$row['id'];
													    $str="id={$id}&redirect={$location}&search={$search}";
														if($search==$row['b_title'])
														{
												        $ck=1;
														
													echo '
											
														<ul>														
														<li id="list1"><a href="#s">
														<img src="'.$row['b_img'].'">
														<h6 id="bname">'.$row['b_title'].'</h6>	
														<h6 id="bname">'.$row['b_author'].'</h6>	
														<h6 id="bprice"> Price '.$row['b_price'].' Tk.(25% Off)</h6>													
													    <button id="cart_button" class="btn btn-outline-success my-2 my-sm-0" type="submit"><a id="a1" href="#"><span class="badge badge-pill badge-success">Add Discount</span></a>
                                                       </li></button>
														</ul>
													';
													break;
														}
													 if($search==$row['b_author'])
														{
												       $ck=1;
											
													echo '
											
														<ul>														
														<li id="list1"><a href="#">
														<img src="'.$row['b_img'].'">
														<h6 id="bname">'.$row['b_title'].'</h6>	
														<h6 id="bname">'.$row['b_author'].'</h6>	
														<h6 id="bprice"> Price '.$row['b_price'].' Tk.(25% Off)</h6>													
													 <button id="cart_button" class="btn btn-outline-success my-2 my-sm-0" type="submit"><a id="a1" href="#"><span class="badge badge-pill badge-success">Add Discount</span></a>
                                                       </li></button>
														</ul>
													';
												}
													
														 if($search==$row['b_cat'])
														{
															$ck=1;
												
													echo '
											
														<ul>														
														<li id="list1"><a href="#">
														<img src="'.$row['b_img'].'">
														<h6 id="bname">'.$row['b_title'].'</h6>	
														<h6 id="bname">'.$row['b_author'].'</h6>	
														<h6 id="bprice"> Price '.$row['b_price'].' Tk.(25% Off)</h6>													
													   <button id="cart_button" class="btn btn-outline-success my-2 my-sm-0" type="submit"><a id="a1" href="#"><span class="badge badge-pill badge-success">Add Discount</span></a>
                                                       </li></button>
														</ul>
													';
												}
													
														}
																}	  
	
	
	
									}
	
												
											?>
											
						
	<br /> <br/>							
</div>
</div>
											
						
	<br /> <br/>							
</div>
<div class="fotersection temp clear">
<div class="conainer">
  
 <p>(c) 2018 <a class="navbar-brand" href="webdemo.php" >BookShop.com</a> Design by Athik Hasan Imad</p>
 
  </div>
</nav>
</div>	

</body>
</html>