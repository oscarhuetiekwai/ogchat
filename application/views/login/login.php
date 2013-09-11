<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>OG Chat Login</title>
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
                <h6>Log in</h6>
				<?php
					$attributes = array('id' => 'login_form');
					echo form_open('login/validate_credentials', $attributes);
				?>
				<?php
					$this->load->view('template/show_error');
				?>
				<input class="span12" type="text" name="username"  placeholder="Your Username">
                <input class="span12" type="password" name="password" placeholder="Your Password">
				<a href="#" class="forgot">Forgot password?</a>
				<br />
				 <button class="btn-glow primary login" type="submit">Login</button>
				 <a class="btn-warning btn primary login" href="<?php echo base_url("register/index");?>">Register</a>
			</form>
            </div>
        </div>
		</div>
    </div> <!-- /container -->
  </body>
</html>