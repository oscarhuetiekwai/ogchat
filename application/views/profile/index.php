<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">User Profile</h3>
		<div class="row-fluid">
			<div class="span12">
				<?php $attributes = array('class' => 'form-horizontal'); echo form_open_multipart('profile_setting/update_profile',$attributes);?>
				<fieldset>
				<?php $this->load->view('template/show_error'); ?>
				<?php echo js('bootstrap-fileupload.min.js'); ?>
				<div class="control-group formSep">
				<label class="control-label">Profile Picture</label>
				<div class="controls text_line">
				<div class="fileupload fileupload-new" data-provides="fileupload">
				  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><?php if(empty($admin_records->email_address)){ ?><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" /><?php }else{ ?> <img src="<?php echo base_url()."assets/img/user_profile/".$admin_records->photo; ?>" title="" alt="" ><?php } ?></div>
				  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
				  <div>
					<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="upload" /></span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
				  </div>
				</div>
				</div>
				</div>

				<div class="control-group formSep">
				<label class="control-label">Username</label>
				<div class="controls text_line">
				<strong><input type="text" id="username" class="input-xlarge" name="username" value="<?php echo set_value('username',$admin_records->username); ?>" /></strong>
				</div>
				</div>

				<div class="control-group formSep">
				<label class="control-label">Email Address</label>
				<div class="controls text_line">
				<strong><input type="text" id="email" class="input-xlarge" name="email" value="<?php echo set_value('email',$admin_records->email_address); ?>" /></strong>
				</div>
				</div>

				<div class="control-group formSep">
				<label for="password" class="control-label">Password</label>
				<div class="controls">
				<div class="sepH_b">
				<input type="password" id="password" class="input-xlarge" value="" name="password" placeholder="New Password" />
				<span class="help-block" style="margin-top:0px;margin-bottom:20px;">Enter your password</span>
				</div>
				<input type="password" id="confirm_password" class="input-xlarge" name="confirm_password" placeholder="Comfirm Password" />
				<span class="help-block" style="margin-top:0px;">Repeat password</span>
				</div>
				</div>

				<div class="control-group">
				<div class="controls">
				<input type="hidden" name="module_index" id="module_index" value="<?php echo base_url('dashboard/index/'); ?>" />
				<input type="submit" class="btn-primary btn" value="Save Change">&nbsp;<button type="reset" class="btn" id="cancel">Cancel</button>
				</div>
				</div>
				</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
