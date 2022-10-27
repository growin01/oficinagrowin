<?php
require_once "../../../controladores/cxp.controlador.php";
require_once "../../../modelos/cxp.modelo.php";

require_once "../../../controladores/suplidores.controlador.php";
require_once "../../../modelos/suplidores.modelo.php";

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
class imprimirPDFCXP{
     

    public $RncEmpresaPDFCXP;
    public $PeriodoCXP;
    public $EstadoCXP;
    public $Suplidor;

    public function ImpresionPDFCXP(){



$Rnc_Empresa_CXP = $this->RncEmpresaPDFCXP;
$Suplidor = $this->Suplidor;

$respuestaCXP = ControladorCXP::ctrMostarCXPSuplidor($Rnc_Empresa_CXP, $Suplidor);



/****************************************
    TRAEMOS LA INFORMACION DEL VENDEDOR
*****************************************/

$tabla = "empresas";
$taRncEmpresa = "Rnc_Empresa";
$taRnc_Empresa_Master = "Rnc_Empresa_Master";
$Rnc_Empresa = $Rnc_Empresa_CXP;
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

$EstadoCXP = $this->EstadoCXP;
$Periodo = $this->PeriodoCXP;




$MostrarEstadoCXP = "Por Pagar";
$Titulos ="Cuentas Por Pagar ";
$Periodo ="Todo";

$TotalResumen = "Total Por Pagar";


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
                 <td style="background-color:white; width:70px; text-align:center">$MostrarEstadoCXP</td>
            

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
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:90px; text-align:center">SUPLIDOR</td>
                <td style="font-size:6px; font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:90px; text-align:center">OBSERVACIÓN</td>
                <td style="font-size:6px; font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:50px; text-align:center">AÑO/MES</td>
                <td style="font-size:5px; font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:30px; text-align:center">DÍA</td>
                <td style="font-size:5px; font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:30px; text-align:center">$</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:60px; text-align:center">DEUDA INICIAL</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:60px; text-align:center"> PAGADO</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:60px; text-align:center">POR PAGAR</td>
                

            </tr>


        </table>

EOF;


$pdf->writeHtml($bloque3, false, false, false, false, '');


$TotalDeuda = 0;
$TotalPagado = 0;
$PorPagar = 0;
$Deuda = 0;
$cuentasCXP= []; 

$mostrarDeuda = 0;
$mostarPorPagar  = 0;
$mostarTotalPagado  = 0;

$TotalFactura = 0;

$TotalDeudaUSD = 0;
$TotalPagadoUSD = 0;
$PorPagarUSD = 0;
$DeudaUSD = 0;
$cuentasCXPUSD= []; 
$mostrarDeudaUSD = 0;
$mostarPorPagarUSD = 0;
$mostarTotalPagadoUSD  = 0;


foreach ($respuestaCXP as $key => $value) {

    if($Periodo == "Todo"){


$Rnc_Empresa_Suplidor = $Rnc_Empresa_CXP;
$id_Suplidor = "id";    

$Valor_idSuplidor = $value["id_Suplidor"];

$respuestasuplidor = ControladorSuplidores::ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);

    $Nombre_Suplidor = $respuestasuplidor["Nombre_Suplidor"];

if($value["Moneda"] == "DOP"){ 
    $Deuda = $value["Neto"] + $value["Impuesto"] + $value["impuestoISC"]  + $value["otrosimpuestos"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
  
    
    $PorPagar = 0;
    $Pagado = 0;               

    $Pagado = $value["MontoPagado"];
    $PorPagar = $Deuda - $Pagado;

    $mostarDeuda = number_format($Deuda, 2);
    $mostarPagado =number_format($Pagado, 2);
    $mostarPorPagar = number_format($PorPagar, 2);



}else{

    $DeudaUSD = $value["Neto"] + $value["Impuesto"] + $value["impuestoISC"]  + $value["otrosimpuestos"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
  
    $TotalSumaUSD = 0;
    $PorPagarUSD = 0;
    $PagadoUSD = 0;               

    $PagadoUSD = $value["MontoPagado"];
    $PorPagarUSD = $DeudaUSD - $PagadoUSD;

    $mostarDeudaUSD = number_format($DeudaUSD, 2);
    $mostarPagadoUSD = number_format($PagadoUSD, 2);
    $mostarPorPagarUSD = number_format($PorPagarUSD, 2);



}

if($EstadoCXP == "PorPagar"){ 
    
    if ($PorPagar > 0.1) {
        if($value["Moneda"] == "DOP"){     
            $TotalDeuda = $TotalDeuda + $Deuda;
            $TotalPagado = $TotalPagado + $Pagado;
            $bloque4 = <<<EOF

    <table style="font-size:7px; padding:5px 10px">


    <tr>

        <td style="border: 1px solid #666; color:#050505; background-color:white; width:80px; text-align:center">$value[NCF_cxp]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:90px; text-align:center">$Nombre_Suplidor</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:90px; text-align:center">$value[Observaciones]</td>
        <td style="font-size:6px; border: 1px solid #666; color:#050505; background-color:white; width:50px; text-align:center">$value[FechaAnoMes_cxp]</td>
        <td style="font-size:6px; border: 1px solid #666; color:#050505; background-color:white; width:30px; text-align:center">$value[FechaDia_cxp]</td>
        <td style="font-size:4px; font-weight: bold; border: 1px solid #666; color:#050505; background-color:white; width:30px; text-align:center">$value[Moneda]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:60px; text-align:center">$mostarDeuda</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:60px; text-align:center">$mostarPagado</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:60px; text-align:center">$mostarPorPagar</td>
        
         


    </tr>

    </table>

    
            
EOF;


$pdf->writeHtml($bloque4, false, false, false, false, '');
        } 
     }

  if ($PorPagarUSD > 0.1) {
        if($value["Moneda"] == "USD"){     
            $TotalDeudaUSD = $TotalDeudaUSD + $DeudaUSD;
            $TotalPagadoUSD = $TotalPagadoUSD + $PagadoUSD;
            $bloque4 = <<<EOF

    <table style="font-size:7px; padding:5px 10px">


    <tr>

        <td style="border: 1px solid #666; color:#050505; background-color:white; width:80px; text-align:center">$value[NCF_cxp]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:90px; text-align:center">$Nombre_Suplidor</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:90px; text-align:center">$value[Observaciones]</td>
        <td style="font-size:6px; border: 1px solid #666; color:#050505; background-color:white; width:50px; text-align:center">$value[FechaAnoMes_cxp]</td>
        <td style="font-size:6px; border: 1px solid #666; color:#050505; background-color:white; width:30px; text-align:center">$value[FechaDia_cxp]</td>
        <td style="font-size:4px; font-weight: bold; border: 1px solid #666; color:#050505; background-color:white; width:30px; text-align:center">$value[Moneda]</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:60px; text-align:center">$mostarDeudaUSD</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:60px; text-align:center">$mostarPagadoUSD</td>
        <td style="border: 1px solid #666; color:#050505; background-color:white; width:60px; text-align:center">$mostarPorPagarUSD</td>
        
         


    </tr>

    </table>

    
            
EOF;


$pdf->writeHtml($bloque4, false, false, false, false, '');


            } 
    }




}/*CIERRE $EstadoCXC == "PorCobrar"*/



 }/*CIERRE $Periodo == "Todo" */
 }/*CIERRE FOR EstadoCXP == "PorPagar" */
 


$PorPagar = $TotalDeuda - $TotalPagado;
$mostarPorPagar = number_format($PorPagar, 2);

$mostrarDeuda = number_format($TotalDeuda, 2);
$mostarPorPagar = number_format($PorPagar, 2);
$mostarTotalPagado =  number_format($TotalPagado, 2);

$PorPagarUSD = $TotalDeudaUSD - $TotalPagadoUSD;
$mostarPorPagarUSD = number_format($PorPagarUSD, 2);

$mostrarDeudaUSD = number_format($TotalDeudaUSD, 2);
$mostarPorPagarUSD = number_format($PorPagarUSD, 2);
$mostarTotalPagadoUSD =  number_format($TotalPagadoUSD, 2);


if ($DeudaUSD = 0){ 

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

         <td style="font-weight: bold; width:80px; text-align:center"></td>
                <td style="font-weight: bold; width:90px; text-align:center"></td>
                <td style="font-size:6px; font-weight: bold; width:130px; text-align:center"></td>
                
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; font-size:8px; font-weight: bold ;width:70px; text-align:center">TOTAL DOP</td>
                <td style="font-weight: bold; border: 1px solid #666; width:60px; text-align:center; background-color:$faccolor2">$mostrarDeuda</td>
                <td style="font-weight: bold; border: 1px solid #666; width:60px; text-align:center; background-color:$faccolor2">$mostarTotalPagado</td>
                <td style="font-weight: bold; border: 1px solid #666; width:60px; text-align:center; background-color:$faccolor2">$mostarPorPagar</td>
    </tr>

    </table>

          
EOF;


$pdf->writeHtml($bloque5, false, false, false, false, '');

} else{
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

         <td style="font-weight: bold; width:80px; text-align:center"></td>
                <td style="font-weight: bold; width:90px; text-align:center"></td>
                <td style="font-size:6px; font-weight: bold; width:130px; text-align:center"></td>
                
                <td style="font-weight: bold; border: 1px solid #666;background-color:$faccolor2;font-size:8px; font-weight: bold; width:70px; text-align:center">TOTAL DOP</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:60px; text-align:center">$mostrarDeuda</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:60px; text-align:center">$mostarTotalPagado</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:60px; text-align:center">$mostarPorPagar</td>

    </tr>
    <tr>

         <td style="font-weight: bold; width:80px; text-align:center"></td>
                <td style="font-weight: bold; width:90px; text-align:center"></td>
                <td style="font-size:6px; font-weight: bold; width:130px; text-align:center"></td>
                
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; font-size:8px; font-weight: bold; width:70px; text-align:center">TOTAL USD</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:60px; text-align:center">$mostrarDeudaUSD</td>
                <td style="font-weight: bold; border: 1px solid #666; background-color:$faccolor2; width:60px; text-align:center">$mostarTotalPagadoUSD</td>
                <td style="font-weight: bold; border: 1px solid #666;background-color:$faccolor2; width:60px; text-align:center">$mostarPorPagarUSD</td>

    </tr>

    </table>

          
EOF;


$pdf->writeHtml($bloque5, false, false, false, false, '');



}

/************************* RESUMEN POR CLIENTES DOP***********************************************/
$bloque6 = <<<EOF
<br>
    <table style="font-size:10px; padding:5px 10px">


    <tr>

      
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:400px; text-align:center">Resumen Por Suplidor DOP</td>


    </tr>
     <tr>

         <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:80px; text-align:center">N° Facturas</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:210px; text-align:center">Suplidor</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:110px; text-align:center">Total Por Pagar</td>
       
    </tr>

    </table>



        
            
EOF;

$pdf->startPageGroup();

$pdf->AddPage();
$pdf->writeHtml($bloque6, false, false, false, false, '');

$TotalDeuda = 0;
$TotalPagado = 0;
$PorPagar = 0;
$Deuda = 0;
$cuentasCXP= []; 


$TotalFactura = 0;
$key = 0;
$CXP = 0;
foreach ($respuestaCXP as $key => $value) {

    if($Periodo == "Todo"){


$Rnc_Empresa_Suplidor = $Rnc_Empresa_CXP;
$id_Suplidor = "id";    

$Valor_idSuplidor = $value["id_Suplidor"];

$respuestasuplidor = ControladorSuplidores::ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);

    $Nombre_Suplidor = $respuestasuplidor["Nombre_Suplidor"];

if($value["Moneda"] == "DOP"){ 
    $Deuda = $value["Neto"] + $value["Impuesto"] + $value["impuestoISC"]  + $value["otrosimpuestos"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
  
    $TotalSuma = 0;
    $PorPagar = 0;
    $Pagado = 0;               

    $Pagado = $value["MontoPagado"];
    $PorPagar = $Deuda - $Pagado;

   if($EstadoCXP == "PorPagar"){ 
    
    if ($PorPagar > 0.1) { 

if($key = 0){
    $TotalFactura = 1;
    $cuentasCXP [] = array("id_Suplidor" => $value["id_Suplidor"],
"NFactura" => $TotalFactura,
"NombreSuplidor" => $Nombre_Suplidor,
"Total" => $PorPagar);


}else{

$variable = "DISTINTO";
    
foreach ($cuentasCXP as $CXP => $cuentas){

if($cuentas["id_Suplidor"] == $value["id_Suplidor"]){

        $TotalFactura = $cuentasCXP[$CXP]["NFactura"] + 1;
        $cuentasCXP[$CXP]["NFactura"] = $TotalFactura;
        $suma = $cuentas["Total"] + $PorPagar;
        $cuentasCXP[$CXP]["Total"] = $suma;
        $variable = "IGUAL";


}
}
if($variable == "DISTINTO"){
    $TotalFactura = 1;
$cuentasCXP [] = array("id_Suplidor" => $value["id_Suplidor"],
"NFactura" => $TotalFactura,
"NombreSuplidor" => $Nombre_Suplidor,
"Total" => $PorPagar);

}/* if variable distinto*/
} /* key diferente de 0*/
} /* Por pagar mayor de cero*/
} /*$EstadoCXP == "PorPagar"*/
}/*$value["Moneda"] == "DOP"*/
}/*$Periodo == "Todo"*/
}/*foreach ($respuestaCXP as $key => $value)*/

foreach ($cuentasCXP as $key => $value) {
    $TotalSuplidor = number_format($value["Total"], 2);
$bloque7 = <<<EOF

    <table style="font-size:9px; padding:5px 10px">


     <tr>

        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">$value[NFactura]</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:white; width:210px; text-align:center">$value[NombreSuplidor]</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:white; width:110px; text-align:center">$TotalSuplidor</td>
       
    </tr>


    </table>


            
EOF;


$pdf->writeHtml($bloque7, false, false, false, false, '');
 }

/********************* FIN RESUMEN POR CLIENTES DOP***********************************************/

$bloque8 = <<<EOF
<br>
    <table style="font-size:10px; padding:5px 10px">
<tr>

      
        <td></td>


    </tr>

    <tr>

      
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:400px; text-align:center">Resumen Por Suplidor USD</td>


    </tr>
     <tr>

         <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:80px; text-align:center">N° Facturas</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:210px; text-align:center">Suplidor</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:$faccolor2; width:110px; text-align:center">Total Por Pagar</td>
       
    </tr>

    </table>



        
            
EOF;


$pdf->writeHtml($bloque8, false, false, false, false, '');

$TotalDeuda = 0;
$TotalPagado = 0;
$PorPagar = 0;
$Deuda = 0;
$cuentasCXP= []; 



$TotalFactura = 0;
$key = 0;
$CXP = 0;
foreach ($respuestaCXP as $key => $value) {

    if($Periodo == "Todo"){


$Rnc_Empresa_Suplidor = $Rnc_Empresa_CXP;
$id_Suplidor = "id";    

$Valor_idSuplidor = $value["id_Suplidor"];

$respuestasuplidor = ControladorSuplidores::ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);

    $Nombre_Suplidor = $respuestasuplidor["Nombre_Suplidor"];

if($value["Moneda"] == "USD"){ 
    $Deuda = $value["Neto"] + $value["Impuesto"] + $value["impuestoISC"]  + $value["otrosimpuestos"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
  
    $TotalSuma = 0;
    $PorPagar = 0;
    $Pagado = 0;               

    $Pagado = $value["MontoPagado"];
    $PorPagar = $Deuda - $Pagado;

  if($EstadoCXP == "PorPagar"){ 
    
    if ($PorPagar > 0.1) {  

if($key = 0){
    $TotalFactura = 1;
    $cuentasCXP [] = array("id_Suplidor" => $value["id_Suplidor"],
"NFactura" => $TotalFactura,
"NombreSuplidor" => $Nombre_Suplidor,
"Total" => $PorPagar);


}else{

$variable = "DISTINTO";
    
foreach ($cuentasCXP as $CXP => $cuentas){

if($cuentas["id_Suplidor"] == $value["id_Suplidor"]){

        $TotalFactura = $cuentasCXP[$CXP]["NFactura"] + 1;
        $cuentasCXP[$CXP]["NFactura"] = $TotalFactura;
        $suma = $cuentas["Total"] + $PorPagar;
        $cuentasCXP[$CXP]["Total"] = $suma;
        $variable = "IGUAL";


}
}
if($variable == "DISTINTO"){
    $TotalFactura = 1;
$cuentasCXP [] = array("id_Suplidor" => $value["id_Suplidor"],
"NFactura" => $TotalFactura,
"NombreSuplidor" => $Nombre_Suplidor,
"Total" => $PorPagar);

}/* if variable distinto*/
} /* key diferente de 0*/
} /* Por pagar mayor de cero*/
} /*$EstadoCXP == "PorPagar"*/
}/*$value["Moneda"] == "DOP"*/
}/*$Periodo == "Todo"*/
}/*foreach ($respuestaCXP as $key => $value)*/

foreach ($cuentasCXP as $key => $value) {
    $TotalSuplidor = number_format($value["Total"], 2);
$bloque9 = <<<EOF

    <table style="font-size:9px; padding:5px 10px">


     <tr>

        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">$value[NFactura]</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:white; width:210px; text-align:center">$value[NombreSuplidor]</td>
        <td style="font-weight: bold; border: 1px solid #666; color:#333; background-color:white; width:110px; text-align:center">$TotalSuplidor</td>
       
    </tr>


    </table>


            
EOF;


$pdf->writeHtml($bloque9, false, false, false, false, '');
 }





$pdf->Output('Reportecxp.pdf', 'I');



}

}

$ReporteCXPTodoPorPagar = new imprimirPDFCXP();
$ReporteCXPTodoPorPagar -> RncEmpresaPDFCXP = $_GET["RncEmpresaPDFCXP"];
$ReporteCXPTodoPorPagar -> PeriodoCXP = $_GET["PeriodoCXP"];
$ReporteCXPTodoPorPagar -> EstadoCXP = $_GET["EstadoCXP"];
$ReporteCXPTodoPorPagar -> Suplidor = $_GET["Suplidor"];
$ReporteCXPTodoPorPagar -> ImpresionPDFCXP();

 ?>

