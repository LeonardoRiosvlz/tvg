<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ClientesEspeciales extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->library('Excel');
		// EXCEL
		$this->load->model('HistoriaCE_model', 'historial');
		// Load form validation library
		$this->load->library('form_validation');
		// load CSV library
		$this->load->library('CSVReader');
		// Load file helper
		$this->load->helper('file');

	  $this->load->library('Pdf');
	  }
    public function index() {
			if( ! $this->verify_min_level(1)){
				redirect (base_url());
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('ClientesEspeciales/index');
        $this->load->view('footer',["js"=>[""]]);
      }

			/////global
			public function getcarga($id=0) {
				  $data['cargas'] = $this->historial->getcarga();
				  header('Content-Type: application/json');
				  echo json_encode(['cargas' => $data['cargas']]);
				}
				public function get_anexo($id=0) {
						$id = $this->input->post('anexo');
						$data['cargas'] = $this->historial->get_anexo($id);
						header('Content-Type: application/json');
						echo json_encode(['cargas' => $data['cargas']]);
					}
					public function getcarga_cedula($id=0) {
							$id = $this->input->post('cedula');
							$data['cargas'] = $this->historial->getcarga_cedula($id);
							header('Content-Type: application/json');
							echo json_encode(['cargas' => $data['cargas']]);
						}
					public function getcarga_cedula_tiempo($id=0) {
							$datas['cedula'] = $this->input->post('cedula');
							$datas['desde'] = $this->input->post('desde');
							$datas['hasta'] = $this->input->post('hasta');
							$data['cargas'] = $this->historial->getcarga_cedula_tiempo($datas);
							header('Content-Type: application/json');
							echo json_encode(['cargas' => $data['cargas']]);
						}
						public function getcarga_fecha_numero($id=0) {
								$datas['numero'] = $this->input->post('numero');
								$datas['desde'] = $this->input->post('desde');
								$datas['hasta'] = $this->input->post('hasta');
								$data['cargas'] = $this->historial->getcarga_fecha_numero($datas);
								header('Content-Type: application/json');
								echo json_encode(['cargas' => $data['cargas']]);
							}
							public function getcarga_fecha_cedula_numero($id=0) {
									$datas['numero'] = $this->input->post('numero');
									$datas['cedula'] = $this->input->post('cedula');
									$datas['desde'] = $this->input->post('desde');
									$datas['hasta'] = $this->input->post('hasta');
									$data['cargas'] = $this->historial->getcarga_fecha_cedula_numero($datas);
									header('Content-Type: application/json');
									echo json_encode(['cargas' => $data['cargas']]);
								}
						public function getcarga_tiempo($id=0) {
								$datas['desde'] = $this->input->post('desde');
								$datas['hasta'] = $this->input->post('hasta');
								$data['cargas'] = $this->historial->getcarga_tiempo($datas);
								header('Content-Type: application/json');
								echo json_encode(['cargas' => $data['cargas']]);
							}
							public function getcarga_numero($id=0) {
									$datas['numero'] = $this->input->post('numero');
									$data['cargas'] = $this->historial->getcarga_numero($datas);
									header('Content-Type: application/json');
									echo json_encode(['cargas' => $data['cargas']]);
								}
					public function getcarga_cedula_numero($id=0) {
							$id = $this->input->post('cedula');
							$numero = $this->input->post('numero');
							$data['cargas'] = $this->historial->getcarga_cedula_numero($id,$numero);
							header('Content-Type: application/json');
							echo json_encode(['cargas' => $data['cargas']]);
						}
						public function enviarcargas($id=0) {
				            $id = $this->input->post('id');
				            $result = $this->historial->enviarcarga($id);
				               if($result['code'] == 0){
				                    echo json_encode(['status' => '200', 'message' => ' correctamente']);
				                  }
				                else{
				                    echo json_encode(['status' => '500', 'message' => ' ha ocurrido un error']);
				                  }
							}

							public function enviarcarga(){
									$id = $this->input->post('id');
									$correo_cliente = $this->input->post('correo_cliente');
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
													 $this->email->to($correo_cliente);
													 $this->email->subject( "Notificación de envío ");
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
															 .es-button-border:hover a.es-button {
																	 background:#FFFFFF;
																	 border-color:#FFFFFF;
																	}
																	.es-button-border:hover {
																	 background:#FFFFFF;
																	 border-style:solid solid solid solid;
																	 border-color:#3D5CA3 #3D5CA3 #3D5CA3 #3D5CA3;
																	}
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
																																																									 <h2>Cordial Saludo </h2>
																																																							 </td>
																																																					 </tr>
																																																					 <tr>
																																																							 <td class="esd-block-text es-m-txt-c es-p10b" align="left">
																																																									 <p style="color: #333333;">Le notificamos que la carga con el número de guia E-'.$id.' ha sido enviada, puede acceder a través de nuestra platafroma con el serial de rastreo para conocer la loclización y detalles del envío en tiempo real.</p>
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
																																																							<a href="'.base_url().'Trazabilidad/timeline" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none !important;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;font-size:16px;color:#333333;border-style:solid;border-color:#3D85C6;border-width:5px 30px 5px 30px;display:inline-block;background:#3D85C6;border-radius:0px;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center">Informacion de la carga</a>
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
																									 <table cellpadding="0" cellspacing="0" class="es-content" align="center">
																											 <tbody>
																													 <tr>
																															 <td class="esd-stripe" align="center">
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
														 $id = $this->input->post('id');
				 				            $result = $this->historial->enviarcarga($id);
				 				               if($result['code'] == 0){
				 				                    echo json_encode(['status' => '200', 'message' => ' correctamente']);
				 				                  }
				 				                else{
				 				                    echo json_encode(['status' => '500', 'message' => ' ha ocurrido un error']);
				 				                  }
													 }else{
														echo json_encode(['status' => '500', 'message' => $data['id_archivo']]);
													 }

							}
							public function notificarcliente(){
									$id = $this->input->post('id');
									$correo_cliente = $this->input->post('correo_cliente');
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
													 $this->email->to($correo_cliente);
													 $this->email->subject( "Notificación de llegada");
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
															 .es-button-border:hover a.es-button {
																	 background:#FFFFFF;
																	 border-color:#FFFFFF;
																	}
																	.es-button-border:hover {
																	 background:#FFFFFF;
																	 border-style:solid solid solid solid;
																	 border-color:#3D5CA3 #3D5CA3 #3D5CA3 #3D5CA3;
																	}
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
																																																									 <h2>Cordial Saludo </h2>
																																																							 </td>
																																																					 </tr>
																																																					 <tr>
																																																							 <td class="esd-block-text es-m-txt-c es-p10b" align="left">
																																																									 <p style="color: #333333;">Le notificamos que la carga con el número de guia E-'.$id.' ha  llegado a su destino, puede acceder a través de nuestra platafroma con el serial de rastreo para conocer mas detalles del envío en tiempo real.</p>
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
																																																							<a href="'.base_url().'Trazabilidad/timeline" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none !important;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;font-size:16px;color:#333333;border-style:solid;border-color:#3D85C6;border-width:5px 30px 5px 30px;display:inline-block;background:#3D85C6;border-radius:0px;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center">Informacion de la carga</a>
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
																									 <table cellpadding="0" cellspacing="0" class="es-content" align="center">
																											 <tbody>
																													 <tr>
																															 <td class="esd-stripe" align="center">
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

				 				                    echo json_encode(['status' => '200', 'message' => ' correctamente']);

													 }else{
														echo json_encode(['status' => '500', 'message' => $data['id_archivo']]);
													 }

							}

						public function getcarga_cedula_numero_tiempo($id=0) {
								$datas['cedula'] = $this->input->post('cedula');
								$datas['desde'] = $this->input->post('desde');
								$datas['hasta'] = $this->input->post('hasta');
								$datas['n_referencia_c'] = $this->input->post('n_referencia_c');
								$data['cargas'] = $this->historial->getcarga_cedula_numero_tiempo($datas);
								header('Content-Type: application/json');
								echo json_encode(['cargas' => $data['cargas']]);
							}

			public function insertar() {
				if( ! $this->verify_min_level(1)){
					redirect (base_url());
				}
				$data = json_decode($this->input->post('service_form'),true);
				$data['codigo']    = $this->historial->get_unused_id();
				$result = $this->historial->insertar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}
			public function editar() {
				if( ! $this->verify_min_level(1)){
					redirect (base_url());
				}
			    $data = json_decode($this->input->post('service_form'),true);
				$result = $this->historial->editar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}
			public function eliminar() {
				if( ! $this->verify_min_level(1)){
					redirect (base_url());
				}
	            $id = $this->input->post('id');
	            $result = $this->historial->deletecarga($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				public function get_clientes() {
		        $id = $this->input->post('id');
					  $data['clientes'] = $this->clientes->get_clientes($id);
					  header('Content-Type: application/json');
					  echo json_encode(['clientes' => $data['clientes']]);
		 }




			 public function excelexport_cedula($id){
				 $llamadas = $this->historial->getcarga_cedula($id);
			 	 if(count($llamadas) > 0){
			 			 //Cargamos la librería de excel.
			 			 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
			 			 $this->excel->getActiveSheet()->setTitle('Cargas');
			 			 //Contador de filas
			 			 $contador = 1;
			 			 //Le aplicamos ancho las columnas.
			 			 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
						 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
						 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
						 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);

			 			 //Le aplicamos negrita a los títulos de la cabecera.
			 			 $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
						 $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
						 $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);

			 			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
			 			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
						 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nit/Cedula');
			 			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'ORIGEN');
			 			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DESTINO');
			 			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO DE TRANSPORTE');
			 			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TIPO DE ENVIO');
			 			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'PRECIO DE TARIFA');
			 			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ID CARGA CLIENTE');
			 			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'TIPO DE CARGA');
			 			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CANTIDAD');
			 			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'KILOS TVG');
			 			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'KILOS CLIENTE');
			 			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'FLETE FIJO');
			 			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FLETE TOTAL');
						 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'SEDE CLIENTE');
						 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Nº REFERENCIA');
						 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FECHA ENTREGA CUMPLIDOS');
						 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Nº ANEXO LEGALIZACION');
						 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'ITINERARIOS');
			 			 //Definimos la data del cuerpo.
			 			 foreach($llamadas as $l){
			 					//Incrementamos una fila más, para ir a la siguiente.
			 					$contador++;
			 					//Informacion de las filas de la consulta.
			 					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->codigo);
								if ($l->nombre_empresa==="No aplica") {
									$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_cliente);
								}else{
									$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
								}
								if ($l->nombre_empresa==="No aplica") {
									$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->cedula_cliente);
								}else{
									$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->nit_cliente);
								}
			 					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->departamento_origen." ".$l->ciudad_origen);
			 					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->departamento_destino." ".$l->ciudad_destino);
			 					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_transporte);
			 					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->tipo_envio);
			 					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->precio);
			 					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->id_carga_cliente);
			 					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->tipo_carga);
			 					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->cantidad);
			 					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->kilos_tvg);
			 					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->kilos_cliente);
			 					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->flete_fijo);
			 					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->flete_total);
								$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre_sede);
								$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->n_referencia_c);
								$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->f_entrega_c);
								$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->numero_anexo_l);
								$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->itinerarios);


			 			 }
			 			 //Le ponemos un nombre al archivo que se va a generar.
			 			 $archivo = "Cargas_excel.xls";
			 			 header('Content-Type: application/vnd.ms-excel');
			 			 header('Content-Disposition: attachment;filename="'.$archivo.'"');
			 			 header('Cache-Control: max-age=0');
			 			 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
			 			 //Hacemos una salida al navegador con el archivo Excel.
			 			 $objWriter->save('php://output');
			 		}else{
			 			 echo 'No se han encontrado llamadas';
			 			 exit;
			 		}
			  }
				public function excelexport_numero($id){
					$datas['numero']=$id;
	 			 $llamadas = $this->historial->getcarga_numero($datas);
	 			 if(count($llamadas) > 0){
	 					 //Cargamos la librería de excel.
	 					 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
	 					 $this->excel->getActiveSheet()->setTitle('Cargas');
	 					 //Contador de filas
	 					 $contador = 1;
						 //Le aplicamos ancho las columnas.
			 			 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
			 			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
						 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
						 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
						 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);

			 			 //Le aplicamos negrita a los títulos de la cabecera.
			 			 $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
			 			 $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
						 $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
						 $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);

			 			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
			 			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
						 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nit/Cedula');
			 			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'ORIGEN');
			 			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DESTINO');
			 			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO DE TRANSPORTE');
			 			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TIPO DE ENVIO');
			 			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'PRECIO DE TARIFA');
			 			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ID CARGA CLIENTE');
			 			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'TIPO DE CARGA');
			 			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CANTIDAD');
			 			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'KILOS TVG');
			 			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'KILOS CLIENTE');
			 			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'FLETE FIJO');
			 			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FLETE TOTAL');
						 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'SEDE CLIENTE');
						 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Nº REFERENCIA');
						 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FECHA ENTREGA CUMPLIDOS');
						 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Nº ANEXO LEGALIZACION');
						 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'ITINERARIOS');
			 			 //Definimos la data del cuerpo.
			 			 foreach($llamadas as $l){
			 					//Incrementamos una fila más, para ir a la siguiente.
			 					$contador++;
			 					//Informacion de las filas de la consulta.
			 					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->codigo);
								if ($l->nombre_empresa==="No aplica") {
									$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_cliente);
								}else{
									$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
								}
								if ($l->nombre_empresa==="No aplica") {
									$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->cedula_cliente);
								}else{
									$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->nit_cliente);
								}
			 					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->departamento_origen." ".$l->ciudad_origen);
			 					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->departamento_destino." ".$l->ciudad_destino);
			 					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_transporte);
			 					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->tipo_envio);
			 					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->precio);
			 					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->id_carga_cliente);
			 					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->tipo_carga);
			 					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->cantidad);
			 					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->kilos_tvg);
			 					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->kilos_cliente);
			 					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->flete_fijo);
			 					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->flete_total);
								$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre_sede);
								$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->n_referencia_c);
								$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->f_entrega_c);
								$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->numero_anexo_l);
								$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->itinerarios);



	 					 }
	 					 //Le ponemos un nombre al archivo que se va a generar.
	 					 $archivo = "Cargas_excel.xls";
	 					 header('Content-Type: application/vnd.ms-excel');
	 					 header('Content-Disposition: attachment;filename="'.$archivo.'"');
	 					 header('Cache-Control: max-age=0');
	 					 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
	 					 //Hacemos una salida al navegador con el archivo Excel.
	 					 $objWriter->save('php://output');
	 				}else{
	 					 echo 'No se han encontrado llamadas';
	 					 exit;
	 				}
	 			}


							 public function excelexport_cedula_numero($id,$numero){
								 $llamadas =  $this->historial->getcarga_cedula_numero($id,$numero);
							 	 if(count($llamadas) > 0){
							 			 //Cargamos la librería de excel.
							 			 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
							 			 $this->excel->getActiveSheet()->setTitle('Cargas');
							 			 //Contador de filas
							 			 $contador = 1;
										 //Le aplicamos ancho las columnas.
							 			 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);

							 			 //Le aplicamos negrita a los títulos de la cabecera.
							 			 $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);

							 			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
							 			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nit/Cedula');
							 			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'ORIGEN');
							 			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DESTINO');
							 			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO DE TRANSPORTE');
							 			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TIPO DE ENVIO');
							 			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'PRECIO DE TARIFA');
							 			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ID CARGA CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'TIPO DE CARGA');
							 			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CANTIDAD');
							 			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'KILOS TVG');
							 			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'KILOS CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'FLETE FIJO');
							 			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FLETE TOTAL');
										 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'SEDE CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Nº REFERENCIA');
										 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FECHA ENTREGA CUMPLIDOS');
										 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Nº ANEXO LEGALIZACION');
										 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'ITINERARIOS');
							 			 //Definimos la data del cuerpo.
							 			 foreach($llamadas as $l){
							 					//Incrementamos una fila más, para ir a la siguiente.
							 					$contador++;
							 					//Informacion de las filas de la consulta.
							 					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->codigo);
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
												}
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->cedula_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->nit_cliente);
												}
							 					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->departamento_origen." ".$l->ciudad_origen);
							 					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->departamento_destino." ".$l->ciudad_destino);
							 					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_transporte);
							 					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->tipo_envio);
							 					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->precio);
							 					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->id_carga_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->tipo_carga);
							 					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->cantidad);
							 					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->kilos_tvg);
							 					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->kilos_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->flete_fijo);
							 					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->flete_total);
												$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre_sede);
												$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->n_referencia_c);
												$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->f_entrega_c);
												$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->numero_anexo_l);
												$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->itinerarios);




							 			 }
							 			 //Le ponemos un nombre al archivo que se va a generar.
							 			 $archivo = "Cargas_excel.xls";
							 			 header('Content-Type: application/vnd.ms-excel');
							 			 header('Content-Disposition: attachment;filename="'.$archivo.'"');
							 			 header('Cache-Control: max-age=0');
							 			 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
							 			 //Hacemos una salida al navegador con el archivo Excel.
							 			 $objWriter->save('php://output');
							 		}else{
							 			 echo 'No se han encontrado llamadas';
							 			 exit;
							 		}
							  }
								public function excelexport_tiempo($desde,$hasta){
									$datas['desde'] = $desde;
									$datas['hasta'] = $hasta;
									$llamadas = $this->historial->getcarga_tiempo($datas);
							 	 if(count($llamadas) > 0){
							 			 //Cargamos la librería de excel.
							 			 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
							 			 $this->excel->getActiveSheet()->setTitle('Cargas');
							 			 //Contador de filas
							 			 $contador = 1;
										 //Le aplicamos ancho las columnas.
							 			 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);

							 			 //Le aplicamos negrita a los títulos de la cabecera.
							 			 $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);

							 			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
							 			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nit/Cedula');
							 			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'ORIGEN');
							 			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DESTINO');
							 			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO DE TRANSPORTE');
							 			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TIPO DE ENVIO');
							 			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'PRECIO DE TARIFA');
							 			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ID CARGA CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'TIPO DE CARGA');
							 			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CANTIDAD');
							 			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'KILOS TVG');
							 			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'KILOS CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'FLETE FIJO');
							 			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FLETE TOTAL');
										 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'SEDE CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Nº REFERENCIA');
										 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FECHA ENTREGA CUMPLIDOS');
										 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Nº ANEXO LEGALIZACION');
										 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'ITINERARIOS');
							 			 //Definimos la data del cuerpo.
							 			 foreach($llamadas as $l){
							 					//Incrementamos una fila más, para ir a la siguiente.
							 					$contador++;
							 					//Informacion de las filas de la consulta.
							 					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->codigo);
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
												}
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->cedula_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->nit_cliente);
												}
							 					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->departamento_origen." ".$l->ciudad_origen);
							 					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->departamento_destino." ".$l->ciudad_destino);
							 					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_transporte);
							 					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->tipo_envio);
							 					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->precio);
							 					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->id_carga_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->tipo_carga);
							 					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->cantidad);
							 					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->kilos_tvg);
							 					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->kilos_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->flete_fijo);
							 					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->flete_total);
												$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre_sede);
												$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->n_referencia_c);
												$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->f_entrega_c);
												$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->numero_anexo_l);
												$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->itinerarios);




							 			 }
							 			 //Le ponemos un nombre al archivo que se va a generar.
							 			 $archivo = "Cargas_excel.xls";
							 			 header('Content-Type: application/vnd.ms-excel');
							 			 header('Content-Disposition: attachment;filename="'.$archivo.'"');
							 			 header('Cache-Control: max-age=0');
							 			 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
							 			 //Hacemos una salida al navegador con el archivo Excel.
							 			 $objWriter->save('php://output');
							 		}else{
							 			 echo 'No se han encontrado llamadas';
							 			 exit;
							 		}
							 	}

								public function excelexport_cedula_tiempo($desde,$hasta,$id){
									$datas['cedula'] = $id;
									$datas['desde'] = $desde;
									$datas['hasta'] = $hasta;
									$llamadas = $this->historial->getcarga_cedula_tiempo($datas);
							 	 if(count($llamadas) > 0){
							 			 //Cargamos la librería de excel.
							 			 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
							 			 $this->excel->getActiveSheet()->setTitle('Cargas');
							 			 //Contador de filas
							 			 $contador = 1;
										 //Le aplicamos ancho las columnas.
							 			 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);

							 			 //Le aplicamos negrita a los títulos de la cabecera.
							 			 $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);

							 			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
							 			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nit/Cedula');
							 			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'ORIGEN');
							 			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DESTINO');
							 			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO DE TRANSPORTE');
							 			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TIPO DE ENVIO');
							 			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'PRECIO DE TARIFA');
							 			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ID CARGA CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'TIPO DE CARGA');
							 			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CANTIDAD');
							 			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'KILOS TVG');
							 			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'KILOS CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'FLETE FIJO');
							 			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FLETE TOTAL');
										 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'SEDE CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Nº REFERENCIA');
										 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FECHA ENTREGA CUMPLIDOS');
										 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Nº ANEXO LEGALIZACION');
										 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'ITINERARIOS');
							 			 //Definimos la data del cuerpo.
							 			 foreach($llamadas as $l){
							 					//Incrementamos una fila más, para ir a la siguiente.
							 					$contador++;
							 					//Informacion de las filas de la consulta.
							 					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->codigo);
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
												}
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->cedula_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->nit_cliente);
												}
							 					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->departamento_origen." ".$l->ciudad_origen);
							 					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->departamento_destino." ".$l->ciudad_destino);
							 					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_transporte);
							 					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->tipo_envio);
							 					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->precio);
							 					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->id_carga_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->tipo_carga);
							 					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->cantidad);
							 					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->kilos_tvg);
							 					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->kilos_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->flete_fijo);
							 					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->flete_total);
												$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre_sede);
												$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->n_referencia_c);
												$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->f_entrega_c);
												$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->numero_anexo_l);
												$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->itinerarios);




							 			 }
							 			 //Le ponemos un nombre al archivo que se va a generar.
							 			 $archivo = "Cargas_excel.xls";
							 			 header('Content-Type: application/vnd.ms-excel');
							 			 header('Content-Disposition: attachment;filename="'.$archivo.'"');
							 			 header('Cache-Control: max-age=0');
							 			 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
							 			 //Hacemos una salida al navegador con el archivo Excel.
							 			 $objWriter->save('php://output');
							 		}else{
							 			 echo 'No se han encontrado llamadas';
							 			 exit;
							 		}
							 	}

																public function excelexport_fecha_cedula_numero($desde,$hasta,$id,$numero){
																	$datas['cedula'] = $id;
																	$datas['numero'] = $numero;
																	$datas['desde'] = $desde;
																	$datas['hasta'] = $hasta;
																	$llamadas = $this->historial->getcarga_fecha_cedula_numero($datas);
															 	 if(count($llamadas) > 0){
															 			 //Cargamos la librería de excel.
															 			 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
															 			 $this->excel->getActiveSheet()->setTitle('Cargas');
															 			 //Contador de filas
															 			 $contador = 1;
																		 //Le aplicamos ancho las columnas.
															 			 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
															 			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
																		 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
																		 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
																		 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);

															 			 //Le aplicamos negrita a los títulos de la cabecera.
															 			 $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
															 			 $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
																		 $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
																		 $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);

															 			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
															 			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
																		 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nit/Cedula');
															 			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'ORIGEN');
															 			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DESTINO');
															 			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO DE TRANSPORTE');
															 			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TIPO DE ENVIO');
															 			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'PRECIO DE TARIFA');
															 			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ID CARGA CLIENTE');
															 			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'TIPO DE CARGA');
															 			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CANTIDAD');
															 			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'KILOS TVG');
															 			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'KILOS CLIENTE');
															 			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'FLETE FIJO');
															 			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FLETE TOTAL');
																		 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'SEDE CLIENTE');
																		 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Nº REFERENCIA');
																		 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FECHA ENTREGA CUMPLIDOS');
																		 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Nº ANEXO LEGALIZACION');
																		 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'ITINERARIOS');
															 			 //Definimos la data del cuerpo.
															 			 foreach($llamadas as $l){
															 					//Incrementamos una fila más, para ir a la siguiente.
															 					$contador++;
															 					//Informacion de las filas de la consulta.
															 					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->codigo);
																				if ($l->nombre_empresa==="No aplica") {
																					$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_cliente);
																				}else{
																					$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
																				}
																				if ($l->nombre_empresa==="No aplica") {
																					$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->cedula_cliente);
																				}else{
																					$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->nit_cliente);
																				}
															 					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->departamento_origen." ".$l->ciudad_origen);
															 					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->departamento_destino." ".$l->ciudad_destino);
															 					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_transporte);
															 					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->tipo_envio);
															 					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->precio);
															 					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->id_carga_cliente);
															 					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->tipo_carga);
															 					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->cantidad);
															 					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->kilos_tvg);
															 					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->kilos_cliente);
															 					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->flete_fijo);
															 					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->flete_total);
																				$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre_sede);
																				$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->n_referencia_c);
																				$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->f_entrega_c);
																				$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->numero_anexo_l);
																				$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->itinerarios);




															 			 }
															 			 //Le ponemos un nombre al archivo que se va a generar.
															 			 $archivo = "Cargas_excel.xls";
															 			 header('Content-Type: application/vnd.ms-excel');
															 			 header('Content-Disposition: attachment;filename="'.$archivo.'"');
															 			 header('Cache-Control: max-age=0');
															 			 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
															 			 //Hacemos una salida al navegador con el archivo Excel.
															 			 $objWriter->save('php://output');
															 		}else{
															 			 echo 'No se han encontrado llamadas';
															 			 exit;
															 		}
															 	}
								public function excelexport_fecha_numero($desde,$hasta,$id){
									$datas['numero'] = $id;
									$datas['desde'] = $desde;
									$datas['hasta'] = $hasta;
									$llamadas = $this->historial->getcarga_fecha_numero($datas);
							 	 if(count($llamadas) > 0){
							 			 //Cargamos la librería de excel.
							 			 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
							 			 $this->excel->getActiveSheet()->setTitle('Cargas');
							 			 //Contador de filas
							 			 $contador = 1;
										 //Le aplicamos ancho las columnas.
							 			 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);

							 			 //Le aplicamos negrita a los títulos de la cabecera.
							 			 $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);

							 			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
							 			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nit/Cedula');
							 			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'ORIGEN');
							 			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DESTINO');
							 			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO DE TRANSPORTE');
							 			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TIPO DE ENVIO');
							 			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'PRECIO DE TARIFA');
							 			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ID CARGA CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'TIPO DE CARGA');
							 			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CANTIDAD');
							 			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'KILOS TVG');
							 			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'KILOS CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'FLETE FIJO');
							 			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FLETE TOTAL');
										 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'SEDE CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Nº REFERENCIA');
										 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FECHA ENTREGA CUMPLIDOS');
										 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Nº ANEXO LEGALIZACION');
										 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'ITINERARIOS');
							 			 //Definimos la data del cuerpo.
							 			 foreach($llamadas as $l){
							 					//Incrementamos una fila más, para ir a la siguiente.
							 					$contador++;
							 					//Informacion de las filas de la consulta.
							 					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->codigo);
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
												}
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->cedula_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->nit_cliente);
												}
							 					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->departamento_origen." ".$l->ciudad_origen);
							 					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->departamento_destino." ".$l->ciudad_destino);
							 					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_transporte);
							 					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->tipo_envio);
							 					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->precio);
							 					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->id_carga_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->tipo_carga);
							 					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->cantidad);
							 					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->kilos_tvg);
							 					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->kilos_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->flete_fijo);
							 					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->flete_total);
												$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre_sede);
												$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->n_referencia_c);
												$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->f_entrega_c);
												$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->numero_anexo_l);
												$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->itinerarios);




							 			 }
							 			 //Le ponemos un nombre al archivo que se va a generar.
							 			 $archivo = "Cargas_excel.xls";
							 			 header('Content-Type: application/vnd.ms-excel');
							 			 header('Content-Disposition: attachment;filename="'.$archivo.'"');
							 			 header('Cache-Control: max-age=0');
							 			 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
							 			 //Hacemos una salida al navegador con el archivo Excel.
							 			 $objWriter->save('php://output');
							 		}else{
							 			 echo 'No se han encontrado llamadas';
							 			 exit;
							 		}
							 	}


								public function excelexport_cedulant($id,$desde,$hasta){
									$datas['n_referencia_c'] = $id;
									$datas['desde'] = $desde;
									$datas['hasta'] = $hasta;
									$llamadas = $this->historial->getcarga_cedula_numero_tiempo($datas);
							 	 if(count($llamadas) > 0){
							 			 //Cargamos la librería de excel.
							 			 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
							 			 $this->excel->getActiveSheet()->setTitle('Cargas');
							 			 //Contador de filas
							 			 $contador = 1;
										 //Le aplicamos ancho las columnas.
							 			 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);

							 			 //Le aplicamos negrita a los títulos de la cabecera.
							 			 $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);

							 			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
							 			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nit/Cedula');
							 			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'ORIGEN');
							 			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DESTINO');
							 			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO DE TRANSPORTE');
							 			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TIPO DE ENVIO');
							 			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'PRECIO DE TARIFA');
							 			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ID CARGA CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'TIPO DE CARGA');
							 			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CANTIDAD');
							 			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'KILOS TVG');
							 			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'KILOS CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'FLETE FIJO');
							 			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FLETE TOTAL');
										 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'SEDE CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Nº REFERENCIA');
										 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FECHA ENTREGA CUMPLIDOS');
										 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Nº ANEXO LEGALIZACION');
										 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'ITINERARIOS');
							 			 //Definimos la data del cuerpo.
							 			 foreach($llamadas as $l){
							 					//Incrementamos una fila más, para ir a la siguiente.
							 					$contador++;
							 					//Informacion de las filas de la consulta.
							 					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->codigo);
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
												}
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->cedula_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->nit_cliente);
												}
							 					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->departamento_origen." ".$l->ciudad_origen);
							 					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->departamento_destino." ".$l->ciudad_destino);
							 					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_transporte);
							 					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->tipo_envio);
							 					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->precio);
							 					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->id_carga_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->tipo_carga);
							 					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->cantidad);
							 					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->kilos_tvg);
							 					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->kilos_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->flete_fijo);
							 					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->flete_total);
												$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre_sede);
												$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->n_referencia_c);
												$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->f_entrega_c);
												$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->numero_anexo_l);
												$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->itinerarios);




							 			 }
							 			 //Le ponemos un nombre al archivo que se va a generar.
							 			 $archivo = "Cargas_excel.xls";
							 			 header('Content-Type: application/vnd.ms-excel');
							 			 header('Content-Disposition: attachment;filename="'.$archivo.'"');
							 			 header('Cache-Control: max-age=0');
							 			 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
							 			 //Hacemos una salida al navegador con el archivo Excel.
							 			 $objWriter->save('php://output');
							 		}else{
							 			 echo 'No se han encontrado llamadas';
							 			 exit;
							 		}
							 	}

								public function excelexport_anexo($id){

									$llamadas	= $this->historial->get_anexo($id);
							 	 if(count($llamadas) > 0){
							 			 //Cargamos la librería de excel.
							 			 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
							 			 $this->excel->getActiveSheet()->setTitle('Cargas');
							 			 //Contador de filas
							 			 $contador = 1;
										 //Le aplicamos ancho las columnas.
							 			 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
							 			 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
										 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);

							 			 //Le aplicamos negrita a los títulos de la cabecera.
							 			 $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
							 			 $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
										 $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);

							 			 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
							 			 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nit/Cedula');
							 			 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'ORIGEN');
							 			 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DESTINO');
							 			 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'TIPO DE TRANSPORTE');
							 			 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'TIPO DE ENVIO');
							 			 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'PRECIO DE TARIFA');
							 			 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ID CARGA CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'TIPO DE CARGA');
							 			 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CANTIDAD');
							 			 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'KILOS TVG');
							 			 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'KILOS CLIENTE');
							 			 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'FLETE FIJO');
							 			 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FLETE TOTAL');
										 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'SEDE CLIENTE');
										 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Nº REFERENCIA');
										 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FECHA ENTREGA CUMPLIDOS');
										 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Nº ANEXO LEGALIZACION');
										 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'ITINERARIOS');
							 			 //Definimos la data del cuerpo.
							 			 foreach($llamadas as $l){
							 					//Incrementamos una fila más, para ir a la siguiente.
							 					$contador++;
							 					//Informacion de las filas de la consulta.
							 					$this->excel->getActiveSheet()->setCellValue("A{$contador}","E-".$l->codigo);
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->nombre_empresa);
												}
												if ($l->nombre_empresa==="No aplica") {
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->cedula_cliente);
												}else{
													$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->nit_cliente);
												}
							 					$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->departamento_origen." ".$l->ciudad_origen);
							 					$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->departamento_destino." ".$l->ciudad_destino);
							 					$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->tipo_transporte);
							 					$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->tipo_envio);
							 					$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->precio);
							 					$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->id_carga_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->tipo_carga);
							 					$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->cantidad);
							 					$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->kilos_tvg);
							 					$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->kilos_cliente);
							 					$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->flete_fijo);
							 					$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->flete_total);
												$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->nombre_sede);
												$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->n_referencia_c);
												$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->f_entrega_c);
												$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->numero_anexo_l);
												$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->itinerarios);


							 			 }
							 			 //Le ponemos un nombre al archivo que se va a generar.
							 			 $archivo = "Cargas_excel.xls";
							 			 header('Content-Type: application/vnd.ms-excel');
							 			 header('Content-Disposition: attachment;filename="'.$archivo.'"');
							 			 header('Cache-Control: max-age=0');
							 			 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
							 			 //Hacemos una salida al navegador con el archivo Excel.
							 			 $objWriter->save('php://output');
							 		}else{
							 			 echo 'No se han encontrado llamadas';
							 			 exit;
							 		}
							 	}
}
