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
					<i class="icon-user"></i>用户选择角色
				</div>
				<div class="actions">
					<div class="btn-group">
						<a class="btn green" href="#" data-toggle="dropdown">
						<i class="icon-cogs"></i> 操作
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
					<th class="hidden-480">用户名称</th>
					<th class="hidden-480">用户状态</th>
					<th class="hidden-480">操作</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($admins as $key =>$item) {?>
				<tr class="odd gradeX">
					<td><input type="checkbox" class="checkboxes" value="1"/></td>
					<td><?=$key+1?></td>					
					<td class="hidden-480"><?=$item['username']?></td>
					<td class="hidden-480">
					<?php if($item['status']==1){
					    echo '<button type="button" class="btn green">禁用</button>';
					}else{
					    echo '<button type="button" class="btn green">启用</button>';
					}
					?></td>
					<td class="hidden-480"> 
					   	<a href="#" onclick="authrole('<?=$item['id']?>','<?= $item['username']?>');" class="btn green" ><i class="icon-key"></i>分配角色</a>
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
<div class="modal fade" id="authrole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" 
               aria-hidden="true">
            </button>
            <h4 class="modal-title" id="myModalLabel">用户分配角色</h4>
         </div>
         <form id="authroleadd" method="post" action="<?=Url::toRoute("/admin/bauthuser/role") ?>" style="margin: 0px" class="form-horizontal">
             <div class="modal-body">
                <div class="control-group">
    				<label class="control-label">用户名称<span class="required">*</span></label>
    				<div class="controls">
    					<span id="username" style="text-align:left" class="control-label">用户名称</span>
    				</div>
    			</div>
    			<div class="control-group">
    				<label class="control-label">选择角色<span class="required">*</span></label>
    				<div class="controls">
    				    <?php if(!empty($roles)){?>
    				        <?php foreach ($roles as $key => $item){?>
    				        <label class="checkbox">
    						    <input type="checkbox" name="roles[]" value="<?=$item->name?>" /> <?=$item->description ?>
    						</label>
    				        <?php }?>
    				    <?php }?>
    				</div>
    			</div>
             </div>
             <input type="hidden" value="<?=yii::$app->request->getCsrfToken() ?>"name="_csrf">
             <input type="hidden" value="" id="adminid" name="id">
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
	function authrole(id, username) {
		$('#username').text(username);
		$('#adminid').val(id);
		$('#authrole').modal('show');
		$.ajax({
            //提交数据的类型 POST GET
            type:"POST",
            //提交的网址
            url:"<?=Url::toRoute("/admin/bauthuser/role")?>",
            //提交的数据
            data:{Name:"sanmao",Password:"sanmaoword"},
            //返回数据的格式
            datatype: "html",//"xml", "html", "script", "json", "jsonp", "text".
            //在请求之前调用的函数
            beforeSend:function(){$("#msg").html("logining");},
            //成功返回之后调用的函数             
            success:function(data){   
            }
		});
	}
	
</script>
<!-- END PAGE LEVEL SCRIPTS -->