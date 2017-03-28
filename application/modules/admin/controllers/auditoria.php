<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auditoria extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
		
        $this->load->library('grocery_CRUD');
        $this->load->library('grocery_CRUD_extended');
        $this->layout->setLayout("admin/layout");
    }
    
	function index()
	{
		$this->load->view((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function show()
	{
		try{
			$crud = new grocery_CRUD_extended();

      $crud->unset_jquery();
      $crud->unset_jquery_ui();

			$crud->set_theme('flexigrid');
			$crud->set_table('auditoria');
			$crud->set_subject('');
			$crud->order_by('FECHA','desc');
      $crud->unset_delete();
      $crud->unset_edit();
      $crud->unset_add();
			
			$output = $crud->render();
			
		  $data['title_for_layout'] = "ROLES DEL USUARIO";
		  $data['grocery'] = true;
		  $data['grocery_crud'] = $output;
		  $this->layout->view('core/Auditoria', $data);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}
