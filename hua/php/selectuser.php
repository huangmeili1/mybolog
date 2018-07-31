<meta charset="utf-8" />
<?php
	session_start();
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		include_once("../conn/dataconnection.php");
	   ?>
	   <div style="margin: 0 auto;text-align: center;width: 100%;height: 100%;">
	   	<?php
	   		include("top1.php");
	   		?>
	   		<div style="margin: 0 auto;text-align: center;width: 100%;height: 90%;">
	   			<h2>用户信息</h2>
	   			<?php
	   				if(isset($_GET['tj'])){
	   					$type=$_GET['ty'];
	   					$key=$_GET['keyword'];
//	   					echo $type;
//	   					echo $key;
						if($type=='编号'){
							$sql=mysql_query("select * from user where user_id='$key'");
							@$num=mysql_num_rows($sql);
							if($num<=0){
								echo "<script>alert('查无此编号，请检查是否输入正确');history.go(-1);</script>";
							}else{
								$pagesize=8;
								if(isset($_GET['page'])){
									$page=$_GET['page'];
								}else{
									$page=1;
								}
							    $number=ceil($num/$pagesize);
							    $ps=($page-1)*$pagesize;
								$SQL=mysql_query("select * from user where user_id='$key' limit $ps,$pagesize"); 
								include("select.php");
							}
							
						}else if($type=='用户名'){
							$sql=mysql_query("select * from user where user_name like '%$key%'");
							@$num=mysql_num_rows($sql);
							if($num<=0){
								echo "<script>alert('查无此用户名，请检查是否输入正确');history.go(-1);</script>";
							}else{
								$pagesize=8;
								if(isset($_GET['page'])){
									$page=$_GET['page'];
								}else{
									$page=1;
								}
							    $number=ceil($num/$pagesize);
							    $ps=($page-1)*$pagesize;
							    $SQL=mysql_query("select * from user where user_name like '%$key%' limit $ps,$pagesize");
								include("select.php");
							}
							
						}else if($type=='真实姓名'){
							$sql=mysql_query("select * from user where realname like '%$key%'");
							@$num=mysql_num_rows($sql);
							if($num<=0){
								echo "<script>alert('查无此真实姓名，请检查是否输入正确');history.go(-1);</script>";
							}else{
								$pagesize=8;
								if(isset($_GET['page'])){
									$page=$_GET['page'];
								}else{
									$page=1;
								}
							    $number=ceil($num/$pagesize);
							    $ps=($page-1)*$pagesize;
							    $SQL=mysql_query("select * from user where realname like '%$key%' limit $ps,$pagesize");
								include("select.php");
							}
						}else if($type=='性别'){
							$sql=mysql_query("select * from user where  sex='$key'");
							@$num=mysql_num_rows($sql);
							if($num<=0){
								echo "<script>alert('查无此性别，请检查是否输入正确');history.go(-1);</script>";
							}else{
								$pagesize=8;
								if(isset($_GET['page'])){
									$page=$_GET['page'];
								}else{
									$page=1;
								}
							    $number=ceil($num/$pagesize);
							    $ps=($page-1)*$pagesize;
							    $SQL=mysql_query("select * from user where  user_sex='$key' limit $ps,$pagesize");
								include("select.php");
							}
						}else{
							
						}
	   				}
	   				?>
	   		</div>
	   		
	   	</div>
	   <?php
		
		
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>