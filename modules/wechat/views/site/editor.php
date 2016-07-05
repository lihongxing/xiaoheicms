<?php
	require '../common/header2.php';
?>
<link href="../resource/css/app.css" rel="stylesheet">
<!--第一部分
<ul class="nav nav-tabs">
	<li class="active"><a href="../site/editor.php">专题管理</a></li>
	<li><a href="../site/editor.php">添加专题页面</a></li>
</ul>
<div class="clearfix">
	<div class="panel panel-default">
		<div class="panel-heading">
			微页面
		</div>
		<div class="table-responsive panel-body">
			<table class="table table-hover">
				<thead class="navbar-inner">
				<tr>
					<th>名称</th>
					<th style="width:200px;">关键字</th>
					<th style="width:210px;">创建时间</th>
					<th style="width:250px;">操作</th>
				</tr>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td></td>
						<td>	1970-01-01 08:00</td>
						<td style="position:relative;">
							<a href="../site/editor.php">编辑</a>
							&nbsp;-&nbsp;
							<span><a class="js-clip" href="javascript:;" data-url="{php echo murl('../home/page.php')}">复制链接</a></span>
							&nbsp;-&nbsp;
							<a href="../site/editor.php" onclick="if(!confirm('确定删除该微页面吗？')) return false;">删除</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
-->
<!--第二部分
	<ul class="nav nav-tabs">
		<li><a href="../site/editor.php">专题管理</a></li>
		<li class="active"><a href="../site/editor.php">添加专题页面</a></li>
	</ul>
	<form action="" method="post" ng-controller="commonCtrl">
		<input type="hidden" name="multiid" value="" />
		<input type="hidden" name="id" value="" />
		<div class="app clearfix" ng-controller="mainCtrl">
			<input type="hidden" name="wapeditor[params]" id="wapeditor-params" value="" />
			<input type="hidden" name="wapeditor[html]" id="wapeditor-html" value="" />
			<div class="app-preview">
				<div class="app-header"></div>
				<div class="app-content" ng-style="{'background-color' : activeModules[0].params.bgColor}">
					<div class="modules">
						<div ng-if="module['id']" id="module-" name="" index="" ng-class="{'modules-actions': activeItem.index == module.index, 'js-sorttable' : !module.issystem}" ng-repeat="module in activeModules | orderBy:'displayorder'"  ng-style="{'border' : module.issystem ? 'none' : ''}">
							<div ng-init="displayPanel = ('widget-'+(module['id'].toLowerCase())+'-display.html')" ng-include="displayPanel" ng-click="editItem(module.index)"></div>
							<div class="text-right action-wrap">
								<span class="label-default action edit" ng-click="editItem(module.index)">编辑</span>
								<span class="label-default action remove" data-container="body" data-toggle="popover" data-placement="left" ng-click="deleteItem(module.index)">删除</span>
							</div>
						</div>
					</div>
				</div>
				<div class="app-region">
					<div class="arrow-top"></div>
					<div class="panel panel-default">
						<div class="panel-body">
							<h4 class="text-center">添加内容</h4>
							<ul class="app-add-filed clearfix">
								<li ng-repeat="m in modules" ng-if="!m.issystem" ng-click="addItem(m['id'])"><a id="" class="btn btn-default" href="#" ng-bind="m['name']"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="app-side">
				<div ng-init="editorPanel = ('widget-'+(activeItem['id'].toLowerCase())+'-editor.html'.toLowerCase())" ng-show="activeItem.id == editorid" ng-repeat="editorid in editors" ng-include="editorPanel" id="editor" class="editor"></div>
			</div>
			<div class="shop-preview col-xs-12 col-sm-9 col-lg-10">
				<div class="text-center alert alert-warning">
					<button type="button" class="btn btn-primary js-editor-submit">上架</button>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(function(){
				$('.modules').click(function(){
					return false;
				});
				require(['wapeditor'], function() {
					activeModules = {php echo !empty($page['params']) ? $page['params'] : 'null'};
					angular.bootstrap(document, ['app']);
				});
			});
		</script>
	</form>
-->
<!--第三部分
	<ul class="nav nav-tabs">
		<li><a href="../site/multi.php">返回微站管理</a></li>
		<li class="active"><a href="../site/editor.php">快捷菜单</a></li>
	</ul>
	<form action="" method="post">
		<div class="shopNav" id="quickmenu" ng-controller="quickMenuCtrl">
			<div class="well clearfix">
				<div class="shopNav-info col-sm-8">
					<h3>快捷导航</h3>
					<div>微站的各个页面可以通过导航串联起来。通过精心设置的导航，方便访问者在页面或是栏目间快速切换，引导访问者前往您期望的页面。</div>
				</div>
				<div class="shopNav-switch col-sm-4 text-right">
					<input type="checkbox" name="status" value="1" checked="checked" />
				</div>
			</div>
			<input type="hidden" name="multiid" value="" />
			<input type="hidden" name="type" value="" />
			<input type="hidden" name="wapeditor[params]" id="wapeditor-params" value=""/>
			<input type="hidden" name="wapeditor[html]" id="wapeditor-html" value=""/>
			<div class="app clearfix">
				<div class="app-preview">
					<div class="app-header"></div>
					<div class="app-content">
						<div class="inner">
							<div class="title">
								<h1><span>[页面标题]</span></h1>
							</div>
						</div>
						<div class="nav-menu" style="display:none;">
							<div class="js-quickmenu nav-menu-wx clearfix" ng-class="{0 : 'has-nav-0', 1 : 'has-nav-1', 2: 'has-nav-2', 3: 'has-nav-3', 4 : 'has-nav-3'}[activeItem.menus.length]" ng-if="activeItem.navStyle == 1">
								<div class="nav-home text-center">
									<a href=""><i class="fa fa-home"></i></a>
								</div>
								<ul class="nav-group">
									<li class="nav-group-item" ng-if="$index < 3" ng-repeat="menu in activeItem.menus">
										<a ng-if="menu.submenus.length == 0" href="">
										</a>
										<a ng-if="menu.submenus.length > 0" href="javascript:void();" data-toggle="dropdown">
											<i class="fa fa-minus-circle"></i>
										</a>
										<dl ng-if="menu.submenus.length > 0">
											<dd>
												<a href="" ng-repeat="submenu in menu.submenus"></a>
											</dd>
										</dl>
									</li>
								</ul>
							</div>
							<div class="js-quickmenu nav-menu-app has-nav-0" ng-if="activeItem.navStyle == 2" ng-class="{0 : 'has-nav-0', 1 : 'has-nav-1', 2: 'has-nav-2', 3: 'has-nav-3', 4: 'has-nav-4', 5: 'has-nav-5'}[activeItem.menus.length]" ng-style="{'background-color' : activeItem.bgColor}">
								<ul class="nav-group clearfix">
									<li class="nav-group-item" ng-repeat="menu in activeItem.menus">
										<a href="" style="background-position: center 2px" ng-style="{'background-image': menu.image ? 'url('+menu.image+')' : ''}">
											<i ng-hide="menu.image" class="fa" ng-style="{'color' : menu.icon.color}" js-onclass-name="" js-onclass-color="" ng-class="menu.icon.name"></i>
											<span ng-style="{'color' : menu.icon.color}" js-onclass-color=""></span>
										</a>
									</li>
								</ul>
							</div>
							<div class="js-quickmenu nav-menu-cart" ng-if="activeItem.navStyle == 3" ng-class="{0 : 'has-nav-0', 1 : 'has-nav-1', 2: 'has-nav-2', 3: 'has-nav-3', 4: 'has-nav-4'}[activeItem.menus.length]" ng-style="{'background-color' : activeItem.bgColor}">
								<ul class="nav-group clearfix">
									<li class="nav-group-item">
										<a href="" ng-style="{'background-image': activeItem.menus[0].image ? 'url('+activeItem.menus[0].image+')' : ''}">
											<i ng-hide="activeItem.menus[0].image" class="fa" ng-style="{'color' : activeItem.menus[0].icon.color}"
											ng-class="activeItem.menus[0].icon.name">
											</i>
										</a>
									</li>
									<li ng-if="activeItem.menus[2]" class="nav-group-item">
										<a href="" ng-style="{'background-image': activeItem.menus[1].image ? 'url('+activeItem.menus[1].image+')' : ''}">
											<i ng-hide="activeItem.menus[1].image" class="fa" ng-style="{'color' : activeItem.menus[1].icon.color}" ng-class="activeItem.menus[1].icon.name"></i>
										</a>
									</li>
									<li class="nav-home nav-group-item">
										<a href="" ng-style="{'background-image': activeItem.extend[0].image ? 'url('+activeItem.extend[0].image+')' : ''}">
											<i ng-hide="activeItem.extend[0].image" class="fa" ng-style="{'color' : activeItem.extend[0].icon.color}" ng-class="activeItem.extend[0].icon.name"></i>
										</a>
									</li>
									<li class="nav-group-item" ng-if="activeItem.menus[1]">
										<a ng-if="!activeItem.menus[2]" href="" ng-style="{'background-image': activeItem.menus[1].image ? 'url('+activeItem.menus[1].image+')' : ''}">
											<i ng-hide="activeItem.menus[1].image" class="fa" ng-style="{'color' : activeItem.menus[1].icon.color}" ng-class="activeItem.menus[1].icon.name"></i>
										</a>
										<a ng-if="activeItem.menus[2]" href="" ng-style="{'background-image': activeItem.menus[2].image ? 'url('+activeItem.menus[2].image+')' : ''}">
											<i ng-hide="activeItem.menus[2].image" class="fa" ng-style="{'color' : activeItem.menus[2].icon.color}" ng-class="activeItem.menus[2].icon.name"></i>
										</a>
									</li>
									<li ng-if="activeItem.menus[3]" class="nav-group-item">
										<a href="" ng-style="{'background-image': activeItem.menus[3].image ? 'url('+activeItem.menus[3].image+')' : ''}">
											<i ng-hide="activeItem.menus[3].image" class="fa" ng-style="{'color' : activeItem.menus[3].icon.color}" ng-class="activeItem.menus[3].icon.name"></i>
										</a>
									</li>
								</ul>
							</div>
							<div class="js-quickmenu nav-menu-path rotate-nav has-nav-4" ng-if="activeItem.navStyle == 4">
								<div class="nav-group">
									<div class="nav-group-item on" ng-repeat="menu in activeItem.menus">
										<a href="" ng-style="{'background-image': menu.image ? 'url('+menu.image+')' : ''}">
											<i ng-hide="menu.image" class="fa" ng-style="{'color' : menu.icon.color}" ng-class="menu.icon.name"></i>
										</a>
									</div>
								</div>
								<div class="nav-home nav-group-item">
									<a href="javascript:;" style="background-image:url(../resource/images/app/centerbtn.png);"></a>
								</div>
							</div>
							<div class="js-quickmenu nav-menu-sides rotate-nav has-nav-4" ng-if="activeItem.navStyle == 5">
								<div class="nav-group">
									<div class="nav-group-item on" ng-repeat="menu in activeItem.menus">
										<a href="" ng-style="{'background-image': menu.image ? 'url('+menu.image+')' : ''}">
											<i ng-hide="menu.image" class="fa" ng-style="{'color' : menu.icon.color}" ng-class="menu.icon.name"></i>
										</a>
									</div>
								</div>
								<div class="main-nav">
									<div class="nav-group-item pull-left">
										<a href="" ng-style="{'background-image': activeItem.extend[0].image ? 'url('+activeItem.extend[0].image+')' : ''}">
											<i ng-hide="activeItem.extend[0].image" class="fa" ng-style="{'color' : activeItem.extend[0].icon.color}" ng-class="activeItem.extend[0].icon.name"></i>
										</a>
									</div>
									<div class="nav-home nav-group-item" onclick="toggle(this)">
										<a href="javascript:;" style="background-image:url(../resource/images/app/centerbtn.png);"></a>
									</div>
									<div class="nav-group-item pull-right">
										<a href="" ng-style="{'background-image': activeItem.extend[1].image ? 'url('+activeItem.extend[1].image+')' : ''}">
											<i ng-hide="activeItem.extend[1].image" class="fa" ng-style="{'color' : activeItem.extend[1].icon.color}" ng-class="activeItem.extend[1].icon.name"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="app-side">
					<div class="panel panel-default" style="margin-bottom:15px; padding-bottom:0;">
						<div class="panel-body">
							<div>将导航应用在以下页面:</div>
							<div style="margin:10px 0;">
								<label class="checkbox-inline">
									<input type="checkbox" name="position" ng-model="activeItem.position.homepage" /> 微站主页
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="position" ng-model="activeItem.position.page" /> 微页面
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="position" ng-model="activeItem.position.article" /> 文章及分类
								</label>
							</div>
							<div>将导航隐藏在以下模块: <a ng-click="showSearchModules()" href="javascript:;">选择模块</a></div>
							<div>
								<div class="form-control-static">
									<label class="label label-warning" ng-show="!hasIgnoreModules">未设置，将在全部模块中显示</label>
									<label style="margin-right:5px;" class="label label-success" ng-show="hasIgnoreModules" ng-repeat="module in activeItem.ignoreModules"></label>
								</div>
							</div>
						</div>
					</div>
					<div class="app-shopNav-edit" style="display:none;">
						<div class="arrow-left"></div>
						<div class="inner">
							<div class="panel panel-default form-horizontal">
								<div class="panel-body">
									<div class="shopNav-edit-header clearfix">
										<div class="pull-right">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#shop-nav-modal">修改模板</button>
										</div>
										<div>当前模板: 微信公众号自定义菜单模板</div>
									</div>
									<div class="shopNav-wx" ng-show="activeItem.navStyle == 1">
										<div class="card" ng-init="$parentIndex = $index" ng-repeat="menu in activeItem.menus">
											<div class="btns">
												<a href="javascript:;" ng-click="removeMenu(menu)"><i class="fa fa-times"></i></a>
											</div>
											<div class="nav-region">
												<div class="first-nav">
													<h3>一级导航</h3>
													<div class="alert">
														<div class="form-group">
															<label class="control-label col-xs-3">标题</label>
															<div class="col-xs-9">
																<input type="text" class="form-control" name="" value="" ng-model="menu.title" />
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-xs-3">链接到</label>
															<div class="col-xs-9 ">
																<div ng-my-linker ng-my-url="menu.url" ng-my-title="menu.title"></div>
															</div>
														</div>
													</div>
												</div>
												<div class="second-nav">
													<h4>二级导航</h4>
													<div class="alert" ng-repeat="submenu in menu.submenus">
														<div class="del">
															<a href="javascript:;" ng-click="removeSubMenu($parentIndex, submenu)"><i class="fa fa-times"></i></a>
														</div>
														<div class="form-group">
															<label class="control-label col-xs-3">标题</label>
															<div class="col-xs-9">
																<input type="text" class="form-control" name="" ng-model="submenu.title">
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-xs-3">链接到</label>
															<div class="col-xs-9 ">
																<div ng-my-linker ng-my-url="submenu.url" ng-my-title="submenu.title"></div>
															</div>
														</div>
													</div>
													<div ng-show="menu.submenus.length < 5" ng-click="menu.submenus.length >= 5 ? '' : addSubMenu(menu);" class="add-shopNav">+ 添加二级导航</div>
												</div>
											</div>
										</div>
										<div ng-show="activeItem.menus.length < 3" class="add-shopNav text-center" ng-click="activeItem.menus.length >= 3 ? '' : addMenu();">+添加一级导航</div>
									</div>
									<div class="shopNav-app" ng-show="activeItem.navStyle == 2">
										<div class="form-group" style="border-bottom:1px solid #e5e5e5; padding:0 0 15px 0; margin:10px 0 0 0;">
											<label class="col-xs-3 control-label">页面颜色</label>
											<div class="col-xs-9 ">
												<div ng-my-colorpicker ng-my-color="activeItem.bgColor" ng-my-default-color="'#2B2D30'"></div>
											</div>
										</div>
										<div class="card" ng-repeat="menu in activeItem.menus">
											<div class="btns">
												<a href="javascript:;" ng-click="removeMenu(menu)"><i class="fa fa-times"></i></a>
											</div>
											<div class="nav-img-group">
												<div class="clearfix">
													<div class="nav-img-normal pull-left">
														<p>普通：</p>
														<div ng-my-iconer ng-my-image="menu.image" ng-my-icon="menu.icon">选择</div>
													</div>
													<div class="nav-img-highlight pull-left">
														<p>高亮：</p>
														<div ng-my-iconer ng-my-image="menu.hoverimage" ng-my-icon="menu.hovericon">选择</div>
													</div>
												</div>
												<div class="help-block">图片尺寸要求：不大于128*100像素，支持PNG格式</div>
											</div>
											<div class="form-group">
												<label class="control-label col-xs-3">标题</label>
												<div class="col-xs-9">
													<input type="text" class="form-control" name="" ng-model="menu.title">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-xs-3">链接到</label>
												<div class="col-xs-9 ">
													<div ng-my-linker ng-my-url="menu.url" ng-my-title="menu.title"></div>
												</div>
											</div>
										</div>
										<div class="add-shopNav text-center" ng-show="activeItem.menus.length < 5" ng-click="activeItem.menus.length >= 5 ? '' : addMenu();">+添加导航</div>
									</div>
									<div class="shopNav-cart" ng-show="activeItem.navStyle == 3">
										<div class="form-group" style="border-bottom:1px solid #e5e5e5; padding:0 0 15px 0; margin:0 0 10px 0;">
											<label class="col-xs-3 control-label">页面颜色</label>
											<div class="col-xs-9">
												<div ng-my-colorpicker ng-my-color="activeItem.bgColor" ng-my-default-color="'#2B2D30'"></div>
											</div>
										</div>
										<p>添加中间主图标</p>
										<div class="card">
											<div class="nav-img-group">
												<div class="clearfix">
													<div class="nav-img-normal pull-left">
														<p>普通：</p>
														<div ng-my-iconer ng-my-image="activeItem.extend[0].image" ng-my-icon="activeItem.extend[0].icon">选择</div>
													</div>
													<div class="nav-img-highlight pull-left">
														<p>高亮：</p>
														<div ng-my-iconer ng-my-image="activeItem.extend[0].hoverimage" ng-my-icon="activeItem.extend[0].hovericon">选择</div>
													</div>
												</div>
												<div class="help-block">图片尺寸要求：不大于128*100像素，支持PNG格式</div>
											</div>
											<div class="form-group">
												<label class="control-label col-xs-3">链接到</label>
												<div class="col-xs-9 "><div ng-my-linker ng-my-url="activeItem.extend[0].url" ng-my-title="activeItem.extend[0].title"></div></div>
											</div>
										</div>
										<p>添加两侧图标</p>
										<div class="help-block">此导航模板建议您用两个或者四个自定义图标效果图最佳哦！</div>
										<div class="card" ng-repeat="menu in activeItem.menus">
											<div class="nav-img-group">
												<div class="btns">
													<a href="javascript:;" ng-click="removeMenu(menu)"><i class="fa fa-times"></i></a>
												</div>
												<div class="clearfix">
													<div class="nav-img-normal pull-left">
														<p>普通：</p>
														<div ng-my-iconer ng-my-image="menu.image" ng-my-icon="menu.icon">选择</div>
													</div>
													<div class="nav-img-highlight pull-left">
														<p>高亮：</p>
														<div ng-my-iconer ng-my-image="menu.hoverimage" ng-my-icon="menu.hovericon">选择</div>
													</div>
												</div>
												<div class="help-block">图片尺寸要求：不大于128*100像素，支持PNG格式</div>
											</div>
											<div class="form-group">
												<label class="control-label col-xs-3">链接到</label>
												<div class="col-xs-9 ">
													<div ng-my-linker ng-my-url="menu.url" ng-my-title="menu.title"></div>
												</div>
											</div>
										</div>
										<div class="add-shopNav text-center" ng-show="activeItem.menus.length < 4" ng-click="activeItem.menus.length >= 4 ? '' : addMenu();">+添加导航</div>
									</div>
									<div class="shopNav-path" ng-show="activeItem.navStyle == 4">
										<form class="form-horizontal" action="" method="post">
											<p class="help-block">此导航模板建议您用三个自定义图标效果最佳哦！</p>
											<div class="card" ng-repeat="menu in activeItem.menus">
												<div class="btns"><a href="javascript:;" ng-click="removeMenu(menu)"><i class="fa fa-times"></i></a></div>
												<div class="nav-img-group">
													<div class="clearfix">
														<div class="nav-img-normal pull-left">
															<p>普通：</p>
															<div ng-my-iconer ng-my-image="menu.image" ng-my-icon="menu.icon">选择</div>
														</div>
													</div>
													<div class="help-block">图片尺寸要求：不大于128*100像素，支持PNG格式</div>
												</div>
												<div class="form-group">
													<label class="control-label col-xs-3">链接到</label>
													<div class="col-xs-9 "><div ng-my-linker ng-my-url="menu.url" ng-my-title="menu.title"></div></div>
												</div>
											</div>
											<div class="add-shopNav text-center" ng-show="activeItem.menus.length < 4" ng-click="activeItem.menus.length >= 4 ? '' : addMenu();">+添加导航</div>
										</form>
									</div>
									<div class="shopNav-sides" ng-show="activeItem.navStyle == 5">
										<form class="form-horizontal" action="" method="post">
											<p>添加两侧一级图标</p>
											<div class="card">
												<div class="nav-img-group">
													<div class="clearfix">
														<div class="nav-img-normal pull-left">
															<p>普通：</p>
															<div ng-my-iconer ng-my-image="activeItem.extend[0].image" ng-my-icon="activeItem.extend[0].icon">选择</div>
														</div>
													</div>
													<div class="help-block">图片尺寸要求：不大于128*100像素，支持PNG格式</div>
												</div>
												<div class="form-group">
													<label class="control-label col-xs-3">链接到</label>
													<div class="col-xs-9 ">
														<div ng-my-linker ng-my-url="activeItem.extend[0].url" ng-my-title="activeItem.extend[0].title"></div>
													</div>
												</div>
											</div>
											<div class="card">
												<div class="nav-img-group">
													<div class="clearfix">
														<div class="nav-img-normal pull-left">
															<p>普通：</p>
															<div ng-my-iconer ng-my-image="activeItem.extend[1].image" ng-my-icon="activeItem.extend[1].icon">选择</div>
														</div>
													</div>
													<div class="help-block">图片尺寸要求：不大于128*100像素，支持PNG格式</div>
												</div>
												<div class="form-group">
													<label class="control-label col-xs-3">链接到</label>
													<div class="col-xs-9 ">
														<div ng-my-linker ng-my-url="activeItem.extend[1].url" ng-my-title="activeItem.extend[1].title"></div>
													</div>
												</div>
											</div>
											<p>添加中间二级标题</p>
											<p class="help-block">此导航模板建议您用四个自定义图标效果最佳哦！</p>
											<div class="card" ng-repeat="menu in activeItem.menus">
												<div class="btns">
													<a href="javascript:;" ng-click="removeMenu(menu)"><i class="fa fa-times"></i></a>
												</div>
												<div class="nav-img-group">
													<div class="clearfix">
														<div class="nav-img-normal pull-left">
															<p>普通：</p>
															<div ng-my-iconer ng-my-image="menu.image" ng-my-icon="menu.icon">选择</div>
														</div>
													</div>
													<div class="help-block">图片尺寸要求：不大于128*100像素，支持PNG格式</div>
												</div>
												<div class="form-group">
													<label class="control-label col-xs-3">链接到</label>
													<div class="col-xs-9 ">
														<div ng-my-linker ng-my-url="menu.url" ng-my-title="menu.title"></div>
													</div>
												</div>
											</div>
											<div class="add-shopNav text-center" ng-show="activeItem.menus.length < 4" ng-click="activeItem.menus.length >= 4 ? '' : addMenu();">+添加导航</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="shop-preview col-xs-12 col-sm-9 col-lg-10">
					<div class="text-center alert alert-warning">
						<a class="btn btn-primary js-editor-submit" href="javascript:;">保存</a>
					</div>
				</div>
				<div class="modal fade" id="shop-nav-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">选择导航模板</h4>
							</div>
							<div class="modal-body clearfix">
								<div class="alert">
									<label class="radio-inline">
										<input type="radio" name="nav_style" value="1" ng-checked="activeItem.navStyle == 1">
										微信公众号自定义菜单样式
									</label>
									<div class="wx-example"></div>
								</div>
								<div class="alert">
									<label class="radio-inline">
										<input type="radio" name="nav_style" value="2" ng-checked="activeItem.navStyle == 2">
										APP导航模板1（图标及底色都可配置）
									</label>
									<div class="app-example"></div>
								</div>
								<div class="alert">
									<label class="radio-inline">
										<input type="radio" name="nav_style" value="3" ng-checked="activeItem.navStyle == 3">
										APP导航模板2
									</label>
									<div class="cart-example"></div>
								</div>
								<div class="col-xs-6" style="padding-left:0;">
									<div class="alert">
										<label class="radio-inline">
											<input type="radio" name="nav_style" value="4" ng-checked="activeItem.navStyle == 4">
											Path展开形式导航
										</label>
										<div class="path-example"></div>
									</div>
								</div>
								<div class="col-xs-6" style="padding-right:0;">
									<div class="alert">
										<label class="radio-inline">
											<input type="radio" name="nav_style" value="5">
											两侧展开形式导航
										</label>
										<div class="sides-example"></div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
								<button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="selectNavStyle()">确定</button>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" id="shop-modules-modal" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">选择忽略模块</h4>
							</div>
							<div class="modal-body clearfix">
								<table class="table table-hover">
									<thead class="navbar-inner">
										<tr>
											<th style="width:70%;">标题</th>
											<th style="width:30%; text-align:right"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td></td>
											<td>
												<a class="btn btn-default js-btn-select" ng-class="{'btn-primary' : activeItem.ignoreModules['']}" js-name="" js-title="{$m['title']}" onclick="$(this).toggleClass('btn-primary');$(this).html($(this).hasClass('btn-primary') ? '取消' : '选取')">选取</a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<script type="text/javascript">
		$(function(){
			require(['wapeditor', 'bootstrap.switch'], function() {
				$(":checkbox[name='status']").bootstrapSwitch();
				activeItem = {php echo !empty($page['params']) ? $page['params'] : 'null'};
				angular.bootstrap($('#quickmenu')[0], ['app']);
			});
			$('.app-content').click(function(){
				return false;
			});
		});
	</script>
-->
<!--第四部分-->
	<ul class="nav nav-tabs">
		<li class="active"><a href="javascript:;">会员中心</a></li>
		<li><a href="../site/editor.php">快捷菜单</a></li>
	</ul>
	<form action="" method="post">
	<input type="hidden" name="multiid" value="" />
	<input type="hidden" name="id" value="" />
	<div class="usercenter shopNav" ng-controller="commonCtrl">
		<div class="app clearfix" ng-controller="userCenterCtrl">
			<input type="hidden" name="wapeditor[params]" id="wapeditor-params" value="" />
			<input type="hidden" name="wapeditor[html]" id="wapeditor-html" value="" />
			<input type="hidden" name="wapeditor[nav]" id="wapeditor-nav" value="" />
			<div class="app-preview">
				<div class="app-header"></div>
				<div class="app-content">
					<div class="app-usercenter">
						<div class="inner">
							<div>
								<div ng-if="module['id'] == 'UCheader'" id="module-" name="" index="{{module.index}}" ng-class="{'modules-actions': activeItem.index == module.index, 'js-sorttable' : !module.issystem}" ng-repeat="module in activeModules | orderBy:'displayorder'"  ng-style="{'border' : module.issystem ? 'none' : ''}">
									<div ng-init="displayPanel = ('widget-'+(module['id'].toLowerCase())+'-display.html')" ng-include="displayPanel" ng-click="editItem(module.index)"></div>
									<!--自定义模块编辑部分-->
									<div class="text-right action-wrap">
										<span class="label-default action edit" ng-click="editItem(module.index)">编辑</span>
										<!--span class="label-default action app-add">加内容</span-->
										<span class="label-default action remove" data-container="body" data-toggle="popover" data-placement="left" ng-click="deleteItem(module.index)">删除</span>
									</div>
								</div>
							</div>
							<div class="clearfix">
								<div class="mnav-box">
									<ul>
										<li>
											<a class="mnav-box-list" href="javascript:;">
												<i class="fa fa-money"></i>
												<span>余额充值</span>
												<span class="pull-right"><i class="fa fa-angle-right"></i></span>
											</a>
										</li>
										<li>
											<a class="mnav-box-list" href="../wechat/card.php">
												<i class="fa fa-tags"></i>
												<span>微信卡券</span>
												<span class="pull-right"><i class="fa fa-angle-right"></i></span>
											</a>
										</li>
										<li>
											<a class="mnav-box-list" href="../activity/coupon.php">
												<i class="fa fa-money"></i>
												<span>我的折扣券</span>
												<span class="pull-right"><i class="fa fa-angle-right"></i></span>
											</a>
										</li>
										<li>
											<a class="mnav-box-list" href="../activity/token.php">
												<i class="fa fa-money"></i>
												<span>我的代金券</span>
												<span class="pull-right"><i class="fa fa-angle-right"></i></span>
											</a>
										</li>
										<li>
											<a class="mnav-box-list" href="../activity/goods.php">
												<i class="fa fa-money"></i>
												<span>我的真实物品</span>
												<span class="pull-right"><i class="fa fa-angle-right"></i></span>
											</a>
										</li>
									</ul>
									<ul ng-show="activeMenus.length > 0">
										<li ng-repeat="menu in activeMenus">
											<a class="mnav-box-list" ng-href="">
												<i ng-class="menu.css.icon.icon"></i>
												<span class="pull-right"><i class="fa fa-angle-right"></i></span>
											</a>
										</li>
									</ul>
									<ul>
										<li>
											<a class="mnav-box-list" href="../'mc/uc.php">
												<i class="fa fa-fw fa-user"></i>
												绑定账号
											</a>
										</li>
										<li>
											<a class="mnav-box-list" href="../mc/bond.php">
												<i class="fa fa-mobile-phone"></i>
												<span class="">绑定手机号</span>
												<span class="pull-right"><span class="btn btn-default">绑定</span></span>
											</a>
										</li>
											<li class="alert-li">
												<a class="mnav-box-list" href="../mc/bond.php">
													<i class="fa fa-unlock-alt"></i>
													<span class="">重置重要资料</span>
													<span class="pull-right"><span class="btn btn-default">重置</span></span>
												</a>
											</li>
										<li>
											<a class="mnav-box-list" href="../mc/bond.php">
												<i class="fa fa-map-marker"></i>
												<span class="">收货地址</span>
												<span class="pull-right"><span class="btn btn-default">修改</span></span>
											</a>
										</li>
										<li>
											<a class="mnav-box-list" href="../mc/home.php">
												<i class="fa fa-sign-out"></i>
												<span class="">退出系统</span>
												<span class="pull-right"><i class="fa fa-angle-right"></i></span>
											</a>
										</li>
									</ul>
									<div class="modules">
										<div ng-if="module['id'] && module['id'] != 'UCheader'" id="module-" name="" index="" ng-class="{'modules-actions': activeItem.index == module.index, 'js-sorttable' : !module.issystem}" ng-repeat="module in activeModules | orderBy:'displayorder'"  ng-style="{'border' : module.issystem ? 'none' : ''}">
											<div ng-init="displayPanel = ('widget-'+(module['id'].toLowerCase())+'-display.html')" ng-include="displayPanel" ng-click="editItem(module.index)"></div>
											<!--自定义模块编辑部分-->
											<div class="text-right action-wrap">
												<span class="label-default action edit" ng-click="editItem(module.index)">编辑</span>
												<!--span class="label-default action app-add">加内容</span-->
												<span class="label-default action remove" data-container="body" data-toggle="popover" data-placement="left" ng-click="deleteItem(module.index)">删除</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="app-region">
					<div class="arrow-top"></div>
					<div class="panel panel-default">
						<div class="panel-body">
							<h4 class="text-center">添加内容</h4>
							<ul class="app-add-filed clearfix">
								<li ng-repeat="m in modules" ng-if="!m.issystem" ng-click="addItem(m['id'])"><a id="" class="btn btn-default" href="#" ng-bind="m['name']"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="app-side">
				<div ng-init="editorPanel = ('widget-'+(activeItem['id'].toLowerCase())+'-editor.html'.toLowerCase())" ng-show="activeItem.id == editorid" ng-repeat="editorid in editors" ng-include="editorPanel" id="editor" class="editor"></div>
			</div>
			<div class="shop-preview col-xs-12 col-sm-9 col-lg-10">
				<div class="text-center alert alert-warning">
					<button type="submit" class="btn btn-primary js-editor-submit">上架</button>
				</div>
			</div>
		</div>
	</div>
	</form>
	{php echo tpl_wappage_editor($page['params']);}
	{php echo tpl_ueditor('')}
	<script type="text/javascript">
		$(function(){
			$('.app-preview').click(function(){
				return false;
			});
			require(['wapeditor'], function() {
				activeModules = {php echo !empty($page['params']) ? $page['params'] : 'null'};
				activeMenus = {php echo !empty($navs) ? json_encode($navs) : 'null'};
				angular.bootstrap(document, ['app']);
			});
			$('.modules').click(function(){
				return false;
			});
		});
	</script>
<?php
	require '../common/footer.php';
?>