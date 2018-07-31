<meta charset="utf-8" />
<?php
include("../conn/dataconnection.php");
@$obj=$_POST['obj'];//对象
@$type=$_POST['type'];//材料
@$price=$_POST['price'];//价格
@$flower_num=$_POST['flower_num'];//枝数
if(@$obj=='全部'&&@$type!='全部'&&@$price!='全部'&&@$flower_num!='全部'){
//	echo "我是1";
	if(@$price=='150元以下'){
		if($flower_num=='99以上'){
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_price between 0 and 150) and material like '%$type%' and flower_num>99");
		}else{
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_price between 0 and 150) and material like '%$type%' and flower_num='$flower_num'");
		}
	}else if(@$price=='800元以上'){
		if($flower_num=='99以上'){
			$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_price>800) and material like '%$type%' and flower_num>99");	
		}else{
			$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_price>800) and material like '%$type%' and flower_num='$flower_num'");	
		}
		
	}else if(@$price=='250-350元'){
		if($flower_num=='99以上'){
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_price between 250 and 350) and material like '%$type%' and flower_num>99");
		}else{
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_price between 250 and 350) and material like '%$type%' and flower_num='$flower_num'");
		}
	}else if(@$price=='550元-800元'){
		if($flower_num=='99以上'){
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_price between 550 and 800) and material like '%$type%' and flower_num>99");
		}else{
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_price between 550 and 800) and material like '%$type%' and flower_num='$flower_num'");
		}
	}else if($price=='350-550元'){
		if($flower_num=='99以上'){
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_price between 350 and 550) and material like '%$type%' and flower_num>99");
		}else{
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_price between 350 and 550) and material like '%$type%' and flower_num='$flower_num'");
		}
	}
}else if(@$type=='全部'&&@$price!='全部'&&@$flower_num!='全部'&&$obj!='全部'){
//	echo "我是2";
	if(@$price=='150元以下'){
		if($flower_num=='99以上'){
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 0 and 150 and object like '%$obj%' and flower_num>99");
		}else{
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 0 and 150 and object like '%$obj%' and flower_num='$flower_num'");
		}
	}else if(@$price=='800元以上'){
		if($flower_num=='99以上'){
			$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price>800 and object like '%$obj%' and flower_num>99");	
		}else{
			$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price>800 and object like '%$obj%' and flower_num='$flower_num'");	
		}
	}else if(@$price=='250-350元'){
		if($flower_num=='99以上'){
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 250 and 350 and object like '%$obj%' and flower_num>99");
		}else{
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 250 and 350 and object like '%$obj%' and flower_num='$flower_num'");
		}
	}else if(@$price=='550元-800元'){
		if($flower_num=='99以上'){
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 550 and 800 and object like '%$obj%' and flower_num>99");
		}else{
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 550 and 800 and object like '%$obj%' and flower_num='$flower_num'");
		}
	}else if(@$price=='350-550元'){
		if($flower_num=='99以上'){
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 350 and 550 and object like '%$obj%' and flower_num>99");
		}else{
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 350 and 550 and object like '%$obj%' and flower_num='$flower_num'");
		}
	}
}else if(@$price=='全部'&&@$flower_num!='全部'&&$obj!='全部'&&@$type!='全部'){
//	echo "我是3";
	if($flower_num=='99以上'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and object like '%$obj%' and flower_num>99 and material like '%$type%'");
	}else{
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and object like '%$obj%' and flower_num='$flower_num' and material like '%$type%'");
	}
}else if(@$flower_num=='全部'&&@$price!='全部'&&$obj!='全部'&&@$type!='全部'){
//	echo "我是4";
	if(@$price=='150元以下'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_price between 0 and 150) and object like '%$obj%' and material like '%$type%'");
	}else if(@$price=='800元以上'){
		$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_price>800) and object like '%$obj%' and material like '%$type%'");	
	}else if(@$price=='250-350元'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_price between 250 and 350) and object like '%$obj%' and material like '%$type%'");
	}else if(@$price=='550元-800元'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_price between 550 and 800) and object like '%$obj%' and material like '%$type%'");
	}else if($price=='350-550元'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and (good_price between 350 and 550) and object like '%$obj%' and material like '%$type%'");
	}
}else if(@$flower_num=='全部'&&@$price=='全部'&&$obj!='全部'&&@$type!='全部'){
//	echo "我是5";
	@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and object like '%$obj%' and material like '%$type%'");
}else if(@$flower_num=='全部'&&@$price!='全部'&&$obj=='全部'&&@$type!='全部'){
//	echo "我是6";
	if(@$price=='150元以下'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 0 and 150 and  material like '%$type%'");
	}else if(@$price=='800元以上'){
		$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price>800 and material like '%$type%'");	
	}else if(@$price=='250-350元'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 250 and 350 and material like '%$type%'");
	}else if(@$price=='550元-800元'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 550 and 800 and material like '%$type%'");
	}else if($price=='350-550元'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 350 and 550 and material like '%$type%'");
	}
}else if(@$flower_num=='全部'&&@$price!='全部'&&$obj!='全部'&&@$type=='全部'){
//	echo "我是7";
	if(@$price=='150元以下'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 0 and 150 object like '%$obj%'");
	}else if(@$price=='800元以上'){
		$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price>800 and object like '%$obj%'");	
	}else if(@$price=='250-350元'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 250 and 350 and object like '%$obj%'");
	}else if(@$price=='550元-800元'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 550 and 800 and object like '%$obj%'");
	}else if($price=='350-550元'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 350 and 550 and object like '%$obj%'");
	}
}else if(@$flower_num!='全部'&&@$price=='全部'&&$obj=='全部'&&@$type!='全部'){
//	echo "我是8";
	if($flower_num=='99以上'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and  material like '%$type%' and flower_num>99");
	}else{
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and  material like '%$type%' and flower_num='$flower_num'");
	}
	
}else if(@$flower_num!='全部'&&@$price=='全部'&&$obj!='全部'&&@$type=='全部'){
//	echo "我是9";
	if($flower_num=='99以上'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and object like '%$obj%' and flower_num>99");
	}else{
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and object like '%$obj%' and flower_num='$flower_num'");
	}
}else if(@$flower_num!='全部'&&@$price!='全部'&&$obj=='全部'&&@$type=='全部'){
//	echo "我是10";
	if(@$price=='150元以下'){
		if($flower_num=='99以上'){
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 0 and 150 and  flower_num>99");
		}else{
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 0 and 150 and  flower_num='$flower_num'");
		}
		
	}else if(@$price=='800元以上'){
		if($flower_num=='99以上'){
			$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price>800 and flower_num>99");	
		}else{
			$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price>800 and flower_num='$flower_num'");	
		}
		
	}else if(@$price=='250-350元'){
		if($flower_num=='99以上'){
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 250 and 350 and flower_num>99");
		}else{
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 250 and 350 and flower_num='$flower_num'");
		}
	}else if(@$price=='550元-800元'){
		if($flower_num=='99以上'){
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 550 and 800 and flower_num>99");
		}else{
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 550 and 800 and flower_num='$flower_num'");
		}
	}else if($price=='350-550元'){
		if($flower_num=='99以上'){
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 350 and 550 and flower_num>99");
		}else{
			@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 350 and 550 and flower_num='$flower_num'");
		}
	}
}else if($flower_num=='全部'&&$price=='全部'&&$obj=='全部'&&$type!='全部'){
//	echo "我是11";
	@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and material like '%$type%'");
}else if($flower_num=='全部'&&$price=='全部'&&$obj!='全部'&&$type=='全部'){
//	echo "我是12";
	@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and object like '%$obj%'");
}else if($flower_num=='全部'&&$price!='全部'&&$obj=='全部'&&$type=='全部'){
//	echo "我是13";
	if(@$price=='150元以下'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 0 and 150");
	}else if(@$price=='800元以上'){
		$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price>800");	
	}else if(@$price=='250-350元'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 250 and 350");
	}else if(@$price=='550元-800元'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 550 and 800");
	}else if($price=='350-550元'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and good_price between 350 and 550");
	}
}else if($flower_num!='全部'&&$price=='全部'&&$obj=='全部'&&$type=='全部'){
//	echo "我是14";
	if($flower_num=='99以上'){
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and flower_num>99");
	}else{
		@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='鲜花') and flower_num='$flower_num'");
	}
}
@$sql_num=mysql_num_rows($sql);
if(@$sql_num<=0){
	?>
	<div class="row">
		<div class="col-md-12" style="text-align: center;">
			暂无要查询的商品
		</div>
	</div>
	<?php
}else{
	?>
	<table class="table table-hover">
			
		<thead>
			<tr>
				<td colspan="9" align="center">
					<p><b>共：<?php echo $sql_num ?>件商品</b></p>
				</td>
			</tr>
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
		<?php
	while(@$flower=mysql_fetch_array($sql)){
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
		<td colspan="9" align="center">
			<p>共：<?php echo $sql_num ?>件商品</p>
		</td>
	</tr>
	</table>
	<?php
}
?>