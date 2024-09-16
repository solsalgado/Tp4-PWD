<?php
include_once '../../modelo/persona.php';
class AbmPersona{

     /**
 * @param array $param
 * @return Persona|null
 */
private function cargarObjeto($param){
    $obj = null;
    //print_r($param);
    if (array_key_exists('NroDni', $param) &&
        array_key_exists('Apellido', $param) &&
        array_key_exists('Nombre', $param) &&
        array_key_exists('FechaNac', $param) &&
        array_key_exists('Telefono', $param) &&
        array_key_exists('Domicilio', $param)) {
        
        $obj = new Persona();
        
        $obj->setear(
            $param['NroDni'],
            $param['Apellido'],
            $param['Nombre'],
            $param['FechaNac'],
            $param['Telefono'],
            $param['Domicilio']
        );
    }
    
    return $obj;
}
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Persona
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['NroDni']) ){
            $obj = new Persona();
            $obj->setear($param['NroDni'], null,null,null,null,null);
        }
        return $obj;
    }
    
    /**
     * @param array $param
     * @return boolean
     */
    private function seteadosCamposClaves($param){
        $resp = false;
        
        if (isset($param['NroDni'], $param['Apellido'], $param['Nombre'], $param['FechaNac'], $param['Telefono'], $param['Domicilio'])){
            
            $resp = true;
        }
        return $resp;
    }

    /**
     * insertar personas
     * @param array $param
     */
    public function inserta($param){
        $resp = false;
        //print_r($param);
        //$param['NroDni'] = null;
        $elObjtPers = $this->cargarObjeto($param);
        
        //verEstructura($elObjtTabla);
        if ($elObjtPers!=null and $elObjtPers->insertar()){
            $resp = true;
        }
        return $resp;
        
    }


    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function elimina($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtPers = $this->cargarObjetoConClave($param);
            if ($elObjtPers!=null and $elObjtPers->eliminar()){
                $resp = true;
            }
        }
        
        return $resp;
    }
    
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modifica($param){
        //print_r($param);
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
           
            $elObjtPers = $this->cargarObjeto($param);
            
            if($elObjtPers!=null and $elObjtPers->modificar()){
                
                $resp = true;
            }
        }
        return $resp;
    }
    
    /**
     * permite buscar un objeto
     * @param array $param
     */
    public function buscar($param){
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['NroDni']))
                $where.=" and NroDni =".$param['NroDni'];
            
        }
        $arreglo = Persona::listar($where);  
        //print_r($arreglo);
        return $arreglo;
        
    }

}
?>