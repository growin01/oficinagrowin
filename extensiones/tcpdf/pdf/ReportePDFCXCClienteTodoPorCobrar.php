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
    public $EstadoCXC;
    public $Cliente;

    public function ImpresionPDFCXC(){



$Rnc_Empresa_CXC = $this->RncEmpresaPDFCXC;
$Cliente = $this->Cliente;

$respuestaCXC = ControladorCXC::ctrMostarCXCCliente($Rnc_Empresa_CXC, $Cliente);

$EstadoCXC = $this->EstadoCXC;
$Periodo = $this->PeriodoCXC;



$MostrarEstadoCXC = "Por Cobrar";
$Titulos ="Cuentas Por Cobrar";
$TotalResumen = "Total Por Cobrar";



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

$largo = $respuestaEmpresa["largo"]."px";


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
        <td style="width:$ancho"><img src="../../../$Logo" width="$ancho" height="$largo"></td>
            
        <td style="width:$anchoresto; font-size:15px; text-align:center">INFORME FINANCIERO<br>$Nombre<br>$Titulos<br>Periodo $Periodo</td>
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

                <td style="background-color:white; width:70px; text-align:center">ESTATUS: </td>
                 <td style="background-color:white; width:70px; text-align:center">$MostrarEstadoCXC</td>
            

          </tr>
           <tr>

                <td style="width:70px; text-align:center">PERIODO: </td>
                 <td style="width:70px; text-align:center">$Periodo </td>
            

          </tr>
    
    
       
    </table>


EOF;

$pdf->writeHtml($bloque2, false, false, false, false, '');
$bloque3 = <<<EOF

        <table style="font-size:7px; padding:5px 10px">

            <tr>

                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:80px; text-align:center">NCF</td>
                <td style="font-size:6px; font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:90px; text-align:center">CLIENTE</td>
                <td style="font-size:6px;font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:90px; text-align:center">DESCRIP.</td>
                <td style="font-size:6px; font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:50px; text-align:center">AÑO/MES</td>
                <td style="font-size:5px; font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:30px; text-align:center">DÍA</td>
                <td style="font-size:5px; font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:30px; text-align:center">$</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:60px; text-align:center">DEUDA INICIAL</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:60px; text-align:center"> COBRADO</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:60px; text-align:center">POR COBRAR</td>
                

            </tr>


        </table>

EOF;

$pdf->writeHtml($bloque3, false, false, false, false, '');
$TotalDeuda = 0;
 $TotalCobro = 0;
 $PorCobrar = 0;
 $cuentasCXC = []; 
 $Deuda = 0;

$TotalDeudaUSD = 0;
 $TotalCobroUSD = 0;
 $PorCobrarUSD = 0;
 $cuentasCXC = []; 
 $DeudaUSD = 0;
foreach ($respuestaCXC as $key => $value) {
    if($Periodo == "Todo"){

    $id = "id";

    $valorid = $value["id_Cliente"];

$respuestaCliente = ControladorClientes::ctrModalEditarClientes($id, $valorid);

if($value["Moneda"] == "DOP"){ 
    $Deuda = $value["Neto"] + $value["Impuesto"] - $value["Descuento"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
               
    $TotalSuma = 0;
    $PorCobrar = 0;
    $Cobro = 0;

    $Cobro = $value["MontoCobrado"];
    $PorCobrar = $Deuda - $Cobro;



/*******************************/

  
$mostarDeuda = number_format($Deuda, 2);
$mostarCobro =number_format($Cobro, 2);
$mostarPorCobrar = number_format($PorCobrar, 2);

}else{
    
    $DeudaUSD = $value["Neto"] + $value["Impuesto"] - $value["Descuento"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
               
    $TotalSumaUSD = 0;
    $PorCobrarUSD = 0;
    $CobroUSD = 0;

    $CobroUSD = $value["MontoCobrado"];
    $PorCobrarUSD = $DeudaUSD - $CobroUSD;



/*******************************/

  
$mostarDeudaUSD = number_format($DeudaUSD, 2);
$mostarCobroUSD =number_format($CobroUSD, 2);
$mostarPorCobrarUSD = number_format($PorCobrarUSD, 2);




}

if($EstadoCXC == "PorCobrar"){ 
    
if ($PorCobrar > 0.001) {
    if($value["Moneda"] == "DOP"){
        $TotalDeuda = $TotalDeuda + $Deuda;
        $TotalCobro = $TotalCobro + $Cobro;

$bloque4 = <<<EOF

    <table style="font-size:6px; padding:5px 10px">


    <tr>

        <td style="border: 1px solid #666; color:#050505; background-color:white; width:80px; text-align:center">$value[NCF_cxc]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:90px; text-align:center">$respuestaCliente[Nombre_Cliente]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:90px; text-align:center">$value[Observaciones]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:50px; text-align:center">$value[FechaAnoMes_cxc]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:30px; text-align:center">$value[FechaDia_cxc]</td>
        <td style="font-size:4px; font-weight: bold; border: 1px solid #666; color:#050505; background-color:white; width:30px; text-align:center">$value[Moneda]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:60px; text-align:center">$mostarDeuda</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:60px; text-align:center">$mostarCobro</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:60px; text-align:center">$mostarPorCobrar</td>
        
         


    </tr>

    </table>
            
EOF;


$pdf->writeHtml($bloque4, false, false, false, false, '');


    }

}
if ($PorCobrarUSD > 0.001) {
    if($value["Moneda"] == "USD"){
        $TotalDeudaUSD = $TotalDeudaUSD + $DeudaUSD;
        $TotalCobroUSD = $TotalCobroUSD + $CobroUSD;
        
$bloque4 = <<<EOF

    <table style="font-size:6px; padding:5px 10px">


    <tr>

       <td style="border: 1px solid #666; color:#050505; background-color:white; width:80px; text-align:center">$value[NCF_cxc]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:90px; text-align:center">$respuestaCliente[Nombre_Cliente]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:90px; text-align:center">$value[Observaciones]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:50px; text-align:center">$value[FechaAnoMes_cxc]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:30px; text-align:center">$value[FechaDia_cxc]</td>
        <td style="font-size:4px; font-weight: bold; border: 1px solid #666; color:#050505; background-color:white; width:30px; text-align:center">$value[Moneda]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:60px; text-align:center">$mostarDeudaUSD</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:60px; text-align:center">$mostarCobroUSD</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:60px; text-align:center">$mostarPorCobrarUSD</td>
        
         


    </tr>

    </table>
            
EOF;


$pdf->writeHtml($bloque4, false, false, false, false, '');


    }

}

}/*CIERRE $EstadoCXC == "PorCobrar"*/



 }/*CIERRE $Periodo == "Todo" */
 }/*CIERRE FOR EstadoCXP == "PorPagar" */


$PorCobrar = $TotalDeuda - $TotalCobro;
$TotalCobro = $TotalDeuda - $PorCobrar;

$mostrarDeuda = number_format($TotalDeuda, 2);
$mostarPorCobrar = number_format($PorCobrar, 2);
$mostarTotalCobro = number_format($TotalCobro, 2);

$PorCobrarUSD = $TotalDeudaUSD - $TotalCobroUSD;
$TotalCobroUSD = $TotalDeudaUSD - $PorCobrarUSD;

$mostrarDeudaUSD = number_format($TotalDeudaUSD, 2);
$mostarPorCobrarUSD = number_format($PorCobrarUSD, 2);
$mostarTotalCobroUSD = number_format($TotalCobroUSD, 2);


if($Deuda > 0){
    $bloque5 = <<<EOF

    <table style="font-size:7px; padding:5px 10px">


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
        <td style="color:#333; width:180px; text-align:center"></td>
         
       
       <td style="font-weight: bold; border: 1px solid black; color:black; background-color:#7CC879; width:60px; text-align:center">Total DOP</td>
        <td style="font-weight: bold; border: 1px solid black; color:black; background-color:#7CC879; width:60px; text-align:center">$mostrarDeuda</td>
        <td style="font-weight: bold; border: 1px solid black; color:black; background-color:#7CC879; width:60px; text-align:center">$mostarTotalCobro</td>
        <td style="font-weight: bold; border: 1px solid black; color:black; background-color:#7CC879; width:60px; text-align:center">$mostarPorCobrar</td>
         


    </tr>

    </table>

          
EOF;


$pdf->writeHtml($bloque5, false, false, false, false, '');



}
if($DeudaUSD > 0){
    $bloque6 = <<<EOF

    <table style="font-size:7px; padding:5px 10px">


     <tr>

         <td style="color:#333; background-color:white; width:130px; text-align:center"></td>
        <td style="color:#333; width:180px; text-align:center"></td>
       
       <td style="font-weight: bold; border: 1px solid black; color:black; background-color:#7CC879; width:60px; text-align:center">Total USD</td>
        <td style="font-weight: bold; border: 1px solid black; color:black; background-color:#7CC879; width:60px; text-align:center">$mostrarDeudaUSD</td>
        <td style="font-weight: bold; border: 1px solid black; color:black; background-color:#7CC879; width:60px; text-align:center">$mostarTotalCobroUSD</td>
        <td style="font-weight: bold; border: 1px solid black; color:black; background-color:#7CC879; width:60px; text-align:center">$mostarPorCobrarUSD</td>
         


    </tr>

    </table>

          
EOF;


$pdf->writeHtml($bloque6, false, false, false, false, '');



}
$bloque7 = <<<EOF
<br>
    <table style="font-size:10px; padding:5px 10px">


    <tr>

      
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:440px; text-align:center">Resumen Por Cliente DOP</td>


    </tr>
     <tr>

         <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:80px; text-align:center">N° Facturas</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:250px; text-align:center">Cliente</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:110px; text-align:center">$TotalResumen</td>
       
    </tr>

    </table>



        
            
EOF;

$pdf->startPageGroup();

$pdf->AddPage();
$pdf->writeHtml($bloque7, false, false, false, false, '');

$TotalDeuda = 0;
 $TotalCobro = 0;
 $PorCobrar = 0;
 $Deuda = 0;
 $cuentasCXC = []; 
 $key = 0;
$TotalFactura = 0;
$CXC = 0;


foreach ($respuestaCXC as $key => $value) {
    if($Periodo == "Todo"){

    $id = "id";

    $valorid = $value["id_Cliente"];

$respuestaCliente = ControladorClientes::ctrModalEditarClientes($id, $valorid);

if($value["Moneda"] == "DOP"){ 
    $Deuda = $value["Neto"] + $value["Impuesto"] - $value["Descuento"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
               
    $TotalSuma = 0;
    $PorCobrar = 0;
    $Cobro = 0;

    $Cobro = $value["MontoCobrado"];
    $PorCobrar = $Deuda - $Cobro;





if($EstadoCXC == "PorCobrar"){ 
    
if ($PorCobrar > 0.001) {
    if($key = 0){
    $TotalFactura = 1;
    
    $cuentasCXC [] = array("id_Cliente" => $value["id_Cliente"],
"NFactura" => $TotalFactura,
"NombreCliente" => $respuestaCliente["Nombre_Cliente"],
"Total" => $PorCobrar);


}else{

$variable = "DISTINTO";
    
foreach ($cuentasCXC as $CXC => $cuentas){

if($cuentas["id_Cliente"] == $value["id_Cliente"]){

        $TotalFactura = $cuentasCXC[$CXC]["NFactura"] + 1;
        $cuentasCXC[$CXC]["NFactura"] = $TotalFactura;
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
"Total" => $PorCobrar);

}


}
}
}/*CIERRE $EstadoCXC == "PorCobrar"*/



 }/*CIERRE $Periodo == "Todo" */
 }/*CIERRE FOR EstadoCXP == "PorPagar" */

 }
 foreach ($cuentasCXC as $key => $value) {
    $TotalSuplidor = number_format($value["Total"], 2);
$bloque8 = <<<EOF

    <table style="font-size:9px; padding:5px 10px">


     <tr>

        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">$value[NFactura]</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:white; width:250px; text-align:center">$value[NombreCliente]</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:white; width:110px; text-align:center">$TotalSuplidor</td>
       
    </tr>


    </table>


            
EOF;


$pdf->writeHtml($bloque8, false, false, false, false, '');

 }

 $bloque9 = <<<EOF
<br><br>

    <table style="font-size:10px; padding:5px 10px">


    <tr>

      
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:440px; text-align:center">Resumen Por Cliente USD</td>


    </tr>
     <tr>

         <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:80px; text-align:center">N° Facturas</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:250px; text-align:center">Cliente</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:110px; text-align:center">$TotalResumen</td>
       
    </tr>

    </table>



        
            
EOF;


$pdf->writeHtml($bloque9, false, false, false, false, '');

$TotalDeuda = 0;
$TotalCobro = 0;
$PorCobrar = 0;
$Deuda = 0;
$cuentasCXC = []; 
$key = 0;
$TotalFactura = 0;
$CXC = 0;

foreach ($respuestaCXC as $key => $value) {
    if($Periodo == "Todo"){

    $id = "id";

    $valorid = $value["id_Cliente"];

$respuestaCliente = ControladorClientes::ctrModalEditarClientes($id, $valorid);

if($value["Moneda"] == "USD"){ 
    $Deuda = $value["Neto"] + $value["Impuesto"] - $value["Descuento"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
               
    $TotalSuma = 0;
    $PorCobrar = 0;
    $Cobro = 0;

    $Cobro = $value["MontoCobrado"];
    $PorCobrar = $Deuda - $Cobro;



if($EstadoCXC == "PorCobrar"){ 
    
if ($PorCobrar > 0.1) {
    if($key = 0){
    $TotalFactura = 1;
    
    $cuentasCXC [] = array("id_Cliente" => $value["id_Cliente"],
"NFactura" => $TotalFactura,
"NombreCliente" => $respuestaCliente["Nombre_Cliente"],
"Total" => $PorCobrar);


}else{

$variable = "DISTINTO";
    
foreach ($cuentasCXC as $CXC => $cuentas){

if($cuentas["id_Cliente"] == $value["id_Cliente"]){

        $TotalFactura = $cuentasCXC[$CXC]["NFactura"] + 1;
        $cuentasCXC[$CXC]["NFactura"] = $TotalFactura;
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
"Total" => $PorCobrar);

}

}
}
}/*CIERRE $EstadoCXC == "PorCobrar"*/

 }/*CIERRE $Periodo == "Todo" */
 }/*CIERRE FOR EstadoCXP == "PorPagar" */

 }
 foreach ($cuentasCXC as $key => $value) {
    $TotalSuplidor = number_format($value["Total"], 2);
$bloque10 = <<<EOF

    <table style="font-size:9px; padding:5px 10px">


     <tr>

        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">$value[NFactura]</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:white; width:250px; text-align:center">$value[NombreCliente]</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:white; width:110px; text-align:center">$TotalSuplidor</td>
       
    </tr>


    </table>


            
EOF;


$pdf->writeHtml($bloque10, false, false, false, false, '');

 }
/*********************************
SALIDA DEL ARCHVIO
***************************************/

$pdf->Output('Reportecxc.pdf', 'I');

}

}

$ReporteCXC = new imprimirPDFCXC();
$ReporteCXC -> RncEmpresaPDFCXC = $_GET["RncEmpresaPDFCXC"];
$ReporteCXC -> PeriodoCXC = $_GET["PeriodoCXC"];
$ReporteCXC -> EstadoCXC = $_GET["EstadoCXC"];
$ReporteCXC -> Cliente = $_GET["Cliente"];
$ReporteCXC -> ImpresionPDFCXC();

 ?>

