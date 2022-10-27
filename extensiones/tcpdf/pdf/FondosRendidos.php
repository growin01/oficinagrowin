<?php

require_once "../../../controladores/empresas.controlador.php";
require_once "../../../modelos/empresas.modelo.php"; 

require_once "../../../controladores/diario.controlador.php";
require_once "../../../modelos/diario.modelo.php";

require_once "../../../controladores/anticipo.controlador.php";
require_once "../../../modelos/anticipo.modelo.php";



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
class FondoAnticipo{
     
      
   
    public $idRendido;
    public function ImpresionFondo(){

$tabla = "rendirfondos_empresas";
$taid = "id";
$valorid =  $this->idRendido;
$FondoAnticipo = ModeloAnticipo::mdlMostraridRendicion($tabla, $taid, $valorid);
$Facturas = json_decode($FondoAnticipo["Facturas"], true);
$FondoCredito = number_format($FondoAnticipo["credito"], 2);
$FondoDebito = number_format($FondoAnticipo["debito"], 2);
$FondoMonto = number_format($FondoAnticipo["Monto"], 2);

$tabla = "empresas";

$tabla = "empresas";
$taRncEmpresa = "Rnc_Empresa";
$taRnc_Empresa_Master = "Rnc_Empresa_Master";
$Rnc_Empresa = $FondoAnticipo["Rnc_Empresa_Anticipo"];
$Rnc_Empresa_Master = null;
$Orden = "id";


$respuestaEmpresa = ModeloEmpresas::mdlMostrarEmpresas($tabla, $taRncEmpresa, $Rnc_Empresa, $taRnc_Empresa_Master, $Rnc_Empresa_Master, $Orden);

$Nombre = $respuestaEmpresa["Nombre_Empresa"];
$Descripcion_Empresa = $respuestaEmpresa["Descripcion_Empresa"];
$faccolor1 = $respuestaEmpresa["faccolor1"];
$faccolor2 = $respuestaEmpresa["faccolor2"];
$faccolor3 = $respuestaEmpresa["faccolor3"];






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
            
            
        <td style="width:540px; font-size:12px; text-align:center">$Nombre<br>Rendición Fondo de Anticipo</td>
            

    </tr>
    
   
</table>


EOF;

$pdf->writeHtml($bloque1, false, false, false, false, '');
}else{
$Logo = $respuestaEmpresa["Logo"];
$bloque1 = <<<EOF

<table style="font-size:10px; padding:3px 3px">
    <tr>
            <td style="width:100px"><img src="../../../$Logo"></td>
            
            <td style="width:440px; font-size:12px; text-align:center">$Nombre<br>Rendición Fondo de Anticipo</td>
            

    </tr>
   

   
</table>


EOF;

$pdf->writeHtml($bloque1, false, false, false, false, '');

}

$bloque2 = <<<EOF

        <table style="font-size:10px; padding:3px 3px">

        <tr>
            <td style="background-color:#E0E3E7; width:540px; text-align:center">DATOS DE FONDOS RENDIDOS</td>
        </tr>   

        <tr>
            <td style="width:130px">N° de Rendición:</td>
            <td style="width:150px">$FondoAnticipo[NAsiento]</td>
            <td style="width:100px">Nombre del Fondo</td>
            <td style="width:100px">$FondoAnticipo[Nombre_Cuenta]</td>
        </tr>   
        <tr>
            <td style="width:130px">Fecha:</td>
            <td style="width:150px">$FondoAnticipo[Fecha_AnoMes]-$FondoAnticipo[Fecha_dia]</td>
            <td style="width:100px">Responsable:</td>
            <td style="width:100px">$FondoAnticipo[Responsable]</td>
            
        </tr>

        <tr>
            <td style="background-color:#E0E3E7; width:540px; text-align:center">OBSERVACIONES DEL FONDO</td>
        </tr>

        <tr>
            <td width:540px>$FondoAnticipo[Descripcion]</td>
        </tr>   


        </table>


EOF;

$pdf->writeHtml($bloque2, false, false, false, false, '');

$bloque3 = <<<EOF

        <table style="font-size:8px; padding:5px 10px">
        <tr><td style="width:5400px; text-align:center"></td></tr>


            <tr>
            <td style="border: 1px solid #666; background-color:#EBEAEA; width:100px; text-align:center; font-weight: bold">SUPLIDOR</td>

                <td style="border: 1px solid #666; background-color:#EBEAEA; width:70px; text-align:center; font-weight: bold">NCF</td>

                <td style="border: 1px solid #666; background-color:#EBEAEA; width:70px; text-align:center; font-weight: bold">Descrip.</td>
                
                <td style="border: 1px solid #666; background-color:#EBEAEA; width:70px; text-align:center; font-weight: bold">FECHA</td>
                
                <td style="border: 1px solid #666; background-color:#EBEAEA; width:70px; text-align:center; font-weight: bold">CREDITO</td>
                <td style="border: 1px solid #666; background-color:#EBEAEA; width:70px; text-align:center; font-weight: bold">DEBITO</td>
                <td style="border: 1px solid #666; background-color:#EBEAEA; width:70px; text-align:center; font-weight: bold">SALDO</td>



            </tr>


        </table>

EOF;

$pdf->writeHtml($bloque3, false, false, false, false, '');


foreach ($Facturas as $key => $item) {
$tabla = "librodiario_empresas";
$id = "id";
$valorid = $item["id"];




$diario = ModeloDiario::mdlidDiario($tabla, $id, $valorid);

$credito = number_format($item["credito"], 2);

$debito = number_format($item["debito"], 2);
$saldo = number_format($item["saldo"], 2);

$bloque4 = <<<EOF

    <table style="font-size:8px; padding:5px 10px">

    <tr>
    <td style="background-color:white; width:100px; text-align:center">$diario[Nombre_Empresa]</td>

        
        <td style="background-color:white; width:70px; text-align:center">$diario[NCF]</td>
        <td style="background-color:white; width:70px; text-align:center">$diario[ObservacionesLD]</td>

        <td style="background-color:white; width:70px; text-align:center">$item[fechames]-$item[fechadia]</td>

        

        <td style="font-weight: bold; background-color:white; width:70px; text-align:center">$credito</td>

         <td style="font-weight: bold; background-color:white; width:70px; text-align:center">$debito</td>

        <td style="font-weight: bold; background-color:white; width:70px; text-align:center">$saldo</td>


    </tr>

    </table>



        
            
EOF;


$pdf->writeHtml($bloque4, false, false, false, false, '');

}

$bloque5 = <<<EOF

        <table style="font-size:10px; padding:5px 10px">
        <tr><td style="width:5400px; text-align:center"></td></tr>


            <tr>

                <td style="background-color:white; width:100px; text-align:center"></td>
                <td style="background-color:white; width:100px; text-align:center"></td>
                <td style="font-weight: bold; background-color:#E0E3E7; width:100px; text-align:center">TOTAL</td>
                <td style="font-weight: bold; background-color:#E0E3E7; width:80px; text-align:center">$FondoCredito</td>
                <td style="font-weight: bold; background-color:#E0E3E7; width:80px; text-align:center">$FondoDebito</td>
                <td style="font-weight: bold; background-color:#E0E3E7; width:80px; text-align:center">$FondoMonto</td>



            </tr>


        </table>

EOF;
$pdf->writeHtml($bloque5, false, false, false, false, '');



/**************************************
SALIDA DEL ARCHVIO
***************************************/

$pdf->Output('FondosRendidos.pdf');

}

}

$Fondo = new FondoAnticipo();
$Fondo -> idRendido = $_GET["idRendido"];
$Fondo -> ImpresionFondo();

 ?>

