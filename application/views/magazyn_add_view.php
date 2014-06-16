<h2 class="sub-header" style="padding-left:10px">Dodaj towar do magazynu</h2>


<div class="col-sm-9  col-md-8">

<?php

$attributes = array('class' => 'form-horizontal');
echo form_open('/magazyn/add', $attributes); ?>



    <div class="form-group">
        <label for="imie">Nazwa towaru</label>
        <input class="form-control" id="nazwa" name="nazwa">
    </div>
    <div class="form-group">
        <label for="inputPassword">Cena netto</label>
        <input class="form-control" id="cena_netto" name="cena_netto">
    </div>

    <button type="submit" class="btn btn-primary">Dodaj</button>
</form>



</div>