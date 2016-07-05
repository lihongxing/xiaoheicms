<?php
	require '../common/header.php';
?>
<script type="text/javascript">
	require(['bootstrap.switch'], function($){
		$(function(){
			$(':checkbox').bootstrapSwitch();
			$(':checkbox').on('switchChange.bootstrapSwitch', function(e, state){
				var rids = [];
				$(':checkbox:checked').each(function(){
					rids.push($(this).val());
				});
				$.post(location.href, {'rids': rids.toString()}, function(data){
					console.dir(data)
				});
			});
		});
	});
</script>
<ul class="nav nav-tabs">
	<li class="active"><a href="../platform/service.php">常用服务接入</a></li>
</ul>
<div class="panel panel-default">
	<div class="table-responsive panel-body">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:100px;">服务名称</th>
					<th style="width:200px;">功能说明</th>
					<th style="width:120px;">状态</th>
				</tr>
			</thead>
			<tbody>
					<tr>
						<td>城市天气</td>
						<td>"城市名+天气",如:"北京天气"</td>
						<td>
							<input type="checkbox" value=""/>
						</td>
					</tr>
					<tr>
						<td>百度百科</td>
						<td>"百科+查询内容"或"定义+查询内容",如:"百科姚明","定义自行车"</td>
						<td>
							<input type="checkbox" value=""/>
						</td>
					</tr>
					<tr>
						<td>即时翻译</td>
						<td>"@查询内容(中文或英文)"</td>
						<td>
							<input type="checkbox" value=""/>
						</td>
					</tr>
					<tr>
						<td>今日老黄历</td>
						<td>"日历","万年历","黄历"或"几号"</td>
						<td>
							<input type="checkbox" value=""/>
						</td>
					</tr>
					<tr>
						<td>看新闻</td>
						<td>"新闻"</td>
						<td>
							<input type="checkbox" value=""/>
						</td>
					</tr>
					<tr>
						<td>快递查询</td>
						<td>"快递+单号",如:"申通1200041125"</td>
						<td>
							<input type="checkbox" value=""/>
						</td>
					</tr>
			</tbody>
		</table>
	</div>
</div>
<?php
	require '../common/footer.php';
?>