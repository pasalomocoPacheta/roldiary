<?php
// class adminController extends ControladorBase{
     
//     public function __construct() {
//         parent::__construct();
//     }
     
//     public function index(){
         
//         //Creamos el objeto usuario
//         $usuario=new Jugador($adapter);
         
//         //Conseguimos todos los usuarios
//         $allusers=$usuario->getAll();
        
//         //Cargamos la vista index y le pasamos valores
//         $this->view("index",array(
//             "allusers"=>$allusers,
//             "Hola"    =>"Soy Víctor Robles"
//         ));
//     }
     
//     public function crear(){
//         if(isset($_POST["nombre"])){
//             //Creamos un usuario
//             $usuario=new Jugador();
//             $usuario->setNombre($_POST["nombre"]);
//             $usuario->setAdmin($_POST["admin"]);
//             $usuario->setFechaRegistro($_POST["fechaRegistro"]);
//             $usuario->setPassword(sha1($_POST["password"]));
//             $save=$usuario->save();
//         }
//         $this->redirect("Usuarios", "index");
//     }
     
//     public function borrar(){
//         if(isset($_GET["id"])){
//             $id=(int)$_GET["id"];
             
//             $usuario=new Jugador();
//             $usuario->deleteById($id);
//         }
//         $this->redirect();
//     }
     
 
// }
?>
