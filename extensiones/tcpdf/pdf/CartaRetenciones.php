<?php
require_once "../../../controladores/606.controlador.php";
require_once "../../../modelos/606.modelo.php";

require_once "../../../controladores/empresas.controlador.php";
require_once "../../../modelos/empresas.modelo.php";

require_once "../../../controladores/compras.controlador.php";
require_once "../../../modelos/compras.modelo.php";

require_once "../../../controladores/suplidores.controlador.php";
require_once "../../../modelos/suplidores.modelo.php";

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
class CartaRetencion{
     
 
 
 public $RncEmpresaCompras;
 public $RncFactura606;
 public $NCF_606;
 

public function ImpresionCartaRetencion(){

$RncEmpresa606 = "Rnc_Empresa_606";
$ValorRncEmpresa606 = $this->RncEmpresaCompras;
$Rnc_Factura_606 = "Rnc_Factura_606";
$ValorRnc_Factura_606 = $this->RncFactura606;
$NCF_606 = "NCF_606";
$ValorNCF_606 = $this->NCF_606;


$respuesta606 = Controlador606::ctrValidarRNCNCF($RncEmpresa606, $ValorRncEmpresa606, $Rnc_Factura_606, $ValorRnc_Factura_606, $NCF_606, $ValorNCF_606);



$tabla = "empresas";

$tabla = "empresas";
$taRncEmpresa = "Rnc_Empresa";
$taRnc_Empresa_Master = "Rnc_Empresa_Master";
$Rnc_Empresa = $this->RncEmpresaCompras;
$Rnc_Empresa_Master = null;
$Orden = "id";


$respuestaEmpresa = ModeloEmpresas::mdlMostrarEmpresas($tabla, $taRncEmpresa, $Rnc_Empresa, $taRnc_Empresa_Master, $Rnc_Empresa_Master, $Orden);

$Nombre = $respuestaEmpresa["Nombre_Empresa"];
$Descripcion_Empresa = $respuestaEmpresa["Descripcion_Empresa"];
$faccolor1 = $respuestaEmpresa["faccolor1"];
$faccolor2 = $respuestaEmpresa["faccolor2"];
$faccolor3 = $respuestaEmpresa["faccolor3"];



$ancho = $respuestaEmpresa["ancho"]."px";

$resto = 540-$respuestaEmpresa["ancho"];
$anchoresto = $resto."px";
$largo = $respuestaEmpresa["largo"]."px";


if($respuestaEmpresa["Sello"] == ""){

$Sello = "extensiones/tcpdf/pdf/images/Blanco.jpg";
    
}else{
$Sello = $respuestaEmpresa["Sello"];

}
$anchoSello = $respuestaEmpresa["anchoSello"]."px";

$restoSello = 540-$respuestaEmpresa["anchoSello"];
$anchorestoSello = $restoSello."px";
$largoSello = $respuestaEmpresa["largoSello"]."px";
/*Suplidor*/


$Rnc_Empresa_Suplidor = $this->RncEmpresaCompras;

$id_Suplidor = "Documento_Suplidor";

$Valor_idSuplidor = $this->RncFactura606;

$respuestasuplidor = ControladorSuplidores::ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);

if($respuestasuplidor["Nombre_Suplidor"] != ""){
   


$NombreSuplidor = $respuestasuplidor["Nombre_Suplidor"];


}else{

$NombreSuplidor = "_________________________";    
}




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

$pdf->startPageGroup();

$pdf->AddPage();
// set font



if($respuestaEmpresa["Logo"] == ""){

$bloque1 = <<<EOF

<table style="font-size:10px; padding:3px 3px">
    <tr>
            
            
        <td style="width:440px; font-size:12px; text-align:center">$Nombre<br>RNC:$ValorRncEmpresa606</td>
            

    </tr>
    
   
</table>


EOF;

$pdf->writeHtml($bloque1, false, false, false, false, '');
}else{
$Logo = $respuestaEmpresa["Logo"];
$bloque1 = <<<EOF

<table style="font-size:10px; padding:3px 3px">
    <tr>
            <td style="width:$ancho"><img src="../../../$Logo" width="$ancho" height="$largo"></td>
            
            
            <td style="width:$anchoresto; font-size:12px; text-align:center">$Nombre<br>RNC:$ValorRncEmpresa606</td>
            

    </tr>
   

   
</table>


EOF;

$pdf->writeHtml($bloque1, false, false, false, false, '');

}
date_default_timezone_set('America/Santo_Domingo');

$fecha = date('Y-m-d');

setlocale(LC_TIME, "spanish");
$fecha = str_replace("/", "-", $fecha);         
$newDate = date("d-m-Y", strtotime($fecha));                
$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));
$bloque2 = <<<EOF

<table style="font-size:10px; padding:3px 3px">
    <tr>
            
        <td style="width:400px"></td>

              
        <td style="width:140px; font-size:12px; text-align:left">Santo Domingo, D.N<br>$mesDesc</td>
            

    </tr>
    
   
</table>


EOF;


$pdf->writeHtml($bloque2, false, false, false, false, '');


$bloque3 = <<<EOF

<table style="font-size:10px; padding:3px 3px">
    <tr>      
        <td style="width:540px; font-size:12px; text-align:left">Señores:<br>Dirección General de Impuestos Internos (DGII).</td>
    </tr>
     <tr>
        <td style="width:540px; font-size:12px; text-align:left"></td>
     </tr>
     <tr>
        <td style="width:540px; font-size:12px; text-align:left"></td>
    </tr>
    <tr>
        <td style="width:540px; font-size:12px; text-align:left">Estimados Señores:</td>
    </tr>
    <tr>
        <td style="width:540px; font-size:12px; text-align:left"></td>
    </tr>
    <tr>
        <td style="width:540px; font-size:12px; text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;
          Por medio del presente documento, CERTIFICAMOS que esta empresa $Nombre, de RNC: $ValorRncEmpresa606, hemos retenido a la empresa $NombreSuplidor, de RNC: $ValorRnc_Factura_606, de acuerdo a lo establecido en la Norma 02-05; 293-11 y el Art. 309 del Código Tributario (Ley 11-92) como se detalla a continuación:
        </td> 
    </tr>
    
   
</table>


EOF;

$pdf->writeHtml($bloque3, false, false, false, false, '');
$bloque4 = <<<EOF

        <table style="font-size:10px; padding:5px 10px">
        <tr>
        <td style="background-color:white; width:540px; text-align:center"></td>

              
        </tr>
        <tr>
         <td style="width:540px; text-align:center"></td>


              
        </tr>


            <tr>

                <td style="font-weight: bold; border: 1px solid #666; background-color:#D4D4D5; width:77px; text-align:center">Fecha</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:#D4D4D5; width:85px; text-align:center">N.C.F</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:#D4D4D5; width:69px; text-align:center">Monto Facturado</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:#D4D4D5; width:69px; text-align:center">ITBIS Facturado</td>

                <td style="font-weight: bold; border: 1px solid #666; background-color:#D4D4D5; width:45px; text-align:center">% ISR</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:#D4D4D5; width:67px; text-align:center">ISR Retenido</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:#D4D4D5; width:55px; text-align:center">%ITBIS</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:#D4D4D5; width:67px; text-align:center">ITBIS Retenido</td>

            </tr>


        </table>

EOF;

$pdf->writeHtml($bloque4, false, false, false, false, '');

$Fecharetencionañosmes = $respuesta606["Fecha_Ret_AnoMes_606"];

if($Fecharetencionañosmes != ""){

    $fechaano = substr($respuesta606["Fecha_Ret_AnoMes_606"], 0, 4);
    $fechames = substr($respuesta606["Fecha_Ret_AnoMes_606"], -2);
    $Fecharetenciondia = $respuesta606["Fecha_Ret_Dia_606"];
    $FechaRetenciones = $Fecharetenciondia."-".$fechames."-".$fechaano;

}else{
    
    $fechaano = "";
    $fechames = "";
    $Fecharetenciondia = "";
    $FechaRetenciones = "";

}

$MontoFacturado = number_format($respuesta606["Total_Monto_Factura_606"], 2);
$ITBIS_Factura_606 = number_format($respuesta606["ITBIS_Factura_606"], 2);
$Porc_ISR_Retenido_606 = $respuesta606["Porc_ISR_Retenido_606"];
$Monto_Retencion_Renta_606 = number_format($respuesta606["Monto_Retencion_Renta_606"], 2);
$ITBIS_Retenido_606 = number_format($respuesta606["ITBIS_Retenido_606"], 2);

$bloque5 = <<<EOF

        <table style="font-size:10px; padding:5px 10px">
        
            <tr>

                <td style="font-size:10px; font-weight: bold; border: 1px solid #666; width:77px; text-align:center">$FechaRetenciones</td>
                <td style="font-size:9px; font-weight: bold; border: 1px solid #666; width:85px; text-align:center">$ValorNCF_606</td>
                <td style="font-weight: bold; border: 1px solid #666;  width:69px; text-align:center">$MontoFacturado</td>
                <td style="font-weight: bold; border: 1px solid #666;  width:69px; text-align:center">$ITBIS_Factura_606</td>

                <td style="font-weight: bold; border: 1px solid #666; width:45px; text-align:center">$Porc_ISR_Retenido_606</td>
                <td style="font-weight: bold; border: 1px solid #666; width:67px; text-align:center">$Monto_Retencion_Renta_606</td>
                <td style="font-weight: bold; border: 1px solid #666;  width:55px; text-align:center">$respuesta606[Porc_ITBIS_Retenido_606]</td>
                <td style="font-weight: bold; border: 1px solid #666; width:67px; text-align:center">$ITBIS_Retenido_606</td>

            </tr>


        </table>

EOF;

$pdf->writeHtml($bloque5, false, false, false, false, '');
$bloque6 = <<<EOF

<table style="font-size:10px; padding:3px 3px">
    <tr>      
        <td style="width:540px; font-size:12px; text-align:left"></td>
    </tr>
     <tr>
        <td style="width:540px; font-size:12px; text-align:left"></td>
     </tr>
     <tr>
        <td style="width:540px; font-size:12px; text-align:left"></td>
    </tr>
    <tr>
        <td style="width:540px; font-size:12px; text-align:left"></td>
    </tr>
    <tr>
        <td style="width:540px; font-size:12px; text-align:left">Sin otro en particular, se despide:
</td>
    </tr>
    <tr>
        <td style="width:540px; font-size:12px; text-align: justify">
        </td> 
    </tr>
     <tr>
        <td style="width:540px; font-size:12px; text-align: justify">
        </td> 
    </tr>
     <tr>
        <td style="background-color:white; width:$restoSello; text-align:center"></td>
       
           
        <td style="width:$anchoSello"><img src="../../../$Sello" width="$anchoSello" height="$largoSello"></td>
        <td style="background-color:white; width:$anchorestoSello; text-align:center"></td>
    </tr>
    <tr>
   <td style="width:210px; font-size:12px; text-align: justify"></td> 
   <td style="width:130px; font-size:12px; text-align: justify">_______________</td>
   <td style="width:200px; font-size:12px; text-align: justify"></td> 

        
    </tr>
    
   <tr>
   <td style="width:210px; font-size:12px; text-align: justify"></td> 
   <td style="width:130px; font-size:12px; text-align: justify">ADMINISTRACION</td>
   <td style="width:200px; font-size:12px; text-align: justify"></td> 

        
    </tr>
</table>


EOF;

$pdf->writeHtml($bloque6, false, false, false, false, '');
/****************************************
SALIDA DEL ARCHVIO
***************************************/

$pdf->Output('CartaRetenciones.pdf');

}

}

$Carta = new CartaRetencion();
$Carta -> RncEmpresaCompras = $_GET["RncEmpresaCompras"];
$Carta -> RncFactura606 = $_GET["RncFactura606"];
$Carta -> NCF_606 = $_GET["NCF_606"];
$Carta -> ImpresionCartaRetencion();
 ?>

