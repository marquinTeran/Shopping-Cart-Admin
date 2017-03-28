<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create_sessions extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper('security');
        $this->layout->setLayout("admin/login");
        $this->load->model('Users', '', TRUE);
        $this->load->model('Api', '', TRUE);
    }
    
    function index()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
        
        if ($this->form_validation->run() == FALSE) {
		        $data['title_for_layout'] = "Ingreso al sistema";
		        $this->layout->view('Login', $data);
        } else {
            $data = array(
                'CODIGO_USUARIO' => $this->input->post('username'),
                'FECHA' => date("Y-m-d H:i:s"),
                'ACCION' => 'INGRESO',
                'ID_AFECTADO' => ''
            );
            $this->Api->insert_auditoria($data);
            redirect('admin/main_page', 'refresh');
        }
        
    }
    
    function check_database($password)
    {
        $username = $this->input->post('username');
        
        $result = $this->Users->login($username, $password);
        
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->codigo_usuarios,
                    'nombre' => $row->nombre,
                    'apellido' => $row->apellido,
                    'foto' => $row->imagen,
                    'rol' => $row->codigo_rol
                );
                $this->session->set_userdata('logged_in', $sess_array);
                $this->session->set_userdata('logged', true);
                $this->session->set_userdata('usuario', $row->codigo_usuarios);
                $this->session->set_userdata('rol', $row->codigo_rol);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', strtoupper('Username o password incorrectos'));
            return false;
        }
    }
}
