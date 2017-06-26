<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
echo script_tag('assets/js/articulos.js');
?>

<?php
echo script_tag('assets/js/ventas.js');
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agregar Articulos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">                 
                    <form action="<?= base_url() ?>index.php/articulos/add" role="form" method="post">
                        <p class="bg-danger"><?=validation_errors(); ?></p>
                        <p class="bg-info">Codigo: <?= $codigo ?></p>
                        <div class="form-group">
                            <label for="descripcion">
                                Descricion
                            </label>
                                
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="" required="" maxlength="45">
                        </div>
                        <div class="form-group">
                            <label for="form">
                                Modelo 
                            </label>
                                <input type="text" class="form-control" id="modelo" name="modelo" value="" maxlength="" >
                        </div>
                        <div class="form-group">
                            <label for="plazo_maximo">
                                Precio
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="number" min="1" step="0.01" class="form-control" id="precio" name="precio" value="" required="">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="existencia">
                                Existencia
                            </label>
                            <input type="number" min="1" class="form-control" id="existencia" name="existencia" value="" required="">
                        </div>
                        <button type="submit" class="btn btn-default">
                            Guardar
                        </button>
                        <button type="button" id="btnCancelar" class="btn btn-default">
                            Cancelar 
                        </button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->