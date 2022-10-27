
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-comments-o fa-lg" style="padding-left:50px"></i>
        Comentarios
      </h1>
     

          <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarComentario"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Crear

          </button>
          <?php
                $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                
                $Tipo_NCF = "SMS";

                $respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);


               if($respuesta == false){
                   echo'<button class="btn btn-warning pull-right"  data-toggle="modal" data-target="#modalCorrelativoNoFiscal"><i class="fa fa-pencil"></i></button>
                  ';



                }

          


               ?>
          
          
          
    </section>


    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE VENTAS********************************* -->
      
       

       
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

               

          <table class="table table-bordered table-striped dt-responsive tablaComentarios"  width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->
        

              
                     
            <thead>
              <tr>
                <th>#</th>
                <th>N° Comentario</th>
                <th>Usuario Creador</th>
                <th>Usuario Dirigido</th>
                <th>Tipo</th>
                <th>Asunto</th>
                <th>Año/Mes</th> 
                <th>Dia</th>               
                <th>Estado</th>  
                <th></th> 
              </tr>

              
            </thead>
             
            
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>

             

              <!--*****************FILA 1  TABLA  USUARIO********************************* -->
              <?php 
              
              $Orden = "id";
              $NReporte = "Null";



              $Rnc_Empresa_Comentario = $_SESSION["RncEmpresaUsuario"];

              $Comentario = ControladorComentarios::ctrMostrarComentarios($Rnc_Empresa_Comentario, $Orden, $NReporte);

          foreach ($Comentario as $key => $value){
                echo '<tr>
              <td style="width: 5px">'.($key+1).'</td>
              <td style="width: 15px">'.$value["NReporte"].'</td>
              <td style="width: 15px">'.$value["Nombre_Usuario"].'</td>
              <td>'.$value["Nombre_Usuario_Dirigito"].'</td>
              <td>'.$value["TipoComentario"].'</td>
              <td>'.$value["Asunto"].'</td>
              <td>'.$value["FechaAnoMes"].'</td>
              <td>'.$value["Fechadia"].'</td>';
              
               if($value["Estado"] == 1){

                  echo' <td><button class="btn btn-warning btn-xs">En Proceso</button></td>';
                } 
                else {

                  echo' <td><button class="btn btn-danger btn-xs">Cerrado</button></td>';

                }
                           
                            
               echo'
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning btn-xs btnComentarios" Rnc_Empresa_Comentario="'.$Rnc_Empresa_Comentario.'" NReporte="'.$value["NReporte"].'" Nombre_Usuario="'.$value["Nombre_Usuario"].'" NombreDirigito="'.$value["Nombre_Usuario_Dirigito"].'" fechames="'.$value["FechaAnoMes"].'" fechadia="'.$value["Fechadia"].'" tipo="'.$value["TipoComentario"].'" AsuntoComentario="'.$value["Asunto"].'" data-toggle="modal" data-target="#modalTodocomentario"><i class="glyphicon glyphicon-search"></i></button>
                    
                                       

                  </div>
                  
              </td>          
            </tr>';



               }

     

               ?>


            </tbody>
           
            
          </table>
        
       

        </div>        

        
      </div>
      

    </section>
 
  </div>

<!--************************************************
                      MODAL AGREGAR USUARIO
  ******************************************************* -->
  <!-- Modal -->
<div id="modalAgregarComentario" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Comentarios</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA USUARIO********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaComentario" name="RncEmpresaComentario" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="NombreEmpresa" name="NombreEmpresa" value="<?php echo $_SESSION["NombreEmpresa"];?>" readonly>
               <input type="hidden" class="form-control input-lg" id="CorreoCreador" name="CorreoCreador" value="<?php echo  $_SESSION["Correousuario"] ;?>" readonly>

            </div>
            <input type="hidden" class="form-control input-lg" id="idusuariocreador" name="idusuariocreador" value="<?php echo $_SESSION["id"];?>" readonly>

            </div>



          </div>
          <!--*****************cierra input de RNC de EMPRESA USUARIO************************* -->
            

         <!--*****************input de Nombre de Usuario********************** -->

          <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" name="NombreCreador" value="<?php echo $_SESSION["Nombre"];?>" required Readonly>

            </div>

          </div>
        <div class="form-group col-xs-6">
              
            <div class="input-group">
                    
              <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                      <?php 

                      $Rnc_Empresa_Diario = $_SESSION["RncEmpresaUsuario"];
                      $tipocod = "SMS";


                      $codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
               
                        if(!$codigo){

                               echo '<script>
                          swal({

                            type: "error",
                            title: "¡DEBE INICIALIZAR EL CODIGO DE ASIENTO DIARIO EN EL LAPIZ COLOR ANARANJADO QUE ESTA EN LA PARTE SUPERIOR DEL FORMULARIO!",
                            showConfirmButton: false,
                            timer: 8000
                            });

                          </script>';   



                      } else{


                       foreach ($codigo as $key => $value) {

                            
                          }

                      $N = $value["NCF_Cons"]+1;
                      $NAsiento = "SMS".$N;

                      

                      echo ' <input type="hidden" class="form-control" id="CodAsiento" name="CodAsiento" value="'.$N.'" readonly>
                      <input type="text" class="form-control" id="NAsiento" name="NAsiento" value="'.$NAsiento.'" readonly>';
                      }
                    ?>

                    </div>
                   

                  </div>
                     
            
          <br>
          
          <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control Fecha">

                     <label>Año/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="FechaComentariomes" name="FechaComentariomes"required autofocus>

                     
                      <label>Dìa</label>
                      <input type="text" class="Fechadia" maxlength="2" id="FechaComentariodia" name="FechaComentariodia" required>


                    </div>
                   

                  </div>
                  </div>
            <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <select class="form-control input-lg" name="UsuarioDirigido" required>
                <option value="">Usuario Dirigido</option>
                <option value="0">Ninguno</option>
                <?php 

             $RncEmpresaUsuario = $_SESSION["RncEmpresaUsuario"];
             $taRncEmpresaUsuario = "Rnc_Empresa_Usuario";

              
              $usuarios = ControladorUsuarios::ctrMostrarUsuarios($taRncEmpresaUsuario, $RncEmpresaUsuario);

            foreach ($usuarios as $key => $value){
                 if($value["id"] != $_SESSION["id"] && $value["Perfil"] != "Programador"){


                 echo '<option value="'.$value["id"].'">'.$value["Nombre"].'</option>';

                  }elseif($value["id"] != $_SESSION["id"] && $value["Perfil"] == "Programador"){

                     echo '<option value="'.$value["id"].'">SOPORTE TECNICO</option>';

                  }
                
                }
                          




                 ?>
                
              </select>

            </div>

          </div>

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
              <select class="form-control input-lg" name="TipoComentario" required>
                <option value="">Tipo de Comentario</option>
                <option value="DGII">Impuesto DGII</option>
                <option value="Contable">Contable</option>
                <option value="Informes">Informe</option>
                
              </select>

            </div>

          </div>
           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>
              <input type="text" class="form-control input-lg" name="Asunto" maxlength="100" placeholder="Asunto" required>

            </div>

          </div>

             <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>
              <textarea rows="8" cols="100" maxlength="1500" id = "Comentario" name="Comentario" onkeyup="check(event);">Escribe aquí tus comentarios </textarea>
            </div>

          </div>
          
       

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Comentarios</button>

      </div>

      <?php 
      $crearComentario = new ControladorComentarios();
      $crearComentario -> ctrCrearComentario();
      


       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>

<div id="modalCorrelativoNoFiscal" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Editar Correlativos</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA USUARIO********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaCorrelativosNo" name="RncEmpresaCorrelativosNo" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="UsuarioLoguedo" name="UsuarioLoguedo" value="<?php echo $_SESSION["Nombre"];?>" readonly>

            </div>


          </div>
          <!--*****************cierra input de RNC de EMPRESA USUARIO************************* -->
           <!--*****************id correlativo********************** -->

         

             <div class="form-group col-xs-6">
               <label>Tipo de NCF</label>


                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" id="Tipo_NCF" name="Tipo_NCF" maxlength="3" Value="SMS" readonly>

                  </div>

                </div>


          
          <!--*****************cierra input de RNC de EMPRESA USUARIO************************* -->
           <div class="form-group col-xs-6">
               <label>Correlativo de Factura No Fiscal</label>


                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" id="NCF_Cons" name="NCF_Cons" maxlength="10">

                  </div>

                </div>

             
              
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Modificar Correlativos</button>

      </div>

      <?php 
      $editarCorrelativos = new ControladorCorrelativos();
      $editarCorrelativos -> ctreditarCorrelativosNoFiscal();
      


       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>
<div id="modalTodocomentario" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">
    
    <div class="modal-content">

      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Correo</h4>
      
      </div>
      <form role="form" method="post" enctype="multipart/form-data">
      
     
      

      <div class="modal-body">

        <div class="box-body">

        

          <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i>&nbsp;DE:</span>
              <input type="text" class="form-control" id ="NombreCreador" name="NombreCreador" required Readonly>

            </div>

          </div>
           <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i>&nbsp;PARA:</span>
              <input type="text" class="form-control" id ="NombreDirigido" name="NombreDirigido"  required Readonly>

            </div>

          </div>
           <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control Fecha">

                     <label>Año/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="FechaMes" required readonly>

                     
                      <label>Dìa</label>
                      <input type="text" class="Fechadia" maxlength="2" id="FechaDia" required readonly>


                    </div>
                   

                  </div>
            </div>
            
        <div class="form-group col-xs-6">
              
            <div class="input-group">
                    
              <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                      

                     
                      <input type="text" class="form-control" id="N" name="N" readonly>
                      
                    

                    </div>
                   

                  </div>
                     
            

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
             <input type="text" class="form-control" id="tipoC" readonly>

            </div>

          </div>
          
          
        <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>
              <input type="text" class="form-control input-lg" id="AsuntoComentario" name="AsuntoComentario" readonly>

            </div>

          </div>
          
           <table class="table table-bordered table-striped dt-responsive" width="100%">
            <thead> 
              <tr>
                <th>De</th>
                <th>Para</th>
                <th>Año/Mes</th>
                <th>Día</th>
                <th>Mensaje</th>
               
               
                
             </tr>


            </thead>

            <tbody id="VerDiscucion">
              

            </tbody>
            

          </table>

          
          
          
       
        </div>
      
        
      </div>
      
      <div class="modal-footer">

        <a href="comentarios" type="button" class="btn btn-default pull-left">Salir</a>

        

      </div>

      
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>