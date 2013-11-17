
<?php include "header.php" ?>

<body class="page page-id-1671 page-template-default custom-background custom-font wp-job-manager-categories">

	<div class="outer-wrapper">
		<div id="page" class="hfeed site slide-right">
			<div id="main" class="site-main">

	<header class="page-header">
		<h1 class="page-title">Login</h1>
	</header>

	<div id="primary" class="content-area">
						<div id="content" class="site-content full" role="main">
							
				<article id="post-1671" class="post-1671 page type-page status-publish hentry instock">
					<div class="entry-content">
						
						<form name="loginform" id="loginform" action="checklogin.php" method="get">
							
							<p class="login-username">
								<label for="user_login">Username</label>
								<input type="text" name="myusername" id="myusername" class="input" value="" size="20" />
							</p>
							<p class="login-password">
								<label for="user_pass">Password</label>
								<input type="password" name="mypassword" id="mypassword" class="input" value="" size="20" />
							</p>
							<p class="has-account"><i class="icon-help-circled"></i> <a href="http://demo.astoundify.com/jobify/my-account/lost-password/">Forgot Password?</a></p>
							<p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" checked="checked" /> Remember Me</label></p>
							<p class="login-submit">
								<input type="submit" name="submit" id="submit" class="button-primary" value="Sign In" />
							</p>
								</form>
								</div>
							</article><!-- #post -->			
							<div id="comments" class="comments-area">
							</div><!-- #comments -->
						</div><!-- #content -->
						
						<?php

include "footer.php";
?>

