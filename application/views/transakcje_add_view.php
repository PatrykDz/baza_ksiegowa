<h2 class="sub-header" style="padding-left:10px">Dodaj transakcje</h2>


<div class="col-sm-9  col-md-8">

    <?php

    $attributes = array('class' => 'form-horizontal');
    echo form_open('/transakcje/add', $attributes); ?>



    <div class="form-group">
        <label for="nazwa_transakcji">Nazwa</label>
        <input class="form-control" id="nazwa_transakcji" name="nazwa_transakcji">
    </div>
        <div class="form-group">
        <label>Opis transakcji</label>
        <textarea class="form-control" id="opis_transakcji" name="opis_transakcji"></textarea>
    </div>
    <div class="form-group">
        <label for="inputPassword">Zakup netto</label>
        <input class="form-control" id="zakup_netto" name="zakup_netto">
    </div>
    <div class="form-group">
        <label for="inputPassword">Zakup brutto</label>
        <input class="form-control" id="zakup_brutto" name="zakup_brutto" readonly>
    </div>
    <div class="form-group">
        <label for="inputPassword">Data zakupu</label>
        <input type="date" class="form-control" id="data_zakupu" name="data_zakupu">
    </div>











    <div class="form-group">
        <label for="inputPassword">Kontrachent</label>
        <select class="form-control" id="kontrachenci_id_kontrachenta" name="kontrachenci_id_kontrachenta">


            <?php
                foreach($kontrachenci as $kontrachent){ ?>




                    <option value="<?php echo($kontrachent->id_kontrachenta); ?>">
                            <?php echo($kontrachent->imie." ".$kontrachent->nazwisko) ?></option>



          <?php  }

            ?>




        </select>

    </div>









    <div class="form-group">
        <label for="inputPassword">Sprzedaż netto</label>
        <input class="form-control" id="sprzedaz_netto" name="sprzedaz_netto">
    </div>

    <div class="form-group">
        <label for="inputPassword">Sprzedaż brutto</label>
        <input class="form-control" id="sprzedaz_brutto" name="sprzedaz_brutto" readonly>
    </div>



    <div class="form-group">
        <label for="inputPassword">Data sprzedaży</label>
        <input type="date" class="form-control" id="data_sprzedazy" name="data_sprzedazy">
    </div>


    <div class="form-group">
        <label for="inputPassword">Koszty allegro</label>
        <input class="form-control" id="koszty_allegro" name="koszty_allegro" readonly>
    </div>

    <div class="form-group">
        <label for="inputPassword">Koszty inne</label>
        <input class="form-control" id="koszty_inne" name="koszty_inne">
    </div>



    <button type="submit" class="btn btn-primary">Dodaj</button>



    </form>














<script>
    $( "#zakup_netto" ).keyup(function() {
        $('#zakup_brutto').val($('#zakup_netto').val()*1.23)
    });

    $( "#sprzedaz_netto" ).keyup(function() {
        $('#sprzedaz_brutto').val($('#sprzedaz_netto').val()*1.23)
    });


    $( "#sprzedaz_netto" ).keyup(function() {
        $('#koszty_allegro').val(   ($('#sprzedaz_brutto').val() - 1000) * 0.005 + 22.1)

           // (sprzezdaż brutto - 1000*0.005) +22,1
    });











    //DRAG AND DROP TEST



    $(function(){

        var obj=$('#kontrachenci_id_kontrachenta');

        obj.on('dragover',function(e){
            e.stopPropagation();
            e.preventDefault();
            $(this).css('border',"2px solid #16a085");
        });

        //drop event listener
        obj.on('drop',function(e){
            e.stopPropagation();
            e.preventDefault();
            $(this).css('border',"2px dotted #bdc3c7");


            //pobiera link z drag and drop


            var link = e.originalEvent.dataTransfer.getData('text');

            if(link.indexOf("/baza_ksiegowa/index.php/kontrachenci/edit") > -1){

            //console.log(link);

            //upload data using the xhr object
            var id = link.split('/').pop();

            //console.log(id);

            $(this).val(id);


            //obj.value(id);

            }


        });




    }); // EO DRAG AND DROP











</script>


</div>