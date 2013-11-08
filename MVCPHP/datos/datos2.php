<?php 

    
function conectarse() {
    $host="127.0.0.1";
    $user="root";
    $password="";
    $db="db";
    $con=mysqli_connect($host,$user,$password,$db);
    return $con;
}


    
    $con=conectarse();
    
    $aColumns = array( 'id', 'nombre', 'descripcion');
    
    /* Columna índice (Usada para cardinalidad rápida y precisa de la tabla) (En resumen: para ordenar la tabla) */
    $sIndexColumn = "id";
    
    /* Tabla de la base de datos a utilizar */
    $sTable = "laboratorio";
    
    /*
     * SQL queries
     * Get data to display
     */
    $sQuery = "SELECT * FROM laboratorio ";
    $rResult = mysqli_query( $con, $sQuery ) or fatal_error( 'MySQL Error: ' . mysql_errno() );
     
    /* Total data set length */
    $sQuery = "
        SELECT COUNT(".$sIndexColumn.")
        FROM   $sTable ";
    $rResultTotal = mysqli_query( $con, $sQuery ) or fatal_error( 'MySQL Error: ' . mysql_errno() );
    $aResultTotal = mysqli_fetch_array($rResultTotal);
    $iTotal = $aResultTotal[0];
     
     
    /*
     * Output
     */
    $sOutput = '{';
    $sOutput .= '"iTotalRecords": '.$iTotal.', ';
    $sOutput .= '"aaData": [ ';
    while ( $aRow = mysqli_fetch_array( $rResult ) )
    {
        $sOutput .= "[";
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( $aColumns[$i] == "version" )
            {
                /* Special output formatting for 'version' */
                $sOutput .= ($aRow[ $aColumns[$i] ]=="0") ?
                    '"-",' :
                    '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
            }
            else if ( $aColumns[$i] != ' ' )
            {
                /* General output */
                $sOutput .= '"'.str_replace(
                    array( '"', "\n", "\r" ),
                    array( '\\"', "\\n", "\\n"),
                    $aRow[ $aColumns[$i] ] ).'",';
            }
        }
         
        /*
         * Optional Configuration:
         * If you need to add any extra columns (add/edit/delete etc) to the table, that aren't in the
         * database - you can do it here
         *
         * Acá se agregan columnas extra, que no pertenecen a la BD
         *
         */     
        $sOutput.=json_encode('<button class="button" type="button" id="man_provee_editar" value="'.$aRow[$aColumns[0]].'"></button>');


        // DESCOMENTAR ESTA LINEA SI NO SE AGREGAN MAS COLUMNAS
        // $sOutput = substr_replace( $sOutput, "", -1 );
        $sOutput .= "],";
    }
    $sOutput = substr_replace( $sOutput, "", -1 );
    $sOutput .= '] }';
     
    echo $sOutput;


?>

