<?php 

require_once "../../../controladores/cotizaciones.controlador.php";
require_once "../../../modelos/cotizaciones.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/empresas.controlador.php";
require_once "../../../modelos/empresas.modelo.php";


require_once('tcpdf_include.php');

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
       
       
       
        $image_file = K_PATH_IMAGES.'growin.jpg';
        $this->Image($image_file, 71, 3, 4, 4, 'JPG', '', 'C', false, 5, '', false, false, 0, false, false, false);

        $this->SetFont('helvetica', '',5, '');
        $this->Cell(0, 0, 'Sistema Administrativo-Contable GROWIN, Sitio Web: www.growinrd.com', 0, false, 'C', 0, '', 0,0, 'M', 'M');

        

         
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', '', 8);
        // Page number
        $this->Cell(0, 10, 'Pagina '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}


class imprimirCotizacion{
	 

	public $Cotizacion;

	public function traerImpresionCotizacion(){

		/**************************************
				Traer la informacion Ventas
		*****************************************/

$id = "id";

$valoridCotizacion = $this->Cotizacion;

$respuestaVenta = ControladorCotizaciones::ctrMostrarImprimirCotizacion($id, $valoridCotizacion);
$Rnc_Empresa_Venta = $respuestaVenta["Rnc_Empresa_Cotizacion"];
$Codigo = $respuestaVenta["Codigo"];
$NCF_Factura = $respuestaVenta["NCF_Cotizacion"];

$Producto = json_decode($respuestaVenta["Producto"], true);
$Neto = number_format($respuestaVenta["Neto"], 2);
$Impuesto = number_format($respuestaVenta["Impuesto"], 2);
$Total = number_format($respuestaVenta["Total"], 2);
$Observaciones = $respuestaVenta["Observaciones"];

$fechaano = substr($respuestaVenta["FechaAnoMes"], 0, 4);
$fechames = substr($respuestaVenta["FechaAnoMes"], -2);
$fechadia = $respuestaVenta["FechaDia"];


$Fecha = $fechaano."/".$fechames."/".$fechadia;


/***************************************
	TRAEMOS LA INFORMACION DEL CLIENTE
****************************************/

$id = "id";

$valorid = $respuestaVenta["id_Cliente"];

$respuestaCliente = ControladorClientes::ctrModalEditarClientes($id, $valorid);

$Nombre_Cliente = $respuestaCliente["Nombre_Cliente"];
$Documento = $respuestaCliente["Documento"];
$Email = $respuestaCliente["Email"];
$Telefono_Cliente = $respuestaCliente["Telefono"];




/****************************************
	TRAEMOS LA INFORMACION DEL VENDEDOR
*****************************************/

$idUsuario = $respuestaVenta["id_Vendedor"];
$respuestaVendedor = ControladorUsuarios::ctrModalEditarUsuario($id, $idUsuario);

/****************************************
	TRAEMOS LA INFORMACION DEL VENDEDOR
*****************************************/

$tabla = "empresas";
$taRncEmpresa = "Rnc_Empresa";
 $taRnc_Empresa_Master = "Rnc_Empresa_Master";
 $Rnc_Empresa = $Rnc_Empresa_Venta;
 $Rnc_Empresa_Master = null;
 $Orden = "id";


$respuestaEmpresa = ModeloEmpresas::mdlMostrarEmpresas($tabla, $taRncEmpresa, $Rnc_Empresa, $taRnc_Empresa_Master, $Rnc_Empresa_Master, $Orden);
$Logo = $respuestaEmpresa["Logo"];
$Nombre = $respuestaEmpresa["Nombre_Empresa"];
$Descripcion_Empresa = $respuestaEmpresa["Descripcion_Empresa"];
$Direccion = $respuestaEmpresa["Direccion_Empresa"];
$Telefono = $respuestaEmpresa["Telefono_Empresa"];
$Correo = $respuestaEmpresa["Correo_Empresa"];

$faccolor1 = $respuestaEmpresa["faccolor1"];
$faccolor2 = $respuestaEmpresa["faccolor2"];
$faccolor3 = $respuestaEmpresa["faccolor3"];


/********************************************
        REQUERIMOS LA CLASE TCPDF
*********************************************/




// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);



// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins

$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


// set font
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();

$bloque1 = <<<EOF

	<table style="font-size:10px; padding:3px 3px">
	<tr>
			<td style="width:100px"><img src="../../../$Logo"></td>
			
			<td style="width:440px; font-size:15px; text-align:center">$Nombre<br>$Descripcion_Empresa</td>
			

	</tr>
	
	


	<tr>		
			<td style="width:100px; font-size:10px; text-align:right"></td>
			<td style="width:150px; font-size:10px; text-align:right">N° de Control:</td>
			<td style="width:100px; font-size:10px; text-align:left">$Codigo</td>
			<td style="width:180px; font-size:10px; text-align:right">COTIZACION</td>
			
	</tr>

		<tr>
			<td style="width:270px; background-color:$faccolor1;?>; text-align:center">SUPLIDOR</td>
			<td style="width:270px; background-color:$faccolor1; text-align:center">DATOS DE LA COTIZACIÓN</td>

		</tr>
		<tr>
			<td style="width:70px">Nombre:</td>
			<td style="width:250px">$Nombre</td>
			<td style="width:100px">COTIZACIÓN N°</td>
			<td style="width:80px">$NCF_Factura</td>




		</tr>

		<tr>
			<td style="width:70px">RNC:</td>
			<td style="width:250px">$Rnc_Empresa_Venta</td>
			<td style="width:100px">Valido</td>
			<td style="width:100px">15 Días</td>


		</tr>

		<tr>
			<td style="width:70px">Fecha:</td>
			<td style="width:250px">$Fecha</td>
			


		</tr>

		<tr>
			<td style="width:70px">Dirección:</td>
			<td style="width:440px">$Direccion</td>
			

		</tr>

		<tr>
			<td style="width:70px">Correo:</td>
			<td style="width:250px">$Correo</td>
			<td style="width:80px">Teléfono:</td>
			<td style="width:160px">$Telefono</td>


		</tr>

		<tr>
			<td style="background-color:white; width:540px"></td>
			
		</tr>		

	</table>


EOF;

$pdf->writeHtml($bloque1, false, false, false, false, '');

/**************SEGUNDO BLOQUE DE IMPRESION DE CLIENTE**********/

$bloque2 = <<<EOF

		<table style="font-size:10px; padding:3px 3px">

		<tr>
			<td style="background-color:$faccolor2; width:540px; text-align:center">CLIENTE</td>
		</tr>	

		<tr>
			<td style="width:70px">Nombre:</td>
			<td style="width:250px">$Nombre_Cliente</td>
			<td style="width:80px">RNC:</td>
			<td style="width:100px">$Documento</td>
		</tr>	
		<tr>
			<td style="width:70px">Correo:</td>
			<td style="width:250px">$Email</td>
			<td style="width:80px">Teléfono:</td>
			<td style="width:100px">$Telefono_Cliente</td>
			
		</tr>

		<tr>
			<td style="background-color:$faccolor3; width:540px; text-align:center">OBSERVACIONES DE LA COTIZACIÓN</td>
		</tr>

		<tr>
			<td width:540px>$Observaciones</td>
		</tr>	


		</table>


EOF;

$pdf->writeHtml($bloque2, false, false, false, false, '');

/******************CIERRE DE BLOQUE****************************/

/**************TERCER BLOQUE DE IMPRESION DE DE TITULOS DE TABLA**********/

$bloque3 = <<<EOF

		<table style="font-size:10px; padding:5px 10px">

			<tr>

				<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Cantidad</td>
				<td style="border: 1px solid #666; background-color:white; width:260px; text-align:center">Producto</td>
				<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Valor Unit</td>
				<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Valor Total</td>

			</tr>


		</table>

EOF;

$pdf->writeHtml($bloque3, false, false, false, false, '');

/**************************CIERRE DE BLOQUE 3*******************/

foreach ($Producto as $key => $item) {
$id = "Descripcion";
$idProducto = $item["descripcion"];




$respuestaProductos = ControladorProductos::ctrMostrarProductosid($id, $idProducto);

$valorUnitario = number_format($item["precio"], 2);

$PrecioTotal = number_format($item["total"], 2);

$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px">

	<tr>

		<td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">$item[cantidad]</td>


		<td style="border: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center">$item[descripcion]</td>

		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">$valorUnitario</td>

		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">$PrecioTotal</td>


	</tr>

	</table>



		
			
EOF;


$pdf->writeHtml($bloque4, false, false, false, false, '');

}


$bloque5 = <<<EOF

	<table style="font-size:10px; padding: 5px 10px;">

		<tr>
			<td style="color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>
				
		</tr>

		<tr>
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Sub-Total RD$:</td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">$Neto</td>
				
		</tr>

		<tr>
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">ITBIS 18 %</td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">$Impuesto</td>
				
		</tr>

		<tr>
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Monto Factura RD$:</td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">$Total</td>
				
		</tr>

		<tr>
			<td style="background-color:white; width:340px; text-align:center"></td>

			<td style="background-color:white; width:100px; text-align:center"></td>

			<td style="background-color:white; width:100px; text-align:center"></td>
				
		</tr>


		<tr>
			<td style="background-color:white; width:340px; text-align:center">Firma Autorizado</td>

			<td style="background-color:white; width:100px; text-align:center">ORIGINAL:</td>

			<td style="background-color:white; width:100px; text-align:center">CLIENTE</td>
				
		</tr>

		<tr>
			<td style="background-color:white; width:340px; text-align:center"></td>

			<td style="background-color:white; width:100px; text-align:center">COPIA:</td>

			<td style="background-color:white; width:100px; text-align:center">EMPRESA</td>
				
		</tr>

		


	</table>
			
EOF;

$pdf->writeHtml($bloque5, false, false, false, false, '');


/**************************************
SALIDA DEL ARCHVIO
***************************************/



$pdf->Output('cotizacion.pdf');

}

}

$Cotizacion = new imprimirCotizacion();
$Cotizacion -> Cotizacion = $_GET["Cotizacion"];
$Cotizacion -> traerImpresionCotizacion();

 ?>

