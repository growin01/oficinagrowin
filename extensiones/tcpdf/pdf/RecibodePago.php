<?php
require_once "../../../controladores/cxp.controlador.php";
require_once "../../../modelos/cxp.modelo.php";

require_once "../../../controladores/suplidores.controlador.php";
require_once "../../../modelos/suplidores.modelo.php";

require_once "../../../controladores/606.controlador.php";
require_once "../../../modelos/606.modelo.php";

require_once "../../../controladores/banco.controlador.php";
require_once "../../../modelos/banco.modelo.php";

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


class imprimirRecibodepago{
     
public $id_reciboCXP;
public $NAsiento; 
public $Rnc_Empresa_cxp; 
public $Rnc_Suplidor;
   

    public function traerRecibodepago(){


        /**************************************
                Traer de la empresa
        *****************************************/

$tabla = "recibocxp_empresas";
$id = "id";
$valoridCXP = $this->id_reciboCXP;
    

$respuesta = ModeloCXP::mdlMostrarRecibirPago($tabla, $id, $valoridCXP);
$fechaano = substr($respuesta["FechaAnoMes"], 0, 4);
$fechames = substr($respuesta["FechaAnoMes"], -2);
$Fecha = $respuesta["FechaDia"]."-".$fechames."-".$fechaano;
$Referencia = $respuesta["Referencia"];
$Descripcion = $respuesta["Descripcion"];
$NAsiento = $respuesta["NAsiento"];
$Facturas = json_decode($respuesta["Facturas"], true);
$FacturaCXP = $respuesta["FacturaCXP"];
$ReciboCXP = $respuesta["ReciboCXP"];
/****************************************
    TRAEMOS LA INFORMACION DEL Banco
*****************************************/


$id = "id";
$valorid = $respuesta["EntidadBancaria"];

$respuestaBanco = ControladorBanco::ctrModalEditarBanco($id, $valorid);

$EntidadBancaria = $respuestaBanco["Nombre_Cuenta"];

/****************************************
    TRAEMOS LA INFORMACION DEL VENDEDOR
*****************************************/

$tabla = "empresas";
$taRncEmpresa = "Rnc_Empresa";
$taRnc_Empresa_Master = "Rnc_Empresa_Master";
$Rnc_Empresa = $respuesta["Rnc_Empresa_cxp"];
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

/***************************************
    TRAEMOS LA INFORMACION DEL CLIENTE
****************************************/

$tabla = "suplidor_empresas";
$taRncEmpresaSuplidores = "Rnc_Empresa_Suplidor";
$Rnc_Empresa_Suplidor = $respuesta["Rnc_Empresa_cxp"];
$id_Suplidor = "Documento_Suplidor";
$Valor_idSuplidor = $respuesta["Rnc_Suplidor"];

$respuestaSuplidor = ModeloSuplidores::mdlMostrarSuplidorRNC($tabla, $taRncEmpresaSuplidores, $Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);

$Nombre_Suplidor = $respuestaSuplidor["Nombre_Suplidor"];
$Documento_Suplidor = $respuestaSuplidor["Documento_Suplidor"];
$Email = $respuestaSuplidor["Email"];
$Telefono = $respuestaSuplidor["Telefono"];






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
    
    



    </table>


EOF;


$pdf->writeHtml($bloque1, false, false, false, false, '');
}else{
    
    $bloque1 = <<<EOF

    <table style="font-size:9px; padding:3px 3px">
    <tr>
            
            <td  style="text-align:center"><img src="../../../$Logo" width="$ancho" height="$largo"></td>
                

    </tr>
    
    

    </table>


EOF;


$pdf->writeHtml($bloque1, false, false, false, false, '');




}

$bloque2 = <<<EOF

        <table style="font-size:10px; padding:3px 3px">
        <tr>        
            <td style="width:350px; font-size:9px; text-align:right"></td>
            <td style="width:150px; font-size:9px; text-align:right">N° de Recibo de Control:</td>
            <td style="width:70px; font-size:9px; text-align:left">$NAsiento</td>
            
            
    </tr>

        <tr>
            <td style="font-size:16px; background-color:#E0E3E7; width:540px; text-align:center">RECIBO DE PAGO</td>
        </tr>   

       <tr>
            <td style="width:90px">Empresa:</td>
            <td style="width:180px">$Nombre</td>
            <td style="width:90px">Pagado a:</td>
            <td style="width:160px">$Nombre_Suplidor</td>
         
   
        </tr>  
         <tr>
            <td style="width:90px">RNC:</td>
            <td style="width:180px">$Rnc_Empresa_Suplidor</td>
            <td style="width:90px">RNC Suplidor:</td>
            <td style="width:160px">$Documento_Suplidor</td>
         
   
        </tr>  
          <tr>
            <td style="background-color:#E0E3E7; width:540px; text-align:center">DETALLES DE TRANSACCIÓN</td>
        </tr>  
        <tr>
            <td style="width:40px">Fecha:</td>
            <td style="width:100px">$Fecha</td>
            <td style="width:60px">Referencia:</td>
            <td style="width:100px">$Referencia</td>
            <td style="width:40px">Banco:</td>
            <td style="width:120px">$EntidadBancaria</td>
             
            
        </tr>

        <tr>
            <td style="background-color:#E0E3E7; width:540px; text-align:center">OBSERVACIONES DEL RECIBO</td>
        </tr>

        <tr>
            <td width:540px>$Descripcion</td>
        </tr>   


        </table>


EOF;

$pdf->writeHtml($bloque2, false, false, false, false, '');

$bloque3 = <<<EOF

      <table style="font-size:9px; padding:3px 10px">
            <tr>
            <td style="font-weight: bold; border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; background-color:white; width:140px; text-align:left">Moneda de las Facturas</td>

             <td style="font-weight: bold; border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; background-color:white; width:80px; text-align:left">$FacturaCXP</td>
            <td style="font-weight: bold; border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; background-color:white; width:140px; text-align:left">Moneda del Recibo</td>

             <td style="font-weight: bold; border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; background-color:white; width:80px; text-align:left">$ReciboCXP</td>
             <td style="font-weight: bold; border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; background-color:white; width:80px; text-align:left"></td>
               
            </tr>

            <tr>
            <td style="font-weight: bold; border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; background-color:white; width:80px; text-align:left">Facturas</td>

                <td style="font-weight: bold; border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; background-color:white; width:100px; text-align:right">Monto Pagado</td>
                <td style="font-weight: bold; border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; background-color:white; width:70px; text-align:right">%Ret.ITBIS</td>

               <td style="font-weight: bold; border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; background-color:white; width:100px; text-align:right">Monto Ret.ITBIS</td>
               <td style="font-weight: bold; border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; background-color:white; width:70px; text-align:right">%Ret.ISR</td>

                <td style="font-weight: bold; border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; background-color:white; width:100px; text-align:right">Monto Ret.ISR</td>
               
            </tr>


        </table>
EOF;

$pdf->writeHtml($bloque3, false, false, false, false, '');

$totalMontoPagado = 0;
$TotalITBIS_Retenido_606 = 0;
$TotalMonto_Retencion_Renta_606 = 0;
foreach ($Facturas as $key => $item) {
$montopagado = number_format($item["ingbanco"], 2);
$totalMontoPagado = $totalMontoPagado + $item["ingbanco"];
$vitotalpagado = number_format($totalMontoPagado, 2);




$taRnc_Empresa_606 = "Rnc_Empresa_606";
$Rnc_Empresa_606 = $Rnc_Empresa;
$taRnc_Factura_606 = "Rnc_Factura_606";
$Rnc_Factura_606 = $Documento_Suplidor;
$taNCF_606 = "NCF_606";
$NCF_606 = $item["ncf_factura"];
$tabla = "606_empresas";

    

$respuesta606 = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);

$Porc_ITBIS_Retenido_606= $respuesta606["Porc_ITBIS_Retenido_606"];
$ITBIS_Retenido_606 = $respuesta606["ITBIS_Retenido_606"];
$viITBIS_Retenido_606 = number_format($ITBIS_Retenido_606, 2);
$TotalITBIS_Retenido_606 = $TotalITBIS_Retenido_606 + $ITBIS_Retenido_606;
$viTotalITBIS_Retenido_606 = number_format($TotalITBIS_Retenido_606, 2);


$Porc_ISR_Retenido_606= $respuesta606["Porc_ISR_Retenido_606"];
$Monto_Retencion_Renta_606 = $respuesta606["Monto_Retencion_Renta_606"];
$viMonto_Retencion_Renta_606 = number_format($Monto_Retencion_Renta_606, 2);
$TotalMonto_Retencion_Renta_606 = $TotalMonto_Retencion_Renta_606 + $Monto_Retencion_Renta_606;
$viTotalMonto_Retencion_Renta_606 = number_format($TotalMonto_Retencion_Renta_606, 2);
    $bloque4 = <<<EOF

   

  <table style="font-size:9px; padding:3px 10px">

    <tr>
    <td style="color:#333; background-color:white; width:80px; text-align:left">$item[ncf_factura]</td>


        <td style="color:#333; background-color:white; width:100px; text-align:right">$montopagado</td>
        <td style="color:#333; background-color:white; width:70px; text-align:right">$Porc_ITBIS_Retenido_606</td>

        <td style="color:#333; background-color:white; width:100px; text-align:right">$viITBIS_Retenido_606</td>
        
       <td style="color:#333; background-color:white; width:70px; text-align:right">$Porc_ISR_Retenido_606</td>

        <td style="color:#333; background-color:white; width:100px; text-align:right">$viMonto_Retencion_Renta_606</td>

    </tr>

    </table>

   



        
            
EOF;


$pdf->writeHtml($bloque4, false, false, false, false, '');

}

$bloque5 = <<<EOF

    <table style="font-size:9px; padding: 3px 10px;">
<tr>
            <td style="color:#333; background-color:white; width:340px; text-align:center"></td>

            <td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>

            <td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center"></td>
                
        </tr>

      

<tr>
            <td style="width:340px; text-align:center"></td>

            <td style="font-weight: bold; border-top-color:#050404; border-top-style:solid; border-top-width:1px; width:100px; text-align:right">Total Pagado: </td>

            <td style="border-top-color:#050404; border-top-style:solid; border-top-width:1px; background-color:white; width:80px; text-align:right">$vitotalpagado</td>
                
        </tr>
    
    
<tr>
            <td style="width:340px; text-align:center"></td>

            <td style="font-weight: bold; width:100px; text-align:right">Monto ITBIS Ret.: </td>

            <td style="width:80px; text-align:right">$viTotalITBIS_Retenido_606</td>
                
        </tr>

      <tr>
            <td style="width:340px; text-align:center"></td>

            <td style="font-weight: bold; width:100px; text-align:right">Monto ISR Ret.: </td>

            <td style="width:80px; text-align:right">$viTotalMonto_Retencion_Renta_606</td>
                
        </tr>

         <tr>
            <td style="background-color:white; width:$restosello; text-align:center"></td>
       
           
            <td style="width:$anchoSello"><img src="../../../$Sello" width="$anchoSello" height="$largoSello"></td>
            

           
                
        </tr>


    </table>
            
EOF;

$pdf->writeHtml($bloque5, false, false, false, false, '');

$pdf->Output($NAsiento.'-Recibo de Pago-'.$Nombre_Suplidor.'.pdf', 'I');

}/*public function traerRecibodepago*/

}/*class imprimirRecibodepago*/

$Recibodepago = new imprimirRecibodepago();
$Recibodepago ->  id_reciboCXP = $_GET["id_reciboCXP"];
$Recibodepago ->  NAsiento = $_GET["NAsiento"];
$Recibodepago ->  Rnc_Empresa_cxp = $_GET["Rnc_Empresa_cxp"];
$Recibodepago ->  Rnc_Suplidor = $_GET["Rnc_Suplidor"];
$Recibodepago -> traerRecibodepago();



    
 

 ?>

