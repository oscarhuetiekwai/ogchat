<table class="table table-striped table-hover" >
<thead>
	<tr>
		<th>Username</th>
		<th>Status</th>
	</tr>
  </thead>
   <tbody>
	<?php
		if(isset($data_record)) :foreach($data_record as $row):
	?>
	<tr>
		<td><a href=""><?php echo $row->username; ?></a></td>
		<td><?php if($row->online_status == 1){ ?><img src="<?php echo base_url()."assets/img/bullet_green1.png"; ?>" title="Online"><?php }else{ ?> <img src="<?php echo base_url()."assets/img/bullet_red.png"; ?>"  title="Offline"><?php } ?></td>
	</tr>

<?php endforeach; ?>
<?php else : ?>
	<tr><td colspan="2">No Result Found.</td></tr>
<?php endif; ?>
  </tbody>
</table>