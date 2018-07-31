<?php
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
require_once ('jpgraph/jpgraph_bar.php');
require_once ('jpgraph/jpgraph_pie.php');
require_once ('jpgraph/jpgraph_pie3d.php');
include("../conn/dataconnection.php");
 //连接数据库
$acct_yr = $_GET['acct_yr'];    //获取参数
$start_mth = $_GET['start_mth'];    //获取参数
$end_mth = $_GET['end_mth'];    //获取参数
$choose = $_GET['graph'];    //获取参数
     //执行SQL, 获得销量值
$query_rs_prod = "SELECT DISTINCT(acct_mth) FROM summary WHERE acct_yr = '$acct_yr' and acct_mth between '$start_mth' and '$end_mth'";
$rs_prod = mysql_query($query_rs_prod, $conn) or die(mysql_error());
$totalRows_rs_prod=mysql_num_rows($rs_prod);
$yu=array();
$i=-1;
$amount=array();
$money=array();
$sum_money=array();
$sum_order=array();
while($row_rs_prod=mysql_fetch_assoc($rs_prod)){
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
//输出3D饼图
switch($choose)
{
   case 1://x-y图
$graph=new Graph(1500,800);
$graph->img->SetMargin(80,30,80,60);
$aAxisType='textint';
$graph->SetScale($aAxisType);
$graph->title->Set(iconv("UTF-8","GB2312//IGNORE",$acct_yr."年".$start_mth."~".$end_mth."月商品销量统计图"));
$graph->xaxis->title->Set(iconv("UTF-8","GB2312//IGNORE","月份"));
$graph->yaxis->title->Set(iconv("UTF-8","GB2312//IGNORE","销量"));
$graph->title->SetFont(FF_SIMSUN,FS_BOLD);
$graph->yaxis->title->SetFont(FF_SIMSUN,FS_BOLD);
$graph->xaxis->title->SetFont(FF_SIMSUN,FS_BOLD);
$graph->xaxis->SetTickLabels($yu);
$linePlot=new LinePlot($amount);
$linePlot2=new LinePlot($money);
$linePlot3=new LinePlot($sum_money);
//$linePlot->SetLegend('tuli');
$graph->Add($linePlot);
$graph->Add($linePlot2);
$graph->Add($linePlot3);
$linePlot->value->show();
//设置统计图色
$linePlot->SetColor("red");
$linePlot2->SetColor("green");                                                                            //设置颜色
$linePlot3->SetColor("blue");
$linePlot->SetLegend(iconv("UTF-8","GB2312//IGNORE","sales volume"));                                                          //设置图例名称
$linePlot2->SetLegend("amount of money");
$linePlot3->SetLegend("Profit");
$graph->legend->SetLayout(LEGEND_HOR);                                                  //设置图例样式和位置
$graph->legend->Pos(0.5,0.96,"center","bottom");

break;
   case 2://柱形图
//创建背景图
$graph=new Graph(900,700,"auto");
//设置刻度样式
$graph->SetScale("textlin");
//设置边界范围
$graph->img->SetMargin(50,30,80,100);
//设置标题
$graph->title->Set(iconv("UTF-8","GB2312//IGNORE",$acct_yr."年".$start_mth."~".$end_mth."月商品销量统计图"));
$graph->xaxis->title->Set(iconv("UTF-8","GB2312//IGNORE","单位(月份)"));
//$graph->yaxis->title->Set(iconv("UTF-8","GB2312//IGNORE","销量"));
$graph->title->SetFont(FF_SIMSUN,FS_BOLD,20);
$graph->yaxis->title->SetFont(FF_SIMSUN,FS_BOLD);
$graph->xaxis->title->SetFont(FF_SIMSUN,FS_BOLD,15);
$graph->xaxis->SetFont(FF_SIMSUN,FS_BOLD,15);
$graph->xaxis->SetColor('black');
//得到柱形图对象
$graph->xaxis->SetTickLabels($yu);
$barPlot=new BarPlot($amount);
$barPlot2= new BarPlot($money);
$barPlot3= new BarPlot($sum_money);
//设置柱形图图例
$barPlot->SetFillColor('orange@0.4');
$barPlot2->SetFillColor('brown@0.4');
$barPlot->SetLegend(iconv("UTF-8","GB2312//IGNORE","sales volume"));
$barPlot2->SetLegend(iconv("UTF-8","GB2312//IGNORE","amount of money"));
$barPlot3->SetLegend(iconv("UTF-8","GB2312//IGNORE","Profit"));
$graph->legend->Pos(0.5,0.95,"right","center");
//$barPlot->SetLegend("beijing");
//显示柱形图代表数据的值
//将柱形图加入到背景图
$gbarplot= new GroupBarPlot(array($barPlot3,$barPlot2,$barPlot));
$gbarplot->SetWidth(0.5);
$graph->Add($gbarplot);
$barPlot->value->show();
$barPlot2->value->show();
$barPlot3->value->show();
//设置柱形图填充颜色
$barPlot->setfillcolor("yellow");
//设置边框颜色
$barPlot->SetColor("red");
break;
   case 3://饼图
//创建画布
$graph=new PieGraph(800,500);
//设置图像边界范围
$graph->img->SetMargin(30,30,80,30);
//设置标题
$graph->title->Set(iconv("UTF-8","GB2312//IGNORE",$acct_yr."年".$start_mth."~".$end_mth."月商品销量统计图"));
$graph->title->SetFont(FF_SIMSUN,FS_BOLD);
//得到饼图对象
$piePlot=new PiePlot($amount);
//设置图例
$piePlot->SetCenter(0.4);   
//设置图例位置
$piePlot->SetLegends($yu);
//设置图例位置
$graph->legend->Pos(0.1,0.15,"left","center");
//添加到画布中
$graph->Add($piePlot);
//输出
break;
case 4://3D饼图
//创建画布
$graph=new pieGraph(800,600);
//设置图像边界范围
$graph->img->SetMargin(30,30,80,30);
//设置标题
$graph->title->Set(iconv("UTF-8","GB2312//IGNORE",$acct_yr."年".$start_mth."~".$end_mth."月商品销量统计图"));
$graph->title->SetFont(FF_SIMSUN,FS_BOLD);
//得到3D饼图对象
$piePlot3d=new piePlot3d($amount);
//设置图例
$graph->SetMarginColor("white");
$piePlot3d->SetLegends($yu);
//设置图例位置
$graph->legend->Pos(0.1,0.15,"left","center");
//将绘制好的3D饼图加入到画布中
$graph->Add($piePlot3d);
break;
   default:
echo "graph参数错误";
exit;
}
$graph->Stroke();
?>