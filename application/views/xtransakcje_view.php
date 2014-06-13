<html lang="pl">
<meta charset="utf-8" />
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


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
            <a class="navbar-brand" href="#">Project name</a>
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
        <ul class="nav nav-sidebar">
            <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-plus"></span></a></li>
        </ul>

    </div>



    <div class="col-sm-9  col-md-10 main" style="padding-left:100px">








        <h2 class="sub-header">Transakcje</h2>
        <div class="table-responsive">
                <table id="zlecenia" class="table table-stripped">
                    <thead>

                    <tr>
                        <th>Id transakcji</th>
                        <th>Nazwa</th>
                        <th>Opis</th>
                        <th>Zakup netto</th>
                        <th>Zakup brutto</th>
                        <th>Data zakupu</th>
                        <th>Sprzedaż netto</th>
                        <th>Sprzedaż brutto</th>
                        <th>Data sprzedaży</th>
                        <th>Koszty allegro</th>
                        <th>Koszty inne</th>
                        <th>Kontrachent</th>
                        <th>Zysk/Strata</th>
                    </tr>
                    </thead>





                    <?php foreach($transakcje as $row) { ?> <tr>
                        <?php
                        //Obliczanie zysku
                        $zyskstrata_raw=$row->sprzedaz_netto - $row->zakup_netto - $row->koszty_allegro - $row->koszty_inne;

                        if($zyskstrata_raw<0){
                            $zyskstrata="<td class='danger'>$zyskstrata_raw</td>";
                        }else{
                            $zyskstrata="<td class='success'>$zyskstrata_raw</td>";
                        }

                        ?>


                        <td><?php echo $row->id_transakcji; ?></td>
                        <td><?php echo $row->nazwa_transakcji; ?></td>
                        <td><?php echo $row->opis_transakcji; ?></td>
                        <td><?php echo $row->zakup_netto; ?></td>
                        <td><?php echo $row->zakup_brutto; ?></td>
                        <td><?php echo $row->data_zakupu; ?></td>
                        <td><?php echo $row->sprzedaz_netto; ?></td>
                        <td><?php echo $row->sprzedaz_brutto; ?></td>
                        <td><?php echo $row->data_sprzedazy; ?></td>
                        <td><?php echo $row->koszty_allegro; ?></td>
                        <td><?php echo $row->koszty_inne; ?></td>

                        <td><?php echo anchor('kontrachenci/edit/'.$row->id_kontrachenta, $row->imie." ".$row->nazwisko); ?></td>

                        <td><?php echo $zyskstrata ?></td>






                        <?php } ?></tr>





                    <tbody>
                </table>

        </div>











        <!-- EO MAIN -->

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