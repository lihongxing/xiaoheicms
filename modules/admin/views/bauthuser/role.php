<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="/admin/css/chosen.css"/>
<link rel="stylesheet" type="text/css" href="/admin/css/select2_metro.css"/>
<link rel="stylesheet" type="text/css" href="/admin/css/jquery.tagsinput.css"/>
<link rel="stylesheet" type="text/css" href="/admin/css/clockface.css"/>
<link rel="stylesheet" type="text/css" href="/admin/css/bootstrap-wysihtml5.css"/>
<link rel="stylesheet" type="text/css" href="/admin/css/bootstrap-toggle-buttons.css"/>
<link rel="stylesheet" type="text/css" href="/admin/css/daterangepicker.css"/>
<link rel="stylesheet" type="text/css" href="/admin/css/datetimepicker.css"/>
<link rel="stylesheet" type="text/css" href="/admin/css/multi-select-metro.css"/>
<link href="/admin/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="/admin/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="/admin/js/select2.min.js"></script>
<script type="text/javascript" src="/admin/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/admin/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="/admin/js/clockface.js"></script>
<script type="text/javascript" src="/admin/js/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="/admin/js/jquery.input-ip-address-control-1.0.min.js"></script>
<script type="text/javascript" src="/admin/js/jquery.multi-select.js"></script>

<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN PORTLET-->
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-reorder"></i>Multiple Select
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
				<form action="#" class="form-horizontal">
					<div class="control-group">
						<label class="control-label">Default</label>
						<div class="controls">
							<select multiple="multiple" id="my_multi_select1" name="my_multi_select1[]">
								<option>Dallas Cowboys</option>
								<option>New York Giants</option>
								<option>Philadelphia Eagles</option>
								<option>Washington Redskins</option>
								<option>Chicago Bears</option>
								<option>Detroit Lions</option>
								<option>Green Bay Packers</option>
								<option>Minnesota Vikings</option>
								<option>Atlanta Falcons</option>
								<option>Carolina Panthers</option>
								<option>New Orleans Saints</option>
								<option>Tampa Bay Buccaneers</option>
								<option>Arizona Cardinals</option>
								<option>St. Louis Rams</option>
								<option>San Francisco 49ers</option>
								<option>Seattle Seahawks</option>
							</select>
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
		<!-- END PORTLET-->
	</div>
</div>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/admin/js/app.js"></script>
<script src="/admin/js/form-components.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
		jQuery(document).ready(function() {       
		   // initiate layout and plugins
		   App.init();
		   FormComponents.init();
		});
	</script>
<!-- END JAVASCRIPTS -->
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</body>
<!-- END BODY -->
</html>