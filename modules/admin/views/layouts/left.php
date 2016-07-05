<?php use yii\helpers\Url;?>
<!-- Sidebar Menu -->
<ul class="sidebar-menu">
	<li class="header">HEADER</li>
	<!-- Optionally, you can add icons to the links -->
	<li class="treeview">
		<a href="#">
    		<i class="fa fa-home"></i>
    		<span>站点管理</span>
			<span class="label label-primary pull-right">4</span>
		</a>
		<ul class="treeview-menu">
			<li><a href="#"><i class="fa fa-circle-o"></i> 节点管理</a></li>
			<li><a href="<?=Url::toRoute('/admin/site/index') ?>"><i class="fa fa-circle-o"></i> 站点设置</a></li>
			<li><a href="#"><i class="fa fa-circle-o"></i> 后台首页</a></li>
			<li><a href="<?=Url::toRoute("/admin/bdbbackuprestore/index")?>"><i class="fa fa-circle-o"></i> 数据库备份与还原<small class="label pull-right bg-green">new</small></a></li>
		</ul>
	</li>
	<li class="treeview">
		<a href="#">
    		<i class="fa fa-users"></i>
    		<span>客户管理</span>
    		<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			<li><a href="#"><i class="fa fa-circle-o"></i> 客户管理</a></li>
			<li><a href="#"><i class="fa fa-circle-o"></i> 管理组</a></li>
			<li><a href="#"><i class="fa fa-circle-o"></i> 站长管理</a></li>
		</ul>
	</li>
	<li class="treeview">
		<a href="#">
    		<i class="fa fa-qrcode"></i>
    		<span>公众号管理</span>
    		<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		</ul>
	</li>
</ul><!-- /.sidebar-menu -->