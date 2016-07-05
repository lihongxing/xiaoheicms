<?php
	require '../common/header.php';
?>
<!--隐藏的标题栏
<ol class="breadcrumb" style="padding:5px 0;">
	<li><a href="../account/display.php"><i class="fa fa-cogs"></i> &nbsp; 扩展功能</a></li>
	<li><a href="../home/welcome-ext.php">模块 - 基本文字回复</a></li>
	<li class="active">管理 基本文字回复</li>
</ol>
-->
<ul class="nav nav-tabs">
	<li class="active"><a href="../platform/reply-fuben.php">管理多客服转接</a></li>
	<li><a href="../platform/reply-post.php"><i class="fa fa-plus"></i> 添加多客服转接</a></li>
	<li><a href="../platform/reply-post.php"><i class="fa fa-edit"></i> 编辑多客服转接</a></li>
</ul>
<div class="clearfix">
	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="platform">
			<input type="hidden" name="a" value="reply">
			<input type="hidden" name="m" value="basic" />
			<input type="hidden" name="status" value="-1" />
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">状态</label>
					<div class="col-sm-8 col-lg-9 col-xs-12">
						<div class="btn-group">
							<a href="../platform/reply.php"  class="btn btn-primary">所有</a>
							<a href="../platform/reply.php"  class="btn btn-default">启用</a>
							<a href="../platform/reply.php"  class="btn btn-default">禁用</a>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
					<div class="col-sm-8 col-xs-12">
							<input class="form-control" name="keyword" id="" type="text" value="">
					</div>
					<div class="col-xs-12 col-sm-2 col-lg-1 text-right">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<form action="{php echo url('platform/reply/delete');}" method="post" class="form-horizontal" role="form" id="form1">
	<input type="hidden" name="m" value="{$m}"/>
	</form>
</div>
<script>
require(['bootstrap'], function($){
	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
		$('#select_all').click(function(){
			$('#form1 :checkbox').prop('checked', $(this).prop('checked'));
		});
		$('#form1 :checkbox').click(function(){
			if(!$(this).prop('checked')) {
				$('#select_all').prop('checked', false);
			} else {
				var flag = 0;
				$('#form1 :checkbox[name="rid[]"]').each(function(){
					if(!$(this).prop('checked') && !flag) {
						flag = 1;
					}
				});
				if(flag) {
					$('#select_all').prop('checked', false);
				} else {
					$('#select_all').prop('checked', true);
				}
			}
		});
	})
});
</script>
<?php
	require '../common/footer.php';
?>