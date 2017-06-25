<?php
echo script_tag('assets/js/clientes.js');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Clientes</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <a href="/clientes/agregar" class="btn btn-primary btn-lg glyphicon glyphicon-plus">Cliente</a>
                    <div style="margin-left:20px">
                        <table id="jqGrid"></table>
                        <div id="jqGridPager"></div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->