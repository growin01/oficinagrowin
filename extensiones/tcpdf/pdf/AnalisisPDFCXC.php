<?php
require_once "../../../controladores/cxc.controlador.php";
require_once "../../../modelos/cxc.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

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
class imprimirPDFCXC{
     

    public $RncEmpresaPDFCXC;
    public $PeriodoCXC;
    public $ClienteCXC;

    public function ImpresionPDFCXC(){



$Rnc_Empresa_CXC = $this->RncEmpresaPDFCXC;

$respuestaCXC = ControladorCXC::ctrMostarCXC($Rnc_Empresa_CXC);

$ClienteCXC = $this->ClienteCXC;
$Periodo = $this->PeriodoCXC;

if($ClienteCXC == "Todo"){
    $Titulo = "Todos";



}else{
    $id = "id";

$valorid = $ClienteCXC;

$respuestaCliente = ControladorClientes::ctrModalEditarClientes($id, $valorid);

$Titulo = $respuestaCliente["Nombre_Cliente"];

}




/****************************************
    TRAEMOS LA INFORMACION DEL VENDEDOR
*****************************************/

$tabla = "empresas";
$taRncEmpresa = "Rnc_Empresa";
$taRnc_Empresa_Master = "Rnc_Empresa_Master";
$Rnc_Empresa = $Rnc_Empresa_CXC;
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


$bloque1 = <<<EOF

    <table style="font-size:10px; padding:3px 3px">
    <tr>
            <td style="width:$ancho"><img src="../../../$Logo"></td>
            
            <td style="width:$anchoresto; font-size:15px; text-align:center">INFORME FINANCIERO<br>ANÁLISIS CXC</td>
            

    </tr>
    
    
       
    </table>


EOF;

$pdf->writeHtml($bloque1, false, false, false, false, '');



$bloque2 = <<<EOF

    
        <table style="font-size:10px; padding:5px 10px">
        <tr>

                <td style="background-color:white; width:80px; text-align:center"></td>
                 <td style="background-color:white; width:80px; text-align:center"></td>
            

          </tr>

            <tr>

                <td style="background-color:white; width:70px; text-align:center">Cliente:</td>
                 <td style="background-color:white; width:240px; text-align:center">$Titulo</td>
            

          </tr>
           <tr>

                <td style="width:80px; text-align:center"></td>
                 <td style="width:80px; text-align:center"></td>
            

          </tr>
    
    
    
       
    </table>


EOF;

$pdf->writeHtml($bloque2, false, false, false, false, '');
$bloque3 = <<<EOF

        <table style="font-size:8px; padding:5px 10px">

            <tr>

                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:70px; text-align:center">NCF</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:130px; text-align:center">CLIENTE</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:60px; text-align:center">AÑO/MES</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:40px; text-align:center">DÍA</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:80px; text-align:center">DEUDA INICIAL</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:70px; text-align:center"> COBRADO</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:70px; text-align:center">POR COBRAR</td>
                

            </tr>


        </table>

EOF;

$pdf->writeHtml($bloque3, false, false, false, false, '');
$TotalDeuda = 0;
 $TotalCobro = 0;
 $PorCobrar = 0;
 $cuentasCXC = []; 


foreach ($respuestaCXC as $key => $value) {
if($Periodo == "Todo"){
    if($ClienteCXC == "Todo"){
        $id = "id";

$valorid = $value["id_Cliente"];

$respuestaCliente = ControladorClientes::ctrModalEditarClientes($id, $valorid);

/*******************************/

$Deuda = $value["Neto"] + $value["Impuesto"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
$Cobro = $value["MontoCobrado"];
$PorCobrar = $Deuda - $Cobro;

$mostarDeuda = number_format($Deuda, 2);
$mostarCobro =number_format($Cobro, 2);
$mostarPorCobrar = number_format($PorCobrar, 2);


$TotalDeuda = $TotalDeuda + $Deuda;
$TotalCobro = $TotalCobro + $Cobro;
/******Resumen por Suplidores***/


if($key = 0){
    $TotalFactura = 1;
    
    $cuentasCXC [] = array("id_Cliente" => $value["id_Cliente"],
"NFactura" => $TotalFactura,
"NombreCliente" => $respuestaCliente["Nombre_Cliente"],
"DeudaInicial" => $Deuda,
"TotalCobrado" => $Cobro,
"Total" => $PorCobrar);


}else{

$variable = "DISTINTO";
    
foreach ($cuentasCXC as $CXC => $cuentas){

if($cuentas["id_Cliente"] == $value["id_Cliente"]){

        $TotalFactura = $cuentasCXC[$CXC]["NFactura"] + 1;
        $cuentasCXC[$CXC]["NFactura"] = $TotalFactura;
        $sumaDeuda = $cuentas["DeudaInicial"] + $Deuda;
        $cuentasCXC[$CXC]["DeudaInicial"] = $sumaDeuda;
        $sumaCobrado = $cuentas["TotalCobrado"] + $Cobro;
        $cuentasCXC[$CXC]["TotalCobrado"] = $sumaCobrado;
        $suma = $cuentas["Total"] + $PorCobrar;
        $cuentasCXC[$CXC]["Total"] = $suma;

        $variable = "IGUAL";


}
}
if($variable == "DISTINTO"){
    $TotalFactura = 1;
$cuentasCXC [] = array("id_Cliente" => $value["id_Cliente"],
"NFactura" => $TotalFactura,
"NombreCliente" => $respuestaCliente["Nombre_Cliente"],
"DeudaInicial" => $Deuda,
"TotalCobrado" => $Cobro,
"Total" => $PorCobrar);

}
}

$bloque4 = <<<EOF

    <table style="font-size:7px; padding:5px 10px">


    <tr>

        <td style="border: 1px solid #666; color:#050505; background-color:white; width:70px; text-align:center">$value[NCF_cxc]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:130px; text-align:center">$respuestaCliente[Nombre_Cliente]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:60px; text-align:center">$value[FechaAnoMes_cxc]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:40px; text-align:center">$value[FechaDia_cxc]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:80px; text-align:center">$mostarDeuda</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:70px; text-align:center">$mostarCobro</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:70px; text-align:center">$mostarPorCobrar</td>
        
         


    </tr>

    </table>
            
EOF;


$pdf->writeHtml($bloque4, false, false, false, false, '');





    }else{
if($ClienteCXC == $value["id_Cliente"]){
            $id = "id";

$valorid = $value["id_Cliente"];

$respuestaCliente = ControladorClientes::ctrModalEditarClientes($id, $valorid);

/*******************************/

$Deuda = $value["Neto"] + $value["Impuesto"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
$Cobro = $value["Monto_1"] + $value["Monto_2"] + $value["Monto_3"];
$PorCobrar = $Deuda - $Cobro;

$mostarDeuda = number_format($Deuda, 2);
$mostarCobro =number_format($Cobro, 2);
$mostarPorCobrar = number_format($PorCobrar, 2);

$TotalDeuda = $TotalDeuda + $Deuda;
$TotalCobro = $TotalCobro + $Cobro;
/******Resumen por Suplidores***/


if($key = 0){
    $TotalFactura = 1;
    
    $cuentasCXC [] = array("id_Cliente" => $value["id_Cliente"],
"NFactura" => $TotalFactura,
"NombreCliente" => $respuestaCliente["Nombre_Cliente"],
"DeudaInicial" => $Deuda,
"TotalCobrado" => $Cobro,
"Total" => $PorCobrar);


}else{

$variable = "DISTINTO";
    
foreach ($cuentasCXC as $CXC => $cuentas){

if($cuentas["id_Cliente"] == $value["id_Cliente"]){

        $TotalFactura = $cuentasCXC[$CXC]["NFactura"] + 1;
        $cuentasCXC[$CXC]["NFactura"] = $TotalFactura;
        $sumaDeuda = $cuentas["DeudaInicial"] + $Deuda;
        $cuentasCXC[$CXC]["DeudaInicial"] = $sumaDeuda;
        $sumaCobrado = $cuentas["TotalCobrado"] + $Cobro;
        $cuentasCXC[$CXC]["TotalCobrado"] = $sumaCobrado;
        $suma = $cuentas["Total"] + $PorCobrar;
        $cuentasCXC[$CXC]["Total"] = $suma;
        $variable = "IGUAL";


}
}
if($variable == "DISTINTO"){
    $TotalFactura = 1;
$cuentasCXC [] = array("id_Cliente" => $value["id_Cliente"],
"NFactura" => $TotalFactura,
"NombreCliente" => $respuestaCliente["Nombre_Cliente"],
"DeudaInicial" => $Deuda,
"TotalCobrado" => $Cobro,
"Total" => $PorCobrar);

}
}

$bloque4 = <<<EOF

    <table style="font-size:7px; padding:5px 10px">


    <tr>

        <td style="border: 1px solid #666; color:#050505; background-color:white; width:70px; text-align:center">$value[NCF_cxc]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:130px; text-align:center">$respuestaCliente[Nombre_Cliente]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:60px; text-align:center">$value[FechaAnoMes_cxc]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:40px; text-align:center">$value[FechaDia_cxc]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:80px; text-align:center">$mostarDeuda</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:70px; text-align:center">$mostarCobro</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:70px; text-align:center">$mostarPorCobrar</td>
        
         


    </tr>

    </table>
            
EOF;


$pdf->writeHtml($bloque4, false, false, false, false, '');





        }




    

    }

  


}/*cierre periodo TODO*/





}/*CIERRE FOR */

$PorCobrar = $TotalDeuda - $TotalCobro;
$TotalCobro = $TotalDeuda - $PorCobrar;

$mostrarDeuda = number_format($TotalDeuda, 2);
$mostarPorCobrar = number_format($PorCobrar, 2);
$mostarTotalCobro = number_format($TotalCobro, 2);

$bloque5 = <<<EOF

    <table style="font-size:8px; padding:5px 10px">


    <tr>

        <td style="color:#333; width:80px; text-align:center"></td>
        <td style="color:#333; width:80px; text-align:center"></td>
        <td style="color:#333; width:70px; text-align:center"></td>
        <td style="color:#333; width:40px; text-align:center"></td>
        <td style="color:#333; width:80px; text-align:center"></td>
        <td style="color:#333; width:80px; text-align:center"></td>
        <td style="color:#333; width:80px; text-align:center"></td>


    </tr>
     <tr>

         <td style="color:#333; background-color:white; width:130px; text-align:center"></td>
        <td style="color:#333; width:130px; text-align:center"></td>
       
       <td style="font-weight: bold; border: 1px solid black; color:black; background-color:#7CC879; width:40px; text-align:center">Total</td>
        <td style="font-weight: bold; border: 1px solid black; color:black; background-color:#7CC879; width:80px; text-align:center">$mostrarDeuda</td>
        <td style="font-weight: bold; border: 1px solid black; color:black; background-color:#7CC879; width:70px; text-align:center">$mostarTotalCobro</td>
        <td style="font-weight: bold; border: 1px solid black; color:black; background-color:#7CC879; width:70px; text-align:center">$mostarPorCobrar</td>
         


    </tr>

    </table>

          
EOF;


$pdf->writeHtml($bloque5, false, false, false, false, '');
$bloque6 = <<<EOF
<br>
    <table style="font-size:10px; padding:5px 10px">


    <tr>

      
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:520px; text-align:center">Resumen Por Cliente</td>


    </tr>
     <tr>

         <td style="font-size:8px; font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:40px; text-align:center">Fact.</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:150px; text-align:center">Cliente</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:110px; text-align:center">Total Deuda</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:110px; text-align:center">Total Cobrado</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:110px; text-align:center">Total Por cobrar</td>
       
    </tr>

    </table>



        
            
EOF;

$pdf->startPageGroup();

$pdf->AddPage();
$pdf->writeHtml($bloque6, false, false, false, false, '');

foreach ($cuentasCXC as $key => $value) {
    $TotalDeuda = number_format($value["DeudaInicial"], 2);
    $TotalCobrado = number_format($value["TotalCobrado"], 2);
    $TotalSuplidor = number_format($value["Total"], 2);
$bloque7 = <<<EOF

    <table style="font-size:9px; padding:5px 10px">


     <tr>

        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:white; width:40px; text-align:center">$value[NFactura]</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:white; width:150px; text-align:center">$value[NombreCliente]</td>
         <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:white; width:110px; text-align:center">$TotalDeuda</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:white; width:110px; text-align:center">$TotalCobrado</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:white; width:110px; text-align:center">$TotalSuplidor</td>
       
       
    </tr>


    </table>


            
EOF;


$pdf->writeHtml($bloque7, false, false, false, false, '');
 }
/**************************************
SALIDA DEL ARCHVIO
***************************************/

$pdf->Output('Reportecxc.pdf', 'I');

}

}

$ReporteCXC = new imprimirPDFCXC();
$ReporteCXC -> RncEmpresaPDFCXC = $_GET["RncEmpresaPDFCXC"];
$ReporteCXC -> PeriodoCXC = $_GET["PeriodoCXC"];
$ReporteCXC -> ClienteCXC = $_GET["ClienteCXC"];
$ReporteCXC -> ImpresionPDFCXC();

 ?>

