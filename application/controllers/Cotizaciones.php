<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cotizaciones extends MY_Controller {
	private $request;
	public function __construct(){
		parent::__construct();
		$this->load->model('Cotizaciones_model', 'cotizaciones');
		$this->load->model('Archivos_model', 'archivos');
	  $this->load->library('Pdf');
	  }
    public function index() {
			if( ! $this->verify_min_level(1)){
				redirect (base_url());
			}
     		$this->is_logged_in();
        $this->load->view('header',["css"=>[""]]);
        $this->load->view('menu');
        $this->load->view('Cotizaciones/index');
        $this->load->view('footer',["js"=>[""]]);
      }
			public function getcotizaciones($id=0) {

				  $data['cotizaciones'] = $this->cotizaciones->getcotizaciones();
				  header('Content-Type: application/json');
				  echo json_encode(['cotizaciones' => $data['cotizaciones']]);

				}
				public function getcotizacionesu($id=0) {
						$id= $this->input->post('id');
						$data['cotizaciones'] = $this->cotizaciones->getcotizacionesu($id);
						header('Content-Type: application/json');
						echo json_encode(['cotizaciones' => $data['cotizaciones']]);

					}
					public function getcc($id=0) {
							$id= $this->input->post('id_cliente');
							$data['cotizacionesCliente'] = $this->cotizaciones->getcc($id);
							header('Content-Type: application/json');
							echo json_encode(['cotizacionesCliente' => $data['cotizacionesCliente']]);

						}
						public function getcca($id=0) {
								$id= $this->input->post('id_cliente');
								$data['cotizacionesCliente'] = $this->cotizaciones->getcca($id);
								header('Content-Type: application/json');
								echo json_encode(['cotizacionesCliente' => $data['cotizacionesCliente']]);

							}
				public function getcotizacion($id=0) {
						$data['id']= $this->input->post('id');
						$data['codigo']= $this->input->post('codigo');
					  $data['cotizaciones'] = $this->cotizaciones->getcotizacion($data);
					  header('Content-Type: application/json');
					  echo json_encode(['cotizaciones' => $data['cotizaciones']]);

					}
			public function insertar() {
				if( ! $this->verify_min_level(1)){
					redirect (base_url());
				}

				$data = json_decode($this->input->post('service_form'),true);
				$data['id']    = $this->cotizaciones->get_unused_id();
				$data['codigo']= dechex($data['id']);
				$result = $this->cotizaciones->insertar($data);
					if($result['code'] == 0){
						if ($data['recalculada']==="Si") {
							$result = $this->cotizaciones->inseRecalculada($data);
						}
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
				if ($data['renegociar']==="Si") {
					$data['estatus_gestion']="Renegociado";
				}else{
					$data['estatus_gestion']="Borrador";
				}
				$result = $this->cotizaciones->editar($data);
					if($result['code'] == 0){
						if ($data['recalculada']==="Si") {
							$results = $this->cotizaciones->inseRecalculada($data);
						}
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
					 if( ! $this->verify_min_level(1)){
							 redirect (base_url());
						 }
					 $config['upload_path']          = './include/files';
					 $config['allowed_types']        = 'jpg|png|jpeg|pdf';
					 $config['max_size']             = 75000;
					 $config['max_width']            = 25000;
					 $config['max_height']           = 14000;
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
						  $data['nombre'] = $upload_data['file_name'];
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
					 if( ! $this->verify_min_level(1)){
								 redirect (base_url());
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
											 $this->email->to($data['correo_cliente']);
											 $this->email->subject( "Cotizacion ");
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
											                                                                                         <h2>Cotización</h2>
											                                                                                     </td>
											                                                                                 </tr>
																																																			 <tr>
																																																					 <td class="esd-block-text es-p5b" align="left">
																																																							 <h2>Estimados Señores:</h2>
																																																					 </td>
																																																			 </tr>
											                                                                                 <tr>
											                                                                                     <td class="esd-block-text es-m-txt-c es-p10b" align="left">
											                                                                                         <p style="color: #333333;">'.$data['saludo'].'</p>
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
																																																				 	<a href="'.base_url($data['url_gestion']).'" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none !important;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;font-size:16px;color:#333333;border-style:solid;border-color:#3D85C6;border-width:5px 30px 5px 30px;display:inline-block;background:#3D85C6;border-radius:0px;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center"> GESTIONAR </a>
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
											                                         <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600">
											                                             <tbody>
											                                                 <tr>
											                                                     <td class="es-p20t es-p20r es-p20l esd-structure" align="left">
											                                                         <table cellpadding="0" cellspacing="0" width="100%">
											                                                             <tbody>
											                                                                 <tr>
											                                                                     <td width="560" class="esd-container-frame" align="center" valign="top">
											                                                                         <table cellpadding="0" cellspacing="0" width="100%">
											                                                                             <tbody>
											                                                                                 <tr>
																																																			 <td align="center" class="esd-block-button"><span class="es-button-border">
																																																			 		<a href="'.base_url($data['url_pdf']).'" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none !important;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;font-size:16px;color:#333333;border-style:solid;border-color:#3D85C6;border-width:5px 30px 5px 30px;display:inline-block;background:#3D85C6;border-radius:0px;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center"> Descargar PDF </a>
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
												 $data = json_decode($this->input->post('service_form'),true);
												 $data['id_archivo']= $this->archivos->get_unused_id();
												 $data['tipo']="Cotizacion";
												 $data['tipo_archivo']="PDF";
												 $result = $this->archivos->insertar_cotizacion($data);
													 if($result['code'] == 0){
														 $results = $this->cotizaciones->generar_enviar($data);
														 echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
													 }
													 else{
														 echo json_encode(['status' => '500', 'message' => $data['id_archivo']]);
													 }
											 }else{
												echo json_encode(['status' => '500', 'message' => $data['id_archivo']]);
											 }

					}
					public function generar(){
						$data = json_decode($this->input->post('service_form'),true);
						$data['id_archivo']= $this->archivos->get_unused_id();
						$data['tipo']="Cotizacion";
						$data['tipo_archivo']="PDF";
						$result = $this->archivos->insertar_cotizacion($data);
							if($result['code'] == 0){
								$results = $this->cotizaciones->generar($data);
								echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
							}
							else{
								echo json_encode(['status' => '500', 'message' => $data['id_archivo']]);
							}
					 }
					public function soloenviar(){
							$data = json_decode($this->input->post('service_form'),true);
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
											 $this->email->to($data['correo_cliente']);
											 $this->email->subject( "Cotizacion ");
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
												 .rollover div {
												 	font-size:0;
												 }
												 .rollover:hover .rollover-first {
												 	max-height:0px!important;
												 	display:none!important;
												 }
												 .rollover:hover .rollover-second {
												 	max-height:none!important;
												 	display:inline-block!important;
												 }
												 #outlook a {
												 	padding:0;
												 }
												 .ExternalClass {
												 	width:100%;
												 }
												 .ExternalClass,
												 .ExternalClass p,
												 .ExternalClass span,
												 .ExternalClass font,
												 .ExternalClass td,
												 .ExternalClass div {
												 	line-height:100%;
												 }
												 .es-button {
												 	mso-style-priority:100!important;
												 	text-decoration:none!important;
												 }
												 a[x-apple-data-detectors] {
												 	color:inherit!important;
												 	text-decoration:none!important;
												 	font-size:inherit!important;
												 	font-family:inherit!important;
												 	font-weight:inherit!important;
												 	line-height:inherit!important;
												 }
												 .es-desk-hidden {
												 	display:none;
												 	float:left;
												 	overflow:hidden;
												 	width:0;
												 	max-height:0;
												 	line-height:0;
												 	mso-hide:all;
												 }
												 @media only screen and (max-width:600px) {p, ul li, ol li, a { font-size:16px!important; line-height:150%!important } h1 { font-size:30px!important; text-align:center; line-height:120%!important } h2 { font-size:26px!important; text-align:center; line-height:120%!important } h3 { font-size:20px!important; text-align:center; line-height:120%!important } h1 a { font-size:30px!important } h2 a { font-size:26px!important } h3 a { font-size:20px!important } .es-menu td a { font-size:13px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:16px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } .es-button { font-size:16px!important; display:block!important; border-left-width:0px!important; border-right-width:0px!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } }
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
											                                                                                         <h2>Cotización</h2>
											                                                                                     </td>
											                                                                                 </tr>
																																																			 <tr>
																																																					 <td class="esd-block-text es-p5b" align="left">
																																																							 <h2>Reciba un cordial saludo</h2>
																																																					 </td>
																																																			 </tr>
											                                                                                 <tr>
											                                                                                     <td class="esd-block-text es-m-txt-c es-p10b" align="left">
											                                                                                         <p style="color: #333333;">'.$data['saludo'].'</p>
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
											                                                                                     <td class="esd-block-button es-p10b" align="left"><span class="es-button-border"><a href="'.base_url($data['url_gestion']).'" class="es-button" target="_blank">Gestionar</a></span></td>
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
											                                         <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600">
											                                             <tbody>
											                                                 <tr>
											                                                     <td class="es-p20t es-p20r es-p20l esd-structure" align="left">
											                                                         <table cellpadding="0" cellspacing="0" width="100%">
											                                                             <tbody>
											                                                                 <tr>
											                                                                     <td width="560" class="esd-container-frame" align="center" valign="top">
											                                                                         <table cellpadding="0" cellspacing="0" width="100%">
											                                                                             <tbody>
											                                                                                 <tr>
											                                                                                     <td align="center" class="esd-block-button"><span class="es-button-border"><a href="'.base_url($data['url_pdf']).'" class="es-button" target="_blank">Descargar PDF</a></span></td>
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

												 $data['id_archivo']= $this->archivos->get_unused_id();
												 $data['tipo']="Cotizacion";
												 $data['tipo_archivo']="PDF";
												 $result = $this->cotizaciones->generar_enviar($data);
													 if($result['code'] == 0){

														 echo json_encode(['status' => '200', 'message' => 'Agregado exitosamente']);
													 }
													 else{
														 echo json_encode(['status' => '500', 'message' => $data['id_archivo']]);
													 }

											 }else{
												echo json_encode(['status' => '500', 'message' => $data['id_archivo']]);
											 }

					}

					public function estudio() {
					    $data['id']= json_decode($this->input->post('id'),true);
							$data['codigo'] = json_decode($this->input->post('codigo'),true);
						$result = $this->cotizaciones->estudio($data);
							if($result['code'] == 0){
								echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
							}
							else{
								echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
							}
						}
						public function editarEstad() {
							$data['id']= $this->input->post('id');
							$data['estatus_gestion'] = $this->input->post('estatus_gestion');
							$result = $this->cotizaciones->editarEstads($data);
								if($result['code'] == 0){
									echo json_encode(['status' => '200', 'message' => 'editado exitosamente']);
								}
								else{
									echo json_encode(['status' => '500', 'message' => 'no creado, ha ocurrido un error']);
								}
							}
					public function verid(){
						echo $this->archivos->get_unused_id();
					}

					public function Cotizaciones_to_pdf($codigo,$id){
						$this->load->library('Pdf');
						 $hoy=date("d/m/y");
						 $html_content = $this->cotizaciones->fetch_details($codigo,$id);
						 //$this->pdf->set_paper('letter', 'landscape');
						 $this->pdf->loadHtml($html_content);
						 $this->pdf->render();
						 $this->pdf->stream("COT-".$id.".pdf", array("Attachment"=>0));

				 }
				 public function cot(){
					 $this->load->view('header',["css"=>[""]]);
					 $this->load->view('menu_blank',["css"=>[""]]);
					 $this->load->view('Cotizaciones/gestion');
					 $this->load->view('footer',["js"=>[""]]);
				 }
}
