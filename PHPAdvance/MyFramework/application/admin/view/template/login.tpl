<!DOCTYPE html>
<html>
<head>
	<title>Flat Admin V.3 - Free flat-design bootstrap administrator templates</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="{$resourceUrl}/css/admin/assets/css/vendor.css">
	<link rel="stylesheet" type="text/css" href="{$resourceUrl}/css/admin/assets/css/flat-admin.css">

	<!-- Theme -->
	<link rel="stylesheet" type="text/css" href="{$resourceUrl}/css/admin/assets/css/theme/blue-sky.css">
	<link rel="stylesheet" type="text/css" href="{$resourceUrl}/css/admin/assets/css/theme/blue.css">
	<link rel="stylesheet" type="text/css" href="{$resourceUrl}/css/admin/assets/css/theme/red.css">
	<link rel="stylesheet" type="text/css" href="{$resourceUrl}/css/admin/assets/css/theme/yellow.css">

</head>
<body>
<div class="app app-default">

<div class="app-container app-login">
	<div class="flex-center">
		<div class="app-header"></div>
		<div class="app-body">
			<div class="loader-container text-center">
					<div class="icon">
						<div class="sk-folding-cube">
								<div class="sk-cube1 sk-cube"></div>
								<div class="sk-cube2 sk-cube"></div>
								<div class="sk-cube4 sk-cube"></div>
								<div class="sk-cube3 sk-cube"></div>
							</div>
						</div>
					<div class="title">Logging in...</div>
			</div>
			<div class="app-block">
			<div class="app-form">
				<div class="form-header">
					<div class="app-brand" name="lbTitle"><span class="highlight">Simplio</span> Admin</div>
				</div>
				<form id="login-form" method="POST">
					<div class="alert">
				        {$error}
				    </div>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">
							<i class="fa fa-user" aria-hidden="true"></i></span>
							<input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" name="User[username]">
					</div>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon2">
							<i class="fa fa-key" aria-hidden="true"></i></span>
							<input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon2" 
							name="User[password]">
					</div>
					<div class="text-center">
						<input type="submit" class="btn btn-success btn-submit" value="Login">
					</div>
				</form>
			</div>
			</div>
		</div>
		<div class="app-footer">
		</div>
	</div>
</div>

</div>

</body>
</html>