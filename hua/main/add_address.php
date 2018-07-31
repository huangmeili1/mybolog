									<meta charset="utf-8" />
									<?php
										session_start();
										if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
											$user_id=$_SESSION['user_id'];
									?>
									<?php
									if(isset($_POST['tj'])){
										include("../conn/dataconnection.php");
										@$get_name=$_POST['get_name'];
										@$get_tel=$_POST['get_tel'];
										@$province=$_POST['province'];
										@$city=$_POST['city'];
										@$area=$_POST['area'];
										@$get_add=$_POST['get_add'];
										@$finally_add=$province.$city.$area.$get_add;
										@$get_post=$_POST['get_post'];
										
										$sql=mysql_query("select * from getinfo where user_id='$user_id' and get_name='$get_name' and get_tel='$get_tel' and get_add='$finally_add' and get_post='$get_post'");
										@$num=mysql_num_rows($sql);
										if(@$num>0){
											echo "<script>alert('你已经添加有此收货地址');history.go(-1);</script>";
										}else{
											$all=mysql_query("select * from getinfo where user_id='$user_id'");
											@$allnum=mysql_num_rows($all);
											if(@$allnum>=20){
												echo "</script>alert('你的收货地址已经达到20个，不能再添加了');history.go(-1);</script>";
											}else{
												$add=mysql_query("insert into getinfo(user_id,get_name,get_tel,get_add,get_post) values('$user_id','$get_name','$get_tel','$finally_add','$get_post')");
												@$addnum=mysql_affected_rows();
												if(@$addnum>0){
													echo "<script>alert('添加成功');</script>";
													header('location:member_address.php');
												}else{
													echo "<script>alert('添加失败，请稍后再试');history.go(-1);</script>";
												}
											}
//											
											
										}
									}
									?>
									<?php
	 							}else{
								echo "<script>alert('请登录');window.location.href='login.php';</script>";}  ?>