<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
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
			$crud->set_table('usuarios');
			$crud->set_subject('');
			$crud->change_field_type('clave','password');
			$crud->set_relation('codigo_rol','rol','nombre');
			$crud->columns('codigo_usuarios', 'nombre', 'apellido', 'codigo_rol' , 'estado');
			$crud->display_as('codigo_usuarios', 'USERNAME');
			$crud->display_as('nombre', 'NOMBRE');
			$crud->display_as('apellido', 'APELLIDO');
			$crud->display_as('estado', 'ESTADO');
			$crud->display_as('clave', 'PASSWORD');
			$crud->display_as('codigo_rol', 'ROL');
			$crud->display_as('imagen', 'IMAGEN PERFIL');
			$crud->set_field_upload('imagen','assets/admin/uploads/profiles');
			$crud->required_fields('codigo_usuarios', 'nombre', 'apellido', 'estado', 'clave', 'codigo_rol');
			$crud->unique_fields('codigo_usuarios');
		  $crud->callback_before_insert(array($this,'encrypt_password_callback'));
		  $crud->callback_before_update(array($this,'encrypt_password_callback'));
      $crud->unset_delete();
			
			$output = $crud->render();
			
		  $data['title_for_layout'] = "USUARIOS";
		  $data['grocery'] = true;
		  $data['grocery_crud'] = $output;
		  $this->layout->view('core/Users', $data);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function profile($accion, $usuario)
	{
		try{
			$crud = new grocery_CRUD_extended();

      $crud->unset_jquery();
      $crud->unset_jquery_ui();

			$crud->set_theme('flexigrid');
			$crud->set_table('usuarios');
			$crud->set_subject('');
			$crud->change_field_type('clave','password');
			$crud->change_field_type('codigo_rol','hidden');
			$crud->change_field_type('estado','hidden');
			$crud->change_field_type('clave','hidden');
			$crud->columns('codigo_usuarios', 'nombre', 'apellido', 'estado');
			$crud->display_as('codigo_usuarios', 'USERNAME');
			$crud->display_as('nombre', 'NOMBRE');
			$crud->display_as('apellido', 'APELLIDO');
			$crud->display_as('estado', 'ESTADO');
			$crud->display_as('clave', 'PASSWORD');
			$crud->display_as('imagen', 'IMAGEN PERFIL');
			$crud->set_field_upload('imagen','assets/admin/uploads/profiles');
			$crud->required_fields('codigo_usuarios', 'nombre', 'apellido', 'estado', 'clave');
			$crud->unique_fields('codigo_usuarios');
      $crud->callback_before_insert(array($this,'encrypt_password_callback'));
      #$crud->callback_before_update(array($this,'encrypt_password_callback'));
      $crud->unset_delete();
      $crud->unset_back_to_list();
      $output = $crud->render();


		  $data['title_for_layout'] = "PERFIL DE USUARIO";
		  $data['grocery'] = true;
		  $data['grocery_crud'] = $output;
		  $this->layout->view('core/Profile', $data);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function change_password($accion, $usuario)
	{
		$user_login = $this->session->userdata('logged_in');

		if($user_login['id'] != $usuario){
			redirect('error_404', 'refresh');
		}

		try{
			$crud = new grocery_CRUD_extended();

      $crud->unset_jquery();
      $crud->unset_jquery_ui();

			$crud->set_theme('flexigrid');
			$crud->set_table('usuarios');
			$crud->set_subject('');
		  $crud->fields('clave', 'clave');
			$crud->change_field_type('clave','password');
			$crud->change_field_type('clave','password');
			$crud->display_as('clave', 'PASSWORD');
			$crud->required_fields('clave', 'clave');
			$crud->display_as('clave', 'REPETIR PASSWORD');
			$crud->callback_edit_field('clave',array($this,'set_password_input_to_empty'));
		  $crud->callback_before_update(array($this,'encrypt_password_callback'));
			$crud->unset_back_to_list();
		  $output = $crud->render();

		  $data['title_for_layout'] = "PERFIL DE USUARIO";
		  $data['grocery'] = true;
		  $data['grocery_crud'] = $output;
		  $this->layout->view('core/Change_password', $data);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function encrypt_password_callback($post_array, $primary_key = null)
	{
	    $this->load->helper('security');
	    $post_array['clave'] = do_hash($post_array['clave'], 'md5');
	    return $post_array;
	}

	function set_password_input_to_empty() 
	{
		return "<input type='password' name='clave' value='' />";
	}
    
}
