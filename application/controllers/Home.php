<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Force SSL
        //$this->force_ssl();

        // Form and URL helpers always loaded (just for convenience)
        $this->load->model('User_model', 'user');
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
    public function index()
    {   $this->is_logged_in();
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('landing');
        $this->load->view('footer','["js"=>[""]]');

}

    public function ours(){
       $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('ours');
        $this->load->view('footer,["js"=>["nav"]]');
    }
    public function login()
    {   $this->is_logged_in();
          if( empty( $this->auth_role ) )
        {
        // Method should not be directly accessible
        if( $this->uri->uri_string() == 'User/index')
            show_404();

        if( strtolower( $_SERVER['REQUEST_METHOD'] ) == 'post' )
            $this->require_min_level(1);


        $this->setup_login_form();

        $html = $this->load->view('header', '', TRUE);
        $html .= $this->load->view('login', '', TRUE);
       // $html .= $this->load->view('footer', '', TRUE);


        echo $html;}else{
                redirect(base_url().'User/');
        }

    }
            public function logout()
    {
        $this->authentication->logout();

        // Set redirect protocol
        $redirect_protocol = USE_SSL ? 'https' : NULL;

        redirect( site_url( LOGIN_PAGE . '?logout=1', $redirect_protocol ) );
    }






        public function username_check($str)
        {
                if ($str == 'test')
                {
                        $this->form_validation->set_message('username_check', 'The {field} field can not be the word "test"');
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
        }


    public function verify( $user_id = '', $recovery_code = '' )    {
        /// If IP is on hold, display message
        if( $on_hold = $this->authentication->current_hold_status( TRUE ) )
        {
            $view_data['disabled'] = 1;
        }
        else
        {
            // Load resources
            $this->load->model('examples/examples_model');

            if(
                /**
                 * Make sure that $user_id is a number and less
                 * than or equal to 10 characters long
                 */
                is_numeric( $user_id ) && strlen( $user_id ) <= 10 &&

                /**
                 * Make sure that $recovery code is exactly 72 characters long
                 */
                strlen( $recovery_code ) == 72 &&

                /**
                 * Try to get a hashed password recovery
                 * code and user salt for the user.
                 */
                $recovery_data = $this->examples_model->get_recovery_verification_email( $user_id ) )
            {
                /**
                 * Check that the recovery code from the
                 * email matches the hashed recovery code.
                 */
                if( $recovery_data->passwd_recovery_code == $this->authentication->check_passwd( $recovery_data->passwd_recovery_code, $recovery_code ) )
                {
                    $view_data['user_id']       = $user_id;
                    $view_data['username']     = $recovery_data->username;
                    $view_data['recovery_code'] = $recovery_data->passwd_recovery_code;
                }

                // Link is bad so show message
                else
                {
                    $view_data['recovery_error'] = 1;

                    // Log an error
                    $this->authentication->log_error('');
                }
            }

            // Link is bad so show message
            else
            {
                $view_data['recovery_error'] = 1;

                // Log an error
                $this->authentication->log_error('');
            }

            /**
             * If form submission is attempting to change password
             */
            if( $this->tokens->match )
            {
                $this->examples_model->recovery_password_change();
            }
        }

        echo $this->load->view('examples/page_header', '', TRUE);

        echo $this->load->view( 'examples/choose_password_form', $view_data, TRUE );

        echo $this->load->view('examples/page_footer', '', TRUE);
    }




 // --------------------------------------------------------------

    /**
     * User recovery form
     */
    public function recover()
    {
        // Load resources
        $this->load->model('examples/examples_model');

        /// If IP or posted email is on hold, display message
        if( $on_hold = $this->authentication->current_hold_status( TRUE ) )
        {
            $view_data['disabled'] = 1;
        }
        else
        {
            // If the form post looks good
            if( $this->tokens->match && $this->input->post('email') ){

                if( $user_data = $this->examples_model->get_recovery_data( $this->input->post('email') ) )
                {
                    // Check if user is banned
                    if( $user_data->banned == '1' )
                    {
                        // Log an error if banned
                        $this->authentication->log_error( $this->input->post('email', TRUE ) );

                        // Show special message for banned user
                        $view_data['banned'] = 1;
                    }
                    else
                    {
                        /**
                         * Use the authentication libraries salt generator for a random string
                         * that will be hashed and stored as the password recovery key.
                         * Method is called 4 times for a 88 character string, and then
                         * trimmed to 72 characters
                         */
                        $recovery_code = substr( $this->authentication->random_salt()
                            . $this->authentication->random_salt()
                            . $this->authentication->random_salt()
                            . $this->authentication->random_salt(), 0, 72 );

                        // Update user record with recovery code and time
                        $this->examples_model->update_user_raw_data(
                            $user_data->user_id,
                            [
                                'passwd_recovery_code' => $this->authentication->hash_passwd($recovery_code),
                                'passwd_recovery_date' => date('Y-m-d H:i:s')
                            ]
                        );

                        // Set the link protocol
                        $link_protocol = USE_SSL ? 'https' : NULL;

                        // Set URI of link
                        $link_uri = 'home/recovery_verification/' . $user_data->user_id . '/' . $recovery_code;

                        $view_data['special_link'] = anchor(
                            site_url( $link_uri, $link_protocol ),
                            site_url( $link_uri, $link_protocol ),
                            'target ="_blank"'
                        );
                        //Cargamos la librería email
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
                       //Establecemos esta configuración
                         $this->email->initialize($config);

                       //Ponemos la dirección de correo que enviará el email y un nombre
                         $this->email->from('info@luzguerrera.com');

                       /*
                        * Ponemos el o los destinatarios para los que va el email
                        * en este caso al ser un formulario de contacto te lo enviarás a ti
                        * mismo
                        */
                         $this->email->to($this->input->post('email'));

                       //Definimos el asunto del mensaje
                         $this->email->subject( "Recuperación de contraseña");

                       //Definimos el mensaje a enviar
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
                                                                                                                 <h2>Link de recuperación de contraseña</h2>
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
                                                                 <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                                                     <tbody>
                                                                         <tr>
                                                                             <td class="esd-structure es-p20t es-p20r es-p20l" align="left">
                                                                                 <table width="100%" cellspacing="0" cellpadding="0">
                                                                                     <tbody>
                                                                                         <tr>
                                                                                             <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                                                 <table width="100%" cellspacing="0" cellpadding="0">
                                                                                                     <tbody>
                                                                                                         <tr>
                                                                                                             <td class="esd-block-button es-p10b" align="left"><span class="es-button-border"><a href="'.base_url($link_uri).'" class="es-button" target="_blank">Click aqui para recuperar tu acceso a la plataforma de TVGCARGO s.a.s</a></span></td>
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

                         }else{

                         }
                          $view_data['confirmation'] = 1;
                    }
                }

                // There was no match, log an error, and display a message
                else
                {
                    // Log the error
                    $this->authentication->log_error( $this->input->post('email', TRUE ) );

                    $view_data['no_match'] = 1;
                }
            }
        }



        echo $this->load->view('recover_form', ( isset( $view_data ) ) ? $view_data : '', TRUE );


    }

    public function recovery_verification( $user_id = '', $recovery_code = '' )
    {
        /// If IP is on hold, display message
        if( $on_hold = $this->authentication->current_hold_status( TRUE ) )
        {
            $view_data['disabled'] = 1;
        }
        else
        {
            // Load resources
            $this->load->model('examples/examples_model');

            if(
                /**
                 * Make sure that $user_id is a number and less
                 * than or equal to 10 characters long
                 */
                is_numeric( $user_id ) && strlen( $user_id ) <= 10 &&

                /**
                 * Make sure that $recovery code is exactly 72 characters long
                 */
                strlen( $recovery_code ) == 72 &&

                /**
                 * Try to get a hashed password recovery
                 * code and user salt for the user.
                 */
                $recovery_data = $this->examples_model->get_recovery_verification_data( $user_id ) )
            {
                /**
                 * Check that the recovery code from the
                 * email matches the hashed recovery code.
                 */
                if( $recovery_data->passwd_recovery_code == $this->authentication->check_passwd( $recovery_data->passwd_recovery_code, $recovery_code ) )
                {
                    $view_data['user_id']       = $user_id;
                    $view_data['username']     = $recovery_data->username;
                    $view_data['recovery_code'] = $recovery_data->passwd_recovery_code;
                }

                // Link is bad so show message
                else
                {
                    $view_data['recovery_error'] = 1;

                    // Log an error
                    $this->authentication->log_error('');
                }
            }

            // Link is bad so show message
            else
            {
                $view_data['recovery_error'] = 1;

                // Log an error
                $this->authentication->log_error('');
            }

            /**
             * If form submission is attempting to change password
             */
            if( $this->tokens->match )
            {
                $this->examples_model->recovery_password_change();
            }
        }



        echo $this->load->view( 'choose_password_form', $view_data, TRUE );

    }


    public function insertar() {
      $this->load->model('examples/examples_model');
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->load->model('examples/examples_model');
      $this->load->model('examples/validation_callables');
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
          $upload_data = $this->upload->data();
          $file_name = $upload_data['file_name'];
          $data['url_foto'] ="/include/img/user/".$file_name;
          $data['passwd']     = $this->authentication->hash_passwd($data['username']);
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


    // --------------------------------------------------------------

    // --------------------------------------------------------------
}
