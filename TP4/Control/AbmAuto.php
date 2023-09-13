<?php
class AbmAuto{
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param ARRAY $param
     * @return Auto */
    private function cargarObjeto($param){
        $objAuto = null;
        if (array_key_exists('Patente',$param) && array_key_exists('Marca',$param) && array_key_exists('Modelo',$param) && array_key_exists('DniDuenio',$param)) {
            $objAuto = new Auto();
            $objDuenio = new Persona();
            $objDuenio->setNroDni($param['DniDuenio']);
            $objDuenio->cargar();
            $objAuto->setear(strtoupper($param['Patente']), $param['Marca'], $param['Modelo'], $objDuenio);
        }
        return $objAuto;
    }
    
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param ARRAY $param
     * @return Auto */
    private function cargarObjetoConClave($param){
        $objAuto = null;
        if (isset($param['Patente']) ){
            $objAuto = new Auto();
            $objAuto->setear($param['Patente'], null, null, null);
        }
        return $objAuto;
    }
    
    /** Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param ARRAY $param
     * @return BOOLEAN */
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['NroDni']))
            $resp = true;
        return $resp;
    }
    
    /**
     * @param ARRAY $param
     */
    public function alta($param){
        $resp = false;
        // $param['Patente'] = null;   ----Si no está en comentarios el código no funciona
        $objAuto = $this->cargarObjeto($param);
        // verEstructura($objAuto);
        if ($objAuto!=null and $objAuto->insertar()){
            $resp = true;
        }
        return $resp;
    }
    /** Permite eliminar un objeto 
     * @param ARRAY $param
     * @return BOOLEAN */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $objAuto = $this->cargarObjetoConClave($param);
            if ($objAuto!=null and $objAuto->eliminar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    /** Permite modificar un objeto
     * @param ARRAY $param
     * @return BOOLEAN */
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $objAuto = $this->cargarObjeto($param);
            if($objAuto!=null and $objAuto->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    /** Permite buscar un objeto
     * @param ARRAY $param
     * @return ARRAY */
    public function buscar($param){
        $where = " true ";
        $objAuto = new Auto();
        if ($param<>NULL){
            if  (isset($param['Patente']))
                $where.=" and Patente ='".$param['Patente']."'";
            if  (isset($param['Marca']))
                $where.=" and Marca ='".$param['Marca']."'";
            if  (isset($param['Modelo']))
                $where.=" and Modelo ='".$param['Modelo']."'";
            if  (isset($param['DniDuenio']))
                $where.=" and DniDuenio =".$param['DniDuenio'];
        }
        $arreglo = $objAuto->listar($where);  
        return $arreglo;
    }
}
?>