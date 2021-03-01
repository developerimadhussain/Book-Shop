			
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
<div class="sidebar temp clear ">
<div class="sidebar1 clear">
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

<div id ="maincotent1"class="maincontent temp clear ">
<div class="samepost temp clear" >		
<div class="bookshow">
				
	<h3 id="h6">View Cart</h3>  
			
							
					
					          <div id="message3">
				
			<?php
											if(isset($_GET['error']))
											{
												echo '<font color="red">'.$_GET['error'].'</font>';
												echo '<br><br>';
											}
											
											
											if(isset($_GET['del']))
											{
												echo '<font color="blue">Delete successfully..</font>';
												echo '<br><br>';
											}
											if(isset($_GET['recalculate']))
											{
												echo '<font color="blue">Calculate successfully..</font>';
												echo '<br><br>';
											}
											
											
										
										?>	
				</div>
					   	
					 
							<table width="90%" border="0">
								<tr >
									<Td> <b>No.
									<td> <b>Category
									<td> <b>Book
									<td> <b>Add Quantity								
									<td> <b>Rate
									<td> <b>Qty
									<td> <b>Price In 
									<td> <b>Delete
								</tr>
								<tr><td colspan="8"><hr style="border:1px Solid #a1a1a1;"></td></tr>
								  <form method="POST" action="recalculate_user.php"> 
					   
								<?php 
									
                                              require('database/Db_Connection.php');
										       
											    
											    
												$query1="select *from book ";
												$query2="select *from cart ";
												
												$price=$row['b_price'];
												$tot=$price;
												$res1=mysqli_query($conn,$query1) or die("Can't Execute Query...");
												$res2=mysqli_query($conn,$query2) or die("Can't Execute Query...");
	                                            $total=0;
												$count=0;
												$quantity=1;
												
												$c=0;
												$i=1;
												
												while($row2=mysqli_fetch_assoc($res2))
												{
												
													$id=$row2['b_id'];
													$quantity=$row2['quantity'];
													$count++;
													$i=1;		
														$c++;
													while($row1=mysqli_fetch_assoc($res1))
												{
													if($id==$row1['id']){
														
													   $price=$row1['b_price'];
													  
														echo '<tr id="tr">
														<td id="td">'.$count.'										
														<td id="td">'.$row1['b_cat'].'
														<td id="td">'.$row1['b_title'].'
														
													<td id="td"> <select id="select1" width="20%"  class="form-control" type="text"   name="qty'.$id.'">';
                                            while($i<=50)
											{
												
												echo '<option> ';echo $i; echo '</option>';
													
												
												$i++;
												}
														
											   
													 echo '</select>
														
													 
														<td id="td">'.$row1['b_price'].'
														<td id="td">'.$quantity;	
												       
														$price=$price*$quantity;
														$total=$total+$price;
														echo '<td id="td">'.$price.'';																								
															echo ' <td >
															  	
													<button id="cart_button2" value ="Delete" type="button" onclick="show_confirm('.$row1['id'].')" ><a id="a1" >Delete</a> </button>
	
													';
														
														break;
																		}
													
													
												}
														
									
											}
														echo'<tr><td colspan="8"><hr style="border:1px Solid #a1a1a1;">	</td></tr>
								
														
																										
														</td>
														<td colspan="6" align="right"> <h6 id="h5">
														Total=';
														echo $total ;
														echo'	</h6></td>
														</tr>							 
														<tr><td colspan="8"><hr style="border:1px Solid #a1a1a1;"></tr>';
														?>
							
							
								</table>						

							
										<table width="90%" border="0">	
										
									 <?php
										echo'	<td id="td"><h3 id="h6">Payment Details</h3>
												
												<tr >		
											<td id="td">Total	
                                     
													<td id="td">';echo $total;echo'Tk.';
														echo'	</br>
														</tr >';
														echo'<tr><td colspan="2"><hr style="border:1px Solid #a1a1a1;"></tr>';
									
														echo'<tr >
						
														<td id="td">Shipping	
                                     
														<td id="td">';
														if($total==0)
														$shipping=0;
														else
														$shipping=50;
									
													    echo $shipping;echo'Tk.';
														echo'	</br>
														</tr >';
														echo'<tr><td colspan="2"><hr style="border:1px Solid #a1a1a1;"></tr>';

														echo'<tr >
						
														<td id="td">Payable Total	
                                     
														<td id="td">';
													
														echo $total+$shipping;echo'Tk.';
														
														echo'	</br>
														</tr >';
									
													echo'<tr><td colspan="7"><hr style="border:1px Solid #a1a1a1;"></tr>';	
									
							
							?>
							</div>
							<Br>
								</table>						

								<br><br>
							<center>
							<button id="cart_button4" class="btn btn-outline-success my-2 my-sm-0" type="submit"><input id="cart_button5"  type="submit" value="Re-Calculate"></button>
								</form>
					
							<button id="cart_button3" class="btn btn-outline-success my-2 my-sm-0" type="submit"><a id="a1" href="shipping_details.php"> CONFIRM & PROCEED </a>
                                                      </button>
							
							</center>
						
							</div>
							
						</div>		


		<br /> 	<br /> 
		<br /> 	<br /> 
		<br /> 	<br /> 
			

						
</div>



<div class="fotersection temp clear">
<div class="conainer">
  
 <p>(c) 2018 <a class="navbar-brand" href="webdemo.php" >BookShop.com</a> Design by Athik Hasan Imad</p>
 
  </div>
</nav>
</div>	
<script type="text/JavaScript" language="JavaScript">

 function show_confirm($id){
var c=confirm("Do you want to delete?");
if(c==true)
{
window.location.href='del_cart_user.php?id='+$id+'';
return true;
}
 }

</script>
</body>
</html>