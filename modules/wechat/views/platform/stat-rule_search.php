	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="platform">
			<input type="hidden" name="a" value="stat">
			<input type="hidden" name="do" value="rule">
			<input type="hidden" name="m" value="">
			<input type="hidden" name="foo" value="">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">规则类型</label>
					<div class="col-sm-8 col-lg-9 col-xs-12">
						<div class="btn-group">
							<a href="#"  class="btn btn-primary">已触发规则</a>
							<a href="#"  class="btn btn-default">未触发规则</a>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">日期范围</label>
					<div class="col-sm-6 col-lg-8 col-xs-6">
						<input type="text" value="2016-02-05 至 2016-04-25" />
					</div>
					<div class="pull-right col-xs-12 col-sm-3 col-lg-2">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					</div>
				</div>
			</form>
		</div>
	</div>