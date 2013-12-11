<?php 

    $titulo = "Crear nuevo laboratorio";
    $nombre = "";
    $des = "";
    $id = "";
    if(isset($_POST['id']) && isset($_POST['nombre'])){
        $titulo = "Editar ".$_POST['nombre'];
        $nombre = $_POST['nombre'];
        $des = $_POST['des'];
        $id = $_POST['id'];
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $titulo ?></title>
        <link href="../vista/styles/kendo.common.min.css" rel="stylesheet" />
        <link href="../vista/styles/kendo.default.min.css" rel="stylesheet" />
        <link href="../vista/styles/sample.css" rel="stylesheet"/>
        <link href="../vista/styles/multiselect.css" rel="stylesheet"/>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="js/kendo/kendo.all.min.js"></script>
        <script type="text/javascript" scr="js/multiselect.js"></script>
        <script type="text/javascript" scr="js/editor.js"></script>
        <script src="js/kendo/console.js"></script>
    </head>
    <body bgcolor="#e2e2e2">
        <form id="crearLaboratorio" method="POST">
            <input type="hidden" id="id" value="<?php echo $id ?>">
            <div style="margin: 10px auto 15px 100px; width:800px "class="">
                <div class="demo-section">
                    <label>
                        <h3>Nombre:
                            <input  id="nombre" type="text" class="k-input k-textbox" name="nombre" value="<?php echo $nombre ?>"> 
                        </h3>
                    </label>
                    <div style="align: center;">
                        <textarea id="descripcion" name="descripcion"><?php echo $des ?></textarea>
                    </div>
                    <div class="k-section">
                        <h2>Asignar Administradores</h2>
                        <select id="administradores" multiple="multiple" data-placeholder="Selecione un administrador..." style="width: 400px"></select> 
                        <button id="todos" class="k-button">Seleccionar Todos</button>
                    </div>
                    <div class="k-section">
                        <h2>Asignar Profesores</h2>
                        <select id="profesores" multiple="multiple" data-placeholder="Selecione un profesor..." style="width: 400px"></select> 
                        <button id="todos" class="k-button">Seleccionar Todos</button>
                    </div>
                    <div class="k-section">
                        <h2>Asignar Alumnos</h2>
                        <select id="alumnos" multiple="multiple" data-placeholder="Selecione un alumno..." style="width: 400px"></select> 
                        <button id="todos" class="k-button">Seleccionar Todos</button>
                    </div>
                </div>
            </div>
        </form>
        <button type="button" id="crear">Guardar</button> <button type="button" id="volver" onclick="location.reload()">Cancelar</button>
        <script type="text/javascript">

            $(document).on("click", "#crear", function(event){
                var datos = $("#crearLaboratorio").serializeArray();
                console.log(datos);
                console.log($("#nombre").val());
                console.log($("#descripcion").val());


                $.post("../datos/crear.php", {id: $("#id").val(), nombre: $("#nombre").val(), descripcion: $("#descripcion").val()}, 
                    function(data){
                        console.log(data);
                        location.reload();
                    });
            });



            $(document).ready(function() {
              $("#descripcion").kendoEditor({
                tools: 
                [
                  "bold",
                  "italic",
                  "underline",
                  "strikethrough",
                  "justifyLeft",
                  "justifyCenter",
                  "justifyRight",
                  "justifyFull",
                  "insertUnorderedList",
                  "insertOrderedList",
                  "indent",
                  "outdent"
                ]
              });
            });

            $(document).ready(function()
            {
                var multiselect = $("#administradores").kendoMultiSelect({
                    dataTextField: "nombre",
                    dataValueField: "ID",
                    headerTemplate: '<div class="dropdown-header">' +
                            '<span class="k-widget k-header">Información del contacto</span>' +
                        '</div>',
                    itemTemplate: 
                              '<span class="k-state-default"><h3>#: data.nombre #</h3><p>#: data.mail #</p></span>',
                    tagTemplate: '#: data.nombre #',
                    dataSource: {
                        transport: {
                            read: {
                                dataType: "json",
                                url: "../datos/administradores.php",
                            }
                        }
                    },
                    height: 300
                });
            });

            $(document).ready(function()
            {
                var multiselect = $("#profesores").kendoMultiSelect({
                    dataTextField: "nombre",
                    dataValueField: "ID",
                    headerTemplate: '<div class="dropdown-header">' +
                            '<span class="k-widget k-header">Información del contacto</span>' +
                        '</div>',
                    itemTemplate: 
                              '<span class="k-state-default"><h3>#: data.nombre #</h3><p>#: data.mail #</p></span>',
                    tagTemplate: '#: data.nombre #',
                    dataSource: {
                        transport: {
                            read: {
                                dataType: "json",
                                url: "../datos/administradores.php",
                            }
                        }
                    },
                    height: 300
                });
            });

            $(document).ready(function()
            {
                var multiselect = $("#alumnos").kendoMultiSelect({
                    dataTextField: "nombre",
                    dataValueField: "ID",
                    headerTemplate: '<div class="dropdown-header">' +
                            '<span class="k-widget k-header">Información del contacto</span>' +
                        '</div>',
                    itemTemplate: 
                              '<span class="k-state-default"><h3>#: data.nombre #</h3><p>#: data.mail #</p></span>',
                    tagTemplate: '#: data.nombre #',
                    dataSource: {
                        transport: {
                            read: {
                                dataType: "json",
                                url: "../datos/administradores.php",
                            }
                        }
                    },
                    height: 300
                });
            });
        </script>
    </body>
</html>