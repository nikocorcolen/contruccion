
function frameCrearLaboratorio()
{ 
    //window.top.frameOpciones.location='OpConfiguracion.html';
    window.top.contenido.location='laboratorio.html';
}

function creadoConExito()
{ 
    //window.top.frameOpciones.location='OpConfiguracion.html';
    window.top.contenido.location='/contruccion/MVCPHP/vista/antiguo/creado_exito.html';
}

function listarLaboratorios()
{
	   window.top.contenido.location='laboratorios.html';
}
function lisLab()
{
      window.top.contenido.location='/contruccion/MVCPHP/vista/actual/laboratorios.html';
}
function editarLaboratorio()
{
    window.top.contenido.location='/contruccion/MVCPHP/vista/actual/editarLaboratorio.html';
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