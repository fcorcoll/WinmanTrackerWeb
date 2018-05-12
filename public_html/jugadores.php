<?php

function jugadores($id)
{
    $enlace = conectarBD();
    //echo "Id: " . $id;
    
    $consulta = "select vistajugador.nombre, vistajugador.apellido, "
            . "vistajugador.posicion, vistajugador.nivel, vistajugador.fichaje, "
            . "vistajugador.dorsal from vistajugador inner join jugador_usuario "
            . "on vistajugador.ID = jugador_usuario.id_jugador "
            . "where jugador_usuario.id_usuario =". $id;
    
    $jugador = mysqli_query($enlace, $consulta);

    //Cerramos la BD.
    mysqli_close($enlace);
    
    return $jugador;
}

/**
 * méotod para conectar con la base de datos.
 * @return type mysqli_connect, conexión a la BD.
 */
function conectarBD()
{
    $enlace = mysqli_connect("localhost", "root", "", "winman");

    if(!$enlace)
    {
        echo "Error: no se pudo conectar con mysql: " . PHP_EOL;
        echo "error de depuraci&oacute;n: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuraci&oacute;n: " . mysqli_connect_errno() . PHP_EOL;
        exit;

    }
    else
    {
        //prints para debugar
        //echo "Conexión hecha" . PHP_EOL;
        //echo "informaciónn del host: " . mysqli_get_host_info($enlace);
        return $enlace;
    }
}

?>