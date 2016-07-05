<?php
	require '../common/header.php';
?>
<!--下图为隐藏标题栏
<ol class="breadcrumb" style="padding:5px 0;">
	<li><a href="../account/display.php"><i class="fa fa-cogs"></i> &nbsp; 扩展功能</a></li>
	<li><a href="../home/welcome-ext.php">模块 - 多客服转接</a></li>
	<li><a href="../platform/reply.php">管理多客服转接</a></li>
	<li class="active">添加多客服转接</li>
</ol>
-->
<ul class="nav nav-tabs">
	<li><a href="../platform/reply-fuben.php">管理多客服转接</a></li>
	<li class="active"><a href="../platform/reply-post.php"><i class="fa fa-plus"></i> 添加多客服转接</a></li>
	<li><a href="../platform/reply-post.php"><i class="fa fa-edit"></i> 编辑多客服转接</a></li>
</ul>
<style type="text/css">
	.help-block em{display:inline-block;width:10em;font-weight:bold;font-style:normal;}
</style>
<script>
require(['angular.sanitize', 'bootstrap', 'underscore', 'util'], function(angular, $, _, util){
	angular.module('app', ['ngSanitize']).controller('replyForm', function($scope, $http){
		$scope.reply = {
			advSetting: false,
			advTrigger: false,
			entry: {php echo json_encode($reply)} 
		};
		$scope.trigger = {};
		$scope.trigger.descriptions = {};
		$scope.trigger.descriptions.contains = '用户进行交谈时，对话中包含上述关键字就执行这条规则。';
		$scope.trigger.descriptions.regexp = '用户进行交谈时，对话内容符合述关键字中定义的模式才会执行这条规则。<br/><strong>注意：如果你不明白正则表达式的工作方式，请不要使用正则匹配</strong> <br/><strong>注意：正则匹配使用MySQL的匹配引擎，请使用MySQL的正则语法</strong> <br /><strong>示例: </strong><br/><em>^微信</em>匹配以“微信”开头的语句<br /><em>微信$</em>匹配以“微信”结尾的语句<br /><em>^微信$</em>匹配等同“微信”的语句<br /><em>微信</em>匹配包含“微信”的语句<br /><em>[0-9\.\-]</em>匹配所有的数字，句号和减号<br /><em>^[a-zA-Z_]$</em>所有的字母和下划线<br /><em>^[[:alpha:]]{3}$</em>所有的3个字母的单词<br /><em>^a{4}$</em>aaaa<br /><em>^a{2,4}$</em>aa，aaa或aaaa<br /><em>^a{2,}$</em>匹配多于两个a的字符串';
		$scope.trigger.descriptions.trustee = '如果没有比这条回复优先级更高的回复被触发，那么直接使用这条回复。<br/><strong>注意：如果你不明白这个机制的工作方式，请不要使用直接接管</strong>';
		$scope.trigger.labels = {};
		$scope.trigger.labels.contains = '包含关键字';
		$scope.trigger.labels.regexp = '正则表达式模式';
		$scope.trigger.labels.trustee = '直接接管操作';
		$scope.trigger.active = 'contains';
		$scope.trigger.items = {};
		$scope.trigger.items.default = '';
		$scope.trigger.items.contains = [];
		$scope.trigger.items.regexp = [];
		$scope.trigger.items.trustee = [];
		if($scope.reply.entry) {
			$scope.reply.entry.istop = $scope.reply.entry.displayorder >= 255 ? 1 : 0;
			//$scope.reply.advSetting = $scope.reply.entry.displayorder!=0 || !$scope.reply.entry.status;
			if($scope.reply.entry.keywords) {
				angular.forEach($scope.reply.entry.keywords, function(v, k){
					if(v.type == '1') {
						this.default += (v.content + ',');
					}
					if(v.type == '2') {
						this.contains.push({content: v.content, label: '请输入' + $scope.trigger.labels.contains, saved: true});
					}
					if(v.type == '3') {
						this.regexp.push({content: v.content, label: '请输入' + $scope.trigger.labels.regexp, saved: true});
					}
					if(v.type == '4') {
						this.trustee.push({});
					}
				}, $scope.trigger.items);
				if($scope.trigger.items.default.length > 1) {
					$scope.trigger.items.default = $scope.trigger.items.default.slice(0, $scope.trigger.items.default.length - 1);
				}
				if($scope.trigger.items.contains.length > 0 || $scope.trigger.items.regexp.length > 0 || $scope.trigger.items.trustee.length > 0) {
					$scope.reply.advTrigger = true;
				}
				if($scope.trigger.items.contains.length > 0) {
					$('a[data-toggle="tab"]').eq(0).tab('show');
					$scope.trigger.active = 'contains';
				} else if($scope.trigger.items.regexp.length > 0) {
					$('a[data-toggle="tab"]').eq(1).tab('show');
					$scope.trigger.active = 'regexp';
				} else if($scope.trigger.items.trustee.length > 0) {
					$('a[data-toggle="tab"]').eq(2).tab('show');
					$scope.trigger.active = 'trustee';
				}
			}
		}
		$scope.trigger.addItem = function(){
			var type = $scope.trigger.active;
			if(type != 'trustee') {
				$scope.trigger.items[type].push({content: '', label: '请输入' + $scope.trigger.labels[type], saved: false});
			} else {
				if($scope.trigger.items.trustee.length == 0) {
					$scope.trigger.items.trustee.push({type:4, content:''});
				}
			}
		};
		
		$scope.trigger.saveItem = function(item){
			item.saved = !item.saved;
		};
		$scope.trigger.removeItem = function(item) {
			var type = $scope.trigger.active;
			$scope.trigger.items[type] = _.without($scope.trigger.items[type], item);
			$scope.$digest();
		};
		$scope.trigger.test = function(item) {
		}
		if($.isFunction(window.initReplyController)) {
			window.initReplyController($scope, $http);
		}
		$('#reply-form').submit(function(){
			if($.trim($(':text[name="name"]').val()) == '') {
				util.message('必须输入回复规则名称');
				return false;
			}
			var val = [];
			$scope.$digest();
			if($scope.trigger.items.default != '') {
				var kws = $scope.trigger.items.default.replace('，', ',').split(',');
				kws = _.union(kws);
				angular.forEach(kws, function(v){
					if(v != '') {
						val.push({type: 1, content: v});
					}
				}, val);
			}
			angular.forEach($scope.trigger.items, function(v, name){
				var flag = true;
				if(name != 'default' && v.length > 0) {
					if(name == 'contains' || name == 'regexp'){
						angular.forEach(v, function(value){
							if(value.content.trim() != '') {
								this.push({
									content: value.content,
									type: name == 'contains' ? 2 : 3
								});
							}
						}, val);
					}
					if(name == 'trustee'){
						angular.forEach(v, function(value){
							this.push({type:4, content:''});
						}, val);
					}
				}
			}, val);
			if(val.length == 0 && $scope.trigger.active != 'trustee') {
				util.message('请输入有效的触发关键字.');
				return false;
			}
			$scope.$digest();
			val = angular.toJson(val);
			$(':hidden[name=keywords]').val(val);
			if($.isFunction(window.validateReplyForm)) {
				return window.validateReplyForm(this, $, _, util, $scope, $http);
			}
			return true;
		});
		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			$scope.trigger.active = e.target.hash.replace(/#/, '');
			$scope.$digest();
		})
		util.emotion($("#keyword"), $("#keywordinput")[0], function(txt, elm, target){
			$scope.trigger.items.default = $(target).val();
			$scope.$digest();
		});
	}).filter('nl2br', function($sce){
		return function(text) {
			return text ? $sce.trustAsHtml(text.replace(/\n/g, '<br/>')) : '';
		};
	}).directive('ngInvoker', function($parse){
		return function (scope, element, attr) {
			scope.$eval(attr.ngInvoker);
		};
	}).directive('ngMyEditor', function(){
		var editor = {
			'scope' : {
				'value' : '=ngMyValue'
			},
			'template' : '<textarea id="editor" style="height:600px;width:100%;"></textarea>',
			'link' : function ($scope, element, attr) {
				if(!element.data('editor')) {
					editor = UE.getEditor('editor', ueditoroption);
					element.data('editor', editor);
					editor.addListener('contentChange', function() {
						$scope.value = editor.getContent();
						$scope.$root.$$phase || $scope.$apply('value');
					});
					editor.addListener('ready', function(){
						if (editor && editor.getContent() != $scope.value) {
							editor.setContent($scope.value);
						}
						$scope.$watch('value', function (value) {
							if (editor && editor.getContent() != value) {
								editor.setContent(value ? value : '');
							}
						});
					});
				}
			}
		};
		return editor;
	});
	angular.bootstrap($('#js-reply-form')[0], ['app']);


	// 检测规则是否已经存在
	window.checkKeyWord = function(key) {
		var keyword = key.val().trim();
		if (keyword == '') {
			return false;
		}
		var type = key.attr('data-type');
		var wordIndex = key.index('.keyword');
		var isLeagl = true;
		$('.keyword').each(function(index) {
			var currentWord = $(this).val().trim();
			if (keyword == currentWord && wordIndex != index) {
				isLeagl = false;
				return false;
			}
		});
		if (isLeagl === false) {
			key.next().text('');
			util.message('该关键字已重复存在于当前规则中.');
			return false;
		}

		$.post(location.href, {keyword:keyword}, function(resp){
			if(resp != 'success') {
				var rid = $('input[name="rid"]').val();
				var rules = JSON.parse(resp);
				var url = "{php echo url('platform/reply/post', array('m' => $_GPC['m']));}";
				var ruleurl = '';
				for (rule in rules) {
					if (rid != rules[rule].id) {
						ruleurl += "<a href='" + url + "&rid=" + rules[rule].id + "' target='_blank'><strong class='text-danger'>" + rules[rule].name + "</strong></a>&nbsp;";
					}
				}
				if (ruleurl != '') {
					key.next().html('该关键字已存在于 ' + ruleurl + ' 规则中.');
				}
			} else {
				key.next().text('');
			}
		});
	}

	$('.keyword').each(function() {
		$(this).attr('data-type', 'keyword');
	});
});

</script>
<div class="clearfix" id="js-reply-form" ng-controller="replyForm">
	<form id="reply-form" class="form-horizontal form" action="../platform/reply-post.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">添加回复规则 <span class="text-muted">删除，修改规则、关键字以及回复后，请提交以保存操作。</span></div>
					<ul class="list-group">
						<li class="list-group-item">
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">回复规则名称</label>
								<div class="col-sm-6 col-md-8 col-xs-12">
									<input type="text" class="form-control" placeholder="请输入回复规则的名称" name="name" value="" />
									<span class="help-block">
										您可以给这条规则起一个名字, 方便下次修改和查看. <br/>
										<strong class="text-danger">选择高级设置: 将会提供一系列的高级选项供专业用户使用.</strong>
									</span>
								</div>
								<div class="col-sm-3 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" ng-model="reply.advSetting" /> 高级设置
										</label>
									</div>
								</div>
							</div>
							<div class="form-group" ng-show="reply.advSetting">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">状态</label>
								<div class="col-sm-9">
									<label class="radio-inline">
										<input type="radio" name="status" value="1" /> 启用
									</label>
									<label class="radio-inline">
										<input type="radio" name="status" value="0" checked="checked" /> 禁用
									</label>
									<span class="help-block">您可以临时禁用这条回复.</span>
								</div>
							</div>
							<div class="form-group" ng-show="reply.advSetting">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">置顶回复</label>
								<div class="col-sm-9">
									<label class="radio-inline">
										<input type="radio" name="istop" ng-model="reply.entry.istop" ng-value="1" value="1" /> 置顶
									</label>
									<label class="radio-inline">
										<input type="radio" name="istop" ng-model="reply.entry.istop" ng-value="0" value="0" checked="checked" /> 普通
									</label>
									<span class="help-block">“置顶”时无论在什么情况下均能触发且使终保持最优先级</span>
								</div>
							</div>
							<div class="form-group" ng-show="reply.advSetting && !reply.entry.istop">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">优先级</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" placeholder="输入这条回复规则优先级" name="displayorder_rule" value="">
									<span class="help-block">规则优先级，越大则越靠前，最大不得超过254</span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">触发关键字</label>
								<div class="col-sm-6 col-md-8 col-xs-12">
									<input type="hidden" name="rid" value="" />
									<input type="text" class="form-control keyword" placeholder="请输入触发关键字" ng-model="trigger.items.default" id="keywordinput" onblur="checkKeyWord($(this));" />
									<span class="help-block"></span>
									<input type="hidden" name="keywords"/>
									<span class="help-block">
										当用户的对话内容符合以上的关键字定义时，会触发这个回复定义。多个关键字请使用逗号隔开。<a href="javascript:;" id="keyword"><i class="fa fa-github-alt"></i> 表情</a> <br />
										<strong class="text-danger">选择高级触发: 将会提供一系列的高级触发方式供专业用户使用(注意: 如果你不了解, 请不要使用). </strong>
									</span>
								</div>
								<div class="col-sm-3 col-md-2">
									<div class="checkbox">
										<label>
											<input type="checkbox" ng-model="reply.advTrigger" /> 高级触发
										</label>
									</div>
								</div>
							</div>
							<div class="form-group" ng-show="reply.advTrigger">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">高级触发列表</label>
								<div class="col-sm-9">
									<div class="panel panel-default tab-content">
										<div class="panel-heading">
											<ul class="nav nav-pills">
												<li class="active"><a href="#contains" data-toggle="tab">包含关键字</a></li>
												<li><a href="#regexp" data-toggle="tab">正则表达式模式匹配</a></li>
												<li><a href="#trustee" data-toggle="tab">直接接管</a></li>
											</ul>
										</div>
										<ul class="tab-pane list-group active" id="contains">
											<li class="list-group-item row" ng-repeat="entry in trigger.items.contains">
												<div class="col-xs-12 col-sm-8">
													<input type="text" class="form-control keyword" ng-hide="entry.saved" placeholder="" ng-model="entry.content" onblur="checkKeyWord($(this));" />
													<span class="help-block"></span>
													<p class="form-control-static" ng-show="entry.saved" ng-bind="entry.content"></p>
												</div>
												<div class="col-sm-4">
													<div class="btn-group">
														<a href="javascript:;" class="btn btn-default" ng-click="trigger.saveItem(entry);">编辑</a>
														<a href="javascript:;" class="btn btn-default" ng-click="trigger.removeItem(entry);">删除</a>
													</div>
												</div>
											</li>
										</ul>
										<ul class="tab-pane list-group" id="regexp">
											<li class="list-group-item row" ng-repeat="entry in trigger.items.regexp">
												<div class="col-xs-12 col-sm-8">
													<input type="text" class="form-control keyword" ng-hide="entry.saved" placeholder="" ng-model="entry.content" onblur="checkKeyWord($(this));" />
													<span class="help-block"></span>
													<p class="form-control-static" ng-show="entry.saved" ng-bind="entry.content"></p>
												</div>
												<div class="col-sm-4">
													<div class="btn-group">
														<a href="javascript:;" class="btn btn-default" ng-click="trigger.saveItem(entry);">保存</a>
														<a href="javascript:;" class="btn btn-default" ng-click="trigger.removeItem(entry);">删除</a>
													</div>
												</div>
											</li>
										</ul>
										<ul class="tab-pane list-group" id="trustee">
											<li class="list-group-item row" ng-repeat="entry in trigger.items.trustee">
												<div class="col-xs-12 col-sm-8">
													<p class="form-control-static">符合优先级条件时, 这条回复将直接生效</p>
												</div>
												<div class="col-sm-4">
													<a href="javascript:;" class="btn btn-default" ng-click="trigger.removeItem(entry);">取消接管</a>
												</div>
											</li>
										</ul>
										<div class="panel-footer">
											<a href="javascript:;" class="btn btn-default" ng-click="trigger.addItem();" ng-bind="'添加' + trigger.labels[trigger.active]">添加</a>
											<span class="help-block" ng-bind-html="trigger.descriptions[trigger.active]"></span>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div> 
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<?php
				// echo module_build_form('custom', 0); 
				?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-1" />
				<input type="hidden" name="token" value="" />
			</div>
		</div>
	</form>
</div>
<?php
	require '../common/footer.php';
?>