<?php
require_once "../../../controladores/diario.controlador.php";
require_once "../../../modelos/diario.modelo.php";

require_once "../../../controladores/contabilidad.controlador.php";
require_once "../../../modelos/contabilidad.modelo.php";

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
class estadosituacion{
     
      
    public $FechaDesde;
    public $FechaHasta;
    public $RncEmpresa;
    public function ImpresionEstadoSituacion(){

$tabla = "empresas";
$taRncEmpresa = "Rnc_Empresa";
$taRnc_Empresa_Master = "Rnc_Empresa_Master";
$Rnc_Empresa = $this->RncEmpresa;
$Rnc_Empresa_Master = null;
$Orden = "id";


$respuestaEmpresa = ModeloEmpresas::mdlMostrarEmpresas($tabla, $taRncEmpresa, $Rnc_Empresa, $taRnc_Empresa_Master, $Rnc_Empresa_Master, $Orden);

$Nombre = $respuestaEmpresa["Nombre_Empresa"];
$Descripcion_Empresa = $respuestaEmpresa["Descripcion_Empresa"];




$Logo = "extensiones/tcpdf/pdf/images/Blanco.jpg";
    


$Rnc_Empresa_LD = $this->RncEmpresa;
$FechaDesde = $this->FechaDesde;
$FechaHasta = $this->FechaHasta;
$Orden = "id_registro";




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

$fechaanoDesde = substr($FechaDesde, 0, 4);
$fechamesDesde = substr($FechaDesde, -2);
$mosfechamesDesde = $fechaanoDesde."-".$fechamesDesde;
$fechaanoHasta = substr($FechaHasta, 0, 4);
$fechamesHasta = substr($FechaHasta, -2);
$mosfechamesHasta = $fechaanoHasta."-".$fechamesHasta;




$bloque1 = <<<EOF

<table style="font-size:10px; padding:3px 3px">
    <tr>
            
            
            <td style="width:540px; font-size:12px; text-align:center">$Nombre<br>Estado de Situación<br>Período Desde $mosfechamesDesde Hasta $mosfechamesHasta<br></td>
            

    </tr>
    
    


   
</table>


EOF;

$pdf->writeHtml($bloque1, false, false, false, false, '');

           

           
          $EstadoResul = ControladorDiario::ctrMostrarEstadoResultado($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $Orden);
          $totalEstado = 0;

            for ($i=4; $i <=7 ; $i++) {
              switch ($i) {
                case '4':
                $SumaGrupoDebitoEstado = 0;
                $sumaGrupoCreditoEstado = 0;
                $MontoGrupoEstado = 0;
                  foreach ($EstadoResul as $key => $value){
                   
                  if($value["id_grupo"] == $i){
                      $SumaGrupoDebitoEstado =  $SumaGrupoDebitoEstado + $value["debito"];
                      $sumaGrupoCreditoEstado = $sumaGrupoCreditoEstado + $value["credito"];
                    }
                  
                  }
                   $MontoGrupoEstado = $sumaGrupoCreditoEstado - $SumaGrupoDebitoEstado;
                   $totalEstado = $totalEstado + $MontoGrupoEstado;


                  break;
                  case '5':
                    $SumaGrupoDebitoEstado = 0;
                    $sumaGrupoCreditoEstado = 0;
                    $MontoGrupoEstado = 0;
                foreach ($EstadoResul as $key => $value){
                    
                  if($value["id_grupo"] == $i){
                      $SumaGrupoDebitoEstado =  $SumaGrupoDebitoEstado + $value["debito"];
                      $sumaGrupoCreditoEstado = $sumaGrupoCreditoEstado + $value["credito"];
                    }
                  
                  }
                   $MontoGrupoEstado = $SumaGrupoDebitoEstado - $sumaGrupoCreditoEstado;
                   $totalEstado = $totalEstado - $MontoGrupoEstado;
                  break;
                   case '6':
                   $SumaGrupoDebitoEstado = 0;
                    $sumaGrupoCreditoEstado = 0;
                    $MontoGrupoEstado = 0;
                  foreach ($EstadoResul as $key => $value){
                    
                  if($value["id_grupo"] == $i){
                      $SumaGrupoDebitoEstado =  $SumaGrupoDebitoEstado + $value["debito"];
                      $sumaGrupoCreditoEstado = $sumaGrupoCreditoEstado + $value["credito"];
                    }
                   
                  }
                   $MontoGrupoEstado = $SumaGrupoDebitoEstado - $sumaGrupoCreditoEstado;
                   $totalEstado = $totalEstado - $MontoGrupoEstado;
                  break;
                }
              }
            
              $totalResultado = 0;
              $totalActivo = 0;
              $totalPasivo = 0;
              $totalPatrimonio = 0;
              $Comparacion = 0;
              
             
$respuesta = ControladorDiario::ctrMostrarEstadoResultado($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $Orden);


              $tabla = "grupo_empresa"; 
              
              
              $plancuenta = ControladorContabilidad::ctrgrupoempresas($tabla);
              $totalResultado = 0;

            for ($i=1; $i <=3; $i++) {
              switch ($i) {
                case '1':
                $sumaGrupoDebito = 0;
                $sumaGrupoCredito = 0;
                $MontoGrupo = 0;

                /*GRUPO*/
                foreach ($respuesta as $key => $value){
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                }/*CIERRE RESPUESTA*/

              $MontoGrupo = $sumaGrupoDebito - $sumaGrupoCredito;
              $numMontoGrupo = number_format($MontoGrupo, 2);
              $totalActivo = $MontoGrupo;
               
              if($MontoGrupo != 0){ 
    $bloque2 = <<<EOF
<table style="font-size:10px; padding:5px 10px">

    <tr>

    <td style="font-weight: bold; width:280px; text-align:left">ACTIVOS</td>


        <td style="width:85px; text-align:center"></td>

        <td style="width:85px; text-align:center"></td>

        <td style="width:85px; text-align:center"></td>


    </tr>

    </table>
EOF;

$pdf->writeHtml($bloque2, false, false, false, false, '');


                  /*FIN GRUPO */
                  /*INICIO CATEGORIA*/
            foreach ($plancuenta as $key => $plan) {
                if($plan["id_grupo"] == $i){
                        
                        
                  $sumaCategoriaDebito = 0;
                  $sumaCategoriaCredito = 0;
                  $MontoCategoria = 0;   

                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"]){
                      $sumaCategoriaDebito =  $sumaCategoriaDebito + $value["debito"];
                      $sumaCategoriaCredito = $sumaCategoriaCredito + $value["credito"];
                    }

                  
                  }
                  $MontoCategoria = $sumaCategoriaDebito - $sumaCategoriaCredito;

                          
                  /*INICIO GENERICA*/
              if($MontoCategoria != 0){
                
                  $Rnc_Empresa_Cuentas = $Rnc_Empresa_LD;
                  $grupo = $i;
                  $categorias = $plan["id_categoria"];
                  $generica = ControladorContabilidad::ctrplandecuenta($Rnc_Empresa_Cuentas, $grupo, $categorias);


              foreach ($generica  as $key => $gene){
                        
                  $sumaGenericaDebito = 0;
                  $sumaGenericaCredito = 0;
                  $MontoGenerica = 0;



                foreach ($respuesta as $key => $value){
                  

                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"] && $value["id_generica"] == $gene["id_generica"]){
                      $sumaGenericaDebito =  $sumaGenericaDebito + $value["debito"];
                      $sumaGenericaCredito = $sumaGenericaCredito + $value["credito"];
                    }
                  
                  }
                  $MontoGenerica = $sumaGenericaDebito - $sumaGenericaCredito;
                  $numMontoGenerica = number_format($MontoGenerica, 2);

                     if($MontoGenerica != 0){

                      $Rnc_Empresa_Cuentas = $Rnc_Empresa_LD;
                      $id_grupo = $i;
                      $id_categoria = $plan["id_categoria"];
                      $id_generica = $gene["id_generica"];
                      $subgenerica = ControladorContabilidad::ctrplandesubcuenta($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria, $id_generica);

   $bloque3 = <<<EOF
<table style="font-size:10px; padding:5px 10px">

    <tr>

    <td style="font-weight: bold; width:280px; text-align:left">$gene[Nombre_Cuenta]</td>


        <td style="width:85px; text-align:center"></td>

        <td style="width:85px; text-align:center"></td>

        <td style="width:85px; text-align:center"></td>


    </tr>

    </table>
EOF;

$pdf->writeHtml($bloque3, false, false, false, false, '');              

                   

                    
                foreach ($subgenerica  as $key => $subgene){
                        
                  $sumaCuentaDebito = 0;
                  $sumaCuentaCredito = 0;
                  $MontoCuenta = 0;



                foreach ($respuesta as $key => $value){
                  

                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"] && $value["id_generica"] == $gene["id_generica"] && $value["id_cuenta"] == $subgene["id_subgenerica"]){
                      $sumaCuentaDebito =  $sumaCuentaDebito + $value["debito"];
                      $sumaCuentaCredito = $sumaCuentaCredito + $value["credito"];
                    }
                  
                  }
                  $MontoCuenta = $sumaCuentaDebito - $sumaCuentaCredito;
                  $numMontoCuenta = number_format($MontoCuenta, 2);

                  if($MontoCuenta != 0){
                    $bloque4 = <<<EOF
<table style="font-size:10px; padding:5px 10px">

    <tr>

  <td style="width:280px; text-align:left">$subgene[Nombre_subCuenta]</td>


        <td style="width:85px; text-align:center">$numMontoCuenta</td>

        <td style="width:85px; text-align:center"></td>

        <td style="width:85px; text-align:center"></td>


    </tr>

    </table>
EOF;

$pdf->writeHtml($bloque4, false, false, false, false, '');       
                   
                  
                    }




                     }/*foreach $subgenerica*/
                      
 $bloque5 = <<<EOF
<table style="font-size:10px; padding:5px 10px">

    <tr>

    <td style="font-weight: bold; width:280px; text-align:left">TOTAL $gene[Nombre_Cuenta]</td>


         <td style="border-top-color:#050404; border-top-style:solid; border-top-width:1px; width:85px; text-align:center"></td>


        <td style="width:85px; font-weight: bold; text-align:center">$numMontoGenerica</td>

        <td style="width:85px; text-align:center"></td>


    </tr>

    </table>
EOF;

$pdf->writeHtml($bloque5, false, false, false, false, '');   

                     

                   }/*CIERRE IF $MontoGenerica*/

                  }/*CIERRE FOR $generica*/

                   }/*CIERRE IF ID GRUPO*/
                  
                  }/*CIERRE FOR PLAN CUENTA*/

                }/*CIERRE IF MONTO GRUPO*/
      $bloque6 = <<<EOF
<table style="font-size:10px; padding:5px 10px">

    <tr>

    <td style="font-weight: bold; width:280px; text-align:left">TOTAL ACTIVOS</td>


        <td style="width:85px; text-align:center"></td>

       <td style="border-top-color:#050404; border-top-style:solid; border-top-width:1px; width:85px"></td>

        <td style="border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; width:85px; font-weight: bold; text-align:center">$numMontoGrupo</td>



    </tr>

    </table>
EOF;

$pdf->writeHtml($bloque6, false, false, false, false, '');   
 
                


              }/*CIERRE IF MONTO GRUPO*/ 
                
                break;
             case '2':
                $sumaGrupoDebito = 0;
                $sumaGrupoCredito = 0;
                $MontoGrupo = 0;

                /*GRUPO*/
                foreach ($respuesta as $key => $value){
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                }/*CIERRE RESPUESTA*/

             $MontoGrupo = $sumaGrupoCredito - $sumaGrupoDebito;
              $numMontoGrupo = number_format($MontoGrupo, 2);
              $totalPasivo = $MontoGrupo;
                    
                    
               
              if($MontoGrupo != 0){ 
       $bloque7 = <<<EOF
<table style="font-size:10px; padding:5px 10px">

    <tr>

    <td style="font-weight: bold; width:280px; text-align:left">PASIVOS</td>


        <td style="width:85px; text-align:center"></td>

        <td style="width:85px; text-align:center"></td>

        <td style="width:85px; text-align:center"></td>


    </tr>

    </table>
EOF;

$pdf->writeHtml($bloque7, false, false, false, false, '');   
               

                  /*FIN GRUPO */
                  /*INICIO CATEGORIA*/
            foreach ($plancuenta as $key => $plan) {
                if($plan["id_grupo"] == $i){
                        
                        
                  $sumaCategoriaDebito = 0;
                  $sumaCategoriaCredito = 0;
                  $MontoCategoria = 0;   

                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"]){
                      $sumaCategoriaDebito =  $sumaCategoriaDebito + $value["debito"];
                      $sumaCategoriaCredito = $sumaCategoriaCredito + $value["credito"];
                    }

                  
                  }
                  $MontoCategoria = $sumaCategoriaDebito - $sumaCategoriaCredito;

                          
                  /*INICIO GENERICA*/
              if($MontoCategoria != 0){
                
                  $Rnc_Empresa_Cuentas = $Rnc_Empresa_LD;
                  $grupo = $i;
                  $categorias = $plan["id_categoria"];
                  $generica = ControladorContabilidad::ctrplandecuenta($Rnc_Empresa_Cuentas, $grupo, $categorias);


              foreach ($generica  as $key => $gene){
                        
                  $sumaGenericaDebito = 0;
                  $sumaGenericaCredito = 0;
                  $MontoGenerica = 0;



                foreach ($respuesta as $key => $value){
                  

                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"] && $value["id_generica"] == $gene["id_generica"]){
                      $sumaGenericaDebito =  $sumaGenericaDebito + $value["debito"];
                      $sumaGenericaCredito = $sumaGenericaCredito + $value["credito"];
                    }
                  
                  }
                  $MontoGenerica = $sumaGenericaDebito - $sumaGenericaCredito;
                  $numMontoGenerica = number_format($MontoGenerica, 2);

                     if($MontoGenerica != 0){

                      $Rnc_Empresa_Cuentas = $Rnc_Empresa_LD;
                      $id_grupo = $i;
                      $id_categoria = $plan["id_categoria"];
                      $id_generica = $gene["id_generica"];
                      $subgenerica = ControladorContabilidad::ctrplandesubcuenta($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria, $id_generica);
 $bloque8 = <<<EOF
<table style="font-size:10px; padding:5px 10px">

    <tr>

    <td style="font-weight: bold; width:280px; text-align:left">$gene[Nombre_Cuenta]</td>


        <td style="width:85px; text-align:center"></td>

        <td style="width:85px; text-align:center"></td>

        <td style="width:85px; text-align:center"></td>


    </tr>

    </table>
EOF;

$pdf->writeHtml($bloque8, false, false, false, false, '');   
                


                    
                foreach ($subgenerica  as $key => $subgene){
                        
                  $sumaCuentaDebito = 0;
                  $sumaCuentaCredito = 0;
                  $MontoCuenta = 0;



                foreach ($respuesta as $key => $value){
                  

                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"] && $value["id_generica"] == $gene["id_generica"] && $value["id_cuenta"] == $subgene["id_subgenerica"]){
                      $sumaCuentaDebito =  $sumaCuentaDebito + $value["debito"];
                      $sumaCuentaCredito = $sumaCuentaCredito + $value["credito"];
                    }
                  
                  }
                  $MontoCuenta = $sumaCuentaDebito - $sumaCuentaCredito;
                  $numMontoCuenta = number_format($MontoCuenta, 2);

                  if($MontoCuenta != 0){

  $bloque9 = <<<EOF
<table style="font-size:10px; padding:5px 10px">

    <tr>

    <td style="width:280px; text-align:left">$subgene[Nombre_subCuenta]</td>


        <td style="width:85px; text-align:center">$numMontoCuenta</td>

        <td style="width:85px; text-align:center"></td>

        <td style="width:85px; text-align:center"></td>


    </tr>

    </table>
EOF;

$pdf->writeHtml($bloque9, false, false, false, false, '');   
                   
                  
                    }




                     }/*foreach $subgenerica*/
  $bloque10 = <<<EOF
<table style="font-size:10px; padding:5px 10px">

    <tr>

    <td style="font-weight: bold; width:280px; text-align:left">TOTAL $gene[Nombre_Cuenta]</td>


         <td style="border-top-color:#050404; border-top-style:solid; border-top-width:1px; width:85px; text-align:center"></td>


        <td style="width:85px; font-weight: bold; text-align:center">$numMontoGenerica</td>

        <td style="width:85px; text-align:center"></td>


    </tr>

    </table>
EOF;

$pdf->writeHtml($bloque10, false, false, false, false, '');   
                     

                   }/*CIERRE IF $MontoGenerica*/

                  }/*CIERRE FOR $generica*/

                   }/*CIERRE IF ID GRUPO*/
                  
                  }/*CIERRE FOR PLAN CUENTA*/

                }/*CIERRE IF MONTO GRUPO*/ 
  $bloque11 = <<<EOF
<table style="font-size:10px; padding:5px 10px">

    <tr>

    <td style="font-weight: bold; width:280px; text-align:left">TOTAL PASIVOS</td>


        <td style="width:85px; text-align:center"></td>

        <td style="border-top-color:#050404; border-top-style:solid; border-top-width:1px; width:85px"></td>

        <td style="border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; width:85px; font-weight: bold; text-align:center">$numMontoGrupo</td>



    </tr>

    </table>
EOF;

$pdf->writeHtml($bloque11, false, false, false, false, '');   
                 


              }/*CIERRE IF MONTO GRUPO*/ 
                
                break;
               case '3':
                $sumaGrupoDebito = 0;
                $sumaGrupoCredito = 0;
                $MontoGrupo = 0;

                /*GRUPO*/
                foreach ($respuesta as $key => $value){
                  if($value["id_grupo"] == $i){
                      $sumaGrupoDebito =  $sumaGrupoDebito + $value["debito"];
                      $sumaGrupoCredito = $sumaGrupoCredito + $value["credito"];
                    }
                  
                }/*CIERRE RESPUESTA*/

              $MontoGrupo = $sumaGrupoCredito - $sumaGrupoDebito + $totalEstado;
              $numMontoGrupo = number_format($MontoGrupo, 2);
              $totalPatrimonio = $MontoGrupo; 
                           
               
              if($MontoGrupo != 0){

          $bloque12 = <<<EOF
<table style="font-size:10px; padding:5px 10px">

    <tr>

    <td style="font-weight: bold; width:280px; text-align:left">PATRIMONIO</td>


        <td style="width:85px; text-align:center"></td>

        <td style="width:85px; text-align:center"></td>

        <td style="width:85px; text-align:center"></td>


    </tr>

    </table>
EOF;

$pdf->writeHtml($bloque12, false, false, false, false, '');   
               
                  /*FIN GRUPO */
                  /*INICIO CATEGORIA*/
            foreach ($plancuenta as $key => $plan) {
                if($plan["id_grupo"] == $i){
                        
                        
                  $sumaCategoriaDebito = 0;
                  $sumaCategoriaCredito = 0;
                  $MontoCategoria = 0;   

                foreach ($respuesta as $key => $value){
                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"]){
                      $sumaCategoriaDebito =  $sumaCategoriaDebito + $value["debito"];
                      $sumaCategoriaCredito = $sumaCategoriaCredito + $value["credito"];
                    }

                  
                  }
                    $MontoCategoria = $sumaCategoriaDebito - $sumaCategoriaCredito;
                     if($plan["id_grupo"] == 3 && $plan["id_categoria"] == 6){
                      $MontoCategoria = $MontoCategoria + $totalEstado;
                    }

                  
                          
                  /*INICIO GENERICA*/
              if($MontoCategoria != 0){
                
                  $Rnc_Empresa_Cuentas = $Rnc_Empresa_LD;
                  $grupo = $i;
                  $categorias = $plan["id_categoria"];
                  $generica = ControladorContabilidad::ctrplandecuenta($Rnc_Empresa_Cuentas, $grupo, $categorias);


              foreach ($generica  as $key => $gene){
                        
                  $sumaGenericaDebito = 0;
                  $sumaGenericaCredito = 0;
                  $MontoGenerica = 0;



                foreach ($respuesta as $key => $value){
                  

                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"] && $value["id_generica"] == $gene["id_generica"]){
                      $sumaGenericaDebito =  $sumaGenericaDebito + $value["debito"];
                      $sumaGenericaCredito = $sumaGenericaCredito + $value["credito"];
                    }
                  
                  }
                  $MontoGenerica = $sumaGenericaDebito - $sumaGenericaCredito;
                  $numMontoGenerica = number_format($MontoGenerica, 2);
                  if($plan["id_grupo"] == 3 && $plan["id_categoria"] == 6 && $gene["id_generica"] == "01"){
                      $MontoGenerica = $MontoGenerica + $totalEstado;
                      $numMontoGenerica = number_format($MontoGenerica, 2);
                    }

                     if($MontoGenerica != 0){

                      $Rnc_Empresa_Cuentas = $Rnc_Empresa_LD;
                      $id_grupo = $i;
                      $id_categoria = $plan["id_categoria"];
                      $id_generica = $gene["id_generica"];
                      $subgenerica = ControladorContabilidad::ctrplandesubcuenta($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria, $id_generica);

  $bloque13 = <<<EOF
<table style="font-size:10px; padding:5px 10px">

    <tr>

    <td style="width:280px; font-weight: bold; text-align:left">$gene[Nombre_Cuenta]</td>


        <td style="width:85px; text-align:center"></td>

        <td style="width:85px; text-align:center"></td>

        <td style="width:85px; text-align:center"></td>


    </tr>

    </table>
EOF;

$pdf->writeHtml($bloque13, false, false, false, false, '');                  

                   

                    
                foreach ($subgenerica  as $key => $subgene){
                        
                  $sumaCuentaDebito = 0;
                  $sumaCuentaCredito = 0;
                  $MontoCuenta = 0;



                foreach ($respuesta as $key => $value){
                  

                   
                  if($value["id_grupo"] == $i && $value["id_categoria"] == $plan["id_categoria"] && $value["id_generica"] == $gene["id_generica"] && $value["id_cuenta"] == $subgene["id_subgenerica"]){
                      $sumaCuentaDebito =  $sumaCuentaDebito + $value["debito"];
                      $sumaCuentaCredito = $sumaCuentaCredito + $value["credito"];
                    }
                  
                  }
                  $MontoCuenta = $sumaCuentaDebito - $sumaCuentaCredito;
                  $numMontoCuenta = number_format($MontoCuenta, 2);
                   if($plan["id_grupo"] == 3 && $plan["id_categoria"] == 6 && $gene["id_generica"] == "01" && $subgene["id_subgenerica"] == "001"){
                      $MontoCuenta = $MontoCuenta + $totalEstado;
                      $numMontoCuenta = number_format($MontoCuenta, 2);
                    }

                  if($MontoCuenta != 0){

                $bloque13 = <<<EOF
<table style="font-size:10px; padding:5px 10px">

    <tr>

    <td style="width:280px; text-align:left">$subgene[Nombre_subCuenta]</td>


        <td style="width:85px; text-align:center">$numMontoCuenta</td>

        <td style="width:85px; text-align:center"></td>

        <td style="width:85px; text-align:center"></td>


    </tr>

    </table>
EOF;

$pdf->writeHtml($bloque13, false, false, false, false, '');          
                   
                   
                    }




                     }/*foreach $subgenerica*/

               $bloque14 = <<<EOF
<table style="font-size:10px; padding:5px 10px">

    <tr>

    <td style="font-weight: bold; width:280px; text-align:left">TOTAL $gene[Nombre_Cuenta]</td>


        <td style="border-top-color:#050404; border-top-style:solid; border-top-width:1px; width:85px; text-align:center"></td>

        <td style="width:85px; font-weight: bold; text-align:center">$numMontoGenerica</td>

        <td style="width:85px; text-align:center"></td>


    </tr>

    </table>
EOF;

$pdf->writeHtml($bloque14, false, false, false, false, '');      
                      
                  

                   }/*CIERRE IF $MontoGenerica*/

                  }/*CIERRE FOR $generica*/

                   }/*CIERRE IF ID GRUPO*/
                  
                  }/*CIERRE FOR PLAN CUENTA*/

                }/*CIERRE IF MONTO GRUPO*/ 

              $bloque14 = <<<EOF
<table style="font-size:10px; padding:5px 10px">

    <tr>

    <td style="font-weight: bold; width:280px; text-align:left">TOTAL PATRIMONIO</td>


        <td style="width:85px; text-align:center"></td>

        <td style="border-top-color:#050404; border-top-style:solid; border-top-width:1px; width:85px"></td>

        <td style="border-bottom-color:#050404; border-bottom-style:solid; border-bottom-width:1px; width:85px; font-weight: bold;  text-align:center">$numMontoGrupo</td>


    </tr>

    </table>
EOF;

$pdf->writeHtml($bloque14, false, false, false, false, '');  
                


              }/*CIERRE IF MONTO GRUPO*/ 
                
                break;
                  
             } /*CIERRE SWICHT*/

             } /*CIERRE FOR i*/

             $Comparacion = $totalPasivo + $totalPatrimonio;
             $numComparacion = number_format($Comparacion, 2);

 $bloque15 = <<<EOF
<table style="font-size:10px; padding:5px 10px">

    <tr>

    <td style="font-weight: bold; width:280px; text-align:left">TOTAL PASIVOS PATRIMONIO </td>


        <td style="width:85px; text-align:center"></td>

        <td style="width:85px; text-align:center"></td>

      
        <td style="width:85px; font-weight: bold; text-align:center" >$numComparacion</td>


    </tr>

    </table>
EOF;

$pdf->writeHtml($bloque15, false, false, false, false, '');  



/**************************************
SALIDA DEL ARCHVIO
***************************************/

$pdf->Output('EstadoSituacion.pdf');

}

}

$estadoresultado = new estadosituacion();
$estadoresultado -> FechaDesde = $_GET["FechaDesde"];
$estadoresultado -> FechaHasta = $_GET["FechaHasta"];
$estadoresultado -> RncEmpresa = $_GET["RncEmpresa"];
$estadoresultado -> ImpresionEstadoSituacion();

 ?>

