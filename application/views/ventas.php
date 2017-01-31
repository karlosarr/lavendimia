<?php
echo script_tag('assets/js/ventas.js');
?>
<a href="<?=  base_url() ?>index.php/ventas/agregar" class="btn btn-primary btn-lg glyphicon glyphicon-plus">Venta</a>
<div style="margin-left:20px">
    <table id="jqGrid"></table>
    <div id="jqGridPager"></div>
</div>