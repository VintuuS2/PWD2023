<?php
class AbmCompraEstado {
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param ARRAY $param
     * @return CompraEstado */
    private function cargarObjeto($param){
        $objCompraEstado = null;
        if (array_key_exists('idcompraestado',$param) && array_key_exists('idcompra',$param) && array_key_exists('idcompraestadotipo',$param) && array_key_exists('cefechaini',$param) && array_key_exists('cefechafin',$param)) {
            $objCompraEstado = new CompraEstado();
            $objCompra = null;
            $objCompraEstadoTipo = null;
            if ($param['idcompra'] != null) {
                $objCompra = new Compra();
                $objCompra->setIdCompra($param['idcompra']);
                $objCompra->cargar();
            }
            if ($param['idcompraestadotipo'] != null) {
                $objCompraEstadoTipo = new CompraEstadoTipo();
                $objCompraEstadoTipo->setIdCompraEstadoTipo($param['idcompraestadotipo']);
                $objCompraEstadoTipo->cargar();
            }
            $objCompraEstado->setear($param['idcompraestado'], $objCompra, $objCompraEstadoTipo, $param['cefechaini'], $param['cefechafin']);
        }
        return $objCompraEstado;
    }
    
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param ARRAY $param
     * @return CompraEstado */
    private function cargarObjetoConClave($param){
        $objCompraEstado = null;
        if (isset($param['idcompraestado']) ){
            $objCompraEstado = new CompraEstado();
            $objCompraEstado->setear($param['idcompraestado'], null, null, null, null);
        }
        return $objCompraEstado;
    }
    
    /** Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param ARRAY $param
     * @return BOOLEAN */
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idcompraestado']) ){
            $resp = true;
        return $resp;
    }
    }
    
    /**
     * @param ARRAY $param
     */
    public function alta($param){
        $resp = false;
        // $param['idcompraestado'] = null;   ----Si no está en comentarios el código no funciona
        $objCompraEstado = $this->cargarObjeto($param);
        // verEstructura($objCompraEstado);
        if ($objCompraEstado!=null and $objCompraEstado->insertar()){
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
            $objCompraEstado = $this->cargarObjetoConClave($param);
            if ($objCompraEstado!=null and $objCompraEstado->eliminar()){
                $resp = true;
            }
        }
        return $resp;
    }

    /** Permite finalizar un objeto 
     * @param ARRAY $param
     * @return BOOLEAN */
    public function finalizar($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $objCompraEstado = $this->cargarObjetoConClave($param);
            if ($objCompraEstado!=null and $objCompraEstado->finalizar()){
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
            $objCompraEstado = $this->cargarObjeto($param);
            if($objCompraEstado!=null and $objCompraEstado->modificar()){
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
        $objCompraEstado = new CompraEstado();
        if ($param<>NULL){
            if  (isset($param['idcompraestado']))
                $where.=" and idcompraestado ='".$param['idcompraestado']."'";
            if  (isset($param['idcompra']))
                $where.=" and idcompra ='".$param['idcompra']."'";
            if  (isset($param['idcompraestadotipo']))
                $where.=" and idcompraestadotipo ='".$param['idcompraestadotipo']."'";
            if  (isset($param['cefechaini']))
                $where.=" and cefechaini ='".$param['cefechaini']."'";
            if  (isset($param['cefechafin']))
                $where.=" and cefechafin ='".$param['cefechafin']."'";
        }
        $arreglo = $objCompraEstado->listar($where);
        return $arreglo;
    }
}
?>