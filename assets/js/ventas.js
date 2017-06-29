var articulos = [];
var totalTotal = 0;
var totalEnganche = 0;
var totalBonificacion = 0;
var precioContado = 0;
var plazos = [];
$.jgrid.defaults.width = 780;
function agregar(articulo) {
    articulos.push(articulo);
}
function agragarPlazo(plazo) {
    plazos.push(plazo);
}
function buscar(id) {
    var bRegresa = false;
    for (var key in articulos) {
        if (articulos[key].id == id) {
            bRegresa = true;
        }
    }
    return bRegresa;
}
function editRow(id) {
    //if (id && id !== lastSelection) {
    /*var grid = $("#jqGridVentas");
     grid.jqGrid('restoreRow', lastSelection);
     grid.jqGrid('editRow', id, {keys: true});
     lastSelection = id;*/
    //}
    console.log(id);
    var editParameters = {
        keys: true,
        successfunc: editSuccessful,
        errorfunc: editFailed
    };
    /*if (id && id !== lastSelection) {
        var grid = $("#jqGrid");
        grid.jqGrid('restoreRow', lastSelection);

        var editParameters = {
            keys: true,
            successfunc: editSuccessful,
            errorfunc: editFailed
        };

        grid.jqGrid('editRow', id, editParameters);
        lastSelection = id;
    }*/
}

function editSuccessful() {
    console.log("success");
}

function editFailed() {
    console.log("fail");
}

function validatePositive(value, column) {
    if (isNaN(value) && value < 0)
        return [false, "Please enter a positive value or correct value"];
    else
        return [true, ""];
}

function actualizarCantidad() {

}

function actualizarTotal() {
    var importe = 0;
    for (var key in articulos) {
        importe += articulos[key].importe;
    }
    totalEnganche = Math.round(((enganche / 100) * importe) * 100) / 100;
    totalBonificacion = Math.round((totalEnganche * ((tasa_financiamiento * plazo_maximo) / 100)) * 100) / 100;
    totalTotal = Math.round((importe - totalEnganche - totalBonificacion) * 100) / 100;
    $("#totalEnganche").html(" $ " + totalEnganche);
    $("#totalBonificacion").html(" $ " + totalBonificacion);
    $("#totalTotal").html(" $ " + totalTotal);

}
function generarPlazos() {

    precioContado = Math.round((totalTotal / (1 + ((tasa_financiamiento * plazo_maximo) / 100))) * 100) / 100;

    for (var plazo = 3; plazo <= plazo_maximo; plazo += 3) {
        var objPlazo = {};
        objPlazo.totalPagar = Math.round((precioContado * (1 + (tasa_financiamiento * plazo) / 100)) * 100) / 100;
        $("#pagar" + plazo).html(objPlazo.totalPagar);
        objPlazo.abono = Math.round((objPlazo.totalPagar / plazo) * 100) / 100;
        $("#abono" + plazo).html(objPlazo.abono);
        objPlazo.ahorro = Math.round((totalTotal - objPlazo.totalPagar) * 100) / 100;
        $("#ahorra" + plazo).html(objPlazo.ahorro);
        agragarPlazo(objPlazo);
    }
}
$(document).ready(function () {

    $("#btnGuardar2").click(function () {
        if ($(".meses").attr('checked', 'checked')) {
            var meses = $( ".meses:checked" ).val();
            var opcion = meses / 3;
            var detallesventa = [];
            for (var key in articulos) {
                var detalle = {
                    id: articulos[key].id,
                    importe: articulos[key].importe,
                    cantidad: articulos[key].cantidad
                };
                detallesventa.push(detalle);
            }

            var datos = {
                venta: {
                    clientes_idclientes: $("#idcliente").val(),
                    total: plazos[opcion].totalPagar,
                    meses: (meses),
                    abono: plazos[opcion].abono,
                    enganche: totalEnganche
                },
                detallesventa: detallesventa
            };

            $.ajax({
                url: "/ventas/add",
                dataType: "json",
                method: "POST",
                data: datos,
                success: function (data) {
                    alert("Bien Hecho, Tu venta ha sido registrada correctamente");
                    window.location.href = "/ventas";
                }
            });
        } else {
            alert("Debe seleccionar un plazo para realizar el pago de su compra");
        }
    });

    $("#btnCancelar").click(function () {
        if (confirm("¿Desea abandonar la venta?")) {
            window.location.href = "/ventas";
        }
    });

    $("#btnGuardar2").hide();
    $("#TablaAbonos").hide();

    $("#jqGrid").jqGrid({
        url: '/ventas/show',
        mtype: "POST",
        styleUI: 'Bootstrap',
        datatype: "json",
        colModel: [
            { label: 'Folio Venta', name: 'idventa', key: true, width: 75 },
            { label: 'Clave Cliente', name: 'idclientes', width: 300 },
            { label: 'Nombre', name: 'nombre', width: 300 },
            { label: 'Total', name: 'total', width: 300 },
            { label: 'Fecha', name: 'fecha_registro', width: 300 },
            { label: 'Estatus', name: 'status', width: 300 }
        ],
        viewrecords: true,
        height: 250,
        rowNum: 20,
        pager: "#jqGridPager"
    });

    $("#jqGridDetalles").jqGrid({
        url: '/ventas/showDetalles?venta=' + $("#idventa").val(),
        mtype: "POST",
        styleUI: 'Bootstrap',
        datatype: "json",
        colModel: [
            { label: 'Venta', name: 'idventa', key: true, width: 75 },
            { label: 'Modelo', name: 'modelo', width: 300 },
            { label: 'nombre', name: 'nombre', width: 300 },
            { label: 'cantidad', name: 'cantidad', width: 300 },
            { label: 'Fecha', name: 'fecha_registro', width: 300 },
            { label: 'importe', name: 'importe', width: 300 }
        ],
        viewrecords: true,
        height: 250,
        rowNum: 20,
        pager: "#jqGridPagerDetalles"
    });

    $("#cliente").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "/clientes/buscar",
                dataType: "json",
                data: {
                    query: request.term
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        minLength: 3,
        select: function (event, ui) {
            $("#rfc").html(ui.item.rfc);
            $("#idcliente").val(ui.item.id);
        }
    });

    $("#articulo").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "/articulos/buscar",
                dataType: "json",
                data: {
                    query: request.term
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        minLength: 3,
        select: function (event, ui) {
            $("#idarticulos").val(ui.item.id);
            if (ui.item.existencia > 0) {
                if (!buscar(ui.item.id)) {
                    var articulo = {};
                    articulo.id = ui.item.id;
                    articulo.descripcion = ui.item.label;
                    articulo.modelo = ui.item.modelo;
                    articulo.cantidad = 1;
                    articulo.precio = ui.item.precio;
                    articulo.importe = ui.item.precio;

                    $("#articulo").val("");
                    agregar(articulo);
                    actualizarTotal();
                    $('#jqGridVentas').trigger('reloadGrid');

                } else {
                    alert("Articulo Existente");
                }

            } else {
                alert("El artículo seleccionado no cuenta con existencia, favor de verificar");
            }
        }
    });
    var lastSelection;
    $("#jqGridVentas").jqGrid({
        datatype: "local",
        data: articulos,
        styleUI: 'Bootstrap',
        height: 250,
        colModel: [
            { label: 'Id', name: 'id', width: 75, key: true },
            { label: 'Descripcion', name: 'descripcion', width: 90 },
            { label: 'modelo', name: 'modelo', width: 90 },
            {
                label: 'cantidad', name: 'cantidad', width: 100,
                editable: true,
                edittype: "text",
            },
            { label: 'precio', name: 'precio', width: 80 },
            { label: 'importe', name: 'importe', width: 80 }
        ],
        viewrecords: true, // show the current page, data rang and total records on the toolbar
        caption: "Venta",
        loadonce: true,
        onSelectRow: editRow
    });

    $("#btnSiguiente").click(function () {
        if ($("#articulo").val() !== "" && articulos.length > 0) {
            generarPlazos();
            $("#TablaAbonos").show();
            $("#btnSiguiente").hide();
            $("#btnGuardar2").show();
        } else {
            alert("Los datos ingresados no son correctos, favor de verificar");
            $("#TablaAbonos").hide();
        }
    });

});