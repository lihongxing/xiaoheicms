<?php
	require '../common/header.php';
?>
	<ul class="nav nav-tabs">
		<li><a href="../platform/qr-list.php">管理二维码</a></li>
		<li><a href="../platform/qr-post.php">生成二维码</a></li>
		<li class="active"><a href="../platform/qr-display.php">扫描统计</a></li>
	</ul>
	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="platform">
			<input type="hidden" name="a" value="qr">
			<input type="hidden" name="do" value="display">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">场景名称</label>
					<div class="col-sm-6 col-lg-8 col-xs-12">
						<input type="text" name="keyword" value="" class="form-control" placeholder="请输入场景名称">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">时间范围</label>
					<div class="col-sm-6 col-lg-8 col-xs-12">
						<input type="text" value="2016-03-26 至 2016-05-01">
					</div>
					<div class="pull-right col-xs-12 col-sm-3 col-lg-2">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">详细数据&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-muted" style="color:red;">扫描人数：0</span></div>
		<div class="table-responsive panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th style="width:80px;">粉丝<i></i></th>
						<th style="width:80px;">场景名称<i></i></th>
						<th style="width:100px;">场景ID/场景值<i></i></th>
						<th style="width:110px;">关注扫描<i></i></th>
						<th style="width:150px;">扫描时间<i></i></th>
						<th style="width:110px;">操作</th>
					</tr>
				</thead>
				<tbody>
				<!--下面为隐藏的内容
					<tr>
						<td><a href="#" title=""></a></td>
						<td></td>
						<td></td>
						<td></td>
						<td style="font-size:12px; color:#666;">1970-01-01 08:00:00</td>
						<td><a href="../platform/qr-delsata.php" onclick="javascript:return confirm('您确定要删除吗？')">删除</a></td>
					</tr>
				-->
				</tbody>
			</table>
		</div>
	</div>
<?php
	require '../common/footer.php';
?>