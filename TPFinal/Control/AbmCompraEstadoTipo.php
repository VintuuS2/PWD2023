<?php
class AbmCompraEstadoTipo {
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param ARRAY $param
     * @return CompraEstadoTipo */
    private function cargarObjeto($param){
        $objCompraEstadoTipo = null;
        if (array_key_exists('idcompraestadotipo',$param) && array_key_exists('cetdescripcion',$param) && array_key_exists('cetdetalle',$param)) {
            $objCompraEstadoTipo = new CompraEstadoTipo();
            $objCompraEstadoTipo->setear($param['idcompraestadotipo'], $param['cetdescripcion'], $param['cetdetalle']);
        }
        return $objCompraEstadoTipo;
    }
    
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param ARRAY $param
     * @return CompraEstadoTipo */
    private function cargarObjetoConClave($param){
        $objCompraEstadoTipo = null;
        if (isset($param['idcompraestadotipo']) ){
            $objCompraEstadoTipo = new CompraEstadoTipo();
            $objCompraEstadoTipo->setear($param['idcompraestadotipo'], null, null);
        }
        return $objCompraEstadoTipo;
    }
    
    /** Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param ARRAY $param
     * @return BOOLEAN */
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idcompraestadotipo']) ){
            $resp = true;
        return $resp;
    }
    }
    
    /**
     * @param ARRAY $param
     */
    public function alta($param){
        $resp = false;
        // $param['idcompraestadotipo'] = null;   ----Si no está en comentarios el código no funciona
        $objCompraEstadoTipo = $this->cargarObjeto($param);
        // verEstructura($objCompraEstadoTipo);
        if ($objCompraEstadoTipo!=null and $objCompraEstadoTipo->insertar()){
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
            $objCompraEstadoTipo = $this->cargarObjetoConClave($param);
            if ($objCompraEstadoTipo!=null and $objCompraEstadoTipo->eliminar()){
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
            $objCompraEstadoTipo = $this->cargarObjeto($param);
            if($objCompraEstadoTipo!=null and $objCompraEstadoTipo->modificar()){
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
        $objCompraEstadoTipo = new CompraEstadoTipo();
        if ($param<>NULL){
            if  (isset($param['idcompraestadotipo']))
                $where.=" and idcompraestadotipo ='".$param['idcompraestadotipo']."'";
            if  (isset($param['cetdescripcion']))
                $where.=" and cetdescripcion ='".$param['cetdescripcion']."'";
            if  (isset($param['cetdetalle']))
                $where.=" and cetdetalle ='".$param['cetdetalle']."'";
        }
        $arreglo = $objCompraEstadoTipo->listar($where);
        return $arreglo;
    }
}
?>