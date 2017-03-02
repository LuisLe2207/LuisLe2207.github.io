<?php
/* Smarty version 3.1.30, created on 2017-03-01 11:22:48
  from "C:\xampp\htdocs\PHP\Advance\MyFramework\application\admin\view\template\main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b64c989cee93_06133145',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5695a7f4df608ca8e22ee9d677e7b5f97aa078e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP\\Advance\\MyFramework\\application\\admin\\view\\template\\main.tpl',
      1 => 1488342153,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b64c989cee93_06133145 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
	
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

	<aside class="app-sidebar" id="sidebar">
		<div class="sidebar-header">
			<a class="sidebar-brand" href="#"><span class="highlight">Flat v3</span> Admin</a>
			<button type="button" class="sidebar-toggle">
				<i class="fa fa-times"></i>
			</button>
		</div>
		<div class="sidebar-menu">
			<ul class="sidebar-nav">
				<li class="">
					<a href="../index.html">
						<div class="icon">
							<i class="fa fa-tasks" aria-hidden="true"></i>
						</div>
						<div class="title">Dashboard</div>
					</a>
				</li>
				<li class="@@menu.messaging">
					<a href="../messaging.html">
						<div class="icon">
							<i class="fa fa-comments" aria-hidden="true"></i>
						</div>
						<div class="title">Messaging</div>
					</a>
				</li>
				<li class="dropdown active">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<div class="icon">
							<i class="fa fa-cube" aria-hidden="true"></i>
						</div>
						<div class="title">UI Kits</div>
					</a>
					<div class="dropdown-menu">
						<ul>
							<li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> UI Kits</li>
							<li><a href="../uikits/customize.html">Customize</a></li>
							<li><a href="../uikits/components.html">Components</a></li>
							<li><a href="../uikits/card.html">Card</a></li>
							<li><a href="../uikits/form.html">Form</a></li>
							<li><a href="../uikits/table.html">Table</a></li>
							<li><a href="../uikits/icons.html">Icons</a></li>
							<li class="line"></li>
							<li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Advanced Components</li>
							<li><a href="../uikits/pricing-table.html">Pricing Table</a></li>
							<!-- <li><a href="../uikits/timeline.html">Timeline</a></li> -->
							<li><a href="../uikits/chart.html">Chart</a></li>
						</ul>
					</div>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<div class="icon">
							<i class="fa fa-file-o" aria-hidden="true"></i>
						</div>
						<div class="title">Pages</div>
					</a>
					<div class="dropdown-menu">
						<ul>
							<li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Admin</li>
							<li><a href="../pages/form.html">Form</a></li>
							<li><a href="../pages/profile.html">Profile</a></li>
							<li><a href="../pages/search.html">Search</a></li>
							<li class="line"></li>
							<li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Landing</li>
							<!-- <li><a href="../pages/landing.html">Landing</a></li> -->
							<li><a href="../pages/login.html">Login</a></li>
							<li><a href="../pages/register.html">Register</a></li>
							<!-- <li><a href="../pages/404.html">404</a></li> -->
						</ul>
					</div>
				</li>
			</ul>
		</div>
		<div class="sidebar-footer">
			<ul class="menu">
				<li>
					<a href="/" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-cogs" aria-hidden="true"></i>
					</a>
				</li>
				<li><a href="#"><span class="flag-icon flag-icon-th flag-icon-squared"></span></a></li>
			</ul>
		</div>
	</aside>

	<?php echo '<script'; ?>
 type="text/ng-template" id="sidebar-dropdown.tpl.html">
		<div class="dropdown-background">
			<div class="bg"></div>
		</div>
		<div class="dropdown-container">
			
		</div>
	<?php echo '</script'; ?>
>
	<div class="app-container">
		<nav class="navbar navbar-default" id="navbar">
		<div class="container-fluid">
			<div class="navbar-collapse collapse in">
				<ul class="nav navbar-nav navbar-mobile">
					<li>
						<button type="button" class="sidebar-toggle">
							<i class="fa fa-bars"></i>
						</button>
					</li>
					<li class="logo">
						<a class="navbar-brand" href="#"><span class="highlight">Flat v3</span> Admin</a>
					</li>
					<li>
						<button type="button" class="navbar-toggle">
							<img class="profile-img" src="<?php echo $_smarty_tpl->tpl_vars['resourceUrl']->value;?>
/css/admin/assets/images/profile.png">
						</button>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-left">
					<li class="navbar-title"><span class="highlight">Table</span></li>
					<li class="navbar-search hidden-sm">
						<input id="search" type="text" placeholder="Search..">
						<button class="btn-search"><i class="fa fa-search"></i></button>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown notification">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<div class="icon"><i class="fa fa-shopping-basket" aria-hidden="true"></i></div>
							<div class="title">New Orders</div>
							<div class="count">0</div>
						</a>
						<div class="dropdown-menu">
							<ul>
								<li class="dropdown-header">Ordering</li>
								<li class="dropdown-empty">No New Ordered</li>
								<li class="dropdown-footer">
									<a href="#">View All <i class="fa fa-angle-right" aria-hidden="true"></i></a>
								</li>
							</ul>
						</div>
					</li>
					<li class="dropdown notification warning">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<div class="icon"><i class="fa fa-comments" aria-hidden="true"></i></div>
							<div class="title">Unread Messages</div>
							<div class="count">99</div>
						</a>
						<div class="dropdown-menu">
							<ul>
								<li class="dropdown-header">Message</li>
								<li>
									<a href="#">
										<span class="badge badge-warning pull-right">10</span>
										<div class="message">
											<img class="profile" src="https://placehold.it/100x100">
											<div class="content">
												<div class="title">"Payment Confirmation.."</div>
												<div class="description">Alan Anderson</div>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="badge badge-warning pull-right">5</span>
										<div class="message">
											<img class="profile" src="https://placehold.it/100x100">
											<div class="content">
												<div class="title">"Hello World"</div>
												<div class="description">Marco  Harmon</div>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="badge badge-warning pull-right">2</span>
										<div class="message">
											<img class="profile" src="https://placehold.it/100x100">
											<div class="content">
												<div class="title">"Order Confirmation.."</div>
												<div class="description">Brenda Lawson</div>
											</div>
										</div>
									</a>
								</li>
								<li class="dropdown-footer">
									<a href="#">View All <i class="fa fa-angle-right" aria-hidden="true"></i></a>
								</li>
							</ul>
						</div>
					</li>
					<li class="dropdown notification danger">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<div class="icon"><i class="fa fa-bell" aria-hidden="true"></i></div>
							<div class="title">System Notifications</div>
							<div class="count">10</div>
						</a>
						<div class="dropdown-menu">
							<ul>
								<li class="dropdown-header">Notification</li>
								<li>
									<a href="#">
										<span class="badge badge-danger pull-right">8</span>
										<div class="message">
											<div class="content">
												<div class="title">New Order</div>
												<div class="description">$400 total</div>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="badge badge-danger pull-right">14</span>
										Inbox
									</a>
								</li>
								<li>
									<a href="#">
										<span class="badge badge-danger pull-right">5</span>
										Issues Report
									</a>
								</li>
								<li class="dropdown-footer">
									<a href="#">View All <i class="fa fa-angle-right" aria-hidden="true"></i></a>
								</li>
							</ul>
						</div>
					</li>
					<li class="dropdown profile">
						<a href="/html/pages/profile.html" class="dropdown-toggle"  data-toggle="dropdown">
							<img class="profile-img" src="<?php echo $_smarty_tpl->tpl_vars['resourceUrl']->value;?>
/css/admin/assets/images/profile.png">
							<div class="title">Profile</div>
						</a>
						<div class="dropdown-menu">
							<div class="profile-info">
								<h4 class="username">Scott White</h4>
							</div>
							<ul class="action">
								<li>
									<a href="#">
										Profile
									</a>
								</li>
								<li>
									<a href="#">
										<span class="badge badge-danger pull-right">5</span>
										My Inbox
									</a>
								</li>
								<li>
									<a href="#">
										Setting
									</a>
								</li>
								<li>
									<a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/logout">
										Logout
									</a>
								</li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
		</nav>
	<div class="row">
		<div class="col-xs-12">
			<form id="book-form" method="POST">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
						<input type="text" class="form-control" placeholder="Book ID" aria-describedby="basic-addon1" name="Book[book_id]" id="txt-book-id" readonly="true">
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><i class="fa fa-book" aria-hidden="true"></i></span>
						<input type="text" class="form-control" placeholder="Book Title" aria-describedby="basic-addon1" name="Book[book_title]" id="txt-book-title">
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon2"><i class="fa fa-user" aria-hidden="true"></i></span>
						<input type="text" class="form-control" placeholder="Book Author" aria-describedby="basic-addon2" 
						name="Book[book_author]" id="txt-book-author">
				</div>
				<div class="text-center">
					<input type="submit" class="btn btn-success btn-submit" id="btn-insert" value="Insert">
					<input type="submit" class="btn btn-success btn-submit" id="btn-update" value="Update">
				</div>
			</form>
			</div>
			<div class="col-xs-12">
				<div class="card">
					<div class="card-header">
						Datatable
					</div>
					<div class="card-body no-padding">
						<table class="datatable table table-striped primary" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Book ID</th>
									<th>Book Title</th>
									<th>Book Author</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="data">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['books']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
									<tr class="book">
				    					<td><?php echo $_smarty_tpl->tpl_vars['item']->value->book_id;?>
</td>
				    					<td><?php echo $_smarty_tpl->tpl_vars['item']->value->book_title;?>
</td>
				    					<td><?php echo $_smarty_tpl->tpl_vars['item']->value->book_author;?>
</td>
				    					<td>
				    					<input type="button" class="btn btn-success btn-submit btn-delete" 
				    					value="Delete" id="book-<?php echo $_smarty_tpl->tpl_vars['item']->value->book_id;?>
"></td>
				    				</tr>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
		
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['resourceUrl']->value;?>
/css/admin/assets/js/vendor.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['resourceUrl']->value;?>
/css/admin/assets/js/app.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['resourceUrl']->value;?>
/js/admin/index/index.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
		var baseUrl = '<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
';
	<?php echo '</script'; ?>
>

</body>
</html><?php }
}
