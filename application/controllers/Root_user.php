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
      if( ! $this->verify_min_level(6)){
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
  			if( ! $this->verify_min_level(6)){
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
        if( ! $this->verify_min_level(6)){
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
            $data['username']=ucwords ($data['username']);

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
            $clave=$data['username'].$data['cedula'];
            $clave=  ucwords ($clave);
            $data['created_at'] = date('Y-m-d H:i:s');
            // If username is not used, it must be entered into the record as NULL
            $result = $this->user->insertar($data);
              if($result['code'] == 0){
                $this->load->library('email');
                $config = array(
                 'protocol' => 'smtp',
                 'smtp_host' => 'gator4124.hostgator.com',
                 'smtp_user' => 'info@luzguerrera.com', //Su Correo de Gmail Aqui
                 'smtp_pass' => 'Alfayomega', // Su Password de Gmail aqui
                 'smtp_port' => 465,
                 'smtp_crypto' => 'ssl',
                 'mailtype' => 'html',
                 'wordwrap' => TRUE,
                 'charset' => 'utf-8'
                 );
                 $this->email->initialize($config);
                 $this->email->from('info@luzguerrera.com');
                 $this->email->to($data['email']);
                 $this->email->subject( "Bienvenido a TVG Cargos");
                 $this->email->message('
                 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                 <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

                 <head>
                     <meta charset="UTF-8">
                     <meta content="width=device-width, initial-scale=1" name="viewport">
                     <meta name="x-apple-disable-message-reformatting">
                     <meta http-equiv="X-UA-Compatible" content="IE=edge">
                     <meta content="telephone=no" name="format-detection">
                     <title></title>
                     <!--[if (mso 16)]>
                     <style type="text/css">
                     a {text-decoration: none;}
                     </style>
                     <![endif]-->
                     <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
                     <!--[if gte mso 9]>
                 <xml>
                     <o:OfficeDocumentSettings>
                     <o:AllowPNG></o:AllowPNG>
                     <o:PixelsPerInch>96</o:PixelsPerInch>
                     </o:OfficeDocumentSettings>
                 </xml>
                 <![endif]-->
                 </head>

                 <body>
                     <div class="es-wrapper-color">
                         <!--[if gte mso 9]>
                      <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                        <v:fill type="tile" color="#f6f6f6"></v:fill>
                      </v:background>
                    <![endif]-->
                         <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
                             <tbody>
                                 <tr>
                                     <td class="esd-email-paddings" valign="top">
                                         <table class="es-content es-preheader esd-header-popover" cellspacing="0" cellpadding="0" align="center">
                                             <tbody>
                                                 <tr>
                                                     <td class="es-adaptive esd-stripe" align="center">
                                                         <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" align="center">
                                                             <tbody>
                                                                 <tr>
                                                                     <td class="esd-structure es-p10t es-p10b es-p20r es-p20l" align="left">
                                                                         <!--[if mso]><table width="560"><tr><td width="268" valign="top"><![endif]-->
                                                                         <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                                                             <tbody>
                                                                                 <tr>
                                                                                     <td class="esd-container-frame" width="268" align="left">
                                                                                         <table width="100%" cellspacing="0" cellpadding="0">
                                                                                             <tbody>
                                                                                                 <tr>
                                                                                                     <td class="es-infoblock esd-block-text es-m-txt-c" align="left">
                                                                                                         <p>TVGCARGOS S.A.S</p>
                                                                                                     </td>
                                                                                                 </tr>
                                                                                             </tbody>
                                                                                         </table>
                                                                                     </td>
                                                                                 </tr>
                                                                             </tbody>
                                                                         </table>
                                                                         <!--[if mso]></td><td width="20"></td><td width="272" valign="top"><![endif]-->
                                                                         <table class="es-right" cellspacing="0" cellpadding="0" align="right">
                                                                             <tbody>
                                                                                 <tr>
                                                                                     <td class="esd-container-frame" width="272" align="left">
                                                                                         <table width="100%" cellspacing="0" cellpadding="0">
                                                                                             <tbody>
                                                                                                 <tr>
                                                                                                     <td class="es-infoblock esd-block-text es-m-txt-c" align="right">
                                                                                                         <p><em><strong>SUS ENVÍOS FÁCILES Y RÁPIDOS SEGUROS Y A TIEMPO</strong></em><br></p>
                                                                                                     </td>
                                                                                                 </tr>
                                                                                             </tbody>
                                                                                         </table>
                                                                                     </td>
                                                                                 </tr>
                                                                             </tbody>
                                                                         </table>
                                                                         <!--[if mso]></td></tr></table><![endif]-->
                                                                     </td>
                                                                 </tr>
                                                             </tbody>
                                                         </table>
                                                     </td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                         <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                                             <tbody>
                                                 <tr></tr>
                                                 <tr>
                                                     <td class="es-adaptive esd-stripe" align="center">
                                                         <table class="es-header-body" width="600" cellspacing="0" cellpadding="0" align="center">
                                                             <tbody>
                                                                 <tr>
                                                                     <td class="esd-structure es-p15t es-p20b es-p20r es-p20l" style="background-color: #ffffff;" bgcolor="#ffffff" align="left">
                                                                         <!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="174" valign="top"><![endif]-->
                                                                         <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                                                             <tbody>
                                                                                 <tr>
                                                                                     <td class="es-m-p0r esd-container-frame" width="174" valign="top" align="center">
                                                                                         <table width="100%" cellspacing="0" cellpadding="0">
                                                                                             <tbody>
                                                                                                 <tr>
                                                                                                     <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://tvgcargo.com/wp-content/uploads/2017/01/tvg-cargo-logo.png" alt style="display: block;" width="162"></a></td>
                                                                                                 </tr>
                                                                                             </tbody>
                                                                                         </table>
                                                                                     </td>
                                                                                 </tr>
                                                                             </tbody>
                                                                         </table>
                                                                         <!--[if mso]></td><td width="20"></td><td width="366" valign="top"><![endif]-->
                                                                         <table cellspacing="0" cellpadding="0" align="right">
                                                                             <tbody>
                                                                                 <tr>
                                                                                     <td class="esd-container-frame" width="366" align="left">
                                                                                         <table style="border-left:2px solid #808080;border-right:2px solid #808080;border-top:2px solid #808080;border-bottom:2px solid #808080;" width="100%" cellspacing="0" cellpadding="0">
                                                                                             <tbody>
                                                                                                 <tr>
                                                                                                     <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://tvgcargo.com/wp-content/uploads/2017/01/transporte-por-avion-mercancia.jpg" alt style="display: block;" width="362"></a></td>
                                                                                                 </tr>
                                                                                             </tbody>
                                                                                         </table>
                                                                                     </td>
                                                                                 </tr>
                                                                             </tbody>
                                                                         </table>
                                                                         <!--[if mso]></td></tr></table><![endif]-->
                                                                     </td>
                                                                 </tr>
                                                             </tbody>
                                                         </table>
                                                     </td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                         <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                                             <tbody>
                                                 <tr>
                                                     <td class="esd-stripe" align="center">
                                                         <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                                             <tbody>
                                                                 <tr>
                                                                     <td class="esd-structure es-p30t es-p20r es-p20l" align="left">
                                                                         <table width="100%" cellspacing="0" cellpadding="0">
                                                                             <tbody>
                                                                                 <tr>
                                                                                     <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                                         <table width="100%" cellspacing="0" cellpadding="0">
                                                                                             <tbody>
                                                                                                 <tr>
                                                                                                     <td class="esd-block-text es-p5b" align="left">
                                                                                                         <h2>Bienvenido '.$data['nombre'].' al sistema tvg TVGCARGO S.A.S</h2>
                                                                                                     </td>
                                                                                                 </tr>
                                                                                                 <tr>
                                                                                                     <td class="esd-block-text es-p5b" align="left">
                                                                                                         <h2>Puede acceder al sisteme usando tu correo: '.$data['email'].' o  tu nickname: '.$data['username'].'</h2>
                                                                                                     </td>
                                                                                                 </tr>
                                                                                                 <tr>
                                                                                                     <td class="esd-block-text es-m-txt-c es-p10b" align="left">
                                                                                                         <p style="color: #333333;">Contraseña'.$clave.'</p>
                                                                                                     </td>
                                                                                                 </tr>
                                                                                             </tbody>
                                                                                         </table>
                                                                                     </td>
                                                                                 </tr>
                                                                             </tbody>
                                                                         </table>
                                                                     </td>
                                                                 </tr>
                                                             </tbody>
                                                         </table>
                                                     </td>
                                                 </tr>
                                             </tbody>
                                         </table>

                                         <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                                             <tbody>
                                                 <tr>
                                                     <td class="esd-stripe" align="center">
                                                         <table class="es-content-body" style="background-color: #ffffff;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                                             <tbody>
                                                                 <tr>
                                                                     <td class="esd-structure" align="left">
                                                                         <table width="100%" cellspacing="0" cellpadding="0">
                                                                             <tbody>
                                                                                 <tr>
                                                                                     <td class="esd-container-frame" width="600" valign="top" align="center">
                                                                                         <table width="100%" cellspacing="0" cellpadding="0">
                                                                                             <tbody>
                                                                                                 <tr>
                                                                                                     <td class="esd-block-spacer es-p40b es-p40r es-p40l" align="center" style="font-size:0">
                                                                                                         <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                             <tbody>
                                                                                                                 <tr>
                                                                                                                     <td style="border-bottom: 0px solid #efefef; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; height: 1px; width: 100%; margin: 0px;"></td>
                                                                                                                 </tr>
                                                                                                             </tbody>
                                                                                                         </table>
                                                                                                     </td>
                                                                                                 </tr>
                                                                                             </tbody>
                                                                                         </table>
                                                                                     </td>
                                                                                 </tr>
                                                                             </tbody>
                                                                         </table>
                                                                     </td>
                                                                 </tr>
                                                                 <tr>
                                                                     <td class="esd-structure es-p20t es-p20b es-p20r es-p20l" align="left">
                                                                         <!--[if mso]><table width="560" cellpadding="0"
                                         cellspacing="0"><tr><td width="270" valign="top"><![endif]-->
                                                                         <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                                                             <tbody>
                                                                                 <tr>
                                                                                     <td class="es-m-p20b esd-container-frame" width="270" align="left">
                                                                                         <table width="100%" cellspacing="0" cellpadding="0">
                                                                                             <tbody>
                                                                                                 <tr>
                                                                                                     <td align="center" class="esd-empty-container" style="display: none;"></td>
                                                                                                 </tr>
                                                                                             </tbody>
                                                                                         </table>
                                                                                     </td>
                                                                                 </tr>
                                                                             </tbody>
                                                                         </table>
                                                                         <!--[if mso]></td><td width="20"></td><td width="270" valign="top"><![endif]-->
                                                                         <table class="es-right" cellspacing="0" cellpadding="0" align="right">
                                                                             <tbody>
                                                                                 <tr>
                                                                                     <td class="esd-container-frame" width="270" align="left">
                                                                                         <table width="100%" cellspacing="0" cellpadding="0">
                                                                                             <tbody>
                                                                                                 <tr>
                                                                                                     <td class="esd-block-social es-p5t es-m-txt-c" align="right" style="font-size:0">
                                                                                                         <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0">
                                                                                                             <tbody>
                                                                                                                 <tr>
                                                                                                                     <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img title="Facebook" src="https://hobhfv.stripocdn.email/content/assets/img/social-icons/logo-black/facebook-logo-black.png" alt="Fb" width="32"></a></td>
                                                                                                                     <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img title="Twitter" src="https://hobhfv.stripocdn.email/content/assets/img/social-icons/logo-black/twitter-logo-black.png" alt="Tw" width="32"></a></td>
                                                                                                                     <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img title="Instagram" src="https://hobhfv.stripocdn.email/content/assets/img/social-icons/logo-black/instagram-logo-black.png" alt="Inst" width="32"></a></td>
                                                                                                                     <td class="es-p10r" valign="top" align="center"><a target="_blank" href><img title="Youtube" src="https://hobhfv.stripocdn.email/content/assets/img/social-icons/logo-black/youtube-logo-black.png" alt="Yt" width="32"></a></td>
                                                                                                                 </tr>
                                                                                                             </tbody>
                                                                                                         </table>
                                                                                                     </td>
                                                                                                 </tr>
                                                                                             </tbody>
                                                                                         </table>
                                                                                     </td>
                                                                                 </tr>
                                                                             </tbody>
                                                                         </table>
                                                                         <!--[if mso]></td></tr></table><![endif]-->
                                                                     </td>
                                                                 </tr>
                                                             </tbody>
                                                         </table>
                                                     </td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                         <table class="es-footer esd-footer-popover" cellspacing="0" cellpadding="0" align="center">
                                             <tbody>
                                                 <tr>
                                                     <td class="esd-stripe" align="center">
                                                         <table class="es-footer-body" width="600" cellspacing="0" cellpadding="0" align="center">
                                                             <tbody>
                                                                 <tr>
                                                                     <td class="esd-structure es-p20t es-p20b es-p20r es-p20l" align="left">
                                                                         <table width="100%" cellspacing="0" cellpadding="0">
                                                                             <tbody>
                                                                                 <tr>
                                                                                     <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                                         <table width="100%" cellspacing="0" cellpadding="0">
                                                                                             <tbody>
                                                                                                 <tr>
                                                                                                     <td class="esd-block-text" align="center">
                                                                                                         <p>www.tvgcargos.com</p>
                                                                                                     </td>
                                                                                                 </tr>
                                                                                             </tbody>
                                                                                         </table>
                                                                                     </td>
                                                                                 </tr>
                                                                             </tbody>
                                                                         </table>
                                                                     </td>
                                                                 </tr>
                                                             </tbody>
                                                         </table>
                                                     </td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                     </td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </body>

                 </html>');
                 if($this->email->send()){
                  echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
                 }else{
                  echo json_encode(['status' => '500', 'message' =>'error' ]);
                 }

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
             if( ! $this->verify_min_level(6)){
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
               if( ! $this->verify_min_level(6)){
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
