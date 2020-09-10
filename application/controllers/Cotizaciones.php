<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cotizaciones extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('Cotizaciones_model', 'cotizaciones');
	  }
    public function index() {
			if( ! $this->verify_min_level(9)){
				redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('cotizaciones/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function getcotizaciones($id=0) {

				  $data['cotizaciones'] = $this->cotizaciones->getcotizaciones();
				  header('Content-Type: application/json');
				  echo json_encode(['cotizaciones' => $data['cotizaciones']]);

				}

			public function insertar() {
				if( ! $this->verify_min_level(9)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}

				$data = json_decode($this->input->post('service_form'),true);
				$data['id']    = $this->cotizaciones->get_unused_id();
				$data['codigo']= dechex($data['id']);
				$result = $this->cotizaciones->insertar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}
			public function editar() {
				if( ! $this->verify_min_level(9)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
			    $data = json_decode($this->input->post('service_form'),true);
				$result = $this->cotizaciones->editar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}
			public function eliminar() {
				if( ! $this->verify_min_level(9)){
					redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
				}
	            $id = $this->input->post('id');
	            $result = $this->cotizaciones->deletecotizaciones($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				public function get_cotizaciones() {
		        $id = $this->input->post('id');
					  $data['cotizaciones'] = $this->cotizaciones->get_cotizaciones($id);
					  header('Content-Type: application/json');
					  echo json_encode(['cotizaciones' => $data['cotizaciones']]);
		 }


		 ////////////////
				 public function detail_foto() {
					 if( ! $this->verify_min_level(9)){
							 redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
						 }
					 $config['upload_path']          = './include/files';
					 $config['allowed_types']        = 'jpg|png|jpeg';
					 $config['max_size']             = 7500;
					 $config['max_width']            = 2500;
					 $config['max_height']           = 1400;
					 $this->load->library('upload', $config);
					 if ( ! $this->upload->do_upload('file')) {
						 $error = array('error' => $this->upload->display_errors());
						 echo json_encode($error);
					 } else {
							 $upload_data = $this->upload->data();
						 $file_name = $upload_data['file_name'];
						 $data['url'] ="/include/files/".$file_name;
						 $data['id_cliente'] = $this->input->post('cedula');
						 $data['tiempo'] = $this->input->post('tiempo');
						 $rut=$this->cotizaciones->imagen_insert($data);
						 echo json_encode(['status' => '201', 'message' => 'Imagen creada exitosamente']);
					 }
				 }
				 function getimagenes() {

				 $data['id_cliente']= $this->input->post('cedula');
				 $data['tiempo'] = $this->input->post('tiempo');
				 $data['imagenes'] = $this->cotizaciones->imagenes_get($data);
				 header('Content-Type: application/json');
				 echo json_encode(['imagenes' => $data['imagenes']]);

				 }

				 public function eliminarImagen() {
					 if( ! $this->verify_min_level(9)){
								 redirect (site_url (LOGIN_PAGE. '?logou= 1' , $redirect_protocol));
							 }
					 $id = $this->input->post('id');
					 $result = $this->cotizaciones->eliminarImagen($id);
							if($result['code'] == 0){
									 echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
								 }
							 else{
									 echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
								 }
				}
//////////////////////
					public function enviar_cotizacion(){
							$data = json_decode($this->input->post('service_form'),true);
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
											 $this->email->initialize($config);
											 $this->email->from('info@demist.grupoinnovaec.com');
											 $this->email->to("leonardo27188@gmail.com");
											 $this->email->subject( "Contacto ". $data['email']);
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
																						 <td class="es-p15t es-p15b" align="center"><h1>Email: '.$data['email'].'</h1></td>
																						</tr>
																						<tr>
																						<tr>
																						 <td class="es-p15t es-p15b" align="center"><h1>Nombre: '.$data['nombre'].' '.$data['apellido'].'</h1></td>
																						</tr>
																						<tr>
																						<tr>
																						 <td class="es-p15t es-p15b" align="center"><h1>Teléfono: '.$data['telefono'].'</h1></td>
																						</tr>
																					 <tr>
																						 <td class="es-p15t es-p15b" align="center"><h1>Mensaje: '.$data['mensaje'].'</h1></td>
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
												 echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
											 }else{
												echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
											 }

					}
}
