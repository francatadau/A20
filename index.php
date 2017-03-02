<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pagina principal</title>
  </head>
  <body>
    <h2>Mostrar partidos</h2>
    <form action="filtrado.php" method="post">
      Equipo local:
      <select name="local">
        <?php
        include "dbNBA.php";
        $nba=new dbNBA();
        $total=$nba->devolverLocal();
        while ($fila=$total->fetch_assoc()) {
          echo "<option value='" .$fila["equipo_local"]."' > ".$fila["equipo_local"]."</option>";
        }

         ?>
      </select><br><br>

      Equipo Visitante:
      <select name="visitante">
        <?php
        $vis=$nba->devolverVisitante();
        while ($fila=$vis->fetch_assoc()) {
          echo "<option value='" .$fila["equipo_visitante"]."' > ".$fila["equipo_visitante"]."</option>";
        }
         ?>
      </select><br><br>

      Temporada:
      <select name="temporada">
        <?php
        $temp=$nba->devolverTemp();
        while ($fila=$temp->fetch_assoc()) {
          echo "<option value='" .$fila["temporada"]."' > ".$fila["temporada"]."</option>";
        }
         ?>
      </select><br><br>

      <input type="submit" value="Enviar">

    </form>
  </body>
</html>
