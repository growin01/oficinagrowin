
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
       <h1 class="col-xs-5" style="font-size: 30px"><i class="fa fa-file-pdf-o"></i>
        DETALLES COTIZACIONES
        
      </h1>
  <a href="crear-cotizacion" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Crear Nuevo</a>

  <a href="crear-ventas" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Factura</a>
   <a href="crear-ventas-pro" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Factura Proforma</a>
   <a href="ventas" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalles Ventas</a>

      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Cotizaciones</li>
      </ol>
    </section>

    <section class="content">


      
      <div class="box">
        

       
        <div class="box-body">
          <table border="0" cellspacing="4" cellpadding="4">
              
              <tbody>
                <tr>
                       <td>Período &nbsp;</td>
                    <td><select class="form-control pull-left col-xs-3" name="periodocotizacion" id="periodocotizacion">
  <?php 
if(isset($_GET["periodocotizacion"])){
echo'<option value="'.$_GET["periodocotizacion"].'">'.$_GET["periodocotizacion"].'</option>';
  foreach ($_SESSION["Perido"] as $key => $value) {
    if($_GET["periodocotizacion"] != $value) { 
     echo'<option value="'.$value.'">'.$value.'</option>';
     }
    
  
}/*cierre foreach*/
}else{
 echo'<option value="'.$_SESSION["Anologin"].'">'.$_SESSION["Anologin"].'</option>';
  foreach ($_SESSION["Perido"] as $key => $value) {
    if($_SESSION["Anologin"] != $value) { 
     echo'<option value="'.$value.'">'.$value.'</option>';
     }
    
    

}

 
  }

   ?>
   </select></td> </tr>
   <tr>
                     

                    <td>Desde &nbsp;</td>
                    <td><input type="text" maxlength="6" id="mincotizacion" name="mincotizacion" placeholder="AñoMes"></td>
                   
                    <td><input type="text" class="col-xs-4" maxlength="2" id="mindiacotizacion" name="mindiacotizacion" placeholder="Día"></td>
                </tr>

                <tr>
                    <td>Hasta &nbsp;</td>
                    <td><input type="text" maxlength="6" id="maxcotizacion" name="maxcotizacion" placeholder="AñoMes"></td>
                   
                    <td><input type="text" class="col-xs-4" maxlength="2" id="maxdiacotizacion" name="maxdiacotizacion" placeholder="Día"></td>
              </tr>


              
            </tbody>
            

          </table>
    <br>


          <table class="table table-bordered table-striped dt-responsive cotizacion" width="100%">
 
            <thead>

              <tr>
                
                <th>Cliente</th>
                <th>N°</th>
                <th>N° Cotizacion</th>
                <th>NCF</th>
                <th>Año/Mes</th>
                <th>Día</th>
                <th>Vendedor</th>
                <th>Moneda</th>
                <th>Tasa</th>
                <th>Neto</th> 
                <th>Desc.</th>
                <th>Impuesto</th>           
                <th>Total</th>
                <th>Descrip.</th> 
                <th>Estado</th> 
                <th>Estatus</th> 
                <th></th>
                          
              </tr>
              

            </thead>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>

  <?php 
    if(isset($_GET["periodocotizacion"])){
        
        $periodocotizacion = $_GET["periodocotizacion"];
        
        }else{
        
        $periodocotizacion = $_SESSION["Anologin"];
    }
              
        $Rnc_Empresa_Cotizacion = $_SESSION["RncEmpresaUsuario"];
                 
            $respuesta = ControladorCotizaciones::ctrMostrarCotizaciones($Rnc_Empresa_Cotizacion, $periodocotizacion);

              
              foreach ($respuesta as $key => $value) {

                $id = "id";

                $valorid = $value["id_Cliente"];

                $respuestaCliente = ControladorClientes::ctrModalEditarClientes($id, $valorid);





                echo ' <tr>
               
                <td>'.$respuestaCliente["Nombre_Cliente"].'</td>
                <td>'.$value["Codigo"].'</td> 
                <td>'.$value["NCF_Cotizacion"].'</td>
                <td>'.$value["NCF_FACTURA"].'</td>
                <td>'.$value["FechaAnoMes"].'</td>
                <td>'.$value["FechaDia"].'</td>';

                


                 $idUsuario = $value["id_Vendedor"];
                if($value["id_Vendedor"] == "0"){
                  $Nombre_Vendedor = "";


                }else{

                   $respuestaUsuario =ControladorUsuarios::ctrModalEditarUsuario($id, $idUsuario);
                    $Nombre_Vendedor = $respuestaUsuario["Nombre"];


                }

                 echo '<td>'.$Nombre_Vendedor.'</td>
                      <td>'.$value["Moneda"].'</td>
                      <td>'.$value["Tasa"].'</td>
                      <td>'.number_format($value["Neto"], 2).'</td>
                      <td>'.number_format($value["Descuento"],2).'</td>
                      <td>'.number_format($value["Impuesto"], 2).'</td>
                      <td>'.number_format($value["Total"], 2).'</td>
                      <td>'.$value["Observaciones"].'</td>';


                if($value["Estado_Cotizacion"] == 0){

                  echo' <td><button class="btn btn-warning btn-xs btnActivarCotizacion" idCotizacion="'.$value["id"].'"  estadoCotizacion="1">EMITIDA</button></td>';
                } 
                  else if($value["Estado_Cotizacion"] == 1){

                  echo' <td><button class="btn btn-success btn-xs btnActivarCotizacion" idCotizacion="'.$value["id"].'" estadoCotizacion="2">APROBADA</button></td>';

                }else {

                  echo' <td><button class="btn btn-danger btn-xs btnActivarCotizacion" idCotizacion="'.$value["id"].'" estadoCotizacion="0">RECHAZADA</button></td>';

                }

                if($value["Accion_Cotizacion"] == "CREADA"){

                  echo' <td><button class="btn btn-info btn-xs">CREADA</button></td>';
                } 
                  else if($value["Accion_Cotizacion"] == "EDITADA"){

                  echo' <td><button class="btn btn-warning btn-xs">EDITADA</button></td>';

                }else{

                  echo' <td><button class="btn btn-success btn-xs">FACTURADA</button></td>';

                }

                  if($value["Accion_Cotizacion"] !="FACTURADA"){ 
                      
                  echo '<td>
                  <button Title="Ver Cotizacion" class="btn btn-default btn-xs btnVerCotizacion" idCotizacion="'.$value["id"].'" codigoCotizacion="'.$value["Codigo"].'" Rnc_Empresa_Cotizacion="'.$value["Rnc_Empresa_Cotizacion"].'" Rnc_Cliente = "'.$value["Rnc_Cliente"].'" NCF_Cotizacion="'.$value["NCF_Cotizacion"].'"data-toggle="modal" data-target="#modalVerCotizacion"><i class="fa fa-eye"></i></button>

                     
                    <button Title="Imprimir Cotizacion" class="btn btn-info btnImprimirCotizacion btn-xs" idCotizacion="'.$value["id"].'" codigoCotizacion="'.$value["Codigo"].'" Rnc_Empresa_Cotizacion="'.$value["Rnc_Empresa_Cotizacion"].'" ModeloFactura="'.$_SESSION["Modelo_Factura"].'"><i class="fa fa-print"></i></button>

                    <button Title="Facturar Cotización"class="btn btn-success btn-xs btnFacturarCotizacion" idCotizacion="'.$value["id"].'" codigoCotizacion="'.$value["Codigo"].'" Rnc_Empresa_Cotizacion="'.$value["Rnc_Empresa_Cotizacion"].'" NCotizacion="'.$value["NCF_Cotizacion"].'"><i class="fa fa-recycle"></i></button>

                    <button Title="Editar Cotizacion" class="btn btn-warning btnEditarCotizacion btn-xs" idCotizacion="'.$value["id"].'" codigoCotizacion="'.$value["Codigo"].'" Rnc_Empresa_Cotizacion="'.$value["Rnc_Empresa_Cotizacion"].'"><i class="fa fa-pencil"></i></button>

                    <button Title="Copiar Cotizacion" class="btn btn-primary btn-xs btnCopiarCotizacion" idCotizacion="'.$value["id"].'" codigoCotizacion="'.$value["Codigo"].'" Rnc_Empresa_Cotizacion="'.$value["Rnc_Empresa_Cotizacion"].'"><i class="fa fa-copy"></i></button>

                     <button Title="Eliminar Cotizacion" class="btn btn-danger btnEliminarCotizacion btn-xs" idCotizacion="'.$value["id"].'" codigoCotizacion="'.$value["Codigo"].'" Rnc_Empresa_Cotizacion="'.$value["Rnc_Empresa_Cotizacion"].'"><i class="fa fa-times"></i></button>
                                       </td>';
                      }else{
                         echo '<td>
                      <button Title="Ver Cotizacion" class="btn btn-default btn-xs btnVerCotizacion" idCotizacion="'.$value["id"].'" codigoCotizacion="'.$value["Codigo"].'" Rnc_Empresa_Cotizacion="'.$value["Rnc_Empresa_Cotizacion"].'" ModeloFactura="'.$_SESSION["Modelo_Factura"].'" data-toggle="modal" data-target="#modalVerCotizacion"><i class="fa fa-eye"></i></button>
                     
                    <button Title="Imprimir Cotizacion" class="btn btn-info btnImprimirCotizacion btn-xs" idCotizacion="'.$value["id"].'" codigoCotizacion="'.$value["Codigo"].'" Rnc_Empresa_Cotizacion="'.$value["Rnc_Empresa_Cotizacion"].'" ModeloFactura="'.$_SESSION["Modelo_Factura"].'"><i class="fa fa-print"></i></button>


                    <button Title="Copiar Cotizacion" class="btn btn-primary btn-xs btnCopiarCotizacion" idCotizacion="'.$value["id"].'" codigoCotizacion="'.$value["Codigo"].'" Rnc_Empresa_Cotizacion="'.$value["Rnc_Empresa_Cotizacion"].'"><i class="fa fa-copy"></i></button>

                    
                                       </td>';



                      }

                      echo'</tr>';

                  }


               ?>


  <tfoot>
    <tr>
      <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";>TOTAL:</th>
        <th style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></th> 
        <th style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></th> 
        <th style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></th>           
        <th style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></th>
        <th></th> 
        <th></th> 
        <th></th> 
        <th></th>            
    </tr>
  </tfoot>

              

            </tbody>
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->

            
          </table>
        
        <!--*****************CIERRE DE TABLA USUARIO********************************* -->

         <?php 
  
        $eliminarCotizacion = new ControladorCotizaciones();
        $eliminarCotizacion -> ctrEliminarCotizacion();



        ?>

        </div>        

        
      </div>
      

    </section>
 
  </div>
  <div id="modalVerCotizacion" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h6 class="modal-title">Cotización</h6>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">
          <input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">
  <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">

      <h6 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN DEL VENDEDOR</b></h6>
                 
  </div>
   <div class="form-group col-xs-6">
  
  <div class="input-group">

        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

        <input type="text" class="form-control" id="Nombre_Vendedor" readonly>
                   
  </div>          
</div>
<div class="form-group col-xs-6">
  
         
</div>


      <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">

          <h6 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN DEL CLIENTE</b></h6>
                 
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

        <input type="text" class="form-control" id="Rnc_Cliente" readonly>
                   
    </div>            

</div>

<div class="form-group col-xs-4">
  <div class="input-group">

      <span class="input-group-addon"><i class="fa fa-key"></i></span>

      <input type="text" class="form-control" id="Nombre_Cliente" readonly>
                
  </div>
</div>

   
      

<div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">
      <h6 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN DE LA COTIZACIÓN</b></h6>
</div>

                   

       <div style="padding-right: 0px"  class="form-group col-xs-4">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

   
       <input type="text" class="form-control" maxlength="6" id="FechaAnoMes" name="FechaAnoMes" readonly>
        

   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-xs-4">
   

  <div class="input-group">
 <input type="text" class="form-control" maxlength="2" id="FechaDia" name="FechaDia" readonly>
 </div>  
  
  
</div>
<div class="col-xs-12"></div>
<div class="form-group col-xs-4">

          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key">&nbsp;Código</i></span>
              <input type="text" class="form-control" id="Codigo" readonly>

          </div>
            

    </div>

<div class="form-group col-xs-4">

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-key">&nbsp;NCF</i></span>
        <input type="text" class="form-control" id="NCF_Cotizacion" readonly>

    </div>
             
</div>
<div class="form-group col-xs-4 Estado">

             
</div>
     
 <div class="col-xs-12 left">
                 <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>

                      <input type="text" class="form-control" id="Observaciones" name="Observaciones" readonly>

                    </div>
                   
                  
                 </div>
               
              </div>

<div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">

            <h6 style="text-align: center; color: #FFFFFF"><b>DETALLE DE PRODUCTOS COTIZADOS</b></h6>

                 
</div>
 

    <div class="form-group col-xs-4">

          
             <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-money"></i></span>

                <input type="text" class="form-control" id="Moneda" readonly>
                

            </div>

    </div>  
     <div class="form-group col-xs-4">
                   
            <div class="input-group TASA">
            </div>
      
     </div>

     
   <div class="col-xs-12"></div>

             
             
   
         <div class="form-group col-xs-8">
                   
                   
    </div>   

    <div class="form-group productos col-xs-12">
    
    </div>
    
    <div class="form-group col-xs-7 pull-right" style="background-color: #2B6370">
      <h6 style="text-align: center; color: #FFFFFF"><b>TOTAL FACTURA</b></h6>
    </div>
     <div class = "col-xs-12"></div>
   
        
  <div class="col-xs-7 pull-right">
   
   <div class="col-xs-5">
        <label class="pull-right">Sub Total +</label>

    </div>

    <div class="form-group col-xs-7">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="nuevoPrecioNetovi" readonly>

              </div>
      </div>
           <div class="col-xs-5">
       
          <label class="pull-right">DESC. -</label>
          
      
      </div>
     
        <div class="form-group col-xs-3" style="padding-right: 0px">
          <div class="input-group">
          
          <input  class="form-control" type="number" min="0" id="Pordescuento"  readonly>
         </div>
      </div>

       <div class="form-group col-xs-4" style="padding-left: 0px">

            <div class="input-group">
              
                <input type="text" class="form-control" id="Descuento"  readonly>

              

                        
              </div>
        </div>
       <div class="col-xs-5">
       
          <label class="pull-right">ITBIS +</label>
          
      
      </div>
     
        <div class="form-group col-xs-3" style="padding-right: 0px">
          <div class="input-group">
          
          <input  class="form-control" type="number" min="0" id="Porimpuesto"  readonly>
         </div>
      </div>

       <div class="form-group col-xs-4" style="padding-left: 0px">

            <div class="input-group">
              
                <input type="text" class="form-control" id="Impuesto"  readonly>

              

                        
              </div>
        </div> 
     <div class="col-xs-5">
            <label class="pull-right">Total =</label>

        </div>

    <div class="form-group col-xs-7">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="Total" name="Total" placeholder="0000" value=""required readonly>

               
                        
              </div>
      </div>    
    
 </div>
 
 
          
  </div>
 
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       

      </div>

    
     
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>

 </div>
