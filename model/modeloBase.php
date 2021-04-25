<!-- Ahora crearemos la clase ModeloBase que heredará de la 
clase Entidabdase y a su vez será heredada por los modelos de 
consultas. La clase ModeloBase permitirá utilizar el constructor 
de consultas que hemos incluido y también los métodos de Entidabdase, 
así como otros métodos que programemos dentro de la clase, 
por ejemplo yo tengo un método para ejecutar consultas sql 
que directamente me devuelve el resultset en un array de objetos 
preparado para pasárselo a una vista, podríamos tener cientos para diferentes cosas. -->
<!-- // https://thisinterestsme.com/php-exceptions-mysql-extension/  EXCEPCIONES EN CONSULTAS   -->
<?php
class ModeloBase {
    private $tabla;
    private $bd;
     
    public function __construct($tabla) {
        require_once 'conectarBD.php';
        $this->tabla=(string) $tabla; 
        $conexion = new ConectarBD();
        $this->bd = $conexion->conexion();
    }

    public function getTabla(){
        return $this->tabla;
    }
     
    public function getBd(){
        return $this->bd;
    }

    public function getNombreById($id){
        $idNombreTabla = "id_".$this->tabla;
        $query=$this->bd->query("SELECT nombre FROM $this->tabla WHERE $idNombreTabla=$id");
        if(!$query ){
            if (!mysqli_query($this->getBd(), $query)) {
                return ("Error description: " . mysqli_error($this->getBd()));
            }
        } else{
            if($query->num_rows>0){
                while ($row = $query->fetch_assoc()) {
                    $resultSet=$row["nombre"];
                }
            }else{
                 $resultSet = "0 resultados devueltos";
            }
        }
        return $resultSet;
    }

    public function getIdByNombre($nombre){
        $query=$this->bd->query("SELECT id_$this->tabla FROM $this->tabla WHERE nombre='$nombre'");
        if(!$query ){
            if (!mysqli_query($this->getBd(), $query)) {
                return ("Error description: " . mysqli_error($this->getBd()));
            }
        } else{
            if($query->num_rows>0){
                while ($row = $query->fetch_assoc()) {
                    $resultSet=$row["id_$this->tabla"];
                }
            }else{
                 $resultSet = "0 resultados devueltos";
            }
        }
        return $resultSet;
    }

    public function getAll(){
        $query=$this->bd->query("SELECT * FROM $this->tabla ORDER BY id_$this->tabla DESC");
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
     
    public function getById($id){
        $query=$this->bd->query("SELECT * FROM $this->tabla WHERE id_$this->tabla=$id");
        if(!$query ){
            if (!mysqli_query($this->getBd(), $query)) {
                return ("Error description: " . mysqli_error($this->getBd()));
            }
        } else{
            if($query->num_rows>0){
                while ($row = $query->fetch_object()) {
                    $resultSet[]=$row;
                }
            }else{
                 $resultSet = "0 resultados devueltos";
            }
        }
        return $resultSet;
    }
     
    public function getBy($column,$value){
        $query=$this->bd->query("SELECT * FROM $this->tabla WHERE $column='$value'");
        if(!$query ){
            if (!mysqli_query($this->getBd(), $query)) {
                return ("Error description: " . mysqli_error($this->getBd()));
            }
        } else{
            if($query->num_rows>0){
                while ($row = $query->fetch_object()) {
                    $resultSet[]=$row;
                }
            }else{
                $resultSet = "0 resultados devueltos";
            }
        }
        return $resultSet;
    }
     
    public function deleteById($id){
        $query=$this->bd->query("DELETE FROM $this->tabla WHERE id_$this->tabla=$id");
        if(!$query ){
             if (!mysqli_query($this->getBd(), $query)) {
                return ("Error description: " . mysqli_error($this->getBd()));
            }
        } else{
            return $query;
        }
        
    }
     
    public function deleteBy($column,$value){
        $query=$this->bd->query("DELETE FROM $this->tabla WHERE $column='$value'");
        if(!$query ){
             if (!mysqli_query($this->getBd(), $query)) {
                return ("Error description: " . mysqli_error($this->getBd()));
            }
        } else{
            return $query;
        }
    }
     
    public function ejecutarSql($query){
        $query=$this->bd->query($query);
        if (!mysqli_query($this->getBd(), $query)) {
            return ("Error description: " . mysqli_error($this->getBd()));
        }
        if($query==true){
            if($query->num_rows>1){
                while($row = $query->fetch_object()) {
                   $resultSet[]=$row;
                }
            }elseif($query->num_rows==1){
                if($row = $query->fetch_object()) {
                    $resultSet=$row;
                }
            }else{
                $resultSet=true;
            }
        }else{
            $resultSet=false;
        }
         
        return $resultSet;
    }
     
    
     
}
?>
