




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

            <?php echo $zyskstrata ?>






            <?php } ?></tr>





        <tbody>
    </table>

</div>









