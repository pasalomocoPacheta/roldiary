<?php

// Una clase que toma los datos de la tabla jugadores
class Perfil extends ModeloBase{
    private $id;
    private $fkJugadorAsociado;
    private $biografia;
    private $aficiones;
    private $foto;
     
    public function __construct($tabla) {
        $tabla="jugadores";
        parent::__construct($tabla);
    }

      
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
    }

    public function getBiografia() {
        return $this->id;
    }
 
    public function setBiografia($id) {
        $this->id = $id;
    }

    public function getAficiones() {
        return $this->id;
    }
 
    public function setAficiones($id) {
        $this->id = $id;
    }
    
    public function geFoto() {
        return $this->foto;
    }
 
    public function setFoto($foto) {
        $this->foto = $foto;
    }


    public function getFkJugadorAsociado() {
        return $this->fkJugadorAsociado;
    }
 
    public function setFkJugadorAsociado($fkJugadorAsociado) {
        $this->fkJugadorAsociado = $fkJugadorAsociado;
    }

  
    public function save(){
        $query="INSERT INTO perfiles (id_perfiles,fk_jugador_asociado,biografia,aficiones, foto)
                VALUES(NULL,
                       '".$this->fk_jugador_asociado."',
                       '".$this->biografia."',
                       '".$this->foto."',
                       '".$this->aficiones."');";
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