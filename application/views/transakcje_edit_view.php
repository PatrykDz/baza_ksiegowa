
<h2 class="sub-header" style="padding-left:10px">Transakcja</h2>


<div class="col-sm-9  col-md-8">

    <?php

    $attributes = array('class' => 'form-horizontal');
    echo form_open('/transakcje/edit', $attributes); ?>






    <script type='text/javascript'>
        <?php
        //dane z php do javascript do pobierania ceny
        $js_array = json_encode($magazyn,JSON_UNESCAPED_UNICODE);
        echo "var magazyn = ". $js_array . ";\n";
        ?>
    </script>












    <div class="form-group">
       <input class="form-control" id="id_transakcji" type="hidden" name="id_transakcji"
               value="<?php echo $transakcja->id_transakcji ?>">
    </div>
    <div class="form-group">
        <label for="nazwa_transakcji">Nazwa</label>

        <select class="form-control" id="nazwa_transakcji" name="nazwa_transakcji">


            <?php
            foreach($magazyn as $towar){ ?>


                <option value="<?php echo($towar->nazwa);?>"<?php  if($towar->nazwa == $transakcja->nazwa_transakcji)echo("selected"); ?>>
                    <?php echo($towar->nazwa);?></option>

            <?php  }

            ?>




        </select>


    </div>
    <div class="form-group">
        <label>Opis transakcji</label>
        <textarea class="form-control" id="opis_transakcji" name="opis_transakcji"><?php echo $transakcja->opis_transakcji ?></textarea>
    </div>
    <div class="form-group">
        <label for="inputPassword">Zakup netto</label>
        <input class="form-control" id="zakup_netto" name="zakup_netto"
               value="<?php echo $transakcja->zakup_netto ?>"
            >
    </div>
    <div class="form-group">
        <label for="inputPassword">Zakup brutto</label>
        <input class="form-control" id="zakup_brutto" name="zakup_brutto"
               value="<?php echo $transakcja->zakup_brutto ?>"
               readonly>
    </div>
    <div class="form-group">
        <label for="inputPassword">Data zakupu</label>
        <input type="date" class="form-control" id="data_zakupu" name="data_zakupu"
               value="<?php echo $transakcja->data_zakupu ?>"
            >
    </div>



    <div class="form-group">
        <label for="inputPassword">Kontrachent</label>

        <select class="form-control" id="kontrachenci_id_kontrachenta" name="kontrachenci_id_kontrachenta">


            <?php
            foreach($kontrachenci as $kontrachent){ ?>


                echo($kontrachent->id_kontrachenta);

                <option value="<?php echo($kontrachent->id_kontrachenta); ?>"
                    <?php if($transakcja->kontrachenci_id_kontrachenta == $kontrachent->id_kontrachenta){echo "selected";} ?> >
                    <?php echo($kontrachent->imie." ".$kontrachent->nazwisko) ?></option>



            <?php  }

            ?>



        </select>

    </div>



    <div class="form-group">
        <label for="inputPassword">Sprzedaż netto</label>
        <input class="form-control" id="sprzedaz_netto" name="sprzedaz_netto"
               value="<?php echo $transakcja->sprzedaz_netto ?>"
            >
    </div>

    <div class="form-group">
        <label for="inputPassword">Sprzedaż brutto</label>
        <input class="form-control" id="sprzedaz_brutto" name="sprzedaz_brutto"
               value="<?php echo $transakcja->zakup_brutto ?>"
               readonly>
    </div>



    <div class="form-group">
        <label for="inputPassword">Data sprzedaży</label>
        <input type="date" class="form-control" id="data_sprzedazy" name="data_sprzedazy"
               value="<?php echo $transakcja->data_sprzedazy ?>"
            >
    </div>


    <div class="form-group">
        <label for="inputPassword">Koszty allegro</label>
        <input class="form-control" id="koszty_allegro" name="koszty_allegro"
               value="<?php echo $transakcja->koszty_allegro ?>"
               readonly>
    </div>

    <div class="form-group">
        <label for="inputPassword">Koszty inne</label>
        <input class="form-control" id="koszty_inne" name="koszty_inne"
               value="<?php echo $transakcja->koszty_inne ?>"
            >
    </div>




    <div class="pull-right">
    <?php echo anchor(site_url('transakcje/delete'."/".$transakcja->id_transakcji),'Usuń', array('class' => 'btn btn-danger')); ?>
    <button type="submit" class="btn btn-primary">Zapisz</button>
    </div>


    </form>



    <script>


        $( document ).ready(function() {
            $( "#nazwa_transakcji").trigger('change');
            $( "#sprzedaz_netto").trigger('keyup');
        });



        $( "#zakup_netto" ).keyup(function() {
            $('#zakup_brutto').val($('#zakup_netto').val()*1.23)
        });

        $( "#sprzedaz_netto" ).keyup(function() {
            if($(this).val().charAt(0)=="+"){
                //alert("x");
            }else{

                $('#sprzedaz_brutto').val($('#sprzedaz_netto').val()*1.23)

            }
        });


        $( "#sprzedaz_netto" ).keyup(function() {
            $('#koszty_allegro').val(   ($('#sprzedaz_brutto').val() - 1000) * 0.005 + 22.1)

            // (sprzezdaż brutto - 1000*0.005) +22,1
        });












        $("#nazwa_transakcji" ).change(function() {

            //pobieranie ceny

            var nazwa = $("#nazwa_transakcji").val();
            var cena_netto = findElement(magazyn,"nazwa",nazwa).cena_netto
            //$("#nazwa").val());




            $('#zakup_netto').val(cena_netto);
            $('#zakup_netto').trigger('keyup');
        });






        //Funkcja znajdująca wybrany obiekt w tablicy z magazynu


        function findElement(arr, propName, propValue) {
            for (var i=0; i < arr.length; i++)
                if (arr[i][propName] == propValue)
                    return arr[i];

            // will return undefined if not found; you could return a default instead
        }
















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








        //PROWIZJA Z +


        $( "#sprzedaz_netto" ).focusout(function() {

            //pobieranie ceny

            if($(this).val().charAt(0)=="+"){
                $(this).val( parseFloat($('#zakup_netto').val()) + parseFloat($(this).val().substring(1)));
                $(this).trigger('keyup');
            }

        });

        $("#sprzedaz_netto").keypress(function(e) {
            if(e.which == 13) {
                $(this).trigger('focusout');
            }
        });




    </script>


</div>