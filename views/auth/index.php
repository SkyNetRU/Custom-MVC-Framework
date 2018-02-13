<h2>Login</h2>
<form  method="post" action="<?php echo BASE_URL; ?>/auth/login">
	<input type="hidden" name="csrf_token" value="<?php echo Session::get('csrf_token'); ?>">
	<div class="form-body">
		<div class="form-group">
			<label>Login</label>
			<div class="input-group">
				<input type="text" name="login" value="" class="form-control" placeholder="Login">
			</div>
		</div>
		<div class="input-group">
			<input name="password" type="password" class="form-control"  placeholder="Password">
		</div>
	</div>
	<div class="form-actions">
		<button type="submit" class="btn blue">Submit</button>
	</div>
</form>