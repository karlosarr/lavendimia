<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
echo script_tag('assets/js/clientes.js');
?>
<form action="<?= base_url() ?>index.php/clientes/update" role="form" method="post">
    <p class="bg-danger"><?= validation_errors(); ?></p>
    <p class="bg-info">Codigo: <?= $codigo ?></p>
    <div class="form-group">
        <label for="descripcion">
            Nombre
        </label>
        <input type="hidden" name="idclientes" id="idclientes" value="<?= $cliente[0]->idclientes ?>" />
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $cliente[0]->nombre ?>" required="" maxlength="45">
    </div>
    <div class="form-group">
        <label for="apellido_paterno">
            Apellido Paterno 
        </label>
        <input type="text" class="form-control" id="apellido_parterno" name="apellido_parterno" value="<?= $cliente[0]->apellido_parterno ?>" required="" maxlength="45" >
    </div>
    <div class="form-group">
        <label for="apellido_materno">
            Apellido Materno
        </label>
        <div class="input-group">
            <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="<?= $cliente[0]->apellido_materno ?>" required="">
        </div>

    </div>
    <div class="form-group">
        <label for="rfc">
            RFC
        </label>
        <input type="text" class="form-control" id="rfc" name="rfc" value="<?= $cliente[0]->rfc ?>" required="" maxlength="13">
    </div>
    <button type="submit" class="btn btn-default">
        Guardar
    </button>
    <button type="button" class="btn btn-default">
        Cancelar 
    </button>
</form>