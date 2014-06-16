

<h2 class="sub-header"style="padding-left:10px">Magazyn</h2>
<div class="table-responsive">
    <table id="zlecenia" class="table table-stripped">
        <thead>

        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Cena netto</th>
            <th class="filter-false"></th>

        </tr>
        </thead>





        <?php foreach($magazyn as $row) { ?> <tr>



            <td><?php echo $row->id_towaru; ?></td>
            <td><?php echo $row->nazwa; ?></td>
            <td><?php echo $row->cena_netto; ?></td>


            <td><?php echo anchor('magazyn/edit/'.$row->id_towaru, '<span class="glyphicon glyphicon-pencil"></span>') ?></td>





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








