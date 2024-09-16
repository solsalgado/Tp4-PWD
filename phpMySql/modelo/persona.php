<?php 
include_once '../../modelo/conector/BaseDatos.php';

class Persona{
    private $nroDni;
    private $apellido;
    private $nombre;
    private $fechaNac;
    private $telefono;
    private $domicilio;
    private $mensajeOperacion;

    public function __construct(){
        $this-> nroDni = "";
        $this-> apellido = "";
        $this-> nombre = "";
        $this-> fechaNac = "";
        $this-> telefono = "";
        $this-> domicilio = "";
        $this-> mensajeOperacion = "";
    }

    public function getNroDni(){
        return $this-> nroDni;
    }
    public function getApellido(){
        return $this-> apellido;
    }
    public function getNombre(){
        return $this-> nombre;
    }
    public function getFechaNac(){
        return $this-> fechaNac;
    }
    public function getTelefono(){
        return $this-> telefono;
    }
    public function getDomicilio(){
        return $this-> domicilio;
    }
    public function getMensajeOperacion(){
        return $this-> mensajeOperacion;
        
    }

    public function setNroDni($nroDni){
        $this-> nroDni = $nroDni;
    }
    public function setApellido($apellido){
        $this-> apellido = $apellido;
    }
    public function setNombre($nombre){
        $this-> nombre = $nombre;
    }
    public function setFechaNac($fechaNac){
        $this-> fechaNac = $fechaNac;
    }
    public function setTelefono($telefono){
        $this-> telefono = $telefono;
    }
    public function setDomicilio($domicilio){
        $this-> domicilio = $domicilio;
    }
    public function setMensajeOperacion($mensajeOperacion){
        $this-> mensajeOperacion = $mensajeOperacion;
        
    }

    public function __toString(){
        return "\n Dni: ". $this->getNroDni().
               "\n Apellido: ". $this->getApellido().
               "\n Nombre: ". $this->getNombre().
               "\n Fecha de nacimiento: ". $this->getFechaNac().
               "\n Número de teléfono: ". $this->getTelefono().
               "\n Domicilio: ". $this->getDomicilio();
    }

    public function setear($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio)    {
        $this->setNroDni($nroDni);
        $this->setApellido($apellido);
        $this->setNombre($nombre);
        $this->setFechaNac($fechaNac);
        $this->setTelefono($telefono);
        $this->setDomicilio($domicilio);
    }

    //cargar personas
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM persona WHERE NroDni = ".$this->getNroDni();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
                    
                }
            }
        } else {
            $this->setMensajeOperacion("Persona->listar: ".$base->getError());
        }
        return $resp;
    
    }

    //insertar personas
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();

        $dni = $this->getNroDni();
        $apell = $this->getApellido();
        $nom = $this->getNombre();
        $nac = $this->getFechaNac();
        $tel = $this->getTelefono();
        $dom = $this->getDomicilio();

        $sql = "INSERT INTO persona (NroDni, Apellido, Nombre, fechaNac, Telefono, Domicilio) VALUES ($dni, '$apell', '$nom', '$nac', '$tel', '$dom');";
        if ($base->Iniciar()) {
            if ($elDni = $base->Ejecutar($sql)) {
                $this->setNroDni($elDni);
                $resp = true;
            } else {
                $this->setMensajeOperacion("Persona->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Persona->insertar: ".$base->getError());
        }
        return $resp;
    }

    //modifica una persona
    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
    
        $sql = "UPDATE persona 
                SET Apellido = :Apellido, 
                    Nombre = :Nombre, 
                    fechaNac = :fechaNac, 
                    Telefono = :Telefono, 
                    Domicilio = :Domicilio 
                WHERE NroDni = :NroDni";
    
        if ($base->Iniciar()) {
            $stmt = $base->prepare($sql);
            $stmt->bindValue(':Apellido', $this->getApellido());
            $stmt->bindValue(':Nombre', $this->getNombre());
            $stmt->bindValue(':fechaNac', $this->getFechaNac());
            $stmt->bindValue(':Telefono', $this->getTelefono());
            $stmt->bindValue(':Domicilio', $this->getDomicilio());
            $stmt->bindValue(':NroDni', $this->getNroDni());
    
            if ($stmt->execute()) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Persona->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Persona->modificar: ".$base->getError());
        }
        return $resp;
    }

    //eliminar personas
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM persona WHERE NroDni=".$this->getNroDni();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("Persona->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Persona->eliminar: ".$base->getError());
        }
        return $resp;
    }

    //listar personas
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM persona ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while ($row = $base->Registro()){
                    $obj= new Persona();
                    $obj->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setMensajeOperacion("Persona->listar: ".$base->getError());
        }
 
        return $arreglo;
    }



}



?>