<?php

// Una clase que toma los datos de la tabla jugadores
class Jugador extends ModeloBase{
    private $id;
    private $nombre;
    private $correo;
    private $password;
    private $admin;
    private $fechaRegistro;
     
    public function __construct($tabla) {
        $tabla="jugadores";
        parent::__construct($tabla);
    }

    public function getCorreo() {
        return $this->correo;
    }
 
    public function setCorreo($correo) {
        $this->correo = $correo;
    }
     
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
    }
     
    public function getNombre() {
        return $this->nombre;
    }
 
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
 
    public function getAdmin() {
        return $this->admin;
    }
 
    public function setAdmin($admin) {
        $this->admin = $admin;
    }
 
    public function getFechaRegistro() {
        return $this->fechaRegistro;
    }
 
    public function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }
 
    public function getPassword() {
        return $this->password;
    }
 
    public function setPassword($password) {
        $this->password = $password;
    }

    public function comprobarAdministrador ($nombre, $pass){
        $tabla = parent::getTabla();
        $bd=     parent::getBd();
        $query=$bd->query("SELECT nombre,admin,pass FROM $tabla WHERE nombre='$nombre' and admin='1' and pass='$pass'");
        if($query->num_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function comprobarJugadores ($Jugadores, $pass){
        $tabla = parent::getTabla();
        $bd=     parent::getBd();
        $query=$bd->query("SELECT pass FROM $tabla WHERE nombre='$Jugadores'");
        if($query->num_rows>0){
            while($rows = $query->fetch_assoc()){
                $passHash = $rows["pass"];
            }
//https://www.reddit.com/r/PHPhelp/comments/bj4uo3/password_verify_doesnt_work/
            if(password_verify($pass, $passHash)){
                
                return true;
            }else{
                return false;
            }
        }
    }

    public function comprobarNombreRepetidoJugadores ($jugadores){
        $tabla = parent::getTabla();
        $bd=     parent::getBd();
        $query=$bd->query("SELECT nombre FROM $tabla WHERE nombre='$jugadores'");
        if($query->num_rows>0){
            return true;
        }else{
            return false;
        }
    }
 
    public function save(){
        $query="INSERT INTO jugadores (id_jugadores,nombre,correo,pass,admin,fecha_registro)
                VALUES(NULL,
                       '".$this->nombre."',
                       '".$this->correo."',
                       '".$this->password."',
                       '".$this->admin."',
                       '".$this->fechaRegistro."');";
        // Llamo a la función getBD del modeloBase para usar la BD ya creada y hacer menos conexiones a la misma               
        $save= $this->getBd()->query($query);
        if(!($save)){
            if (!mysqli_query($this->getBd(), $query)) {
                echo("Error description: " . mysqli_error($this->getBd()));
                } 
        }
        return $save;
    }
 
}


?>