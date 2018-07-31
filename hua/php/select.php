<table align="center" style="width: 80%;">
						<tr>
							<td>用户编号</td>
							<td>用户名</td>
							<td>用户密码</td>
							<td>真实姓名</td>
							<td>性别</td>
							<td>电话</td>
							<td>注册时间</td>
							<td>操作</td>
						</tr>
								
								<?php
								while($mess=mysql_fetch_array($SQL)){
								?>
								<tr>
							<td><?php echo $mess['user_id'] ?></td>
							<td><?php echo $mess['user_name'] ?></td>
							<td><?php echo $mess['user_pass'] ?></td>
							<td><?php echo $mess['realname'] ?></td>
							<td><?php echo $mess['sex'] ?></td>
							<td><?php echo $mess['user_tel'] ?></td>
							<td><?php echo $mess['user_time'] ?></td>
							<td><a href="deluser.php?user_id=<?php echo $mess['user_id'] ?>">删除</a></td>
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
			echo "<a href='selectuser.php?page=1&keyword=$key&ty=$type&tj=tj'>第一页</a><a href='selectuser.php?page=$pr&keyword=$key&ty=$type&tj=tj'>上一页</a>";
		}
		if($page>=$number){
			echo "下一页｜未页";
		}else{
			echo "<a href='selectuser.php?page=$pn&keyword=$key&ty=$type&tj=tj'>下一页</a>&nbsp;&nbsp;&nbsp;<a href='selectuser.php?page=$number&keyword=$key&ty=$type&tj=tj'>未页</a>";
		}
						?>
						<a href="managecenter.php">返回管理中心</a>&nbsp;&nbsp;&nbsp;<a href="usermessage.php">返回上一页</a><h3>共<?php echo $num; ?>条查询结果</h3>
				</td>
			</tr>
								</table>