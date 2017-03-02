<?php
/**
 * Permitir la conexion contra la base de datos
 */
class dbNBA
{
  //Atributos necesarios para la conexion
  private $host="localhost";
  private $user="root";
  private $pass="root";
  private $db_name="nba";

  //Conector
  private $conexion;

  //Propiedades para controlar errores
  private $error=false;

  function __construct()
  {
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
      }
  }

  //Funcion para saber si hay error en la conexion
  function hayError(){
    return $this->error;
  }

//Funcion para devolver los equipos y su conferencia
  public function devolverEquiposConf($equipo_local,$equipo_visitante,$temporada){
    if($this->error==false){
      if (!empty($equipo_local)) {
        $hola=" WHERE equipo_local='".$equipo_local."'";
      }

      if (!empty($equipo_visitante)) {
        if (!empty($equipo_local)) {
          $hola=$hola." AND equipo_visitante='".$equipo_visitante."'";
        }else {
          $hola=" WHERE equipo_visitante='".$equipo_visitante."'";
        }
      }
      if (!empty($temporada)) {
        if (!empty($equipo_visitante) || !empty($equipo_local)) {
            $hola=$hola." AND temporada='".$temporada."'";
        }else {
          $hola=" WHERE temporada='".$temporada."'";
        }
      }

      $resultado = $this->conexion->query("SELECT * FROM partidos".$hola);
      return $resultado;
    }else{
      return null;
    }
  }
  public function devolverLocal(){
    if($this->error==false){
      $local = $this->conexion->query("SELECT DISTINCT (equipo_local) FROM partidos");
      return $local;
    }else{
      return null;
    }
  }

  public function devolverVisitante(){
    if($this->error==false){
      $vis = $this->conexion->query("SELECT DISTINCT (equipo_visitante) FROM partidos");
      return $vis;
    }else{
      return null;
    }
  }

  public function devolverTemp(){
    if($this->error==false){
      $temp = $this->conexion->query("SELECT DISTINCT (temporada) FROM partidos");
      return $temp;
    }else{
      return null;
    }
  }
}


 ?>
