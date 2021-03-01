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
		
<div class="contentsection temp clear">
	    <br /> <br/> 

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
											if(isset($_GET['update']))
											{
												echo '<font color="red">'.$_GET['update'].'</font>';
												echo '<br><br>';
											}
												if(isset($_GET['del']))
											{
												echo '<font color="blue">Book delete successfully..</font>';
												echo '<br><br>';
											}
										
										?>
										</div>
					<table  id="table1" border='2' WIDTH='100%'>
					 <tr>

						<td >
						<button id="cart_button" class="btn btn-outline-success my-2 my-sm-0" type="submit"><a id="a1" href="admin_addbooks.php">  Add New Book </a>
                                                       </li></button>
													   </td>
						</tr>
						<tr>
						<tr>
<td id="td"><b><u>SR.NO</u></b></td>
<TD id="td" ><b><u>TITLE</u></b></TD>
<TD id="td" ><b><u>CATEGORY</u></b></TD>
<TD id="td" ><b><u>AUTHOR</u></b></TD>
<TD id="td"><b><u>PUBLISHER</u></b></TD>
<TD id="td"><b><u>EDITION</u></b></TD>
<TD id="td"><b><u>ISBN</u></b></TD>
<TD id="td"><b><u>LANGUAGE</u></b></TD>
<TD id="td"><b><u>PRICE</u></b></TD>
<TD id="td"><b><u>IMAGE</u></b></TD>
<TD id="td" ><b><u>DELETE</u></b></TD>				
<TD id="td" ><b><u>EDIT</u></b></TD>				
							
						</tr>
						<?php
						require('database/Db_Connection.php');

	                     $q="select * from book";
	                     $res=mysqli_query($conn,$q) or die("Can't Execute Query...");
							$count=1;
							while($row=mysqli_fetch_assoc($res))
							{
								$b_id=$row['id'];
							echo '<tr id="tr">
										<td id="td">'.$count.'
										<td id="td">'.$row['b_title'].'
										<td id="td">'.$row['b_cat'].'
										<td id="td">'.$row['b_author'].'
										<td id="td">'.$row['b_publisher'].'
										<td id="td">'.$row['b_edition'].'
										<td id="td">'.$row['b_isbn'].'
										<td id="td">'.$row['b_language'].'
										<td id="td">'.$row['b_price'];
				                        echo "<td><img src='../bookshop1/$row[b_img]' width='50'/>";
										

								        echo 	'<td><img id="image" src="images/drop.png"<input type="button" onclick="show_confirm('.$row['id'].')" > 
										         <td><a href="book_edit.php?b_title='.$row['b_title'].'&b_cat='.$row['b_cat'].'&b_author='.$row['b_author'].'&b_publisher='.$row['b_publisher'].'&b_edition='.$row['b_edition'].'&b_isbn='.$row['b_isbn'].'&b_language='.$row['b_language'].'&b_price='.$row['b_price'].'&b_img='.$row['b_img'].'&b_id='.$b_id.'"><img id="image" src="images/edit2.png" ></a>
										
												
									
									</tr>';
									$count++;
							}
						?>

					</table>
					</table>
				
			
			

	    <br /> <br/>
		
		
		
</ul>
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
window.location.href='del_book.php?b_id='+$id+'';
return true;
}

}

</script>
</body>
</html>