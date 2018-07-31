<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>商品查询</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body{
		margin-top: 70px;
	}
    span{display: inline-block;
       cursor: pointer; padding: 8px; border: 1px solid #999;
       margin-top: 10px;
       }
   span.active{
       background-color: #c14d00;
   }
</style>
<?php
	session_start();
	include_once("../conn/dataconnection.php");
	if(@$_SESSION['admin_id']!=''&&@$_SESSION['type']!=''&&@$_SESSION['admin_name']!=''){
		?>
		<div class="container" style="width: 100%;">
			<?php include("m_top.php"); ?>
				<div class="row">
					<div class="col-md-12" style="text-align: center;font-size: 24px;">商品查询</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div style="margin-left: 200px;">
							<div id="direction">
							   <strong>对象：</strong>
							    <span class="active">全部</span>
							    <span>长辈</span>
							    <span>女朋友</span>
							    <span>朋友</span>
							    <span>父母</span>
							</div>
							<div id="type">
							    <strong>价格：</strong>
							    <span class="active">全部</span>
							    <span>150元以下</span>
							    <span>250-350元</span>
							    <span>350-550元</span>
							    <span>550元-800元</span>
							    <span>800元以上</span>
							</div>
							<div id="category">
							    <strong>材料：</strong>
							    <span class="active">全部</span>
							    <span>玫瑰</span>
							    <span>红玫瑰</span>
							    <span>粉玫瑰</span>
							    <span>白玫瑰</span>
							    <span>紫玫瑰</span>
							    <span>蓝玫瑰</span>
							    <span>康乃馨</span>
							    <span>向日葵</span>
							    <span>扶郞</span>
							    <span>郁金香</span>
							    <span>百合</span>
							</div>
							<div id="flower_num">
							    <strong>枝数：</strong>
							    <span class="active">全部</span>
							    <span>9</span>
							    <span>10</span>
							    <span>11</span>
							    <span>12</span>
							    <span>16</span>
							    <span>18</span>
							    <span>19</span>
							    <span>20</span>
							    <span>22</span>
							    <span>29</span>
							    <span>33</span>
							    <span>36</span>
							    <span>50</span>
							    <span>60</span>
							    <span>66</span>
							    <span>99</span>
							    <span>99以上</span>
							</div>
							<strong>查询条件：</strong>
							<div id="Res" style="font-size: 20px;"></div>
					</div>
					</div>
				</div>
				<?php
	$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') order by sales desc");
	@$num=mysql_num_rows($sql);
	if(@$num<=0){
			?>
			<div class="row" style="width: 80%;margin: 0 auto;">
				<div class="col-md-12" style="margin: 0 auto;">
					<span style="margin-left: 400px;">暂无商品，请<a class="btn btn-danger btn-lg" href="addgoods.php">添加商品</a></span>
				</div>
			</div>
			<?php
			}else{
				?>
					<div class="row" id="showgood">
						<div class="col-md-12" style="background-color:white;">
							<table class="table table-hover" style="border: 1px solid black;">
								<thead>
									<tr>
										<th>商品图片</th>
										<th>商品名称</th>
										<th>商品现价</th>
										<th>商品原价</th>
										<th>商品成本价</th>
										<th>销量</th>
										<th>库存</th>
										<th>适合对象</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$pagesize=20;
										if(isset($_GET['page'])){
											$page=$_GET['page'];
										}else{
											$page=1;
										}
									    $number=ceil($num/$pagesize);
									    $ps=($page-1)*$pagesize;
									    $SQL=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') order by sales desc limit $ps,$pagesize");
										while($flower=mysql_fetch_array($SQL)){
											?>
											<tr>
												<td>
													<div class="thumbnail" style="padding: 0;margin: 0;width: 100px;">
														<img src="<?php echo $flower['main_img']; ?>" />
													</div>
												</td>
												<td style="line-height: 100px;"><?php echo $flower['good_name']; ?></td>
												<td style="line-height: 100px;">￥<?php echo $flower['good_price']; ?></td>
												<td style="line-height: 100px;">￥<?php echo $flower['prime_cost']; ?></td>
												<td style="line-height: 100px;">￥<?php echo $flower['buy_price']; ?></td>
												<td style="line-height: 100px;"><?php echo $flower['sales']; ?></td>
												<td style="line-height: 100px;"><?php echo $flower['good_num'] ?></td>
												<td style="line-height: 100px;"><?php echo $flower['object'] ?></td>
												<td style="line-height: 100px;">
													<a href="see_good.php?good_id=<?php echo $flower['good_id'] ?>">查看</a>
													<a href="update_good.php?good_id=<?php echo $flower['good_id'] ?>">修改</a>
													<a href="del_goods.php?good_id=<?php echo $flower['good_id']; ?>">删除</a>
												</td>
											</tr>
											<?php
										}
										?>
										<tr>
											<td colspan="9" style="text-align: center;">
									   				<p style="font-size: 20px;"><?php echo $page; ?>-<?php echo $number; ?>页/共<?php echo $num; ?>件商品</p>
									   				<?php
													$pr=$page-1;
													$pn=$page+1;
													?>
														<?php
															if($number>=9){
																?>
																<ul class="pagination pagination-lg" style="float: right;">
																				<?php
																		if($page<=1){
																			?>
																			<li class="disabled"><a style="color: darkgray;">&laquo;上一页</a></li>
																			<?php 
																			}else{
																				?>
																				<li><a href="admin_selectgood.php?page=<?php echo $pr; ?>">&laquo;上一页</a></li>
																				<?php
																			}
																				?>
																				
																				<li><a href="admin_selectgood.php?page=1">1</a></li>
																				<li><a href="admin_selectgood.php?page=2">2</a></li>
																				<li><a href="admin_selectgood.php?page=3">3</a></li>
																				<li><a href="admin_selectgood.php?page=4">4</a></li>
																				<li><a href="admin_selectgood.php?page=5">5</a></li>
																				<li><a href="admin_selectgood.php?page=6">6</a></li>
																				<li class="disabled"><span>.....</span></li>
																				<li><a href="admin_selectgood.php?page=<?php echo $number; ?>"><?php echo $number; ?></a></li>
																				<?php
																		if($page>=$number){
																		?>
																		<li class="disabled"><p style="color: darkgray;">下一页&raquo;</p></li>
																		<?php
																		}else{
																			?>
																			<li><a href="admin_selectgood.php?page=<?php echo $pn; ?>">下一页&raquo;</a></li>
																			<?php
																		}
																			?>
																				
																		</ul>
																<?php
															}else{
																?>
																<ul class="pagination pagination-lg" style="float: right;">
																				<?php
																		if($page<=1){
																			?>
																			<li class="disabled"><a style="color: darkgray;">&laquo;上一页</a></li>
																			<?php 
																			}else{
																				?>
																				<li><a href="admin_selectgood.php?page=<?php echo $pr; ?>">&laquo;上一页</a></li>
																				<?php
																			}
																				?>
																				<?php
																					for($i=1;$i<=$number;$i++){
																						?>
																						<li><a href="admin_selectgood.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
																						<?php
																					}
																					?>
																				<?php
																		if($page>=$number){
																		?>
																		<li class="disabled"><a style="color: darkgray;">下一页&raquo;</a></li>
																		<?php
																		}else{
																			?>
																			<li><a href="admin_selectgood.php?page=<?php echo $pn; ?>">下一页&raquo;</a></li>
																			<?php
																		}
																			?>
																				
																		</ul>
																<?php
															}
															?>
											
										
										
														
													</tr>
												</table>
											</td>
										</tr>
								</tbody>
							</table>
						</div>
					</div>
				<?php
			}
		?>
		</div>
	<?php
	 }else{
	echo "<script>alert('请登录');window.location.href='managelogin.php';</script>";}  ?>
<script>
    var dSpan = document.getElementById('direction').getElementsByTagName('span');//方向下
    var cSpan = document.getElementById('category').getElementsByTagName('span');//分类
    var tSpan = document.getElementById('type').getElementsByTagName('span');//类型
    var fSpan=document.getElementById("flower_num").getElementsByTagName("span");//枝数
    var aSpan = document.getElementsByTagName('span');
    var oDirection = document.getElementById('direction');
    var oCategory = document.getElementById('category');
    var oType = document.getElementById('type');
    var oFolwer_num=document.getElementById("flower_num");
    var oRes = document.getElementById('Res');
    dSpan[0].className = 'active';
    cSpan[0].className = 'active';
    tSpan[0].className = 'active';
    for(var i=0; i<aSpan.length; i++){
        aSpan[i].onclick = function(){
            var siblings = this.parentNode.children;//父亲节点的所有孩子结点遍历
            for(var j=0; j<siblings.length; j++){
                siblings[j].className = '';
            }
            this.className = 'active';
            if(this.parentNode==oFolwer_num||this.parentNode == oDirection || this.parentNode == oCategory || this.parentNode == oType){//判断父结点
                returnRes();
            }
        }
    }

    function returnRes(){
        var o1 = 0, o2 = 0, o3 = 0,o4=0;
        for(var i=0; i<dSpan.length; i++){
            if(dSpan[i].className == 'active'){//获取选中的值
                o1 = i;
            }
        }
        for(var i=0; i<cSpan.length; i++){
            if(cSpan[i].className == 'active'){//获取选中的值
                o2 = i;
            }
        }
        for(var i=0; i<tSpan.length; i++){
            if(tSpan[i].className == 'active'){//获取选中的值
                o3 = i;
            }
        }
        for(var i=0; i<fSpan.length; i++){
            if(fSpan[i].className == 'active'){//获取选中的值
                o4= i;//记录下所选位置
            }
        }
      oRes.innerHTML = (dSpan[o1].innerHTML + "," + tSpan[o3].innerHTML + "," +cSpan[o2].innerHTML +","+fSpan[o4].innerHTML);
    	var obj=dSpan[o1].innerHTML;
    	var type=cSpan[o2].innerHTML;
    	var price=tSpan[o3].innerHTML;
    	var flower_num=fSpan[o4].innerHTML;
    	if(obj=='全部'&&type=='全部'&&price=='全部'&&flower_num=='全部'){
    		window.location.href="admin_selectgood.php";
    	}else{
    		var url="admin_selectgood2.php";
    		var data={"obj":obj,"type":type,"price":price,"flower_num":flower_num};
    		var success=function(reponse){
    			$("#showgood").html(reponse);
    		}
    		$.post(url,data,success,"html");
    	}
    	
    }
</script>