
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       EDITAR RECIBO DE PAGO
        
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
<?php 
  $Rnc_Empresa_CXP = $_SESSION["RncEmpresaUsuario"];
  $id = $_GET["id"];
  $NAsiento = $_GET["nasiento"];


$recibodepago = ControladorCXP::ctrMostaridRecibodepago($Rnc_Empresa_CXP, $id, $NAsiento);

             
?>
                
<input type="hidden"  id="RncEmpresaCXP" name="RncEmpresaCXP" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
                   
<input type="hidden" class="form-control" id="id_CXP" name="id_CXP" value="<?php echo $CXP["id"]?>" readonly>
<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
<input type="hidden" class="form-control" id="Banco" name="Banco" value="<?php echo $_SESSION["Banco"]?>">
<input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">
<input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>"> 
<input type="hidden" class="form-control" id="idrecibodepago" name="idrecibodepago" value ="<?php echo $recibodepago["id"];?>"> 

   <div class="form-group col-xs-6">
<div style="background-color: #BEEDB6" class="form-group col-xs-12">
   

  <div class="input-group">

    
           
 
<?php  

 $Moneda = $recibodepago["FacturaCXP"];

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

 $Moneda = $recibodepago["ReciboCXP"];

  if($Moneda == "DOP"){
    echo '<h4 style="text-align: center;"><b>Moneda del Pago</b></h4>';

  } else{  

    echo '<h4 style="text-align: center;"><b>Moneda del Pago</b></h4>';

  }           
    

?>
  
 </div>           
   </div>  
 </div>
  <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-money"></i></span>
              
            
                  <?php 
$Moneda = $recibodepago["FacturaCXP"];

      switch ($Moneda) {
                      case 'DOP':
echo '<input type="text" class="form-control input-xs" name="ReciboPagoMoneda" id="ReciboPagoMoneda" value="DOP" required readonly>';
break;
                      
                      case 'USD':
echo '<input type="text" class="form-control input-xs" name="ReciboPagoMoneda" id="ReciboPagoMoneda" value="USD" required readonly>';

break;
                    }


                   ?>
                                 

                  </div>
              </div>
 <div class="form-group col-xs-6">
                   
                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-money"></i></span>

                     <div class="input-group form-control">

                  <?php 
  $Moneda = $recibodepago["ReciboCXP"];

      switch ($Moneda) {
                      case 'DOP':
echo '
<input type="radio" name="MonedaParaPago" id="MonedaParaPago" value="DOP" required readonly checked >$ DOP &nbsp';
break;
                      
                      case 'USD':
echo '

<input type="radio" name="MonedaParaPago" id="MonedaParaPago" value="USD" required readonly checked>$ USD';

break;
                    }

  
                   ?>
                
                   
                   

              </div>
   </div>    
   </div>   

      <div class="form-group col-xs-12">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control Fecha">

                     <label>Año/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="FechaFacturames" name="FechaFacturames" value ="<?php echo $recibodepago["FechaAnoMes"];?>" required>

                     
                      <label>Dìa</label>
                      <input type="text" class="Fechadia" maxlength="2" id="FechaFacturadia" name="FechaFacturadia" value="<?php echo $recibodepago["FechaDia"];?>" required>


                    </div>
                   

                  </div>
                  </div>
                    <div class="form-group col-xs-12">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-align-justify
glyphicon"></i></span>
              <input type="text" class="form-control input-xs" maxlength="100" name="Observaciones" value="<?php echo $recibodepago["Descripcion"];?>">

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

        <input type="text" class="form-control"  id="Referencia_607" name="Referencia_607" placeholder="Referencia" maxlength="6" value="'.$recibodepago["Referencia"].'" required>

        </div>
        
        <div class="col-xs-5" style="padding-left:0px">';
        
   $Rnc_Empresa_Banco = $_SESSION["RncEmpresaUsuario"];
   $id_banco = $recibodepago["EntidadBancaria"];

   $Banco = ControladorBanco::ctrMostrarBanco($Rnc_Empresa_Banco);

   if($id_banco != "" && $id_banco != 0){ 
   foreach ($Banco as $key => $value){

     if($value["id"] == $id_banco){ 


     echo '<select type="text" class="form-control col-xs-12" id="Editar-agregarBanco" name="Editar-agregarBanco">
         <option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';

       }

    }
   foreach ($Banco as $key => $value){

     if($value["id"] != $id_banco){ 


     echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';

       }

    }
  } 
  
 
   
        echo'</select>
         </div>';


            if($_SESSION["Proyecto"] == 1){ 

                    $id = "id";
                    $valorid = $recibodepago["id_Proyecto"];

                    $proyecto = ControladorProyecto::ctrModalEditarProyecto($id, $valorid);
                   

                    echo '<div class="col-xs-4">
                        
                         <select type="text" class="form-control proyecto" id="proyecto" name="proyecto" required>
                          <option value="'.$proyecto["id"].'">'.$proyecto["CodigoProyecto"].'</option>';

                    $Rnc_Empresa_Proyectos = $_SESSION["RncEmpresaUsuario"];

                      $respuesta = ControladorProyecto::ctrMostrarProyectos($Rnc_Empresa_Proyectos);


                         foreach ($respuesta as $key => $value) {
                          if($proyecto["id"] != $value["id"]){ 
                          echo '<option value="'.$value["id"].'">'.$value["CodigoProyecto"].'</option>';
                         }
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
                       
                  <label>N° de Recibo de Pago</label>

                    <div class="input-group">
                    

                      <span class="input-group-addon"><i class="fa fa-key"></i></span>
                   
                      <input type="text" class="form-control" id="NAsiento" name="NAsiento" value="<?php echo $recibodepago["NAsiento"];?>"readonly>

                     

                    </div>
          </div>
                     
                     

        <div class="col-xs-12"></div>

                <div class="form-group row nuevafacturaCXP">
                  <?php 
                   $listaFacturas = json_decode($recibodepago["Facturas"], true);

                    


                  foreach ($listaFacturas as $key => $value) {

echo '<div class="row" style="padding:1px 20px">
    <div class="col-xs-3" style="padding-right:0px">
        <div class="input-group">
          <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarFactura" id_CXP="'.$value["id"].'"><i class="fa fa-times"></i></button>
                          </span>
<input type="hidden" class="form-control id_CXP" id_CXP="'.$value["id"].'" name="id_CXP" value="'.$value["id"].'" required readonly> 
<input type="hidden" class="form-control id_606" id_606="'.$value["id_606"].'" name="id_606" value="'.$value["id_606"].'" required readonly>
<input type="hidden" class="form-control codigo" name="codigo" value="'.$value["codigo"].'" required readonly>
<input type="hidden" class="form-control id_suplidor" name="id_suplidor" value="'.$value["id_suplidor"].'" required readonly>
<input type="hidden" class="form-control nombre_suplidor" name="nombre_suplidor" value="'.$value["nombre_suplidor"].'" required readonly> 
        
    <input type="hidden" class="form-control retencion" name="retencion" value="'.$value["retencion"].'" required readonly>
            
        <input type="hidden" class="form-control rnc_Factura" name="rnc_Factura" value="'.$value["rnc_Factura"].'" required readonly> 
     <input title="NCF Factura" type="text" class="form-control ncf_factura" name="ncf_factura" value="'.$value["ncf_factura"].'" required readonly> 
                                         
        </div>
    </div>
    

<div class="col-xs-2" style="padding-left:0px; padding-right:0px">
        <div input-group">
        <input title="Monto de Cuenta por Pagar" type="text" class="form-control monto" name="monto" value="'.$value["monto"].'" required> 
       
                  
        </div>
</div>
<div class="col-xs-1 tasaCXP" style="padding-left:0px; padding-right:0px">
        <div input-group">
       
        <input title="Tasa Cambiaria" type="text" class="form-control tasa" name="tasa" value="'.$value["tasa"].'" required readonly> 
        <input type="hidden" class="form-control tasahistorica" name="tasahistorica" value="'.$value["tasahistorica"].'" required readonly> 
                   
        </div>
</div>
<div class="col-xs-2" style="padding-left:0px; padding-right:0px">
        <div input-group">
       
        <input title="CXP en Pesos" type="text" class="form-control cxppesos" name="cxppesos" value="'.$value["cxppesos"].'" required readonly> 
                  
        </div>
     </div>
       
        <div class="col-xs-2" style="padding-left:0px; padding-right:0px">
        <div input-group">
       
        <input title="Ingreso en Banco" type="text" class="form-control ingbanco" name="ingbanco" value="'.$value["cxppesos"].'" required> 
                  
        </div>
     </div>
     <div class="col-xs-2" style="padding-left:0px; padding-right:0px">
        <div input-group">
       
        <input title="Diferencia entre la CXP y el Ingreso al Banco" type="text" class="form-control diferencia" name="diferencia" value="'.$value["diferencia"].'"" required> 
                  
        </div>
     </div>
</div>'
;




                   }


                   ?>
                


                </div>
      <input class = "col-xs-12" type="hidden" id="listaFacturasCXP" name="listaFacturasCXP" value="<?php echo $recibodepago["Facturas"];?>">
                
                <div class="col-xs-8 pull-right">
                  <div class="col-xs-5 pull-left" style="background-color: #BEEDB6">

                    <h5 style="text-align: center;"><b>TOTAL PAGO</b></h5>
                  
                  </div>
                  
                  <div class="col-xs-5 pull-right" style="background-color: #BEEDB6">

                    <h5 style="text-align: center;"><b>TOTAL DIFERENCIA</b></h5>
                  
                  </div>
                  <br> <br>
 

               
                

                  <div class="form-group col-xs-5 pull-left">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input title="Total Pagado" type="text" class="form-control" id="TotalPagovi" name="TotalPagovi" placeholder="0000" value=""required readonly>

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
                        <?php  

$Tipodiferencia = $recibodepago["Tipodiferencia"];

switch ($Tipodiferencia) {
  case '0':
    echo '<option value="0">Selección tipo de diferencia</option>
          <option value="1">Diferencia Cambiaria</option>
          <option value="2">Diferencia por Cobro de Factura</option>';
    break;
    case '1':
    echo '<option value="1">Diferencia Cambiaria</option>
          <option value="0">Selección tipo de diferencia</option>
          <option value="2">Diferencia por Cobro de Factura</option>';
    break;
    case '2':
    echo '<option value="2">Diferencia por Cobro de Factura</option>
          <option value="0">Selección tipo de diferencia</option>
          <option value="1">Diferencia Cambiaria</option>';
          
    break;
  
  default:
    echo '<option value="0">Selección tipo de diferencia</option>
          <option value="1">Diferencia Cambiaria</option>
          <option value="2">Diferencia por Cobro de Factura</option>';
    break;
}



?>

                     
                        

                      </select>

                      

                    </div>
                   

                  </div>

            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-warning pull-right">Editar Pago</button>

              
            </div>

          </form>
          <?php 

            $emitirpago = new ControladorCXP();
            $emitirpago -> ctrEditarEmitirPago();




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

              
                $id_Suplidor = "id";
                $Valor_idSuplidor = $_GET["idsuplidor"];

              $Rnc_Empresa_Suplidor = $_SESSION["RncEmpresaUsuario"];

              $suplidor = ControladorSuplidores::ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);

               $idsuplidor = $suplidor["id"]; 

               if(isset($idsuplidor)){
                    
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
          <input type="hidden" id="idsuplidor" name="idsuplidor" value="<?php echo $idsuplidor?>">
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

         
if($value["Moneda"] == $_GET["Moneda"]){ 
    
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

                  $botonAccion = "<div class='btn-group'><button  class='btn btn-primary btn-xs agregarFacturaCXP recuperarFacturaCXP' id_CXP='".$value["id"]."' id_606='".$value["id_606"]."' codigo='".$value["CodigoCompra"]."' rnc_Factura = '".$Rnc_Factura."' id_suplidor = '".$Valor_idSuplidor."' nombre_suplidor = '".$Nombre_Suplidor."' ncf_factura='".$value["NCF_cxp"]."' monto='".$PorCobrar."' retencion='NO' tasa='".$value["Tasa"]."'>+</button></div>";

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
  
 
  
     <!--************************************************
                      MODAL Editat USUARIO
  ******************************************************* -->
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
