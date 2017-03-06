<?php
/* Smarty version 3.1.30, created on 2017-03-06 09:51:08
  from "C:\xampp\htdocs\PHP\Advance\MyFramework\application\admin\view\template\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58bcce9ce99809_50071275',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f86095ae5b953fc02cf87dd03da51b464d0b094' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP\\Advance\\MyFramework\\application\\admin\\view\\template\\login.tpl',
      1 => 1488768305,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58bcce9ce99809_50071275 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Flat Admin V.3 - Free flat-design bootstrap administrator templates</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['resourceUrl']->value;?>
/css/admin/assets/css/vendor.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['resourceUrl']->value;?>
/css/admin/assets/css/flat-admin.css">

	<!-- Theme -->
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['resourceUrl']->value;?>
/css/admin/assets/css/theme/blue-sky.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['resourceUrl']->value;?>
/css/admin/assets/css/theme/blue.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['resourceUrl']->value;?>
/css/admin/assets/css/theme/red.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['resourceUrl']->value;?>
/css/admin/assets/css/theme/yellow.css">

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
				        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

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
</html><?php }
}
