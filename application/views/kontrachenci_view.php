

<h2 class="sub-header"style="padding-left:10px">Kontrachenci</h2>
<div class="table-responsive">
    <table id="zlecenia" class="table table-stripped">
        <thead>

        <tr>
            <th>ID</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>E-mail</th>
            <th>Numer telefonu</th>
            <th>Adres</th>
            <th class="filter-false"></th>

        </tr>
        </thead>





        <?php foreach($kontrachenci as $row) { ?> <tr>



            <td><?php echo $row->id_kontrachenta; ?></td>
            <td><?php echo $row->imie; ?></td>
            <td><?php echo $row->nazwisko; ?></td>
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->nr_tel; ?></td>
            <td><?php echo $row->adres; ?></td>

            <td><?php echo anchor('kontrachenci/edit/'.$row->id_kontrachenta, '<span class="glyphicon glyphicon-pencil"></span>') ?></td>







            <?php } ?></tr>





        <tbody>
    </table>

</div>


<!-- WAŻNE -->
<script>
    $(function(){
        $('table').tablesorter({
            theme: 'bootstrap',
            widgets        : ['zebra', 'columns', 'filter'],
            usNumberFormat : false,
            sortReset      : true,
            sortRestart    : true
        });
    });
</script>








