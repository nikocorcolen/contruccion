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
                    url: "administradores.php",
                }
            }
        },
        height: 300
    });
});