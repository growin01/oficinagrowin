
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CATÁLOGO DE CUENTAS TODAS LAS EMPRESAS
        
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
          <h1>GRUPO EMPRESAS</h1>

          <table class="table table-bordered table-striped dt-responsive tablas" width="60%">


            <thead>
              <tr>
              <th>#</th>
              <th>N° de Cuenta</th>
              <th>Nombre Categoria</th>
              </tr>
              
            </thead>
            

            <tbody>
              
              <?php


              $tabla = "grupo_empresa"; 
              
              
              $respuesta = ControladorContabilidad::ctrgrupoempresas($tabla);

             
            
                foreach ($respuesta as $key => $value) {
                  echo ' <tr>
                <td>'.($key+1).'</td>
                <td>'.$value["id_grupo"].".".$value["id_categoria"].'</td>
                <td>'.$value["Nombre_Categoria"].'</td></tr>';
              

                }/*cierre foreach*/

  
               ?>
                </tbody>
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->

            
          </table>

  <h1>GENERICAS EMPRESAS</h1>
   <?php 
          if($_SESSION["Perfil"] == "Programador"){

            echo'<button class="btn btn-danger pull-right" data-toggle="modal" data-target="#modalAgregarCuentaMasiva">Agregar Generica Masiva todas la empresas


          </button>';



          }



           ?>
           <br>
          <table class="table table-bordered table-striped dt-responsive tablas" width="60%">


            <thead>
              <tr>
              <th>#</th>
              <th>Rnc_Empresa_cuentas</th>
              <th>N° Cuenta</th>
              <th>Nombre Categoria</th>
              </tr>
            
              
              
            </thead>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>
              
              <?php


              $tabla = "generica_empresas"; 
              
              
              $respuesta = ControladorContabilidad::ctrgrupoempresas($tabla);

             
            
                foreach ($respuesta as $key => $value) {
                  echo ' <tr>
              <td>'.($key+1).'</td>
              <td>'.$value["Rnc_Empresa_cuentas"].'</td>
              <td>'.$value["id_grupo"].".".$value["id_categoria"].".".$value["id_generica"].'</td>
              <td>'.$value["Nombre_Cuenta"].'</td></tr>';
              

                }/*cierre foreach*/

  
               ?>

              

            </tbody>
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->

            
          </table>
        
        
       <h1>GENERICAS EMPRESAS</h1>  

        <?php 
          if($_SESSION["Perfil"] == "Programador"){
       echo'<button class="btn btn-warning pull-right" data-toggle="modal" data-target="#modalsubCuentaMasiva">Agregar Cuenta Masiva todas la empresas


          </button>';

           }



           ?>
<br>
          <table class="table table-bordered table-striped dt-responsive tablas" width="60%">


            <thead>
              <tr>
              <th>#</th>
              <th>Rnc_Empresa_cuentas</th>
              <th>N° Cuenta</th>
              <th>Nombre Categoria</th>
              </tr>
            
              
              
            </thead>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>
              
              <?php


              $tabla = "subgenerica_empresas"; 
              
              
              $respuesta = ControladorContabilidad::ctrgrupoempresas($tabla);

             
            
                foreach ($respuesta as $key => $value) {
                  echo ' <tr>
              <td>'.($key+1).'</td>
              <td>'.$value["Rnc_Empresa_cuentas"].'</td>
              <td>'.$value["id_grupo"].".".$value["id_categoria"].".".$value["id_generica"].".".$value["id_subgenerica"] .'</td>
              <td>'.$value["Nombre_subCuenta"].'</td></tr>';
              

                }/*cierre foreach*/

  
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
<div id="modalAgregarCuentaMasiva" class="modal fade" role="dialog">
  
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
              <input type="text" class="form-control input-lg" id="numerogenericoMasiva" name="numerogenericoMasiva" placeholder="Código de Cuenta">

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
  <!--************************************************
                      MODAL AGREGAR PRODUCTOS
  ******************************************************* -->
  <!-- Modal -->
<div id="modalsubCuentaMasiva" class="modal fade" role="dialog">
  
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
              <input type="text" class="form-control input-lg" id="numerosubgenericoMasiva" name="numerosubgenericoMasiva" placeholder="Código de sub Cuenta">

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
      $crearsubcuenta -> ctrCrearsubCuentaMasiva();




     ?>

    </div>

  </div>
</div>



