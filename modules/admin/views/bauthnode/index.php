<?php
use yii\helpers\Url;
?>
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="/admin/css/select2_metro.css"/>
<link rel="stylesheet" href="/admin/css/DT_bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box grey">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-user"></i>建立权限节点
				</div>
				<div class="actions">
    				<button class="btn blue" data-toggle="modal" data-target="#addbode"><i class="icon-pencil"></i>新增权限节点</button>
					<div class="btn-group">
						<a class="btn green" href="#" data-toggle="dropdown">
						<i class="icon-cogs"></i> 工具
						<i class="icon-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-right">
							<li><a href="#"><i class="icon-pencil"></i> 编辑</a></li>
							<li><a href="#"><i class="icon-trash"></i> 删除</a></li>
							<li class="divider"></li>
							<li><a href="#"><i class="icon-ok"></i> 数据库还原</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="sample_2">
				<thead>
				<tr>
					<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes"/></th>
					<th>编号</th>
					<th class="hidden-480">名称</th>
					<th class="hidden-480">描述</th>
					<th class="hidden-480">创建时间</th>
					<th class="hidden-480">更新时间</th>
					<th class="hidden-480">操作</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($nodes as $key =>$item) {?>
				<tr class="odd gradeX">
					<td><input type="checkbox" class="checkboxes" value="1"/></td>
					<td><?=$key+1?></td>					
					<td class="hidden-480"><?=$item->name?></td>
					<td class="hidden-480"><?=$item->description?></td>
					<td class="hidden-480"><?=$item->createdAt?></td>
					<td class="hidden-480"><?=$item->updatedAt?></td>
					<td class="hidden-480"><button onclick="deletebackup();" class="btn red" type="button"><i class="icon-trash"></i> 删除</button></td>
				</tr>
				<?php }?>
				</tbody>
				</table>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>

<div class="modal fade" id="addbode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" 
               aria-hidden="true">
            </button>
            <h4 class="modal-title" id="myModalLabel">新增权限节点</h4>
         </div>
         <form id="NodeForm" method="post" action="<?=Url::toRoute("/admin/bauthnode/create") ?>" style="margin: 0px" class="form-horizontal">
             <div class="modal-body">
                <div class="control-group">
    				<label class="control-label">节点名称<span class="required">*</span></label>
    				<div class="controls">
    					<input type="text" name="NodeForm[name]" data-required="1" class="span3 m-wrap"/>
    				</div>
    			</div>
    			<div class="control-group">
    				<label class="control-label">节点描述<span class="required">*</span></label>
    				<div class="controls">
    					<input name="NodeForm[description]" type="text" class="span3 m-wrap"/>
    				</div>
    			</div>
    			<div class="control-group">
    				<label class="control-label">父节点名称<span class="required">*</span></label>
    				<div class="controls">
    					<input name="NodeForm[parent]" type="text" class="span3 m-wrap"/>
    				</div>
    			</div>
             </div>
             <input type="hidden" value="<?=yii::$app->request->getCsrfToken() ?>"name="_csrf">
             <div class="modal-footer">
                <button type="button" class="btn green" 
                   data-dismiss="modal">关闭
                </button>
                <button type="submit" class="btn green">确认添加</button>
             </div>
         </form>
      </div>
   </div>
</div>


<!-- END PAGE CONTENT-->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="/admin/js/select2.min.js"></script>
<script type="text/javascript" src="/admin/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="/admin/js/DT_bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/admin/js/app.js"></script>
<script src="/admin/js/table-managed.js"></script>     
<script>
	jQuery(document).ready(function() {       
	   App.init();
	   TableManaged.init();
	});
	function deletebackup() {
		dialog({
		    title: prompttitle,
		    content: databasedelete,
		    okValue: '确定',
		    ok: function () {
		        this.title('提交中…');
		        return false;
		    },
		    cancelValue: '取消',
		    cancel: function () {}
		}).showModal();
	};
</script>
<!-- END PAGE LEVEL SCRIPTS -->