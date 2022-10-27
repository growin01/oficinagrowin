<?php 

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

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
       
       
       
        $this->StartTransform();
        $this->Rotate(-90);
       

        $image_file = K_PATH_IMAGES.'texto_Growin.jpg';
        $this->Image($image_file, 171, 10, 100, 5, 'JPG', '', 'R', false, 300, '', false, false, 0, false, false, false);

        //$this->SetFont('helvetica', '',5, '');
        //$this->Cell(0, 0, 'Sistema Administrativo-Contable GROWIN, Sitio Web: www.growinrd.com', 0, 0, 'C', 0, 0, 0,0, 'M', 'M');


 
        $this->StopTransform();
        

         
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



class imprimirFactura{

	
	public $Codigo;

	public function traerImpresionFactura(){

		/**************************************
				Traer la informacion Ventas
		*****************************************/

$id = "id";

$valorCodigo = $this->Codigo;

$respuestaVenta = ControladorVentas::ctrMostrarVentaImprimirFactura($id, $valorCodigo);
$Rnc_Empresa_Venta = $respuestaVenta["Rnc_Empresa_Venta"];
$Codigo = $respuestaVenta["Codigo"];
$NCF_Factura = $respuestaVenta["NCF_Factura"];

$Producto = json_decode($respuestaVenta["Producto"], true);
$Neto = number_format($respuestaVenta["Neto"], 2);
$Impuesto = number_format($respuestaVenta["Impuesto"], 2);
$Total = number_format($respuestaVenta["Total"], 2);
$Metodo_Pago = $respuestaVenta["Metodo_Pago"];
$Observaciones = $respuestaVenta["Observaciones"];

$fechaano = substr($respuestaVenta["FechaAnoMes"], 0, 4);
$fechames = substr($respuestaVenta["FechaAnoMes"], -2);
$fechadia = $respuestaVenta["FechaDia"];


$Fecha = $fechadia."-".$fechames."-".$fechaano;
$Forma_De_Pago_607 = $Metodo_Pago;

											switch ($Forma_De_Pago_607){
												case "01":
       											$Tipo_Pago_607 = "01-EFECTIVO";
       											break;

        										case "02":
       											$Tipo_Pago_607 = "02-CHEQUES/TRANSFERENCIAS/DEPOSITO";
        										break;

        										case "03":
       											$Tipo_Pago_607 = "03-TARJETA CREDITO/DEBITO";
        										break;

        										case "04":
       											 if($Rnc_Empresa_Venta == "131385992"){
                                                    $Tipo_Pago_607 = "Al Contado";

                                                }else{
                                                    $Tipo_Pago_607 = "04-VENTA A CREDITO";

                                                }
       											break;
       											

        										case "05":
       											$Tipo_Pago_607 = "05-BONOS CERTIFICADOS REGALOS";
       											break;
       											
        										
        										case "06":       											
       											$Tipo_Pago_607 = "06-PERMUTAS";
       											
        										break;

        										case "07":       											
       											$Tipo_Pago_607 = "07-OTRAS FORMAS DE VENTAS";
       											
        										break;

        										
											}


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
if($respuestaEmpresa["Logo"] == ""){

$Logo = "extensiones/tcpdf/pdf/images/Blanco.jpg";
    
}else{
$Logo = $respuestaEmpresa["Logo"];

}

if($respuestaEmpresa["Sello"] == ""){

$Sello = "extensiones/tcpdf/pdf/images/Blanco.jpg";
    
}else{
$Sello = $respuestaEmpresa["Sello"];

}

$Nombre = $respuestaEmpresa["Nombre_Empresa"];
$Descripcion_Empresa = $respuestaEmpresa["Descripcion_Empresa"]; 
$Direccion = $respuestaEmpresa["Direccion_Empresa"];
$Telefono = $respuestaEmpresa["Telefono_Empresa"];
$Correo = $respuestaEmpresa["Correo_Empresa"];

$faccolor1 = $respuestaEmpresa["faccolor1"];
$faccolor2 = $respuestaEmpresa["faccolor2"];
$faccolor3 = $respuestaEmpresa["faccolor3"];


$ancho = $respuestaEmpresa["ancho"]."px";

$resto = 540-$respuestaEmpresa["ancho"];
$anchoresto = $resto."px";

$largo = $respuestaEmpresa["largo"]."px";
$valorsello = (340-$respuestaEmpresa["ancho"])/2;        
$restosello = round($valorsello);

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
$pdf->startPageGroup();

$pdf->AddPage();
// set font

$bloque1 = <<<EOF

	<table style="font-size:10px; padding:3px 3px">
	<tr>
	<td style="width:50px; font-size:20px; text-align:center"></td>		
	<td style="width:440px; font-size:20px; text-align:center">$Descripcion_Empresa</td>
	<td style="width:50px; font-size:20px; text-align:center"></td>
			
			

	</tr>
		<tr>
		<td style="width:540px; font-size:20px; text-align:center"></td>				

	</tr>
	<tr>
			
			<td style="width:100px; font-size:10px; text-align:right"></td>
			<td style="width:150px; font-size:10px; text-align:right">N° de Control:</td>
			<td style="width:100px; font-size:10px; text-align:left">$Codigo</td>
			<td style="width:180px; font-size:10px; text-align:right">NO VALIDA PARA CRÉDITO FISCAL</td>
			
	</tr>

		<tr>
			
			<td style="width:540px; background-color:$faccolor1; text-align:center">DATOS DEL COMPROBANTE</td>

		</tr>
		<tr>
			<td style="width:80px">N°:</td>
			<td style="width:180px">$NCF_Factura</td>
			<td style="width:100px">Valido Hasta:</td>
			<td style="width:180px">31-12-2023</td>





		</tr>

		

		<tr>
			<td style="width:80px">Fecha:</td>
			<td style="width:180px">$Fecha</td>
			<td style="width:100px">Forma de Pago:</td>
			<td style="width:180px">$Tipo_Pago_607</td>


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
			<td style="background-color:$faccolor3; width:540px; text-align:center">OBSERVACIONES DEL COMPROBANTE</td>
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

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Monto Total RD$:</td>

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
            <td style="background-color:white; width:100px; text-align:center"></td>
       
            <td style="background-color:white; width:140px; text-align:center"></td>
       
            <td style="background-color:white; width:100px; text-align:center"></td>

            <td style="background-color:white; width:100px; text-align:center">COPIA:</td>

            <td style="background-color:white; width:100px; text-align:center">EMPRESA</td>
                
        </tr>
		


	</table>
			
EOF;

$pdf->writeHtml($bloque5, false, false, false, false, '');



/**************************************
SALIDA DEL ARCHVIO
***************************************/

$pdf->Output('factura.pdf');

}

}

$factura = new imprimirFactura();
$factura -> Codigo = $_GET["Codigo"];
$factura -> traerImpresionFactura();

 ?>

