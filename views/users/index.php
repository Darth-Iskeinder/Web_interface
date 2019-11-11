<?php include(ROOT.('/views/layouts/header.php')) ?>

<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1>List of Users</h1>
				
			</div>
                    <div>
                        <button> <a href="/admin/create">Add new user</a></button>
                    </div>
		</div>
	</div>
	<!-- end #header -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<?php foreach ($userList as $users):?>
					<div class="post">
						<h2 class="title"><a href='/users/<?php echo $users['id'] ;?>'><?php echo $users['f_name'].' # '.$users['id'];?></a></h2>
						
					</div>
                                        <?php endforeach;?>
                                    
                                        
					<div style="clear: both;">&nbsp;</div>
                                        <?php echo $pagination->get(); ?>
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
