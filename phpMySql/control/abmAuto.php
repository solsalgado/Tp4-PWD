<?php
include_once '../../modelo/auto.php';

class AbmAuto{

       /**
     * @param array $param
     * @return Auto
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if(array_key_exists('Patente', $param) &&
           array_key_exists('Marca', $param) &&
           array_key_exists('Modelo', $param) &&
           array_key_exists('DniDuenio', $param)){

            $obj = new Auto();

            $obj->setear($param['Patente'], $param['Marca'], $param['Modelo'], $param['DniDuenio']);
        }
        return $obj;
    }
    
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Auto
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['Patente']) ){
            $obj = new Auto();
            $obj->setear($param['Patente'], null,null,null);
        }
        return $obj;
    }
    
    
    /**
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        //print_r($param);
        $resp = false;
        if (isset($param['Patente'],$param['Marca'], $param['Modelo'] , $param['DniDuenio']))
            $resp = true;
        return $resp;
    }
    
    /**
     * insertar autos
     * @param array $param
     */
    public function inserta($param){
        $resp = false;
        //$param['Patente'] =null;
        $elObjtAuto = $this->cargarObjeto($param);
        //verEstructura($elObjtTabla);
        if ($elObjtAuto!=null and $elObjtAuto->insertar()){
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
            $elObjtAuto = $this->cargarObjetoConClave($param);
            if ($elObjtAuto!=null and $elObjtAuto->eliminar()){
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
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtAuto = $this->cargarObjeto($param);
            if($elObjtAuto!=null and $elObjtAuto->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function buscar($param){
        $where = " true ";
        
        if ($param <> null) {
            if (isset($param['Patente'])) {  
                $where .= " and Patente = '" . $param['Patente'] . "'";
            }
        }
        $arreglo = Auto::listar($where);
        //print_r($arreglo);
        return $arreglo;
    }

}
?>