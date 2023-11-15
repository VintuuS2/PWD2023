<?php
class AbmRol{
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param ARRAY $param
     * @return Rol */
    private function cargarObjeto($param){
        $objRol = null;
        if (array_key_exists('rodescripcion',$param) ) {
            $objRol = new Rol();
            
            $objRol->setear(null, $param['rodescripcion']);
        }
        return $objRol;
    }
    
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param ARRAY $param
     * @return Rol */
    private function cargarObjetoConClave($param){
        $objRol = null;
        if (isset($param['idrol']) ){
            $objRol = new Rol();
            $objRol->setear($param['idrol'], null);
        }
        return $objRol;
    }
    
    /** Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param ARRAY $param
     * @return BOOLEAN */
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idrol']) ){
            $resp = true;
        return $resp;
    }
    }
    
    /**
     * @param ARRAY $param
     */
    public function alta($param){
        $resp = false;
        // $param['idrol'] = null;   ----Si no está en comentarios el código no funciona
        $objRol = $this->cargarObjeto($param);
        // verEstructura($objRol);
        if ($objRol!=null and $objRol->insertar()){
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
            $objRol = $this->cargarObjetoConClave($param);
            if ($objRol!=null and $objRol->eliminar()){
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
            $objRol = $this->cargarObjeto($param);
            if($objRol!=null and $objRol->modificar()){
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
        $objRol = new Rol();
        if ($param<>NULL){
            if  (isset($param['idrol']))
                $where.=" and idrol ='".$param['idrol']."'";
            if  (isset($param['rodescripcion']))
                $where.=" and rodescripcion ='".$param['rodescripcion']."'";
        }
        $arreglo = $objRol->listar($where);  
        return $arreglo;
    }
}
?>