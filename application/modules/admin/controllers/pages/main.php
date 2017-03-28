<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller
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
			$crud->set_table('pageMain');
			$crud->set_subject('');
			$crud->field_type('tiene_boton', 'dropdown', array('1' => 'SI', '0' => 'NO'));
			$crud->set_field_upload('imagen','assets/admin/uploads/main');
			$crud->columns('titulo', 'subtitulo', 'orden', 'imagen');
			$crud->required_fields('titulo', 'imagen');

			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();
			
			$output = $crud->render();
			
		  $data['title_for_layout'] = "CONFIGURACION PAGINA INICIO";
		  $data['grocery'] = true;
		  $data['grocery_crud'] = $output;
		  $this->layout->view('pages/Main', $data);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}
