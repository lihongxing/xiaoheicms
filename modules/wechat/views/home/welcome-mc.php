<?php
	require '../common/header3.php';
?>
<ul class="nav nav-tabs">
	<li class="active"><a href="../home/welcome.php">账号概况 - 会员功能概括</a></li>
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
	<div class="page-header">
		<h4><i class="fa fa-android"></i> 会员统计情况</h4>
	</div>
	<div class="panel panel-default">
		<div class="panel-body table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th style="width:400px;">公众号</th>
					<th style="width:400px;">会员数量</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td>
						<p></p>
					</td>
					<td> 
						<a href="../mc/member.php">查看</a>
					</td>
				</tr>
			</tbody>
		</table>
		</div>
	</div>

	<div class="page-header">
		<h4><i class="fa fa-android"></i> 主公号粉丝统计情况</h4>
	</div>
	<div class="panel panel-default">
		<div class="panel-body table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th style="width:400px;">主公众号</th>
					<th style="width:400px;">粉丝数量</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td>
						<p></p>
					</td>
					<td> 
						<a href="../mc/fans.php">查看</a>
					</td>
				</tr>
			</tbody>
		</table>
		</div>
	</div>
	<div class="page-header">
		<h4><i class="fa fa-android"></i> 子公号粉丝统计情况</h4>
	</div>
	<div class="panel panel-default">
		<div class="panel-body table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th style="width:400px;">子公众号</th>
					<th style="width:400px;">粉丝数量</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td>
						<p></p>
					</td>
					<td> 
						<a href="../mc/fans.php">查看</a>
					</td>
				</tr>
			</tbody>
		</table>
		</div>
	</div>

	<div class="page-header">
		<h4><i class="fa fa-android"></i> 营销统计情况</h4>
	</div>
	<div class="panel panel-default">
		<div class="panel-body table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th style="width:400px;">营销方式</th>
					<th style="width:400px;"></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>打折券</td>
					<td>
						<p></p>
					</td>
					<td> 
						<p><a href="../activity/coupon.php">查看</a></p>
					</td>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<td>代金券</td>
					<td>
						<p></p>
					</td>
					<td> 
						<p><a href="../activity/coupon.php">查看</a></p>
					</td>
				</tr>
			</tbody>
		</table>
		</div>
	</div>
</div>
<?php
	require '../common/footer.php';
?>