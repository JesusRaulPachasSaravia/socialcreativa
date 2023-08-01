<?php
session_start();

//1. Obteniendo nivel de acceso (LOGIN)
$nivelacceso = $_SESSION['login']['nivelacceso'];
//$nivelacceso = "AST";   //ADM - SPV - AST

//2. Obtener el nombre de la vista
$url = $_SERVER['REQUEST_URI'];
$url_array = explode("/", $url);
$vistaActiva = $url_array[count($url_array) - 1];

//3. Definir los permisos
$permisos = [
  "R" => ["dashboard.php","matriculas.php", "crearmatricula-admin.php","alumnos.php" , "pagos.php", "cursos-admin.php" ,"personas.php", "profesores.php", "deudores.php", "aulas.php","horarios-admin.php", "horarios.php", "asistencia.php", "reporte-1.php", "reporte-2.php","reporte-3.php","reporte-4.php","reporte-5.php"],
  "A" => ["dashboard.php","matriculas.php", "crearmatricula-admin.php","alumnos.php" , "pagos.php", "cursos-admin.php" ,"personas.php", "profesores.php", "deudores.php", "aulas.php","horarios-admin.php", "asistencia.php","reporte-1.php", "reporte-2.php", "reporte-3.php","reporte-4.php","reporte-5.php"],
  "C" => ["dashboard.php","matriculas.php", "crearmatricula-admin.php","alumnos.php" , "tipospagos.php", "cursos.php" ,"personas.php", "deudores.php","horarios-admin.php", "asistencia.php"],
  "P" => ["dashboard.php", "tipospagos.php" , "horarios.php","alumnos.php"],
  "T" => ["dashboard.php", "crearmatricula.php","tipospagos.php", "cursos.php", "horarios.php"]
];

//4. Validar el acceso
$autorizado = false;

//5. Comprobar los permisos
$vistasPermitidas = $permisos[$nivelacceso];

foreach($vistasPermitidas as $item){
  if ($item == $vistaActiva){
    $autorizado = true;
  }
}

if (!$autorizado){
  //Cargar una vista
  include("./error.php");
  exit();
}

?>