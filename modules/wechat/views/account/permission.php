<?php
	require '../common/header-gw.php';
?>
<ol class="breadcrumb">
	<li><a href="../account/display.php"><i class="fa fa-home"></i></a></li>
	<li><a href="../system/welcome.php">系统</a></li>
	<li><a href="../account/display.php">公众号列表</a></li>
	<li class="active">账号操作员列表</li>
</ol>
<ul class="nav nav-tabs">
	<li class="active"><a href="../account/permission.php">账号操作员列表</a></li>
</ul>
<div class="clearfix">
	<h5 class="page-header">设置可操作用户</h5>
	<div class="alert alert-info">
		<i class="fa fa-exclamation-circle"></i> 操作员不允许删除公众号和编辑公众号资料，管理员无此限制
	</div>
	<div class="panel panel-default">
	<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th style="width:50px;">选择</th>
					<th style="width:80px;">用户ID</th>
					<th style="width:150px;">用户名</th>
					<th style="width:200px;">角色</th>
					<th>操作</th>
				</tr>
			</thead>
			<!--隐藏内容
			<tbody>
				<tr style="background:#dddddd;">
					<td class="row-first"><input class="member" autocomplete="off" type="checkbox" value="{$row['id']}" /></td>
					<td>id</td>
					<td>用户名</td>
					<td>
						<label for="radio__1" class="radio-inline" style="padding-top:0; float:left; width:70px;"><input type="radio" name="role[]" targetid="" id="radio__1" value="operator"  checked /> 操作员</label>
						<label for="radio__2" class="radio-inline" style="padding-top:0; float:left; width:70px;"><input type="radio" name="role[]" targetid="" id="radio__2" value="manager" /> 管理员</label>
					</td>
					<td>
						<a href="../user/edit.php">编辑用户</a>&nbsp;|&nbsp;
						<a href="../user/permission.php">设置权限</a>&nbsp;|&nbsp;
						<a href="../user/permission.php" target="_blank">查看操作权限</a>
					</td>
				</tr>
			</tbody>
			-->
			<tfoot>
				<tr>
					<td colspan="5">
						<input id="btn-add" class="btn btn-default" type="button" value="选择账号操作员">
						<a class="btn btn-default" href="javascript:;" id="add-user">添加账号操作员</a>
						<input id="btn-revo" class="btn btn-default" type="button" value="删除选定操作">
					</td>
				</tr>
			</tfoot>
		</table>
	</div>
	</div>
</div>

<!-- 添加用户模态框 -->
<div class="modal fade" id="user-modal"  tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<form action="../account/permission.php" method="post" class="form-horizontal" role="form" id="form1">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title" id="myModalLabel">添加账号操作员</h3>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">用户名</label>
						<div class="col-sm-10 col-lg-9 col-xs-12">
							<input id="" name="username" type="text" class="form-control" value="" />
							<span class="help-block">请输入完整的用户名。你需要让新管理员先去注册一个”新账号“，再把他添加进来。</span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<input type="submit" class="btn btn-primary" name="submit" value="确认" />
					<input type="hidden" name="token" value="" />
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
var seletedUserIds = {php echo json_encode($uids);};
require(['biz', 'bootstrap'], function(biz){
	$(function(){
		$('#add-user').click(function(){
			$('#user-modal').modal('show');

			$('#form1').submit(function(){
				var username = $.trim($('#form1 :text[name="username"]').val());
				if(!username) {
					util.message('没有输入用户名.', '', 'error');
					return false;
				}
				$.post("{php echo url('account/permission/user', array('uniacid' => $uniacid))}", {'username':username}, function(data){
					if(data != 'success') {
						util.message(data, '', 'error');
					} else {
						util.message('添加账号操作员成功', "{php echo url('account/permission/', array('uniacid' => $uniacid))}", 'success');
					}
				});
				return false;
			});
		});

		$('#btn-add').click(function(){
			biz.user.browser(seletedUserIds, function(us){
				$.post('{php echo url('account/permission', array('uniacid' => $uniacid, 'reference' => $_GPC['reference']));}', {'do': 'auth', uid: us}, function(dat){
					if(dat == 'success') {
						location.reload();
					} else {
						alert('操作失败, 请稍后重试, 服务器返回信息为: ' + dat);
					}
				});
			},{mode:'invisible'});
		});

		$('#btn-revo').click(function(){
			$chks = $(':checkbox.member:checked');
			if($chks.length >0){
				if(!confirm('确认删除当前选择的用户?')){
					return;
				}
				var ids = [];
				$chks.each(function(){
					ids.push(this.value);
				});
				$.post('{php echo url('account/permission', array('uniacid' => $uniacid));}',{'do':'revos', 'ids': ids},function(dat){
					if(dat == 'success') {
						location.reload();
					} else {
						alert('操作失败, 请稍后重试, 服务器返回信息为: ' + dat);
					}
				});
			}
		});

		$("input[name^='role[']").click(function(){
			$.post('{php echo url('account/permission/role', array('uniacid' => $uniacid));}', {'uid' : $(this).attr('targetid'), 'role' : $(this).val()}, function(dat){
				if(dat != 'success') {
					u.message('设置管理员角色失败', "{php echo url('account/permission', array('uniacid' => $uniacid))}", 'error');
				}
			});
		});
	});
});
</script>
<?php
	require '../common/footer-gw.php';
?>