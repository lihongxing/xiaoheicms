<?php
	require '../common/header2.php';
?>
<ul class="nav nav-tabs">
	<li class="active"><a href="../home/welcome.php">账号概况 - 微站功能概括</a></li>
</ul>
<div class="clearfix welcome-container">
	<div class="page-header">
		<h4><i class="fa fa-plane"></i> 快捷操作</h4>
	</div>
	<div class="shortcut clearfix">
		<a href="../platform/reply.php">
			<i class="fa fa-sitemap"></i>
			<span>自定义接口</span>
		</a>
	</div>
	<style>
		.template .item{position:relative;display:block;float:left;border:1px #ddd solid;border-radius:5px;background-color:#fff;padding:5px;width:190px;margin:0 10px 10px 0;}
		.template .title{margin:5px auto;line-height:2em;}
		.template .item img{width:178px;height:270px;}
		.clear{clear:both;}
		.home-container{width:100%; overflow:hidden; margin:.6em .3em;}
		.home-container .tile{float:left; display:block; text-decoration:none; outline:none; width:6em; height:6em; margin:.4em;}
		.home-container i{display:block; color:#333; height:1em; overflow: hidden; font-size:2em; margin:.25em .2em;}
		.home-container span{display:block; width:100%; overflow:hidden;}
	</style>
	<div class="page-header">
		<h4><i class="fa fa-comments"></i> 当前站点</h4>
	</div>
	<div class="panel panel-default row">
		<div class="table-responsive panel-body">
		<table class="table">
			<tr>
				<td style="width:200px; border-top:none;">
					<div class="">
						<div class="item">
							<div class="title">
								<img src="../resource/images/preview.jpg" class="img-rounded" />
							</div>
						</div>
					</div>
				</td>
				<td style="border-top:none;">
					<p>
						<strong>微站入口触发关键字 : </strong>
						<span class="label label-success"></span>
					</p>
					<p><a href="javascript:;" onclick="preview_home('4', '4');return false;" class="btn btn-default">预览</a></p>
				</td>
			</tr>
		</table>
		</div>
	</div>
	<div class="page-header">
		<h4><i class="fa fa-android"></i> 站点导航图标</h4>
	</div>
	<div class="panel panel-default">
		<div class="panel-body table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th style="width:200px">导航及菜单</th>
					<th>概况</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>微站首页导航图标</td>
					<td>
						<div class="home-container">
							<!--下面为隐藏内容
							<a href="javascript:viod(0);" class="tile text-center btn btn-default">
								<i style="background:url(http://localhost/attachment/) no-repeat;background-size:cover; height:1em;margin:.25em .4em;"></i>
								<span style="ext" title="ext">ext</span>
							</a>
							-->
						</div>
					</td>
				</tr>
				<tr>
					<td>个人中心导航条目</td>
					<td>
						<div class="home-container">
							<!--下面为隐藏内容
							<a href="javascript:viod(0);" class="tile text-center btn btn-default">
								<i style="background:url(http://localhost/attachment/) no-repeat;background-size:cover"></i>
								<span style="ext" title="ext">ext</span>
							</a>
							-->
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	</div>

	<div class="page-header">
		<h4><i class="fa fa-cogs"></i> 幻灯片设置</h4>
	</div>
	<div class="panel panel-default row">
		<div class="panel-body table-responsive">
		<table class="table">
			<tr>
				<td style="border-top:0;">
					<!--下面为隐藏内容
					<div id="carousel-example-generic" class="carousel slide" style="width:600px" data-ride="carousel">
						<ol class="carousel-indicators"> 
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						</ol>
						<div class="carousel-inner"> 
							<div class="item active">
								<img src="" alt="" style="height:300px; margin-left:auto; margin-right: auto;">
								<div class="carousel-caption">
									<h5></h5>
								</div>
							</div>
						</div>
						<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
					</div>
					-->
				</td>
			</tr>
		</table>
	</div>
	</div>
	<script type="text/javascript">
		function preview_home(styleid, multiid) {
			var content = '<iframe width="320" scrolling="yes" height="480" frameborder="0" src="about:blank"></iframe>';
			var footer =
			'<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>';
			var dialog = util.dialog('预览模板', content, footer);
			dialog.find('iframe').on('load', function(){
				$('a', this.contentWindow.document.body).each(function(){
					if ($(this).attr('href').substr(0, 4) != 'http') {
						if ($(this).attr('href').substr(0, 2) == './') {
							$(this).attr('href', $(this).attr('href') + 's=' + styleid);
						} else {
							$(this).attr('href', 'http://' + $(this).attr('href'));
						}
					}
				});
			});
			var url = '../app/{php echo murl('home')}&s=' + styleid + 't=' + multiid;
			dialog.find('iframe').attr('src', url);
			dialog.find('.modal-dialog').css({'width': '322px'});
			dialog.find('.modal-body').css({'padding': '0', 'height': '480px'});
			dialog.modal('show');
		}
	</script>
</div>
<?php
	require '../common/footer.php';
?>