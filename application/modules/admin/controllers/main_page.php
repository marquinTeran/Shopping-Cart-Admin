<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_page extends MX_Controller {

    function __construct()
    {
        parent::__construct();
        $this->layout->setLayout("admin/layout");
    }
    
	  public function index()
	  {
		    $data['title_for_layout'] = "Administracion del sitio";
		    $this->layout->view('core/Main_page', $data);
	  }
}
