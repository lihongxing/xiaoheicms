			</div>
		</div>
	</div>
	<script>
		function subscribe(){
			$.post("../utility/subscribe.php", function(){
				setTimeout(subscribe, 5000);
			});
		}
		function sync() {
			$.post("../utility/sync.php", function(){
				setTimeout(sync, 60000);
			});
		}
		$(function(){
			subscribe();
			sync();
		});
		/*
		{if $_W['uid']}
			function checknotice() { 
				$.post("../utility/notice.php", {}, function(data){
					var data = $.parseJSON(data);
					$('#notice-container').html(data.notices);
					$('#notice-total').html(data.total);
					if(data.total > 0) {
						$('#notice-total').css('background', '#ff9900');
					} else {
						$('#notice-total').css('background', '');
					}
					setTimeout(checknotice, 60000);
				});
			}
			checknotice();
		{/if}
		*/
	</script>
<?php
	require '../common/footer-base.php';
?>