<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN VALIDATION STATES-->
		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-reorder"></i>Basic Validation
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
					<a href="#portlet-config" data-toggle="modal" class="config"></a>
					<a href="javascript:;" class="reload"></a>
					<a href="javascript:;" class="remove"></a>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="#" id="form_sample_1" class="form-horizontal">
					<div class="alert alert-error hide">
						<button class="close" data-dismiss="alert"></button>
										You have some form errors. Please check below.
					</div>
					<div class="alert alert-success hide">
						<button class="close" data-dismiss="alert"></button>
										Your form validation is successful!
					</div>
					<div class="control-group">
						<label class="control-label">节点名称<span class="required">*</span></label>
						<div class="controls">
							<input type="text" name="name" data-required="1" class="span6 m-wrap"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">节点描述<span class="required">*</span></label>
						<div class="controls">
							<input name="email" type="text" class="span6 m-wrap"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">父节点名称<span class="required">*</span></label>
						<div class="controls">
							<input name="url" type="text" class="span6 m-wrap"/>
							<span class="help-block">e.g: http://www.demo.com or http://demo.com</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Number<span class="required">*</span></label>
						<div class="controls">
							<input name="number" type="text" class="span6 m-wrap"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Digits<span class="required">*</span></label>
						<div class="controls">
							<input name="digits" type="text" class="span6 m-wrap"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Credit Card<span class="required">*</span></label>
						<div class="controls">
							<input name="creditcard" type="text" class="span6 m-wrap"/>
							<span class="help-block">e.g: 5500 0000 0000 0004</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Occupation&nbsp;&nbsp;</label>
						<div class="controls">
							<input name="occupation" type="text" class="span6 m-wrap"/>
							<span class="help-block">optional field</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Category<span class="required">*</span></label>
						<div class="controls">
							<select class="span6 m-wrap" name="category">
								<option value="">Select...</option>
								<option value="Category 1">Category 1</option>
								<option value="Category 2">Category 2</option>
								<option value="Category 3">Category 5</option>
								<option value="Category 4">Category 4</option>
							</select>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn purple">Validate</button>
						<button type="button" class="btn">Cancel</button>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
		<!-- END VALIDATION STATES-->
	</div>
</div>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="/admin/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/admin/js/additional-methods.min.js"></script>
<script type="text/javascript" src="/admin/js/select2.min.js"></script>
<script type="text/javascript" src="/admin/js/chosen.jquery.min.js"></script>
<script src="/admin/js/app.js"></script>
<script src="/admin/js/form-validation.js"></script>
<!-- END PAGE LEVEL STYLES -->
<script>
	jQuery(document).ready(function() {   
	   // initiate layout and plugins
	   App.init();
	   FormValidation.init();
	});
</script>