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
        <title></title>
        <link href="../vista/styles/kendo.common.min.css" rel="stylesheet" />
        <link href="../vista/styles/kendo.default.min.css" rel="stylesheet" />
        <link href="../vista/styles/sample.css" rel="stylesheet"/>
        <link href="../vista/styles/multiselect.css" rel="stylesheet"/>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="js/kendo/kendo.all.min.js"></script>
        <script type="text/javascript" scr="js/multiselect.js"></script>
        <script type="text/javascript" scr="js/editor.js"></script>
        <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
        <meta charset="UTF-8"/>
    </head>
    <body bgcolor="#e2e2e2">
        <div style="margin: 10px auto 15px 100px; width:800px "class="">
            <div class="demo-section">
                <label>
                    <h3>Nombre:
                        <input  id="nombre" type="text" class="k-input k-textbox" name="nombre" value="<?php echo $nombre ?>"> 
                    </h3>
                </label>
                <div style="align: center;">
                    <textarea id="descripcion" name="descripcion" value="<?php echo $des ?>"></textarea>
                </div>
                <div class="k-section">
                    <h2>Asignar Administradores</h2>
                    <select id="administradores" multiple="multiple" data-placeholder="Selecione un administrador..." style="width: 400px"></select> 
                    <button id="todos" class="k-button">Seleccionar Todos</button>
                </div>
                <div class="k-section">
                    <h2>Asignar Profesores</h2>
                    <select id="administradores" multiple="multiple" data-placeholder="Selecione un profesor..." style="width: 400px"></select> 
                    <button id="todos" class="k-button">Seleccionar Todos</button>
                </div>
                <div class="k-section">
                    <h2>Asignar Alumnos</h2>
                    <select id="administradores" multiple="multiple" data-placeholder="Selecione un alumno..." style="width: 400px"></select> 
                    <button id="todos" class="k-button">Seleccionar Todos</button>
                </div>
            </div>
        </div>
    </body>
</html>