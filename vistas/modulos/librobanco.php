
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Libro Banco
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">librobanco</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">
        <br>

 <table border="0" cellspacing="4" cellpadding="10">
              
              <tbody>
                <tr>
                       <td style="padding-left: 10px">Banco &nbsp;</td>

                       <td style="padding-left: 10px"><select class="form-control pull-left col-xs-4" id="Banco" name="Banco" required>
                         


                    <?php 
                      if(isset($_GET["Banco"])){

                            $id = "id";
                            $valorid = $_GET["Banco"];
                            $Banco = ControladorBanco::ctrModalEditarBanco($id, $valorid); 
                            echo '<option value="'.$Banco["id"].'">'.$Banco["Nombre_Cuenta"].'</option>';
 


                          }else{
                            echo '<option value="">Seleccionar Banco</option>';


                          }

 

                                $Rnc_Empresa_Banco = $_SESSION["RncEmpresaUsuario"];

                                $Banco = ControladorBanco::ctrMostrarBanco($Rnc_Empresa_Banco);

                                foreach ($Banco as $key => $value){
                                  if($value["TipoCuenta"] != "ANTICIPOPARAGASTO"){ 

                                  echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';
                                  }


                            }
                            


                      ?>   

                        </select></td> </tr>   
            </tbody>
            

          </table>
                          

        
    
        <div class="box-body">


         <table border="0" cellspacing="4" cellpadding="4">
              
              <tbody>
                <tr>
                       <td>Período &nbsp;</td>
                    <td><select class="form-control pull-left col-xs-3" name="periodolibrobanco" id="periodolibrobanco">
  <?php 
if(isset($_GET["periodolibrobanco"])){
echo'<option value="'.$_GET["periodolibrobanco"].'">'.$_GET["periodolibrobanco"].'</option>';
  foreach ($_SESSION["Perido"] as $key => $value) {
    if($_GET["periodolibrobanco"] != $value) { 
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
                    <td><input type="text" maxlength="6" id="minlibrobanco" name="minlibrobanco" placeholder="AñoMes"></td>
                   
                    <td><input type="text" class="col-xs-3" maxlength="2" id="mindialibrobanco" name="mindialibrobanco" placeholder="Día"></td>
                </tr>

                <tr>
                    <td>Hasta &nbsp;</td>
                    <td><input type="text" maxlength="6" id="maxlibrobanco" name="maxlibrobanco" placeholder="AñoMes"></td>
                   
                    <td><input type="text" class="col-xs-3" maxlength="2" id="maxdialibrobanco" name="maxdialibrobanco" placeholder="Día"></td>
              </tr>


              
            </tbody>
            

          </table>
    <br>





          <table class="table table-bordered table-striped dt-responsive librobanco"  width="100%">
             

            <!--*****************CABECERA TABLA  USUARIO********************************* -->
        

              
                     
            <thead>
              <tr>
                
                <th>Extraer</th>
                <th>N Asiento</th>
                <th>Referencia</th>
                <th>NCF</th>
                <th>Año/Mes</th>
                <th>Dia</th> 
                <th>Nombre de Empresa</th>
                <th>Observacion</th>
                <th>Debito</th>
                <th>Credito</th>
                <th>Saldo</th>
                <th>Estado</th>
               
              </tr>

            
            </thead>
    
            <tbody>
 <!--*****************FILA 1  TABLA  USUARIO********************************* -->
              <?php 

              if(isset($_GET["Banco"])){

              $id = "id";
              $valorid = $_GET["Banco"];
              $Banco = ControladorBanco::ctrModalEditarBanco($id, $valorid);

              if(isset($_GET["periodolibrobanco"])){
               $periodolibrobanco = $_GET["periodolibrobanco"];
              }else{
               $periodolibrobanco = $_SESSION["Anologin"];

               }
              $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
              $valorid_grupo = $Banco["id_grupo"];
              $valorid_categoria = $Banco["id_categoria"];
              $valorid_generica = $Banco["id_generica"];
              $valorid_cuenta = $Banco["id_cuenta"];
              $valorid_banco = $_GET["Banco"];
              
              $Ordenmes = "Fecha_AnoMes_Trans";
              $Ordendia = "Fecha_dia_Trans";
             
              
              $librobanco = ControladorBanco::ctrMostrarReporteLibroBanco($Rnc_Empresa_LD, $valorid_banco, $valorid_grupo, $valorid_categoria, $valorid_generica, $valorid_cuenta, $Ordenmes, $Ordendia, $periodolibrobanco);

              
              $resultado = $Banco["saldoInicial"];

               echo '<tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>SALDO INICIAL</td>  
                        <td></td> 
                        <td></td>
                        <td>'.number_format($resultado, 2).'</td>
                        <td></td>
                      </tr>';

               


               foreach ($librobanco as $key => $value){

                 $resultado = $resultado + $value["debito"] - $value["credito"];
                
                           
                echo '<tr>
                        <td>'.$value["Extraer_NAsiento"].'</td>
                        <td>'.$value["NAsiento"].'</td>
                        <td>'.$value["referencia"].'</td>
                        <td>'.$value["NCF"].'</td>
                        <td>'.$value["Fecha_AnoMes_Trans"].'</td>
                        <td>'.$value["Fecha_dia_Trans"].'</td>
                        <td>'.$value["Nombre_Empresa"].'</td>
                        <td>'.$value["ObservacionesLD"].'</td>  
                        <td>'.number_format($value["debito"], 2).'</td> 
                        <td>'.number_format($value["credito"], 2).'</td>
                        <td>'.number_format($resultado, 2).'</td>';
                        if($value["Estado_Banco"] == 1){

                  echo'<td><button class="btn btn-success btn-xs LBdesconcilicar" id= "'.$value["id"].'" Estado="2" Banco= "'.$_GET["Banco"].'">Conciliado</button></td>';
                } 
                  else {

                  echo' <td><button class="btn btn-primary btn-xs">Transito</button></td>';

                }
                       

                      



                      echo'</tr>';

               }


             }/*CIERRE DE IF ISSET*/

               


               ?>


              
              <!--***************** CIERRE FILA 1  TABLA  USUARIO********************************* -->

            

              

            </tbody>
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->
            
            
          </table>
        
        <!--*****************CIERRE DE TABLA USUARIO********************************* -->

        </div>        

        
      </div>
      

    </section>
 
  </div>

<!--************************************************
                      MODAL AGREGAR Categoria
  ******************************************************* -->
  <!-- Modal -->
<div id="modalDescarga606" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">DESCARGA TXT </h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="text" class="form-control input-lg" id="RncEmpresa606Rango" name="RncEmpresa606Rango" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              
            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
            

         <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                      <select type="text" class="form-control" id="Periodoreporte606" name="Periodoreporte606" required>
                        <option value="">Seleccionar Periodo</option>

                        <?php  
                         

                        $Rnc_Empresa_606 = $_SESSION["RncEmpresaUsuario"];

                         $Periodo606 = Controlador606::ctrMostrarPeriodo606($Rnc_Empresa_606);

                       
                         foreach ($Periodo606 as $key => $value){

                          echo '<option value="'.$value["Fecha_AnoMes_606"].'">'.$value["Fecha_AnoMes_606"].'</option>';



                         }
                    

                         ?>

                      </select>   

                    </div>
                   

                  </div>

          
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">
       

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

      
        <a class="btn btn-primary pull-right" role="button" id="descargartxt606">Descargar TXT 606</a>
        <a class="btn btn-warning pull-left" role="button" id="numeraciontxt606">Numeracion TXT 606</a>


        
        
       
      </div>





      
      
      
      
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>

</div>
<?php 
$BorrarGastoLD = new ControladorDiario();
$BorrarGastoLD -> ctrBorrarGastosLD();


$BorrarIngresoLD = new ControladorDiario();
$BorrarIngresoLD -> ctrBorrarIngresosLD();

$BorrarAjusteLD = new ControladorDiario();
$BorrarAjusteLD -> ctrBorrarAjusteLD();





?>



  
  