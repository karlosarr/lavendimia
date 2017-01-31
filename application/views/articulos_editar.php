<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
echo script_tag('assets/js/articulos.js');
?>
<form action="<?= base_url() ?>index.php/articulos/update" role="form" method="post">
    <p class="bg-danger"><?= validation_errors(); ?></p>
    <p class="bg-info">Codigo: <?= $codigo ?></p>
    <div class="form-group">
        <label for="descripcion">
            Descricion
        </label>
        <input type="hidden" name="idarticulos" id="idarticulos" value="<?= $articulo[0]->idarticulos ?>" />
        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $articulo[0]->descripcion ?>" required="" maxlength="45">
    </div>
    <div class="form-group">
        <label for="form">
            Modelo 
        </label>
        <input type="text" class="form-control" id="modelo" name="modelo" value="<?= $articulo[0]->modelo ?>" maxlength="45" >
    </div>
    <div class="form-group">
        <label for="plazo_maximo">
            Precio
        </label>
        <div class="input-group">
            <div class="input-group-addon">$</div>
            <input type="number" min="1" step="0.01" class="form-control" id="precio" name="precio" value="<?= $articulo[0]->precio ?>" required="">
        </div>

    </div>
    <div class="form-group">
        <label for="existencia">
            Existencia
        </label>
        <input type="number" min="1" class="form-control" id="existencia" name="existencia" value="<?= $articulo[0]->existencia ?>" required="">
    </div>
    <button type="submit" class="btn btn-default">
        Guardar
    </button>
    <button type="button" class="btn btn-default">
        Cancelar 
    </button>
</form>