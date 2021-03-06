<script>

    if (window.opener) {
        //alert('inside a pop-up window or target=_blank window');
        $(document).attr( "onblur" );
    }

</script>

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



    <!-- pager -->
    <div id="pager" class="pager">
        <form>
            <img src="<?php echo(base_url().'assets/tablesorter/addons/pager/icons/')?>first.png" class="first"/>
            <img src="<?php echo(base_url().'assets/tablesorter/addons/pager/icons/')?>prev.png" class="prev"/>
            <span class="pagedisplay"></span> <!-- this can be any element, including an input -->
            <img src="<?php echo(base_url().'assets/tablesorter/addons/pager/icons/')?>next.png" class="next"/>
            <img src="<?php echo(base_url().'assets/tablesorter/addons/pager/icons/')?>last.png" class="last"/>
            <select class="pagesize">
                <option selected="selected" value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="100">100</option>
            </select>
        </form>
    </div>


</div>


<!-- WAŻNE -->



<script>
    $(function(){



        //Pager opcje

        var pagerOptions = {
            // target the pager markup - see the HTML block below
            container: $(".pager"),
            // output string - default is '{page}/{totalPages}'; possible variables: {page}, {totalPages}, {startRow}, {endRow} and {totalRows}
            output: '{startRow} - {endRow} / {filteredRows} ({totalRows})',
            // if true, the table will remain the same height no matter how many records are displayed. The space is made up by an empty
            // table row set to a height to compensate; default is false
            fixedHeight: true,
            // remove rows from the table to speed up the sort of large tables.
            // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
            removeRows: false,
            // go to page selector - select dropdown that sets the current page
            cssGoto: '.gotoPage'
        };













        $('table').tablesorter({
            theme: 'bootstrap',
            widgets        : ['zebra', 'columns', 'filter'],
            usNumberFormat : false,
            sortReset      : true,
            sortRestart    : true
        })


            .tablesorterPager(pagerOptions);


    });
</script>








