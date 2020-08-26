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
                redirect( site_url( user. '', $redirect_protocol ) );
        }

    }
            public function logout()
    {
        $this->authentication->logout();

        // Set redirect protocol
        $redirect_protocol = USE_SSL ? 'https' : NULL;

        redirect( site_url( LOGIN_PAGE . '?logout=1', $redirect_protocol ) );
    }




   public function registe($action="show"){
     $this->load->model('examples/examples_model');
                $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');
                        $this->load->model('examples/examples_model');
      $this->load->model('examples/validation_callables');


     $user_data['email'] = $this->input->post('email', TRUE);
     $user_data['passwd'] = $this->input->post('passwd', TRUE);

     $user_data['username'] = $this->input->post('username', TRUE);
      $user_data['auth_level'] ='1';

   $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]' ,[
            'required' =>" Es necesario llenar este campo",
            'valid_email'=> "Email no valido",
            'is_unique' => "Email ya existe"
          ]);


          $this->form_validation->set_rules('passwd', 'password', 'required|min_length[6]',[
            'required' => " Es necesario llenar este campo",
            'min_length' => "Debe tener por lo menos 6 caracteres de largo"
          ]);

          $this->form_validation->set_rules('re_passwd', 're_passwd', 'required|matches[passwd]',[
            'required' => " Es necesario llenar este campo",
            'matches' => "Las contraseñas no coinciden"
          ]);

          $this->form_validation->set_rules('username', 'username', 'required|is_unique[users.Username]',[
              'required' => " Es necesario llenar este campo",
              'is_unique' => "Este nombre ya esta en uso"

            ]);

                if ($this->form_validation->run() == FALSE)
                {

        echo   $this->load->view('header', '', TRUE);
       echo  $this->load->view('register', '', TRUE);
       echo  $this->load->view('footer_blank', '', TRUE);
                }
                else
                {
            $user_data['passwd']     = $this->authentication->hash_passwd($user_data['passwd']);
            $user_data['user_id']    = $this->examples_model->get_unused_id();
            $user_data['created_at'] = date('Y-m-d H:i:s');
            $user_datos['id_usuario'] =$user_data['user_id'];
            $empresa_data['id_usu'] =$user_data['user_id'];

            // If username is not used, it must be entered into the record as NULL

                $this->db->set($user_data)->insert(config_item('user_table'));
                $this->db->set($user_datos)->insert(config_item('datos_table'));
                $this->db->set($empresa_data)->insert(config_item('empresa_table'));

                //Cargamos la librería email
                $this->load->library('email');
                $config = array(
                 'protocol' => 'smtp',
                 'smtp_host' => 'demist.grupoinnovaec.com',
                 'smtp_user' => 'info@demist.grupoinnovaec.com', //Su Correo de Gmail Aqui
                 'smtp_pass' => 'demistinfo', // Su Password de Gmail aqui
                 'smtp_port' => 465,
                 'smtp_crypto' => 'ssl',
                 'mailtype' => 'html',
                 'wordwrap' => TRUE,
                 'charset' => 'utf-8'
                 );
               //Establecemos esta configuración
                 $this->email->initialize($config);

               //Ponemos la dirección de correo que enviará el email y un nombre
                 $this->email->from('info@demist.grupoinnovaec.com');

               /*
                * Ponemos el o los destinatarios para los que va el email
                * en este caso al ser un formulario de contacto te lo enviarás a ti
                * mismo
                */
                 $this->email->to($user_data['email']);

               //Definimos el asunto del mensaje
                 $this->email->subject( "Bienvenid@  ". $user_data['username']);

               //Definimos el mensaje a enviar
                 $this->email->message('
                 <!doctype html>
                 <html ⚡4email>
                  <head><meta charset="utf-8"><style amp4email-boilerplate>body{visibility:hidden}</style><script async src="https://cdn.ampproject.org/v0.js"></script>

                   <style amp-custom>
                 @media only screen and (max-width:600px) {p, ul li, ol li, a { font-size:16px; line-height:150% } h1 { font-size:20px; text-align:center; line-height:120% } h2 { font-size:16px; text-align:left; line-height:120% } h3 { font-size:20px; text-align:center; line-height:120% } h1 a { font-size:20px } h2 a { font-size:16px; text-align:left } h3 a { font-size:20px } .es-menu td a { font-size:14px } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:10px } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:12px } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px } *[class="gmail-fix"] { display:none } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left } .es-m-txt-r amp-img { float:right } .es-m-txt-c amp-img { margin:0 auto } .es-m-txt-l amp-img { float:left } .es-button-border { display:block } a.es-button { font-size:14px; display:block; border-left-width:0px; border-right-width:0px } .es-btn-fw { border-width:10px 0px; text-align:center } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100% } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%; max-width:600px } .es-adapt-td { display:block; width:100% } .adapt-img { width:100%; height:auto } .es-m-p0 { padding:0px } .es-m-p0r { padding-right:0px } .es-m-p0l { padding-left:0px } .es-m-p0t { padding-top:0px } .es-m-p0b { padding-bottom:0 } .es-m-p20b { padding-bottom:20px } .es-mobile-hidden, .es-hidden { display:none } .es-desk-hidden { display:table-row; width:auto; overflow:visible; float:none; max-height:inherit; line-height:inherit } .es-desk-menu-hidden { display:table-cell } table.es-table-not-adapt, .esd-block-html table { width:auto } table.es-social { display:inline-block } table.es-social td { display:inline-block } }
                 a[x-apple-data-detectors] {
                 	color:inherit;
                 	text-decoration:none;
                 	font-size:inherit;
                 	font-family:inherit;
                 	font-weight:inherit;
                 	line-height:inherit;
                 }
                 .es-desk-hidden {
                 	display:none;
                 	float:left;
                 	overflow:hidden;
                 	width:0;
                 	max-height:0;
                 	line-height:0;
                 }
                 .es-button-border:hover a.es-button {
                 	background:#FFFFFF;
                 	border-color:#FFFFFF;
                 }
                 .es-button-border:hover {
                 	background:#FFFFFF;
                 	border-style:solid solid solid solid;
                 	border-color:#3D5CA3 #3D5CA3 #3D5CA3 #3D5CA3;
                 }
                 s {
                 	text-decoration:line-through;
                 }
                 body {
                 	width:100%;
                 	font-family:helvetica, "helvetica neue", arial, verdana, sans-serif;
                 }
                 table {
                 	border-collapse:collapse;
                 	border-spacing:0px;
                 }
                 table td, html, body, .es-wrapper {
                 	padding:0;
                 	Margin:0;
                 }
                 .es-content, .es-header, .es-footer {
                 	table-layout:fixed;
                 	width:100%;
                 }
                 p, hr {
                 	Margin:0;
                 }
                 h1, h2, h3, h4, h5 {
                 	Margin:0;
                 	line-height:120%;
                 	font-family:arial, "helvetica neue", helvetica, sans-serif;
                 }
                 .es-left {
                 	float:left;
                 }
                 .es-right {
                 	float:right;
                 }
                 .es-p5 {
                 	padding:5px;
                 }
                 .es-p5t {
                 	padding-top:5px;
                 }
                 .es-p5b {
                 	padding-bottom:5px;
                 }
                 .es-p5l {
                 	padding-left:5px;
                 }
                 .es-p5r {
                 	padding-right:5px;
                 }
                 .es-p10 {
                 	padding:10px;
                 }
                 .es-p10t {
                 	padding-top:10px;
                 }
                 .es-p10b {
                 	padding-bottom:10px;
                 }
                 .es-p10l {
                 	padding-left:10px;
                 }
                 .es-p10r {
                 	padding-right:10px;
                 }
                 .es-p15 {
                 	padding:15px;
                 }
                 .es-p15t {
                 	padding-top:15px;
                 }
                 .es-p15b {
                 	padding-bottom:15px;
                 }
                 .es-p15l {
                 	padding-left:15px;
                 }
                 .es-p15r {
                 	padding-right:15px;
                 }
                 .es-p20 {
                 	padding:20px;
                 }
                 .es-p20t {
                 	padding-top:20px;
                 }
                 .es-p20b {
                 	padding-bottom:20px;
                 }
                 .es-p20l {
                 	padding-left:20px;
                 }
                 .es-p20r {
                 	padding-right:20px;
                 }
                 .es-p25 {
                 	padding:25px;
                 }
                 .es-p25t {
                 	padding-top:25px;
                 }
                 .es-p25b {
                 	padding-bottom:25px;
                 }
                 .es-p25l {
                 	padding-left:25px;
                 }
                 .es-p25r {
                 	padding-right:25px;
                 }
                 .es-p30 {
                 	padding:30px;
                 }
                 .es-p30t {
                 	padding-top:30px;
                 }
                 .es-p30b {
                 	padding-bottom:30px;
                 }
                 .es-p30l {
                 	padding-left:30px;
                 }
                 .es-p30r {
                 	padding-right:30px;
                 }
                 .es-p35 {
                 	padding:35px;
                 }
                 .es-p35t {
                 	padding-top:35px;
                 }
                 .es-p35b {
                 	padding-bottom:35px;
                 }
                 .es-p35l {
                 	padding-left:35px;
                 }
                 .es-p35r {
                 	padding-right:35px;
                 }
                 .es-p40 {
                 	padding:40px;
                 }
                 .es-p40t {
                 	padding-top:40px;
                 }
                 .es-p40b {
                 	padding-bottom:40px;
                 }
                 .es-p40l {
                 	padding-left:40px;
                 }
                 .es-p40r {
                 	padding-right:40px;
                 }
                 .es-menu td {
                 	border:0;
                 }
                 a {
                 	font-family:helvetica, "helvetica neue", arial, verdana, sans-serif;
                 	font-size:16px;
                 	text-decoration:none;
                 }
                 h1 {
                 	font-size:20px;
                 	font-style:normal;
                 	font-weight:normal;
                 	color:#333333;
                 }
                 h1 a {
                 	font-size:20px;
                 }
                 h2 {
                 	font-size:14px;
                 	font-style:normal;
                 	font-weight:normal;
                 	color:#333333;
                 }
                 h2 a {
                 	font-size:14px;
                 }
                 h3 {
                 	font-size:20px;
                 	font-style:normal;
                 	font-weight:normal;
                 	color:#333333;
                 }
                 h3 a {
                 	font-size:20px;
                 }
                 p, ul li, ol li {
                 	font-size:16px;
                 	font-family:helvetica, "helvetica neue", arial, verdana, sans-serif;
                 	line-height:150%;
                 }
                 ul li, ol li {
                 	Margin-bottom:15px;
                 }
                 .es-menu td a {
                 	text-decoration:none;
                 	display:block;
                 }
                 .es-menu amp-img, .es-button amp-img {
                 	vertical-align:middle;
                 }
                 .es-wrapper {
                 	width:100%;
                 	height:100%;
                 }
                 .es-wrapper-color {
                 	background-color:#FAFAFA;
                 }
                 .es-content-body {
                 	background-color:#FFFFFF;
                 }
                 .es-content-body p, .es-content-body ul li, .es-content-body ol li {
                 	color:#666666;
                 }
                 .es-content-body a {
                 	color:#0B5394;
                 }
                 .es-header {
                 	background-color:transparent;
                 }
                 .es-header-body {
                 	background-color:#FFFFFF;
                 }
                 .es-header-body p, .es-header-body ul li, .es-header-body ol li {
                 	color:#333333;
                 	font-size:14px;
                 }
                 .es-header-body a {
                 	color:#1376C8;
                 	font-size:14px;
                 }
                 .es-footer {
                 	background-color:transparent;
                 }
                 .es-footer-body {
                 	background-color:transparent;
                 }
                 .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li {
                 	color:#333333;
                 	font-size:14px;
                 }
                 .es-footer-body a {
                 	color:#333333;
                 	font-size:14px;
                 }
                 .es-infoblock, .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li {
                 	line-height:120%;
                 	font-size:12px;
                 	color:#CCCCCC;
                 }
                 .es-infoblock a {
                 	font-size:12px;
                 	color:#CCCCCC;
                 }
                 a.es-button {
                 	border-style:solid;
                 	border-color:#FFFFFF;
                 	border-width:15px 20px 15px 20px;
                 	display:inline-block;
                 	background:#FFFFFF;
                 	border-radius:10px;
                 	font-size:14px;
                 	font-family:arial, "helvetica neue", helvetica, sans-serif;
                 	font-weight:bold;
                 	font-style:normal;
                 	line-height:120%;
                 	color:#3D5CA3;
                 	text-decoration:none;
                 	width:auto;
                 	text-align:center;
                 }
                 .es-button-border {
                 	border-style:solid solid solid solid;
                 	border-color:#3D5CA3 #3D5CA3 #3D5CA3 #3D5CA3;
                 	background:#FFFFFF;
                 	border-width:2px 2px 2px 2px;
                 	display:inline-block;
                 	border-radius:10px;
                 	width:auto;
                 }
                 </style>
                  </head>
                  <body>
                   <div class="es-wrapper-color">
                    <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
                      <tr>
                       <td valign="top">
                        <table cellpadding="0" cellspacing="0" class="es-content" align="center">
                          <tr>
                           <td class="es-adaptive" align="center">
                            <table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                              <tr>
                               <td class="es-p10" align="left">
                                <table width="100%" cellspacing="0" cellpadding="0">
                                  <tr>
                                   <td width="580" valign="top" align="center">
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                      <tr>
                                       <td align="center" style="display: none;"></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-header" align="center">
                          <tr>
                           <td class="es-adaptive" align="center">
                            <table class="es-header-body" style="background-color: #f2f3f6;" width="600" cellspacing="0" cellpadding="0" bgcolor="#f2f3f6" align="center">
                              <tr>
                               <td class="es-p20t es-p20b es-p20r es-p20l" style="background-color: #ffffff;" bgcolor="#ffffff" align="left">
                                <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                  <tr>
                                   <td class="es-m-p20b" width="270" align="left">
                                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation">
                                      <tr>
                                       <td align="center" style="font-size: 0px;"><img class="adapt-img" src="https://ihsnig.stripocdn.email/content/guids/03e37dd1-55fb-4fbf-a66e-5c1d63d39dd2/images/15431591531735377.jpg" alt style="display: block;" width="270" height="83" layout="responsive"></img></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table>
                                <table class="es-right" cellspacing="0" cellpadding="0" align="right">
                                  <tr>
                                   <td width="270" align="left">
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                      <tr>
                                       <td align="center" style="display: none;"></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table>
                        <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                          <tr>
                           <td style="background-color: #fafafa;" bgcolor="#fafafa" align="center">
                            <table class="es-content-body" style="background-color: #ffffff;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                              <tr>
                               <td class="es-p40t es-p20r es-p20l" style="background-color: transparent;" bgcolor="transparent" align="left">
                                <table width="100%" cellspacing="0" cellpadding="0">
                                  <tr>
                                   <td width="560" valign="top" align="center">
                                    <table style="background-position: left top;" width="100%" cellspacing="0" cellpadding="0" role="presentation">
                                      <tr>
                                       <td class="es-p5t es-p5b" align="center" style="font-size: 0px;"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQOwmwcBKSFVZIk8boX6CPZqqtBLPHzL8MxcnCPyZOF-2xm8dIr&usqp=CAU" alt style="display: block;" width="175" height="175"></img></td>
                                      </tr>
                                      <tr>
                                       <td class="es-p15t es-p15b" align="center"><h1>Hola, '.$user_data['username'].'</h1></td>
                                      </tr>
                                      <tr>
                                       <td class="es-p40r es-p40l" align="center"><p>Bienvenid@ a&nbsp;TECNOVITAL</p></td>
                                      </tr>
                                      <tr>
                                       <td class="es-p25t es-p40r es-p40l" align="center"><p>Estas registrad@ con Éxito en nuestra plataforma...</p></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                               <td class="es-p20t es-p10r es-p10l" align="left">
                                <table class="es-right" cellspacing="0" cellpadding="0" align="right">
                                  <tr>
                                   <td width="361" align="left">
                                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation">
                                      <tr>
                                       <td class="es-p10t es-p5b es-m-txt-c" align="left" style="font-size:0">
                                        <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0" role="presentation">
                                          <tr>
                                           <td class="es-p10r" valign="top" align="center"><amp-img src="https://ihsnig.stripocdn.email/content/assets/img/social-icons/rounded-gray/facebook-rounded-gray.png" alt="Fb" title="Facebook" width="32" height="32"></amp-img></td>
                                           <td class="es-p10r" valign="top" align="center"><amp-img src="https://ihsnig.stripocdn.email/content/assets/img/social-icons/rounded-gray/twitter-rounded-gray.png" alt="Tw" title="Twitter" width="32" height="32"></amp-img></td>
                                           <td class="es-p10r" valign="top" align="center"><amp-img src="https://ihsnig.stripocdn.email/content/assets/img/social-icons/rounded-gray/instagram-rounded-gray.png" alt="Ig" title="Instagram" width="32" height="32"></amp-img></td>
                                           <td class="es-p10r" valign="top" align="center"><amp-img src="https://ihsnig.stripocdn.email/content/assets/img/social-icons/rounded-gray/youtube-rounded-gray.png" alt="Yt" title="Youtube" width="32" height="32"></amp-img></td>
                                           <td class="es-p10r" valign="top" align="center"><amp-img src="https://ihsnig.stripocdn.email/content/assets/img/social-icons/rounded-gray/linkedin-rounded-gray.png" alt="In" title="Linkedin" width="32" height="32"></amp-img></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                               <td class="es-p5t es-p20b es-p20r es-p20l" align="left">
                                <table width="100%" cellspacing="0" cellpadding="0">
                                  <tr>
                                   <td width="560" valign="top" align="center">
                                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation">
                                      <tr>
                                       <td align="center"><p style="font-size: 14px;">Contactanos: <a target="_blank" style="font-size: 14px; color: #666666;" href="tel:123456789">123456789</a> | <a target="_blank" href="mailto:your@mail.com" style="font-size: 14px; color: #666666;">tecnnovital.com</a></p></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table>
                        <table class="es-footer" cellspacing="0" cellpadding="0" align="center">
                          <tr>
                           <td style="background-color: #fafafa;" bgcolor="#fafafa" align="center">
                            <table class="es-footer-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                              <tr>
                               <td class="es-p10t es-p30b es-p20r es-p20l" style="background-color: #0b5394;" bgcolor="#0b5394" align="left">
                                <table width="100%" cellspacing="0" cellpadding="0">
                                  <tr>
                                   <td width="560" valign="top" align="center">
                                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation">
                                      <tr>
                                       <td align="left"><h2><br></h2></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table>
                        <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                          <tr>
                           <td style="background-color: #fafafa;" bgcolor="#fafafa" align="center">
                            <table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="transparent" align="center">
                              <tr>
                               <td class="es-p15t" style="background-position: left top;" align="left">
                                <table width="100%" cellspacing="0" cellpadding="0">
                                  <tr>
                                   <td width="600" valign="top" align="center">
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                      <tr>
                                       <td align="center" style="display: none;"></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table>
                        <table class="es-footer" cellspacing="0" cellpadding="0" align="center">
                          <tr>
                           <td style="background-color: #fafafa;" bgcolor="#fafafa" align="center">
                            <table class="es-footer-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="transparent" align="center">
                              <tr>
                               <td class="es-p15t es-p5b es-p20r es-p20l" align="left">
                                <table width="100%" cellspacing="0" cellpadding="0">
                                  <tr>
                                   <td width="560" valign="top" align="center">
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                      <tr>
                                       <td align="center" style="display: none;"></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table>
                        <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                          <tr>
                           <td align="center">
                            <table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                              <tr>
                               <td class="es-p30t es-p30b es-p20r es-p20l" align="left">
                                <table width="100%" cellspacing="0" cellpadding="0">
                                  <tr>
                                   <td width="560" valign="top" align="center">
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                      <tr>
                                       <td align="center" style="display: none;"></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
                   </div>
                  </body>
                 </html>');
                 if($this->email->send()){
                     echo"ok";
                 }else{
                     echo "no ok";
                 }

            if( $this->db->affected_rows() == 1 )
                       $redirect_protocol = USE_SSL ? 'https' : NULL;

                        $recovery_code = substr( $this->authentication->random_salt()
                            . $this->authentication->random_salt()
                            . $this->authentication->random_salt()
                            . $this->authentication->random_salt(), 0, 72 );

                        // Update user record with recovery code and time
                        $this->examples_model->update_user_raw_data(
                            $user_data['user_id'],
                            [
                                'passwd_verify_code' => $this->authentication->hash_passwd($recovery_code),

                            ]
                        );


                        // Set the link protocol
                        $link_protocol = USE_SSL ? 'https' : NULL;

                        // Set URI of link
                              redirect( site_url( LOGIN_PAGE . '?logout=1', $redirect_protocol ) );


                }
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
                         'smtp_host' => 'demist.grupoinnovaec.com',
                         'smtp_user' => 'info@demist.grupoinnovaec.com', //Su Correo de Gmail Aqui
                         'smtp_pass' => 'demistinfo', // Su Password de Gmail aqui
                         'smtp_port' => 465,
                         'smtp_crypto' => 'ssl',
                         'mailtype' => 'html',
                         'wordwrap' => TRUE,
                         'charset' => 'utf-8'
                         );
                       //Establecemos esta configuración
                         $this->email->initialize($config);

                       //Ponemos la dirección de correo que enviará el email y un nombre
                         $this->email->from('info@demist.grupoinnovaec.com');

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
                         <!doctype html>
                         <html ⚡4email>
                          <head><meta charset="utf-8"><style amp4email-boilerplate>body{visibility:hidden}</style><script async src="https://cdn.ampproject.org/v0.js"></script>

                           <style amp-custom>
                         @media only screen and (max-width:600px) {p, ul li, ol li, a { font-size:16px; line-height:150% } h1 { font-size:20px; text-align:center; line-height:120% } h2 { font-size:16px; text-align:left; line-height:120% } h3 { font-size:20px; text-align:center; line-height:120% } h1 a { font-size:20px } h2 a { font-size:16px; text-align:left } h3 a { font-size:20px } .es-menu td a { font-size:14px } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:10px } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:12px } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px } *[class="gmail-fix"] { display:none } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left } .es-m-txt-r amp-img { float:right } .es-m-txt-c amp-img { margin:0 auto } .es-m-txt-l amp-img { float:left } .es-button-border { display:block } a.es-button { font-size:14px; display:block; border-left-width:0px; border-right-width:0px } .es-btn-fw { border-width:10px 0px; text-align:center } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100% } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%; max-width:600px } .es-adapt-td { display:block; width:100% } .adapt-img { width:100%; height:auto } .es-m-p0 { padding:0px } .es-m-p0r { padding-right:0px } .es-m-p0l { padding-left:0px } .es-m-p0t { padding-top:0px } .es-m-p0b { padding-bottom:0 } .es-m-p20b { padding-bottom:20px } .es-mobile-hidden, .es-hidden { display:none } .es-desk-hidden { display:table-row; width:auto; overflow:visible; float:none; max-height:inherit; line-height:inherit } .es-desk-menu-hidden { display:table-cell } table.es-table-not-adapt, .esd-block-html table { width:auto } table.es-social { display:inline-block } table.es-social td { display:inline-block } }
                         a[x-apple-data-detectors] {
                         	color:inherit;
                         	text-decoration:none;
                         	font-size:inherit;
                         	font-family:inherit;
                         	font-weight:inherit;
                         	line-height:inherit;
                         }
                         .es-desk-hidden {
                         	display:none;
                         	float:left;
                         	overflow:hidden;
                         	width:0;
                         	max-height:0;
                         	line-height:0;
                         }
                         .es-button-border:hover a.es-button {
                         	background:#FFFFFF;
                         	border-color:#FFFFFF;
                         }
                         .es-button-border:hover {
                         	background:#FFFFFF;
                         	border-style:solid solid solid solid;
                         	border-color:#3D5CA3 #3D5CA3 #3D5CA3 #3D5CA3;
                         }
                         s {
                         	text-decoration:line-through;
                         }
                         body {
                         	width:100%;
                         	font-family:helvetica, "helvetica neue", arial, verdana, sans-serif;
                         }
                         table {
                         	border-collapse:collapse;
                         	border-spacing:0px;
                         }
                         table td, html, body, .es-wrapper {
                         	padding:0;
                         	Margin:0;
                         }
                         .es-content, .es-header, .es-footer {
                         	table-layout:fixed;
                         	width:100%;
                         }
                         p, hr {
                         	Margin:0;
                         }
                         h1, h2, h3, h4, h5 {
                         	Margin:0;
                         	line-height:120%;
                         	font-family:arial, "helvetica neue", helvetica, sans-serif;
                         }
                         .es-left {
                         	float:left;
                         }
                         .es-right {
                         	float:right;
                         }
                         .es-p5 {
                         	padding:5px;
                         }
                         .es-p5t {
                         	padding-top:5px;
                         }
                         .es-p5b {
                         	padding-bottom:5px;
                         }
                         .es-p5l {
                         	padding-left:5px;
                         }
                         .es-p5r {
                         	padding-right:5px;
                         }
                         .es-p10 {
                         	padding:10px;
                         }
                         .es-p10t {
                         	padding-top:10px;
                         }
                         .es-p10b {
                         	padding-bottom:10px;
                         }
                         .es-p10l {
                         	padding-left:10px;
                         }
                         .es-p10r {
                         	padding-right:10px;
                         }
                         .es-p15 {
                         	padding:15px;
                         }
                         .es-p15t {
                         	padding-top:15px;
                         }
                         .es-p15b {
                         	padding-bottom:15px;
                         }
                         .es-p15l {
                         	padding-left:15px;
                         }
                         .es-p15r {
                         	padding-right:15px;
                         }
                         .es-p20 {
                         	padding:20px;
                         }
                         .es-p20t {
                         	padding-top:20px;
                         }
                         .es-p20b {
                         	padding-bottom:20px;
                         }
                         .es-p20l {
                         	padding-left:20px;
                         }
                         .es-p20r {
                         	padding-right:20px;
                         }
                         .es-p25 {
                         	padding:25px;
                         }
                         .es-p25t {
                         	padding-top:25px;
                         }
                         .es-p25b {
                         	padding-bottom:25px;
                         }
                         .es-p25l {
                         	padding-left:25px;
                         }
                         .es-p25r {
                         	padding-right:25px;
                         }
                         .es-p30 {
                         	padding:30px;
                         }
                         .es-p30t {
                         	padding-top:30px;
                         }
                         .es-p30b {
                         	padding-bottom:30px;
                         }
                         .es-p30l {
                         	padding-left:30px;
                         }
                         .es-p30r {
                         	padding-right:30px;
                         }
                         .es-p35 {
                         	padding:35px;
                         }
                         .es-p35t {
                         	padding-top:35px;
                         }
                         .es-p35b {
                         	padding-bottom:35px;
                         }
                         .es-p35l {
                         	padding-left:35px;
                         }
                         .es-p35r {
                         	padding-right:35px;
                         }
                         .es-p40 {
                         	padding:40px;
                         }
                         .es-p40t {
                         	padding-top:40px;
                         }
                         .es-p40b {
                         	padding-bottom:40px;
                         }
                         .es-p40l {
                         	padding-left:40px;
                         }
                         .es-p40r {
                         	padding-right:40px;
                         }
                         .es-menu td {
                         	border:0;
                         }
                         a {
                         	font-family:helvetica, "helvetica neue", arial, verdana, sans-serif;
                         	font-size:16px;
                         	text-decoration:none;
                         }
                         h1 {
                         	font-size:20px;
                         	font-style:normal;
                         	font-weight:normal;
                         	color:#333333;
                         }
                         h1 a {
                         	font-size:20px;
                         }
                         h2 {
                         	font-size:14px;
                         	font-style:normal;
                         	font-weight:normal;
                         	color:#333333;
                         }
                         h2 a {
                         	font-size:14px;
                         }
                         h3 {
                         	font-size:20px;
                         	font-style:normal;
                         	font-weight:normal;
                         	color:#333333;
                         }
                         h3 a {
                         	font-size:20px;
                         }
                         p, ul li, ol li {
                         	font-size:16px;
                         	font-family:helvetica, "helvetica neue", arial, verdana, sans-serif;
                         	line-height:150%;
                         }
                         ul li, ol li {
                         	Margin-bottom:15px;
                         }
                         .es-menu td a {
                         	text-decoration:none;
                         	display:block;
                         }
                         .es-menu amp-img, .es-button amp-img {
                         	vertical-align:middle;
                         }
                         .es-wrapper {
                         	width:100%;
                         	height:100%;
                         }
                         .es-wrapper-color {
                         	background-color:#FAFAFA;
                         }
                         .es-content-body {
                         	background-color:#FFFFFF;
                         }
                         .es-content-body p, .es-content-body ul li, .es-content-body ol li {
                         	color:#666666;
                         }
                         .es-content-body a {
                         	color:#0B5394;
                         }
                         .es-header {
                         	background-color:transparent;
                         }
                         .es-header-body {
                         	background-color:#FFFFFF;
                         }
                         .es-header-body p, .es-header-body ul li, .es-header-body ol li {
                         	color:#333333;
                         	font-size:14px;
                         }
                         .es-header-body a {
                         	color:#1376C8;
                         	font-size:14px;
                         }
                         .es-footer {
                         	background-color:transparent;
                         }
                         .es-footer-body {
                         	background-color:transparent;
                         }
                         .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li {
                         	color:#333333;
                         	font-size:14px;
                         }
                         .es-footer-body a {
                         	color:#333333;
                         	font-size:14px;
                         }
                         .es-infoblock, .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li {
                         	line-height:120%;
                         	font-size:12px;
                         	color:#CCCCCC;
                         }
                         .es-infoblock a {
                         	font-size:12px;
                         	color:#CCCCCC;
                         }
                         a.es-button {
                         	border-style:solid;
                         	border-color:#FFFFFF;
                         	border-width:15px 20px 15px 20px;
                         	display:inline-block;
                         	background:#FFFFFF;
                         	border-radius:10px;
                         	font-size:14px;
                         	font-family:arial, "helvetica neue", helvetica, sans-serif;
                         	font-weight:bold;
                         	font-style:normal;
                         	line-height:120%;
                         	color:#3D5CA3;
                         	text-decoration:none;
                         	width:auto;
                         	text-align:center;
                         }
                         .es-button-border {
                         	border-style:solid solid solid solid;
                         	border-color:#3D5CA3 #3D5CA3 #3D5CA3 #3D5CA3;
                         	background:#FFFFFF;
                         	border-width:2px 2px 2px 2px;
                         	display:inline-block;
                         	border-radius:10px;
                         	width:auto;
                         }
                         </style>
                          </head>
                          <body>
                           <div class="es-wrapper-color">
                            <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
                              <tr>
                               <td valign="top">
                                <table cellpadding="0" cellspacing="0" class="es-content" align="center">
                                  <tr>
                                   <td class="es-adaptive" align="center">
                                    <table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                      <tr>
                                       <td class="es-p10" align="left">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                          <tr>
                                           <td width="580" valign="top" align="center">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                              <tr>
                                               <td align="center" style="display: none;"></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table>
                                <table cellpadding="0" cellspacing="0" class="es-header" align="center">
                                  <tr>
                                   <td class="es-adaptive" align="center">
                                    <table class="es-header-body" style="background-color: #f2f3f6;" width="600" cellspacing="0" cellpadding="0" bgcolor="#f2f3f6" align="center">
                                      <tr>
                                       <td class="es-p20t es-p20b es-p20r es-p20l" style="background-color: #ffffff;" bgcolor="#ffffff" align="left">
                                        <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                          <tr>
                                           <td class="es-m-p20b" width="270" align="left">
                                            <table width="100%" cellspacing="0" cellpadding="0" role="presentation">
                                              <tr>
                                               <td align="center" style="font-size: 0px;"><img class="adapt-img" src="https://ihsnig.stripocdn.email/content/guids/03e37dd1-55fb-4fbf-a66e-5c1d63d39dd2/images/15431591531735377.jpg" alt style="display: block;" width="100%" layout="responsive"></img></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table>
                                        <table class="es-right" cellspacing="0" cellpadding="0" align="right">
                                          <tr>
                                           <td width="270" align="left">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                              <tr>
                                               <td align="center" style="display: none;"></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table>
                                <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                                  <tr>
                                   <td style="background-color: #fafafa;" bgcolor="#fafafa" align="center">
                                    <table class="es-content-body" style="background-color: #ffffff;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                      <tr>
                                       <td class="es-p40t es-p20r es-p20l" style="background-color: transparent;" bgcolor="transparent" align="left">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                          <tr>
                                           <td width="560" valign="top" align="center">
                                            <table style="background-position: left top;" width="100%" cellspacing="0" cellpadding="0" role="presentation">
                                              <tr>
                                               <td class="es-p5t es-p5b" align="center" style="font-size: 0px;"><img src="https://uploads-ssl.webflow.com/57261d5a78d342c0529dc2eb/5c42391cff0f508ac22b1a95_Reset-Password.png" alt style="display: block;" width="100%"></img></td>
                                              </tr>
                                              <tr>
                                               <td class="es-p35r es-p40l" align="left"><p style="text-align: center;">El siguiente vínculo te permite reestaurar tu contraseña!</p></td>
                                              </tr>
                                              <tr>
                                               <td class="es-p40t es-p40b es-p10r es-p10l" align="center"><span class="es-button-border"><a href="http://tecnovital.co/'.$link_uri.'" class="es-button" target="_blank">RESTAURAR PASSWORD</a></span></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                      <tr>
                                       <td class="es-p20t es-p10r es-p10l" align="left">
                                        <table class="es-right" cellspacing="0" cellpadding="0" align="right">
                                          <tr>
                                           <td width="361" align="left">
                                            <table width="100%" cellspacing="0" cellpadding="0" role="presentation">
                                              <tr>
                                               <td class="es-p10t es-p5b es-m-txt-c" align="left" style="font-size:0">
                                                <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0" role="presentation">
                                                  <tr>
                                                   <td class="es-p10r" valign="top" align="center"><amp-img src="https://ihsnig.stripocdn.email/content/assets/img/social-icons/rounded-gray/facebook-rounded-gray.png" alt="Fb" title="Facebook" width="32" height="32"></amp-img></td>
                                                   <td class="es-p10r" valign="top" align="center"><amp-img src="https://ihsnig.stripocdn.email/content/assets/img/social-icons/rounded-gray/twitter-rounded-gray.png" alt="Tw" title="Twitter" width="32" height="32"></amp-img></td>
                                                   <td class="es-p10r" valign="top" align="center"><amp-img src="https://ihsnig.stripocdn.email/content/assets/img/social-icons/rounded-gray/instagram-rounded-gray.png" alt="Ig" title="Instagram" width="32" height="32"></amp-img></td>
                                                   <td class="es-p10r" valign="top" align="center"><amp-img src="https://ihsnig.stripocdn.email/content/assets/img/social-icons/rounded-gray/youtube-rounded-gray.png" alt="Yt" title="Youtube" width="32" height="32"></amp-img></td>
                                                   <td class="es-p10r" valign="top" align="center"><amp-img src="https://ihsnig.stripocdn.email/content/assets/img/social-icons/rounded-gray/linkedin-rounded-gray.png" alt="In" title="Linkedin" width="32" height="32"></amp-img></td>
                                                  </tr>
                                                </table></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                      <tr>
                                       <td class="es-p5t es-p20b es-p20r es-p20l" align="left">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                          <tr>
                                           <td width="560" valign="top" align="center">
                                            <table width="100%" cellspacing="0" cellpadding="0" role="presentation">
                                              <tr>
                                               <td align="center"><p style="font-size: 14px;">Contactanos: <a target="_blank" style="font-size: 14px; color: #666666;" href="tel:123456789">123456789</a> | <a target="_blank" href="mailto:your@mail.com" style="font-size: 14px; color: #666666;">tecnnovital.com</a></p></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table>
                                <table class="es-footer" cellspacing="0" cellpadding="0" align="center">
                                  <tr>
                                   <td style="background-color: #fafafa;" bgcolor="#fafafa" align="center">
                                    <table class="es-footer-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                      <tr>
                                       <td class="es-p10t es-p30b es-p20r es-p20l" style="background-color: #0b5394;" bgcolor="#0b5394" align="left">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                          <tr>
                                           <td width="560" valign="top" align="center">
                                            <table width="100%" cellspacing="0" cellpadding="0" role="presentation">
                                              <tr>
                                               <td align="left"><h2><br></h2></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table>
                                <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                                  <tr>
                                   <td style="background-color: #fafafa;" bgcolor="#fafafa" align="center">
                                    <table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="transparent" align="center">
                                      <tr>
                                       <td class="es-p15t" style="background-position: left top;" align="left">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                          <tr>
                                           <td width="600" valign="top" align="center">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                              <tr>
                                               <td align="center" style="display: none;"></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table>
                                <table class="es-footer" cellspacing="0" cellpadding="0" align="center">
                                  <tr>
                                   <td style="background-color: #fafafa;" bgcolor="#fafafa" align="center">
                                    <table class="es-footer-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="transparent" align="center">
                                      <tr>
                                       <td class="es-p15t es-p5b es-p20r es-p20l" align="left">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                          <tr>
                                           <td width="560" valign="top" align="center">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                              <tr>
                                               <td align="center" style="display: none;"></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table>
                                <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                                  <tr>
                                   <td align="center">
                                    <table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                      <tr>
                                       <td class="es-p30t es-p30b es-p20r es-p20l" align="left">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                          <tr>
                                           <td width="560" valign="top" align="center">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                              <tr>
                                               <td align="center" style="display: none;"></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                              </tr>
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

    // --------------------------------------------------------------

    // --------------------------------------------------------------
}
