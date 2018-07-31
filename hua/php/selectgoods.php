<table align="center" style="width: 80%;">
						<tr>
					<td>商品名称</td>
					<td>商品售价</td>
					<td>进口价</td>
					<td>销量</td>
					<td>总量</td>
					<td>库存</td>
					<td>用途</td>
					<td>适合节日</td>
					<td>适合对象</td>
					<td>入库时间</td>
					<td>操作</td>
				</tr>
								
								<?php
								while($mess=mysql_fetch_array($SQL)){
								?>
								<tr>
							<td><?php echo $mess['good_name'] ?></td>
							<td><?php echo $mess['good_price'] ?></td>
							<td><?php echo $mess['buy_price'] ?></td>
							<td><?php echo $mess['sales'] ?></td>
							<td><?php echo $mess['sum'] ?></td>
							<td><?php echo $mess['good_num'] ?></td>
							<td><?php echo $mess['good_use'] ?></td>
							<td><?php echo $mess['festival'] ?></td>
							<td><?php echo $mess['object'] ?></td>
							<td><?php echo $mess['good_time'] ?></td>
							<td>
								<a href="delgood.php?good_id=<?php echo $mess['good_id'] ?>">删除</a>
								<a href="see_good.php?good_id=<?php echo $mess['good_id']; ?>" =<?php echo $mess['good_id'] ?>">查看</a>
							</td>
							</tr>
							
								<?php	
								}
								?>
									
				<tr>
				<td colspan="12" align="center">
					<?php  
		$pr=$page-1;
		$pn=$page+1;
		if($page<=1){
			echo "第一页｜上一页";
		}else{
			echo "<a href='selectgood.php?page=1&keyword=$key&ty=$type&tj=tj'>第一页</a><a href='selectgood.php?page=$pr&keyword=$key&ty=$type&tj=tj'>上一页</a>";
		}
		if($page>=$number){
			echo "下一页｜未页";
		}else{
			echo "<a href='selectgood.php?page=$pn&keyword=$key&ty=$type&tj=tj'>下一页</a>&nbsp;&nbsp;&nbsp;<a href='selectgood.php?page=$number&keyword=$key&ty=$type&tj=tj'>未页</a>";
		}
						?>
						<a href="managecenter.php">返回管理中心</a>&nbsp;&nbsp;&nbsp;<a href="book.php">返回上一页</a><h3>共<?php echo $num; ?>条查询结果</h3>
				</td>
			</tr>
								</table>