<div class="content-wrapper">
    
    <section class="content-header"> 
       <h1>Disponibilidad Financiera</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Disponibilidad Financiera</li>
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
              <div class="form-group col-xs-12">
               
               <div class="form-group col-xs-8">
                    <div class="input-group">   
                      <label class="col-xs-6">Banco</label>
                      <br>
  <select type="text" class="form-control" id="bancodisponibilidad" name="bancodisponibilidad" required>
                
                    <?php 
                      if(isset($_GET["Banco"])){

                            $id = "id";
                            $valorid = $_GET["Banco"];
                            $Banco = ControladorBanco::ctrModalEditarBanco($id, $valorid); 
                            echo '<option value="'.$Banco["id"].'">'.$Banco["Nombre_Cuenta"].'</option>';
                            $Rnc_Empresa_Banco = $_SESSION["RncEmpresaUsuario"];

                              $Banco = ControladorBanco::ctrMostrarBanco($Rnc_Empresa_Banco);
                             foreach ($Banco as $key => $value){

                                  echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';


                            }
 
                          }else{
                            echo '<option value="">Seleccionar Banco</option>';

                          

                                $Rnc_Empresa_Banco = $_SESSION["RncEmpresaUsuario"];

                                $Banco = ControladorBanco::ctrMostrarBanco($Rnc_Empresa_Banco);

                                 foreach ($Banco as $key => $value){

                                  echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';

                            }
                         }

                      ?>   
</select>             
                  </div>
                </div>
                
                <div class="form-group col-xs-3">
                  <div class="input-group">   
                      <label class="col-xs-3">Fecha</label>
                      <br>
  <select type="text" class="form-control" id="fechadisponibilidad" name="fechadisponibilidad" required>
    <option value="">Año/Mes</option>
       <?php  
                         

        $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];

        $PeriodoLD = ControladorDiario::ctrMostrarPeriodo($Rnc_Empresa_LD);

                       
        foreach ($PeriodoLD as $key => $value){

        echo '<option value="'.$value["Fecha_AnoMes_LD"].'">'.$value["Fecha_AnoMes_LD"].'</option>';



        }
                    

                         ?>

  </select>
                          
                
                </div>
              </div>
                
                <div class="form-group" style="padding-top: 25px">
                  <div class="input-group">  
                  
                  <button class="btn btn-warning btndisponibilidad" id="disponibilidad"><i class="glyphicon glyphicon-search"></i></button>
                   
                   </div>
                 </div>

              </div>






            </div><!--= cierre box del hear===-->
<div class="box-body">


 <table class="table table-bordered table-striped dt-responsive disponibilidad" width="100%">
        <thead>
          
          <tr>
                <th style="background: #8BCBE7; width: 10px">Libro Banco</th>
                <th style="background: #8BCBE7; width: 10px">Monto</th>
                <th style="background: #A9F99E; width: 10px">Estado de Cuenta</th>
                <th style="background: #A9F99E; width: 10px">Monto</th>
               

          </tr>
          


        </thead>
        <tbody>
      <?php 
if(isset($_GET["Banco"])){ 

  $id = "id";
  $valorid = $_GET["Banco"];
  $Banco = ControladorBanco::ctrModalEditarBanco($id, $valorid);

  $Rnc_Empresa_DF = $_SESSION["RncEmpresaUsuario"];
  $id_banco = $_GET["Banco"];
  $Disponibilidad = ControladorBanco::ctrDisponibilidad($Rnc_Empresa_DF, $id_banco);
     

              $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
              $valorid_grupo = $Banco["id_grupo"];
              $valorid_categoria = $Banco["id_categoria"];
              $valorid_generica = $Banco["id_generica"];
              $valorid_cuenta = $Banco["id_cuenta"];
              $valorid_banco = $_GET["Banco"];
              
              $Ordenmes = "Fecha_AnoMes_Trans";
              $Ordendia = "Fecha_dia_Trans";

              
    $librobanco = ControladorBanco::ctrMostrarLibroBanco($Rnc_Empresa_LD, $valorid_banco, $valorid_grupo, $valorid_categoria, $valorid_generica, $valorid_cuenta, $Ordenmes, $Ordendia);

    $SaldoInicial = 0;
    $SaldoEstado = 0;

  if(!$Disponibilidad){

      $SaldoInicial = $Banco["saldoInicial"]; 
      
      $SaldoEstado = $Banco["saldoEstado"]; 

     

              
  } else{
    $Fecha = $_GET["Fecha"];

    
    switch ($Fecha) {
      case '202001':
      

        foreach ($Disponibilidad as $key => $value){
            if($value["Fecha"] == "201912"){
                  $SaldoEstado = $value["saldoEstado"];
                  $SaldoInicial = $value["saldoInicial"];

            }
          }
        
        break;
      case '202101':
        foreach ($Disponibilidad as $key => $value){
            if($value["Fecha"] == "202012"){
                  $SaldoEstado = $value["saldoEstado"];
                  $SaldoInicial = $value["saldoInicial"];


            }
          }
        
        break;
      case '202201':
        foreach ($Disponibilidad as $key => $value){
            if($value["Fecha"] == "202112"){
                  $SaldoEstado = $value["saldoEstado"];
                  $SaldoInicial = $value["saldoInicial"];


            }
          }
        
        break;
      case '202301':
        foreach ($Disponibilidad as $key => $value){
            if($value["Fecha"] == "202212"){
                  $SaldoEstado = $value["saldoEstado"];
                  $SaldoInicial = $value["saldoInicial"];


            }
          }
        
      break;
      case '202401':
        foreach ($Disponibilidad as $key => $value){
            if($value["Fecha"] == "202312"){
                  $SaldoEstado = $value["saldoEstado"];
                  $SaldoInicial = $value["saldoInicial"];


            }
          }
        
      break;
      
      default:
      $calFecha = $_GET["Fecha"]-1;
      foreach ($Disponibilidad as $key => $value){
            if($value["Fecha"] == $calFecha){
              $SaldoEstado = $value["saldoEstado"];
              $SaldoInicial = $value["saldoInicial"];
              }
        }
        if($SaldoEstado == 0 && $SaldoInicial == 0){
          $SaldoInicial = $Banco["saldoInicial"]; 
          $SaldoEstado = $Banco["saldoEstado"]; 


        }
        
      
      break;
    

    }/*cierre switch*/
    


  

  }/*else de dispnibilidad*/

    
 echo '<tr>
  <td>Saldo Inicial</td>
  <td>'.number_format($SaldoInicial, 2).'</td>
   <td>Saldo Inicial</td>
  <td>'.number_format($SaldoEstado, 2).'</td>
</tr>'; 

/**********************debitos*********************/
$totaldebitoLD = 0;
$totaldebitoEC = 0;
foreach ($librobanco as $key => $value){
  if($value["Fecha_AnoMes_Trans"] == $_GET["Fecha"]){
    $totaldebitoLD = $totaldebitoLD + $value["debito"];
}

} 
foreach ($librobanco as $key => $value){
  if($value["Fecha_AnoMes_Cobro"] == $_GET["Fecha"] && $value["Estado_Banco"] == 1){
    $totaldebitoEC = $totaldebitoEC + $value["credito"];
}

}
echo '<tr>
  <td>Debito (+)</td>
  <td>'.number_format($totaldebitoLD, 2).'</td>
  <td>Debito (-)</td>
  <td>'.number_format($totaldebitoEC, 2).'</td>
</tr>'; 

/**********************creditos*********************/
$totalcreditoLD = 0;
$totalcreditoEC = 0;
foreach ($librobanco as $key => $value){
  if($value["Fecha_AnoMes_Trans"] == $_GET["Fecha"]){
    $totalcreditoLD = $totalcreditoLD + $value["credito"];
}

} 
foreach ($librobanco as $key => $value){
  if($value["Fecha_AnoMes_Cobro"] == $_GET["Fecha"] && $value["Estado_Banco"] == 1){
    $totalcreditoEC = $totalcreditoEC + $value["debito"];
}

}
echo '<tr>
  <td>Credito (-)</td>
  <td>'.number_format($totalcreditoLD, 2).'</td>
  <td>Credito (+)</td>
  <td>'.number_format($totalcreditoEC, 2).'</td>
</tr>'; 

/*****************saldo final*********/ 
$saldofinalLD = 0;
$saldofinalEC = 0;
/*libro banco*/
$saldofinalLD = $SaldoInicial + $totaldebitoLD - $totalcreditoLD;

/*estado de cuenta*/

$saldofinalEC = $SaldoEstado - $totaldebitoEC + $totalcreditoEC;

echo '<tr>
  <td style="background: #D5E1D3">Saldo Final (=)</td>
  <td style="background: #D5E1D3">'.number_format($saldofinalLD, 2).'</td>
  <td style="background: #D5E1D3">Saldo Final (=)</td>
  <td style="background: #D5E1D3">'.number_format($saldofinalEC, 2).'</td>
</tr>'; 

/**********debitos*********/
$debitosTransLB = 0.00;
$debitosTransEC = 0.00; 


foreach ($librobanco as $key => $value){
  if($value["Fecha_AnoMes_Trans"] == $_GET["Fecha"] && $value["Estado_Banco"] == 2){
    $debitosTransEC = $debitosTransEC + $value["credito"];
  }elseif($value["Fecha_AnoMes_Trans"] == $_GET["Fecha"] && $value["Fecha_AnoMes_Cobro"] > $_GET["Fecha"]){
     $debitosTransEC = $debitosTransEC + $value["credito"];


  }elseif($value["Fecha_AnoMes_Trans"] < $_GET["Fecha"] && $value["Estado_Banco"] == 2){
     $debitosTransEC = $debitosTransEC + $value["credito"];


  }
  else{}

}
echo '<tr>
  <td>Pagos en Transito (+)</td>
  <td>'.number_format($debitosTransLB, 2).'</td>
  <td>Pagos en Transito (-)</td>
  <td>'.number_format($debitosTransEC, 2).'</td>
</tr>'; 

/**********creditos*********/
$creditosTransLB = 0.00;
$creditosTransEC = 0.00; 


foreach ($librobanco as $key => $value){
  if($value["Fecha_AnoMes_Trans"] == $_GET["Fecha"] && $value["Estado_Banco"] == 2){
    $creditosTransEC = $creditosTransEC + $value["debito"];
  }elseif($value["Fecha_AnoMes_Trans"] == $_GET["Fecha"] && $value["Fecha_AnoMes_Cobro"] > $_GET["Fecha"]){
     $creditosTransEC = $creditosTransEC + $value["debito"];


  }elseif($value["Fecha_AnoMes_Trans"] < $_GET["Fecha"] && $value["Estado_Banco"] == 2){
     $creditosTransEC = $creditosTransEC + $value["debito"];


  }
  else{}

}
echo '<tr>
  <td>Depositos en Transito (-)</td>
  <td>'.number_format($creditosTransLB, 2).'</td>
  <td>Depositos en Transito (+)</td>
  <td>'.number_format($creditosTransEC, 2).'</td>
</tr>'; 


/*****************saldo final*********/ 
$DisponibilidadLD = 0;
$DisponibilidadEC = 0;
/*libro banco*/
$DisponibilidadLD = $saldofinalLD + $debitosTransLB - $creditosTransLB;

/*estado de cuenta*/

$DisponibilidadEC = $saldofinalEC - $debitosTransEC + $creditosTransEC;

echo '<tr>
  <td style="background: #79D368">Disponibilidad Libro(=)</td>
  <td style="background: #79D368">'.number_format($DisponibilidadLD, 2).'</td>
  <td style="background: #79D368">Disponibilidad Banco(=)</td>
  <td style="background: #79D368">'.number_format($DisponibilidadEC, 2).'</td>
</tr>'; 


$DiferenciaNO = 0;
$DiferenciaNO = $DisponibilidadLD - $DisponibilidadEC;


    echo '<tr>
  <td>Diferencia No Conciliada</td>
  <td>'.number_format($DiferenciaNO, 2).'</td>
  <td></td>
  <td></td>
</tr>'; 










             

}/*cierre isset*/
?>

</tbody>





</table>
       <form role="form" method="post">
      
    
      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA USUARIO********************** -->

          <div class="form-group">

            <div class="input-group">

             
              
 <input type="hidden" class="form-control input-lg" id="Rnc_Empresa_DF" name="Rnc_Empresa_DF" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
<input type="hidden" class="form-control input-lg" id="id_banco" name="id_banco" value="<?php echo $_GET["Banco"];?>">
<input type="hidden" class="form-control input-lg" id="Fecha" name="Fecha" value="<?php echo $_GET["Fecha"];?>">
<input type="hidden" class="form-control input-lg" id="saldoInicial" name="saldoInicial" value="<?php echo $saldofinalLD;?>">
<input type="hidden" class="form-control input-lg" id="saldoEstado" name="saldoEstado" value="<?php echo $saldofinalEC;?>">



            </div>


          </div>
          <!--*****************cierra input de RNC de EMPRESA USUARIO************************* -->
            

        
         
          
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

       
        <button type="submit" class="btn btn-primary">Guardar</button>

      </div>

      <?php 
      $crearDisponibilidad = new ControladorBanco();
      $crearDisponibilidad -> ctrCrearDisponibilidad();
      


       ?>
    
    </form>

  









</div><!--= cierre box-body===-->

</div>
</div>
 <div class="col-xs-6">

   <div class="box box-success">

            <div class="box-header with-border">

             
                

                  <h2>Pagos y Depositos en Transitos</h2>
                  <br>
              <br>

             

      <table class="table table-bordered table-striped dt-responsive disponibilidad" width="100%">
        <thead>
          
          <tr>
                <th style="background: #8BCBE7; width: 10px">Año/Mes</th>
                <th style="background: #8BCBE7; width: 10px">Día</th>
                <th style="background: #8BCBE7; width: 10px">Nombre</th>
                <th style="background: #8BCBE7; width: 10px">Debito</th>
                <th style="background: #8BCBE7; width: 10px">Credito</th>
               
               

          </tr>
          


      </thead>
        <tbody>
<?php 
$sumadebito = 0;
$sumacredito = 0;
if(isset($_GET["Banco"])){ 

    foreach ($librobanco as $key => $value){
      if($value["Fecha_AnoMes_Trans"] == $_GET["Fecha"] && $value["Estado_Banco"] == 2){

                 $sumadebito = $sumadebito + $value["debito"];
                 $sumacredito = $sumacredito + $value["credito"];

                           
                echo '<tr>
                        <td>'.$value["Fecha_AnoMes_Trans"].'</td>
                        <td>'.$value["Fecha_dia_Trans"].'</td>
                        <td>'.$value["Nombre_Empresa"].'</td>
                        <td>'.number_format($value["credito"], 2).'</td> 
                        <td>'.number_format($value["debito"], 2).'</td>';
                
                       
                   echo'</tr>';

      }elseif($value["Fecha_AnoMes_Trans"] == $_GET["Fecha"] && $value["Fecha_AnoMes_Cobro"] > $_GET["Fecha"]){
                $sumadebito = $sumadebito + $value["debito"];
                 $sumacredito = $sumacredito + $value["credito"];
                 echo '<tr>
                        <td>'.$value["Fecha_AnoMes_Trans"].'</td>
                        <td>'.$value["Fecha_dia_Trans"].'</td>
                        <td>'.$value["Nombre_Empresa"].'</td>
                        <td>'.number_format($value["credito"], 2).'</td> 
                        <td>'.number_format($value["debito"], 2).'</td>';
                
                       
                   echo'</tr>';

  }elseif($value["Fecha_AnoMes_Trans"] < $_GET["Fecha"] && $value["Estado_Banco"] == 2){
     
     $sumadebito = $sumadebito + $value["debito"];
      $sumacredito = $sumacredito + $value["credito"];

     echo '<tr>
                        <td>'.$value["Fecha_AnoMes_Trans"].'</td>
                        <td>'.$value["Fecha_dia_Trans"].'</td>
                        <td>'.$value["Nombre_Empresa"].'</td>
                        <td>'.number_format($value["credito"], 2).'</td> 
                        <td>'.number_format($value["debito"], 2).'</td>';
                
                       
                   echo'</tr>';


  }
  else{}
             



             }/* cierre de for*/


}
          
 ?>
        
        </tbody>

        <tfoot>
          <tr>
            <td style="background: #79D368"></td>
            <td style="background: #79D368"></td>
            <td style="background: #79D368">TOTAL</td>
            <td style="background: #79D368"><?php echo number_format($sumacredito, 2);?></td>
            <td style="background: #79D368"><?php echo number_format($sumadebito, 2);?></td>
            


          </tr>
          


        </tfoot>



      </table>












            </div>

  </div>

</div>





</div>



</section>
</div>
