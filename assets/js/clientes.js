$.jgrid.defaults.width = 780;
$(document).ready(function () {
    $("#btnCancelar").click(function () {
        if (confirm("¿Desea abandonar el alta de cliente?")) {
            window.location.href = "/clientes";
        }
    });
    $("#jqGrid").jqGrid({
        url: '/clientes/show',
        mtype: "POST",
        styleUI: 'Bootstrap',
        datatype: "json",
        colModel: [
            { label: 'Clave Cliente', name: 'idclientes', key: true, width: 75 },
            { label: 'Nombre', name: 'nombre', width: 300 },
            { label: ' ', name: 'editar', width: 300 }
        ],
        viewrecords: true,
        height: 250,
        rowNum: 20,
        pager: "#jqGridPager"
    });
});