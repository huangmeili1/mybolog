<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>花间杂物铺首页-礼品</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	#rating li{
		list-style: none;
		float: left;
		font-size: 20px;
		padding: 10px;
	}
</style>
<?php

?>
<div class="container" style="width: 100%;">
	<?php
		include("top.php");
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="thumbnail" style="border: 0;padding: 0;">
					<div class="row">
						<div class="col-md-12" style="text-align: center;padding: 0;margin: 0;height: 180px;width: 100%;background: url(../img/green_top.png);background-size: cover;background-position-x: -230px;background-repeat: no-repeat;">
							<span style="line-height: 180px;color: white;font-size: 30px;">礼品</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="width: 80%;margin: 0 auto;height: auto;margin-top: 30px;">
			<ul class="rating" id="rating">
				<li><button class="btn btn-default" id="button1" style="text-decoration: none;" onclick="change_type(1)">销量</button></li>
				<li><button class="btn btn-default" id="button2" style="text-decoration: none;" onclick="change_type(2)">价格</button></li>
				<li><button class="btn btn-default" id="button3" style="text-decoration: none;" onclick="change_type(3)">最新</button></li>
			</ul><br>
			<hr size="4" color="gray" />
		</div>
		<div id="show_goods" class="row" style="width: 80%;margin: 0 auto;height: auto;margin-top: 20px;">
			<?php
				@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='礼品')");
				@$sql_num=mysql_num_rows($sql);
				if(@$sql_num<=0){
					?>
					<div class="col-md-12">
						<span style="text-align: center;">暂无礼品<a class="btn btn-danger" href="flower.php">查看其他鲜花</a></span>
					</div>
					<?php
				}else{
					while($feover=mysql_fetch_array($sql)){
						?>
						<div style="margin-top: 20px;" onmouseleave="change_thing2(<?php echo $feover['good_id']; ?>)" onmouseover="change_thing(<?php echo $feover['good_id']; ?>)" id="div<?php echo $feover['good_id']; ?>" class="col-md-3" >
							<div class="thumbnail" style="width: 100%;height: 380px;border: 0;padding: 0;">
								<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $feover['good_id'] ?>">
								<img style="width: 100%;height: 280px;" src="<?php echo $feover['main_img']; ?>" />
								<div class="caption" style="text-align: center;">
									<?php
										echo $feover['good_name'];
										?>
										<p class="text-muted">
											<div style="width:100%; white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
												<?php echo $feover['material']; ?>
											</div>  
										</p>
										<p><b>￥<?php echo $feover['good_price']; ?></b></p>
								</div>
								</a>
							</div>
						</div>
						<?php
					}
					?>
					<?php
				}
				?>
		</div>
</div>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
	function change_thing(good_id){
		var div=document.getElementById("div"+good_id);
		div.style.boxShadow="5px 5px 5px 5px #888888";
		
	}
	function change_thing2(good_id){
		var div=document.getElementById("div"+good_id);
		div.style.boxShadow="none";
	}
</script>
<script type="text/javascript">
	var $val = $('#ajax-test-val'),
	// 获取当前页面的标记
	m = window.location.search.match(/\?mess=(\d+)/);
//	alert(m);
	// 新进入页面，通过url中的标记初始化数据
	if (m&&m!='') {
	increaseVal(m[1]);
	}
	
	function increaseVal(mess) {
	$.post('update_gift.php', {
	mess: mess
	}, function(newVal) {
	$("#show_goods").html(newVal);
	// 存储相关值至对象中
	var state = {
//	mess:mess,
	val: newVal,
	title: 'title-' + mess,
	url: '?mess=' + mess
	}
	// 将相关值压入history栈中
	window.history.pushState && window.history.pushState(state, state.title, state.url);
	});
	}
	
function change_type(mess){
	increaseVal(mess);
}
	// 浏览器的前进后退，触发popstate事件
window.onpopstate = function(){
var state = window.history.state;
console.log(state)
// 直接将值取出，或再次发个ajax请求
$("#show_goods").html(state.val);
window.history.replaceState && window.history.replaceState(state, state.title, state.url);
};
</script>