<?php
class AbmUsuarioRol{
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param ARRAY $param
     * @return UsuarioRol */
    private function cargarObjeto($param){

        $objUsuarioRol = null;
        $objRol = null;
        $objUsuario = null;

        if (array_key_exists('idusuario',$param) && $param['idusuario']!=null ) {
            $objUsuario= new Usuario();
            $objUsuario->setear($param['idusuario'],null,null,null,null);
        }
        if (array_key_exists('idrol',$param) && $param['idrol']!=null) {
            $objRol = new Rol();
            $objRol->setear($param['idrol'],null);
        }
        
        $objUsuarioRol = new UsuarioRol();
        $objUsuarioRol-> setear($objUsuario,$objRol);

        return $objUsuarioRol;
    }
    
    /** Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param ARRAY $param
     * @return UsuarioRol */
    private function cargarObjetoConClave($param){
        $objUsuarioRol = null;
        $objRol = null;
        $objUsuario = null;

        if (isset($param['idusuario']) && isset($param['idrol']) ){
            if ($param['idusuario']!=null ) {
                $objUsuario= new Usuario();
                $objUsuario->setear($param['idusuario'],null,null,null,null);
            }
            if ($param['idrol']!=null) {
                $objRol = new Rol();
                $objRol->setear($param['idrol'],null);
            }

            $objUsuarioRol = new UsuarioRol();
            $objUsuarioRol-> setear($objUsuario,$objRol);
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
            if  (isset($param['idusuario'])){
                $where.=" and idusuario =".$param['idusuario'];
            }
            if  (isset($param['idrol'])){
                $where.=" and idrol =".$param['idrol'];
            }
        }
        $arreglo = $objUsuarioRol->listar($where);  
        return $arreglo;
    }

    /*public function listarRolesUsuarios(){
        $controlUsuario = new AbmUsuario();
        $listaUsuarios = $controlUsuario->buscar(null);
        $usuarioRol = $this->buscar(null);
        $roles = "";
        print_r ($usuarioRol);
        //$listaUsuariosConRol = $usuarioRol->listar(null);
        //print_r ($listaUsuariosConRol);
        if(count($listaUsuarios)>0){
            foreach ($listaUsuarios as $usuario){
                $roles .= $usuarioRol[];
                print_r($roles);
            }
        }   
        //porsi no hay usuarios
        else{}
    }*/
}
?>