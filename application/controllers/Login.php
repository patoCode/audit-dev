<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Login_model","login");
        $this->load->model('Rol_model','rol');
        $this->load->model('RolUsuario_model','roluser');
        $this->load->model('Privilegio_model','privilegio');
    }
    public function index($msg = null)
    {
        $data['msg'] = $msg;
        $this->load->view('login');
    }

    private function createMenu($roles)
    {
        $ids_privilegios = array();
        $bloques_menu = array();
        foreach ($roles as $_rol) {
            $privilegioList = $this->rol->getPrivilegio($_rol->ID_ROL);
            foreach ($privilegioList as $privilegio) {
                if(!in_array($privilegio->ID_PRIVILEGIO, $ids_privilegios)){
                    array_push($ids_privilegios, $privilegio->ID_PRIVILEGIO);
                }
            }
        }

        for ($i=0; $i < count($ids_privilegios); $i++) {
            $opcion = $this->privilegio->getPrivilegioBloque($ids_privilegios[$i]);

            $elemento = array('URI'=>$opcion->URI, 'nombre' => $opcion->PRIVILEGIO, 'orden' =>$opcion->ORDEN,'icono' => $opcion->ICONO);
            if(!array_key_exists($opcion->MENU."#".$opcion->MENU_ICONO, $bloques_menu))
            {
                $bloques_menu[$opcion->MENU."#".$opcion->MENU_ICONO] = array((object) $elemento);
            }else{
                array_push($bloques_menu[$opcion->MENU."#".$opcion->MENU_ICONO],(object) $elemento);
            }

        }
        return $bloques_menu;
    }
    public function checkLogin($bandera = null)
    {
        if($bandera == null){
            $usuario    = $this->input->post('username');
            $pass       = $this->input->post('password');
            $check_user = $this->login->login_user($usuario,$pass);
        }
        else{
            $check_user = $this->login->getUserById($this->session->userdata('id_usuario'));
        }

        if($check_user == TRUE)
        {
            $roles = $this->rol->getRolByUser($check_user->ID_USUARIO);
            $menu = $this->createMenu($roles);
            $data_session = array(
                            'is_logued_in' => TRUE,
                            'id_usuario'   => $check_user->ID_USUARIO,
                            'username'     => $check_user->USERNAME,
                            'photo'        =>$check_user->FOTO,
                            'menu'         => $menu
                         );
            $this->session->set_userdata($data_session);
            redirect('Dashboard/index','refresh');
        }
        else
        {

            $this->index("El usuario y/o contrase??a son incorrectos");
        }
    }
    private function _isNotificable($idUsuario)
    {
        $usuario = $this->roluser->getNotificable($idUsuario);
        if($usuario != null)
            return true;
        return false;
    }

    public function relogin()
    {
        $this->checkLogin(true);
        //TODO
    }

    public function logout()
    {
        $this->verificarLogOut();
        $this->session->sess_destroy();
        redirect(base_url(),'refresh');
    }
    public function verificarLogOut()
    {
    }
}
