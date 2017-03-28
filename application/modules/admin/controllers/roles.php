<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Roles extends CI_Controller
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
			$crud->set_table('rol');
			$crud->set_subject('');
			$crud->display_as('observacion', 'OBSERVACION');
			$crud->display_as('nombre', 'NOMBRE');
			$crud->required_fields('nombre');
			$crud->unique_fields('nombre');
      $crud->unset_delete();
			
			$output = $crud->render();
			
		  $data['title_for_layout'] = "ROLES DEL USUARIO";
		  $data['grocery'] = true;
		  $data['grocery_crud'] = $output;
		  $this->layout->view('core/Roles', $data);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}
