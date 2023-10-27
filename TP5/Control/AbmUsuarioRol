<?php
class AbmUsuarioRol{
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param ARRAY $param
     * @return UsuarioRol */
    private function cargarObjeto($param){
        $objUsuarioRol = null;
        if (array_key_exists('idusuario',$param) && array_key_exists('idrol',$param) ) {
            $objUsuarioRol = new UsuarioRol();
            $objUsuarioRol->setear(strtoupper($param['idusuario']), $param['idrol']);
        }
        return $objUsuarioRol;
    }
    
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param ARRAY $param
     * @return UsuarioRol */
    private function cargarObjetoConClave($param){
        $objUsuarioRol = null;
        if (isset($param['idusuario']) && isset($param['idrol']) ){
            $objUsuarioRol = new UsuarioRol();
            $objUsuarioRol->setear($param['idusuario'], $param['idrol']);
        }
        return $objUsuarioRol;
    }
    
    /** Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param ARRAY $param
     * @return BOOLEAN */
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idusuario']) && isset($param['idrol'])){
            $resp = true;
        return $resp;
    }
    }
    
    /**
     * @param ARRAY $param
     */
    public function alta($param){
        $resp = false;
        // $param['idusuario'] = null;   ----Si no está en comentarios el código no funciona
        // $param['idrol'] = null;   ----Si no está en comentarios el código no funciona
        $objUsuarioRol = $this->cargarObjeto($param);
        // verEstructura($objUsuarioRol);
        if ($objUsuarioRol!=null and $objUsuarioRol->insertar()){
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
            $objUsuarioRol = $this->cargarObjetoConClave($param);
            if ($objUsuarioRol!=null and $objUsuarioRol->eliminar()){
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
            $objUsuarioRol = $this->cargarObjeto($param);
            if($objUsuarioRol!=null and $objUsuarioRol->modificar()){
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
        $objUsuarioRol = new UsuarioRol();
        if ($param<>NULL){
            if  (isset($param['idusuario']))
                $where.=" and idusuario ='".$param['idusuario']."'";
            if  (isset($param['idrol']))
                $where.=" and idrol ='".$param['idrol']."'";
        }
        $arreglo = $objUsuarioRol->listar($where);  
        return $arreglo;
    }
}
?>