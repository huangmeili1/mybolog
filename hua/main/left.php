<meta charset="utf-8" />
<?php

?>
<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
<style>
body, html { height: 100%; background: #F2F2F2; overflow: hidden; }
* { margin: 0; padding: 0 }
body { font: 14px "微软雅黑", "FontAwesome", "Arial Narrow", HELVETICA; -webkit-text-size-adjust: 100%; }
li { list-style: none }
a { text-decoration: none; }
/* navMenu */
.navMenubox { width: 100%; height: 900px; background-color: lightblue;  }
.navMenu-top { padding: 10px; color: #fff; border-bottom: 1px solid rgba(255,255,255,.1) }
.navMenu> li { display: block; margin: 0; padding: 0; border: 0px; }
.navMenu>li>a { display: block; overflow: hidden; padding-left: 0px; line-height: 40px; color: blue; transition: all .3s; position: relative; text-decoration: none; font-size: 17px; border-top: 1px solid #222932; border-bottom: 2px solid #191e24; }
.navMenu > li:nth-of-type(1)> a { border-top: 1px solid transparent; }
.navMenu > li:last-child > a { border-bottom: 1px solid transparent; }
.navMenu>li>a>i { font-size: 20px; float: left; font-style: normal; margin: 0 5px; }
.navMenu li a .arrow:before { display: block; float: right; margin-top: 1px; margin-right: 15px; display: inline; font-size: 16px; font-family: FontAwesome; height: auto; content: "\f105"; font-weight: 300; text-shadow: none; }
.navMenu li a .arrow.open:before { float: right; margin-top: 1px; margin-right: 15px; display: inline; font-family: FontAwesome; height: auto; font-size: 16px; content: "\f107"; font-weight: 300; text-shadow: none; }
.navMenu>li>a.active, .navMenu>li>a:hover { color: #FFF; background: #12181b; }
.navMenu>li>ul.sub-menu, .navMenu>li>ul.sub-menu>li>ul.sub-menu { display: none; list-style: none; clear: both; margin: 8px 0px 0px 10px; padding-bottom: 5px; }
.navMenu>li.active > ul.sub-menu, .navMenu>li>ul.sub-menu>li.active >ul.sub-menu { }
.navMenu>li>ul.sub-menu li { background: none; margin: 0px; padding: 0px; }
.navMenu>li>ul.sub-menu li>a { display: block; font-size: 16px; line-height: 36px; padding-left: 20px; color: black; clear: both; }
.navMenu>li>ul.sub-menu li>a.active, .navMenu>li>ul.sub-menu li>a:hover, .navMenu>li>ul.sub-menu>li.active >a { color: #FFF; background: #12181b; }
.icon_1:before { content: "\f0ac"; }
.icon_2:before { content: "\f0ac"; }
.icon_3:before { content: "\f0ac"; }
/*---------------------*/
</style>
</head>
<body>
<div class="navMenubox">
  <div id="slimtest1">
    <ul class="navMenu">
      <li> <a href="javascript:;" class="afinve"> <i class="icon_1"></i> <span class="">首页</span> <span class="arrow"></span> </a>
        <ul class="sub-menu">
          <li><a href="javascript:window.location.href='managecenter.php';"><span>管理中心首页</span></a></li>
          <li><a href="javascript:window.location.href='index.php';"><span>系统首页</span></a></li>
          </li>
        </ul>
     </li>
      <li > <a href="javascript:;" class="afinve"> <i class="icon_2"></i> <span class="nav-text">系统设置</span> <span class="arrow"></span> </a>
        <ul class="sub-menu">
          <li><a href="javascript:window.location.href='adminmess.php';" ><span>我的信息</span></a></li>
          <!--<li><a href="javascript:window.location.href='webmessage.php';"><span>网站信息</span></a></li>-->
           <?php
          	if(@$_SESSION['type']=='超级管理员'){?>
          	<li><a href="javascript:window.location.href='add_manage.php';"><span>添加管理员</span></a></li>	
          	<li><a href="javascript:window.location.href='see_manage.php';"><span>查看管理员</span></a></li>	
          	<?php }
          	?>
        </ul>
      </li>
      <li > <a href="javascript:;" class="afinve"> <i class="icon_3"></i> <span class="nav-text">系统查询</span> <span class="arrow"></span> </a>
        <ul class="sub-menu">
        	<li><a href="javascript:window.location.href='admin_select_sales.php';"  class="afinve"><span>销量查询</span></a></li>
          <li><a href="javascript:window.location.href='admin_selectgood.php';"><span>商品查询</span></a></li>
          <li><a href="javascript:window.location.href='admin_selectbook.php';"><span>订单查询</span></a></li>
        </ul>
      </li>
       <li > <a href="javascript:;" class="afinve"> <i class="icon_3"></i> <span class="nav-text">商品销售情况</span> <span class="arrow"></span> </a>
        <ul class="sub-menu">
        	<li><a href="javascript:window.location.href='admin_sales_ranking.php';"  class="afinve"><span>商品月销售排行榜</span></a></li>
          <li><a href="javascript:window.location.href='admin_see_year_ranking.php';"><span>商品年销售排行榜</span></a></li>
           <li><a href="javascript:window.location.href='admin_see_user_ranking.php';"><span>用户购物量排行榜</span></a></li>
        </ul>
      </li>
      <li> <a href="javascript:;" class="afinve"> <i class="icon_3"></i> <span class="nav-text">用户管理</span> <span class="arrow"></span> </a>
        <ul class="sub-menu">
          <li><a href="javascript:window.location.href='User_List.php';"  class="afinve"><span>用户列表</span></a></li>
        </ul>
      </li>
      <li> <a href="javascript:;" class="afinve"> <i class="icon_3"></i> <span class="nav-text">评价管理</span> <span class="arrow"></span> </a>
        <ul class="sub-menu">
          <li><a href="javascript:window.location.href='Content_List.php';"  class="afinve"><span>评价列表</span></a></li>
        </ul>
      </li>
      <li> <a href="javascript:;" class="afinve"> <i class="icon_3"></i> <span class="nav-text">订单管理</span> <span class="arrow"></span> </a>
        <ul class="sub-menu">
          <li><a href="javascript:window.location.href='Order_List.php';"  class="afinve"><span>订单列表</span></a></li>
        </ul>
      </li>
        <li> <a href="javascript:;" class="afinve"> <i class="icon_1"></i> <span class="">商品管理</span> <span class="arrow"></span> </a>
        <ul class="sub-menu">
         <!-- <li><a href="javascript:window.location.href='type.php';"><span>商品类型管理</span></a></li>-->
          <li><a href="javascript:window.location.href='List_goods.php';"><span>查看鲜花列表</span></a></li>
          <li><a href="javascript:window.location.href='List_goods2.php';"><span>查看礼品列表</span></a></li>
          <li><a href="javascript:window.location.href='List_goods3.php';"><span>查看永生花列表</span></a></li>
          <li><a href="javascript:window.location.href='List_goods4.php';"><span>查看绿色植物列表</span></a></li>
           <li><a href="javascript:window.location.href='addgoods.php';"><span>增加商品</span></a></li>
        </ul>
     </li>
      <li> <a href="javascript:;" class="afinve"> <i class="icon_1"></i> <span class="">公告管理</span> <span class="arrow"></span> </a>
        <ul class="sub-menu">
        	 <li><a href="javascript:window.location.href='List_know.php';"><span>公告列表</span></a></li>
          <li><a href="javascript:window.location.href='know_type.php';"><span>公告类型</span></a></li>
          <li><a href="javascript:window.location.href='add_know_type.php';"><span>添加公告</span></a></li>
        
        </ul>
     </li>
      <li> <a href="javascript:;" class="afinve"> <i class="icon_1"></i> <span class="">留言管理</span> <span class="arrow"></span> </a>
        <ul class="sub-menu">
          <li><a href="javascript:window.location.href='ly_list.php';"><span>留言列表</span></a></li>
        </ul>
     </li>
     <li> <a href="javascript:;" class="afinve"> <i class="icon_1"></i> <span class="">付款方式管理</span> <span class="arrow"></span> </a>
        <ul class="sub-menu">
          <li><a href="javascript:window.location.href='money_list.php';"><span>付款方式列表</span></a></li>
          <li><a href="javascript:window.location.href='addget_money.php';"><span>增加付款方式</span></a></li>
        </ul>
     </li>
     <li> <a href="javascript:;" class="afinve"> <i class="icon_1"></i> <span class="">修改密码和退出</span> <span class="arrow"></span> </a>
        <ul class="sub-menu">
          <li><a href="javascript:window.location.href='adminupdatepass.php';"><span>修改密码</span></a></li>
          <li><a href="javascript:window.location.href='amind_sign.php';"><span>退出</span></a></li>
        </ul>
     </li>
    </ul>
  </div>
</div>
<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
<script src="../js/jquery.slimscroll.min.js"></script> 
<script src="../js/jquery.min.js"></script> 
<script>
$(function(){
    // nav收缩展开
     $('.navMenu li a').on('click',function(){
			 var parent = $(this).parent().parent();//获取当前页签的父级的父级
			 var labeul =$(this).parent("li").find(">ul")	 
             if ($(this).parent().hasClass('open') == false) {
                //展开未展开
				   parent.find('ul').slideUp(300);
				   parent.find("li").removeClass("open")
				   parent.find('li a').removeClass("active").find(".arrow").removeClass("open")
                  $(this).parent("li").addClass("open").find(labeul).slideDown(300);
				  $(this).addClass("active").find(".arrow").addClass("open")
            }else{
				 $(this).parent("li").removeClass("open").find(labeul).slideUp(300);
				  if($(this).parent().find("ul").length>0){
					$(this).removeClass("active").find(".arrow").removeClass("open")
				  }else{
					$(this).addClass("active") 
				  }
            }
      
    });
});
</script>
<script type="text/javascript">
	function loadPage(page){
		$("#aa5").load(page);
	}
</script>