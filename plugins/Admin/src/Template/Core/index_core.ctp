<?php
	$this->layout = false;
?>

<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>All users</title>
    <link rel="shortcut icon" href="https://secure.webtoolhub.com/static/resources/icons/set108/b5cdab07.png" type="image/x-icon">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- include lodash -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.core.js"></script>

    <!-- inlude css -->
    <?= $this->Html->css('admin.css') ?>
</head>
<body>
	<div class="admin_wrapper">
	    <nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#"><?= $admin['email']; ?></a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li class="active"><a href="#">All users</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
		    	<li>
		    		<?=
		    			$this->Html->link('Logout', [
                            'controller' => 'Users',
                            'action' => 'logout'
                        ]);
		    		?>
		    	</li>
		    </ul>
		  </div>
		</nav>

		<!-- table -->
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">id</th>
		      <th scope="col">Full name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Password</th>
		      <th scope="col">Actions</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php foreach($users as $user) : ?>
			    <tr>
			      <th scope="row"><?= $user['id']; ?></th>
			      <td><?= $user['full_name']; ?></td>
			      <td><?= $user['email']; ?></td>
			      <td><?= $user['password']; ?></td>
			      <td>
			      	<div class="action">
			      		<!-- Deleted -->
			      		<?php
			      			if(!$user['is_deleted']) {
			      				echo $this->Html->image(
				    				'https://cdn2.iconfinder.com/data/icons/e-business-helper/240/627249-delete3-512.png', 
				    				[
		                            	'alt' => 'Delete',
		                            	'width' => 20,
		                            	'url' => [
		                            		'controller' => 'Core',
		                            		'action' => 'deleteUser',
		                            		$user['id']
		                            	]
		                        	]);	
			      			} else {
			      				echo $this->Html->image(
				    				'https://cdn3.iconfinder.com/data/icons/basicolor-essentials/24/009_restore_trash_undelete-512.png', 
				    				[
		                            	'alt' => 'Restore',
		                            	'width' => 20,
		                            	'url' => [
		                            		'controller' => 'Core',
		                            		'action' => 'restoreUser',
		                            		$user['id']
		                            	]
		                        	]);	
			      			}
			    		?>

			    		<!-- Baned -->
			    		<?php
			      			if(!$user['is_banned']) {
			      				echo $this->Html->image(
				    				'https://cdn4.iconfinder.com/data/icons/ui-3d-02-of-3/100/UI_11-512.png', 
				    				[
		                            	'alt' => 'Banned',
		                            	'width' => 20,
		                            	'url' => [
		                            		'controller' => 'Core',
		                            		'action' => 'bannedUser',
		                            		$user['id']
		                            	]
		                        	]);	
			      			} else {
			      				echo $this->Html->image(
				    				'https://cdn3.iconfinder.com/data/icons/pix-glyph-set/50/520753-not_allowed-512.png', 
				    				[
		                            	'alt' => 'Restore',
		                            	'width' => 20,
		                            	'url' => [
		                            		'controller' => 'Core',
		                            		'action' => 'unBannedUser',
		                            		$user['id']
		                            	]
		                        	]);	
			      			}
			    		?>

			    		<!-- Edit -->
			      		<?php 
			      			echo $this->Html->image(
			    				'https://cdn1.iconfinder.com/data/icons/hawcons/32/698873-icon-136-document-edit-512.png', 
			    				[
	                            	'alt' => 'Edit',
	                            	'width' => 20,
	                            	'url' => [
	                            		'controller' => 'Core',
	                            		'action' => 'edit',
	                            		$user['id']
	                            	]
	                        	]);
			      		?>
			      	</div>
			      </td>
			    </tr>
			<?php endforeach; ?>
		  </tbody>
		</table>

	</div>

</body>
</html>