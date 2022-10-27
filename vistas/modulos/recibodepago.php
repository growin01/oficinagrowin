<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        RECIBO DE PAGO
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">RECIBO DE PAGO</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <!--=================================================
          EL FORMULARIO DE CRERAR VENTAS 

        =======================================================-->

        <div class="col-xs-6">
          
          <div class="box box-success">

            <div class="box-header with-border">
              <form role="form" method="post" class="formularioPagoCXP">

            <div class="box-body">
              <input type="hidden"  id="RncEmpresaCXP" name="RncEmpresaCXP" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
                   
                     
            <input type="hidden" class="form-control" id="idsuplidor" name="idsuplidor" value="<?php echo$_GET["idsuplidor"];?>" readonly>
            <input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
            <input type="hidden" class="form-control" id="Banco" name="Banco" value="<?php echo $_SESSION["Banco"]?>">
            <input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">
            <input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>">  

             
 <div class="form-group col-xs-6">
  <div style="background-color: #BEEDB6" class="form-group col-xs-12">
   <div class="input-group">
         
 
<?php  

 $Moneda = $_GET["Moneda"];

  if($Moneda == "DOP"){
    echo '<h4 style="text-align: center"><b>Moneda de Facturas DOP $ </b></h4>';

  } else{  

    echo '<h4 style="text-align: center"><b>Moneda de Facturas USD $</b></h4>';

  }           
    
?>
   
                 
    </div>  
  </div> 
</div>  
<div class="form-group col-xs-6">
    <div class="form-group col-xs-12" style="background-color: #BEEDB6;">

        <div class="input-group">

              
<?php  

 $Moneda = $_GET["Moneda"];

  if($Moneda == "DOP"){
    echo '<h4 style="text-align: center;"><b>Moneda del Cobro</b></h4>';

  } else{  

    echo '<h4 style="text-align: center;"><b>Moneda del Cobro</b></h4>';

  }           
    

?>
  
 </div>           
   </div>  
 </div>  
 <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-money"></i></span>
              
            
                  <?php 
if(isset($_GET["Moneda"])){
$Moneda = $_GET["Moneda"];

      switch ($Moneda) {
                      case 'DOP':
echo '<input type="text" class="form-control input-xs" name="ReciboPagoMoneda" id="ReciboPagoMoneda" value="DOP" required readonly>';
break;
                      
                      case 'USD':
echo '<input type="text" class="form-control input-xs" name="ReciboPagoMoneda" id="ReciboPagoMoneda" value="USD" required readonly>';

break;
                    }
}

                   ?>
                                 

                  </div>
              </div>   
<div class="form-group col-xs-6">
                   
                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-money"></i></span>

                     <div class="input-group form-control">

                  <?php 

  echo '<input type="radio" name="MonedaParaPago" id="MonedaParaPago" value="DOP" required>$ DOP &nbsp;
<input type="radio" name="MonedaParaPago" id="MonedaParaPago" value="USD" required>$ USD';

                   ?>
                
                   
                   

                  </div>
              </div>
   </div>  


              <?php
                $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                
                $Tipo_NCF = "EPC";

                $respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);


               if($respuesta == false){
                   echo'<button class="btn btn-warning pull-right"  data-toggle="modal" data-target="#modalCorrelativoNoFiscal"><i class="fa fa-pencil"></i></button>
                  ';



                }
                $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                $Rnc_Empresa_Master = null;
                $Orden = "id";

                $Empresa = ControladorEmpresas::ctrEmpresas($Rnc_Empresa, $Rnc_Empresa_Master, $Orden);



               ?>
               <div style="padding-right: 0px"  class="form-group col-lg-6">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

    <input type="text" class="form-control Fechames" maxlength="6" id="FechaFacturames" name="FechaFacturames" value="<?php if (isset($_SESSION['FechaFacturames'])){ echo $_SESSION['FechaFacturames'];}?>" placeholder="Año/Mes Ejemplo 202001" required autofocus>
    
   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-lg-6">
   

  <div class="input-group">
   <input type="text" class="form-control Fechadia" maxlength="2" id="FechaFacturadia" name="FechaFacturadia" value="<?php if (isset($_SESSION['FechaFacturadia'])){ echo $_SESSION['FechaFacturadia'];}?>" placeholder="Día Ejemplo 01" required>
 
 </div>  
  
  </div> 
                
                    <div class="form-group col-xs-12">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-align-justify
glyphicon"></i></span>
          <input type="text" class="form-control input-xs" maxlength="100" name="Observaciones">

            </div>
             <?php

                  if($_SESSION["Contabilidad"] == 1){
                     echo '<div class="form-group">
         
                           
         <div class="col-xs-12">

        
        <label class="col-xs-4">Referencia</label>
        <label class="col-xs-4">Agregar Banco</label>
        </div>
        <input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Activo" required readonly>
        
         <div class="col-xs-3" style="padding-left:0px;">

        <input type="text" class="form-control"  id="Referencia_607" name="Referencia_607" placeholder="Referencia" maxlength="6" required>

        </div>
        
        <div class="col-xs-5" style="padding-left:0px">
        <select type="text" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" required>
        <option value="">Seleccionar Banco</option>';
        $Rnc_Empresa_Banco = $_SESSION["RncEmpresaUsuario"];

        $Banco = ControladorBanco::ctrMostrarBanco($Rnc_Empresa_Banco);

          

            foreach ($Banco as $key => $value){

           echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';


            }
        
        echo'</select>
         </div>';


            if($_SESSION["Proyecto"] == 1){ 
                    $Rnc_Empresa_Proyectos = $_SESSION["RncEmpresaUsuario"];

                      $respuesta = ControladorProyecto::ctrMostrarProyectos($Rnc_Empresa_Proyectos);

                        echo '<div class="col-xs-4">
                        
                         <select type="text" class="form-control proyecto" id="proyecto" name="proyecto" required>
                          <option value="">Proyecto</option>';


                         foreach ($respuesta as $key => $value) {
                          echo '<option value="'.$value["id"].'">'.$value["CodigoProyecto"].'</option>';
                         }
                               

                               

                           echo'</select>
                           </div>';
                    }else {

                       echo '<input type="hidden" class="form-control" id="proyecto" name="proyecto" value="0" required>';
                     


                    }
                     

        
                            
      echo'</div>';



                  }else{
                   echo '<div class="col-xs-12">
                   <div class="form-group col-xs-4">

                      <div class="input-group">
                        <label>Referencia</label>
              
                      <input type="text" class="form-control input-xs" maxlength="25" name="Referencia">

                     </div>

                  </div>
                   <div class="form-group col-xs-4">

                      <div class="input-group">
                        <label>Entidad Bancaria</label>
              
                      <input type="text" class="form-control input-xs" maxlength="25" name="Entidad_Bancaria">

                     </div>

                  </div>
                  <div class="form-group col-xs-4">

                      <div class="input-group">
                        <label>Descripción</label>
              
                      <input type="text" class="form-control input-xs" maxlength="25" name="Descripcion">

                     </div>

                  </div>
                   
                  </div>';
                  }

                  ?>

          </div>
          <div class="form-group col-xs-8">
                       
                  

                    <div class="input-group">
                    

                      
                    <?php 
                     $Rnc_Empresa_Diario = $_SESSION["RncEmpresaUsuario"];
                      $tipocod = "EPC";


                      $codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
               
                        if(!$codigo){

                               echo '<script>
                          swal({

                            type: "error",
                            title: "¡DEBE INICIALIZAR EL CODIGO DE ASIENTO DIARIO EN EL LAPIZ COLOR ANARANJADO QUE ESTA EN LA PARTE SUPERIOR DEL FORMULARIO!",
                            showConfirmButton: false,
                            timer: 8000
                            });

                          </script>';   



                      } else{


                       

                      }

                     
                     ?>

                    </div>
          </div>
                     
                     

        <div class="col-xs-12"></div>
        <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

      <h4 style="text-align: center;"><b>FACTURAS A COBRAR</b></h4>

  </div>         

        <div class="col-xs-12"></div>

                <div class="form-group row nuevafacturaCXP">
                </div>
            <input type="hidden" id="listaFacturasCXP" name="listaFacturasCXP">
                
                  <div class="col-xs-8 pull-right">
                  <div class="col-xs-5 pull-left" style="background-color: #BEEDB6">

                    <h5 style="text-align: center;"><b>TOTAL COBRO</b></h5>
                  
                  </div>
                  
                  <div class="col-xs-5 pull-right" style="background-color: #BEEDB6">

                    <h5 style="text-align: center;"><b>TOTAL DIFERENCIA</b></h5>
                  
                  </div>
                  <br> <br>
                

            <div class="form-group col-xs-5 pull-left">

              <div class="input-group">
                <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input title="Total Cobrado" type="text" class="form-control" id="TotalPagovi" name="TotalPagovi" placeholder="0000" value=""required readonly>

                <input type="hidden" name="TotalPago" id="TotalPago" value="">
                        
              </div>
            
            </div>
         

            <div class="form-group col-xs-5 pull-right">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input title="Total Diferencia" type="text" class="form-control" id="Diferenciavi" name="Diferenciavi" placeholder="0000" value=""required readonly>

                <input type="hidden" name="Diferencia" id="Diferencia" value="">
                        
            </div>
            
          </div>

  

                </div>   
                <div class="form-group col-xs-8 pull-right">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>

                      <select type="text" class="form-control" id="Tipodiferencia" name="Tipodiferencia" required>
                        <option value="">Selección tipo de diferencia</option>
                        <option value="1">Diferencia Cambiaria</option>
                        <option value="2">Diferencia por Pago de Factura</option>
                      
                        

                      </select>

                      

                    </div>
                   

                  </div>

            </div>
            <div class="form-group col-xs-12">

                    <div class="input-group">
                    

                      
                      <?php 

                      $Rnc_Empresa_cxp = $_SESSION["RncEmpresaUsuario"];


              $ReciboCXP = ControladorCXP::ctrMostrarCodigoReciboCXP($Rnc_Empresa_cxp);
                      if(!$ReciboCXP){

                        echo ' <input type="hidden" class="form-control" id="nuevoReciboCXP" name="nuevoReciboCXP" value="1" readonly>
                      ';



                      } else{

                          foreach ($ReciboCXP as $key => $value) {

                            
                          }
                         
                         
                          $codigo = $value["CodigoReciboCXP"]+1;

                         echo ' <input type="hidden" class="form-control" id="nuevoReciboCXP" name="nuevoReciboCXP" value="'.$codigo.'" readonly>
                      ';


                      }


                       ?>

                     

                    </div>
                   

                  </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">Guardar Pago</button>

              
            </div>

          </form>
          <?php 

            $emitirpago = new ControladorCXP();
            $emitirpago -> ctrEmitirPago();




           ?>

       
               
            </div>

           
      
          </div>

          
        </div>

         <!--=================================================
            LA TABLA  DE PRODUCTO

        =======================================================-->

      <div class="col-xs-6">

          <div class="box box-warning">

             <div class="box-header with-border">


                <div class="box-body">

                       <div class="form-group col-xs-12">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select type="text" class="form-control" id="agregarSuplidorCXP" name="agregarSuplidorCXP" placeholder="Agregar Suplidor">
                       
                        <?php 

              if(isset($_GET["idsuplidor"])){
                $id_Suplidor = "id";
                $Valor_idSuplidor = $_GET["idsuplidor"];

              $Rnc_Empresa_Suplidor = $_SESSION["RncEmpresaUsuario"];

              $suplidor = ControladorSuplidores::ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);

                
                    
                echo '<option value="'.$suplidor["id"].'">'.$suplidor["Nombre_Suplidor"].'</option>';

                $id_Suplidor = null;
                $Valor_idSuplidor = null;

              $Rnc_Empresa_Suplidor = $_SESSION["RncEmpresaUsuario"];
                $suplidores = ControladorSuplidores::ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);



                foreach ($suplidores as $key => $value){
                  if($_GET["idsuplidor"] != $value["id"]){ 
                  
                  echo '<option value="'.$value["id"].'">'.$value["Nombre_Suplidor"].'</option>';
                  }
                        
                    

                    
                    }


               
          }else{
                 echo '<option value="">Seleccione un Suplidor</option>';

                $id_Suplidor = null;
                $Valor_idSuplidor = null;

              $Rnc_Empresa_Suplidor = $_SESSION["RncEmpresaUsuario"];
               $suplidores = ControladorSuplidores::ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);



                foreach ($suplidores as $key => $value){
                  
                  echo '<option value="'.$value["id"].'">'.$value["Nombre_Suplidor"].'</option>';
                        
                    

                    
                    }




            }
 


                         ?>

                      </select>

                      

                    </div>
                   

                  </div>

<div class="col-xs-12">
          <input type="hidden" id="idsuplidor" name="idsuplidor" value="<?php echo $_GET["idsuplidor"] ?>">
           <input type="hidden" id="Moneda" name="Moneda" value="<?php echo $_GET["Moneda"] ?>">
                    
                  <div class="form-group col-xs-6">
                   
                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-money"></i></span>

                     <div class="input-group form-control RCXCMoneda">

                  <?php 
if(isset($_GET["Moneda"])){
$Moneda = $_GET["Moneda"];

      switch ($Moneda) {
                      case 'DOP':
echo '<input type="radio" name="ReciboCobroMoneda" id="ReciboCobroMoneda" value="DOP" required checked>$ DOP &nbsp; 
<input type="radio" name="ReciboCobroMoneda" id="ReciboCobroMoneda" value="USD" required>$ USD';
break;
                      
                      case 'USD':
echo '<input type="radio" name="ReciboCobroMoneda" id="ReciboCobroMoneda" value="DOP" required>$ DOP &nbsp;
<input type="radio" name="ReciboCobroMoneda"  id="ReciboCobroMoneda" value="USD" required checked>$ USD';
break;
                    }



}else{
  echo '<input type="radio" name="ReciboCobroMoneda" id="ReciboCobroMoneda" value="DOP" required checked>$ DOP &nbsp;
<input type="radio" name="ReciboCobroMoneda" id="ReciboCobroMoneda" value="USD" required>$ USD';


}



                   ?>
                
                   
                   

                  </div>
              </div>
   </div>  
</div>
<div class="form-group col-xs-12" style="background-color: #BEEDB6">
<?php  

 $Moneda = $_GET["Moneda"];

 if($Moneda == "DOP"){


  echo '<h4 style="text-align: center;"><b>Cuentas por pagar en DOP $ </b></h4>';
 } else{  

 echo '<h4 style="text-align: center;"><b>Cuentas por pagar en USD $ </b></h4>';

}           

   

?>
  
                 
    </div>
    
<div class="col-xs-12"></div>


            <table class="table table-bordered table-striped dt-responsive ReporteCXP" width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                
                <th style="width: 15px">Suplidor</th>
                <th style="width: 10px">NCF</th>
                <th style="width: 10px">Año/Mes</th>
                <th style="width: 10px">Día</th>
                <th style="width: 10px">Desc.</th> 
                <th style="width: 10px">Moneda</th>
                <th style="width: 10px">Tasa</th>       
                <th>Por Cobrar</th>
                <th></th><!--13 ACCION-->
                
                
                
              </tr>
             
            </thead>
            <tbody>
              <?php 
              if(isset($_GET["idsuplidor"])){ 

             
      $Rnc_Empresa_CXP =  $_SESSION["RncEmpresaUsuario"];
      $id_Suplidor = $_GET["idsuplidor"];

      $respuesta = ControladorCXP::ctrMostarCXPidSuplidor($Rnc_Empresa_CXP, $id_Suplidor);


foreach ($respuesta as $key => $value) {


            $Rnc_Empresa_Suplidor = $Rnc_Empresa_CXP;

            $id_Suplidor = "id";

         
if($value["Moneda"] == $_GET["Moneda"]){ 
    
    if($_GET["idsuplidor"] == $value["id_Suplidor"]){ 

           $Valor_idSuplidor = $value["id_Suplidor"];

        $respuestasuplidor = ControladorSuplidores::ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);

            $Nombre_Suplidor = $respuestasuplidor["Nombre_Suplidor"];
            $Rnc_Factura = $respuestasuplidor["Documento_Suplidor"];

            
            $Deuda = $value["Neto"] + $value["Propinalegal"] + $value["Impuesto"] + $value["impuestoISC"] + $value["otrosimpuestos"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
                 
            $Rnc_Empresa_cxp = $_SESSION["RncEmpresaUsuario"];
            $CodigoCompra = $value["CodigoCompra"];
            $id_Suplidor = $value["id_Suplidor"];
            $Rnc_Suplidor = $value["Rnc_Suplidor"];
            $NCF_cxp = $value["NCF_cxp"];
            $Tipo = "FACTURA";

            $pagos = ControladorCXP::ctrMostarPagosCXP($Rnc_Empresa_cxp, $CodigoCompra, $id_Suplidor, $Rnc_Suplidor, $NCF_cxp, $Tipo);
            $TotalSuma = 0;

                foreach ($pagos as $key1 => $sumapagos){

                  $TotalSuma = $TotalSuma + $sumapagos["Monto"];
      
   
                }
 

                 $Cobro =$TotalSuma;
                 $PorCobrar = $Deuda - $Cobro;

                  $botonAccion = "<div class='btn-group'>
                  <button  class='btn btn-primary btn-xs agregarFacturaCXP recuperarFacturaCXP' id_CXP='".$value["id"]."' id_606='".$value["id_606"]."' codigo='".$value["CodigoCompra"]."' rnc_Factura = '".$Rnc_Factura."' id_suplidor = '".$Valor_idSuplidor."' nombre_suplidor = '".$Nombre_Suplidor."' ncf_factura='".$value["NCF_cxp"]."' monto='".$PorCobrar."' retencion='NO' tasa='".$value["Tasa"]."'>+</button>  </div>
                  
                  <div class='btn-group'>
                  <button Title='Retener Cuenta Por Pagar' class='btn btn-warning btn-xs btnRetenerCXPrecibopago' Rnc_Empresa_606='".$Rnc_Empresa_CXP."' Rnc_Factura_606='".$Rnc_Factura."' NCF_606='".$value["NCF_cxp"]."' Moneda='".$value["Moneda"]."' Tasa='".$value["Tasa"]."' data-toggle='modal' data-target='#modalRetenerCXP'><i class='fa fa-university'></i></button>
                  </div>";

                    if ($PorCobrar > 0) {
                
                  echo '<tr>
                            
                            <td>'.$Nombre_Suplidor.'</td>
                            <td style="width: 15px">'.$value["NCF_cxp"].'</td>
                            <td>'.$value["FechaAnoMes_cxp"].'</td>
                            <td>'.$value["FechaDia_cxp"].'</td>
                            <td style="width: 10px">'.$value["Observaciones"].'</td>
                            <td>'.$value["Moneda"].'</td>
                            <td>'.$value["Tasa"].'</td>
                            <td>'.number_format($PorCobrar, 2).'</td> 
                            <td>'.$botonAccion.'</td>


</tr>';
                  
                }           

          }/*cierre if suplidor*/
        }  /*cierre de moneda*/  


}/*cierre for respuesta*/


}/*cierre isset*/



               ?>

            </tbody>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->
<tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
               
                <td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";>TOTAL</td> 
                <td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td> 
                                   
                <td></td>  
              </tr>

      </tfoot>        
            
           
            
          </table>
        
<div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">
<?php  

 $Moneda = $_GET["Moneda"];

  if($Moneda == "DOP"){
    echo '<h4 style="text-align: center;"><b>Cuentas por pagar en USD $ </b></h4>';

  } else{  

    echo '<h4 style="text-align: center;"><b>Cuentas por pagar en DOP $ </b></h4>';

  }           
    

?>
  
                 
    </div>   
    <div class="col-xs-12"></div>


            <table class="table table-bordered table-striped dt-responsive ReporteCXP" width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                <th style="width: 5px">#</th>
                <th style="width: 15px">Suplidor</th>
                <th style="width: 10px">NCF</th>
                <th style="width: 10px">Año/Mes</th>
                <th style="width: 10px">Día</th> 
                <th style="width: 10px">Moneda</th>
                <th style="width: 10px">Tasa</th>       
                <th>Por Cobrar</th>
                <th></th><!--13 ACCION-->
                
                
                
              </tr>
             
            </thead>
            <tbody>
              <?php 
              if(isset($_GET["idsuplidor"])){ 

             
                  $Rnc_Empresa_CXP =  $_SESSION["RncEmpresaUsuario"];

                  $respuesta = ControladorCXP::ctrMostarCXP($Rnc_Empresa_CXP);


foreach ($respuesta as $key => $value) {


            $Rnc_Empresa_Suplidor = $Rnc_Empresa_CXP;

            $id_Suplidor = "id";

         
if($value["Moneda"] != $_GET["Moneda"]){ 
    
    if($_GET["idsuplidor"] == $value["id_Suplidor"]){ 

           $Valor_idSuplidor = $value["id_Suplidor"];

        $respuestasuplidor = ControladorSuplidores::ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);

            $Nombre_Suplidor = $respuestasuplidor["Nombre_Suplidor"];
            $Rnc_Factura = $respuestasuplidor["Documento_Suplidor"];

            
            $Deuda = $value["Neto"] + $value["Impuesto"] + $value["impuestoISC"] + $value["otrosimpuestos"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
                 
            $Rnc_Empresa_cxp = $_SESSION["RncEmpresaUsuario"];
            $CodigoCompra = $value["CodigoCompra"];
            $id_Suplidor = $value["id_Suplidor"];
            $Rnc_Suplidor = $value["Rnc_Suplidor"];
            $NCF_cxp = $value["NCF_cxp"];
            $Tipo = "FACTURA";

            $pagos = ControladorCXP::ctrMostarPagosCXP($Rnc_Empresa_cxp, $CodigoCompra, $id_Suplidor, $Rnc_Suplidor, $NCF_cxp, $Tipo);
            $TotalSuma = 0;

                foreach ($pagos as $key1 => $sumapagos){

                  $TotalSuma = $TotalSuma + $sumapagos["Monto"];
      
   
                }
 

                 $Cobro =$TotalSuma;
                 $PorCobrar = $Deuda - $Cobro;

                  $botonAccion = "";

                    if ($PorCobrar > 0) {
                
                  echo '<tr>
                            <td style="width: 5px">'.($key+1).'</td>
                            <td>'.$Nombre_Suplidor.'</td>
                            <td style="width: 15px">'.$value["NCF_cxp"].'</td>
                            <td>'.$value["FechaAnoMes_cxp"].'</td>
                            <td>'.$value["FechaDia_cxp"].'</td>
                            <td>'.$value["Moneda"].'</td>
                            <td>'.$value["Tasa"].'</td>
                            <td>'.number_format($PorCobrar, 2).'</td> 
                            <td>'.$botonAccion.'</td>


</tr>';
                  
                }           

          }/*cierre if suplidor*/
        }  /*cierre de moneda*/  


}/*cierre for respuesta*/


}/*cierre isset*/



               ?>

            </tbody>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->
<tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
               
                <td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";>TOTAL</td> 
                <td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td> 
                                   
                <td></td>  
              </tr>

      </tfoot>        
            
           
            
          </table>    
          
            
                </div>
       
            </div>
            
          </div>
             

      </div>
        

      </div>

      
    </section>


   </div>

   
    <div id="modalRetenerCXP" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Retener Comprar En Cuentas por Pagar</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
<input type="hidden" class="form-control input-lg" id="RncEmpresaRetener" name="RncEmpresaRetener" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
<input type="hidden" class="form-control input-lg" id="Usuariologueado" name="Usuariologueado" value="<?php echo $_SESSION["Usuario"];?>" readonly>
<input type="hidden" class="form-control input-lg" id="Modulo" name="Modulo" value="recibodepago" readonly>
<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">

            </div>


          </div>
<div class="form-group col-xs-6">

                   
  <div class="input-group">

      <span class="input-group-addon"><i>Moneda</i></span>             

<input type="Text" class="form-control" maxlength="11" id="Monedarecibopago" name="Monedarecibopago"required readonly>

</div>
</div> 

<div class="form-group col-xs-6">

  <div class="input-group">

<span class="input-group-addon"><i>Tasa</i></span>
<input type="Text" class="form-control" maxlength="11" id="Tasa" name="Tasa"required readonly>

</div>   


      </div>
          <div class="form-group">

                   
                  <div class="input-group">

<input type="hidden" class="form-control" maxlength="11" id="id_606_Retener" name="id_606_Retener"required readonly>
<input type="hidden" class="form-control" maxlength="11" id="CodigoCompra" name="CodigoCompra"required readonly>
<input type="hidden" class="form-control" maxlength="11" id="Forma_Pago_606" name="Forma_Pago_606"required readonly>                  


                  </div>

                </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
          
          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text"   class="form-control input-RNC" maxlength="11" id="Rnc_Retener_606" name="Rnc_Retener_606" value = "" required readonly>

            </div>

          </div>
          <!--*****************cierra input de Ncedula o pasaporte************************* -->
            

           <div class="form-group">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" maxlength="11" id="NCF_606_Retener" name="NCF_606_Retener" required readonly>

                  </div>

                </div>

                 <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control Fecha">

                     <label>Año/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="FechaFacturames_606_Retener" name="FechaFacturames_606_Retener" required readonly>

                     
                      <label>Dìa</label><input type="text" class="Fechadia" maxlength="2" id="FechaFacturadia_606_Retener" name="FechaFacturadia_606_Retener" required readonly>


                    </div>
                   

                  </div>
                  </div>

                   <div class="form-group">

                    
                    <div class="col-xs-6 right" style="padding-right:0px">

                      
                        <label>MONTO FACTURADO SIN ITBIS</label>
                        <br>

                        <input type="number"  min=0 step="any" id="MontoFacturadoRetener" name="MontoFacturadoRetener" required readonly>


                      </div>
                      
                  

                     <div class="col-xs-6 left" style="padding-right:0px">

                      
                        <label>MONTO ITBIS</label>
                        <br>

                        <input type="number"  min=0 step="any" id="MontoITBIS_Retener" name="MontoITBIS_Retener" required readonly>


                      </div>
                      

                    </div>

                    <label> Fecha de Retencion</label>
                    <br>




                    <div class="form-group">


                    <div class="input-group col-xs-12">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control FechaRetencion">

                     <label>Año/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="FechaRetenecionmes_606" name="FechaRetenecionmes_606" required>

                     
                      <label>Dìa</label><input type="text" class="Fechadia" maxlength="2" id="FechaReteneciondia_606" name="FechaReteneciondia_606" required>


                    </div>
                   

                  </div>
                  </div>

                  <div class="col-xs-6 left">

              <div class="form-group">

                    <div class="input-group form-control">

                      <label>% ITBIS RETENIDO</label><br>

                     

                   
                        <input type="radio" name="ITBIS_Retenido" id="ITBIS30" value="30" required>30 %
                        <br>
                        <input type="radio" name="ITBIS_Retenido" id="ITBIS75" value="75" required>75 %<br>
                        <input type="radio" name="ITBIS_Retenido" id="ITBIS100" value="100" required>100 %<br>
                        <input type="text" name="Monto_ITBIS_Retenido" id="Monto_ITBIS_Retenido" required>
                        
                    </div>

                  

                  </div>
                  </div>

                  <div class="col-xs-6  right">

              <div class="form-group">

                    <div class="input-group form-control">

                      <label>% ISR RETENIDO</label><br>

                     

                   
                        <input type="radio" name="ISR_RETENIDO" id="ISR2" value="2">2 %
                        <br>
                        <input type="radio" name="ISR_RETENIDO" id="ISR10" value="10">10 %<br>
                        
                        <input type="text" name="Monto_ISR_Retenido" id="Monto_ISR_Retenido" required>
                        <br>
                          <select type="text" class="form-control" id="tipo_de_seleccionretener" name="tipo_de_seleccionretener">
                              <option value="0">TIPO DE SELECCION</option>
                              <option value="01">01 - ALQUILERES</option>
                              <option value="02">02 - HONORARIOS POR SERVICIOS</option>
                              <option value="03">03 - OTRAS RENTAS</option>
                              <option value="04">04 - OTRAS RENTAS (Rentas Presuntas)</option>
                              <option value="05">05 - INTERESES PAGADOS A PERSONAS JURIDICAS RESIDENTES</option>
                              <option value="06">06 - INTERESES PAGADOS A PERSONAS FISICAS RESIDENTES</option>
                              <option value="07">07 - RETENCION POR PROVEEDORES DEL ESTADO</option>
                              <option value="08">08 - JUEGOS TELEFONICOS</option>


                         </select>


                        
                    </div>

                  

                  </div>
                  </div>
              
            <!--*****************input de Direccion********************* -->

         
          <!--*****************cierra input de Direccion************************* -->
          
        </div>
 
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Retener</button>

      </div>

     <?php 

        $crearRetencionRecibopago = new ControladorCXP();
        $crearRetencionRecibopago -> ctrAgregarretencionRecibopago();

       ?>
     
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>


  <!-- Modal -->
<div id="modalCorrelativoNoFiscal" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Editar Correlativos</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA USUARIO********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaCorrelativosNo" name="RncEmpresaCorrelativosNo" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="UsuarioLoguedo" name="UsuarioLoguedo" value="<?php echo $_SESSION["Nombre"];?>" readonly>

            </div>


          </div>
          <!--*****************cierra input de RNC de EMPRESA USUARIO************************* -->
           <!--*****************id correlativo********************** -->

         

             <div class="form-group col-xs-6">
               <label>Tipo de NCF</label>


                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" id="Tipo_NCF" name="Tipo_NCF" maxlength="3" Value="EPC" readonly>

                  </div>

                </div>


          
          <!--*****************cierra input de RNC de EMPRESA USUARIO************************* -->
           <div class="form-group col-xs-6">
               <label>Correlativo de Factura No Fiscal</label>


                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" id="NCF_Cons" name="NCF_Cons" maxlength="10">

                  </div>

                </div>

             
              
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Modificar Correlativos</button>

      </div>

      <?php 
      $editarCorrelativos = new ControladorCorrelativos();
      $editarCorrelativos -> ctreditarCorrelativosNoFiscal();
      


       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>
