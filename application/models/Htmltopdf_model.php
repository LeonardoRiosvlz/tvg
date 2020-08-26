<?php
class Htmltopdf_model extends CI_Model
{
	function fetch()
	{

		 return $this->db
            ->select('*')
            ->from('certificados c')
            ->join('empleados emp', 'c.id_empleados = emp.id')
            ->where('status', 2)
            ->get();

	}
	function fetch_empleado_details($customer_id)
	{
		$this->db
            ->select('p.*,d.direccion_envio,d.telefono,d.direccion_facturacion, d.departamento, d.ciudad ,d.nombre, d.apellido, d.nit')
            ->from('pedido p')
            ->join('datos d', 'p.user_id = d.id_usuario')
            ->where('p.status','Pagado')
            ->where('n_guia',$customer_id);
		$data = $this->db->get();
		$output = '

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> TECNOVITAL Factura-'.$customer_id.'</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style>@import url(https://fonts.googleapis.com/css2?family=Abel&display=swap);
  			body, h1, h2, h3, h4, h5, h6{
    			font-family: "Abel", sans-serif;
 	 									}
  	</style>
		<div class="container">



		';
		foreach($data->result() as $row)
		{
			$output .= '
	<div class="row">
		<div class="col-xs-6">
			<img alt="" src="http://tecnovital.co/include/img/Imagotipo.jpg" width="150px" />
		</div>
		<div class="col-xs-6 text-center pr-2">
		<h6>FECHA :
			<a href="#">'.$row->fecha.'</a>
		</h6>
								<h6>NIT :<a href="#">N&uacute;mero de NIT</a></h6>
								<h6>AUTORIZACI&Oacute;N :<a href="#">N&uacute;mero de Aut.</a></h6>
								<h6>FACTURA :
									<a href="#">'.$row->n_guia.'</a>
								</h6>
		</div>

			</div>
			<div class="row">
					<div class="col-xs-12">
						<div class="panel panel-default">
						<div>


								<h6>Comprador :
									<a href="#">'.$row->nombre.' '.$row->apellido.'</a>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									NIT/CI :
									<a href="#">'.$row->nit.'</a>
								</h6>
						</div>
						</div>
					</div>
				</div>

				<table class="table">
					<thead >
						<tr>
							<th></th>
							<th style="text-align: left;">
								<h6 style="font-weight: bold;">Cantidad</h6>
							</th>
							<th style="text-align: left;">
								<h6 style="font-weight: bold;">Concepto</h6>
							</th>
							<th style="text-align: left;">
								<h6 style="font-weight: bold;">Precio unitario</h6>
							</th>
							<th style="text-align: left;">
								<h6 style="font-weight: bold;">IVA</h6>
							</th>
							<th style="text-align: left;">
								<h6 style="font-weight: bold;">Total</h6>
							</th>
						</tr>
					</thead>
						<tbody>
						';
		}
				foreach($data->result() as $row){
		$carro=$row->cart;

		foreach(json_decode($carro) as $row){
		$output .= '
		<tr>
			<td></td>
			<td style="text-align: left;">'.$row->cantidad.'</td>
			<td class=" text-left ">'.$row->pro_name.'</td>
			<td class=" text-left ">$'.$row->pro_price.'</td>
			<td class=" text-left ">$'.$row->impuesto_total.'</td>
			<td class=" text-left ">$'.$row->valor_neto.'</td>

		</tr>
		';}
		}
	foreach($data->result() as $row)
		{
		$todo=($row->total - $row->descuento );
		$todo=($todo+$row->transporte);
		$output .= '


		<tr >
			<td></td>
			<td></td>
			<td colspan="3" style="text-align: left;">Transporte</td>
			<td style="text-align: left; font-weight: bold;">$'.$row->transporte.'</td>
		</tr>
		<tr >
			<td colspan="1" style="text-align: left; font-weight: bold;">IVA total</td>
			<td style="text-align: left; font-weight: bold;">$'.$row->impuesto.'</td>
			<td colspan="1" style="text-align: left; font-weight: bold;">Subtotal</td>
			<td style="text-align: left; font-weight: bold;">$'.$row->total.'</td>
			<td colspan="1" style="text-align: left; font-weight: bold;">Descuento</td>
			<td style="text-align: left; font-weight: bold;">$'.$row->descuento.'</td>
		</tr>
		<tr >
			<td colspan="5" style="text-align: left; font-weight: bold;">Total</td>
			<td style="text-align: left;"><a href="#" >$'.$todo.'</a></td>
		</tr>
	</tbody>
</table>
</br>


	<div class="row">
			<div class="col-8">

				<div class="panel panel-info"  style="text-align: center;">
					<h6> "LA ALTERACI&Oacute;N, FALSIFICACI&Oacute;N O COMERCIALIZACI&Oacute;N ILEGAL DE ESTE DOCUMENTO ESTA PENADO POR LA LEY"</h6>
				</div>

		</div>
	</div>

</div>


</head>
<body>

</body>
</html>
		';}

		return $output;
	}

	function fetch_examen_details($customer_id)
	{
		$this->db
            ->select('e.*,t.*')
            ->from('examen_biomedico e')
            ->join('tipo_examen t', 'e.id_tipo_examen = t.id')
            ->where('excluyente', $customer_id);
		$data = $this->db->get();
		$output = '<table  width="100%" border="1"  cellspacing="0" cellpadding="0">';

		foreach($data->result() as $row)
		{
			$output .= '

			<tr >
			   <td><b>Examen</b>:'.$row->nombre_examen.'</td>
			   <td><b>Fecha</b>: '.$row->fecha_pautada.'</td>
			   <td><b>Vencimiento</b>: '.$row->vencimiento.'</td>
			   <td><b>Aptitud</b>: '.$row->aptitud.'</td>
			 <tr >
				<td colspan="4"><b>Concepto</b>: '.$row->concepto.'</td>

			</tr>






		';
		}
		$output .= '


		</tr>
		';
		$output .= '</table>';
		return $output;
	}

	function fetch_empleado_detail($customer_id)
	{
		$this->db
            ->select('c.*,emp.*,p.nombre AS proyec')
            ->from('certificados c')
            ->join('empleados emp', 'c.id_empleados = emp.id')
            ->join('proyectos p', 'emp.id_proyecto = p.id')
            ->where('status', 2)
            ->where('serial', $customer_id);
		$data = $this->db->get();
		$output = '<br><table width="100%" cellspacing="1" cellpadding="0">';
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
				<td width="25%"><b>Citerio general:</b>'.$row->criterio.'</td>

		';
		}
		$output .= '
		<tr>

		</tr>
		';
		$output .= '</table>';
		return $output;
	}
}


?>
