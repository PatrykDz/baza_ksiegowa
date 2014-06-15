

<h2 class="sub-header" style="padding-left:10px">Transakcje</h2>
<div class="table-responsive">
    <table id="zlecenia" class="table table-stripped tablesorter">
        <thead>

        <tr>
            <th>ID</th>
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
            <th>Zysk</th>
            <th class="filter-false"></th>
        </tr>
        </thead>





        <?php foreach($transakcje as $row) { ?> <tr>
            <?php
            //Obliczanie zysku
            $zyskstrata_raw=$row->sprzedaz_netto - $row->zakup_netto - $row->koszty_allegro - $row->koszty_inne;

            if($zyskstrata_raw<0){
                $zyskstrata="<td class='danger'><strong><font color='red'>$zyskstrata_raw</font></strong></td>";
            }else{
                $zyskstrata="<td class='success'><strong><font color='green'>$zyskstrata_raw</font></strong></td>";
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

            <?php echo $zyskstrata ?>

            <td><?php echo anchor('transakcje/edit/'.$row->id_transakcji, '<span class="glyphicon glyphicon-pencil"></span>') ?></td>






            <?php } ?></tr>





        <tbody>
    </table>

</div>





<!-- WAŻNE -->
<script>
    $(function(){
        $('table').tablesorter({
            theme: 'bootstrap',
            sortList: [[0,0]],
            widgets        : ['zebra', 'columns', 'filter'],
            usNumberFormat : false,
            sortReset      : true,
            sortRestart    : true
        });
    });
</script>









