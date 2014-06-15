<h2 class="sub-header" style="padding-left:10px">Dodaj kontrachenta</h2>


<div class="col-sm-9  col-md-8">

<?php

$attributes = array('class' => 'form-horizontal');
echo form_open('/kontrachenci/add', $attributes); ?>



    <div class="form-group">
        <label for="imie">Imię</label>
        <input class="form-control" id="imie" name="imie">
    </div>
    <div class="form-group">
        <label for="inputPassword">Nazwisko</label>
        <input class="form-control" id="nazwisko" name="nazwisko">
    </div>
    <div class="form-group">
        <label for="inputPassword">E-mail</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="inputPassword">Nr tel</label>
        <input class="form-control" id="nr_tel" name="nr_tel">
    </div>
    <div class="form-group">
        <label for="inputPassword">Adres</label>
        <input class="form-control" id="adres" name="adres">
    </div>
    <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-primary">Dodaj</button>
</form>



</div>