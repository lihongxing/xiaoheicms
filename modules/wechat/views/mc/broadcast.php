<?php
	require '../common/header3.php';
?>
<ul class="nav nav-tabs">
	<li class="active"><a href="../mc/broadcast.php"><i class="icon-group"></i> 发送通知消息</a></li>
</ul>
<div class="main">
	<form action="../mc/broadcast.php" method="post" class="form-horizontal form">
		<div class="panel panel-default">
			<div class="panel-heading">
				批量发送通知
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">通知方式</label>
					<div class="col-sm-9 col-xs-12">
						<label class="radio-inline">
							<input type="radio" name="type" value="email" checked="checked"/>
							邮件
						</label>
						<label class="radio-inline">
							<input type="radio" name="type" value="wechat" onclick="location.href='../material/mass.php'"/>
							微信
						</label>
						<span class="help-block">请指定你要发送通知的方式, 不同的方式能到达的用户也不同</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">用户组</label>
					<div class="col-sm-9 col-xs-12">
						<select name="group" class="form-control">
							<option value="">不限</option>
							<option value="4">默认会员组</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">用户</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" class="form-control" name="username" value="" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<input type="submit" class="btn btn-primary" value="筛选用户" />
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<!--下面为隐藏内容
<div class="main" ng-controller="doNotifySend">
	<form action="../mc/broadcast.php" method="post" class="form-horizontal form">
		<div class="panel panel-default">
			<div class="panel-heading">通知目标</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-10 col-xs-12">
						已经搜索到位用户 &nbsp; <a href="javascript:;" onclick="history.go(-1);">重新搜索</a>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">邮件标题</label>
					<div class="col-sm-10 col-xs-12">
						<input type="text" ng-model="params.title" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">邮件内容</label>
					<div class="col-sm-10 col-xs-12">
						{php echo tpl_ueditor('editor')}
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-10 col-xs-12">
						<input type="button" class="btn btn-primary" value="群发通知" ng-disabled="isRunning" ng-click="send(1);" />
						<span class="help-block label-result"></span>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<script>
	var editor = UE.getEditor('editor');
	var running = false;
	var success = failed = 0;
	window.onbeforeunload = function(e) {
		if(running) {
			return (e || window.event).returnValue = '正在进行群发操作, 离开页面将会中止执行.';
		}
	}
	require(['angular'], function(angular){
		angular.module('app', []).controller('doNotifySend', function($scope, $http) {
			$scope.params = {
				type : '{$_GPC['type']}',
				group : '{$_GPC['group']}',
				username : '{$_GPC['username']}'
			};
			$scope.isRunning = running = false;
			
			$scope.send = function(pindex) {
				var params = {};
				var params = angular.copy($scope.params);
				{if $_GPC['type'] == 'email'}
				params.title = $scope.params.title ? $scope.params.title : '';
				params.content = editor.getContent();
				if(params.title == '' || params.content == '') {
					util.message('请输入完整的通知内容.', '', 'error');
					return;
				}
				{/if}
				$scope.isRunning = running = true;
				params.method = 'send';
				params.next = pindex;
				if(pindex == 1) {
					success = failed = 0;
					var label = '正在发送中, 总共 {$count}';
					angular.element('.label-result').html(label);
				}
				
				$http.post(location.href, params).success(function(dat, status){
					if(!angular.isObject(dat)) {
						util.message('执行错误, 请稍后重试', location.href);
						return;
					}
					
					success += dat.success;
					failed += dat.failed;
					var label = '正在发送中, 总共 ' + dat.total + ', 发送成功 ' + success + ', 发送失败 ' + failed;
					angular.element('.label-result').html(label);
					if(dat.total <= (success + failed) || dat.next == -1) {
						$scope.isRunning = running = false;
						if(dat.total <= failed) {
							util.message('没有发送成功任何通知消息, 请检查配置项', '', 'error');
						}
					} else {
						$scope.send(dat.next);
					}
				});
			};
		});
		angular.bootstrap(document, ['app']);
	});
</script>
-->
<?php
	require '../common/footer.php';
?>