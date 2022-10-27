
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
         
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-server"></i>
        Recibo de Cobros
        
      </h1>
      <a href="ventas" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle de Ventas</a>
  
   
    <a href="reportecxc" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Cuentas Por Cobrar</a>

    <a href="detallerecibodecobro" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Recibo de Cobro</a>
   
  
      
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Cuentas por cobrar</li>
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


          <table class="table table-bordered table-striped dt-responsive ReporteCXC" width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                <th>#</th>
                <th>RNC Cliente</th>
                <th>Nombre Cliente</th>
                <th>N° de Recibo</th>
                <th>Año/Mes</th>
                <th>Día</th>
                <th>Monto</th>
                <th>Referencia</th>
                <th>Banco</th>
                <th>Descrip.</th>
                <th style="width: 15px">Facturas</th>
                <th>Modulo</th>
                <th></th>
                   
              </tr>
             
            </thead>
            <tbody>
              <?php 
             
                  
    $Rnc_Empresa_CXC =  $_SESSION["RncEmpresaUsuario"];

    $respuesta = ControladorCXC::ctrMostarRecibodecobro($Rnc_Empresa_CXC);


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
                            <td>'.($key+1).'</td>
                            <td>'.$value["Rnc_Cliente"].'</td>
                            <td>'.$value["Nombre_Cliente"].'</td>
                            <td>'.$value["NAsiento"].'</td>
                            <td>'.$value["FechaAnoMes"].'</td>
                            <td>'.$value["FechaDia"].'</td>
                            <td>'.number_format($value["Monto"], 2).'</td>
                            <td>'.$value["Referencia"].'</td>';

                            $id = "id";
                            $valorid = $value["EntidadBancaria"];

   if($_SESSION["Banco"] == 1){
        $id = "id";
        $valorid = $value["EntidadBancaria"];
        $banco = ControladorBanco::ctrModalEditarBanco($id, $valorid);
  
  echo '<td>'.$banco["Nombre_Cuenta"].'</td>';

  }else{
  
  echo '<td>'.$value["EntidadBancaria"].'</td>';

  }

  
echo '<td>'.$value["Descripcion"].'</td>
<td style="width: 15px">'.$Facturas.'</td>';

echo '<td><button class="btn btn-success btn-xs">FACTURAS</button></td>';
echo '<td>
<button Title="Ver detalles de Recibos de Cobros" class="btn btn-default btn-xs btnVerdetalleReciboCobros" id="'.$value["id"].'" NAsiento="'.$value["NAsiento"].'" Rnc_Empresa_cxc="'.$value["Rnc_Empresa_cxc"].'" Rnc_Cliente="'.$value["Rnc_Cliente"].'" data-toggle="modal" data-target="#modalVerDetalleDeRecibosCobros"><i class="fa fa-eye"></i></button>

 <button Title="Imprimir Factura" class="btn btn-info btn-xs btnImprimirRecibodeCobro" id="'.$value["id"].'" NAsiento="'.$value["NAsiento"].'" Rnc_Empresa_cxc="'.$value["Rnc_Empresa_cxc"].'" Rnc_Cliente="'.$value["Rnc_Cliente"].'"><i class="fa fa-print"></i></button>



<button class="btn btn-warning btn-xs btnEditarRecibodeCobro" id="'.$value["id"].'" NAsiento="'.$value["NAsiento"].'" Rnc_Empresa_cxc="'.$value["Rnc_Empresa_cxc"].'" Rnc_Cliente="'.$value["Rnc_Cliente"].'" Moneda="'.$value["FacturaCXC"].'"><i class="fa fa-pencil"></i></button> 
<button class="btn btn-danger btn-xs btnEliminarRecibodeCobro" id="'.$value["id"].'" NAsiento="'.$value["NAsiento"].'" Rnc_Empresa_cxc="'.$value["Rnc_Empresa_cxc"].'" Rnc_Cliente="'.$value["Rnc_Cliente"].'" Moneda="'.$value["FacturaCXC"].'"><i class="fa fa-times"></i></button>  
</td>';

       
                             
 echo '</tr>';
          
}/*cierre for respuesta*/

      ?>

            </tbody>
            
           
            
          </table>
        
     
        </div>        

        
      </div>
      

    </section>
 
  </div>
  <!--************************************************
                      MODAL AGREGAR Categoria
  ******************************************************* -->
  <!-- Modal -->
<div id="modalVerDetalleDeRecibosCobros" class="modal fade" role="dialog" >
  
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
      <h5 style="text-align: center; color: #FFFFFF"><b>Cliente</b></h5>

</div>
  <div class="form-group col-xs-4">
  
  <div class="input-group">

        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

        <input type="text" class="form-control" id="Tipo_Cliente" readonly>
                   
  </div>          
</div>
          
      
<div class="form-group col-xs-4">
    <div class="input-group">

        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

        <input type="text" class="form-control" id="Nombre_Cliente" readonly>
                   
    </div>            

</div>

<div class="form-group col-xs-4">
  <div class="input-group">

      <span class="input-group-addon"><i class="fa fa-key"></i></span>

      <input type="text" class="form-control" id="Rnc_Cliente" readonly>
                
  </div>
</div>
<div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
    <h5 style="text-align: center; color: #FFFFFF"><b> RECIBO DE COBRO</b></h5>
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

                      <input type="text" class="form-control" id="FacturaCXC"  readonly>

                    </div>
                   
                  
                 </div>
                 <div class="form-group col-xs-4">

                    <div class="input-group">
                      <span class="input-group-addon">Moneda del Recibo</span>

                      <input type="text" class="form-control" id="ReciboCXC"  readonly>

                    </div>
                   
                  
                 </div>
               
              </div> 
              <div class="form-group col-xs-4">

                    <div class="input-group">
                      <span class="input-group-addon">Diferencias de Pagos</span>

                      <input type="text" class="form-control" id="Diferencia"  readonly>

                    </div>
                   
                  
                 </div>
               

<div class="form-group facturasVentas col-xs-12">
    
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
  $eliminarRecibo = new ControladorCXC();
  $eliminarRecibo -> ctrEliminarRecibo();

   ?> 