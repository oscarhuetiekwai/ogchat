<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>OG Chat</title>
	  <?php
			##Bootstrap framework ##
			echo css('bootstrap.css');
		?>
		<!--<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png">-->

		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/lib/chosen/chosen.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/lib/datepicker/datepicker.css" />
		<script type="text/javascript" src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
		<style type="text/css">
		  body {
			padding-top: 60px;
			padding-bottom: 40px;
		  }
		  .sidebar-nav {
			padding: 9px 0;
		  }
		  .datepicker{z-index:1151;}
		</style>
	<?php echo css('bootstrap-responsive.css'); ?>
	<script>
		//* hide all elements & show preloader
		document.documentElement.className += 'js';
		var config = {
		   'base_url': '<?php echo base_url(); ?>'
		};
	</script>
    </head>
    <body style="background-image: url(<?php echo base_url(); ?>assets/img/bg_c.png);">

	<div class="navbar transparent navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
		  <?php $this->load->view('template/header'); ?>
        </div>
      </div>
    </div>

    <div class="container">
	  <div class="row">
        <div class="span12">
			<?php if(isset($main)){ $this->load->view($main); } else { echo 'Main content'; } ?>
        </div><!--/span-->
      </div><!--/row-->

	<!-- footer -->
	  <div class="row">
		<div class="span12">
		<hr>
			<footer class="pull-right">
				<p>&copy; OG Chat 2013</p>
			</footer>
		</div><!--/span-->
      </div><!--/row-->
    </div><!--/.fluid-container-->
	</body>
</html>
<?php
// main bootstrap js
echo js('bootstrap.min.js');
echo js('bootstrap-datepicker.js');
//echo js('bootstrap-datetimepicker.min.js');

echo js('lib/datatables/jquery.dataTables.min.js');

echo js('ckeditor/ckeditor.js');

echo js('ckeditor/_samples/sample.js');

echo js('lib/chosen/chosen.jquery.min.js');

echo js('easing.js');

echo js('jquery.ui.totop.js');

if(isset($js_list))
{
    foreach($js_list as $js_row)
    {
      $js_file = $js_row.'.js';
      echo js($js_file);
    }
}
?>
<?php
  //load the js function
  if(isset($js_function))
  {
    foreach($js_function as $js)
    {

      $js = $js.'.js';
      ?>
      <script src="<?php echo base_url(); ?>assets/js/application/<?php echo $js; ?>"></script>
      <?php
    }
  }
?>
<script type="text/javascript">
$(document).ready(function() {

	$(".chzn_z").chosen({
		allow_single_deselect: true
	});
	$(".chzn_a").chosen({
		allow_single_deselect: true
	});

	// cancel button
	$("#cancel").click(function()
	{
	var index = $("#module_index").val();
	window.location = index;
	});

	$('#start_date').datepicker({
			format: 'yyyy-mm-dd'
	});
	$('#end_date').datepicker({
			format: 'yyyy-mm-dd'
	});


	$('#dt_d').dataTable({
            "sDom": "<'row-fluid'<'span6\'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sSearch": "Search all columns:"
            }
    });

	// navigation drop down
	jQuery('ul.nav li.dropdown').hover(function() {
	  jQuery(this).find('.dropdown-fade').stop(true, true).delay(50).fadeIn();
	}, function() {
	  jQuery(this).find('.dropdown-fade').stop(true, true).delay(50).fadeOut();
	});

		// scroll to top
	var defaults = {
	  	containerID: 'toTop', // fading element id
		containerHoverID: 'toTopHover', // fading element hover id
		scrollSpeed: 1200,
		easingType: 'linear'
	};
	$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>