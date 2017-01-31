$.jgrid.defaults.width = 780;
$(document).ready(function () {

    $("#jqGrid").jqGrid({
        url: 'http://carlosruiz2.esy.es/index.php/articulos/show',
        mtype: "POST",
        styleUI: 'Bootstrap',
        datatype: "json",
        colModel: [
            {label: 'Clave Articulo', name: 'idarticulos', key: true, width: 75},
            {label: 'Descripción', name: 'descripcion', width: 300},
            {label: ' ', name: 'editar', width: 300}
        ],
        viewrecords: true,
        height: 250,
        rowNum: 20,
        pager: "#jqGridPager"
    });
});