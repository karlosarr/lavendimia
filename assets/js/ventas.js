$.jgrid.defaults.width = 780;
$(document).ready(function () {
    var articulos = [];
    var totalTotal = 0;
    var totalEnganche = 0;
    var totalBonificacion = 0;
    var precioContado = 0;
    var plazos = [];
    function agregar(articulo) {
        articulos.push(articulo);
    }
    function agragarPlazo(plazo) {
        plazos.push(plazo);
    }
    $("#btnGuardar").hide();
    $("#TablaAbonos").hide();
    function buscar(id) {
        var bRegresa = false;
        for (var key in articulos) {
            if (articulos[key].id == id) {
                bRegresa = true;
            }
        }
        return bRegresa;
    }
    $("#jqGrid").jqGrid({
        url: '/ventas/show',
        mtype: "POST",
        styleUI: 'Bootstrap',
        datatype: "json",
        colModel: [
            {label: 'Folio Venta', name: 'idventa', key: true, width: 75},
            {label: 'Clave Cliente', name: 'idclientes', width: 300},
            {label: 'Nombre', name: 'nombre', width: 300},
            {label: 'Total', name: 'total', width: 300},
            {label: 'Fecha', name: 'fecha_registro', width: 300},
            {label: 'Estatus', name: 'status', width: 300}
        ],
        viewrecords: true,
        height: 250,
        rowNum: 20,
        pager: "#jqGridPager"
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
            {label: 'Id', name: 'id', width: 75, key: true},
            {label: 'Descripcion', name: 'descripcion', width: 90},
            {label: 'modelo', name: 'modelo', width: 90},
            {label: 'cantidad', name: 'cantidad', width: 100, editable: true, editrules: {
                    //custom rules
                    custom_func: validatePositive,
                    custom: true,
                    required: true
                }},
            {label: 'precio', name: 'precio', width: 80},
            {label: 'importe', name: 'importe', width: 80}
        ],
        viewrecords: true, // show the current page, data rang and total records on the toolbar
        caption: "Venta",
        loadonce: true,
        onSelectRow: editRow
    });

    function editRow(id) {
        //if (id && id !== lastSelection) {
        /*var grid = $("#jqGridVentas");
         grid.jqGrid('restoreRow', lastSelection);
         grid.jqGrid('editRow', id, {keys: true});
         lastSelection = id;*/
        //}
        if (id && id !== lastSelection) {
            var grid = $("#jqGrid");
            grid.jqGrid('restoreRow', lastSelection);

            var editParameters = {
                keys: true,
                successfunc: editSuccessful,
                errorfunc: editFailed
            };

            grid.jqGrid('editRow', id, editParameters);
            lastSelection = id;
        }
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
        console.log(importe);
        console.log(enganche);
        console.log(tasa_financiamiento);
        console.log(plazo_maximo);
        totalEnganche = Math.round(((enganche / 100) * importe) * 100) / 100;
        totalBonificacion = Math.round((totalEnganche * ((tasa_financiamiento * plazo_maximo) / 100)) * 100) / 100;
        totalTotal = Math.round((importe - totalEnganche - totalBonificacion) * 100) / 100;
        console.log(totalEnganche);
        console.log(totalBonificacion);
        console.log(totalTotal);
        $("#totalEnganche").html(" $ " + totalEnganche);
        $("#totalBonificacion").html(" $ " + totalBonificacion);
        $("#totalTotal").html(" $ " + totalTotal);

    }

    $("#btnSiguiente").click(function () {
        if ($("#articulo").val() !== "" && articulos.length > 0) {
            generarPlazos();
            $("#TablaAbonos").show();
            $(this).hide();
            $("#btnGuardar").show();
        } else {
            alert("Los datos ingresados no son correctos, favor de verificar");
            $("#TablaAbonos").hide();
        }
    });
    function generarPlazos() {
        precioContado = Math.round((totalTotal / (1 + ((tasa_financiamiento * plazo_maximo) / 100))) * 100) / 1000;
        var plazo = 3;
        var objPlazo = {};
        for (i = 0; i <= 3; i++) {
            objPlazo.totalPagar = Math.round((precioContado * (1 + (tasa_financiamiento * plazo) / 100)) * 100) / 100;
            $("#pagar" + plazo).html(objPlazo.totalPagar);
            objPlazo.abono = Math.round((objPlazo.totalPagar / plazo) * 100) / 100;
            $("#abono" + plazo).html(objPlazo.abono);
            objPlazo.ahorro = Math.round((totalTotal - objPlazo.totalPagar) * 100) / 100;
            $("#ahorra" + plazo).html(objPlazo.ahorro);
            agragarPlazo(objPlazo);
            plazo += 3;
        }
    }
    $("#btnGuardar").click(function () {
        if ($(".meses").attr('checked', 'checked')) {
            var meses = $(".meses").val();
            $.ajax({
                url: "/ventas/add",
                dataType: "json",
                method: "POST",
                data: {
                    clientes_idclientes: $("#idcliente").val(),
                    total: plazos[meses].totalPagar
                },
                success: function (data) {
                    response(data);
                    alert("Bien Hecho. El cliente ha sido registrado correctamente");
                    window.location.href = "/venta";
                }
            });
        } else {
            alert("Debe seleccionar un plazo para realizar el pago de su compra");
        }
    });
});

