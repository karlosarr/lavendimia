<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript">
    var tasa_financiamiento = <?= $configuracion->tasa_financiamiento; ?>;
    var enganche = <?= $configuracion->enganche; ?>;
    var plazo_maximo = <?= $configuracion->plazo_maximo; ?>;
</script>
<?php
echo script_tag('assets/js/ventas.js');
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ventas Agregar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row rowArticulos">
                        <div class="col-md-12"><p class="bg-danger"><?= validation_errors(); ?></p></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"><p class=".codigo">Codigo: <?= $codigo ?></p></div>
                    </div>
                    <form action="/venta/add" role="form" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="form-group">
                                    <label for="cliente">
                                        Clientes
                                    </label>
                                    <input id="cliente" name="cliente" class="typeahead form-control" type="text" placeholder="Escriba un nombre Cliente">
                                    <input id="idcliente" name="idcliente" type="hidden"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="form-group">
                                    <span id="rfc"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div id="form-group">
                                    <label for="articulo">
                                        Articulo
                                    </label>
                                    <input id="articulo" name="articulo" class="typeahead form-control" type="text" placeholder="Escribe un articulo">
                                    <input id="idarticulos" name="idarticulos" type="hidden"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div style="margin-left:20px">
                                    <table id="jqGridVentas"></table>
                                    <div id="jqGridPagerVentas"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-3"><p class="totalesLetra">Enganche</p></div>
                            <div class="col-md-3"><p id="totalEnganche" class="totales">$ 0.00</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-3"><p class="totalesLetra">Bonificación Enganche</p></div>
                            <div class="col-md-3"><p id="totalBonificacion" class="totales">$ 0.00</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-3"><p class="totalesLetra">Total</p></div>
                            <div class="col-md-3"><p id="totalTotal" class="totales">$ 0.00</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-2"><button type="button" id="btnCancelar" class="btn btn-success">Cancelar</button></div>
                            <div class="col-md-2">
                                <button type="button" id="btnSiguiente" class="btn btn-success">Siguiente</button>
                                <button type="button" id="btnGuardar2" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table" id="TablaAbonos">
                                        <thead>
                                            <tr>
                                                <th colspan="5">ABONOS MENSUALES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>3 abonos de </td>
                                                <td>$ <p id="abono3"></p></td> 
                                                <td>Total a pagar $ <p id="pagar3"></p></td>
                                                <td>Se ahorra $ <p id="ahorra3"></p></td>
                                                <td><input type="radio" class="meses" name="meses" value="3"></td>
                                            </tr>
                                            <tr>
                                                <td>6 abonos de </td>
                                                <td>$ <p id="abono6"></p></td> 
                                                <td>Total a pagar $ <p id="pagar6"></p></td>
                                                <td>Se ahorra $ <p id="ahorra6"></p></td>
                                                <td><input type="radio" class="meses" name="meses" value="6"></td>
                                            </tr>
                                            <tr>
                                                <td>9 abonos de </td>
                                                <td>$ <p id="abono9"></p></td> 
                                                <td>Total a pagar $ <p id="pagar9"></p></td>
                                                <td>Se ahorra $ <p id="ahorra9"></p></td>
                                                <td><input type="radio" class="meses" name="meses" value="9"></td>
                                            </tr>
                                            <tr>
                                                <td>12 abonos de </td>
                                                <td>$ <p id="abono12"></p></td> 
                                                <td>Total a pagar $ <p id="pagar12"></p></td>
                                                <td>Se ahorra $ <p id="ahorra12"></p></td>
                                                <td><input type="radio" class="meses" name="meses" value="12"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->