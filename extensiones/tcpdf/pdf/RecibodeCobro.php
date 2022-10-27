<?php
require_once "../../../controladores/cxc.controlador.php";
require_once "../../../modelos/cxc.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/607.controlador.php";
require_once "../../../modelos/607.modelo.php";

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

   
public $id_reciboCXC;
public $NAsiento; 
public $Rnc_Empresa_cxc; 
public $Rnc_Cliente;
   

    public function traerRecibodepago(){


        /**************************************
                Traer de la empresa
        *****************************************/

$tabla = "recibocxc_empresas";
$id = "id";
$valoridCXC = $this->id_reciboCXC;
    

$respuesta = ModeloCXC::mdlMostrarRecibirPago($tabla, $id, $valoridCXC);
$fechaano = substr($respuesta["FechaAnoMes"], 0, 4);
$fechames = substr($respuesta["FechaAnoMes"], -2);
$Fecha = $respuesta["FechaDia"]."-".$fechames."-".$fechaano;
$Referencia = $respuesta["Referencia"];
$Descripcion = $respuesta["Descripcion"];
$NAsiento = $respuesta["NAsiento"];
$Facturas = json_decode($respuesta["Facturas"], true);
$FacturaCXC = $respuesta["FacturaCXC"];
$ReciboCXC = $respuesta["ReciboCXC"];
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
$Rnc_Empresa = $respuesta["Rnc_Empresa_cxc"];
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
$tabla = "clientes_empresas";
$taRnc_Empresa_Cliente = "Rnc_Empresa_Cliente";
$Rnc_Empresa_Cliente = $this->Rnc_Empresa_cxc;
$taDocumento = "Documento";
$Documento = $this->Rnc_Cliente;

$respuestaClientes = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
        



   

$Nombre_Cliente = $respuestaClientes["Nombre_Cliente"];
$Documento = $respuestaClientes["Documento"];
$Email = $respuestaClientes["Email"];
$Telefono = $respuestaClientes["Telefono"];






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
            <td style="font-size:16px; background-color:#E0E3E7; width:540px; text-align:center">RECIBO DE COBRO</td>
        </tr>   

       <tr>
            <td style="width:90px">Empresa:</td>
            <td style="width:180px">$Nombre</td>
            <td style="width:90px">Cobrado a:</td>
            <td style="width:160px">$Nombre_Cliente</td>
         
   
        </tr>  
         <tr>
            <td style="width:90px">RNC:</td>
            <td style="width:180px">$Rnc_Empresa_Cliente</td>
            <td style="width:90px">RNC Cliente:</td>
            <td style="width:160px">$Documento</td>
         
   
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

             <td style="font-weight: bold; border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; background-color:white; width:80px; text-align:left">$FacturaCXC</td>
            <td style="font-weight: bold; border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; background-color:white; width:140px; text-align:left">Moneda del Recibo</td>

             <td style="font-weight: bold; border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; background-color:white; width:80px; text-align:left">$ReciboCXC</td>
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


$totalMontoCobrado = 0;
$TotalITBIS_Retenido_Tercero_607 = 0;
$TotalRetencion_Renta_por_Terceros_607 = 0;
foreach ($Facturas as $key => $item) {
$montocobrado = number_format($item["ingbanco"], 2);
$totalMontoCobrado = $totalMontoCobrado + $item["ingbanco"];
$vitotalcobrado = number_format($totalMontoCobrado, 2);




$taRnc_Empresa_607 = "Rnc_Empresa_607";
$Rnc_Empresa_607 = $Rnc_Empresa;
$taRnc_Factura_607 = "Rnc_Factura_607";
$Rnc_Factura_607 = $Documento;
$taNCF_607 = "NCF_607";
$NCF_607 = $item["ncf_factura"];
$tabla = "607_empresas";

    

$respuesta607 = Modelo607::MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taRnc_Factura_607, $Rnc_Factura_607, $taNCF_607, $NCF_607);

$Porc_ITBIS_Retenido_607= $respuesta607["Porc_ITBIS_Retenido_607"];
$ITBIS_Retenido_Tercero_607 = $respuesta607["ITBIS_Retenido_Tercero_607"];
$viITBIS_Retenido_Tercero_607 = number_format($ITBIS_Retenido_Tercero_607, 2);
$TotalITBIS_Retenido_Tercero_607 = $TotalITBIS_Retenido_Tercero_607 + $ITBIS_Retenido_Tercero_607;
$viTotalITBIS_Retenido_Tercero_607 = number_format($TotalITBIS_Retenido_Tercero_607, 2);


$Porc_ISR_Retenido_607= $respuesta607["Porc_ISR_Retenido_607"];
$Retencion_Renta_por_Terceros_607 = $respuesta607["Retencion_Renta_por_Terceros_607"];
$viRetencion_Renta_por_Terceros_607 = number_format($Retencion_Renta_por_Terceros_607, 2);
$TotalRetencion_Renta_por_Terceros_607 = $TotalRetencion_Renta_por_Terceros_607 + $Retencion_Renta_por_Terceros_607;
$viTotalRetencion_Renta_por_Terceros_607 = number_format($TotalRetencion_Renta_por_Terceros_607, 2);
    $bloque4 = <<<EOF

   

  <table style="font-size:9px; padding:3px 10px">

    <tr>
    <td style="color:#333; background-color:white; width:80px; text-align:left">$item[ncf_factura]</td>


        <td style="color:#333; background-color:white; width:100px; text-align:right">$montocobrado</td>
        <td style="color:#333; background-color:white; width:70px; text-align:right">$Porc_ITBIS_Retenido_607</td>

        <td style="color:#333; background-color:white; width:100px; text-align:right">$viITBIS_Retenido_Tercero_607</td>
        
       <td style="color:#333; background-color:white; width:70px; text-align:right">$Porc_ISR_Retenido_607</td>

        <td style="color:#333; background-color:white; width:100px; text-align:right">$viRetencion_Renta_por_Terceros_607</td>

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

            <td style="font-weight: bold; border-top-color:#050404; border-top-style:solid; border-top-width:1px; width:100px; text-align:right">Total Cobrado: </td>

            <td style="border-top-color:#050404; border-top-style:solid; border-top-width:1px; background-color:white; width:80px; text-align:right">$vitotalcobrado</td>
                
        </tr>
        


    
    
<tr>
            <td style="width:340px; text-align:center"></td>

            <td style="font-weight: bold; width:100px; text-align:right">Monto ITBIS Ret.: </td>

            <td style="width:80px; text-align:right">$viTotalITBIS_Retenido_Tercero_607</td>
                
        </tr>

      <tr>
            <td style="width:340px; text-align:center"></td>

            <td style="font-weight: bold; width:100px; text-align:right">Monto ISR Ret.: </td>

            <td style="width:80px; text-align:right">$viTotalRetencion_Renta_por_Terceros_607</td>
                
        </tr>

         <tr>
            <td style="background-color:white; width:$restosello; text-align:center"></td>
       
           
            <td style="width:$anchoSello"><img src="../../../$Sello" width="$anchoSello" height="$largoSello"></td>
            

           
                
        </tr>


    </table>
            
EOF;

$pdf->writeHtml($bloque5, false, false, false, false, '');

$pdf->Output($NAsiento.'-Recibo de Cobro-'.$Nombre_Cliente.'.pdf', 'I');

}/*public function traerRecibodepago*/

}/*class imprimirRecibodepago*/

$Recibodepago = new imprimirRecibodepago();
$Recibodepago ->  id_reciboCXC = $_GET["id_reciboCXC"];
$Recibodepago ->  NAsiento = $_GET["NAsiento"];
$Recibodepago ->  Rnc_Empresa_cxc = $_GET["Rnc_Empresa_cxc"];
$Recibodepago ->  Rnc_Cliente = $_GET["Rnc_Cliente"];
$Recibodepago -> traerRecibodepago();



 

 ?>

