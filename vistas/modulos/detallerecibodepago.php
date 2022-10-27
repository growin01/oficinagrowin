
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
         
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-server"></i>
        Recibo de Pagos
        
      </h1>
      <a href="crear-compra-inventario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Inventario de Mercancia</a>
  <a href="crear-compra-gastosgenerales" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Compras Generales</a>

   <a href="compras" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle de Compras</a>
  
   
    <a href="reportecxp" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Cuentas Por Pagar</a>
   

  
      
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Cuentas por Pagar</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE VENTAS********************************* -->
      
       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR VENTAS********************************* -->


        <div class="box-body">

  
         

           
          <table border="0" cellspacing="4" cellpadding="4">
              
              <tbody>
                <tr>
                    <td>Fecha Desde:</td>
                    <td><input type="text" id="min" name="min"></td>
                </tr>

                <tr>
                    <td>Fecha Hasta:</td>
                    <td><input type="text" id="max" name="max"></td>
              </tr>
            </tbody>

          </table>
    <br>
          <!--*****************TABLA  USUARIO********************************* -->


          <table class="table table-bordered table-striped dt-responsive ReporteCXP" width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th style="width: 10px">RNC Suplidor</th>
                <th style="width: 10px">Nombre Suplidor</th>
                <th style="width: 10px">N° de Recibo</th>
                <th style="width: 10px">Año/Mes</th>
                <th style="width: 10px">Día</th>
                <th style="width: 10px">Monto</th>
                <th style="width: 10px">Diferencia</th>
                <th style="width: 10px">Referencia</th>
                <th style="width: 10px">Banco</th>
                <th style="width: 10px">Descrip.</th>
                <th style="width: 15px">Facturas</th>
                <th style="width: 10px"></th>
               
               
               
               
               
                
                
                
              </tr>
             
            </thead>
            <tbody>
              <?php 
             
                  
                  $Rnc_Empresa_CXP =  $_SESSION["RncEmpresaUsuario"];

                  $respuesta = ControladorCXP::ctrMostarRecibodepago($Rnc_Empresa_CXP);


foreach ($respuesta as $key => $value) {
   $listaFacturas = json_decode($value["Facturas"], true);
    $Facturas = "";
        foreach ($listaFacturas as $key1 => $Fac) {

          if($key1 == 0){
        $Facturas = $Fac["ncf_factura"];

          }else{

             $Facturas = $Facturas." ".$Fac["ncf_factura"];
          }

       


         }
      
                  echo '<tr>
                      <td style="width: 5px">'.($key+1).'</td>
                      <td style="width: 15px">'.$value["Rnc_Suplidor"].'</td>
                      <td style="width: 15px">'.$value["Nombre_Suplidor"].'</td>
                      <td style="width: 15px">'.$value["NAsiento"].'</td>
                      <td style="width: 15px">'.$value["FechaAnoMes"].'</td>
                      <td style="width: 15px">'.$value["FechaDia"].'</td>
                      <td style="width: 15px">'.number_format($value["Monto"], 2).'</td>
                      <td style="width: 15px">'.number_format($value["MontoDiferencia"], 2).'</td>
                      <td style="width: 15px">'.$value["Referencia"].'</td>
                           
                            ';

                            $id = "id";
                            $valorid = $value["EntidadBancaria"];


                        $banco = ControladorBanco::ctrModalEditarBanco($id, $valorid);
                          echo '<td style="width: 15px">'.$banco["Nombre_Cuenta"].'</td>
                          <td style="width: 15px">'.$value["Descripcion"].'</td>
                           <td style="width: 15px">'.$Facturas.'</td>';

                          if($value["Modulo"] == "recibodepago"){
                    

echo '<td>
<button Title="Ver detalles de Recibos de Pagos" class="btn btn-default btn-xs btnVerdetalleReciboPagos" id="'.$value["id"].'" NAsiento="'.$value["NAsiento"].'" Rnc_Empresa_cxp="'.$value["Rnc_Empresa_cxp"].'" Rnc_Suplidor="'.$value["Rnc_Suplidor"].'" data-toggle="modal" data-target="#modalVerDetalleDeRecibosPagos"><i class="fa fa-eye"></i></button>
 <button Title="Imprimir Factura" class="btn btn-info btn-xs btnImprimirRecibodepago" id="'.$value["id"].'" NAsiento="'.$value["NAsiento"].'" Rnc_Empresa_cxp="'.$value["Rnc_Empresa_cxp"].'" Rnc_Suplidor="'.$value["Rnc_Suplidor"].'"><i class="fa fa-print"></i></button>

<button class="btn btn-warning btn-xs btnEditarRecibodePago" id="'.$value["id"].'" NAsiento="'.$value["NAsiento"].'" Rnc_Empresa_cxp="'.$value["Rnc_Empresa_cxp"].'" Rnc_Suplidor="'.$value["Rnc_Suplidor"].'" Moneda="'.$value["FacturaCXP"].'"><i class="fa fa-pencil"></i></button> 

<button class="btn btn-danger btn-xs btnEliminarRecibodePago" id="'.$value["id"].'" NAsiento="'.$value["NAsiento"].'" Rnc_Empresa_cxp="'.$value["Rnc_Empresa_cxp"].'" Rnc_Suplidor="'.$value["Rnc_Suplidor"].'"><i class="fa fa-times"></i></button>  
</td>';




                          }
       
                             

          
}/*cierre for respuesta*/














               ?>

            </tbody>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

           
            
          </table>
        
       

         <?php 
  
        #$eliminarVenta = new ControladorVentas();
        #$eliminarVenta -> ctrEliminarVenta();



        ?>

        </div>        

        
      </div>
      

    </section>
 
  </div>
  <!--************************************************
                      MODAL AGREGAR Categoria
  ******************************************************* -->
  <!-- Modal -->
<div id="modalVerDetalleDeRecibosPagos" class="modal fade" role="dialog" >
  
  <div class="modal-dialog modal-lg" style="width: 1150px;">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Ver Detalle Recibo de Pago</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">


<div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
      <h5 style="text-align: center; color: #FFFFFF"><b>SUPLIDOR</b></h5>

</div>
          <div class="form-group col-xs-4">
  
  <div class="input-group">

        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

        <input type="text" class="form-control" id="Tipo_Suplidor" readonly>
                   
  </div>          
</div>

      
<div class="form-group col-xs-4">
    <div class="input-group">

        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

        <input type="text" class="form-control" id="Nombre_Suplidor" readonly>
                   
    </div>            

</div>

<div class="form-group col-xs-4">
  <div class="input-group">

      <span class="input-group-addon"><i class="fa fa-key"></i></span>

      <input type="text" class="form-control" id="Rnc_Suplidor" readonly>
                
  </div>
</div>
<div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
    <h5 style="text-align: center; color: #FFFFFF"><b> RECIBO DE PAGO</b></h5>
</div>


       <div style="padding-right: 0px"  class="form-group col-xs-4">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

   
       <input type="text" class="form-control" maxlength="6" id="FechaAnoMes"  readonly>
        

   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-xs-4">
   

  <div class="input-group">
 <input type="text" class="form-control" maxlength="2" id="FechaDia" readonly>
 </div>  
  
  
</div>



<div class="col-xs-4"></div>

<div class="col-xs-12"></div>

<div class="form-group col-xs-4">

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-key">&nbsp;NAsiento</i></span>
        <input type="text" class="form-control" id="NAsiento" readonly>

    </div>
             
</div>       


   <div class="form-group col-xs-4">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

   
       <input type="text" class="form-control" maxlength="6" id="Referencia"  readonly>
        

   </div>  
  
  
</div>

<div class="form-group col-xs-4">
   

  <div class="input-group">
 <input type="text" class="form-control" maxlength="2" id="Banco" readonly>
 </div>  
  
  
</div>


<div class="col-xs-12 left">
                 <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>

                      <input type="text" class="form-control" id="Descripcion"  readonly>

                    </div>
                   
                  
                 </div>
               
              </div> 
   <div>
                             
 <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
      <h5 style="text-align: center; color: #FFFFFF"><b>DETALLE DE PAGO</b></h5>
</div>
     <div class="form-group col-xs-4">

                    <div class="input-group">
                      <span class="input-group-addon">Moneda de las Facturas</span>

                      <input type="text" class="form-control" id="FacturaCXP"  readonly>

                    </div>
                   
                  
                 </div>
                 <div class="form-group col-xs-4">

                    <div class="input-group">
                      <span class="input-group-addon">Moneda del Recibo</span>

                      <input type="text" class="form-control" id="ReciboCXP"  readonly>

                    </div>
                   
                  
                 </div>
               
              </div> 
              <div class="form-group col-xs-4">

                    <div class="input-group">
                      <span class="input-group-addon">Diferencias de Pagos</span>

                      <input type="text" class="form-control" id="Diferencia"  readonly>

                    </div>
                   
                  
                 </div>
               

<div class="form-group facturasCompras col-xs-12">
    
</div>
 
<div class="form-group totalesRecibos  col-xs-12">
    
</div>  
<div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
      <h5 style="text-align: center; color: #FFFFFF"><b>RETENCIONES APLICADAS</b></h5>
</div>

 <div class="form-group Retenciones  col-xs-12">
    
</div>      

<div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
      <h6 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN CONTABLE</b></h6>

</div>
               
<div class="form-group Contabilidadrecibopago col-xs-12">
    
</div>      
     
 </div> 
 </div>      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        

      </div>
      <?php 
      

      //$EditarCategoria = new ControladorCategorias();
      //$EditarCategoria -> ctrEditarCategoria();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>
 <?php 
  $eliminarRecibo = new ControladorCXP();
  $eliminarRecibo -> ctrEliminarRecibo();

   ?> 