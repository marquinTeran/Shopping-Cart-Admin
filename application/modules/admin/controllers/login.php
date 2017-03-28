<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller {

    function __construct()
    {
        parent::__construct();
        $this->layout->setLayout("admin/login");
        $this->load->model("Api");
    }
    
	public function index()
	{
		  $data['title_for_layout'] = "Ingreso al sistema";
		  $this->layout->view('Login', $data);
	}

	function logout($id)
	{
		$data = array(
			'CODIGO_USUARIO' => $id ,
			'FECHA' => date("Y-m-d H:i:s") ,
			'ACCION' => 'SALIO',
			'ID_AFECTADO' => ''
		);

		$this->Api->insert_auditoria($data);
		
		$datasession = array('logged_in' => '', 'logged' => '', 'usuario' => '', 'rol'=>'');
		$this->session->unset_userdata($datasession);
		$this->session->sess_destroy();
		redirect('admin/login', 'refresh');
	}
}
