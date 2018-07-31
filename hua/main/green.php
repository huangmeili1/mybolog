<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../img/flower.ico" />
<title>绿色植物</title>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	#rating li{
		list-style: none;
		float: left;
		padding: 15px;
	}
</style>
<?php

?>
<div class="container" style="width: 100%;">
	<?php include("top.php"); ?>
		<div class="row">
			<div class="col-md-12" style="text-align: center;padding: 0;margin: 0;height: 180px;width: 100%;background: url(../img/green_top.png);background-size: cover;background-position-x: -230px;background-repeat: no-repeat;">
				<span style="line-height: 180px;color: white;font-size: 30px;">绿色植物,最美的环境</span>
			</div>
		</div>
		<div class="row" style="width: 90%;margin: 0 auto;">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<ul class="rating" id="rating">
							<li><button class="btn btn-default" id="button1" style="text-decoration: none;" onclick="change_thing(1)">销量</button></li>
							<li><button class="btn btn-default" id="button2" style="text-decoration: none;" onclick="change_thing(2)">价格</button></li>
							<li><button class="btn btn-default" id="button3" style="text-decoration: none;" onclick="change_thing(3)">最新</button></li>
						</ul><br>
						<hr style="margin-top: 30px;" size="4" color="gray" />
					</div>
				</div>
				<div id="show_goods" class="row">
					<div class="col-md-12">
				<?php
					@$sql=mysql_query("select * from goods where kind_id=(select kind_id from kind where kind_name='绿色植物')");
					@$sql_num=mysql_num_rows($sql);
					if(@$sql_num<=0){
						?>
						<div class="row">
							<div class="col-md-12">
								<span style="margin-left: 200px;font-size: 24px;">暂无绿色植物，期待中.......</span>
							</div>
						</div>
						<?php
					}else{
						while($gree=mysql_fetch_array($sql)){
							?>
							<div class="col-md-4" style="margin-top: 30px;">
								<div onmouseleave="change_type2(<?php echo $gree['good_id']; ?>)" onmouseover="change_type(<?php echo $gree['good_id']; ?>)" id="div<?php echo $gree['good_id']; ?>" class="thumbnail" style="width: 95%;padding: 0;height: 480px;border: 0;">
									<a style="text-decoration: none;" href="see_good.php?good_id=<?php echo $gree['good_id'] ?>">
									<img style="height: 400px;width: 100%;" src="<?php echo $gree['main_img']; ?>" />
									<div class="caption" style="text-align: center;">
										<p style="font-size: 20px;">
											<?php
											echo $gree['good_name'];
											?>
										</p>
											<p style="font-size: 18px;"><b>￥<?php echo $gree['good_price']; ?></b></p>
									</div>
									</a>
								</div>
							</div>
							<?php
						}
					}
					?>
				
			</div>
				
			</div>
			</div>
		</div>
		<?php include("footer.php"); ?>
</div>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
	function change_type(good_id){
		var div=document.getElementById("div"+good_id);
		div.style.boxShadow='5px 5px 8px 10px #888888';
	}
	function change_type2(good_id){
		var div=document.getElementById("div"+good_id);
		div.style.boxShadow='none';
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
	$.post('update_green.php', {
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
	
function change_thing(mess){
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