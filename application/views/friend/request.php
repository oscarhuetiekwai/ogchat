<div class="container">
	  <div class="row">
        <div class="span12">
			<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>Username</th>
					<th>Action</th>
				</tr>
			  </thead>
			   <tbody>
				<?php
					if(isset($data_records)) :foreach($data_records as $row):
				?>
				<tr>
					<td><?php if(!empty($row->photo)){ ?><img src="<?php echo base_url()."assets/img/user_profile/".$row->photo ?>" alt="<?php echo $row->photo ?>"  title="<?php echo $row->photo ?>" width="50" height="60" /><?php }else{ ?><img src="<?php echo base_url()."assets/img/no_user_pic.jpg"; ?>" alt="no photo"  title="no photo" width="40" /><?php }?> <?php echo $row->username; ?></td>
					<td>
					<a href="" class="btn btn-success accept_friend" friend-id="<?php echo $this->session->userdata('user_id'); ?>" user-id="<?php echo $row->user_id; ?>"><i class="icon-ok"></i> Accept Friend</a> 
					</td>
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