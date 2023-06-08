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
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$precio = (isset($_POST['precio'])) ? $_POST['precio'] : '';
$stock = (isset($_POST['stock'])) ? $_POST['stock'] : '';

$id_lugar = (isset($_POST['id_lugar'])) ? $_POST['id_lugar'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$descripcion_general = (isset($_POST['descripcion_general'])) ? $_POST['descripcion_general'] : '';
$tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
$descripcion_tipo = (isset($_POST['descripcion_tipo'])) ? $_POST['descripcion_tipo'] : '';



$id_fotografia = (isset($_POST['id_fotografia'])) ? $_POST['id_fotografia'] : '';
$lugares_id_lugar = (isset($_POST['lugares_id_lugar'])) ? $_POST['lugares_id_lugar'] : '';
$ubicacion = (isset($_POST['ubicacion'])) ? $_POST['ubicacion'] : '';

$id_anuncio = (isset($_POST['id_anuncio'])) ? $_POST['id_anuncio'] : '';
$ubicacion = (isset($_POST['ubicacion'])) ? $_POST['ubicacion'] : '';
$titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : '';

$id_descripcion = (isset($_POST['id_descripcion'])) ? $_POST['id_descripcion'] : '';
$lugares_id_lugar = (isset($_POST['lugares_id_lugar'])) ? $_POST['lugares_id_lugar'] : '';
$titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : '';
$descripcion = (isset($_POST['desc$descripcion'])) ? $_POST['desc$descripcion'] : '';

switch($opcion){
	case 1:
        $consulta = "SELECT id, descripcion, precio, stock FROM articulos";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2:
        $consulta = "INSERT INTO articulos (descripcion, precio, stock) VALUES('$descripcion', '$precio', '$stock') ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                
        break;
    case 3:
        $consulta = "UPDATE articulos SET descripcion='$descripcion', precio='$precio', stock='$stock' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 4:
        $consulta = "DELETE FROM articulos WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;   
    case 5:
        $consulta = "SELECT id_lugar, nombre,descripcion_general, tipo, descripcion_tipo FROM lugares";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 6:
        $consulta = "SELECT id_fotografia, lugares_id_lugar, ubicacion FROM fotografias";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 7:
        $consulta = "SELECT id_anuncio, ubicacion, titulo FROM anuncios";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 8:
        $consulta = "SELECT descripciones.id_descripcion, lugares.id_lugar, descripciones.titulo, descripciones.descripcion FROM descripciones JOIN lugares ON lugares.id_lugar = descripciones.id_descripcion";


        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;           
    
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = null ;