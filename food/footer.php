
</div><!-- #page -->
</div><!-- #outer wrapper -->
	
<div id="login-modal-wrap" class="modal-login modal animated fadeIn">
	<h2 class="modal-title">Login</h2>

		<form name="loginform" id="loginform" action="checklogin.php" method="post">
			
			<p class="login-username">
				<label for="user_login">Username</label>
				<input type="text" name="log" id="myusername" class="input" value="" size="20" />
			</p>
			<p class="login-password">
				<label for="user_pass">Password</label>
				<input type="password" name="pwd" id="mypassword" class="input" value="" size="20" />
			</p>
			<p class="has-account"><i class="icon-help-circled"></i> <a href="http://demo.astoundify.com/jobify/my-account/lost-password/">Forgot Password?</a></p>
			<p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" checked="checked" /> Remember Me</label></p>
			<p class="login-submit">
				<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Sign In" />
				<input type="hidden" name="redirect_to" value="index.php" />
			</p>
			
		</form>
</div>


<div id="upload-modal-wrap" class="modal-login modal animated fadeIn">
	<h2 class="modal-title">Upload</h2>

		<form name="loginform" id="loginform" action="parse_upload.php" method="post">

		<form name ="loginform" id="updateform" method ="POST" action= "parse_upload.php">
			
			<p class="login-username">
				<label for="user_upload">File</label>
				<input type="file" name="log" id="lefile" class="input" value="" size="20" />
			</p>
			
			<p class="login-submit">
				<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Upload" />
				<input type="hidden" name="redirect_to" value="index.php" />
			</p>
			
		</form>
</div>

<script type="text/javascript">
jquery('input[id=lefile]').change(function() {
jquery('#filename').val(jquery(this).val());
});
</script>


<script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?v=3.exp&#038;sensor=false&#038;ver=3.7.1'></script>
<script type='text/javascript' src='http://demo.astoundify.com/jobify/wp-content/themes/jobify/js/jquery.ui.map.min.js?ver=3.7.1'></script>
<script type='text/javascript' src='http://demo.astoundify.com/jobify/wp-content/themes/jobify/js/tooltip.js?ver=3.7.1'></script>
<script type='text/javascript' src='http://demo.astoundify.com/jobify/wp-content/themes/jobify/js/jobify-map.js?ver=3.7.1'></script>
<script type='text/javascript' src='http://demo.astoundify.com/jobify/wp-content/themes/jobify/js/jquery.flexslider-min.js?ver=3.7.1'></script>

</body>
</html>