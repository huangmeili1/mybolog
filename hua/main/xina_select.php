<?php
 include("../conn/dataconnection.php");
  ob_end_clean();
  @$sel=$_GET['sel'];
  @$keywrod=$_GET['keyword'];
  if($sel=='节日'){
  	@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and festival like '%$keywrod%' order by good_time desc");
  }else if($sel=='对象'){
  	$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and object like '%$keywrod%' order by good_time desc");
  }else if($sel=='枝数'){
  	$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and flower_num='$keywrod' order by good_time desc");
  }else if($sel=='花材'){
  	$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and material like'%$keywrod%' order by good_time desc");
  }else if($sel=='用途'){
  	$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_use like'%$keywrod%' order by good_time desc");
  }
  $filename=$sel.$keywrod."鲜花商品情况";
  header("Content-type:application/vnd.ms-excel");  
  header("Content-Disposition:filename=".$filename.".xls");
  $strexport="编号\t商品编号\t商品名称\t朵数\t材料\t商品现价(单位：元)\t商品原价(单位：元)\t商品成本价(单位：元)\t销量\t库存\t商品总量\t适合对象\t适合节日\t适合用途\t入库时间\t浏览量\r";
//
//
  $i=0;
  while($f=mysql_fetch_array($sql)){
  	$i++;
  	$strexport.=$i."\t";
  	$strexport.=$f['good_id']."\t";
  	$strexport.=$f['good_name']."\t";
  	$strexport.=$f['flower_num']."\t";
	$strexport.=$f['material']."\t";
	$strexport.=$f['good_price']."\t";
	$strexport.=$f['prime_cost']."\t";
	$strexport.=$f['buy_price']."\t";
	$strexport.=$f['sales']."\t";
	$strexport.=$f['good_num']."\t";
	$strexport.=$f['sum']."\t";
	$strexport.=$f['object']."\t";
	$strexport.=$f['festival']."\t";
	$strexport.=$f['good_use']."\t";
	$strexport.=$f['good_time']."\t";
	$strexport.=$f['see']."\r";
  }   
  $strexport=iconv('UTF-8',"GB2312//IGNORE",$strexport);  
  exit($strexport);  
?>