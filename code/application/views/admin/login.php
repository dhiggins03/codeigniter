<!DOCTYPE html>
<html>
<head>
	<title>Admin - Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="login col-md-4 mx-auto text-center">
		<h1>Admin Login</h1>
		<form method="post" bbhjuhbu action="<?php echo base_url('admin/login/verify')?>">
			<div class="form-group">
				<input type="text" name="username" placeholder="Username - niall" class="form-control">
			</div>
			<div class="form-group">
				<input type="password" name="password" placeholder="Password - password" class="form-control">
			</div>
			<div class="form-group">
				<input type="submit" name="submit" value="Login" class="btn btn-primary">
			</div>

		</form>
	</div>
</body>
</html>
