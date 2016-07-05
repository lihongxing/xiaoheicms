<?php
	require '../common/header.php';
?>
	<div class="cleatfix">
	<?
		require '../platform/stat-rule_search.php';
	?>
		<div class="panel panel-default">
			<div class="panel-heading">
				详细数据
			</div>
			<div class="table-responsive panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="row-hover">规则<i></i></th>
							<th style="width:160px;">模块<i></i></th>
							<th style="width:80px;">命中次数<i></i></th>
							<th style="width:150px;">最后触发<i></i></th>
							<th style="width:100px;">操作</th>
						</tr>
					</thead>
					<tbody>
					<!--下面为内容注释
						<tr>
							<td class="row-hover">N/A</td>
							<td>default</td>
							<td>10</td>
							<td style="font-size:12px; color:#666;">1970-01-01 08:00:00</td>
							<td>
								<a target="main" href="../platform/stat-trend.php" title="使用率走势">使用率走势</a>
							</td>
						</tr>
					-->
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php
	require '../common/footer.php';
?>