<?php defined('BASEPATH') or exit('No direct script access allowed');
class User extends MY_Controller{
  public function __construct()
  {
      parent::__construct();

      // Force SSL
      //$this->force_ssl();
      $this->load->model('User_model', 'user');
      if( ! $this->verify_min_level(1)){
          redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));

        }
      // Form and URL helpers always loaded (just for convenience)
      $this->load->helper('url');
      $this->load->helper('form');
  }

    // -----------------------------------------------------------------------

    /**
     * Demonstrate being redirected to login.
     * If you are logged in and request this method,
     * you'll see the message, otherwise you will be
     * shown the login form. Once login is achieved,
     * you will be redirected back to this method.
     */
    public function index() {
        $this->is_logged_in();
        $this->load->view('header',["css"=>["panel"]]);
        $this->load->view('menu');
        $this->load->view('User/profile');
        $this->load->view('footer',["js"=>["vue/panel"]]);
      }
      public function foto() {
        $config['upload_path']          = './include/img/user';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 750000;
        $config['max_width']            = 250000;
        $config['max_height']           = 140000;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file')) {
          $error = array('error' => $this->upload->display_errors());
          echo json_encode($error);
        } else {
            $upload_data = $this->upload->data();
          $file_name = $upload_data['file_name'];
          $data['url_foto'] ="include/img/user/".$file_name;
          $data['user_id'] = $this->auth_user_id;;
          $rut=$this->user->foto($data);
          echo json_encode(['status' => '201', 'message' => 'Imagen creada exitosamente']);
        }
      }
      public function get_profile(){

        $id=$this->auth_user_id;
        $data['profiles'] = $this->user->get_profile($id);
        header('Content-Type: application/json');
        echo json_encode(['profiles' => $data['profiles']]);

      }
           public function editarp() {
       		    $data = json_decode($this->input->post('service_form'),true);
       			$result = $this->user->editarp($data);
       				if($result['code'] == 0){
       					echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
       				}
       				else{
       					echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
       				}
       			}

}
