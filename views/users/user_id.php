<!DOCTYPE html">
<html>
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
<link href="/template/css/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
	<div id="menu-wrapper">
		<div id="menu">
			<ul>
				<li class="current_page_item"><a href="#">Homepage</a></li>
				
				<li><a href="#">Admin panel</a></li>
			</ul>
		</div>
		<!-- end #menu -->
	</div>

<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1><a href="#">List of Users</a></h1>
				
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					
					<div class="post">
						
                                                <h2 class="title">ID: <?php echo $users['id'];?></h2>
                                                <h2 class="title">Login: <?php echo $users['login'];?></h2>
                                                <h2 class="title">Password: <?php echo $users['password'];?></h2>
                                                <h2 class="title">First name: <?php echo $users['f_name'];?></h2>
                                                <h2 class="title">Last name: <?php echo $users['l_name'];?></h2>
                                                <h2 class="title">Gender: <?php echo $users['gender'];?></h2>
                                                <h2 class="title">Date of birth: <?php echo $users['date_of_birth'];?></h2>
                                                <br><hr>
                                                <p><a href='/users/' class="permalink"> Back to Admin Panel</a></p>
                                                
						
					</div>
                                       
					<div style="clear: both;">&nbsp;</div>
				</div>
				
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
</div>
<div id="footer">
	<p>Copyright (c) 2019</p>
</div>
<!-- end #footer -->
</body>
</html>
