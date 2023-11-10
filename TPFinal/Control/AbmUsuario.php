<?php
class AbmUsuario{
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param ARRAY $param
     * @return Usuario */
    private function cargarObjeto($param){
        $objUsuario = null;
        if (array_key_exists('idusuario',$param) && array_key_exists('usnombre',$param) && array_key_exists('uspass',$param) && array_key_exists('usmail',$param) && array_key_exists('usdeshabilitado',$param)) {
            $objUsuario = new Usuario();
            
            $objUsuario->setear($param['idusuario'], $param['usnombre'], $param['uspass'], $param['usmail'], $param['usdeshabilitado']);
        }
        return $objUsuario;
    }
    
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param ARRAY $param
     * @return Usuario */
    private function cargarObjetoConClave($param){
        $objUsuario = null;
        if (isset($param['idusuario']) ){
            $objUsuario = new Usuario();
            $objUsuario->setear($param['idusuario'], null, null, null, null);
        }
        return $objUsuario;
    }
    
    /** Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param ARRAY $param
     * @return BOOLEAN */
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idusuario']) ){
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
        $objUsuario = $this->cargarObjeto($param);
        // verEstructura($objUsuario);
        if ($objUsuario!=null and $objUsuario->insertar()){
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
            $objUsuario = $this->cargarObjetoConClave($param);
            if ($objUsuario!=null and $objUsuario->eliminar()){
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
            $objUsuario = $this->cargarObjetoConClave($param);
            if ($objUsuario!=null and $objUsuario->deshabilitar()){
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
            $objUsuario = $this->cargarObjetoConClave($param);
            if ($objUsuario!=null and $objUsuario->habilitar()){
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
            $objUsuario = $this->cargarObjeto($param);
            if($objUsuario!=null and $objUsuario->modificar()){
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
        $objUsuario = new Usuario();
        if ($param<>NULL){
            if  (isset($param['idusuario']))
                $where.=" and idusuario ='".$param['idusuario']."'";
            if  (isset($param['usnombre']))
                $where.=" and usnombre ='".$param['usnombre']."'";
            if  (isset($param['uspass']))
                $where.=" and uspass ='".$param['uspass']."'";
            if  (isset($param['usmail']))
                $where.=" and usmail ='".$param['usmail']."'";
            if  (isset($param['usdeshabilitado']))
                $where.=" and usdeshabilitado ='".$param['usdeshabilitado']."'";
        }
        $arreglo = $objUsuario->listar($where);
        return $arreglo;
    }

    public function listarUsuarioRol ($param){
        $arrayDeIds = array();
        $where = " true ";
        if ($param<>NULL){
            if (isset($param['idusuario']))
            $where.= " and idusuario = ". $param['idusuario'];
            if (isset($param['idrol']))
            $where.= " and idrol = ". $param['idrol']."'";
        }
        $obj = new UsuarioRol();

        $arreglo = $obj->listar($where);
        foreach ($arreglo as $usuario) {
            $idUsuarioActual = $usuario->getObjUsuario()->getId();
            $idRolActual = $usuario->getObjRol()->getIdRol();
        
            // Verificamos si ya existe una entrada para este usuario
            if (!array_key_exists($idUsuarioActual, $arrayDeIds)) {
                $arrayDeIds[$idUsuarioActual] = array();
            }
        
            // Agregamos el rol al usuario
            $arrayDeIds[$idUsuarioActual][] = $idRolActual;
        }
        return $arrayDeIds;
    }
}
?>