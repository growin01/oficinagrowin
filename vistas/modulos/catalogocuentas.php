
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CATÁLOGO DE CUENTAS
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">CATÁLOGO DE CUENTAS</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE AGREGAR USUARIO********************************* -->

        <div class="box-header with-border">

          <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCuenta">Agregar Genérica


          </button>

          <button class="btn btn-warning" data-toggle="modal" data-target="#modalsubCuenta">Agregar Cuenta


          </button>

         
           <?php   $tabla = "generica_empresas";

        $taRncEmpresacuentas = "Rnc_Empresa_cuentas";
        $RncEmpresacuentas = $_SESSION["RncEmpresaUsuario"];

        

        $Repetida = ModeloContabilidad::mdlrepetidacuentademo($tabla, $taRncEmpresacuentas, $RncEmpresacuentas);
        if(!$Repetida["Rnc_Empresa_cuentas"]){
           echo'<button class="btn btn-primary" data-toggle="modal" data-target="#modalplandemo">Agregar Demo GROWIN</button>';


        }

        ?>


           
          
        </div>
       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR USUARIO********************************* -->



        <div class="box-body">

          <table class="table table-bordered table-striped dt-responsive tablaplandecuenta" width="60%">


            <thead>
              <tr>
                
              <th style="width:3px">Grupo</th>
              <th style="width:3px">Categoria</th>
              <th style="width:5px">Genérica</th>
              <th style="width:5px">Cuenta</th>
              <th>Nombre de Cuenta</th>
              <th>Acción</th>
              </tr>
            
              <tr>
                
              <th style="width:3px">Grupo</th>
              <th style="width:3px">Categoria</th>
              <th style="width:5px">Genérica</th>
              <th style="width:5px">Cuenta</th>
              <th>Nombre de Cuenta</th>
              <th>Acción</th>
              

              </tr>
              
            </thead>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>
              
              <?php


              $tabla = "grupo_empresa"; 
              
              
              $respuesta = ControladorContabilidad::ctrgrupoempresas($tabla);

             
            for ($i=1; $i <=7 ; $i++) {
                  
                switch ($i) {
                  case '1':
                    echo '<tr>
                        <td>1</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td>ACTIVOS</td>
                         <td></td> 
                        </tr>';
                        break;
                  case '2':
                    echo '<tr>
                        <td>2</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td>PASIVO</td>
                         <td></td>  
                        </tr>';
                        break;
                    case '3':
                    echo '<tr>
                        <td>3</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td>PATRIMONIO</td>
                         <td></td>  
                        </tr>';
                        break;
                      case '4':
                    echo '<tr>
                        <td>4</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td>INGRESOS</td>
                         <td></td>  
                        </tr>';
                        break;
                      case '5':
                    echo '<tr>
                        <td>5</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td>COSTOS</td>
                        <td></td> 
                        </tr>';
                        break;
                      case '6':
                    echo '<tr>
                        <td>6</td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td>GASTOS</td> 
                        <td></td>
                        </tr>';
                        break;

              
                  }/*cierre swich*/


                 
                    foreach ($respuesta as $key => $value) {

                      if($value["id_grupo"] == $i){
                         echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$value["id_categoria"].'</td> 
                        <td></td> 
                        <td></td>  
                        <td>'.$value["Nombre_Categoria"].'</td>
                        <td></td>
                        </tr>';

                        $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                        $grupo = $i;
                        $categorias = $value["id_categoria"];

                    $generica = ControladorContabilidad::ctrplandecuenta($Rnc_Empresa_Cuentas, $grupo, $categorias);

                      foreach ($generica  as $key => $gene){
                         echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$value["id_categoria"].'</td> 
                        <td>'.$gene["id_generica"].'</td> 
                        <td></td> 
                        <td>'.$gene["Nombre_Cuenta"].'</td>';

                            if ($gene["Estado"] == 1) {
                              echo'<td><div class="btn-group">
                                <button class="btn btn-danger">FIJO</button></div></tr>';
                          
                            } else{
                              echo '<td><div class="btn-group">
                                <button class="btn btn-warning btneditarCuenta" Rnc_Empresa_Cuentas="'.$Rnc_Empresa_Cuentas.'" idgenerica= "'.$gene["id"].'" data-toggle="modal" data-target="#modaleditarCuenta"><i class="fa fa-pencil"></i></button></div></td> 
                                </tr>';}

                      $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                      $id_grupo = $i;
                      $id_categoria = $value["id_categoria"];
                      $id_generica = $gene["id_generica"];
                      $subgenerica = ControladorContabilidad::ctrplandesubcuenta($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria, $id_generica);

                      foreach ($subgenerica  as $key => $subgene){
                         echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$value["id_categoria"].'</td> 
                        <td>'.$gene["id_generica"].'</td> 
                        <td>'.$subgene["id_subgenerica"].'</td> 
                        <td>'.$subgene["Nombre_subCuenta"].'</td>';

                        if ($subgene["Estado"] == 1) {
                          echo '<td><div class="btn-group">
                                <button class="btn btn-danger">FIJO</button></td></div></tr>';
                          # code...
                        } else {
                         echo '<td><div class="btn-group">
                                <button class="btn btn-primary btneditarSubCuenta" Rnc_Empresa_Cuentas="'.$Rnc_Empresa_Cuentas.'" idcuenta= "'.$subgene["id"].'" data-toggle="modal" data-target="#modaleditarsubCuenta"><i class="fa fa-pencil"></i></button></div></td>
                        
                        </tr>';
                        }
                         }
  

                      
                       }/*CIERRE FOR GNERICA*/
                      
                      }/*cierre if*/

                  }/*cierre foreach*/
 
                  
              }/*cierre for $i*/
              
             
              
               ?>

          
            </tbody>
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->

            
          </table>
        
        
       

        </div>        

        
      </div>
      

    </section>
 
  </div>
 <!--************************************************
                      MODAL AGREGAR PRODUCTOS
  ******************************************************* -->
  <!-- Modal -->
<div id="modalplandemo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Catálogo de Cuentas Growin</h4>
      
      </div>
      

      <div class="modal-body">
         <h3 style="justify-content: center;">Este Catálogo de Cuenta Sugerido por el Sistema Empresarial GROWIN, le permite al usuario personalizar de acuerdo a su actividad económica su catálogo de Cuenta, Modificando los niveles GENERICA Y CUENTAS</h3>

        <div class="box-body">

         

          <!--*****************input de RNC de EMPRESA Productos********************** -->

          <div class="form-group">


            <div class="input-group">
              <input type="text" class="form-control input-lg" id="RncEmpresademo" name="RncEmpresademo" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="Usuariocuentas" name="Usuariocuentas" value="<?php echo $_SESSION["Usuario"];?>" readonly>


            </div>


          </div>
       
        
        
      </div>
       </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar</button>

      </div>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->
    <?php 
      $Crearplandemo = new ControladorContabilidad();
      $Crearplandemo -> ctrCrearplandemo();




     ?>

    </div>

  </div>
</div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR USUARIO
  ******************************************************* -->
  <!--************************************************
                      MODAL AGREGAR PRODUCTOS
  ******************************************************* -->
  <!-- Modal -->
<div id="modalsubCuenta" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Cuenta</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA Productos********************** -->

          <div class="form-group">

            <div class="input-group">
              <input type="text" class="form-control input-lg" id="RncEmpresacuentas" name="RncEmpresacuentas" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="Usuariocuentas" name="Usuariocuentas" value="<?php echo $_SESSION["Usuario"];?>" readonly>


            </div>


          </div>
          <!--*****************cierra input de RNC de EMPRESA Productos************************* -->
          <!--*****************SELECTOR DE GRUPO********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <select class="form-control input-lg" id="gruposubcuenta" name="gruposubcuenta" required>
                <option value="">Selecionar Grupo</option>
                <option value="1">1_ACTIVO</option>
                <option value="2">2_PASIVO</option>
                <option value="3">3_PATRIMONIO</option>
                <option value="4">4_INGRESOS</option>
                <option value="5">5_COSTOS</option>
                <option value="6">6_GASTOS</option>
                
                
              </select>

            </div>

          </div>
        <!--*****************cierra SELECTOR DE PEFIL************************* -->
         <!--*****************SELECTOR DE GRUPO********************** -->

          <div class="form-group" id = "subcuenta">

           
          </div>
           <div class="form-group" id = "subgenerica">

           
          </div>
        

            <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-code"></i></span>
              <input type="text" class="form-control input-lg" id="numerosubgenerico" name="numerosubgenerico" placeholder="Código de sub Cuenta" readonly>

            </div>

          </div>
            

      <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" style="text-transform:lowercase;" class="form-control input-lg" maxlength="35" name="nuevasubcuenta"  onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Ingresar Nombre de la sub cuenta" required>

            </div>

          </div>
        

         
      
        
      </div>
       </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar</button>

      </div>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->
    <?php 
      $crearsubcuenta = new ControladorContabilidad();
      $crearsubcuenta -> ctrCrearsubCuenta();




     ?>

    </div>

  </div>
</div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR USUARIO
  ******************************************************* -->
<!--************************************************
                      MODAL AGREGAR PRODUCTOS
  ******************************************************* -->
  <!-- Modal -->
<div id="modalAgregarCuenta" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Genérica</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA Productos********************** -->

          <div class="form-group">

            <div class="input-group">
              <input type="text" class="form-control input-lg" id="RncEmpresacuentas" name="RncEmpresacuentas" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="Usuariocuentas" name="Usuariocuentas" value="<?php echo $_SESSION["Usuario"];?>" readonly>


            </div>


          </div>
          <!--*****************cierra input de RNC de EMPRESA Productos************************* -->
          <!--*****************SELECTOR DE GRUPO********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <select class="form-control input-lg" id="grupocuenta" name="grupocuenta" required>
                <option value="">Selecionar Grupo</option>
                <option value="1">1_ACTIVO</option>
                <option value="2">2_PASIVO</option>
                <option value="3">3_PATRIMONIO</option>
                <option value="4">4_INGRESOS</option>
                <option value="5">5_COSTOS</option>
                <option value="6">6_GASTOS</option>
                
                
              </select>

            </div>

          </div>
        <!--*****************cierra SELECTOR DE PEFIL************************* -->
         <!--*****************SELECTOR DE GRUPO********************** -->

          <div class="form-group" id = "cuenta">

           
          </div>

           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-code"></i></span>
              <input type="text" class="form-control input-lg" id="numerogenerico" name="numerogenerico" placeholder="Código de Cuenta" readonly>

            </div>

          </div>
            

      <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" class="form-control input-lg" style="text-transform:uppercase;" maxlength="35" name="nuevacuentagenerica" placeholder="Ingresar Nombre de la cuenta" onkeyup="javascript:this.value=this.value.toUpperCase();" required>


            </div>

          </div>
        
      
        
      </div>
       </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar</button>

      </div>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->
    <?php 
      $crearcuenta = new ControladorContabilidad();
      $crearcuenta -> ctrCrearCuenta();




     ?>

    </div>

  </div>
</div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR USUARIO
  ******************************************************* -->
<!--************************************************
                      MODAL AGREGAR PRODUCTOS
  ******************************************************* -->
  <!-- Modal -->
<div id="modaleditarCuenta" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Editar Genérica</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA Productos********************** -->

          <div class="form-group">

            <div class="input-group">
              <input type="text" class="form-control input-lg" id="idcuenta" name="idcuenta" readonly>

              <input type="hidden" class="form-control input-lg" id="Editar-RncEmpresacuentas" name="Editar-RncEmpresacuentas" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="Editar-Usuariocuentas" name="Usuariocuentas" value="<?php echo $_SESSION["Usuario"];?>" readonly>



            </div>


          </div>
          <!--*****************cierra input de RNC de EMPRESA Productos************************* -->
          <!--*****************SELECTOR DE GRUPO********************** -->

          <div class="form-group" id = "Editargrupo">

            
          </div>
        <!--*****************cierra SELECTOR DE PEFIL************************* -->
         <!--*****************SELECTOR DE GRUPO********************** -->

          <div class="form-group" id = "Editarcuenta">

           
          </div>

           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-code"></i></span>
              <input type="text" class="form-control input-lg" id="Editar-numerogenerico" name="Editar-numerogenerico" readonly>

            </div>

          </div>
            

      <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" class="form-control input-lg" style="text-transform:uppercase;" maxlength="35"  id="Editar-nuevacuentagenerica" name="Editar-nuevacuentagenerica" onkeyup="javascript:this.value=this.value.toUpperCase();" required>


            </div>

          </div>
        
      
        
      </div>
       </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar</button>

      </div>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->
    <?php 
      $Editarcuenta = new ControladorContabilidad();
      $Editarcuenta -> ctrEditarCuentaCreada();




     ?>

    </div>

  </div>
</div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR USUARIO
  ******************************************************* -->

   <!--************************************************
                      MODAL AGREGAR PRODUCTOS
  ******************************************************* -->
  <!-- Modal -->
<div id="modaleditarsubCuenta" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">EDITAR Cuenta</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA Productos********************** -->

          <div class="form-group">

            <div class="input-group">
              <input type="text" class="form-control input-lg" id="idsubcuenta" name="idsubcuenta"  readonly>
              <input type="text" class="form-control input-lg" id="RncEmpresacuentas" name="RncEmpresacuentas" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="Usuariocuentas" name="Usuariocuentas" value="<?php echo $_SESSION["Usuario"];?>" readonly>


            </div>


          </div>
          <!--*****************cierra input de RNC de EMPRESA Productos************************* -->
          <!--*****************SELECTOR DE GRUPO********************** -->

          <div class="form-group" id="Editarsubgrupo">

          

          </div>
           <div class="form-group" id = "Editarsubcuenta">

           
          </div>
        <!--*****************cierra SELECTOR DE PEFIL************************* -->
         <!--*****************SELECTOR DE GRUPO********************** -->

          <div class="form-group" id = "Editarsubgenerica">

           
          </div>
          
            <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-code"></i></span>
              <input type="text" class="form-control input-lg" id="Editar-numerosubgenerico" name="Editar-numerosubgenerico" placeholder="Código de sub Cuenta" readonly>

            </div>

          </div>
            

      <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" style="text-transform:lowercase;" class="form-control input-lg" maxlength="35" id="Editar-nuevasubcuenta" name="Editar-nuevasubcuenta"  onkeyup="javascript:this.value=this.value.toUpperCase();" required>

            </div>

          </div>
        

      
        
      </div>
       </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar</button>

      </div>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->
    <?php 
      $Editarsubcuenta = new ControladorContabilidad();
      $Editarsubcuenta -> ctrEditarsubCuenta();




     ?>

    </div>

  </div>
</div>



<!--************************************************
                      MODAL AGREGAR PRODUCTOS
  ******************************************************* -->
  <!-- Modal -->
<div id="modalAgregarCuentaMasiva" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">



        <div class="box-body">

      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Genérica Masivamente</h4>
      
      </div>
      
 <div class="modal-body">
         <h3 style="justify-content: center;">Se va Agregar una cuenta Masivamente a todas la empresas con contabilidad, se dejara fija, se modifica la tabla subgenerica_empresas !!ATENTOS!!</h3>
         </div>
      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA Productos********************** -->

          <div class="form-group">

            <div class="input-group">
              <input type="text" class="form-control input-lg" id="RncEmpresacuentas" name="RncEmpresacuentas" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="Usuariocuentas" name="Usuariocuentas" value="<?php echo $_SESSION["Usuario"];?>" readonly>


            </div>


          </div>
          <!--*****************cierra input de RNC de EMPRESA Productos************************* -->
          <!--*****************SELECTOR DE GRUPO********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <select class="form-control input-lg" id="grupocuenta" name="grupocuenta" required>
                <option value="">Selecionar Grupo</option>
                <option value="1">1_ACTIVO</option>
                <option value="2">2_PASIVO</option>
                <option value="3">3_PATRIMONIO</option>
                <option value="4">4_INGRESOS</option>
                <option value="5">5_COSTOS</option>
                <option value="6">6_GASTOS</option>
                
                
              </select>

            </div>

          </div>
<div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" class="form-control input-lg" style="text-transform:uppercase;" maxlength="35" name="id_categoria" placeholder="id categoria" onkeyup="javascript:this.value=this.value.toUpperCase();" required>


            </div>

    </div>

<div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" class="form-control input-lg" style="text-transform:uppercase;" maxlength="35" name="id_genericaMasiva" placeholder="id generica" onkeyup="javascript:this.value=this.value.toUpperCase();" required>


            </div>

  </div>
        
        
<div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" class="form-control input-lg" style="text-transform:uppercase;" maxlength="35" name="nuevacuentagenerica" placeholder="Ingresar Nombre de la cuenta" onkeyup="javascript:this.value=this.value.toUpperCase();" required>


            </div>

    </div>
        
          

            

     
        
      </div>
       </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar</button>

      </div>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->
    <?php 
      $crearcuenta = new ControladorContabilidad();
      $crearcuenta -> ctrCrearCuentaMasiva();




     ?>

    </div>

  </div>
</div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR USUARIO
  ******************************************************* -->
