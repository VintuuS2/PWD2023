<?php
class AbmPersona{
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param ARRAY $param
     * @return Persona */
    private function cargarObjeto($param){
        $obj = null;
        if( array_key_exists('NroDni',$param) && array_key_exists('Nombre',$param) && array_key_exists('Apellido',$param) && array_key_exists('fechaNac',$param) && array_key_exists('Telefono',$param) && array_key_exists('Domicilio', $param)){
            $obj = new Persona();
            $obj->setear($param['NroDni'], $param['Nombre'], $param['Apellido'],$param['fechaNac'],$param['Telefono'],$param['Domicilio']);
        }
        return $obj;
    }
    
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param ARRAY $param
     * @return Persona */
    private function cargarObjetoConClave($param){
        $obj = null;
        if( isset($param['NroDni']) ){
            $obj = new Persona();
            $obj->setear($param['NroDni'], null, null, null, null, null);
        }
        return $obj;
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
        $param['NroDni'] =null;
        $elObjPersona = $this->cargarObjeto($param);
        //verEstructura($elObjtTabla);
        if ($elObjPersona!=null and $elObjPersona->insertar()){
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
            $elObjPersona = $this->cargarObjetoConClave($param);
            if ($elObjPersona!=null and $elObjPersona->eliminar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    /** Permite modificar un objeto
     * @param ARRAY $param
     * @return BOOLEAN  */
    public function modificacion($param){
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjPersona = $this->cargarObjeto($param);
            if($elObjPersona!=null and $elObjPersona->modificar()){
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
        $objPersona = new Persona();
        if ($param<>NULL){
            if  (isset($param['NroDni']))
                $where.=" and NroDni =".$param['NroDni'];
            if  (isset($param['Apellido']))
                 $where.=" and Apellido ='".$param['Apellido']."'";
            if  (isset($param['Nombre']))
                 $where.=" and Nombre ='".$param['Nombre']."'";
            if  (isset($param['fechaNac']))
                 $where.=" and fechaNac ='".$param['fechaNac']."'";
            if  (isset($param['Telefono']))
                 $where.=" and Telefono ='".$param['Telefono']."'";
            if  (isset($param['Domicilio']))
                 $where.=" and Domicilio ='".$param['Domicilio']."'";
        }
        $arreglo = $objPersona->listar($where);  
        return $arreglo;
    }
}
?>