<?php
// Una clase que toma los datos de la tabla jugadores
class Anecdota extends ModeloBase{
    private $id;
    private $contenido;
    private $campania;
    private $fkPersonajeEscritor;
    private $fecha;
     
    public function __construct($table) {
        $table="anecdotas";
        parent::__construct($table);
    }

    public function getFecha() {
        return $this->fecha;
    }
 
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
     
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
    }

    public function getContenido() {
        return $this->contenido;
    }
 
    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }
     
    public function getFkPersonajeEscritor() {
        return $this->fkPersonajeEscritor;
    }
 
    public function setFkPersonajeEscritor($fkPersonajeEscritor) {
       
        $this->fkPersonajeEscritor = (int) $fkPersonajeEscritor;

    }
 
    public function getCampania() {
        return $this->campania;
    }
 
    public function setCampania($campania) {
        $this->campania = $campania;
    } 

    public function getAllByFkPersonajeEscritorConIdJugador($idJugador){
        $query="SELECT * FROM anecdotas WHERE fk_personaje_escritor in";
        $subQuery="(select id_personajes from personajes where fk_jugador_asociado='$idJugador')";
        $query= $this->getBd()->query($query.$subQuery);
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

    public function getAllByFkPersonaje($fkPersonajeEscritor){
        $query="SELECT * FROM anecdotas where fk_personaje_escritor='$fkPersonajeEscritor' ORDER BY id_anecdotas DESC";
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

    public function editCampania($id, $campania){

        $query="UPDATE anecdotas SET campania='$campania' WHERE id_anecdotas='$id'";   
            $save= $this->getBd()->query($query);
            if(!($save)){
            if (!mysqli_query($this->getBd(), $query)) {
                echo("Error Campania: " . mysqli_error($this->getBd()));
                } 
            }
            //$this->db()->error;
            return $save;
    }

    public function editContenido($id, $contenido){

        $query="UPDATE anecdotas SET contenido='$contenido' WHERE id_anecdotas='$id'";   
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
        // https://tableplus.com/blog/2019/09/column-count-doesnt-match-value-count-at-row-1.html
        // INSERT INTO `anecdotas` 
        // (`id_anecdotas`, `contenido`, `campania`, `fk_personaje_escritor`, `fecha`)
        //  VALUES (NULL, 'fgdfg', 'dfgdfg', '7', current_timestamp());
        // $fecha = date('Y-m-d H:i:s');
        // var_dump($this->fkPersonajeEscritor);
        $query="INSERT INTO `anecdotas` (`id_anecdotas`, `contenido`, `campania`, `fk_personaje_escritor`, `fecha`)
                VALUES(NULL,
                       '".$this->contenido."',
                       '".$this->campania."',
                       '".$this->fkPersonajeEscritor."',
                       '".$this->fecha."');";           
        $save= $this->getBd()->query($query);
        if(!($save)){
            if (!mysqli_query($this->getBd(), $query)) {
                echo("Error description: " . mysqli_error($this->getBd()));
            } 
        }
        // var_dump ( $this->getBd()->query($query));  
        //$this->db()->error;
        return $save;
    }
 
}


?>