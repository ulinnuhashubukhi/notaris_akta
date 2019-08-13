<!DOCTYPE html>
<?php
include "configuration/connection.php";
include "configuration/function.php";
?>

<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Sistem Informasi Pengelolaan Akta Jaminan Fidusia di Kantor Notaris Fenny Octavia, S.H, M.Kn</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
		
		<style>
			.form-signin
			{
				max-width: 330px;
				padding: 15px;
				margin: 0 auto;
			}
			.form-signin .form-signin-heading, .form-signin .checkbox
			{
				margin-bottom: 10px;
			}
			.form-signin .checkbox
			{
				font-weight: normal;
			}
			.form-signin .form-control
			{
				position: relative;
				font-size: 16px;
				height: auto;
				padding: 10px;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
			}
			.form-signin .form-control:focus
			{
				z-index: 2;
			}
			.form-signin input[type="text"]
			{
				margin-bottom: -1px;
				border-bottom-left-radius: 0;
				border-bottom-right-radius: 0;
			}
			.form-signin input[type="password"]
			{
				margin-bottom: 10px;
				border-top-left-radius: 0;
				border-top-right-radius: 0;
			}
			.account-wall
			{
				margin-top: 20px;
				padding: 40px 0px 20px 0px;
				background-color: #f7f7f7;
				-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
				-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
				box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			}
			.login-title
			{
				color: #555;
				font-size: 18px;
				font-weight: 400;
				display: block;
			}
			.profile-img
			{
				width: 96px;
				height: 96px;
				margin: 0 auto 10px;
				display: block;
				-moz-border-radius: 50%;
				-webkit-border-radius: 50%;
				border-radius: 50%;
			}
			.need-help
			{
				margin-top: 10px;
			}
			.new-account
			{
				display: block;
				margin-top: 10px;
			}
		</style>
		
		<link rel="shortcut icon" href="img/iconfav.png">

    </head>
    <body ">
	
		<?php
		if (isset($_GET['message'])){
		
			echo "<script>alert('Username Atau Password Yang Anda Masukan Salah');</script>";
			
		}
		?>

		
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-md-offset-4">
					<h1 class="text-center login-title">“Sistem Informasi Pengelolaan Akta Jaminan Fidusia di Kantor Notaris Fenny Octavia, S.H, M.Kn”</h1>
					<div class="account-wall">
						<img class="profile-img" src="img/logo.jpg" alt="">
						<form class="form-signin" action="lgchk.php" name="loginform" method="post">
							<input type="text" name="uword" class="form-control" placeholder="Username"/>
							<input type="password" name="pword" class="form-control" placeholder="Password"/>
							<button class="btn btn-lg btn-primary btn-block" type="submit"> Sign in</button>
							<label class="checkbox pull-left">
								<input type="checkbox" value="remember-me">
								Remember me
							</label>
							<a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
						</form>
					</div>
				</div>
			</div>
		</div>

        <!-- jQuery 2.0.2 -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>