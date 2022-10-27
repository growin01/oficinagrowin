
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
        <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-building-o"></i>
       BANCO
        
      </h1>
     
         
       <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarBanco"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Crear Banco</button>
       <button class="btn btn-success" data-toggle="modal" data-target="#modalCrearAnticipo"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Crear Fondo de Anticipo</button>


      <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarOtros"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Otro Instrumento de Pago</button>
      
      <a href="conciliacion" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Conciliación</a>
       

   <a href="reportepago" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Recibo de Pago</a>
   <a href="librobanco" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Libro Banco</a>

      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Banco</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE AGREGAR USUARIO********************************* -->

        <div class="box-header with-border">

          
        
          
          
        </div>
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR USUARIO********************************* -->


        <div class="box-body">
          <!--*****************TABLA  USUARIO********************************* -->


          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Nombre</th>
                <th>N° de Cuenta</th>
                <th>TipoCuenta</th>
                <th>Año/Mes Saldo</th>
                <th>Día Saldo</th>
                <th>Saldo Inicial</th>
                <th>Telefono Banco</th>
                <th>Cuenta Contable</th>
                <th></th>             

              </tr>

            </thead>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>

              <?php
              $Rnc_Empresa_Banco = $_SESSION["RncEmpresaUsuario"];
              $Banco = ControladorBanco::ctrMostrarBanco($Rnc_Empresa_Banco);

              foreach ($Banco as $key => $value) {


                
                  echo '<tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["Nombre_Cuenta"].'</td>
                    <td>'.$value["NumeroCuenta"].'</td>
                    <td>'.$value["TipoCuenta"].'</td>
                    <td>'.$value["FechamesBanco"].'</td>
                    <td>'.$value["FechadiaBanco"].'</td>
                    <td>'.$value["saldoInicial"].'</td>
                    <td>'.$value["TelefonoBanco"].'</td>



                    <td>'.$value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_cuenta"].'-'.$value["Nombre_CuentaContable"].'</td>
                   
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-warning btn-xs btnEditarBanco" idBanco="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarBanco"><i class="fa fa-pencil"></i></button>
                      </div>
                      


                    </td>             

                  </tr>';


              }


               ?>

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
<div id="modalAgregarBanco" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Banco</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaBanco" name="RncEmpresaBanco" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="UsuarioBanco" name="UsuarioBanco" value="<?php echo $_SESSION["Usuario"];?>" readonly>

            </div>


          </div>
             <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                    <select class="form-control input" id="plancuentabanco" name= "plancuentabanco" required>
                      <option value="">Selecionar Cuenta Contable de Banco</option>
                
                <?php 
                      $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                      $id_grupo = 1;
                      $id_categoria = 1;
                    
                      $planBanco = ControladorBanco::ctrplanBanco($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria);

                foreach ($planBanco as $key => $value) {
                  if($value["id_generica"] != "01"){
                  echo '<option value="'.$value["id"].'">'.$value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_subgenerica"].'-'.$value["Nombre_subCuenta"].'</option>';
                  }
                  
                }

                 ?>
               </select>
              </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                    <select class="form-control" id="TipobancoCuenta" name="tipobancoCuenta" required>
                      <option value="">Selecionar Tipo de Cuenta</option>
                      <option value="AHORRO">AHORRO</option>
                      <option value="CORRIENTE">CORRIENTE</option>
                      <option value="CAJA CHICA">CAJA CHICA</option>
                      <option value="FIDEICOMISO">FIDEICOMISO</option>
                      <option value="NINGUNA">NINGUNA</option>
               </select>
              </div>
            </div>

            <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">N° de Cuenta</span>
              <input type="text" class="form-control" maxlength="20" id ="NCuentaBancaria" name="NCuentaBancaria" placeholder="Ingresar el Numero de la Cuenta Bancaria" required>

            </div>

          </div>
             <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">Nombre Cuenta</span>
              <input type="text" class="form-control" name="NombreCuenta" placeholder="Ingresar un Nombre a la Cuenta" required>

            </div>

          </div>
          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              
             
              <input type="text" class="form-control input" name="TelefonoBanco" placeholder="Ingresar Teléfono del Banco">


            </div>

          </div>
           <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control Fecha">

                     <label>Año/Mes</label>
                      <input type="text" class="FechamesBanco" maxlength="6" id="FechamesBanco" name="FechamesBanco" required>

                     
                      <label>Dìa</label>
                      <input type="text" class="FechadiaBanco" maxlength="2" id="FechadiaBanco" name="FechadiaBanco" required>


                    </div>
                   

                  </div>
                  </div>

          
          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">Saldo Inicial Libro Banco</span>
              <input type="text" class="form-control" id ="saldoInicial" name ="saldoInicial" value="0.00" required>

            </div>

          </div>
           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">Saldo Inicial Estado de Cuenta</span>
              <input type="text" class="form-control" id ="saldoEstado" name ="saldoEstado" value="0.00" required>

            </div>

          </div>
         


        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Banco</button>

      </div>
      <?php 
      

      $crearBanco = new ControladorBanco();
      $crearBanco -> ctrCrearBanco();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR categoria
  ******************************************************* -->
   <!--************************************************
                      MODAL AGREGAR Categoria
  ******************************************************* -->
  <!-- Modal -->
<div id="modalAgregarOtros" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Otro Instrumento de Pago</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaBanco" name="RncEmpresaBanco" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="UsuarioBanco" name="UsuarioBanco" value="<?php echo $_SESSION["Usuario"];?>" readonly>

            </div>


          </div>
             <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                    <select class="form-control input" id="plancuentabanco" name="plancuentabanco" required>
                      <option value="">Selecionar Cuenta Contable del Instrumento de pago</option>
                
                <?php 
                $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                $id_grupo = 1;
                $id_categoria = 1;
                    
                $planBanco = ControladorBanco::ctrplanBanco($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria);

                foreach ($planBanco as $key => $value) {
                  
                     echo '<option value="'.$value["id"].'">'.$value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_subgenerica"].'-'.$value["Nombre_subCuenta"].'</option>';

                 
                  
                }
                $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                $id_grupo = 1;
                $id_categoria = 2;
                    
                $planBanco = ControladorBanco::ctrplanBanco($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria);

                foreach ($planBanco as $key => $value) {
                  echo '<option value="'.$value["id"].'">'.$value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_subgenerica"].'-'.$value["Nombre_subCuenta"].'</option>';
                  
                }
                 $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                $id_grupo = 2;
                $id_categoria = 1;
                    
                $planBanco = ControladorBanco::ctrplanBanco($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria);

                foreach ($planBanco as $key => $value) {
                  echo '<option value="'.$value["id"].'">'.$value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_subgenerica"].'-'.$value["Nombre_subCuenta"].'</option>';
                  
                }
                $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                $id_grupo = 2;
                $id_categoria = 6;
                    
                $planBanco = ControladorBanco::ctrplanBanco($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria);

                foreach ($planBanco as $key => $value) {
                  echo '<option value="'.$value["id"].'">'.$value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_subgenerica"].'-'.$value["Nombre_subCuenta"].'</option>';
                  
                }
                $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                $id_grupo = 2;
                $id_categoria = 7;
                    
                $planBanco = ControladorBanco::ctrplanBanco($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria);

                foreach ($planBanco as $key => $value) {
                  echo '<option value="'.$value["id"].'">'.$value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_subgenerica"].'-'.$value["Nombre_subCuenta"].'</option>';
                  
                }
                $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                $id_grupo = 2;
                $id_categoria = 9;
                    
                $planBanco = ControladorBanco::ctrplanBanco($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria);

                foreach ($planBanco as $key => $value) {
                  echo '<option value="'.$value["id"].'">'.$value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_subgenerica"].'-'.$value["Nombre_subCuenta"].'</option>';
                  
                }



                 ?>
               </select>
              </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                    <select class="form-control" id="TipobancoCuenta" name="tipobancoCuenta" required>
                      <option value="">Selecionar Tipo de Cuenta</option>
                      <option value="AHORRO">AHORRO</option>
                      <option value="CORRIENTE">CORRIENTE</option>
                      <option value="CAJA CHICA">CAJA CHICA</option>
                      <option value="FIDEICOMISO">FIDEICOMISO</option>
                      <option value="ANTICIPOPARAGASTO">ANTICIPO DE CLIENTE</option>
                      <option value="ANTICIPOPARAGASTO">ANTICIPO PARA GASTO</option>
                      <option value="TC">TARJETA DE CREDITO</option>
                      <option value="NINGUNA">NINGUNA</option>
               </select>
              </div>
            </div>

            <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">N° de Cuenta</span>
              <input type="text" class="form-control" maxlength="20" id ="NCuentaBancaria" name="NCuentaBancaria" placeholder="Ingresar el Numero de la Cuenta Bancaria" required>

            </div>

          </div>
             <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">Nombre Cuenta</span>
              <input type="text" class="form-control" name="NombreCuenta" placeholder="Ingresar un Nombre a la Cuenta" required>

            </div>

          </div>
          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              
             
              <input type="text" class="form-control input" name="TelefonoBanco" placeholder="Ingresar Teléfono del Banco">


            </div>

          </div>
           <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control Fecha">

                     <label>Año/Mes</label>
                      <input type="text" class="FechamesBanco" maxlength="6" id="FechamesBanco" name="FechamesBanco" required>

                     
                      <label>Dìa</label>
                      <input type="text" class="FechadiaBanco" maxlength="2" id="FechadiaBanco" name="FechadiaBanco" required>


                    </div>
                   

                  </div>
                  </div>

          
          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">Saldo Inicial Libro Banco</span>
              <input type="text" class="form-control" id ="saldoInicial" name ="saldoInicial" value="0.00" required>

            </div>

          </div>
           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">Saldo Inicial Estado de Cuenta</span>
              <input type="text" class="form-control" id ="saldoEstado" name ="saldoEstado" value="0.00" required>

            </div>

          </div>
        
         


        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Banco</button>

      </div>
      <?php 
      

      $crearBanco = new ControladorBanco();
      $crearBanco -> ctrAgregarotrosBanco();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR categoria
  ******************************************************* -->
   <!--************************************************
                      MODAL AGREGAR Categoria
  ******************************************************* -->
  <!-- Modal -->
<div id="modalEditarBanco" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Editar Banco</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">


          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="Editar-RncEmpresaBanco" name="Editar-RncEmpresaBanco" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="Editar-UsuarioBanco" name="Editar-UsuarioBanco" value="<?php echo $_SESSION["Usuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="idBanco" name="idBanco"readonly>

            </div>


          </div>
             <div class="form-group" id = "cuentacontablebanco">
               
            </div>
            <div class="form-group" id="editartipocuenta">
               
            </div>

            <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">N° de Cuenta</span>
              <input type="text" class="form-control" maxlength="20" id ="Editar-NCuentaBancaria" name="Editar-NCuentaBancaria" required>

            </div>

          </div>
             <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">Nombre Cuenta</span>
              <input type="text" class="form-control" id="Editar-NombreCuenta" name="Editar-NombreCuenta" required>

            </div>

          </div>
          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              
             
              <input type="text" class="form-control input" id="Editar-TelefonoBanco" name="Editar-TelefonoBanco" placeholder="Ingresar Teléfono del Banco">


            </div>

          </div>
           <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control Fecha">

                     <label>Año/Mes</label>
                      <input type="text" class="FechamesBanco" maxlength="6" id="Editar-FechamesBanco" name="Editar-FechamesBanco" required>

                     
                      <label>Dìa</label>
                      <input type="text" class="FechadiaBanco" maxlength="2" id="Editar-FechadiaBanco" name="Editar-FechadiaBanco" required>


                    </div>
                   

                  </div>
                  </div>

          
          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">Saldo Inicial Libro Banco</span>
              <input type="text" class="form-control" id ="Editar-saldoInicial" name ="Editar-saldoInicial" value="0.00" required>

            </div>

          </div>
           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">Saldo Inicial Estado de Cuenta</span>
              <input type="text" class="form-control" id ="Editar-saldoEstado" name ="Editar-saldoEstado" value="0.00" required>

            </div>

          </div>
        
         


        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Editar Banco</button>

      </div>
      <?php 
      

      $EditarBanco = new ControladorBanco();
      $EditarBanco -> ctrEditarBanco();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>

<!--************************************************
                      MODAL AGREGAR Categoria
  ******************************************************* -->
  <!-- Modal -->
<div id="modalCrearAnticipo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" class="crearanticipo">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Crear Anticipo</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaAnticipo" name="RncEmpresaAnticipo" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="UsuarioBanco" name="UsuarioBanco" value="<?php echo $_SESSION["Usuario"];?>" readonly>

            </div>


          </div>
             <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                    <select class="form-control input" id="plancuentabanco" name="plancuentabanco" required>
                      <option value="">Selecionar Cuenta Contable del Instrumento de pago</option>
                
                <?php 
                $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                $id_grupo = 1;
                $id_categoria = 2;
                    
                $planBanco = ControladorBanco::ctrplanBanco($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria);

                foreach ($planBanco as $key => $value) {
                  if($value["id_generica"] == "07"){ 
                  
                     echo '<option value="'.$value["id"].'">'.$value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_subgenerica"].'-'.$value["Nombre_subCuenta"].'</option>';
                     }

                 
                  
                }
                

                 ?>
               </select>
              </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                    <select class="form-control" id="TipobancoCuenta" name="tipobancoCuenta" required>
                      <option value="ANTICIPOPARAGASTO">ANTICIPO PARA GASTO</option>
                      
               </select>
              </div>
            </div>

            <div class="form-group">

            <div class="input-group">
               <span class="input-group-addon">N° de Cuenta</span>
              

               <?php 

    $Rnc_Empresa_Anticipo = $_SESSION["RncEmpresaUsuario"];
    $id_grupo = "1";
    $id_categoria = "2";
    $id_generica = "07";
    $TipoCuenta = "ANTICIPOPARAGASTO";

    $datos = array('Rnc_Empresa_Banco' => $Rnc_Empresa_Anticipo, 
          'id_grupo' => $id_grupo,
          'id_categoria' => $id_categoria,
          'id_generica' => $id_generica,
          'TipoCuenta' => $TipoCuenta);
  
  $Anticipo = ControladorAnticipo::ctrMostrarAnticipo($datos);
    
    if(!$Anticipo){

    echo '<input type="text" class="form-control" maxlength="20" id ="NCuentaBancaria" name="NCuentaBancaria"  value="1" readonly>';



    } else{

    foreach ($Anticipo as $key => $value) {}
        $codigo = $value["NumeroCuenta"]+1;

        echo '<input type="text" class="form-control" maxlength="20" id ="NCuentaBancaria" name="NCuentaBancaria" value="'.$codigo.'" readonly>';


            }




  ?>

             

            </div>

          </div>
             <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">Nombre Cuenta</span>
              <input type="text" class="form-control" name="NombreCuenta" placeholder="Ingresar un Nombre a la Cuenta" required>

            </div>

          </div>
          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              
             
              <input type="text" class="form-control input" name="TelefonoBanco" placeholder="Ingresar Teléfono del Banco">


            </div>

          </div>
           <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control Fecha">

                     <label>Año/Mes</label>
                      <input type="text" class="FechamesBanco" maxlength="6" id="FechamesBanco" name="FechamesBanco" required>

                     
                      <label>Dìa</label>
                      <input type="text" class="FechadiaBanco" maxlength="2" id="FechadiaBanco" name="FechadiaBanco" required>


                    </div>
                   

                  </div>
        </div>

          
          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">Saldo Inicial Libro Banco</span>
              <input type="text" class="form-control" id ="saldoInicial" name ="saldoInicial" value="0.00" required>

            </div>

          </div>
           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">Saldo Inicial Estado de Cuenta</span>
              <input type="text" class="form-control" id ="saldoEstado" name ="saldoEstado" value="0.00" required>

            </div>

          </div>
        
         


        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Banco</button>

      </div>
      <?php 
      

      $crearAnticipo = new ControladorAnticipo();
      $crearAnticipo -> ctrCrearAnticipo();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>


<!--************************************************
                    CIERRE DE  MODAL AGREGAR categoria
  ******************************************************* -->
