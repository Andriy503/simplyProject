<?php
	$this->layout = false;
?>

<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit user</title>
    <link rel="shortcut icon" href="https://cdn4.iconfinder.com/data/icons/meBaze-Freebies/512/edit-user.png" type="image/x-icon">

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
	<div class="profile_content">
		<h2 style="text-align:center">User Profile Card</h2>

	    <?= $this->Form->create('AdminUsers', [
	    	'class' => 'card',
	    	'controller' => 'core',
	    	'action' => 'edit_profile'
	    ]); ?>
	    <img src="http://icons-for-free.com/free-icons/png/512/318585.png" alt="John" width="200" placeholder="full name">
	    	<h4>Full name</h4>
			<?= $this->Form->input('full_name', [
		     	'label' => '',
		    	'type' => 'text',
		      	'placeholder' => 'full name',
		      	'value' => $user['full_name']
		  	]); ?>
		  	<h4>Email</h4>
		  	<?= $this->Form->input('email', [
		     	'label' => '',
		    	'type' => 'text',
		      	'placeholder' => 'email',
		      	'value' => $user['email']
		  	]); ?>
		  	<h4>New Password</h4>
		  	<?= $this->Form->input('password', [
		     	'label' => '',
		    	'type' => 'password',
		      	'placeholder' => 'password'
		  	]); ?>
		  	<!-- This need delete -->
		  	<?= $this->Form->input('id', [
		  		'label' => '',
		     	'class' => 'hide',
		     	'value' => $user['id']
		  	]); ?>
		  	<!-- End Delete -->
		  	<?= $this->Form->submit('Edit', [
		     	'class' => 'edit'
		  	]); ?>
		  	<a href="/admin" class="edit">Back</a>
		  <?= $this->Form->end(); ?>
	</div>

</body>
</html>