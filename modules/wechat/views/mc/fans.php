<?php
	require '../common/header3.php';
?>
<style>
.table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{white-space:nowrap;}
</style>
<ul class="nav nav-tabs">
	<li class="active"><a href="../mc/fans.php">粉丝列表</a></li>
</ul>
<script type="text/javascript">
	var running = false;
	window.onbeforeunload = function(e) {
		if(running) {
			return (e || window.event).returnValue = '正在进行粉丝数据同步中, 离开此页面将会中断操作.';
		}
	}
	
	require(['angular'], function(angular){
		$('#form1').submit(function(){
			if($(":checkbox[name='delete[]']:checked").size() > 0){
				return confirm('删除后不可恢复，您确定删除吗？');
			}
			alert('没有选择粉丝');
			return false;
		});
		angular.module('app', []).controller('advAPI', function($scope, $http) {
			$scope.adv = {
				running : false,
				syncState : '',
				downloadState : '',
				enabled : {if $_W['acid'] && $_W['account']['level'] >= '3'}true{else}false{/if}
			};	
			$scope.sync = function(){
				if($(":checkbox:checked").size() <= 0){
					alert('没有选择粉丝');
					return;
				}
				util.message('正在同步粉丝信息<br>请不要离开页面或进行其他操作,同步成功后系统会自动刷新本页面');
				$scope.adv.running = running = true;
				var fanids = [];
				$(':checkbox:checked').each(function(){
					var fanid = parseInt($(this).val());
					if(!isNaN(fanid)) {
						fanids.push(fanid);
					}
				});
				var params = {};
				params.method = 'sync';
				params.fanids = fanids;
				$http.post(location.href, params).success(function(dat){
					$scope.adv.running = running = false;
					if(dat == 'success') {
						location.reload();
					} else {
						message('未知错误, 请稍后重试.', location.href, 'error')
					}
				});
			};
			$scope.download = function(next, count){
				$scope.adv.running = running = true;
				var params = {};
				params.method = 'download';
				if(next) {
					params.next = next;
				}
				if(!count) {
					count = 0;
				}
				$http.post(location.href, params).success(function(dat){
					if(dat.errno || dat.type == 'error' || dat.type == 'info') {
						$scope.adv.downloadState = '';
						$scope.adv.running = running = false;
						util.message(dat.message, location.href, 'error');
						return;
					}

					count += dat.count;
					if((dat.total <= count) || (!dat.count && !dat.next)) {
						$scope.adv.downloadState = '';
						$scope.adv.running = running = false;
						util.message('粉丝下载完成,系统将开始更新粉丝数据,请不要离开页面', "{php echo url('mc/fans/initsync', array('acid' => $acid))}", 'success');
						return;
					} else {
						$scope.download(dat.next, count);
						$scope.adv.downloadState = '(' + count + '/' + dat.total + ')';
					}
				});
			}
		});
		angular.bootstrap(document, ['app']);
	});
</script>
<div class="clearfix">
	<div class="alert alert-info">
		如果您的公众号类型为："认证订阅号" 或 "认证服务号",您可以使用粉丝分组功能。点击这里 <a href="../mc/fangroup.php">"同步粉丝分组"</a>
	</div>
	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="#" method="get" class="form-horizontal" role="form">
				<input type="hidden" name="c" value="mc" />
				<input type="hidden" name="a" value="fans" />
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">昵称</label>
					<div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
						<input type="text" class="form-control" name="nickname" value=""/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">用户组</label>
					<div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
						<label class="radio-inline">
							<input type="radio" name="type" value="" checked="checked"/> 不指定
						</label>
						<label class="radio-inline">
							<input type="radio" name="type" value="bind" /> 已经注册为会员
						</label>
						<label class="radio-inline">
							<input type="radio" name="type" value="unbind" /> 未注册为会员
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否关注</label>
					<div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
						<label class="radio-inline">
							<input type="radio" name="follow" value="" checked="checked"/> 不限
						</label>
						<label class="radio-inline">
							<input type="radio" name="follow" value="1" /> 已关注
						</label>
						<label class="radio-inline">
							<input type="radio" name="follow" value="2" /> 取消关注
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">关注/取消关注时间</label>
					<div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
						{php echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d', $starttime),'endtime'=>date('Y-m-d', $endtime)));}
					</div>
					<div class="pull-right col-xs-12 col-sm-3 col-md-2 col-lg-2">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<form action="" method="post" id="form1">
	<div class="panel panel-default">
	<div class="panel-body table-responsive" ng-controller="advAPI">
		<table class="table table-hover"  style="width:100%;z-index:-10;" cellspacing="0" cellpadding="0">
			<thead class="navbar-inner">
				<tr>
					<th style="width:30px;">删？</th>
					<th style="width:90px;">头像</th>
					<th style="width:150px;">昵称</th>
					<th style="width:180px;">对应用户</th>
					<th style="width:80px;">是否关注</th>
					<th style="width:180px;">关注/取消时间</th>
					<th style="min-width:70px;" class="text-right">操作</th>
				</tr>
			</thead>
			<tbody>
			<!--下面也隐藏信息
				<tr>
					<td><input type="checkbox" name="delete[]" value="" /></td>
					<td><img src="../resource/images/noavatar_middle.gif" width="48"></td>
					<td></td>
					<td>
						<a href="../mc/member.php" class="text-danger" title="该用户尚未注册会员，请为其手动注册！">[ 注册为会员 ]</a>
					</td>
					<td>
						<span class="label label-success">已关注 </span> 
					</td>
					<td></td>
					<td class="text-right" style="overflow:visible;">
						<div class="btn-group">
							<button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
								<span id="-name"></span>
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
									<li><a href="javascript:;" class="groupedit" title="" data-groupid="{$li['id']}" data-openid="" data-fanid=""></a></li>
							</ul>
						</div>
						<a href="../mc/notice.php" class="btn btn-success btn-sm sms">发送消息</a>
						<a href="../mc/fans.php" class="btn btn-default btn-sm">查看详情</a>
					</td>
				</tr>
				-->
			</tbody>
		</table>
		<table class="table table-hover">
			<tr>
				<td width="30">
					<input type="checkbox" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});" />
				</td>
				<td class="text-left">
					<input name="token" type="hidden" value="" />
					<input type="submit" class="btn btn-primary span2" name="submit" value="删除" /> &nbsp; 
					<input type="button" class="btn btn-default" name="submit" value="同步粉丝信息(请指定公众号)" ng-click="sync();" ng-disabled="!adv.enabled || adv.running" /> &nbsp;
					<input type="button" class="btn btn-default" name="submit" value="下载所有粉丝(请指定公众号)" ng-click="download();" ng-disabled="!adv.enabled || adv.running" />
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<span class="help-block">同步粉丝信息: 选定粉丝后, 访问公众平台获取特定粉丝的相关资料, 如果已对应用户, 那么将会把未登记的资料填充至关联用户. 需要为认证微信服务号, 或者高级易信号</span>
					<span class="help-block">下载所有粉丝: 访问公众平台下载所有粉丝列表(这个操作不能获取粉丝资料, 只能获取粉丝标志). 需要为认证微信服务号, 或者高级易信号</span>
				</td>
			</tr>
		</table>
	</div>
	</div>
	</form>
</div>
<script>
	$('.groupedit').click(function(){
		var groupid = $(this).attr('data-groupid');
		var openid = $(this).attr('data-openid');
		if(!openid) {
			util.message('粉丝openid错误', '', 'error');
		}
		$.post('{php echo url("mc/fans/updategroup");}', {'openid' : openid, 'groupid': groupid}, function(data){
			var data = $.parseJSON(data);
			if(data.status == 'error') {
				util.message(data.mess, '', 'error');
			} else if(data.status == 'success'){
				location.reload();
			}
		});
	});
</script>
<!--下面为隐藏内容
<div class="form-horizontal form">
	<div class="panel panel-default">
		<div class="panel-heading">
			粉丝详情
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">对应会员</label>
				<div class="col-sm-10">
					<span class="help-block"><a href="../mc/member.php"></a></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">粉丝编号</label>
				<div class="col-sm-10">
					<span class="help-block"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">所属公众号</label>
				<div class="col-sm-10">
					<span class="help-block"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否关注</label>
				<div class="col-sm-10">
					<span class="help-block"> <span class="label label-warning"> 取消关注 </span> </span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">取消关注时间</label>
				<div class="col-sm-10">
					<span class="help-block">1970-01-01 08:00:00</span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
				<div class="col-sm-10">
					<span class="help-block"><a href="javascript:history.go(-1);" class="btn btn-primary">返回</a></span>
				</div>
			</div>
		</div>
	</div>
</div>
-->
<?php
	require '../common/footer.php';
?>