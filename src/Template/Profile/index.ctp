<?php 
	$this->layout = false;
?>

<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Profile</title>
	<link rel="shortcut icon" href="https://cdn2.iconfinder.com/data/icons/rcons-user/32/male-circle-512.png" type="image/x-icon">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- include lodash -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.core.js"></script>

    <!-- inlude css -->
    <?= $this->Html->css('profile.css') ?>
</head>
<body>
	<div class="profile_content">
		<h2 style="text-align:center">User Profile Card</h2>

    <div class="card">
      <img src="http://icons-for-free.com/free-icons/png/512/318585.png" alt="John" width="200">
      <h1><?= $user['full_name']; ?></h1>
      <p class="title"><?= $user['email']; ?></p>
      <p><button onclick="back()">back</button></p>
    </div>
	</div>

</body>
</html>

<script>
  function back() {
    window.location.href = '/';
  }
</script>