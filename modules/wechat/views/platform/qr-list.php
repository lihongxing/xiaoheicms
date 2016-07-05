<?php
	require '../common/header.php';
?>
	<ul class="nav nav-tabs">
		<li class="active"><a href="../platform/qr-list.php">管理二维码</a></li>
		<li><a href="../platform/qr-post.php">生成二维码</a></li>
		<li><a href="../platform/qr-display.php">扫描统计</a></li>
	</ul>
	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="platform">
			<input type="hidden" name="a" value="qr">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">场景名称</label>
					<div class="col-sm-6 col-lg-8 col-xs-12">
						<input type="text" name="keyword" class="form-control" value="" placeholder="请输入场景名称">
					</div>
					<div class="pull-right col-xs-12 col-sm-3 col-lg-2">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="alert alert-info">您可以通过二维码链接,自己生成二维码。也可以直接点击查看系统生成的二维码</div>
	<div class="panel panel-default">
		<div class="table-responsive panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th style="width:100px;">场景名称</th>
					<th style="width:100px;">关联关键字</th>
					<th style="width:70px;">二维码类型</th>
					<th style="width:80px;">过期时间</th>
					<th style="width:100px;">场景ID/场景字符串</th>
					<th style="width:50px;">二维码</th>
					<th style="width:190px;">url</th>
					<th style="width:100px;">生成时间</th>
					<th style="width:100px">到期时间</th>
					<th style="width:100px;">操作</th>
				</tr>
			</thead>
			<tbody>
			<!--下面是北荣显示
				<tr>
					<td><a href="javascript:void(0);" title=""></a></td>
					<td><a href="javascript:void(0);" title=""></a></td>
					<td></td>
					<td></td>
					<td></td>
					<td><a href="" target="_blank">查看</a></td>
					<td><a href="" target="_blank" title=""></a></td>
					<td style="font-size:12px; color:#666;"></td>
					<td style="font-size:12px; color:#666;"></td>
					<td>
					<a href="../platform/qr-post.php">编辑</a>
					&nbsp;-&nbsp;<a href="../platform/qr-del.php" onclick="return confirm('您确定要删除该二维码以及其统计数据吗？')">强制删除</a>
					&nbsp;-&nbsp;<a href="../platform/qr-extend.php">延时</a>
					</td>
				</tr>
			-->
			</tbody>
		</table>
		</div>
	</div>
	<a href="../platform/qr-del.php" onclick="javascript:return confirm('您确定要删除吗？\n将删除所有过期二维码以及其统计数据！！！')" class="btn btn-primary" style="margin-bottom:15px">删除全部已过期二维码</a>
	注意：永久二维码无法在微信平台删除，但是您可以点击<a href="javascript:;">【强制删除】</a>来删除本地数据。
<?php
	require '../common/footer.php';
?>