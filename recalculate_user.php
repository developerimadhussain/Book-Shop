<?php				
					require('database/Db_Connection.php');
							                    $query1="select *from book ";
												$query2="select *from cart ";
							
							                   
												$res1=mysqli_query($conn,$query1) or die("Can't Execute Query...");
												$res2=mysqli_query($conn,$query2) or die("Can't Execute Query...");
	                                            $q=0;
												while($row2=mysqli_fetch_assoc($res2))
												{
													
													$id=$row2['b_id'];
																		                                   					                                     					
					                                 $quantity=$_POST["qty$id"];
													
					                                  echo $quantity;
					  	                       
														
													
													while($row1=mysqli_fetch_assoc($res1))
												{
													if($id==$row1['id']){
														
											        $b_id=$row1['id'];

                                                      if($quantity==1)
														 break;
													
												 	
											$query="UPDATE cart SET quantity='$quantity' where b_id='$b_id'";
											mysqli_query($conn,$query) or die("can't Execute...");
											
										break;
											
					   }
				   }
				   
				   
												
												$q++;
												
												
												}
					header("location: cart_user.php?recalculate=1");								
?>
	