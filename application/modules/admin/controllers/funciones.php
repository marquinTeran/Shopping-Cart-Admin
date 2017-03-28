<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Funciones extends CI_Controller
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
			$crud->set_table('funciones');
			$crud->set_subject('');
			$crud->set_relation('codigo_rol','rol','nombre');
			$crud->set_relation('codigo_menu','menu','nombre');
			$crud->display_as('codigo_menu', 'MENU');
			$crud->display_as('codigo_rol', 'ROL');
			$crud->required_fields('codigo_rol', 'codigo_menu');
#			$crud->unset_delete();
			$crud->unset_read();
			
			$output = $crud->render();
			

		  $data['title_for_layout'] = "ASIGNACION DE FUNCIONES";
		  $data['grocery'] = true;
		  $data['grocery_crud'] = $output;
		  $this->layout->view('core/Funciones', $data);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}
