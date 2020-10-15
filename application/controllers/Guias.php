<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Guias extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('Guias_model', 'guias');
	  }
    public function index() {
			if( ! $this->verify_min_level(1)){
				redirect (base_url());
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Guias/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function getguias($id=0) {

				  $data['guias'] = $this->guias->getguias();
				  header('Content-Type: application/json');
				  echo json_encode(['guias' => $data['guias']]);

				}
				public function getguiasu($id=0) {
						$id = $this->input->post('id');
						$data['guias'] = $this->guias->getguiasu($id);
						header('Content-Type: application/json');
						echo json_encode(['guias' => $data['guias']]);

					}
				public function get_tiempo($id=0) {
						$datas['desde'] = $this->input->post('desde');
						$datas['hasta'] = $this->input->post('hasta');
						$data['guias'] = $this->guias->get_tiempo($datas);
						header('Content-Type: application/json');
						echo json_encode(['guias' => $data['guias']]);
					}
			public function get_tiempou($id=0) {
					$datas['desde'] = $this->input->post('desde');
					$datas['hasta'] = $this->input->post('hasta');
					$datas['user_id'] = $this->input->post('user_id');
					$data['guias'] = $this->guias->get_tiempou($datas);
					header('Content-Type: application/json');
					echo json_encode(['guias' => $data['guias']]);
				}
					public function get_cedula($id=0) {
							$datas['cedula'] = $this->input->post('cedula');
							$data['guias'] = $this->guias->get_cedula($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
						public function get_cedulau($id=0) {
								$datas['cedula'] = $this->input->post('cedula');
								$datas['user_id'] = $this->input->post('user_id');
								$data['guias'] = $this->guias->get_cedulau($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
					public function get_estado($id=0) {
							$datas['estado'] = $this->input->post('estado');
							$data['guias'] = $this->guias->get_estado($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
			 	public function get_estadou($id=0) {
					  $datas['user_id'] = $this->input->post('user_id');
			 			$datas['estado'] = $this->input->post('estado');
			 			$data['guias'] = $this->guias->get_estadou($datas);
			 			header('Content-Type: application/json');
			 			echo json_encode(['guias' => $data['guias']]);
			 		}
					public function get_ciudad($id=0) {
							$datas['ciudad'] = $this->input->post('ciudad');
							$data['guias'] = $this->guias->get_ciudad($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
						public function get_ciudadu($id=0) {
								$datas['user_id'] = $this->input->post('user_id');
								$data['guias'] = $this->guias->get_ciudadu($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
						public function get_fecha_cedula($id=0) {
								$datas['desde'] = $this->input->post('desde');
								$datas['hasta'] = $this->input->post('hasta');
								$datas['cedula'] = $this->input->post('cedula');
								$data['guias'] = $this->guias->get_fecha_cedula($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
					public function get_fecha_cedulau($id=0) {
							$datas['desde'] = $this->input->post('desde');
							$datas['hasta'] = $this->input->post('hasta');
							$datas['cedula'] = $this->input->post('cedula');
							$datas['user_id'] = $this->input->post('user_id');
							$data['guias'] = $this->guias->get_fecha_cedulau($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
				public function get_fecha_estado($id=0) {
						$datas['desde'] = $this->input->post('desde');
						$datas['hasta'] = $this->input->post('hasta');
						$datas['estado'] = $this->input->post('estado');
						$data['guias'] = $this->guias->get_fecha_estado($datas);
						header('Content-Type: application/json');
						echo json_encode(['guias' => $data['guias']]);
					}
					public function get_fecha_estadou($id=0) {
							$datas['desde'] = $this->input->post('desde');
							$datas['hasta'] = $this->input->post('hasta');
							$datas['estado'] = $this->input->post('estado');
							$datas['user_id'] = $this->input->post('user_id');
							$data['guias'] = $this->guias->get_fecha_estadou($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
					public function get_fecha_ciudad($id=0) {
							$datas['desde'] = $this->input->post('desde');
							$datas['hasta'] = $this->input->post('hasta');
							$datas['ciudad'] = $this->input->post('ciudad');
							$data['guias'] = $this->guias->get_fecha_ciudad($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
					public function get_fecha_ciudadu($id=0) {
							$datas['desde'] = $this->input->post('desde');
							$datas['hasta'] = $this->input->post('hasta');
							$datas['ciudad'] = $this->input->post('ciudad');
							$datas['user_id'] = $this->input->post('user_id');
							$data['guias'] = $this->guias->get_fecha_ciudadu($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
						public function get_cedula_estado($id=0) {
								$datas['cedula'] = $this->input->post('cedula');
								$datas['estado'] = $this->input->post('estado');
								$data['guias'] = $this->guias->get_cedula_estado($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
					public function get_cedula_estadou($id=0) {
							$datas['cedula'] = $this->input->post('cedula');
							$datas['estado'] = $this->input->post('estado');
							$datas['user_id'] = $this->input->post('user_id');
							$data['guias'] = $this->guias->get_cedula_estadou($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
						public function get_cedula_ciudad($id=0) {
								$datas['cedula'] = $this->input->post('cedula');
								$datas['ciudad'] = $this->input->post('ciudad');
								$data['guias'] = $this->guias->get_cedula_ciudad($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
						public function get_estado_ciudadu($id=0) {
								$datas['estado'] = $this->input->post('estado');
								$datas['ciudad'] = $this->input->post('ciudad');
								$datas['user_id'] = $this->input->post('user_id');
								$data['guias'] = $this->guias->get_estado_ciudadu($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
							public function get_fecha_cedula_ciudad($id=0) {
									$datas['desde'] = $this->input->post('desde');
									$datas['hasta'] = $this->input->post('hasta');
									$datas['cedula'] = $this->input->post('cedula');
									$datas['ciudad'] = $this->input->post('ciudad');
									$data['guias'] = $this->guias->get_fecha_cedula_ciudad($datas);
									header('Content-Type: application/json');
									echo json_encode(['guias' => $data['guias']]);
								}
						public function get_fecha_cedula_ciudadu($id=0) {
								$datas['desde'] = $this->input->post('desde');
								$datas['hasta'] = $this->input->post('hasta');
								$datas['cedula'] = $this->input->post('cedula');
								$datas['ciudad'] = $this->input->post('ciudad');
								$datas['user_id'] = $this->input->post('user_id');
								$data['guias'] = $this->guias->get_fecha_cedula_ciudadu($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
							public function get_fecha_estado_ciudad($id=0) {
									$datas['desde'] = $this->input->post('desde');
									$datas['hasta'] = $this->input->post('hasta');
									$datas['estado'] = $this->input->post('estado');
									$datas['ciudad'] = $this->input->post('ciudad');
									$data['guias'] = $this->guias->get_fecha_estado_ciudad($datas);
									header('Content-Type: application/json');
									echo json_encode(['guias' => $data['guias']]);
								}
						public function get_fecha_estado_ciudadu($id=0) {
								$datas['desde'] = $this->input->post('desde');
								$datas['hasta'] = $this->input->post('hasta');
								$datas['estado'] = $this->input->post('estado');
								$datas['ciudad'] = $this->input->post('ciudad');
								$datas['user_id'] = $this->input->post('user_id');
								$data['guias'] = $this->guias->get_fecha_estado_ciudadu($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
							public function get_fecha_estado_cedula($id=0) {
									$datas['desde'] = $this->input->post('desde');
									$datas['hasta'] = $this->input->post('hasta');
									$datas['estado'] = $this->input->post('estado');
									$datas['cedula'] = $this->input->post('cedula');
									$data['guias'] = $this->guias->get_fecha_estado_cedula($datas);
									header('Content-Type: application/json');
									echo json_encode(['guias' => $data['guias']]);
								}
						public function get_fecha_estado_cedulau($id=0) {
								$datas['desde'] = $this->input->post('desde');
								$datas['hasta'] = $this->input->post('hasta');
								$datas['estado'] = $this->input->post('estado');
								$datas['cedula'] = $this->input->post('cedula');
								$datas['user_id'] = $this->input->post('user_id');
								$data['guias'] = $this->guias->get_fecha_estado_cedulau($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
						public function get_fecha_estado_ciudad_cedula($id=0) {
								$datas['desde'] = $this->input->post('desde');
								$datas['hasta'] = $this->input->post('hasta');
								$datas['estado'] = $this->input->post('estado');
								$datas['ciudad'] = $this->input->post('ciudad');
								$datas['cedula'] = $this->input->post('cedula');
								$data['guias'] = $this->guias->get_fecha_estado_ciudad_cedula($datas);
								header('Content-Type: application/json');
								echo json_encode(['guias' => $data['guias']]);
							}
					public function get_fecha_estado_ciudad_cedulau($id=0) {
							$datas['desde'] = $this->input->post('desde');
							$datas['hasta'] = $this->input->post('hasta');
							$datas['estado'] = $this->input->post('estado');
							$datas['ciudad'] = $this->input->post('ciudad');
							$datas['cedula'] = $this->input->post('cedula');
							$datas['user_id'] = $this->input->post('user_id');
							$data['guias'] = $this->guias->get_fecha_estado_ciudad_cedulau($datas);
							header('Content-Type: application/json');
							echo json_encode(['guias' => $data['guias']]);
						}
			public function insertar() {
				if( ! $this->verify_min_level(1)){
					redirect (base_url());
				}
				$data = json_decode($this->input->post('service_form'),true);
				$data['id']    = $this->guias->get_unused_id();
				$result = $this->guias->insertar($data);
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
				$result = $this->guias->editar($data);
					if($result['code'] == 0){
						echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
					}
					else{
						echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
					}
				}
			public function anular() {
				if( ! $this->verify_min_level(1)){
					redirect (base_url());
				}
	            $id = $this->input->post('id');
	            $result = $this->guias->anularguias($id);
	               if($result['code'] == 0){
	                    echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
	                  }
	                else{
	                    echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
	                  }
     		 }
				 public function enfisico() {
					 if( ! $this->verify_min_level(1)){
						redirect (base_url());
					 }
								 $id = $this->input->post('id');
								 $result = $this->guias->enfisico($id);
										if($result['code'] == 0){
												 echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
											 }
										 else{
												 echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
											 }
							}
					public function archivada() {
						if( ! $this->verify_min_level(1)){
							redirect (base_url());
						}
									$id = $this->input->post('id');
									$result = $this->guias->archivada($id);
										 if($result['code'] == 0){
													echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
												}
											else{
													echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
												}
							 }
				 public function cumplidasguias() {
					 if( ! $this->verify_min_level(1)){
						 redirect (base_url());
					 }
								 $datas['id'] = $this->input->post('id');
								 $datas['f_cumplida']= $this->input->post('f_cumplida');
								 $result = $this->guias->cumplidasguias($datas);
										if($result['code'] == 0){
												 echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
											 }
										 else{
												 echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
											 }
							}
				 ////////////////
			 public function detail_foto() {

				 $config['upload_path']          = './include/guias';
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
					 $data['url'] ="/include/guias/".$file_name;
					 $data['guia'] = $this->input->post('guia');
					 $data['nombre'] = $upload_data['file_name'];
					 $rut=$this->guias->imagen_insert($data);
					 echo json_encode(['status' => '201', 'message' => 'Imagen creada exitosamente']);
				 }
			 }
			 function getimagenes() {
			 $data['guia'] = $this->input->post('guia');
			 $data['imagenes'] = $this->guias->imagenes_get($data);
			 header('Content-Type: application/json');
			 echo json_encode(['imagenes' => $data['imagenes']]);

			 }

			 public function eliminarImagen() {

				 $id = $this->input->post('id');
				 $result = $this->guias->eliminarImagen($id);
						if($result['code'] == 0){
								 echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
							 }
						 else{
								 echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
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
																																																					 <p style="color: #333333;">Le notificamos que la carga con el número de guia N-'.$id.' ha  llegado a su destino, puede acceder a través de nuestra platafroma con el serial de rastreo para conocer mas detalles del envío en tiempo real.</p>
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
							public function enviarguias(){
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
													                                                                                         <p style="color: #333333;">Le notificamos que la carga con el número de guia N-'.$id.' ha sido enviada, puede acceder a través de nuestra platafroma con el número de guia para conocer la loclización y detalles del envío en tiempo real.</p>
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
														 $result = $this->guias->enviarguias($id);
																if($result['code'] == 0){
																		 echo json_encode(['status' => '200', 'message' => ' Eliminado correctamente']);
																	 }
																 else{
																		 echo json_encode(['status' => '500', 'message' => ' No eliminado, ha ocurrido un error', 'response' => $result]);
																	 }
													 }else{
														echo json_encode(['status' => '500', 'message' => $data['id_archivo']]);
													 }

							}



				public function get_guias() {
		        $id = $this->input->post('id');
					  $data['guias'] = $this->guias->get_guias($id);
					  header('Content-Type: application/json');
					  echo json_encode(['guias' => $data['guias']]);
		 }
				 public function Guia_to_pdf($id){
					 $this->load->library('Pdf');
						$hoy=date("d/m/y");
						$html_content = $this->guias->fetch_details($id);
						//$this->pdf->set_paper('letter', 'landscape');
						$this->pdf->loadHtml($html_content);
						$this->pdf->render();
						$this->pdf->stream("GDC-".$id.".pdf", array("Attachment"=>0));

				}
				public function excelexport_tiempo($desde,$hasta){
					$datas['desde'] = $desde;
					$datas['hasta'] = $hasta;
					$llamadas = $this->guias->get_tiempo($datas);
				 if(count($llamadas) > 0){
						 //Cargamos la librería de excel.
						 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
						 $this->excel->getActiveSheet()->setTitle('Cargas');
						 //Contador de filas
						 $contador = 1;
						 //Le aplicamos ancho las columnas.
						 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
						 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
						 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
						 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
						 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
						 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

						 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
						 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
						 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
						 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
						 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
						 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
						 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
						 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
						 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
						 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
						 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
						 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
						 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
						 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
						 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
						 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
						 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
						 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
						 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
						 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
						 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
						 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
						 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
						 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
						 //Definimos la data del cuerpo.
						 foreach($llamadas as $l){
								//Incrementamos una fila más, para ir a la siguiente.
								$contador++;
								//Informacion de las filas de la consulta.
								$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
								$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
								$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
								$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
								$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
								$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
								$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
								$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
								$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
								$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
								$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
								$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
								$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
								$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
								$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
								$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
								$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
								$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
								$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
								$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
								$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
								$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
								$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
								$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


						 }
				 //Le ponemos un nombre al archivo que se va a generar.
				 $archivo = "Guias_De_Carga.xls";
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
		public function excelexport_cedula($cedula){
			$datas['cedula'] = $cedula;
			$llamadas = $this->guias->get_cedula($datas);
		 if(count($llamadas) > 0){
				 //Cargamos la librería de excel.
				 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
				 $this->excel->getActiveSheet()->setTitle('Cargas');
				 //Contador de filas
				 $contador = 1;
				 //Le aplicamos ancho las columnas.
				 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
				 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

				 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
				 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
				 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
				 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
				 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
				 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
				 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
				 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
				 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
				 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
				 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
				 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
				 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
				 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
				 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
				 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
				 //Definimos la data del cuerpo.
				 foreach($llamadas as $l){
						//Incrementamos una fila más, para ir a la siguiente.
						$contador++;
						//Informacion de las filas de la consulta.
						$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
						$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
						$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
						$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
						$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
						$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
						$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
						$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
						$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
						$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
						$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
						$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
						$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
						$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
						$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
						$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
						$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
						$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
						$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
						$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
						$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
						$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
						$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
						$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


				 }
				 //Le ponemos un nombre al archivo que se va a generar.
				 $archivo = "Guias_De_Carga_cedula.xls";
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
		public function excelexport_estado($estado){
			$datas['estado'] = $estado;
			$llamadas = $this->guias->get_estado($datas);
		 if(count($llamadas) > 0){
				 //Cargamos la librería de excel.
				 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
				 $this->excel->getActiveSheet()->setTitle('Cargas');
				 //Contador de filas
				 $contador = 1;
				 //Le aplicamos ancho las columnas.
				 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
				 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

				 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
				 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
				 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
				 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
				 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
				 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
				 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
				 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
				 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
				 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
				 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
				 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
				 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
				 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
				 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
				 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
				 //Definimos la data del cuerpo.
				 foreach($llamadas as $l){
						//Incrementamos una fila más, para ir a la siguiente.
						$contador++;
						//Informacion de las filas de la consulta.
						$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
						$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
						$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
						$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
						$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
						$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
						$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
						$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
						$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
						$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
						$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
						$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
						$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
						$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
						$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
						$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
						$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
						$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
						$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
						$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
						$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
						$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
						$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
						$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


				 }
				 //Le ponemos un nombre al archivo que se va a generar.
				 $archivo = "Guias_De_Carga_estado.xls";
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
		public function excelexport_ciudad($ciudad){
			$datas['ciudad'] = $ciudad;
			$llamadas = $this->guias->get_ciudad($datas);
		 if(count($llamadas) > 0){
				 //Cargamos la librería de excel.
				 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
				 $this->excel->getActiveSheet()->setTitle('Cargas');
				 //Contador de filas
				 $contador = 1;
				 //Le aplicamos ancho las columnas.
				 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
				 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

				 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
				 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
				 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
				 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
				 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
				 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
				 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
				 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
				 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
				 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
				 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
				 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
				 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
				 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
				 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
				 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
				 //Definimos la data del cuerpo.
				 foreach($llamadas as $l){
						//Incrementamos una fila más, para ir a la siguiente.
						$contador++;
						//Informacion de las filas de la consulta.
						$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
						$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
						$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
						$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
						$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
						$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
						$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
						$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
						$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
						$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
						$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
						$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
						$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
						$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
						$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
						$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
						$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
						$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
						$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
						$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
						$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
						$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
						$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
						$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


				 }
				 //Le ponemos un nombre al archivo que se va a generar.
				 $archivo = "Guias_De_Carga_ciudad.xls";
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
		public function excelexport_fecha_cedula($desde,$hasta,$cedula){
			$datas['desde'] = $desde;
			$datas['hasta'] = $hasta;
			$datas['cedula'] = $cedula;
			$llamadas = $this->guias->get_fecha_cedula($datas);
		 if(count($llamadas) > 0){
				 //Cargamos la librería de excel.
				 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
				 $this->excel->getActiveSheet()->setTitle('Cargas');
				 //Contador de filas
				 $contador = 1;
				 //Le aplicamos ancho las columnas.
				 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
				 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

				 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
				 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
				 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
				 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
				 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
				 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
				 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
				 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
				 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
				 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
				 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
				 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
				 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
				 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
				 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
				 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
				 //Definimos la data del cuerpo.
				 foreach($llamadas as $l){
						//Incrementamos una fila más, para ir a la siguiente.
						$contador++;
						//Informacion de las filas de la consulta.
						$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
						$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
						$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
						$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
						$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
						$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
						$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
						$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
						$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
						$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
						$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
						$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
						$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
						$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
						$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
						$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
						$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
						$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
						$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
						$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
						$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
						$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
						$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
						$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


				 }
				 //Le ponemos un nombre al archivo que se va a generar.
				 $archivo = "Guias_De_Carga_FC.xls";
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
		public function excelexport_fecha_estado($desde,$hasta,$estado){
			$datas['desde'] = $desde;
			$datas['hasta'] = $hasta;
			$datas['estado'] = $estado;
			$llamadas = $this->guias->get_fecha_estado($datas);
		 if(count($llamadas) > 0){
				 //Cargamos la librería de excel.
				 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
				 $this->excel->getActiveSheet()->setTitle('Cargas');
				 //Contador de filas
				 $contador = 1;
				 //Le aplicamos ancho las columnas.
				 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
				 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

				 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
				 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
				 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
				 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
				 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
				 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
				 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
				 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
				 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
				 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
				 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
				 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
				 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
				 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
				 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
				 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
				 //Definimos la data del cuerpo.
				 foreach($llamadas as $l){
						//Incrementamos una fila más, para ir a la siguiente.
						$contador++;
						//Informacion de las filas de la consulta.
						$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
						$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
						$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
						$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
						$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
						$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
						$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
						$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
						$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
						$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
						$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
						$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
						$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
						$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
						$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
						$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
						$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
						$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
						$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
						$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
						$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
						$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
						$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
						$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


				 }
				 //Le ponemos un nombre al archivo que se va a generar.
				 $archivo = "Guias_De_Carga_FE.xls";
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
		public function excelexport_fecha_ciudad($desde,$hasta,$ciudad){
			$datas['desde'] = $desde;
			$datas['hasta'] = $hasta;
			$datas['ciudad'] = $ciudad;
			$llamadas = $this->guias->get_fecha_ciudad($datas);
		 if(count($llamadas) > 0){
				 //Cargamos la librería de excel.
				 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
				 $this->excel->getActiveSheet()->setTitle('Cargas');
				 //Contador de filas
				 $contador = 1;
				 //Le aplicamos ancho las columnas.
				 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
				 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

				 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
				 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
				 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
				 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
				 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
				 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
				 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
				 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
				 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
				 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
				 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
				 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
				 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
				 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
				 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
				 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
				 //Definimos la data del cuerpo.
				 foreach($llamadas as $l){
						//Incrementamos una fila más, para ir a la siguiente.
						$contador++;
						//Informacion de las filas de la consulta.
						$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
						$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
						$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
						$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
						$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
						$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
						$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
						$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
						$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
						$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
						$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
						$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
						$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
						$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
						$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
						$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
						$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
						$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
						$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
						$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
						$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
						$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
						$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
						$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


				 }
				 //Le ponemos un nombre al archivo que se va a generar.
				 $archivo = "Guias_De_Carga_FCI.xls";
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
		public function excelexport_cedula_estado($cedula,$estado){
			$datas['estado'] = $estado;
			$datas['cedula'] = $cedula;
			$llamadas = $this->guias->get_cedula_estado($datas);
		 if(count($llamadas) > 0){
				 //Cargamos la librería de excel.
				 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
				 $this->excel->getActiveSheet()->setTitle('Cargas');
				 //Contador de filas
				 $contador = 1;
				 //Le aplicamos ancho las columnas.
				 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
				 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

				 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
				 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
				 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
				 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
				 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
				 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
				 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
				 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
				 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
				 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
				 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
				 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
				 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
				 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
				 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
				 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
				 //Definimos la data del cuerpo.
				 foreach($llamadas as $l){
						//Incrementamos una fila más, para ir a la siguiente.
						$contador++;
						//Informacion de las filas de la consulta.
						$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
						$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
						$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
						$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
						$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
						$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
						$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
						$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
						$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
						$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
						$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
						$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
						$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
						$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
						$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
						$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
						$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
						$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
						$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
						$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
						$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
						$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
						$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
						$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


				 }
				 //Le ponemos un nombre al archivo que se va a generar.
				 $archivo = "Guias_De_Carga_CE.xls";
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
		public function excelexport_cedula_ciudad($cedula,$ciudad){
			$datas['ciudad'] = $ciudad;
			$datas['cedula'] = $cedula;
			$llamadas = $this->guias->get_cedula_ciudad($datas);
		 if(count($llamadas) > 0){
				 //Cargamos la librería de excel.
				 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
				 $this->excel->getActiveSheet()->setTitle('Cargas');
				 //Contador de filas
				 $contador = 1;
				 //Le aplicamos ancho las columnas.
				 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
				 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
				 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
				 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

				 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
				 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
				 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
				 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
				 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
				 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
				 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
				 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
				 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
				 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
				 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
				 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
				 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
				 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
				 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
				 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
				 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
				 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
				 //Definimos la data del cuerpo.
				 foreach($llamadas as $l){
						//Incrementamos una fila más, para ir a la siguiente.
						$contador++;
						//Informacion de las filas de la consulta.
						$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
						$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
						$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
						$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
						$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
						$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
						$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
						$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
						$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
						$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
						$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
						$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
						$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
						$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
						$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
						$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
						$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
						$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
						$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
						$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
						$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
						$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
						$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
						$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


				 }
				 //Le ponemos un nombre al archivo que se va a generar.
				 $archivo = "Guias_De_Carga_CC.xls";
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
 public function excelexport_estado_ciudad($estado,$ciudad){
	 $datas['ciudad'] = $ciudad;
	 $datas['estado'] = $estado;
	 $llamadas = $this->guias->get_estado_ciudad($datas);
	if(count($llamadas) > 0){
			//Cargamos la librería de excel.
			$this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('Cargas');
			//Contador de filas
			$contador = 1;
			//Le aplicamos ancho las columnas.
			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
			$this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

			$this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
			$this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
			$this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
			$this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
			$this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
			$this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
			$this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
			$this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
			$this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
			$this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
			$this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
			$this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
			$this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
			$this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
			$this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
			$this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
			$this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
			$this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
			$this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
			$this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
			$this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
			$this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
			$this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
			$this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
			//Definimos la data del cuerpo.
			foreach($llamadas as $l){
				 //Incrementamos una fila más, para ir a la siguiente.
				 $contador++;
				 //Informacion de las filas de la consulta.
				 $this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
				 $this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
				 $this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
				 $this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
				 $this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
				 $this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
				 $this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
				 $this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
				 $this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
				 $this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
				 $this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
				 $this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
				 $this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
				 $this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
				 $this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
				 $this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
				 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
				 $this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
				 $this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
				 $this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
				 $this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
				 $this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
				 $this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
				 $this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


			}
			//Le ponemos un nombre al archivo que se va a generar.
			$archivo = "Guias_De_Carga_ECI.xls";
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
public function excelexport_fecha_ciudad_cedula($desde,$hasta,$cedula,$ciudad){
	$datas['desde'] = $desde;
	$datas['hasta'] = $hasta;
	$datas['ciudad'] = $ciudad;
	$datas['cedula'] = $cedula;
	$llamadas = $this->guias->get_fecha_cedula_ciudad($datas);
 if(count($llamadas) > 0){
		 //Cargamos la librería de excel.
		 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
		 $this->excel->getActiveSheet()->setTitle('Cargas');
		 //Contador de filas
		 $contador = 1;
		 //Le aplicamos ancho las columnas.
		 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
		 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

		 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
		 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
		 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
		 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
		 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
		 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
		 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
		 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
		 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
		 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
		 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
		 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
		 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
		 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
		 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
		 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
		 //Definimos la data del cuerpo.
		 foreach($llamadas as $l){
				//Incrementamos una fila más, para ir a la siguiente.
				$contador++;
				//Informacion de las filas de la consulta.
				$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
				$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
				$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
				$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
				$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
				$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
				$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
				$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
				$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
				$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
				$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
				$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
				$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
				$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
				$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
				$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
				$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
				$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
				$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
				$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
				$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
				$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
				$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
				$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


		 }
		 //Le ponemos un nombre al archivo que se va a generar.
		 $archivo = "Guias_De_Carga_FCC.xls";
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
public function excelexport_fecha_estado_ciudad($desde,$hasta,$estado,$ciudad){
	$datas['desde'] = $desde;
	$datas['hasta'] = $hasta;
	$datas['ciudad'] = $ciudad;
	$datas['estado'] = $estado;
	$llamadas = $this->guias->get_fecha_estado_ciudad($datas);
 if(count($llamadas) > 0){
		 //Cargamos la librería de excel.
		 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
		 $this->excel->getActiveSheet()->setTitle('Cargas');
		 //Contador de filas
		 $contador = 1;
		 //Le aplicamos ancho las columnas.
		 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
		 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

		 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
		 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
		 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
		 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
		 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
		 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
		 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
		 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
		 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
		 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
		 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
		 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
		 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
		 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
		 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
		 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
		 //Definimos la data del cuerpo.
		 foreach($llamadas as $l){
				//Incrementamos una fila más, para ir a la siguiente.
				$contador++;
				//Informacion de las filas de la consulta.
				$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
				$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
				$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
				$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
				$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
				$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
				$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
				$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
				$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
				$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
				$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
				$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
				$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
				$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
				$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
				$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
				$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
				$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
				$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
				$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
				$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
				$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
				$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
				$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


		 }
		 //Le ponemos un nombre al archivo que se va a generar.
		 $archivo = "Guias_De_Carga_FEC.xls";
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
public function excelexport_fecha_estado_cedula($desde,$hasta,$estado,$cedula){
	$datas['desde'] = $desde;
	$datas['hasta'] = $hasta;
	$datas['cedula'] = $cedula;
	$datas['estado'] = $estado;
	$llamadas = $this->guias->get_fecha_estado_cedula($datas);
 if(count($llamadas) > 0){
		 //Cargamos la librería de excel.
		 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
		 $this->excel->getActiveSheet()->setTitle('Cargas');
		 //Contador de filas
		 $contador = 1;
		 //Le aplicamos ancho las columnas.
		 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
		 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

		 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
		 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
		 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
		 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
		 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
		 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
		 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
		 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
		 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
		 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
		 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
		 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
		 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
		 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
		 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
		 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
		 //Definimos la data del cuerpo.
		 foreach($llamadas as $l){
				//Incrementamos una fila más, para ir a la siguiente.
				$contador++;
				//Informacion de las filas de la consulta.
				$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
				$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
				$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
				$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
				$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
				$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
				$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
				$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
				$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
				$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
				$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
				$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
				$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
				$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
				$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
				$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
				$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
				$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
				$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
				$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
				$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
				$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
				$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
				$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


		 }
		 //Le ponemos un nombre al archivo que se va a generar.
		 $archivo = "Guias_De_Carga_FECd.xls";
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
public function excelexport_fecha_estado_ciudad_cedula($desde,$hasta,$estado,$ciudad,$cedula){
	$datas['desde'] = $desde;
	$datas['hasta'] = $hasta;
	$datas['cedula'] = $cedula;
	$datas['ciudad'] = $ciudad;
	$datas['estado'] = $estado;
	$llamadas = $this->guias->get_fecha_estado_ciudad_cedula($datas);
 if(count($llamadas) > 0){
		 //Cargamos la librería de excel.
		 $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
		 $this->excel->getActiveSheet()->setTitle('Cargas');
		 //Contador de filas
		 $contador = 1;
		 //Le aplicamos ancho las columnas.
		 $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
		 $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
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
		 $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("W{$contador}")->getFont()->setBold(true);
		 $this->excel->getActiveSheet()->getStyle("X{$contador}")->getFont()->setBold(true);

		 $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CDR');
		 $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'FECHA');
		 $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'ORIGEN');
		 $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'DESTINO');
		 $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CEDULA CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DIRECCION CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TELFONO CLIENTE');
		 $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CEDULA REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'DIRECCION REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'TELEFONO REMITENTE');
		 $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'PIEZAS');
		 $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'KILOS');
		 $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'VOLUMEN');
		 $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'VALOR DECLARADO');
		 $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'VALOR SEGURO');
		 $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'DICE CONTENER');
		 $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'LIQUIDADOR');
		 $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'VALUACION');
		 $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'FORMA DE PAGO');
		 $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'VALOR DE ENVIO');
		 $this->excel->getActiveSheet()->setCellValue("W{$contador}", 'OTORS CARGOS');
		 $this->excel->getActiveSheet()->setCellValue("X{$contador}", 'TOTAL');
		 //Definimos la data del cuerpo.
		 foreach($llamadas as $l){
				//Incrementamos una fila más, para ir a la siguiente.
				$contador++;
				//Informacion de las filas de la consulta.
				$this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->id);
				$this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
				$this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->ciudad_origen);
				$this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->ciudad_destino);
				$this->excel->getActiveSheet()->setCellValue("E{$contador}", $l->cedula);
				$this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->nombre_empresa);
				$this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->direccion_cliente);
				$this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->telefono_cliente);
				$this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->cedula_remitente);
				$this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->contacto_remitente);
				$this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->direccion_remitente);
				$this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->telefono_remitente);
				$this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->cantidad);
				$this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->totalKilos);
				$this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->totalVolumen);
				$this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->valorDeclarado);
				$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->totalSeguro);
				$this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->dicecontener);
				$this->excel->getActiveSheet()->setCellValue("S{$contador}", $l->nombre." ".$l->apellido);
				$this->excel->getActiveSheet()->setCellValue("T{$contador}", $l->costeguia);
				$this->excel->getActiveSheet()->setCellValue("U{$contador}", $l->forma);
				$this->excel->getActiveSheet()->setCellValue("V{$contador}", $l->valor_flete);
				$this->excel->getActiveSheet()->setCellValue("W{$contador}", $l->otrosCargos);
				$this->excel->getActiveSheet()->setCellValue("X{$contador}", $l->total);


		 }
		 //Le ponemos un nombre al archivo que se va a generar.
		 $archivo = "Guias_De_Carga_FECC.xls";
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
