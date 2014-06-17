<html lang="pl">
<meta charset="utf-8" />
<head>

    <link href="<?php echo(base_url().'assets/bootstrap-3.1.1/css/')?>bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo(base_url().'assets/bootstrap-3.1.1/js/')?>bootstrap.min.js"></script>
    <script src="<?php echo(base_url().'assets/js/')?>jquery.min.js"></script>


    <link href="<?php echo(base_url().'assets/font-awesome-4.1.0/css/')?>font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo(base_url().'assets/css/')?>dashboard.css" rel="stylesheet">


    <link href="<?php echo(base_url().'assets/login/')?>/login_style.css" rel="stylesheet">


    <script src="<?php echo(base_url().'assets/login/')?>/login.js"></script>


    <title>Simple Login with CodeIgniter</title>

</head>
<body>

<?php echo validation_errors(); ?>


<div class="container">
    <div class="login-container">
        <div id="output"></div>
        <div class="avatar" style="background-image:url('<?php echo(base_url().'assets/')?>logo.png'); background-size: 75px; background-repeat: no-repeat; background-position:center; "  ></div>
        <div class="form-box">




            <?php echo form_open('verifylogin'); ?>
            <input type="text" size="20" id="username" name="username" placeholder="login"/>

            <input type="password" size="20" id="passowrd" name="password" placeholder="hasło"/>

            <input type="submit" class="btn btn-default btn-block login" value="Zaloguj"/>

            </form>
        </div>
    </div>

</div>

</body>
</html>
