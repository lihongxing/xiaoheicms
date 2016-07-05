<?php
	require '../common/header.php';
?>
	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="platform">
			<input type="hidden" name="a" value="stat">
			<input type="hidden" name="do" value="history">
			<input type="hidden" name="searchtype" value="">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">规则类型</label>
					<div class="col-sm-8 col-lg-9 col-xs-12">
						<div class="btn-group">
							<a href="#"  class="btn btn-primary">不限</a>
							<a href="#"  class="btn btn-default">已有规则回复</a>
							<a href="#"  class="btn btn-default">默认规则回复</a>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">内容关键字</label>
					<div class="col-sm-6 col-lg-8 col-xs-12" >
						<input type="text" name="keyword" class="form-control" value="" placeholder="请输入内容关键字">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">日期范围</label>
					<div class="col-sm-6 col-xs-12 col-lg-8 col-xs-12">
						<input type="text" value="2016-02-05 至 2016-04-25" />
					</div>
					<div class="pull-right col-xs-12 col-sm-3 col-lg-2">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			详细数据
		</div>
		<div class="table-responsive panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th style="width:10%;">用户</th>
						<th style="width:20%;">内容</th>
						<th style="width:20%;">规则</th>
						<th style="width:20%;">模块</th>
						<th style="width:20%;">时间</th>
						<th style="width:10%;">操作</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>
<?php
	require '../common/footer.php';
?>