<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/layouts/header'); ?>
    <link href="<?php echo base_url(); ?>webresources/dashboard/css/signin.css" rel="stylesheet">
    <style type="text/css">
        body {
            background: url(<?php echo base_url()."webresources/admin/img/bg-login.jpg" ?>) !important;
        }
    </style>
</head>

<body>
<div class="container">

    <form class="form-signin" action="login" method="POST">
        <div class="alert-error">
            <?php echo validation_errors(); ?>
        </div>
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="username" class="sr-only">User name</label>
        <input type="username" id="username" name="username" class="form-control" placeholder="User name" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</div>
</body>
</html>
