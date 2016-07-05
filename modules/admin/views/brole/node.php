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
					<i class="icon-user"></i>建立权限
				</div>
				<div class="actions">
    				<button onclick="addnodeall();"class="btn blue" data-toggle="modal" data-target="#addrole"><i class="icon-plus"></i>权限确认</button>
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
					<th class="hidden-480">操作</th>
				</tr>
				</thead>
				<tbody>
				<?php $i=1; foreach ($nodes as $key =>$item) {?>
				<tr class="odd gradeX">
					<td><input type="checkbox" name="node" value="<?=$item->name?>" class="checkboxes" <?php if(in_array($item->name,$roleNodes)){echo "checked = true";} ?> /></td>
					<td><?=$i;$i++ ?></td>					
					<td class="hidden-480"><?=$item->name?></td>
					<td class="hidden-480"><?=$item->description?></td>
					<td class="hidden-480"> 
					   <a href="#" class="btn blue" ><i class="icon-key"></i>权限确认</a>
					</td>
				</tr>
				<?php }?>
				</tbody>
				</table>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
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
	function addnodeall() {
		var node =[]; 
		$('input[name="node"]:checked').each(function(){ 
			node.push($(this).val()); 
		});
		if(node.length==0) {
			var d = dialog({
				title: prompttitle,
			    content: addroleall
			});
			d.show();
			setTimeout(function () {
			    d.close().remove();
			    return false;
			}, 2000);
		}else{
			var adddrole= dialog({
			    title: prompttitle,
			    content: addroleconfim,
			    okValue: '确定',
			    ok: function () {
			        //获取当前选中的权限名称
			        var node =[]; 
					$('input[name="node"]:checked').each(function(){ 
						node.push($(this).val()); 
					});
					var _csrf = "<?=yii::$app->request->getCsrfToken()?>";
			        $.ajax({
			            type:"POST",
			            url:"<?=Url::toRoute(["/admin/brole/node",'name' => $name])?>",
			            datatype: "json",
			            async: true,
			            data:{node:node,_csrf:_csrf},
			            //成功返回之后调用的函数 
			            success:function(data){
			            	var data = eval('(' +data+ ')');
				            if(parseInt(data.status)==100){
				            	adddrole.close().remove();
				            	var d = dialog({
				            	    title: prompttitle,
				            	    content: addrolesueccess
				            	});
				            	d.show();
	    			        }    
				        } 
			         });
			         return false;
			    },
			    cancelValue: '取消',
			    cancel: function () {}
			}).showModal();  
		}
	};
</script>
<!-- END PAGE LEVEL SCRIPTS -->