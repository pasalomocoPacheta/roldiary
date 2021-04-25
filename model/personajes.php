<?php
// Una clase que toma los datos de la tabla personajes
class Personaje extends ModeloBase{
    private $id;
    private $nombre;
    private $descripcion;
    private $fkJugadorAsociado;
    private $fechaCreacionPersonaje;
    private $imagen;
     
    public function __construct($table) {
        $table="personajes";
        parent::__construct($table);
    }

    public function getFechaCreacionPersonaje() {
        return $this->fechaCreacionPersonaje;
    }
 
    public function setFechaCreacionPersonaje($fechaCreacionPersonaje) {
        $this->fechaCreacionPersonaje = $fechaCreacionPersonaje;
    }
     
    public function getImagen() {
        return $this->imagen;
    }
 
    public function setImagen($imagen) {
        $this->imagen = $imagen;
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
 
    public function getDescripcion() {
        return $this->descripcion;
    }
 
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
 
    public function getFkJugadorAsociado() {
        return $this->fkJugadorAsociado;
    }
 
    public function setFkJugadorAsociado($fkJugadorAsociado) {
        $this->fkJugadorAsociado = (int) $fkJugadorAsociado;
    }

    public function getAllByFkJugador($fkJugadorAsociado){
        $query="SELECT * FROM personajes where fk_jugador_asociado='$fkJugadorAsociado' ORDER BY id_personajes DESC";
        $query= $this->getBd()->query($query);
        if(!$query ){
            if (!mysqli_query($this->getBd(), $query)) {
                return ("Error description: " . mysqli_error($this->getBd()));
            }
        } else{
            if($query->num_rows>0){
                //  $query->fetch_object()
                // Class not found php fetch_object
                // http://mjcarrascosa.com/la-clase-stdclass-de-php/
                // https://stackoverflow.com/questions/41539363/undefined-class-when-i-use-fetch-object-mysqli
                // ESTO NO ME FUNCIONA PORQUE ME DEVUELVE UN OBJETO GENÉRICO Y NO PUEDO CASTEARLO 
                // O DECIRLE QUE SEA UN OBJETO DE TIPO THIS->TABLA
                while ($row = $query->fetch_object()) {
                    $resultSet[]=$row;
                }
            }else{
                $resultSet = "0 resultados devueltos";
            }
        }
       
        return $resultSet;
    }

    public function editDescription($id, $descripcion){

        $query="UPDATE personajes SET descripcion='$descripcion' WHERE id_personajes='$id'";   
            $save= $this->getBd()->query($query);
            if(!($save)){
            if (!mysqli_query($this->getBd(), $query)) {
                echo("Error description: " . mysqli_error($this->getBd()));
                } 
            }
            //$this->db()->error;
            return $save;
    }

    public function editName($id, $nombre){

        $query="UPDATE personajes SET nombre='$nombre' WHERE id_personajes='$id'";   
            $save= $this->getBd()->query($query);
            if(!($save)){
            if (!mysqli_query($this->getBd(), $query)) {
                echo("Error description: " . mysqli_error($this->getBd()));
                } 
            }
            //$this->db()->error;
            return $save;
    }

    
 
    public function save(){

        $query="INSERT INTO personajes (id_personajes,nombre,descripcion,fk_jugador_asociado,fecha_creacion_personaje,imagen)
                VALUES(NULL,
                       '".$this->nombre."',
                       '".$this->descripcion."',
                       '".$this->fkJugadorAsociado."',
                       '".$this->fechaCreacionPersonaje."',
                       '".$this->imagen."');";  
       $save= $this->getBd()->query($query);
       if(!($save)){
        if (!mysqli_query($this->getBd(), $query)) {
            echo("Error description: " . mysqli_error($this->getBd()));
            } 
       }
        //$this->db()->error;
        return $save;
    }
 
}


?>