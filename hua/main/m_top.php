<div class="row" style="display: block;" id="top">
		<div class="col-md-12" style="width: 100%;margin: 0;padding: 0;">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="border-radius: 0px;">
				<div class="container-fluid">
			    <div class="navbar-header">
			        <a style="color: white;" class="navbar-brand" href="managecenter.php">管理中心</a>
			    </div>
			    <div>
			        <ul class="nav navbar-nav">
			            <li class="dropdown">
			            	 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                    首页 <b class="caret"></b>
			                </a>
			                <ul class="dropdown-menu">
			                    <li><a href="managecenter.php">管理中心首页</a></li>
			                    <li><a href="index.php">网站首页</a></li>
			                </ul>
			            </li>
			            <li class="dropdown">
			            	 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                    系统设置<b class="caret"></b>
			                </a>
			                <ul class="dropdown-menu">
			                    <li><a href="adminmess.php">我的信息</a></li>
			                    <!--<li><a href="#">网站信息</a></li>-->
			                </ul>
			            </li>
			            <li class="dropdown">
			            	 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                    系统查询<b class="caret"></b>
			                </a>
			                <ul class="dropdown-menu">
			                    <li><a href="admin_selectgood.php">商品查询</a></li>
			                    <li><a href="admin_select_sales.php">销量查询</a></li>
			                    <li><a href="admin_selectbook.php">订单查询</a></li>
			                </ul>
			            </li>
			            <li class="dropdown">
			            	 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                    商品销售情况<b class="caret"></b>
			                </a>
			                <ul class="dropdown-menu">
			                    <li><a href="admin_sales_ranking.php">商品月销售排行榜</a></li>
			                    <li><a href="admin_see_year_ranking.php">商品年销售排行榜</a></li>
			                    <li><a href="admin_see_user_ranking.php">用户购物量排行榜</a></li>
			                </ul>
			            </li>
			             <li class="dropdown">
			            	 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                    	用户管理<b class="caret"></b>
			                </a>
			                <ul class="dropdown-menu">
			                    <li><a href="admin_selectgood.php">用户列表</a></li>
			                </ul>
			            </li>
			            <li class="dropdown">
			            	 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                    	评价管理<b class="caret"></b>
			                </a>
			                <ul class="dropdown-menu">
			                    <li><a href="Content_List.php">评价列表</a></li>
			                </ul>
			            </li>
			            <li class="dropdown">
			            	 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                    订单管理<b class="caret"></b>
			                </a>
			                <ul class="dropdown-menu">
			                    <li><a href="Order_List.php">订单列表</a></li>
			                </ul>
			            </li>
			            <li class="dropdown">
			            	 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                    商品管理 <b class="caret"></b>
			                </a>
			                <ul class="dropdown-menu">
			                    <li><a href="type.php">商品类型管理</a></li>
			                    <li><a href="List_goods.php">查看鲜花列表</a></li>
			                    <li><a href="List_goods2.php">查看礼品列表</a></li>
			                    <li><a href="List_goods3.php">查看永生花列表</a></li>
			                    <li><a href="List_goods3.php">查看永生花列表</a></li>
			                    <li><a href="List_goods4.php">查看绿色植物列表</a></li>
			                    <li><a href="addgoods.php">增加商品</a></li>
			                </ul>
			            </li>
			            <li class="dropdown">
			            	 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                    公告管理<b class="caret"></b>
			                </a>
			                <ul class="dropdown-menu">
			                    <li><a href="know_type.php">公告类型</a></li>
			                    <li><a href="add_know_type.php">添加公告</a></li>
			                    <li><a href="List_know.php">公告列表</a></li>
			                    <!--<li class="divider"></li>
			                    <li><a href="#">分离的链接</a></li>
			                    <li class="divider"></li>
			                    <li><a href="#">另一个分离的链接</a></li>-->
			                </ul>
			            </li>
			            <li class="dropdown">
			            	 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                    留言管理<b class="caret"></b>
			                </a>
			                <ul class="dropdown-menu">
			                    <li><a href="ly_list.php">留言列表</a></li>
			           
			                </ul>
			            </li>
			            <li class="dropdown">
			            	 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                    付款方式管理<b class="caret"></b>
			                </a>
			                <ul class="dropdown-menu">
			                    <li><a href="addget_money.php">增加付款方式</a></li>
			                    <li><a href="money_list.php">付款方式列表</a></li>
			                   
			                </ul>
			            </li>
			            <li class="dropdown">
			                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                    修改密码和退出系统<b class="caret"></b>
			                </a>
			                <ul class="dropdown-menu">
			                    <li><a href="adminupdatepass.php">修改密码</a></li>
			                    <li><a href="amind_sign.php">退出</a></li>
			                    
			                </ul>
			            </li>
			            <li style="color: white;"><a style="color: white;">
			            	当前用户：<?php echo @$_SESSION['admin_name']; ?>
			            </a></li>
			            <!--<li style="color: white;"><a href="#" style="color: white;">
			            	退出系统
			            </a></li>-->
			        </ul>
			    </div>
				</div>
			</nav>
		</div>
	</div>