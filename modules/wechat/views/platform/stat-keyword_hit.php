<?php
	require '../common/header.php';
?>
	<div class="clearfix">
		<div class="stat">
			<div class="stat-div">
			<?
				require '../platform/stat-keyword_search.php';
			?>
				<div class="sub-item panel panel-default" id="table-list">
					<div class="panel-heading">
						详细数据
					</div>
					<div class="sub-content panel-body table-responsive">
						<table class="table table-hover">
							<thead class="navbar-inner">
								<tr>
									<th style="width:100px;" class="row-hover">关键字<i></i></th>
									<th>规则<i></i></th>
									<th style="width:160px;">模块<i></i></th>
									<th style="width:80px;">命中次数<i></i></th>
									<th style="width:150px;">最后触发<i></i></th>
									<th style="width:100px;">操作</th>
								</tr>
							</thead>
							<tbody>
							<!--下面为内容
								<tr>
									<td></td>
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
		</div>
	</div>
<?php
	require '../common/footer.php';
?>