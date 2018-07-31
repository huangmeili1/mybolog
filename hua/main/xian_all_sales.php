<?php
  include("../conn/dataconnection.php");
  ob_end_clean();
  $acct_yr=$_GET['acct_yr'];
  $start_mth=$_GET['start_mth'];
  $end_mth=$_GET['end_mth'];
  $filename=$acct_yr."年".$start_mth."~".$end_mth."月份商品销售情况";  
  header("Content-type:application/vnd.ms-excel");  
  header("Content-Disposition:filename=".$filename.".xls");
  $sql=mysql_query("SELECT DISTINCT(acct_mth) FROM summary WHERE acct_yr = '$acct_yr' and acct_mth between '$start_mth' and '$end_mth'");
	@$sql_num=mysql_num_rows($sql);
									$yu=array();
									$i=-1;
									$amount=array();
									$money=array();
									$sum_money=array();
									$sum_order=array();
									while($row_rs_prod=mysql_fetch_assoc($sql)){
										$i++;
										$yu[$i]=$row_rs_prod['acct_mth'];
									//	$amount[$i]=$row_rs_prod['amount'];
									}
									$a=-1;
									for($i=0;$i<count($yu);$i++){
										$a++;
										$y=$yu[$i];
										@$sql=mysql_query("select sum(amount),sum(money),sum(sum_money) from summary where acct_mth='$y'");
										@$sql_f=mysql_fetch_array($sql);
										$amount[$i]=$sql_f['sum(amount)'];
										$money[$i]=$sql_f['sum(money)'];
										$sum_money[$i]=$sql_f['sum(sum_money)'];

									}  
  									$strexport="月份\t销量\t销量总金额(单位：元)\t净利润(单位：元)\r"; 
								   for($i=0;$i<count($yu);$i++){
								   	$strexport.=$yu[$i]."\t";
								   	$strexport.=$amount[$i]."\t";
								   	$strexport.=$sum_money[$i]."\t";
								   	$strexport.=$money[$i]."\r";
								   }
  $strexport=iconv('UTF-8',"GB2312//IGNORE",$strexport);  
  exit($strexport);  
?>