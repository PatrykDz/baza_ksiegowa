
<h2 class="sub-header" style="padding-left:10px">Kontrachent</h2>


<div class="col-sm-9  col-md-8">

    <?php

    $attributes = array('class' => 'form-horizontal');
    echo form_open('/kontrachenci/edit', $attributes); ?>


    <div class="form-group">
        <input class="form-control" id="nazwa_transakcji" type="hidden" name="id_kontrachenta"
               value="<?php echo $kontrachent->id_kontrachenta; ?>">
    </div>

    <div class="form-group">
        <label for="imie">Imię</label>
        <input class="form-control" id="imie" name="imie"
            value="<?php echo $kontrachent->imie; ?>"
            >
    </div>
    <div class="form-group">
        <label for="inputPassword">Nazwisko</label>
        <input class="form-control" id="nazwisko" name="nazwisko"
               value="<?php echo $kontrachent->nazwisko; ?>">
    </div>
    <div class="form-group">
        <label for="inputPassword">E-mail</label>
        <input type="email" class="form-control" id="email" name="email"
               value="<?php echo $kontrachent->email; ?>">
    </div>
    <div class="form-group">
        <label for="inputPassword">Nr tel</label>
        <input class="form-control" id="nr_tel" name="nr_tel"
               value="<?php echo $kontrachent->nr_tel; ?>">
    </div>
    <div class="form-group">
        <label for="inputPassword">Adres</label>
        <input class="form-control" id="adres" name="adres"
               value="<?php echo $kontrachent->adres; ?>">
    </div>
    <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
    </div>
    <div class="pull-right">
    <!--<button class="btn btn-danger" href="<?php echo site_url('kontrachenci/delete/')."/".$kontrachent->id_kontrachenta;?>">Usuń</button> -->
    <button type="submit" class="btn btn-primary">Zapisz</button>
    </div>


    </form>



</div>