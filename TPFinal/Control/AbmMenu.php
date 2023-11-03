<?php
class AbmMenu{
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param ARRAY $param
     * @return Menu */
    private function cargarObjeto($param){
        $objMenu = null;
        if (array_key_exists('idmenu',$param) && array_key_exists('menombre',$param) && array_key_exists('medescripcion',$param) && array_key_exists('idpadre',$param) && array_key_exists('medeshabilitado',$param)) {
            $objMenu = new Menu();
            
            $objMenu->setear(strtoupper($param['idmenu']), $param['menombre'], $param['medescripcion'], $param['idpadre'], $param['medeshabilitado']);
        }
        return $objMenu;
    }
    
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param ARRAY $param
     * @return Menu */
    private function cargarObjetoConClave($param){
        $objMenu = null;
        if (isset($param['idmenu']) ){
            $objMenu = new Menu();
            $objMenu->setear($param['idmenu'], null, null, null, null);
        }
        return $objMenu;
    }
    
    /** Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param ARRAY $param
     * @return BOOLEAN */
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idmenu']) ){
            $resp = true;
        return $resp;
    }
    }
    
    /**
     * @param ARRAY $param
     */
    public function alta($param){
        $resp = false;
        // $param['idmenu'] = null;   ----Si no está en comentarios el código no funciona
        $objMenu = $this->cargarObjeto($param);
        // verEstructura($objMenu);
        if ($objMenu!=null and $objMenu->insertar()){
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
            $objMenu = $this->cargarObjetoConClave($param);
            if ($objMenu!=null and $objMenu->eliminar()){
                $resp = true;
            }
        }
        return $resp;
    }

    /** Permite deshabilitar un objeto 
     * @param ARRAY $param
     * @return BOOLEAN */
    public function deshabilitar($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $objMenu = $this->cargarObjetoConClave($param);
            if ($objMenu!=null and $objMenu->deshabilitar()){
                $resp = true;
            }
        }
        return $resp;
    }

    /** Permite habilitar un objeto 
     * @param ARRAY $param
     * @return BOOLEAN */
    public function habilitar($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $objMenu = $this->cargarObjetoConClave($param);
            if ($objMenu!=null and $objMenu->habilitar()){
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
            $objMenu = $this->cargarObjeto($param);
            if($objMenu!=null and $objMenu->modificar()){
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
        $objMenu = new Menu();
        if ($param<>NULL){
            if  (isset($param['idmenu']))
                $where.=" and idmenu ='".$param['idmenu']."'";
            if  (isset($param['menombre']))
                $where.=" and menombre ='".$param['menombre']."'";
            if  (isset($param['medescripcion']))
                $where.=" and medescripcion ='".$param['medescripcion']."'";
            if  (isset($param['idpadre']))
                $where.=" and idpadre ='".$param['idpadre']."'";
            if  (isset($param['medeshabilitado']))
                $where.=" and medeshabilitado ='".$param['medeshabilitado']."'";
        }
        $arreglo = $objMenu->listar($where);
        return $arreglo;
    }
}
?>