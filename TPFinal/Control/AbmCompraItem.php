<?php
class AbmCompraItem {
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param ARRAY $param
     * @return CompraItem */
    private function cargarObjeto($param){
        $objCompraItem = null;
        if (array_key_exists('idcompraitem',$param) && array_key_exists('idproducto',$param) && array_key_exists('idcompra',$param) && array_key_exists('cicantidad',$param)) {
            $objCompraItem = new CompraItem();
            $objProducto = null;
            $objCompra = null;
            if ($param['idproducto'] != null) {
                $objProducto = new Producto();
                $objProducto->setIdProducto($param['idproducto']);
                $objProducto->cargar();
            }
            if ($param['idcompra'] != null) {
                $objCompra = new Compra();
                $objCompra->setIdCompra($param['idcompra']);
                $objCompra->cargar();
            }
            $objCompraItem->setear($param['idcompraitem'], $objProducto, $objCompra, $param['cicantidad']);
        }
        return $objCompraItem;
    }
    
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param ARRAY $param
     * @return CompraItem */
    private function cargarObjetoConClave($param){
        $objCompraItem = null;
        if (isset($param['idcompraitem']) ){
            $objCompraItem = new CompraItem();
            $objCompraItem->setear($param['idcompraitem'], null, null, null);
        }
        return $objCompraItem;
    }
    
    /** Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param ARRAY $param
     * @return BOOLEAN */
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idcompraitem']) ){
            $resp = true;
        return $resp;
    }
    }
    
    /**
     * @param ARRAY $param
     */
    public function alta($param){
        $resp = false;
        // $param['idcompraitem'] = null;   ----Si no está en comentarios el código no funciona
        $objCompraItem = $this->cargarObjeto($param);
        // verEstructura($objCompraItem);
        if ($objCompraItem!=null and $objCompraItem->insertar()){
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
            $objCompraItem = $this->cargarObjetoConClave($param);
            if ($objCompraItem!=null and $objCompraItem->eliminar()){
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
            $objCompraItem = $this->cargarObjeto($param);
            if($objCompraItem!=null and $objCompraItem->modificar()){
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
        $objCompraItem = new CompraItem();
        if ($param<>NULL){
            if  (isset($param['idcompraitem']))
                $where.=" and idcompraitem ='".$param['idcompraitem']."'";
            if  (isset($param['idproducto']))
                $where.=" and idproducto ='".$param['idproducto']."'";
            if  (isset($param['idcompra']))
                $where.=" and idcompra ='".$param['idcompra']."'";
            if  (isset($param['cicantidad']))
                $where.=" and cicantidad ='".$param['cicantidad']."'";
        }
        $arreglo = $objCompraItem->listar($where);
        return $arreglo;
    }
}
?>