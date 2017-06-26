<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
echo script_tag('assets/js/clientes.js');
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agregar Ciente</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <form action="/clientes/add" role="form" method="post">
                        <p class="bg-danger"><?=validation_errors(); ?></p>
                        <p class="bg-info">Codigo: <?= $codigo ?></p>
                        <div class="form-group">
                            <label for="descripcion">
                                Nombre
                            </label>
                                
                                <input type="text" class="form-control" id="nombre" name="nombre" value="" required="" maxlength="45">
                        </div>
                        <div class="form-group">
                            <label for="apellido_paterno">
                                Apellido Paterno 
                            </label>
                                <input type="text" class="form-control" id="apellido_parterno" name="apellido_parterno" value="" maxlength="" >
                        </div>
                        <div class="form-group">
                            <label for="apellido_materno">
                                Apellido Materno
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="" required="">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="existencia">
                                RFC
                            </label>
                            <input type="text" class="form-control" id="rfc" name="rfc" value="" required="">
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