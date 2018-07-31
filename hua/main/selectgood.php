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
						if($type=='商品编号'){
							$sql=mysql_query("select * from goods where good_id='$key'");
							@$num=mysql_num_rows($sql);
							if($num<=0){
								echo "<script>alert('查无此商品编号，请检查是否输入正确');history.go(-1);</script>";
							}else{
								$pagesize=8;
								if(isset($_GET['page'])){
									$page=$_GET['page'];
								}else{
									$page=1;
								}
							    $number=ceil($num/$pagesize);
							    $ps=($page-1)*$pagesize;
								$SQL=mysql_query("select * from goods where good_id='$key' limit $ps,$pagesize"); 
								include("selectgoods.php");
							}
							
						}else if($type=='商品名称'){
							$sql=mysql_query("select * from goods where good_name like '%$key%'");
							@$num=mysql_num_rows($sql);
							if($num<=0){
								echo "<script>alert('查无此商品名，请检查是否输入正确');history.go(-1);</script>";
							}else{
								$pagesize=8;
								if(isset($_GET['page'])){
									$page=$_GET['page'];
								}else{
									$page=1;
								}
							    $number=ceil($num/$pagesize);
							    $ps=($page-1)*$pagesize;
							    $SQL=mysql_query("select * from goods where good_name like '%$key%' limit $ps,$pagesize");
								include("selectgoods.php");
							}
							
						}else if($type=='用途'){
							$sql=mysql_query("select * from goods where good_use like '%$key%'");
							@$num=mysql_num_rows($sql);
							if($num<=0){
								echo "<script>alert('查无此用途，请检查是否输入正确');history.go(-1);</script>";
							}else{
								$pagesize=8;
								if(isset($_GET['page'])){
									$page=$_GET['page'];
								}else{
									$page=1;
								}
							    $number=ceil($num/$pagesize);
							    $ps=($page-1)*$pagesize;
							    $SQL=mysql_query("select * from goods where good_use like '%$key%' limit $ps,$pagesize");
								include("selectgoods.php");
							}
						}else if($type=='适合对象'){
							$sql=mysql_query("select * from goods where object like '%$key%'");
							@$num=mysql_num_rows($sql);
							if($num<=0){
								echo "<script>alert('查无此适合对象，请检查是否输入正确');history.go(-1);</script>";
							}else{
								$pagesize=8;
								if(isset($_GET['page'])){
									$page=$_GET['page'];
								}else{
									$page=1;
								}
							    $number=ceil($num/$pagesize);
							    $ps=($page-1)*$pagesize;
							    $SQL=mysql_query("select * from goods where object like '%$key%' limit $ps,$pagesize");
								include("selectgoods.php");
							}
						}else if($type=='适合节日'){
							$sql=mysql_query("select * from goods where festival like '%$key%'");
							@$num=mysql_num_rows($sql);
							if($num<=0){
								echo "<script>alert('查无此节日，请检查是否输入正确');history.go(-1);</script>";
							}else{
								$pagesize=8;
								if(isset($_GET['page'])){
									$page=$_GET['page'];
								}else{
									$page=1;
								}
							    $number=ceil($num/$pagesize);
							    $ps=($page-1)*$pagesize;
							    $SQL=mysql_query("select * from goods where festival like '%$key%' limit $ps,$pagesize");
								include("selectgoods.php");
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