 <?php
class ConectarBD{

    private $host, $user, $pass, $database;
   
    public function __construct() {
        // Me llega por un array asociativo los datos de mi base de datos y los cargo en el constructor
        // $this->driver=$bd_cfg["driver"];
        $this->host= "127.0.0.1";
        $this->user= "root";
        $this->pass= "";
        $this->database= "roldiary";
        // $this->charset=$bd_cfg["charset"];
    }
     
    public function conexion(){
        //Me conecto a la base de datos 
        $mysqli = new mysqli($this->host, $this->user, $this->pass, $this->database);
           
        return $mysqli;
        
    }

     
}



?>
