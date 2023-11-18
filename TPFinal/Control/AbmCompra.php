<?php
class AbmCompra {
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param ARRAY $param
     * @return Compra */
    private function cargarObjeto($param){
        $objCompra = null;
        if (array_key_exists('idcompra',$param) && array_key_exists('cofecha',$param) && array_key_exists('idusuario',$param)) {
            $objCompra = new Compra();
            $objUsuario = null;
            if ($param['idusuario'] != null) {
                $objUsuario = new Usuario();
                $objUsuario->setId($param['idusuario']);
                $objUsuario->cargar();
            }
            $objCompra->setear($param['idcompra'], $param['cofecha'], $objUsuario);
        }
        return $objCompra;
    }
    
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param ARRAY $param
     * @return Compra */
    private function cargarObjetoConClave($param){
        $objUsuario = null;
        if (isset($param['idcompra']) ){
            $objUsuario = new Compra();
            $objUsuario->setear($param['idcompra'], null, null);
        }
        return $objUsuario;
    }
    
    /** Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param ARRAY $param
     * @return BOOLEAN */
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idcompra']) ){
            $resp = true;
        return $resp;
    }
    }
    
    /**
     * @param ARRAY $param
     */
    public function alta($param){
        $resp = false;
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fecha = date('Y-m-d H:i:s');
        $param['cofecha'] = $fecha;
        // $param['idcompra'] = null;   ----Si no está en comentarios el código no funciona
        $objCompra = $this->cargarObjeto($param);
        // verEstructura($objCompra);
        if ($objCompra!=null and $objCompra->insertar()){
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
            $objCompra = $this->cargarObjetoConClave($param);
            if ($objCompra!=null and $objCompra->eliminar()){
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
            $objCompra = $this->cargarObjeto($param);
            if($objCompra!=null and $objCompra->modificar()){
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
        $objCompra = new Compra();
        if ($param<>NULL){
            if  (isset($param['idcompra']))
                $where.=" and idcompra ='".$param['idcompra']."'";
            if  (isset($param['cofecha']))
                $where.=" and cofecha ='".$param['cofecha']."'";
            if  (isset($param['idusuario']))
                $where.=" and idusuario ='".$param['idusuario']."'";
        }
        $arreglo = $objCompra->listar($where);
        return $arreglo;
    }
}
?>