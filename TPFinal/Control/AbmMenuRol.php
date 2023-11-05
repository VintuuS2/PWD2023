<?php
class AbmMenuRol {
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param ARRAY $param
     * @return MenuRol */
    private function cargarObjeto($param){
        $objMenuRol = null;
        $objRol = null;
        $objMenuRol = null;

        if (array_key_exists('idmenu',$param) && $param['idmenu'] != null) {

            $objMenu = new Menu();
            $objMenu->setear($param['idmenu'],null,null,null,null);
        }

        if (array_key_exists('idrol',$param) && $param['idrol']!=null) {
            $objRol = new Rol();
            $objRol->setear($param['idrol'],null);
        }

        $objMenuRol = new MenuRol();
        $objMenuRol->setear($objMenu,$objRol);
        
        return $objMenuRol;
    }
    
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param ARRAY $param
     * @return MenuRol */

    private function cargarObjetoConClave($param){
        $objMenuRol = null;
        $objRol = null;
        $objMenu = null;

        if (isset($param['idmenu']) && isset($param['idrol']) ){
            if ($param['idmenu']!=null ) {
                $objMenu= new Menu();
                $objMenu->setear($param['idmenu'],null,null,null,null);
            }
            if ($param['idrol']!=null) {
                $objRol = new Rol();
                $objRol->setear($param['idrol'],null);
            }

            $objMenuRol = new MenuRol();
            $objMenuRol-> setear($objMenu,$objRol);
        }
        return $objMenuRol;
    }
    
    /** Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param ARRAY $param
     * @return BOOLEAN */
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idmenu']) && isset($param['idrol'])){
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
        // $param['idmenu'] = null;   ----Si no está en comentarios el código no funciona
        $objMenuRol = $this->cargarObjeto($param);
        // verEstructura($objMenuRol);
        if ($objMenuRol!=null and $objMenuRol->insertar()){
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
            $objMenuRol = $this->cargarObjetoConClave($param);
            if ($objMenuRol!=null and $objMenuRol->eliminar()){
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
            $objMenuRol = $this->cargarObjeto($param);
            if($objMenuRol!=null and $objMenuRol->modificar()){
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
        $objMenuRol = new MenuRol();
        if ($param<>NULL){
            if  (isset($param['idmenu'])){
                $where.=" and idmenu ='".$param['idmenu']."'";
            }
            if  (isset($param['idrol'])){
                $where.=" and idrol ='".$param['idrol']."'";
            }
        }
        $arreglo = $objMenuRol->listar($where);
        return $arreglo;
    }
}
?>