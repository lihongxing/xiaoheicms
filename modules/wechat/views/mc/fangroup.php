<?php
	require '../common/header3.php';
?>
<style>
.table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{white-space:nowrap;}
</style>
<ul class="nav nav-tabs">
	<li class="active"><a href="../mc/fangroup.php">粉丝分组</a></li>
</ul>
<div class="clearfix">
<form action="../mc/fangroup.php" method="post" id="form2">
	<input type="hidden" name="acid" value="">
	<div class="panel panel-default">
	<div class="panel-body table-responsive">
		<table class="table table-hover" ng-controller="advAPI" style="width:100%;" cellspacing="0" cellpadding="0">
			<thead class="navbar-inner">
				<tr>
					<th width="20%">分组名称</th>
					<th width="20%"></th>
					<th width="20%">分组id</th>
					<th width="20%">分组内用户数量</th>
					<th width="20%">操作</th>
				</tr>
			</thead>
			<tbody>
					<tr>
						<input type="hidden" name="groupid[]" value="">
						<input type="hidden" name="count[]" value="">
						<td><input type="text" class="form-control" style="width:250px;" name="groupname[]" value="未分组" readonly></td>
						<td class="text-left"><span class="label label-danger">系统分组,不能修改</span></td>
						<td>0</td>
						<td>5</td>
						<td>
							<a href="javascript:;" class="btn btn-danger del-group" data-id="">删除分组</a>
						</td>
					</tr>
					<tr>
						<input type="hidden" name="groupid[]" value="">
						<input type="hidden" name="count[]" value="">
						<td><input type="text" class="form-control" style="width:250px;" name="groupname[]" value="黑名单" readonly></td>
						<td class="text-left"><span class="label label-danger">系统分组,不能修改</span></td>
						<td>1</td>
						<td>0</td>
						<td>
							<a href="javascript:;" class="btn btn-danger del-group" data-id="">删除分组</a>
						</td>
					</tr>
					<tr>
						<input type="hidden" name="groupid[]" value="">
						<input type="hidden" name="count[]" value="">
						<td><input type="text" class="form-control" style="width:250px;" name="groupname[]" value="星标组" readonly></td>
						<td class="text-left"><span class="label label-danger">系统分组,不能修改</span></td>
						<td>2</td>
						<td>0</td>
						<td>
							<a href="javascript:;" class="btn btn-danger del-group" data-id="">删除分组</a>
						</td>
					</tr>
					<tr id="position">
						<td colspan="5"><a href="javascript:;" id="addgroup"><i class="fa fa-plus-circle"></i> 添加新分组</a></td>
					</tr>
					<tr>
						<td colspan="5">
							<input type="submit" class="btn btn-primary span2" name="submit" value="保存" /> &nbsp;
						</td>
					</tr>
			</tbody>
		</table>
	</div>
	</div>
</form>
</div>
<script>
	$('#addgroup').click(function(){
		var html = '<tr>' +
						'<td colspan="5">' +
					        '<input type="text" class="form-control" style="width:250px;display:inline-block" name="group_add[]" value="" placeholder="请填写分组名称">' +
							' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="$(this).parent().parent().remove()"><i class="fa fa-times-circle"></i></a>' +
						'</td>' +
					'</tr>';

		$('#position').before(html);
	});

	$('.del-group').click(function(){
		if(!confirm('删除分组后，所有该分组内的用户自动进入默认分组，确定删除该分组吗')) {
			return false;
		}
		var id = parseInt($(this).attr('data-id'));
		$.post("{php echo url('mc/fangroup/del');}", {'id':id}, function(data){
			var data = $.parseJSON(data);
			if(data.errno < 0) {
				util.message(data.message, '', 'error');
				return false;
			} else {
				location.reload();
			}
		});
	});
</script>
<?php
	require '../common/footer.php';
?>