<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>OG Chat Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
	<?php echo css('bootstrap.css'); ?>
	<?php echo css('login.css'); ?>
	<?php echo css('bootstrap-responsive.css'); ?>
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>
  <body class="login_background">
    <div class="container">
		<div class="row-fluid login-wrapper">
        <div class="span4 box offset4">
            <div class="content-wrap">
                <h6>Register</h6>
				<?php
					$attributes = array('id' => 'login_form');
					echo form_open('register/add_user', $attributes);
				?>
				<?php
					$this->load->view('template/show_error');
				?>
				<input class="span12" type="text" name="username"  placeholder="Your Username">
                <input class="span12" type="password" name="password" placeholder="Your Password">
				<input class="span12" type="password" name="confirm_password" placeholder="Confirm Password">
				<input class="span12" type="text" name="email" placeholder="Your Email Address">
				<br />
				 <button class="btn-glow primary login" type="submit">Register</button>
				 <a class="btn primary login" href="<?php echo base_url("login/index");?>">Back</a>
			</form>
            </div>
        </div>
		</div>
    </div> <!-- /container -->
  </body>
</html>