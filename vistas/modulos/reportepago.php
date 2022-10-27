
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Recibo de Pago
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Recibo de Pago</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE VENTAS********************************* -->
      
        <div class="box-header with-border">
           <div class="form-group">

                    <div class="input-group">
                      
                       

                    <label>Seleccionar Tipo de Venta</label>


                     

                       <select type="text" class="form-control col-xs-2" id="tipoventa" name="tipoventa" required>
                        <option value="">Tipo de Venta </option>
                        <option value="VentaContado">Ventas de Contado</option>
                        <option value="VentaCredito">Ventas a Credito</option>
                         

  

                          </select>
                          

                          
                     
                  </div>
                   

              </div>

          
         
      
          
          
          
        </div>

       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR VENTAS********************************* -->

        <div class="box-body">



         


          <table class="table table-bordered table-striped dt-responsive librobanco"  width="100%">
             

            <!--*****************CABECERA TABLA  USUARIO********************************* -->
        

              
                     
            <thead>
              <tr>
                
                <th></th>
                <th> </th>
                <th></th>
                <th></th>
                <th></th>
                <th></th> 
                <th>  </th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
               
              </tr>

            
            </thead>
    
            <tbody>
 <!--*****************FILA 1  TABLA  USUARIO********************************* -->
              <?php 

              if(isset($_GET["Banco"])){

              $id = "id";
              $valorid = $_GET["Banco"];
              $Banco = ControladorBanco::ctrModalEditarBanco($id, $valorid);

             
            
              
              $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
              $valorid_grupo = $Banco["id_grupo"];
              $valorid_categoria = $Banco["id_categoria"];
              $valorid_generica = $Banco["id_generica"];
              $valorid_cuenta = $Banco["id_cuenta"];
              $valorid_banco = $_GET["Banco"];
              
              $Ordenmes = "Fecha_AnoMes_Trans";
              $Ordendia = "Fecha_dia_Trans";

              
              $librobanco = ControladorBanco::ctrMostrarLibroBanco($Rnc_Empresa_LD, $valorid_banco, $valorid_grupo, $valorid_categoria, $valorid_generica, $valorid_cuenta, $Ordenmes, $Ordendia);

              
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

                  echo' <td><button class="btn btn-success btn-xs">Conciliado</button></td>';
                } 
                  else {

                  echo' <td><button class="btn btn-primary btn-xs">Transito   </button></td>';

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
//$BorrarGastoLD = new ControladorDiario();
//$BorrarGastoLD -> ctrBorrarGastosLD();


//$BorrarIngresoLD = new ControladorDiario();
//$BorrarIngresoLD -> ctrBorrarIngresosLD();

//$BorrarAjusteLD = new ControladorDiario();
//$BorrarAjusteLD -> ctrBorrarAjusteLD();





?>



  
  