<?php 
$TotalVenta = 0;
$TotalDepositado = 0;
$PorDepositar = 0;
$Rnc_Empresa_Venta = $_SESSION["RncEmpresaUsuario"];
$fechaInicial = null;
$fechaFinal = null;
 $respuesta = ControladorVentas::ctrRangoFechasVentas($Rnc_Empresa_Venta, $fechaInicial, $fechaFinal);

foreach ($respuesta as $key => $value) {
 
    if($value["Metodo_Pago"] != "04"){

      $TotalVenta = $TotalVenta + $value["Neto"];
 
    }
 
}
foreach ($respuesta as $key => $value) {
 
  
    if($value["Metodo_Pago"] != "04" && $value["Estatus"] == "POR DEPOSITAR"){

      $PorDepositar = $PorDepositar + $value["Total"];
 
    }

  
}
foreach ($respuesta as $key => $value) {
 
  
    if($value["Metodo_Pago"] != "04" && $value["Estatus"] == "DEPOSITADO"){

      $TotalDepositado = $TotalDepositado + $value["Total"];
 
    }

  
}
$inputTotalVenta  = number_format($TotalVenta , 2);
$inputTotalDepositado = number_format($TotalDepositado, 2);
 

$inputPorDepositar = number_format($PorDepositar, 2);

 ?>
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-server"></i>
         VENTAS DE CONTADO
        
      </h1>
     
       <a href="cargamasivacontado" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Carga Masiva de Contado</a>
       
       <a href="reportepago" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Reporte de Pago</a>
    
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Reporte de Ventas de Contado</li>
      </ol>
    </section>
   

    <section class="content">

      
      <div class="box">

           <div class="box-body">
              <div class="form-group col-xs-3">

        <div class="input-group">

        <span class="input-group-addon"><i class="fa fa-toggle-on"></i></span>

   <select class="form-control" name="EstadoVentaContado" id="EstadoVentaContado">
    
<?php 
if(isset($_GET["EstadoVentaContado"])){
  switch ($_GET["EstadoVentaContado"]) {
    case 'PorDepositar':

      echo ' <option value="PorDepositar">Por Depositar</option>
    <option value="Depositado">Depositado</option>
    <option value=""></option>';
      break;
    
     case 'Depositado':
      echo '  <option value="Depositado">Depositado</option>
    <option value="PorDepositar">Por Depositar</option>
    <option value=""></option>';
      break;
  }


}else{

  echo ' <option value="">Seleccionar estado</option>
    <option value="PorDepositar">Por Depositar</option>
    <option value="Depositado">Depositado</option>';
}



 ?>



  </select>

 </div>
 </div>
<button class="btn-primary" name="FiltrarVentaContado" id="FiltrarVentaContado"><i class="fa fa-filter"></i></button>
       
<div class="form-group col-xs-8 pull-right">          
<div class="form-group col-xs-12 pull-right">
<div class="col-xs-4">
   <label>TOTAL VENTA CONTADO $ DOP</label>
    <input type="text" class="form-control"value="<?php echo $inputTotalVenta;?>" readonly>
</div>
<div class="col-xs-4">
    <label>TOTAL DEPOSITADO $ DOP</label>
    <input type="text" class="form-control" value="<?php echo $inputTotalDepositado;?>" readonly>
</div>
<div class="col-xs-4">
    <label>TOTAL POR DEPOSITAR $ DOP</label>
    <input type="text" class="form-control" value="<?php echo $inputPorDepositar;?>" readonly>
   
</div>
 </div>
 </div>            
         
    
       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR VENTAS********************************* -->


       
        <input type="hidden"  id="RncEmpresaCXC" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">

          <table border="0" cellspacing="4" cellpadding="4">
              
              <tbody>
                        <tr>
                       <td>Período &nbsp;</td>
                    <td><select class="form-control pull-left col-xs-3" name="periodoVentaContado" id="periodoVentaContado">
  <?php 
if(isset($_GET["periodoVentaContado"])){
echo'<option value="'.$_GET["periodoVentaContado"].'">'.$_GET["periodoVentaContado"].'</option>';
  foreach ($_SESSION["Perido"] as $key => $value) {
    if($_GET["periodoVentaContado"] != $value) { 
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
                    <td><input type="text" maxlength="6" id="mincxc" name="mincxc" placeholder="AñoMes"></td>
                   
                    <td><input type="text" class="col-xs-3" maxlength="2" id="mindiacxc" name="mindiacxc" placeholder="Día"></td>
                </tr>

                <tr>
                    <td>Hasta &nbsp;</td>
                    <td><input type="text" maxlength="6" id="maxcxc" name="maxcxc" placeholder="AñoMes"></td>
                   
                    <td><input type="text" class="col-xs-3" maxlength="2" id="maxdiacxc" name="maxdiacxc" placeholder="Día"></td>
              </tr>
            </tbody>

          </table>
    <br>
          <!--*****************TABLA  USUARIO********************************* -->
</div>     

          <table class="table table-bordered table-striped dt-responsive TablaVentaContado" width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
               <th style="width:5px">#</th>
                <th style="width: 5px">Cliente</th>
                <th>Codigo</th>
                <th>NCF</th>
                <th>Año/Mes</th>
                <th>Día</th>
                <th>Vendedor</th>
                <th>Forma de Pago</th>
                <th>Moneda</th>
                <th>Tasa</th> 
                <th>Neto</th> 
                <th>Desc.</th> 
                <th>Impuesto</th>           
                <th>Total</th>
                <th>RET ITBIS</th>
                <th>RET ISR</th>
                <th style="width: 5px">Observaciones</th> 
                <th>Estado</th>
                <th></th>
                  
              </tr>
             
            </thead>
              
              <tbody>
<?php 
if(isset($_GET["EstadoVentaContado"])){
  $EstadoVentaContado = $_GET["EstadoVentaContado"];
          
          switch ($EstadoVentaContado) {
                  
            case 'Depositado':
              foreach ($respuesta as $key => $value) {
                  if($value["Metodo_Pago"] != "04" && $value["Estatus"] == "DEPOSITADO"){

                
                    echo '<tr>
                <td>'.($key+1).'</td>
                <td>'.$value["Nombre_Cliente"].'</td>
                <td>'.$value["Codigo"].'</td> 
                <td>'.$value["NCF_Factura"].'</td>
                <td>'.$value["FechaAnoMes"].'</td>
                <td>'.$value["FechaDia"].'</td>
                <td>'.$value["Nombre_Vendedor"].'</td>
                <td>'.$value["Metodo_Pago"].'</td>
                <td>'.$value["Moneda"].'</td>
                <td>'.$value["Tasa"].'</td>
                <td>'.number_format($value["Neto"],2).'</td>
                <td>'.number_format($value["Descuento"],2).'</td>
                <td>'.number_format($value["Impuesto"],2).'</td>
                <td>'.number_format($value["Total"],2).'</td>
                <td>'.number_format($value["ITBIS_Retenido_Tercero"],2).'</td>
                <td>'.number_format($value["RetencionRenta_por_Terceros"],2).'</td>
                <td>'.$value["Observaciones"].'</td>';
                  
               
               if($value["Estatus"] == "DEPOSITADO"){

                  echo' <td><button class="btn btn-success btn-xs">Depositado</button></td>';
                } 
                else {

                  echo' <td><button class="btn btn-danger btn-xs">Por Depositar</button></td>';

                }

                echo '<td>
               
                  
                </td>   

                                
              </tr>';

                  }/*cierre if */
              }/*cierre foreach Depostiado*/
            break;
             
            case 'PorDepositar':
              
              foreach ($respuesta as $key => $value) {
                
                if($value["Metodo_Pago"] != "04" && $value["Estatus"] == "POR DEPOSITAR"){
                  echo '<tr>
                <td>'.($key+1).'</td>
                <td>'.$value["Nombre_Cliente"].'</td>
                <td>'.$value["Codigo"].'</td> 
                <td>'.$value["NCF_Factura"].'</td>
                <td>'.$value["FechaAnoMes"].'</td>
                <td>'.$value["FechaDia"].'</td>
                <td>'.$value["Nombre_Vendedor"].'</td>
                <td>'.$value["Metodo_Pago"].'</td>
                <td>'.$value["Moneda"].'</td>
                <td>'.$value["Tasa"].'</td>
                <td>'.number_format($value["Neto"],2).'</td>
                <td>'.number_format($value["Descuento"],2).'</td>
                <td>'.number_format($value["Impuesto"],2).'</td>
                <td>'.number_format($value["Total"],2).'</td>
                <td>'.number_format($value["ITBIS_Retenido_Tercero"],2).'</td>
                <td>'.number_format($value["RetencionRenta_por_Terceros"],2).'</td>
                <td>'.$value["Observaciones"].'</td>';
               
               if($value["Estatus"] == "DEPOSITADO"){

                  echo' <td><button class="btn btn-success btn-xs">Depositado</button></td>';
                } 
                else {

                  echo' <td><button class="btn btn-danger btn-xs">Por Depositar</button></td>';

                }

                echo '<td>
                 <div class="btn-group">
                    <button title= "Deposito en banco" class="btn btn-success btn-xs ventacontado" NCF_Factura="'.$value["NCF_Factura"].'" Metodo_Pago="'.$value["Metodo_Pago"].'"><i class="fa fa-money"></i></button>
                   

                  </div>
                  
                  
                  
                </td>   

                
              </tr>';
                


                }/*cierre if */
              }/*cierre foreach PorDepositar*/
                   




           }/*Cierre switch*/
}/*Cierre If de Get*/
else{
  
  foreach ($respuesta as $key => $value) {
    
    if($value["Metodo_Pago"] != "04"){
       echo '<tr>
                 <td>'.($key+1).'</td>
                <td>'.$value["Nombre_Cliente"].'</td>
                <td>'.$value["Codigo"].'</td> 
                <td>'.$value["NCF_Factura"].'</td>
                <td>'.$value["FechaAnoMes"].'</td>
                <td>'.$value["FechaDia"].'</td>
                <td>'.$value["Nombre_Vendedor"].'</td>
                <td>'.$value["Metodo_Pago"].'</td>
                <td>'.$value["Moneda"].'</td>
                <td>'.$value["Tasa"].'</td>
                <td>'.number_format($value["Neto"],2).'</td>
                <td>'.number_format($value["Descuento"],2).'</td>
                <td>'.number_format($value["Impuesto"],2).'</td>
                <td>'.number_format($value["Total"],2).'</td>
                <td>'.number_format($value["ITBIS_Retenido_Tercero"],2).'</td>
                <td>'.number_format($value["RetencionRenta_por_Terceros"],2).'</td>
                <td>'.$value["Observaciones"].'</td>';
                  
               
               if($value["Estatus"] == "DEPOSITADO"){

                  echo' <td><button class="btn btn-success btn-xs">Depositado</button></td>';
                } 
                else {

                  echo' <td><button class="btn btn-danger btn-xs">Por Depositar</button></td>';

                }

                echo '<td>
                   <div class="btn-group">
                    <button title= "Deposito en banco" class="btn btn-success btn-xs ventacontado"><i class="fa fa-money"></i></button>
                   

                  </div>
                  
                </td>   

                
              </tr>';


    }/*cierre if */
  }/*foreach */

}  /*Cierre else de Get*/               
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
                <td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td>
                <td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td>
                <td></td> 
                <td></td>
                <td></td>
              </tr>


      </tfoot>        
     
            
          </table>
        
       

         <?php 
  
        #$eliminarVenta = new ControladorVentas();
        #$eliminarVenta -> ctrEliminarVenta();



        ?>

        </div>        

        
      </div>
      

    </section>
 
  </div>

 