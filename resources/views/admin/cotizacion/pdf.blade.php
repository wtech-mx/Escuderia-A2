<!DOCTYPE html>
		<html>

		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>COTIZACION CHECKNGO</title>

		</head>

		<style type="text/css" media="screen">
			body{

			}
			.img-log{
				padding: 20px;
				width:50%;
			}

			.cotizacion{
				position: absolute;
				right: 3%;
				top: 0%;
				padding: 30px;
				font-size: 80px;
			}
			.fecha{
				position: absolute;
				right: 3%;
				padding: 30px;
				font-size: 30px;
			}
			.mensaje{
				padding: 20px 0px 0px 0px;
			}
			.from{
				font-size: 40px;
			}
			.para{
				font-size: 20px;
			}
			.tabla-completa{
				width: 100%;
				padding: 30px;
			}
			.tabla-azul{
				padding: 100px;
			}
			.tr{
				background-color: #1993B8;
				height: 40px;
			}
			td{
				height: 40px;
			}
			tbody{
				text-align: center;
				font-size: 120%;
			}
			.costos{
				position: absolute;
				right: 5%;
				padding: 30px;
				font-size: 20px;
			}
			.totalsub{
				padding: 30px;
			}
			.sub{
				padding: 30px;
			}
			.tota{
				padding: 30px;
			}
			.datos-contacto{
				font-size: 20px;
				text-decoration: none;
			}
			.gracias{
				position: absolute;
				right: 5%;
				padding: 30px;
				font-size: 30px;
			}
			.footer{

			}
			.pag{
				position: absolute;
				text-decoration: none;
				color: #fff;
				left: 40%;
				display:block;
			}
			.container{
				z-index: 1000;
			}

		</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<body style="background-color: #191E25 ;">
		    <div class="container">
			<div class="row">
				<div class="col-md-4 mt-5 img-log">
					<img alt="Bootstrap Image Preview" src="https://checkn-go.com.mx/img/logo-check.png" style="padding:20px;width:50%;z-index: 1000;position: relative;">
				</div>
				<div class="col-md-8 mt-5">
					<h1 class="display-3 text-right cotizacion" style="color: #1993B8;position: absolute;right: 3%;top: 0%;padding: 30px;font-size: 80px;">
						<strong>Cotización</strong>
					</h1>
					<h3 class="display-6 text-right  text-white fecha" style="color: #ccc;position: absolute;right: 3%;padding: 30px;font-size: 30px;">
						<strong>FECHA:</strong>30/12/2021;
					</h3>
				</div>
			</div>

			<div class="row mensaje" style="padding: 20px 0px 0px 0px;position: relative;">
				<div class="col-md-3">
					<blockquote class="blockquote">
						<p class="mb-0 display-4 from" style="color: #1993B8;font-size: 40px;">
							<strong>Hola </strong>
						</p>
						<p class="blockquote-footer text-white para" style="color: #ccc;font-size: 20px;">
						Alejandro
						</p>
					</blockquote>
				</div>
				<div class="col-md-9">
				</div>
			</div>

			<div class="row mt-5" style="position: relative;">
				<div class="col-md-12">
					<table id="ejemplo" class="table text-white tabla-completa" style="color: #ccc;width: 100%;padding: 30px;">
						<thead class="tabla-azul" style="padding: 100px;">
							<tr class="tr" style="background-color: #1993B8;height: 40px;">
								<th >
									Refacción
								</th>
								<th>
									Cantidad
								</th>
								<th>
									Mano de Obra
								</th>
								<th>
									Importe
								</th>
							</tr>
						</thead>

						<tbody style="text-align: center;font-size: 120%;">
                            @foreach ($taller as $item)
							<tr>
								<td>
									{{$item->refaccion}}
								</td>
								<td>
                                    {{$item->cantidad}}
								</td>
								<td>
									{{$item->importe_unitario}}
								</td>
								<td>
									{{$item->importe_total}}
								</td>
							</tr>
                            @endforeach
						</tbody>
					</table>
				</div>
			</div>
@php
    $total= $importe_unitario + $importe_total;
@endphp
			<div class="row">
				<div class="col-md-9" style="position: relative;">
				</div>
				<div class="col-md-3 costos">
					<address class="text-white totalsub" style="color: #ccc">
						 <strong id="sub" class="p-4 sub"> </strong>Subtotal ${{$importe_unitario}}<br>
						 <strong id="total" class="p-4 tota"> </strong>Total ${{$total}} <br>
					</address>
				</div>
			</div>

			<div class="row mt-5">
				<div class="col-md-6">
					<address class="text-white datos-contacto" style="color: #ccc;font-size: 20px;text-decoration: none;">
						 <p>
						<ul style="color: #ccc"><strong>Nota: estos precios no Incluyen IVA</strong>
							<li>Atentamente: Dir. Comercial Alejandro</li>
							<li>Email: <a style="text-decoration: none;color:#fff" href="mailto:adiazm@eago.com.mx?subject=cotizacion" "email me">adiazm@eago.com.mx</a></li>
							<li>Telefono:<a style="text-decoration: none;color:#fff" href="tel:56 20453763" title="">5620453763</a></li>
						</ul>
						  </p><br>
					</address>
				</div>
				<div class="col-md-6 gracias" style="position: absolute;right: 5%;padding: 30px;font-size: 30px;">
					<h3 class="display-4 text-right" style="color: #1993B8">
						<strong>GRACIAS!</strong>
					</h3>
				</div>
			</div>
			<div class="contenedor-azul"style="background-color:#1993B8;position: absolute;width: 60%;height:1%;left: 20%;right: 20%;">
			</div>

			<div class="row footer">
				<div class="col-md-12">
					<h3 class="text-center text-white " style="color: #ccc">
						<a  class="text-center text-white pag" href="https://checkn-go.com.mx" target="blank" title="pagina eago" style="position: absolute;text-decoration: none;color: #fff;left: 40%;display:block;">checkn-go.com.mx
						</a>
					</h3>
				</div>
			</div>
		</div>

		</body>


		</html>
