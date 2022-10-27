
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       
       <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-server"></i>
        DETALLES VENTAS RECURRENTES
        
      </h1>
  <a href="crear-ventasrecurrentes" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Factura Recurrentes</a>

  <a href="ventasrecurrentes" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle de Ventas Recurrentes</a>

 
  <a href="ventas" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle de Ventas</a>

   <a href="reporte" class="btn btn-success"><i class="fa fa-pie-chart
" style="padding-right:5px"></i>Informe de Ventas</a>
      

      
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Detalle Ventas</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

      

        <div class="box-body">
<input type="hidden"  id="RncEmpresaVentas" name="RncEmpresaVentas" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">

<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
   <table border="0" cellspacing="4" cellpadding="4">
              
              <tbody>
                <tr>
                    <td>Desde &nbsp;</td>
                    <td><input type="text" maxlength="6" id="minventasrecurrentes" name="minventasrecurrentes" placeholder="AñoMes"></td>
                   
                    <td><input type="text" class="col-xs-3" maxlength="2" id="mindiaventasrecurrentes" name="mindiaventasrecurrentes" placeholder="Día"></td>
                </tr>

                <tr>
                    <td>Hasta &nbsp;</td>
                    <td><input type="text" maxlength="6" id="maxventasrecurrentes" name="maxventasrecurrentes" placeholder="AñoMes"></td>
                   
                    <td><input type="text" class="col-xs-3" maxlength="2" id="maxdiaventasrecurrentes" name="maxdiaventasrecurrentes" placeholder="Día"></td>
              </tr>


              <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalventasrecurrentes">Facturar Ventas Recurrentes</button>
            </tbody>
            

          </table>
    <br>



          <table class="table table-bordered table-striped dt-responsive ventasrecurrentes"  width="100%">


            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                <th style="width:5px">#</th>
                <th style="width: 5px">Cliente</th>
                <th style="width: 5px">NCF</th>
                <th>Año/Mes</th>
                <th>Día</th>
                <th>Vendedor</th>
                <th>Forma</th>
                <th>Ref.</th>
                <th>Moneda</th>
                <th>Tasa</th> 
                <th>Neto</th> 
                <th>Desc.</th> 
                <th>Impuesto</th>           
                <th>Total</th>
                <th style="width: 5px">Observaciones</th> 
                <th></th>            

              </tr>
              

            </thead>

            

            <tbody>

              <?php 
              $PerfilUsuario = $_SESSION["Perfil"];
              if(isset($_GET["fechaInicial"])){
                  $Rnc_Empresa_Venta = $_SESSION["RncEmpresaUsuario"];
                  $fechaInicial = $_GET["fechaInicial"];
                  $fechaFinal = $_GET["fechaFinal"];
                  
                }else{

                  $Rnc_Empresa_Venta = $_SESSION["RncEmpresaUsuario"];
                  $fechaInicial = null;
                  $fechaFinal = null;

                }
              
              $respuesta = ControladorVentas::ctrRangoFechasVentasRecurrentes($Rnc_Empresa_Venta, $fechaInicial, $fechaFinal);

              
              foreach ($respuesta as $key => $value) {


                echo ' <tr>
                <td>'.($key+1).'</td>
                <td>'.$value["Nombre_Cliente"].'</td>
                <td>'.$value["EXTRAER_NCF"].'</td>
                <td>'.$value["FechaAnoMes"].'</td>
                <td>'.$value["FechaDia"].'</td>
                <td>'.$value["Nombre_Vendedor"].'</td>
                <td>'.$value["Metodo_Pago"].'</td>
                <td>'.$value["Referencia"].'</td>
                <td>'.$value["Moneda"].'</td>
                <td>'.$value["Tasa"].'</td>
                <td>'.number_format($value["Neto"],2).'</td>
                <td>'.number_format($value["Descuento"],2).'</td>
                <td>'.number_format($value["Impuesto"],2).'</td>
                <td>'.number_format($value["Total"],2).'</td>
                <td>'.$value["Observaciones"].'</td>
                
                <td>';
             
                  if($PerfilUsuario != "Vendedor"){ 
                      echo'<button Title="Editar Factura" class="btn btn-warning btn-xs btnEditarVentaRecurrente" idVenta="'.$value["id"].'"  Rnc_Empresa_Venta="'.$value["Rnc_Empresa_Venta"].'" ExtraerAsiento="DFF"><i class="fa fa-pencil"></i></button>
                    

                    <button Title="Eliminar Factura" class="btn btn-danger btn-xs btnEliminarVentaRecurrente" idVentaRecurrente="'.$value["id"].'"   Rnc_Empresa_Venta="'.$value["Rnc_Empresa_Venta"].'"  ExtrarNCF="'.$value["EXTRAER_NCF"].'"><i class="fa fa-times"></i></button>';
                       
                      }




                echo'</td>           

              </tr>';
                

              }         


               ?>



            </tbody>

            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
<td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";>TOTAL</td> 
<td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td> 
                                   
<td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td>
<td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td> 
<td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td>

<td></td>
<td></td>
                 
              </tr>


      </tfoot>     
           
            
          </table>
        
        

         <?php 
  
        $eliminarVenta = new ControladorVentas();
        $eliminarVenta -> ctrEliminarVentaRecurrente();



        ?>

        </div>        

        
      </div>
      

    </section>
 
  </div>

 <!--************************************************
                      MODAL AGREGAR CLIENTE
  ******************************************************* -->
  
<div id="modalventasrecurrentes" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data" class="formularioVentaRecurrente">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Facturación Recurrente</h4>
      
      </div>
      

      <div class="modal-body">
        

        <div class="box-body">
           
<input type="hidden"  id="idCotizaccion" name="idCotizaccion" value="">
<input type="hidden" style ="margin-left: 5px" maxlength="11" id="NCotizacion" name="NCotizacion" value="">

<input type="hidden"  id="RncEmpresaVentasRecurrente" name="RncEmpresaVentasRecurrente" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
<input type="hidden"  id="TipoDeInventario" name="TipoDeInventario" value="<?php echo $_SESSION["Inventario"];?>">

<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">

<input type="hidden" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="<?php echo $_SESSION["Nombre"]?>">

<input type="hidden" class="form-control" id="Perfil" name="Perfil" value="<?php echo $_SESSION["Perfil"]?>">
<input type="hidden" class="form-control" id="UsuarioDescuento" name="UsuarioDescuento" value="<?php echo $_SESSION["Descuento"]?>">
<input type="hidden"  id="CambiarInventario" name="CambiarInventario" value="<?php echo $_SESSION["Inventario"];?>">
<input type="hidden" class="form-control" id="PorDescuentoConf" name="PorDescuentoConf" value="<?php echo $_SESSION["PorDescuentoConf"] ?>">

<div style="padding-right: 0px"  class="form-group col-lg-6">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

    <input type="text" class="form-control" maxlength="6" id="FechaFacturames" name="FechaFacturames" value="<?php if (isset($_SESSION['FechaFacturames'])){ echo $_SESSION['FechaFacturames'];}?>" placeholder="Año/Mes Ejemplo 202001" required>
    
   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-lg-6">
   

  <div class="input-group">
  <input type="text" class="form-control" maxlength="2" id="FechaFacturadia" name="FechaFacturadia"  value="<?php if (isset($_SESSION['FechaFacturadia'])){ echo $_SESSION['FechaFacturadia'];}?>" placeholder="Día Ejemplo 01" required autofocus>
 
 </div>  
  
  
</div>

<div class="form-group col-lg-12">

      <div class="input-group">

          <span class="input-group-addon">¿Desea Cambiar las Observaciones de las Facturas?</span>

              <div class="input-group form-control">
   
                  <input type="radio" id="observentasrecurrentes"  name="observentasrecurrentes"  value="1" required> Si
                  <input type="radio"  id="observentasrecurrentes"  name="observentasrecurrentes" value="2" required> No         
                   
              </div>

        </div>

  </div>
  <?php 
  $AsignarTasa = 0;
  foreach ($respuesta as $key1 => $value) {
    if($value["Moneda"] == "USD"){
      $AsignarTasa = 1;


    }


  }
 
?>


<div class="form-group col-xs-12">
      
      <div class="input-group">
        <?php 
        
        if($AsignarTasa == "1"){
            
            echo'<span class="input-group-addon">Asignar una Tasa de Cambio Para las Facturas en USD</span>
                    <input type="text" class="form-control" id="tasaUS" name="tasaUS" placeholder="Tasa de Cambio"required>';
        }else{
            echo'<input type="hidden" class="form-control" id="tasaUS" name="tasaUS" placeholder="Tasa de Cambio"required>';

        }

        ?>  
                      
      </div>
                   

</div>

<div class="form-group col-lg-12">
  <div class="input-group textobservaciones col-lg-12">


  </div>

</div>
  
</div>

         
  
        
      </div>
      
      
      <div class="modal-footer"> 

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Facturar</button>

      </div>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->
    <?php 
      $Crearventarecurrente = new ControladorVentas();
      $Crearventarecurrente -> ctrCrearFacturaRecurrente();




     ?>

    </div>

  </div>
</div>

 