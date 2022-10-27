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

public $footer_content;
public function Footer() {

        // Position at 15 mm from bottom
        $this->SetY(-25);
        // Set font
        $this->SetFont('helvetica', '', 8);
        // Page number
        $this->Cell(0, 10, $this->footer_content.' Pagina '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 'T', false, 'C', 0, '', 0, false, 'T', 'M');
    }
         
    

    // Page footer
    
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
$PorDescuento = $respuestaVenta["Pordescuento"];
$Descuento = $respuestaVenta["Descuento"];
$Neto = number_format($respuestaVenta["Neto"], 2);
$Impuesto = number_format($respuestaVenta["Impuesto"], 2);
$Total = number_format($respuestaVenta["Total"], 2);
$Metodo_Pago = $respuestaVenta["Metodo_Pago"];
$Observaciones = $respuestaVenta["Observaciones"];

$fechaano = substr($respuestaVenta["FechaAnoMes"], 0, 4);
$fechames = substr($respuestaVenta["FechaAnoMes"], -2);
$fechadia = $respuestaVenta["FechaDia"];

$Moneda = $respuestaVenta["Moneda"];
$Tasa = $respuestaVenta["Tasa"];


if($Moneda == "USD"){
$TextoTasa = "Tasa DOP: ".$Tasa;

}else{
    $TextoTasa = "";

}

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
                                                $Tipo_Pago_607 = "04-VENTA A CREDITO";
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
$TituloNombre = $respuestaEmpresa["NombreEmpresaFactura"];
$Descripcion_Empresa = $respuestaEmpresa["Descripcion_Empresa"];
$Direccion = $respuestaEmpresa["Direccion_Empresa"];
$Factura_Banco = $respuestaEmpresa["Factura_Banco"];
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
$anchoSello = $respuestaEmpresa["anchoSello"]."px";
$largoSello = $respuestaEmpresa["largoSello"]."px";




// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->footer_content = $Factura_Banco;

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
if($TituloNombre == "1"){ 
$bloque1 = <<<EOF

    <table style="font-size:9px; padding:3px 3px">
    <tr>
            
            <td style="width:$ancho"><img src="../../../$Logo" width="$ancho" height="$largo"></td>
            
            <td style="width:$anchoresto; font-size:15px; text-align:center">$Nombre<br>$Descripcion_Empresa</td>
            

    </tr>
    
    


    <tr>        
            <td style="width:80px; font-size:9px; text-align:right"></td>
            <td style="width:150px; font-size:9px; text-align:right">N° de Factura de Control:</td>
            <td style="width:100px; font-size:9px; text-align:left">$Codigo</td>
            <td style="width:187px; font-size:9px; text-align:right">FACTURA DE CRÉDITO FISCAL</td>
            
    </tr>

        <tr>
            <td style="font-weight: bold; width:270px; background-color:$faccolor1;?>; text-align:center">SUPLIDOR</td>
            <td style="font-weight: bold; width:270px; background-color:$faccolor1; text-align:center">DATOS FACTURA</td>

        </tr>
        <tr>
            <td style="font-weight: bold; width:70px">Nombre:</td>
            <td style="width:250px">$Nombre</td>
             <td style="font-weight: bold; width:70px">RNC:</td>
            <td style="width:250px">$Rnc_Empresa_Venta</td>
           


        </tr>

        <tr>
         <td style="font-weight: bold; width:70px">Teléfono:</td>
            <td style="width:250px">$Telefono</td>
            

       
            <td style="font-weight: bold; width:70px">NCF:</td>
            <td style="width:250px">$NCF_Factura</td>

            
            


        </tr>

        <tr>
            <td style="font-weight: bold; width:70px">Correo:</td>
            <td style="width:250px">$Correo</td>
            <td style="font-weight: bold; width:70px">Fecha:</td>
            <td style="width:250px">$Fecha</td>
            
            
            

        </tr>

        <tr>
            <td style="font-weight: bold; width:70px">Dirección:</td>
            <td style="width:245px">$Direccion</td>
            <td style="width:5px"></td>
            <td style="font-weight: bold; width:70px">Forma de Pago:</td>
            <td style="width:250px">$Tipo_Pago_607</td>
            

        </tr>
        
        

        <tr>
            <td style="background-color:white; width:320px"> </td>
             <td style="font-weight: bold; width:70px">Valida hasta:</td>
            <td style="width:250px">31-12-2023</td>
            
        </tr>       

    </table>


EOF;


$pdf->writeHtml($bloque1, false, false, false, false, '');
}else{
    
    $bloque1 = <<<EOF

    <table style="font-size:9px; padding:3px 3px">
    <tr>
            
            <td  style="text-align:center"><img src="../../../$Logo" width="$ancho" height="$largo"></td>
                

    </tr>
    
    


    <tr>        
            <td style="width:80px; font-size:9px; text-align:right"></td>
            <td style="width:150px; font-size:9px; text-align:right">N° de Factura de Control:</td>
            <td style="width:100px; font-size:9px; text-align:left">$Codigo</td>
            <td style="width:187px; font-size:9px; text-align:right">FACTURA DE CRÉDITO FISCAL</td>
            
    </tr>

        <tr>
            <td style="font-weight: bold; width:270px; background-color:$faccolor1;?>; text-align:center">SUPLIDOR</td>
            <td style="font-weight: bold; width:270px; background-color:$faccolor1; text-align:center">DATOS FACTURA</td>

        </tr>
        <tr>
            <td style="font-weight: bold; width:70px">Nombre:</td>
            <td style="width:250px">$Nombre</td>
             <td style="font-weight: bold; width:70px">RNC:</td>
            <td style="width:250px">$Rnc_Empresa_Venta</td>
           


        </tr>

        <tr>
         <td style="font-weight: bold; width:70px">Teléfono:</td>
            <td style="width:250px">$Telefono</td>
            

       
            <td style="font-weight: bold; width:70px">NCF:</td>
            <td style="width:250px">$NCF_Factura</td>

            
            


        </tr>

        <tr>
            <td style="font-weight: bold; width:70px">Correo:</td>
            <td style="width:250px">$Correo</td>
            <td style="font-weight: bold; width:70px">Fecha:</td>
            <td style="width:250px">$Fecha</td>
            
            
            

        </tr>

        <tr>
            <td style="font-weight: bold; width:70px">Dirección:</td>
            <td style="width:245px">$Direccion</td>
            <td style="width:5px"></td>
            <td style="font-weight: bold; width:70px">Forma de Pago:</td>
            <td style="width:250px">$Tipo_Pago_607</td>
            

        </tr>
        
        

        <tr>
            <td style="background-color:white; width:320px"> </td>
             <td style="font-weight: bold; width:70px">Valida hasta:</td>
            <td style="width:250px">31-12-2023</td>
            
        </tr>       

    </table>


EOF;


$pdf->writeHtml($bloque1, false, false, false, false, '');




}

/**************SEGUNDO BLOQUE DE IMPRESION DE CLIENTE**********/

$bloque2 = <<<EOF

        <table style="font-size:9px; padding:3px 3px">

        <tr>
            <td style="font-weight: bold; background-color:$faccolor2; width:540px; text-align:center">CLIENTE</td>
        </tr>   

        <tr>
            <td style="font-weight: bold; width:70px">Nombre:</td>
            <td style="width:250px">$Nombre_Cliente</td>
            <td style="font-weight: bold; width:80px">RNC:</td>
            <td style="width:100px">$Documento</td>
        </tr>   
        <tr>
            <td style="font-weight: bold; width:70px">Correo:</td>
            <td style="width:250px">$Email</td>
            <td style="font-weight: bold; width:80px">Teléfono:</td>
            <td style="width:100px">$Telefono_Cliente</td>
            
        </tr>
        <tr>
            
            <td style="background-color:white; width:320px"> </td>
            
        </tr>

        <tr>
            <td style="font-weight: bold; background-color:$faccolor3; width:540px; text-align:center">OBSERVACIONES DE FACTURA</td>
        </tr>

        <tr>
            <td width:540px>$Observaciones</td>
        </tr>   

<tr>
            
            <td style="background-color:white; width:320px"> </td>
            
        </tr>
        </table>


EOF;

$pdf->writeHtml($bloque2, false, false, false, false, '');

/******************CIERRE DE BLOQUE****************************/

/**************TERCER BLOQUE DE IMPRESION DE DE TITULOS DE TABLA**********/

$bloque3 = <<<EOF

      <table style="font-size:9px; padding:3px 10px">

            <tr>
            <td style="font-weight: bold; border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; background-color:white; width:280px; text-align:left">Descripción</td>

                <td style="font-weight: bold; border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; background-color:white; width:60px; text-align:right">Cant.</td>
                
                <td style="font-weight: bold;border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; background-color:white; width:100px; text-align:right">Valor Unit</td>
                <td style="font-weight: bold;border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; background-color:white; width:100px; text-align:right">Valor Total</td>

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

   

  <table style="font-size:9px; padding:3px 10px">

    <tr>
    <td style="color:#333; background-color:white; width:280px; text-align:left">$item[descripcion]</td>


        <td style="color:#333; background-color:white; width:60px; text-align:right">$item[cantidad]</td>


        
        <td style="background-color:white; width:100px; text-align:right">$valorUnitario</td>

        <td style="background-color:white; width:100px; text-align:right">$PrecioTotal</td>


    </tr>

    </table>

   



        
            
EOF;


$pdf->writeHtml($bloque4, false, false, false, false, '');

}

if($PorDescuento > 0 && $Descuento > 0 ){ 

$bloque5 = <<<EOF

    <table style="font-size:9px; padding: 3px 10px;">
<tr>
            <td style="color:#333; background-color:white; width:340px; text-align:center"></td>

            <td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>

            <td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>
                
        </tr>

       <tr>
            <td style="width:340px; text-align:center"></td>

            <td style="font-weight: bold; border-top-color:#050404; border-top-style:solid; border-top-width:1px; width:100px; text-align:right">SubTotal $Moneda $:</td>

            <td style="border-top-color:#050404; border-top-style:solid; border-top-width:1px; background-color:white; width:100px; text-align:right">$Neto</td>
                
        </tr>
         <tr>
            <td style="width:340px; text-align:center"></td>

            <td style="font-weight: bold; border-top-color:#050404; border-top-style:solid; border-top-width:1px; width:100px; text-align:right">Desc. $PorDescuento %:</td>

            <td style="border-top-color:#050404; border-top-style:solid; border-top-width:1px; background-color:white; width:100px; text-align:right">$Descuento</td>
                
        </tr>

       <tr>
            <td style="width:340px; text-align:right"></td>

            <td style="font-weight: bold; width:100px; text-align:right">ITBIS 18 %:</td>

            <td style="width:100px; text-align:right">$Impuesto</td>
                
        </tr>


     <tr>
            <td style="width:340px; text-align:right"></td>

            <td style="font-weight: bold; border-top-color:#050404; border-top-style:solid; border-top-width:1px; background-color:white; width:100px; text-align:right">Total $Moneda $:</td>

            <td style="font-weight: bold; border-top-color:#050404; border-top-style:solid; border-top-width:1px; background-color:white; width:100px; text-align:right">$Total</td>
                
    </tr>
    <tr>
            <td style="width:340px; text-align:right"></td>

            <td style="font-size:8px; font-weight: bold; background-color:white; width:100px; text-align:right">$TextoTasa</td>

            <td style="font-weight: bold;background-color:white; width:100px; text-align:right"></td>
                
        </tr>



      

         <tr>
            <td style="background-color:white; width:$restosello; text-align:center"></td>
       
           
            <td style="width:$anchoSello"><img src="../../../$Sello" width="$anchoSello" height="$largoSello"></td>
            

           
                
        </tr>


    </table>
            
EOF;

$pdf->writeHtml($bloque5, false, false, false, false, '');

}else{



$bloque5 = <<<EOF

    <table style="font-size:9px; padding: 3px 10px;">
<tr>
            <td style="color:#333; background-color:white; width:340px; text-align:center"></td>

            <td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>

            <td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>
                
        </tr>

       <tr>
            <td style="width:340px; text-align:center"></td>

            <td style="font-weight: bold; border-top-color:#050404; border-top-style:solid; border-top-width:1px; width:100px; text-align:right">SubTotal $Moneda $:</td>

            <td style="border-top-color:#050404; border-top-style:solid; border-top-width:1px; background-color:white; width:100px; text-align:right">$Neto</td>
                
        </tr>

       <tr>
            <td style="width:340px; text-align:right"></td>

            <td style="font-weight: bold; width:100px; text-align:right">ITBIS 18 %:</td>

            <td style="width:100px; text-align:right">$Impuesto</td>
                
        </tr>


     <tr>
            <td style="width:340px; text-align:right"></td>

            <td style="font-weight: bold; border-top-color:#050404; border-top-style:solid; border-top-width:1px; background-color:white; width:100px; text-align:right">Total $Moneda $:</td>

            <td style="font-weight: bold; border-top-color:#050404; border-top-style:solid; border-top-width:1px; background-color:white; width:100px; text-align:right">$Total</td>
                
    </tr>
    <tr>
            <td style="width:340px; text-align:right"></td>

            <td style="font-size:8px; font-weight: bold; background-color:white; width:100px; text-align:right">$TextoTasa</td>

            <td style="font-weight: bold;background-color:white; width:100px; text-align:right"></td>
                
        </tr>



      

         <tr>
            <td style="background-color:white; width:$restosello; text-align:center"></td>
       
           
            <td style="width:$anchoSello"><img src="../../../$Sello" width="$anchoSello" height="$largoSello"></td>
            

           
                
        </tr>


    </table>
            
EOF;

$pdf->writeHtml($bloque5, false, false, false, false, '');
}





$pdf->Output($NCF_Factura.'-'.$Nombre_Cliente.'-'.'factura.pdf', 'I');


}

}

$factura = new imprimirFactura();
$factura -> Codigo = $_GET["Codigo"];
$factura -> traerImpresionFactura();


 ?>

