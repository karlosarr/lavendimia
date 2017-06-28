<?php
echo script_tag('assets/js/ventas.js');
?>
        <input id="idventa" name="idventa" value="<?=$idventa ?>">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ventas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div style="margin-left:20px">
                        <table id="jqGridDetalles"></table>
                        <div id="jqGridPagerDetalles"></div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->