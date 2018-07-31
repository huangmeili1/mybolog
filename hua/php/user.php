<meta charset="utf-8" />
<?php
session_start();
include("../conn/dataconnection.php");
$good_name=$_GET['good_name'];
$price=$_GET['price'];
$userpr=$_GET['province'];
$good_id=$_GET['good_id'];
$userct=$_GET['city'];
$userar=$_GET['area'];
$address=$userpr.$userct.$userar;
$address1=$_GET['address1'];
$finalladd=$address.$address1;
$name=$_GET['name'];
$name1=$_GET['name1'];
$tel=$_GET['tel'];
$tel1=$_GET['tel1'];
$email=$_GET['email'];
$money_id=$_GET['ch'];
$ip=$_SERVER["REMOTE_ADDR"];
$d2=date("Y-m-d");
$get_post=$_GET['get_post'];
$get_sum=$_GET['n'];//数量
$sum_price=$price*$get_sum;
$pass="123456";
$spp=mysql_query("select user_id from user order by user_id desc");
$ah=mysql_fetch_array($spp);
$d=$ah['user_id']+1;
$sql=mysql_query("insert into user(user_id,user_name,user_pass,realname,user_tel,user_time,email,ip) values('$d','$name','$pass','$name','$tel','$d2','$email','$ip')");
@$num=mysql_affected_rows();
if($num<=0){
	echo "<script>alert('对不起，系统出错了');history.go(-1);</script>";
}else{
	$sppn=mysql_query("insert into getinfo(user_id,get_name,get_tel,get_add,get_post) values('$d','$name1','$tel1','$finalladd','$get_post')");
	@$nn=mysql_affected_rows();
	if($nn<=0){
		echo "<script>alert('对不起，系统出错了');history.go(-1);</script>";
	}else{
		$s1=mysql_query("select * from getinfo where user_id='$d' and get_name='$name1' and get_tel='$tel1' and get_add='$finalladd'");
		$as=mysql_fetch_array($s1);
		$get_id=$as['get_id'];
		$hn=mysql_query("insert into book(user_id,get_id,book_time,sum_price,state,money_id) values('$d','$get_id','$d2',$sum_price,'未发货','$money_id')");
		@$er=mysql_affected_rows();
		if($er>=0){
			$_SESSION['user_id']=$d;
			$_SESSION['user_name']=$name;
			$yt=mysql_query("select * from book where user_id='$d' and get_id='$get_id' and book_time='$d2' and sum_price='$sum_price'");
			@$qe=mysql_num_rows($yt);
			if($qe<=0){
				echo "<script>alert('对不起，系统出错了，请稍后再试');window.location.href='index.php';</script>";
			}else{
			$bn=mysql_fetch_array($yt);
			$book_id=$bn['book_id'];
			$sn=mysql_query("insert into order_detail(book_id,good_id,name,num,price) values('$book_id','$good_id','$good_name','$get_sum','$price')");
			@$r=mysql_affected_rows();
			if($r>=0){
				$uy=mysql_query("update goods set good_num=good_num-$get_sum,sales=sales+$get_sum where good_id='$good_id'");
				echo "<script>alert('下单成功');window.location.href='order.php';</script>";
			}else{
				echo "<script>alert('系统出错了，请稍后再试');</script>";
			}
			}
			?>
			
			<?php
		}else{
			echo "<script>alert('系统出错了，请稍后再试');history.go(-1);</script>";
		}
	}
}
?>

