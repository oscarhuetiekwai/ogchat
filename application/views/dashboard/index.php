<div class="container"  >
	  <div class="row">
        <div class="span12" id="load_status">
		  <?php $this->load->view('dashboard/load_status'); ?>
		</div><!--/row-->
	  </div><!--/span-->
</div><!--/row-->
<script type="text/javascript">
//auto load score take every 10 seconds
var auto_refresh = setInterval(
function ()
{
	$('#load_status').load('load_status');
}, 1000);
</script>