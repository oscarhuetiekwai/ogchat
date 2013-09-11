<div class="container">
	  <div class="row">
        <div class="span12">
			<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Username</th>
					<th>Action</th>
				</tr>
			  </thead>
			   <tbody>
				<?php
					if(isset($data_record)) :foreach($data_record as $row):
				?>
				<tr>
					<td><?php echo $row->username; ?></td>
					<td><a href="#" class="delete_row" user-id="<?php echo $this->session->userdata('user_id'); ?>" friend-id="<?php echo $row->user_id; ?>"  title="Block" ><i class="icon-remove"></i></a></td>
				</tr>
			<?php endforeach; ?>
			<?php else : ?>
				<tr><td colspan="2">No Result Found.</td></tr>
			<?php endif; ?>
			  </tbody>
			</table>
		</div><!--/row-->
	  </div><!--/span-->
</div><!--/row-->