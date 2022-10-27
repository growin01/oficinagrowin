
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
         
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-server"></i>
        Recibo de Deposito
        
      </h1>
      <a href="ventas" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle de Ventas</a>
  
   
  
      
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Recibo de deposito</li>
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
                <th>N° de Recibo</th>
                <th>Metodo de Pago</th>
                <th>Año/Mes</th>
                <th>Día</th>
                <th>Monto</th>
                <th>Referencia</th>
                <th>Banco</th>
                <th>Descrip.</th>
                <th>Estado</th>
                <th></th>
                   
              </tr>
             
            </thead>
            <tbody>
              <?php 
             
                  
    $Rnc_Empresa_VentaContado =  $_SESSION["RncEmpresaUsuario"];

    $respuesta = ControladorVentas::ctrMostarReciboDeposito($Rnc_Empresa_VentaContado);


foreach ($respuesta as $key => $value) {
  $Metododepago = $value["Metododepago"];
  


  switch ($Metododepago){
      case "01":
          $Formadepago = "01-EFECTIVO";
          


          break;

          case "02":
          $Formadepago = "02-CHEQUES/TRANSFERENCIAS/DEPOSITO";
          
          break;

          case "03":
          $Formadepago = "03-TARJETA CREDITO/DEBITO";
          
          break;

          case "04":
          $Formadepago = "04-VENTA A CREDITO";
          
          break;

          case "05":
          $Formadepago = "05-BONOS CERTIFICADOS REGALOS";
         
          break;
                            
          case "06":                            
          $Formadepago = "06-PERMUTAS";
          
          break;

          case "07":                            
          $Formadepago = "07-OTRAS FORMAS DE VENTAS";
          
          break;

                            
    }

          
      
                  echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value["NAsiento"].'</td>
                            <td>'.$Formadepago.'</td>
                            <td>'.$value["FechaAnoMes"].'</td>
                            <td>'.$value["FechaDia"].'</td>
                            <td>'.number_format($value["Deposito"], 2).'</td>
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

  
echo '<td>'.$value["Descripcion"].'</td>';

echo '<td><button class="btn btn-success btn-xs">DEPOSITADO</button></td>';
echo '<td><button class="btn btn-warning btn-xs btnEditarCargamasivacontado" id="'.$value["id"].'"  NAsiento="'.$value["NAsiento"].'" Metododepago="'.$Metododepago.'"><i class="fa fa-pencil"></i></button> 
<button class="btn btn-danger btn-xs btnEliminarCargamasivacontado" id="'.$value["id"].'" Rnc_Empresa_VentaContado = "'.$value["Rnc_Empresa_VentaContado"].'" NAsiento="'.$value["NAsiento"].'"><i class="fa fa-times"></i></button>  
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
 <?php 
  $eliminarDepositoCargaMasiva = new ControladorVentas();
  $eliminarDepositoCargaMasiva -> ctrEliminarcargamasivadeposito();

   ?> 

  