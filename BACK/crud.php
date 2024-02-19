<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$data = null;

$_POST = json_decode(file_get_contents("php://input"), true);

function permisos() {  
  if (isset($_SERVER['HTTP_ORIGIN'])){
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
      header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
      header('Access-Control-Allow-Credentials: true');      
  }  
  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))          
        header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
    exit(0);
  }
}
permisos();


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';



$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$nombre_imagen = (isset($_POST['nombre_imagen'])) ? $_POST['nombre_imagen'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : '';
$descripcion = (isset($_POST['$descripcion'])) ? $_POST['$descripcion'] : '';
$imagen = (isset($_POST['$imagen'])) ? $_POST['$imagen'] : '';
$tipo = (isset($_POST['$tipo'])) ? $_POST['$tipo'] : '';
$tipo_descripcion = (isset($_POST['$tipo_descripcion'])) ? $_POST['$tipo_descripcion'] : '';
$icono = (isset($_POST['icono'])) ? $_POST['icono'] : '';



switch($opcion){
	
    case 10:
    $consulta = "SELECT id, nombre_imagen, titulo, descripcion FROM anuncios";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    break;
    case 11:
    $consulta = "SELECT id, nombre, descripcion, imagen, tipo, tipo_descripcion FROM lugares";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    break;
    case 12:
    $consulta = "SELECT id, nombre, descripcion, icono FROM filosofia";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    break;
    case 13:
    $consulta = "SELECT id, nombre_imagen, nombre FROM galeria";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    break;
   
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = null ;