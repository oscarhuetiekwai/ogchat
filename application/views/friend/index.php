<div class="container">
	  <div class="row">
        <div class="span12">
			<?php echo form_open('friend/search_friend');?>
			<div class="input-append">
			  <input class="span5" id="appendedInputButton" type="text" name="username" value="<?php if(!empty($search_username)){echo $search_username; } ?>">
			  <button class="btn" type="submit"><i class="icon icon-search"></i> Search</button>
			</div>
			</form>
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
					<?php $i=0; if(isset($friend_records)){
					foreach($friend_records as $friend_row){
					if($friend_row->friend_id == $row->user_id){
					$i = 1;
					if($friend_row->friend_status == 2){
					?>
					<a href="" readonly="readonly" disabled="disabled" class="btn btn-danger"> Already Friend</a>
					<?php }else{ ?>
					<a href="" readonly="readonly" disabled="disabled" class="btn btn-warning"> Pending Request</a>
					<?php } } } } ?>

					<?php  if($i == 0){ ?> <a href="" class="btn add_friend" user-id="<?php echo $this->session->userdata('user_id'); ?>" friend-id="<?php echo $row->user_id; ?>"><i class="icon-plus"></i> Add Friend</a> <?php } ?>
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