<?php
 include("../conn/dataconnection.php");
  ob_end_clean();
  $yr=$_GET['yr'];
  $sql=mysql_query("select good_id,zongfen,yuhui,sales_money,getreal_money from (select good_id,sum(sales_amount) as zongfen,sum(yuhui) as yuhui,sum(sales_money) as sales_money,sum(getreal_money) as getreal_money from good_sales where yr='$yr' group by good_id) a order by a.zongfen desc");
  $filename=$yr."年商品销售情况";  
  header("Content-type:application/vnd.ms-excel");  
  header("Content-Disposition:filename=".$filename.".xls");
 $strexport="排名\t商品编号\t商品名称\t现售价(单位:元)\t成本(单位:元)\t年销售量\t年优惠量(单位:元)\t年销售额(单位:元)\t年利润(单位:元)\t种类\r";
 $i=0;
@$sales=0;
@$yuhui=0;
@$sales_money=0;
@$money=0;
while($good=mysql_fetch_array($sql)){ 
$i++;
$strexport.=$i."\t";
$strexport.="";
$good_id=$good['good_id'];
@$g=mysql_query("select * from goods where good_id='$good_id'");
@$g_num=mysql_num_rows($g);
if($g_num<=0){
	$strexport.="此商品已经下架了\t";
	$strexport.="此商品已经下架了\t";
	$strexport.="此商品已经下架了\t";
	$strexport.="此商品已经下架了\t";
}else{
	$goo=mysql_fetch_array($g);
	$strexport.=$goo['good_id']."\t";
	$strexport.=$goo['good_name']."\t";
	$strexport.=$goo['good_price']."\t";
	$strexport.=$goo['buy_price']."\t";
}
$strexport.=$good['zongfen']."\t";
$strexport.=$good['yuhui']."\t";
$strexport.=$good['sales_money']-$good['yuhui']."\t";
$strexport.=$good['getreal_money']-$good['yuhui']."\t";
$kind_id=$goo['kind_id'];
@$kn=mysql_query("select * from kind where kind_id='$kind_id'");
$kn_n=mysql_fetch_array($kn);
$strexport.=$kn_n['kind_name']."\r";
@$sales=$sales+$good['zongfen'];
$yuhui=$yuhui+$good['yuhui'];
$sales_money=$sales_money+($good['sales_money']-$good['yuhui']);
$money=$money+($good['getreal_money']-$good['yuhui']);
}
$strexport.=$yr."年商品销售情况:\t";
$strexport.="年销售总量:";
$strexport.=$sales."\t";
$strexport.="年优惠总量:";
$strexport.=$yuhui."元\t";
$strexport.="年销售额:";
$strexport.=$sales."元\t";
$strexport.="年利润:";
$strexport.=$money."元\r";
  $strexport=iconv('UTF-8',"GB2312//IGNORE",$strexport);  
  exit($strexport);  
?>