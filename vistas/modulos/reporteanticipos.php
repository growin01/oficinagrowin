
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        REPORTE ANTICIPOS
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">reporteanticipos</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE VENTAS********************************* -->
      
        <div class="box-header with-border">
           <div class="form-group">

                    <div class="input-group">
                      
                       

                    <label>Fondo Anticipos</label>


                     

                       <select type="text" class="form-control col-xs-2" id="FondoAnticipos" name="FondoAnticipos" required>
                         


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
                                  if($value["TipoCuenta"] == "ANTICIPOPARAGASTO" || $value["TipoCuenta"] == "CAJA CHICA"){ 

                                  echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';
                                  }


                            }
                            


                      ?>   

                          </select>
                          

                          
                     
                  </div>
                   

              </div>

          
         
      
          
          
          
        </div>

       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR VENTAS********************************* -->

        <div class="box-body">



          <!--*****************TABLA  USUARIO********************************* -->
          <table border="0" cellspacing="5" cellpadding="5">
              
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

                  echo'<td><button class="btn btn-success btn-xs">Rendido</button></td><td></td>';

                } else{
                   echo'<td><button class="btn btn-primary btn-xs">Por Rendir</button></td>';
                   if($value["Extraer_NAsiento"] == "DOA"){
                    echo'<td>
                  <div class="btn-group">
                    <button class="btn btn-warning btnEditarOtorgarAnticipo btn-xs" Rnc_Empresa_LD="'.$value["Rnc_Empresa_LD"].'" Extraer_NAsiento = "'.$value["Extraer_NAsiento"].'" NAsiento="'.$value["NAsiento"].'" data-toggle="modal" data-target="#modalEditarOtorgarAnticipos"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btnOtorgarAnticipo btn-xs" id_registro="'.$value["id_registro"].'" Rnc_Empresa_LD="'.$value["Rnc_Empresa_LD"].'" Rnc_Factura="'.$value["Rnc_Factura"].'" NAsiento="'.$value["NAsiento"].'"><i class="fa fa-times"></i></button>
                                       

                  </div>
                  
                </td>  ';


                }else{ 
                   echo'<td></td>';
                 }
               
                 

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
<div id="modalEditarOtorgarAnticipos" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Editar Otorgar Anticipos</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <div class="input-group">
            <input type="hidden" class="form-control input-lg" id="RncEmpresanticipo" name="RncEmpresanticipo" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
            <input type="hidden" class="form-control input-lg" id="UsuarioLogueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Usuario"];?>" readonly>
            <input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
            <input type="hidden" class="form-control" id="Banco" name="Banco" value="<?php echo $_SESSION["Banco"]?>">
            <input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">
            <input type="hidden" class="form-control input-lg" id="ModuloSuplidor" name="ModuloSuplidor" value="usuarios" readonly>

          </div>

    <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

      <h4 style="text-align: center;"><b>Datos del Fondo a Otorgar</b></h4>

    </div>

    <div class="form-group">

      <div class="input-group">
          
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

            <div class="input-group form-control FechaInicio">

              <label>Año/Mes</label>
                    
                <input type="text" maxlength="6" id="FechamesAnticipo" name="FechamesAnticipo" required>

              <label>Dìa</label>
                      
                <input type="text" maxlength="2" id="FechadiaAnticipo" name="FechadiaAnticipo" required>


              </div>
          
        </div>

      </div>

             
      <div class="form-group col-xs-4">

        <div class="input-group">
            
          <select class="form-control" id="plancuentabanco" name="plancuentabanco" required readonly>
            
           


           <?php  
           echo'<option value="'.$Banco["id"].'">'.$Banco["Nombre_Cuenta"].'</option>';
              
          ?>

             </select>     
                      
            </div>
        </div>

        <div class="form-group col-xs-4">

        <div class="input-group">
          
          <input type="text" class="form-control" id="MontoAnticipo" name="MontoAnticipo" required>
            
         
            </div>
        </div>

        <div class="form-group col-xs-4">

        <div class="input-group">
          
        <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                     
          <input type="hidden" class="form-control" id="idOtorgarAnticipa" name="EditaridOtorgarAnticipa"  readonly>
          <input type="text" class="form-control" id="NAsiento" name="NAsiento"  readonly>
                    
         
            </div>
        </div>



    <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

        <h4 style="text-align: center;"><b>Responsable</b></h4>

    </div>

      <div class="form-group col-xs-6">

            <div class="input-group">
              
                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                     <div class="input-group form-control TipoSuplidor">

                   
                <input type="radio" Class="Juridico" name="Tipo_Suplidor" id="juridico" value="1" required> Jurídico

                    
                <input type="radio" Class="Fisico" name="Tipo_Suplidor" id="fisico" value="2" required> Fisico

                   
                    </div>
                    
            </div>

          </div>


            <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text" class="form-control input-RNC" maxlength="11" id="EditarRncAnticipo" name="RncAnticipo" required>

            </div>

          </div>


          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" id="Nombre_Cuenta" name="Nombre_Cuenta" required>

            </div>

          </div>

    <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

        <h4 style="text-align: center;"><b>Datos Bancarios</b></h4>

    </div>
  <div class="col-xs-12">
                     
      <div class="form-group col-xs-6">
        
      
        
    <input type="text" class="form-control col-xs-6" maxlength="6" id="Referencia" name="Referencia" required>

        </div>
        
      <div class="col-xs-5">
        <select type="text" class="form-control" id="agregarBanco" name="agregarBanco" required>
          <option value="">Selecionar Banco</option>
          <?php 
        
        $Rnc_Empresa_Banco = $_SESSION["RncEmpresaUsuario"];

        $Banco = ControladorBanco::ctrMostrarBanco($Rnc_Empresa_Banco);

          
        foreach ($Banco as $key => $value){
          if($value["TipoCuenta"] != "ANTICIPOPARAGASTO")

           echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';


            }
        
       

       ?>


          
          </select>
         </div>
        
                            
      </div>

 <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>
              <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Descripcion" required>

            </div>

          </div>




       </div> 
      </div>
      
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Modificar Otorgamiento</button>

      </div>
      <?php 
      

      $OtorgarAnticipo = new ControladorAnticipo();
      $OtorgarAnticipo -> ctrEditarOtorgarAnticipo();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR categoria
  ******************************************************* -->



  
   <?php 

      $OtorgarAnticipo = new ControladorAnticipo();
      $OtorgarAnticipo -> ctrEliminarOtorgarAnticipo();
      
 

   ?>