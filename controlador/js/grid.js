$(document).ready(function() {
    $("#grid").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: "../datos/obtenerLaboratorios.php",
                    dataType: "JSON"
                },
                create: {
                    url: function (options) {
                        
                        return "crear.php?nombre=" + options.models[0].nombre + "&descripcion=" + options.models[0].descripcion;
                    },
                    type: "POST",
                    complete: function(){
                        $("#grid").data("kendoGrid").dataSource.read();
                    }
                },

                update: {
                    url: function(options){
                        return "update.php?ID=" + options.models[0].ID + "&nombre=" + options.models[0].nombre + "&descripcion=" + options.models[0].descripcion;
                    },
                    type: "POST",
                    dataType: "json"
                },

                destroy: {
                    url: function (options) {
                        return "eliminar.php?ID=" + options.models[0].ID;
                    },
                    type: "POST"
                },
                parameterMap: function(options, operation) {
                }
            },
            autoBind: true,
            batch: true,
            pageSize: 20,
            schema: {
                model: {
                    id: "ID",
                    fields: {
                        ID: { editable: false, nullable: true },
                        nombre: { validation: { required: {message: "Nombre es requerido"} } },
                        descripcion: { validation: { required: {message: "Descripcion es requerido"} } }
                    }
                }
            }
        },
        toolbar: [{text: "Nuevo Laboratorio", className: "myCustomClass", imageClass: "k-add" }],
        sortable: true,
        selectable: true,
        change: onChange,
        dataBound: onDataBound,
        dataBinding: onDataBinding,
        pageable: {
            refresh: true,
            pageSizes: true
        },
        columns: [ {
                hidden: true,
                field: "ID",
                width: 80,
                title: "ID"
            } , {
                field: "nombre",
                width: 80,
                title: "Nombre"
            } , {
                hidden: true,
                field: "descripcion",
                width: 80,
                title: "Descripcion"
            }, {
                width: 100,
                command: [
                    {name:"destroy", text: "Eliminar" },
                    {text: "Ver Detalles", click: ver_detalles },
                    {name: "Editar", click: editar }
                ]
            } 
        ],
        editable: {mode: "popup",confirmation: "¿Esta seguro que desea eliminar este registro?"}
    })

    $(".myCustomClass").click(function() {
        frameCrearLaboratorio();
    });

});

function editar(e){
    var grid = this;
    var model = grid.dataItem(grid.select());
    frameEditarLaboratorio(model);
}

function ver_detalles(e){
    var grid = this;
    var model = grid.dataItem(grid.select());
    //frameCrearLaboratorio(model.ID);
}

function onChange(arg) {
    var grid = this;
    var model = grid.dataItem(grid.select());
    return model.ID;
}

function onDataBound(arg) {
    kendoConsole.log("Grid data bound");
}

function onDataBinding(arg) {
    kendoConsole.log("Grid data binding");
}