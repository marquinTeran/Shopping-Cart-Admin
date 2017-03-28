<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller
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
			$crud->set_table('menu');
			$crud->set_subject('');
			$crud->display_as('codigo_menu', 'CODIGO');
			$crud->display_as('nombre', 'NOMBRE');
			$crud->display_as('url', 'URL');
			$crud->display_as('tipo', 'TIPO DEL MENU');
			$crud->required_fields('nombre', 'codigo_menu', 'tipo');
			$crud->field_type('tipo','dropdown', array('M' => 'MENU PADRE', 'S' => 'SUBMENU'));
			$crud->unique_fields('nombre');
			$crud->order_by('codigo_menu','asc');
#      $crud->unset_delete();
      $crud->unset_read();
			
			$output = $crud->render();
			
		  $data['title_for_layout'] = "CREACION DE MENUS";
		  $data['grocery'] = true;
		  $data['grocery_crud'] = $output;
		  $this->layout->view('core/Menu', $data);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}
