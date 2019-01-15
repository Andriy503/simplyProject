<?php 
    $this->layout = false;
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin</title>
    <link rel="shortcut icon" href="https://cdn3.iconfinder.com/data/icons/gray-user-toolbar/512/oficcial-512.png" type="image/x-icon">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- inlude css -->
    <?= $this->Html->css('admin.css') ?>

</head>
<body>
    <div class="wrapper">
        <div class="form_auth">
            
        </div>

        <div id="main-container" class="container-fluid">
        <div class="row">
            <div id="auth-form" class="panel panel-primary">
                <div class="panel-heading">
                <h3 class="panel-title">Auth Form</h3>
            </div>
                <?= $this->Form->create('', [
                    'class' => 'panel-body'
                ]); ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-user"></span>
                        </span>
                        <?= $this->Form->input('email', [
                            'class' => 'form-control',
                            'label' => '',
                            'placeholder' => 'email'
                        ]); ?>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-lock"></span>
                        </span>
                        <?= $this->Form->input('password', [
                            'type' => 'password',
                            'class' => 'form-control',
                            'label' => '',
                            'placeholder' => 'password'
                        ]); ?>
                    </div>
                        <?= $this->Form->submit('Login', [
                            'class' => 'btn btn-primary'
                        ]); ?>
                <?= $this->Form->end(); ?>
            </div>
          </div>
        </div>
</body>
</html>