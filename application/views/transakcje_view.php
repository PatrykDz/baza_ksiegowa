<html lang="pl">
<meta charset="utf-8" />
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>


































<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="navbar-collapse collapse">
            <form class="navbar-form navbar-right" role="form">
                <div class="form-group">
                    <input type="text" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</div>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Hello, world!</h1>







        <table id="zlecenia" class="table">
            <thead>

            <tr>
                <th>Id transakcji</th>
                <th>Zakup netto</th>
                <th>Zakup brutto</th>
                <th>Data zakupu</th>
                <th>Sprzedaż netto</th>
                <th>Sprzedaż brutto</th>
                <th>Data sprzedaży</th>
                <th>Koszty allegro</th>
                <th>Koszty inne</th>
                <th>Zysk/Strata</th>
            </tr>
            </thead>



<?php foreach($transakcje as $transakcja) { ?>


    <tr><td><?php echo $transakcja->id_transakcji ?></td>



        <?php foreach ($zakupy as $zakup) { ?>
            <?php if($transakcja->id_transakcji == $zakup->id_transakcji){ ?>
            <td><?php echo $zakup->zakup_netto ?></td>
            <td><?php echo $zakup->zakup_brutto ?></td>
            <td><?php echo $zakup->data_zakupu ?></td>

            <?php }?>
        <?php } ?>
        <?php foreach ($sprzedaze as $sprzedaz) { ?>


        <?php if($transakcja->id_transakcji == $sprzedaz->id_transakcji){ ?>
            <td><?php echo $sprzedaz->sprzedaz_netto ?></td>
            <td><?php echo $sprzedaz->sprzedaz_brutto ?></td>
            <td><?php echo $sprzedaz->data_sprzedazy ?></td>
            <td><?php echo $sprzedaz->koszty_allegro ?></td>
            <td><?php echo $sprzedaz->koszty_inne ?></td>


            <?php $zysk_strata = $sprzedaz->sprzedaz_netto-$zakup->zakup_netto-$sprzedaz->koszty_allegro-$sprzedaz->koszty_inne;


            echo $sprzedaz->sprzedaz_netto;echo"<br><br>";

            echo $zakup->zakup_netto;echo"<br><br>";


            if($zysk_strata<0){ ?>

                <td class="danger"><?php echo($zysk_strata); ?></td>

            <?php }else { ?>

                <td class="success"><?php echo($zysk_strata); ?></td>

            <?php }?>


        <?php }?>




    <?php } ?>



    </tr>
<?php } ?>



            <tbody>
        </table>

    </div>
</div>








<div class="container">
    <!-- Example row of columns -->
    <div class="row">



    </div>

    <hr>

    <footer>
        <p>&copy; Company 2014</p>
    </footer>
</div> <!-- /container -->



</body>

</html>