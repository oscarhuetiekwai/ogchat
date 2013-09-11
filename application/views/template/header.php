  <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
  </button>
  <a class="brand" href="<?php echo site_url("dashboard/index"); ?>">OG Chat</a>
  <div class="nav-collapse collapse">
	<ul class="nav">
		<li <?php if($page == "friend"){ ?> class="active"<?php } ?>><a href="<?php echo site_url("dashboard/index"); ?>" title="Chat"><i class="icon-th-list"></i> User Status</a></li>
		<li <?php if($page == "request"){ ?> class="active"<?php } ?>><a href="<?php echo site_url("friend/request"); ?>" title="Friend Request"><i class="icon-eye-open"></i> Friend Request</a></li>
		<li <?php if($page == "add_friend"){ ?> class="active"<?php } ?>><a href="<?php echo site_url("friend/index"); ?>" title="Add Friend"><i class="icon-plus"></i> Add Friend</a></li>
		<li <?php if($page == "block"){ ?> class="active"<?php } ?>><a href="<?php echo site_url("block/index"); ?>" title="Block List"><i class="icon-remove"></i> Block List</a></li>
	</ul>
	<ul class="nav pull-right">
	  <li><a>Welcome <?php echo $this->session->userdata('username'); ?></a></li>
	  <li class="divider-vertical"></li>
	  <li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog demo4"></i> <b class="demo4 caret"></b></a>
		<ul class="dropdown-menu dropdown-fade">
		  <li><a href="<?php echo site_url("profile_setting/index"); ?>"><i class="icon-user demo4"></i> Profile Setting</a></li>
		  <li class="divider"></li>
		  <li><a href="<?php echo site_url("login/logout"); ?>"><i class="icon-off demo4"></i> Logout</a></li>
		</ul>
	  </li>
	</ul>
  </div><!--/.nav-collapse -->