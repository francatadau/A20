<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Listado de equipos por conferencia</title>
  </head>
  <body>
    <?php

    include "dbNBA.php";
    //Crear el objeto de conexion
    $nba=new dbNBA();
    //Comprobar que llega la variable conferencia
    if(isset($_POST['local']) || isset($_POST['visitante']) || isset($_POST['temporada'])){

    //Recuperar los equipos y sus conferencias
    $resultado=$nba->devolverEquiposConf($_POST['local'],$_POST['visitante'],$_POST['temporada']);
     ?>
    <table border="1px">
      <tr>
        <th>Equipo Local</th>
        <th>Equipo Visitante</th>
        <th>temporada</th>
      </tr>
      <?php
      while ($fila=$resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$fila['equipo_local']."</td>";
        echo "<td>".$fila['equipo_visitante']."</td>";
        echo "<td>".$fila['temporada']."</td>";
        echo "</tr>";
      }
      ?>
    </table>
  <?php } ?>
  </body>
</html>
