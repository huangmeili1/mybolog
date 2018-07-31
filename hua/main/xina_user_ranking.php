<?php
include("../conn/dataconnection.php");
  ob_end_clean();
  $sqll=mysql_query("select user_id,zongfen,cheaap,b from (select user_id,sum(sum_price) as zongfen,sum(cheap) as cheaap,count(*) as b from book group by user_id) a order by a.zongfen desc");
  @$sqll_num=mysql_num_rows($sqll);
  if($sqll_num<=0){
	?>
	<tr>
		<td colspan="8" style="text-align: center;">暂时无法查看</td>
	</tr>
	<?php
		}else{
			 $filename=$sqll_num."会员购物量排行榜";  
			  header("Content-type:application/vnd.ms-excel");  
			  header("Content-Disposition:filename=".$filename.".xls");	
			  $strexport="排名\t用户编号\t用户真实姓名\t用户手机\t总购物金额\t总优惠\t注册时间\t订单数量\r";
			  $i=0;
			while($user=mysql_fetch_array($sqll)){	
				$i++;
			$strexport.=$i."\t";
			$strexport.=$user['user_id']."\t";
			@$user_id=$user['user_id'];
			@$u_u=mysql_query("select * from user where user_id='$user_id'");
			@$uu=mysql_fetch_array($u_u);
			@$realname=$uu['realname'];
			$strexport.=$realname."\t";
			$strexport.=$uu['user_tel']."\t";
			$strexport.=$user['zongfen']."\t";
			$strexport.=$user['cheaap']."\t";
			$strexport.=$uu['user_time']."\t";
			$strexport.=$user['b']."\r";
			}			
		}
$strexport=iconv('UTF-8',"GB2312//IGNORE",$strexport);  
  exit($strexport); 
?>