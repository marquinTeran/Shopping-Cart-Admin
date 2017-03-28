<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Icons extends MX_Controller {

    function __construct()
    {
        parent::__construct();
        $this->layout->setLayout("admin/layout");
    }
    
	  public function index()
	  {
		    $data['title_for_layout'] = "Iconos del Sistema";
		    $this->layout->view('core/Icons', $data);
	  }
}
