$.jgrid.defaults.width = 780;
$(document).ready(function () {

    $("#btnCancelar").click(function () {
        if (confirm("¿Desea abandonar el alta de articulo?")) {
            window.location.href = "/articulos";
        }
    });

    $("#jqGrid").jqGrid({
        url: '/articulos/show',
        mtype: "POST",
        styleUI: 'Bootstrap',
        datatype: "json",
        colModel: [
            { label: 'Clave Articulo', name: 'idarticulos', key: true, width: 75 },
            { label: 'Descripción', name: 'descripcion', width: 300 },
            { label: ' ', name: 'editar', width: 300 }
        ],
        viewrecords: true,
        height: 250,
        rowNum: 20,
        pager: "#jqGridPager"
    });
});