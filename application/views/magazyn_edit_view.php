
<h2 class="sub-header" style="padding-left:10px">Kontrachent</h2>


<div class="col-sm-9  col-md-8">

    <?php

    $attributes = array('class' => 'form-horizontal');
    echo form_open('/magazyn/edit', $attributes); ?>


    <div class="form-group">
        <input class="form-control" id="id_towaru" type="hidden" name="id_towaru"
               value="<?php echo $magazyn->id_towaru; ?>">
    </div>

    <div class="form-group">
        <label for="imie">Nazwa</label>
        <input class="form-control" id="nazwa" name="nazwa"
            value="<?php echo $magazyn->nazwa; ?>"
            >
    </div>
    <div class="form-group">
        <label for="inputPassword">Cena netto</label>
        <input class="form-control" id="cena_netto" name="cena_netto"
               value="<?php echo $magazyn->cena_netto; ?>">
    </div>

    <!--<button class="btn btn-danger" href="<?php echo site_url('kontrachenci/delete/')."/".$kontrachent->id_kontrachenta;?>">Usuń</button> -->
    <button type="submit" class="btn btn-primary">Zapisz</button>
    </div>


    </form>



</div>