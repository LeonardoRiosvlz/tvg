<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cotizador extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('Cargos_model', 'cargos');
	  }
    public function index() {
			if( ! $this->verify_min_level(9)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Cotizador/index');
        $this->load->view('footer',["js"=>[""]]);
      }

}
