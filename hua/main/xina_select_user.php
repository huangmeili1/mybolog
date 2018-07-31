<?php
 include("../conn/dataconnection.php");
 ob_end_clean();
 @$sel=$_GET['sel'];
 @$keyword=$_GET['keyword'];
 $filename=$sel."_".$keyword."的全部订单信息";  
 @$sql=mysql_query("select * from book where user_id='$keyword' order by book_time desc");
 header("Content-type:application/vnd.ms-excel");  
 header("Content-Disposition:filename=".$filename.".xls");
 $strexport="编号\t订单编号\t购买用户编号\t购买用户手机号码\t订单总金额(单位：元)\t收货人\t收货人手机号码\t订单状态\t付款方式\t下单时间\t发货时间\t收货时间\r";
$i=0;
while($user=mysql_fetch_array($sql)){
	$i++;
	$strexport.=$i."\t";
	$strexport.=$user['book_id']."\t";
	$strexport.=$keyword."\t";
	@$u=mysql_query("select * from user where user_id='$keyword'");
	@$us=mysql_fetch_array($u);
	$strexport.=$us['user_tel']."\t";
	$strexport.=$user['sum_price']."\t";
	$get_id=$user['get_id'];
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
	$strexport.=$user['state']."\t";
	@$get_money=$user['money_id'];
	@$m=mysql_query("select * from getmoney where money_id='$get_money'");
	@$m_e=mysql_num_rows($m);
	if($m_e<=0){
	$strexport.="此付钱方式已经被删除了";
	}else{
		@$money_name=mysql_fetch_array($m);
		$strexport.=$money_name['get_money']."\t";
	}
	$strexport.=$user['book_time']."\t";
	$strexport.=$user['send_time']."\t";
	$strexport.=$user['get_time']."\r";
}
 $strexport=iconv('UTF-8',"GB2312//IGNORE",$strexport);  
  exit($strexport);  
?>