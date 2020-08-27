<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Root_user extends MY_Controller
{
  public function __construct()
  {
      parent::__construct();

      // Force SSL
      //$this->force_ssl();
      $this->load->model('User_model', 'user');
      if( ! $this->verify_min_level(9)){
          redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
        }
      // Form and URL helpers always loaded (just for convenience)
      $this->load->helper('url');
      $this->load->helper('form');
  }


    public function index() {


     $this->is_logged_in();
        $this->load->view('header',["css"=>["panel"]]);
        $this->load->view('menu');
        $this->load->view('User/index');
        $this->load->view('footer',["js"=>[""]]);


      }

      public function eliminar() {
  			if( ! $this->verify_min_level(9)){
  				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
  			}
              $id = $this->input->post('id');
              $result = $this->user->eliminar($id);
                 if($result['code'] == 0){
                      echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
                    }
                  else{
                      echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
                    }
       		 }


      public function insertar() {
        $this->load->model('examples/examples_model');
        if( ! $this->verify_min_level(9)){
          redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
        }

        $config['upload_path']          = './include/img/user';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 70500;
        $config['max_width']            = 3500;
        $config['max_height']           = 11400;
        $this->load->library('upload', $config);
        ////
        if ( ! $this->upload->do_upload('files')) {
          $error = array('error' => $this->upload->display_errors());
          echo json_encode($error);
        } else {
            $data = json_decode($this->input->post('service_form'),true);


            $recovery_code = substr( $this->authentication->random_salt()
                . $this->authentication->random_salt()
                . $this->authentication->random_salt()
                . $this->authentication->random_salt(), 0, 72 );

            $data['passwd_verify_code'] = $this->authentication->hash_passwd($recovery_code);

            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $data['url_foto'] ="/include/img/user/".$file_name;
            $data['passwd']     = $this->authentication->hash_passwd($data['username'].$data['cedula']);
            $data['user_id']    = $this->examples_model->get_unused_id();
            $data['created_at'] = date('Y-m-d H:i:s');
            // If username is not used, it must be entered into the record as NULL
            $result = $this->user->insertar($data);
              if($result['code'] == 0){
                echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
              }
              else{
                echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
              }
            }
        }



      public function get_profile(){

        $data['profiles'] = $this->user->get_profiles();
        header('Content-Type: application/json');
        echo json_encode(['profiles' => $data['profiles']]);

      }
      public function gets_documento() {
              $id = $this->input->post('id');
              $data['documentos'] = $this->user->documentos_get($id);
              header('Content-Type: application/json');
              echo json_encode(['documentos' => $data['documentos']]);
           }
           public function editar() {
             if( ! $this->verify_min_level(9)){
               redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
             }
                 $data = json_decode($this->input->post('service_form'),true);
                 $result = $this->user->editar($data);

               if($result['code'] == 0){
                 echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
               }
               else{
                 echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
               }
             }
             public function editar_img() {
               if( ! $this->verify_min_level(9)){
                 redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
               }
             $config['upload_path']          = './include/img/user/';
             $config['allowed_types']        = 'jpg|png|jpeg';
             $config['max_size']             = 70500;
             $config['max_width']            = 20500;
             $config['max_height']           = 14000;
             $this->load->library('upload', $config);
             if ( ! $this->upload->do_upload('files')) {
               $error = array('error' => $this->upload->display_errors());
               echo json_encode($error);
             } else {
               $upload_data = $this->upload->data();
               $file_name = $upload_data['file_name'];
               $data = json_decode($this->input->post('service_form'),true);
               $data['url_foto'] ="/include/img/user/".$file_name;
               $result = $this->user->editar_img($data);
             if($result['code'] == 0){
               echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
             }
             else{
               echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
             }
           }
         }

            public function banear() {
             //  if ($this->session->userdata('is_authenticated') == FALSE) {
             //    echo json_encode(['status' => '403','message' => 'Permission Denied']);
             ///    return null;
             //  }
               $data = json_decode($this->input->post('service_form'),true);
             $result = $this->user->banear_a($data);
               if($result['code'] == 0){
                 echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
               }
               else{
                 echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
               }
             }


}
