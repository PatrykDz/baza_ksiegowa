<html lang="pl">
<meta charset="utf-8" />
<head></head>
<body>



<?php foreach($kontrachenci as $row) { ?>


    <li><?php echo $row->id_kontrachenta; ?></li>
    <li><?php echo $row->imie; ?></li>
    <li><?php echo $row->nazwisko; ?></li>
    <li><?php echo $row->nr_tel; ?></li>
    <li><?php echo $row->adres; ?></li>
    <li><?php echo $row->e_mail; ?></li>

    <hr>

<?php } ?>





<?php foreach($sprzedaze as $row) { ?>


    <li><?php print_r($row); ?></li>


    <hr>

<?php } ?>






</body>

</html>