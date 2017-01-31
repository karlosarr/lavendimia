<?php
echo script_tag('assets/js/clientes.js');
?>
<a href="<?=  base_url() ?>index.php/clientes/agregar" class="btn btn-primary btn-lg glyphicon glyphicon-plus">Articulo</a>
<div style="margin-left:20px">
    <table id="jqGrid"></table>
    <div id="jqGridPager"></div>
</div>