<html lang="pl">
<meta charset="utf-8" />
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://getbootstrap.com/examples/dashboard/dashboard.css" rel="stylesheet">

</head>
<body>










<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Soma System - Baza</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</div>




<div class="container-fluid">
<div class="row">
    <div class="sidebar">

        <?php



        $list = array(
            anchor('#', '<span class="glyphicon glyphicon-home"></span>'),
            anchor('transakcje/add', '<span class="glyphicon glyphicon-plus"></span>'),
            "<hr>",
            anchor(site_url('kontrachenci/view'), '<span class="fa fa-users">'),
            anchor(site_url('kontrachenci/add'), '<span class="fa fa-user">'),
        );

        $attributes = array(
            'class' => 'nav nav-sidebar',
        );

        echo ul($list, $attributes);

        ?>









<!--

      <ul class="nav nav-sidebar">


            <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-plus"></span></a></li>



        </ul>

-->


    </div>



    <div class="col-sm-9  col-md-10 main" style="padding-left:100px">





















