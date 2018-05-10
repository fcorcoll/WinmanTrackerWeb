


<!DOCTYPE html>
<!--
Tabla Jugadores / estado-Usuario, prototipo, version 1.0.0
-->
<html>
    <head>
        <title>Jugadores de Winman</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style2.css"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>       
    </head>
    <body style="background-color: #888">
 
        <div align="center">
            <br><br><br><br>
            <center><b id="Title">  </b> </center>
            <div class="container">
                <div>
                    <img class="right" src="img/leo.png"width=50% height=50% >
                </div>
                  <div>
                       <img class="left" src="img/Androide.png" >
                </div>
                <div class="videos">
                    <iframe width="336" height="189" 
                            src="https://www.youtube.com/embed/Whh2_AfLvfo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> 
                </div>
                <div class="equipos">
                    <table cellspacing="20" cellpadding="20">                        
                        <tr>                             
                            <th><img src="img/fcb.png"width=85px height=85px>
                            <th><img src="img/girona.png"width=85px% height=85px ></th>                            
                            <th><img src="img/celta.png"width=85px height=85px ></th>
                            <th><img src="img/madrid.png"width=85px height=85px ></th>                       
                            <td><img src="img/atMadrid.png"width=85px height=85px ></td> 
                            <td><img src="img/athBilbao.png"width=85px height=85px ></td> 
                            <td><img src="img/betis.png" width=85px height=85px ></td> 
                            <td><img src="img/sevilla.png"width=85px height=85px > </td>                   
                            <td><img src="img/depor.png"width=85px height=85px ></td>                      
                            <td><img src="img/deportivo.png"width=85px height=85px ></td>                        
                            <td><img src="img/eibar.png"width=85px height=85px ></td> 
                            <td><img src="img/valencia.png"width=85px height=85px ></td>            
                            <td><img src="img/getafe.png"width=85px height=85px ></td> 
                            <td><img src="img/laspalmas.png"width=85px height=85px></td> 
                            <td><img src="img/lega.png"width=85px height=85px ></td> 
                            <td><img src="img/villareal.png"width=85px height=85px ></td> 
                        </tr>
                    </table>
                </div>
                <table class="table table-strpied" id ="Punctuations">     
                    <thead>
                        <tr>
                        <th scope="col">
                            Nombre                        
                        </th>
                        <th scope="col">
                            Apellido
                        </th>
                        <th scope="col">
                            Posicion
                        </th>
                        <th scope="col">
                           Nivel
                        </th>
                        <th scope="col">
                            Fichaje
                        </th>
                        <th scope="col">
                           Dorsal
                        </th>
                    </tr>
                </thead>        

                <?php
                require './jugadores.php';

                session_start();
                $idusuario = $_SESSION['id_usuario'];
                $jugador = jugadores($idusuario);

                //Cerramos session.
                session_commit();

                //todos los jugadores
                while ($allplayers = mysqli_fetch_row($jugador)) {
                    echo "<tr>";
                    echo "<td>";
                    echo $allplayers[0];
                    echo "</td>";

                    echo "<td>";
                    echo $allplayers[1];
                    echo "</td>";
                    echo "<td>";
                    echo $allplayers[2];
                    echo "</td>";

                    echo "<td>";
                    echo $allplayers[3];
                    echo "</td>";

                    echo "<td>";
                    echo $allplayers[4];
                    echo "</td>";

                    echo "<td>";
                    echo $allplayers[5];
                    echo "</td>";
                    echo "</tr>";
                }
                    
                    //liberar el conjunto de resultados
                    mysqli_free_result($jugador);
                ?>          
        </table>
            </div>
               </div>
            
        
    </body>
</html>
