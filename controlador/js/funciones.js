var doc;
doc = $(document);
doc.ready(cargarMenu);
doc.ready(cargarTabla);


function frameCrearLaboratorio()
{
    $("#tabla").load("../vista/crearEditarLaboratorio.php");
}

function frameEditarLaboratorio(model)
{
    var datos = {"id": model.ID, "nombre": model.nombre, "des": model.descripcion}
    $("#tabla").load("../vista/crearEditarLaboratorio.php", datos);
}

function cargarMenu()
{
    $("#menu").load("../vista/menu.html");
}

function a()
{
    alert("fds");
}

function cargarTabla()
{
    $("#tabla").load("../vista/tabla.html");
}


function getId()
{
    alert("Ventana cambiada");
    console.log(this.id);
    //document.getElementById("hola").innerHTML = this.id;
}

function creadoConExito()
{ 
    //window.top.frameOpciones.location='OpConfiguracion.html';
    window.top.contenido.location='creado_exito.html';
}

function listarLaboratorios()
{

	   window.top.contenido.location='laboratorios.html';
       

}
function lisLab()
{
      window.top.contenido.location='/contruccion/MVCPHP/vista/actual/laboratorios.html';
}

function checkForm(form)
    {
        if(   isEmpty(form.nombre_lab.value)  ) 
        {
            alert("Error: debes llenar los campos");
            return false;
        }
        var des = document.getElementById("descripcion");


        if(  isEmpty(des.value ) )
        {
listarLaboratorios
            alert("Error: debe llenar la text area");
            return false;
        }
    
        return true;
    }

    function isEmpty(str) {
        return (!str || 0 === str.length);
    }