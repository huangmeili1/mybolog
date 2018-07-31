<?php
include("../conn/dataconnection.php");
@$book_time2=$_GET['book_time2'];
@$book_time1=$_GET['book_time1'];
@$state=$_GET['state'];
$filename=$book_time1."~".$book_time2."的".$state."订单信息";  
if($state=='全部'){
@$sql=mysql_query("select * from book where book_time between '$book_time1' and '$book_time2'");
}else{
@$sql=mysql_query("select * from book where state='$state' and book_time between '$book_time1' and '$book_time2'");
}
header("Content-type:application/vnd.ms-excel");  
header("Content-Disposition:filename=".$filename.".xls");
$strexport="编号\t订单编号\t购买用户编号\t购买用户手机号码\t订单总金额(单位：元)\t收货人\t收货人手机号码\t订单状态\t付款方式\t下单时间\t发货时间\t收货时间\r";
$i=0;
while($user1=mysql_fetch_array($sql)){
	$i++;
	$strexport.=$i."\t";
	$strexport.=$user1['book_id']."\t";
	$strexport.=$user1['user_id']."\t";
	@$user_id=$user1['user_id'];
	@$u=mysql_query("select * from user where user_id='$user_id'");
	@$uss=mysql_fetch_array($u);
	$strexport.=$uss['user_tel']."\t";
	$strexport.=$user1['sum_price']."\t";
	$get_id=$user1['get_id'];
	$g=mysql_query("select * from getinfo where get_id='$get_id'");
	$g_num=mysql_num_rows($g);
	if($g_num<=0){
		$strexport.="此收货人已经被删除了\t";
		$strexport.="此收货人已经被删除了\t";
	}else{
		$gg=mysql_fetch_array($g);
		$strexport.=$gg['get_name']."\t";
		$strexport.=$gg['get_tel']."\t";
	}
	$strexport.=$user1['state']."\t";
	@$get_money=$user1['money_id'];
	@$m=mysql_query("select * from getmoney where money_id='$get_money'");
	@$m_e=mysql_num_rows($m);
	if($m_e<=0){
	$strexport.="此付钱方式已经被删除了";
	}else{
		@$money_name=mysql_fetch_array($m);
		$strexport.=$money_name['get_money']."\t";
	}
	$strexport.=$user1['book_time']."\t";
	$strexport.=$user1['send_time']."\t";
	$strexport.=$user1['get_time']."\r";
}
 $strexport=iconv('UTF-8',"GB2312//IGNORE",$strexport);  
  exit($strexport); 
?>