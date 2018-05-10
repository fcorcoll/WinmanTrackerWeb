<?php
$nombre = $_POST["email"];
$contrasenya = $_POST["password"];

//print con fines para debugar
//echo "nombre: " . $email . " y contrasenya: " . $contrasenya;
   
/**
* El socket de conexión con la BD.
*/
$enlace = conectarBD();

//la query
$consulta = "select * from usuario where nombre='$nombre' "
        . "and contrasenya='$contrasenya'";

$resultado = mysqli_query($enlace, $consulta);

//Comprobamos que nos ha devuelto un solo valor.
$filas = mysqli_num_rows($resultado);
//rescatamos la info del usuario.
$usuario = mysqli_fetch_row($resultado);

if($filas == 1)
{
    session_start();
    $_SESSION['id_usuario'] = $usuario[0];
    
    echo "Sesion iniciada correctamente";  
    
    //liberar el conjunto de resultados
    mysqli_free_result($resultado);
}
else
{
    echo "ERROR, loguin incorrecto";
}

//Cerramos la BD.
mysqli_close($enlace);
	
	
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

