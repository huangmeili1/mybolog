<meta charset="utf-8" />
<?php
session_start();
include("../conn/dataconnection.php");
?>
<?php
	if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){//已经登录
		@$user_id=$_SESSION['user_id'];
		@$get_id=$_POST['get_id'];
		@$goods=$_POST['goods'];
		@$nums=$_POST['nums'];
		@$names=$_POST['names'];
		@$prices=$_POST['prices'];
		@$money_id=$_POST['money_id'];
		@$total=$_POST['total'];
		@$get_hua=$_POST['get_hua'];
		@$cheap=$_POST['cheap'];
		$fufan="2";
		@$book_id=$fufan.date("md").rand(9999,4);
		@$d2=date("Y-m-d");
		$sql=mysql_query("insert into book(book_id,user_id,get_id,book_time,sum_price,state,money_id,get_hua,cheap) values('$book_id','$user_id','$get_id','$d2','$total','未发货','$money_id','$get_hua','$cheap')");
		@$s_num=mysql_affected_rows();
		if($s_num<=0){
			echo "<script>alert('系统出错了，请稍后再试');hitory.go(-2);</script>";
		}else{
			@$user=mysql_query("update user set money=money-$cheap where user_id='$user_id'");
				$a=0;
				
				for($index=0;$index<count($goods);$index++) 
			{
				$good_id=$goods[$index];
				$get_sum=$nums[$index];
				$good_price=$prices[$index];
				$good_name=$names[$index];
				$sn=mysql_query("insert into order_detail(book_id,good_id,name,num,price) values('$book_id','$good_id','$good_name','$get_sum','$good_price')");
				@$r=mysql_affected_rows();
				$a=$a+$r;
				
			} 
			if($a==count($goods)){
				$g=0;
				
				for($i=0;$i<count($goods);$i++) 
			{
				$id=$goods[$i];
				$sen_num=$nums[$i];
				$uy=mysql_query("update goods set good_num=good_num-$sen_num where good_id='$id'");
				$w1=mysql_affected_rows();
				$g=$g+$w1;
			}
			
			if($g==count($goods)){
				for($i=0;$i<count($goods);$i++){
					$g=$goods[$i];
					$del=mysql_query("delete from cart where good_id='$g' and user_id='$user_id'");
				}
			 	echo "<script>alert('下单成功');window.location.href='person_order.php';</script>";
			}else{
				echo "<script>alert('系统出错了，请稍后再试');</script>";
			}
				
			}
		}
//		@$jifen=$total/2;
//		@$jingyan=$total/30;
//		@$fufan="1";
		
		
	}else{//未登录
		@$goods=$_POST['goods'];
		@$nums=$_POST['nums'];
		@$names=$_POST['names'];
		@$prices=$_POST['prices'];
//		var_dump($goods);
//		var_dump($nums);
		@$realname=$_POST['realname'];
//		@$email=$_POST['email'];
		$user_tel=$_POST['user_tel'];
		@$get_name=$_POST['get_name'];
		@$province=$_POST['province'];
		@$city=$_POST['city'];
		@$area=$_POST['area'];
		@$get_add=$_POST['get_add'];
		@$finally_add=$province.$city.$area.$get_add;
		@$get_post=$_POST['get_post'];
		@$get_tel=$_POST['get_tel'];
		@$get_hua=$_POST['get_hua'];
		@$money_id=$_POST['money_id'];
		@$total=$_POST['total'];
//		@$jifen=$total/2;
//		@$jingyan=$total/30;
		if(@$_SESSION['user_id']!=''&&@$_SESSION['user_name']!=''){
				$fufan="2";
			}else{
				$fufan="1";
			}
//			$user_type=mysql_query("select * from user_type order by jingyan asc");
//			@$type_num=mysql_num_rows($user_type);
//			if($type_num<=0){
//				$type_id=0;
//			}else{
//				$type_n=mysql_fetch_array($user_type);
//					$type_id=$type_n['type_id'];
//			}
		$ip=$_SERVER["REMOTE_ADDR"];
		$d2=date("Y-m-d");
		$pass="123456";
		$spp=mysql_query("select user_id from user order by user_id desc");
		@$ah=mysql_fetch_array($spp);
		$d=$ah['user_id']+1;
		$sql=mysql_query("insert into user(user_id,user_name,user_pass,realname,user_tel,user_time,ip) values('$d','$realname','$pass','$realname','$user_tel','$d2','$ip')");
		@$num=mysql_affected_rows();
		if(@$num<=0){
			echo "<script>alert('对不起，系统出错了');history.go(-1);</script>";
		}else{
		$sppn=mysql_query("insert into getinfo(user_id,get_name,get_tel,get_add,get_post) values('$d','$get_name','$get_tel','$finally_add','$get_post')");
		$nn=mysql_affected_rows();
		if($nn<=0){
		echo "<script>alert('对不起，系统出错了');history.go(-1);</script>";
		}else{
			$s1=mysql_query("select * from getinfo where user_id='$d' and get_name='$get_name' and get_tel='$get_tel' and get_add='$finally_add'");
			$as=mysql_fetch_array($s1);
			$get_id=$as['get_id'];
			$book_id=$fufan.date("md").rand(9999,4);
			$hn=mysql_query("insert into book(book_id,user_id,get_id,book_time,sum_price,state,money_id,get_hua) values('$book_id','$d','$get_id','$d2',$total,'未发货','$money_id','$get_hua')");
			@$er=mysql_affected_rows();
			if(@$er<=0){
				echo "<script>alert('系统出错了，请稍后再试');hitory.go(-2);</script>";
			}else{
				$a=0;
				
				for($index=0;$index<count($goods);$index++) 
			{
				$good_id=$goods[$index];
				$get_sum=$nums[$index];
				$good_price=$prices[$index];
				$good_name=$names[$index];
				$sn=mysql_query("insert into order_detail(book_id,good_id,name,num,price) values('$book_id','$good_id','$good_name','$get_sum','$good_price')");
				@$r=mysql_affected_rows();
				$a=$a+$r;
				
			} 
			if($a==count($goods)){
				$g=0;
				
				for($i=0;$i<count($goods);$i++) 
			{
				$id=$goods[$i];
				$sen_num=$nums[$i];
				$uy=mysql_query("update goods set good_num=good_num-$sen_num where good_id='$id'");
				$w1=mysql_affected_rows();
				$g=$g+$w1;
			}
			
			if($g==count($goods)){
				$_SESSION['user_id']=$d;
				$_SESSION['user_name']=$realname;
				for($i=0;$i<count($goods);$i++){
					$g=$goods[$i];
					$del=mysql_query("delete from cart where good_id='$g' and user_id='$d'");
				}
			 	echo "<script>alert('下单成功,登录手机为订货人手机号码，密码为123456');window.location.href='person_order.php';</script>";
			 	
			}else{
				echo "<script>alert('系统出错了，请稍后再试');</script>";
			}
				
			}
				
			}
		
		}
		}
	}
	?>
	
	
	
	<?php
//	 }else{
//	echo "<script>alert('请登录');window.location.href='login.php';</script>";}  ?>