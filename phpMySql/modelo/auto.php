<?php 
include_once '../../modelo/conector/BaseDatos.php';

class Auto{
    private $patente;
    private $marca;
    private $modelo;
    private $dniDuenio;
    private $mensajeOperacion;

    public function __construct(){
        $this-> patente = "";
        $this-> marca = "";
        $this-> modelo = "";
        $this-> dniDuenio = "";
        $this-> mensajeOperacion = "";
    }

    public function getPatente(){
        return $this-> patente;
    }
    public function getMarca(){
        return $this-> marca;
    }
    public function getModelo(){
        return $this-> modelo;
    }
    public function getDniDuenio(){
        return $this-> dniDuenio;
    }
    public function getMensajeOperacion(){
        return $this-> mensajeOperacion;
        
    }


    public function setPatente($patente){
        $this-> patente = $patente;
    }
    public function setMarca($marca){
        $this-> marca = $marca;
    }
    public function setModelo($modelo){
        $this-> modelo = $modelo;
    }
    public function setDniDuenio($dniDuenio){
        $this-> dniDuenio = $dniDuenio;
    }
    public function setMensajeOperacion($mensajeOperacion){
        $this-> mensajeOperacion = $mensajeOperacion;
        
    }

    public function __toString(){
        return "\n Patente: ". $this->getPatente().
               "\n Marca: ". $this->getMarca().
               "\n Modelo: ". $this->getModelo(). "\n";
    }

    public function setear($patente, $marca, $modelo, $dniDuenio)    {
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setDniDuenio($dniDuenio);
    }

    //cargar autos
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM auto WHERE Patente = ".$this->getPatente();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['Patente'], $row['Marca'], $row['Modelo'], $row['DniDuenio']);
                    
                }
            }
        } else {
            $this->setMensajeOperacion("Auto->listar: ".$base->getError());
        }
        return $resp;
    
    }

    //insertar auto
    public function insertar(){
        $resp = false;
        $base = new BaseDatos();

        $patent = $this->getPatente();
        $marca = $this->getMarca();
        $modelo = $this->getModelo();
        $dniD = $this->getDniDuenio();

        $sql= "INSERT INTO auto (Patente, Marca, Modelo, DniDuenio) VALUES ('$patent', '$marca', '$modelo', '$dniD');";
        //echo "<br>CONSULTA ". $sql. "<br>";
        if ($base->Iniciar()) {
            if ($laPatente = $base->Ejecutar($sql)) {
                $this->setPatente($laPatente);
                $resp = true;
            } else {
                $this->setMensajeOperacion("Auto->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->insertar: ".$base->getError());
        }
        return $resp;
    }

    //modificar autos
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();

        $marca = $this->getMarca();
        $modelo = $this->getModelo();
        $dniD = $this->getDniDuenio();

        $sql="UPDATE auto SET Marca, Modelo, DniDuenio = ('$marca', $modelo, $dniD) WHERE Patente=".$this->getPatente();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Auto->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->modificar: ".$base->getError());
        }
        return $resp;
    }

    //eliminar autos
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM auto WHERE Patente=".$this->getPatente();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("Auto->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->eliminar: ".$base->getError());
        }
        return $resp;
    }

    //listar autos
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM auto ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new Auto();
                    $obj->setear($row['Patente'], $row['Marca'], $row['Modelo'], $row['DniDuenio']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setMensajeOperacion("Auto->listar: ".$base->getError());
        }
 
        return $arreglo;
    }

}


?>