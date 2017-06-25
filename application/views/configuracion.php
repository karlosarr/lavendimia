<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Configuraciones</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <form action="/configuracion/add" role="form" method="post">
                        <p class="bg-danger"><?=validation_errors(); ?></p>
                        <div class="form-group">
                            <label for="tasa_financiamiento">
                                Tasa Financiamiento
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="number" step="0.01" class="form-control" id="tasa_financiamiento" name="tasa_financiamiento" value="<?=$configuracion[0]->tasa_financiamiento?>" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="enganche">
                                Enganche 
                            </label>
                            <div class="input-group">
                                <input type="number" step="0.01"  min="0" max="100" class="form-control" id="enganche" name="enganche" value="<?=$configuracion[0]->enganche?>" required="">
                                <div class="input-group-addon">%</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="plazo_maximo">
                                Plazo Máximo
                            </label>
                            <input type="number" class="form-control" id="plazo_maximo" name="plazo_maximo" value="<?=$configuracion[0]->plazo_maximo?>" required="">
                        </div>
                        <button type="submit" class="btn btn-default">
                            Guardar
                        </button>
                        <button type="button" class="btn btn-default">
                            Cancelar 
                        </button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->