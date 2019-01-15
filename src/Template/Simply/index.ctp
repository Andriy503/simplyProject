<?php 
    $this->layout = false;
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home</title>
    <link rel="shortcut icon" href="http://icons.iconarchive.com/icons/graphicloads/100-flat/256/home-icon.png" type="image/x-icon">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- include lodash -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.core.js"></script>

    <!-- inlude css -->
    <?= $this->Html->css('style.css') ?>

</head>
<body onload="load()">
    <div class="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Project name</a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="/admin">Admin Panel</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <?php if(!isset($user)) : ?>

                                <ul class="nav navbar-nav auth">
                                    <li><a onclick="sign_up()" id="sign_up">Sign Up</a>
                                        <div id="form_sign_up">
                                            <?= $this->Form->create('User', ['controller' => 'Simply', 'action' => 'registration']); ?>

                                                <label class="label_form">full name: </label>
                                                <?= $this->Form->input('full_name_sign_up', [
                                                    'label' => '',
                                                    'class' => 'input_form_up',
                                                    'type' => 'text',
                                                    'placeholder' => 'full name'
                                                ]); ?>

                                                <label class="label_form">email: </label>
                                                <?= $this->Form->input('email_sign_up', [
                                                    'type' => 'email',
                                                    'label' => '',
                                                    'class' => 'input_form_up',
                                                    'placeholder' => 'email'
                                                ]); ?>

                                                <label class="label_form">password: </label>
                                                <?= $this->Form->input('password_sign_up', [
                                                    'type' => 'password',
                                                    'label' => '',
                                                    'class' => 'input_form_up',
                                                    'placeholder' => 'password'
                                                ]); ?>

                                                <label class="label_form">confirm password: </label>
                                                <?= $this->Form->input('confirm_password_sign_up', [
                                                    'type' => 'password',
                                                    'label' => '',
                                                    'class' => 'input_form_up',
                                                    'placeholder' => 'confirm password'
                                                ]); ?>

                                                <?= $this->Form->submit('Register', [
                                                    'class' => 'sign_in'
                                                ]); ?>

                                            <?= $this->Form->end(); ?>
                                        </div>
                                    </li>
                                    <li><a onclick="sign_in()" id="sign_in">Sign In</a>
                                        <div id="form_sign_in">
                                            <?= $this->Form->create(); ?>

                                                <label class="label_form">email: </label><br>
                                                <?= $this->Form->input('email', [
                                                    'label' => '',
                                                    'class' => 'input_form',
                                                    'placeholder' => 'email'
                                                ]); ?>

                                                <label class="label_form">password: </label><br>
                                                <?= $this->Form->input('password', [
                                                    'type' => 'password',
                                                    'label' => '',
                                                    'class' => 'input_form',
                                                    'placeholder' => 'password'
                                                ]); ?>

                                                <?= $this->Form->submit('Login', ['class' => 'sign_in']); ?>
                                            <?= $this->Form->end(); ?>
                                        </div>
                                    </li>
                                </ul>

                            <?php else: ?>

                                <img src="https://img.icons8.com/windows/1600/gender-neutral-user.png" class="logo_user">
                                <a class="data_of_user"><span class="welcome">Welcome</span> <?= $user['full_name']; ?><span class="email_user"> (<?= $user['email']; ?>)</span></a>

                                <div class="mini_block_user">
                                    <ul class="menu_user">
                                        <li class="item_profile"><a href="/profile">Profile</a><span style="float: right; margin-right: 10px;"><img src="https://cdn2.iconfinder.com/data/icons/rcons-user/32/male-circle-512.png" width="20"></span></li>
                                        <li><?= $this->Html->link('Logout', [
                                                'controller' => 'simply',
                                                'action' => 'logout'
                                            ]) ?></li>
                                    </ul>
                                </div>

                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
          </div>
        </nav>

        <div class="container">
          <div class="jumbotron">
            <h1>This is main page</h1>
            <p>Lorem ipsum dolor sit amet, solum illud inani est id, vim vocent habemus cu. Fugit graeco et usu, tamquam molestiae nec ea, cu vim sanctus iracundia. Est et eirmod viderer delicatissimi. Ut purto omnium facilisis mei, clita omnes vivendum his id, eos id dolorum atomorum sadipscing.</p>
            <p>Ludus nemore no usu, at docendi ocurreret adolescens eum, pri ut reque summo noluisse.</p>
            <p>
                <?php if(isset($user)) : ?>
                    <a class="btn btn-lg btn-primary" role="button" href="/profile">Go to setting profile &raquo;</a>
                <? endif; ?>
            </p>
          </div>
        </div>
    </div>

</body>
</html>

<script>
    var user = <?= (isset($user) ? json_encode($user) : '{}') ?>;
    var loading = true;

    function load() {
        if(_.isEmpty(user)) {
            if(!localStorage.getItem('setItemIn')) {
                localStorage.setItem('setItemIn', 2);
            }

            chekedItemSign();    
        }
    }

    function sign_in() {
        localStorage.setItem('setItemIn', 2);

        chekedItemSign();
    }

    function sign_up() {
        localStorage.setItem('setItemIn', 1);

        chekedItemSign();
    }

    function chekedItemSign() {
        let map = {
            'item_1': () => {
                sign_up.setAttribute("class", "active");
                form_sign_up.classList.remove('_hidden');

                sign_in.classList.remove('active');
                form_sign_in.setAttribute("class", "_hidden");
            },
            'item_2': () => {
                sign_in.setAttribute("class", "active");
                form_sign_in.classList.remove('_hidden');
                
                sign_up.classList.remove('active');
                form_sign_up.setAttribute("class", "_hidden");
            }
        };

        let activeItemSign = localStorage.getItem('setItemIn');

        if(activeItemSign) {            
            var sign_up = document.getElementById('sign_up');
            var form_sign_up = document.getElementById('form_sign_up');

            var sign_in = document.getElementById('sign_in');
            var form_sign_in = document.getElementById('form_sign_in');

            map['item_'+activeItemSign]();
        }

        loading = false;
    }
</script>