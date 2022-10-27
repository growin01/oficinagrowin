
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-user fa-lg" style="padding-left:50px"></i>
        Empleados 
      </h1>
     

           <button class="btn btn-success " data-toggle="modal" data-target="#modalAgregarEmpleado"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Agregar Empleados

  </button>

          
     
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active"><i class="fa fa-user"></i>Usuarios</li>
      </ol>
      
      
    
    </section>
    
<br>
    <section class="content">

      
      <div class="box">


        <div class="box-body">
          <!--*****************TABLA  USUARIO********************************* -->

<table class="table table-bordered table-striped dt-responsive tablas" width="100%">
   
  

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                <th style="width: 10px"></th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cedula</th>
                <th>Año/Mes</th> 
                <th>Dia</th>
                <th>Cargo</th> 
                <th>Sueldo</th>
                <th></th>            

              </tr>

            </thead>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>
 <?php 

      $tabla = "empleadostss_empresas";
      $taRncEmpresaTSS= "Rnc_Empresa_TSS";
      $RncEmpresaTSS =$_SESSION["RncEmpresaUsuario"];

            
  $Empleados = ModeloEmpresas::mdlMostrarEmpleadosEmpresa($tabla, $taRncEmpresaTSS, $RncEmpresaTSS);
    foreach ($Empleados as $key => $value) {
              
                echo ' <tr>
                <td>'.($key+1).'</td>
                <td>'.$value["Nombre_TSS"].'</td>
                <td>'.$value["Apellido_TSS"].'</td>
                <td>'.$value["Cedula_TSS"].'</td>
                <td>'.$value["AnoMes_Ingreso_TSS"].'</td>
                <td>'.$value["Dia_Ingreso_TSS"].'</td>
                <td>'.$value["cargo_TSS"].'</td>
                 <td>'.number_format($value["sueldo_TSS"], 2).'</td>
              
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning btnEditarEmpleado btn-xs" idEmpleado="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarEmpleado"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btnEliminarEmpleado btn-xs" idEmpleado="'.$value["id"].'" RncEmprasaTSS="'.$value["Rnc_Empresa_TSS"].'"><i class="fa fa-times"></i></button>
                                       

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
                      MODAL AGREGAR USUARIO
  ******************************************************* -->
  <!-- Modal -->
<div id="modalAgregarEmpleado" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Empleado</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA USUARIO********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="Rnc_Empresa_TSS" name="Rnc_Empresa_TSS" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>

            </div>


          </div>
          <!--*****************cierra input de RNC de EMPRESA USUARIO************************* -->
            

         <!--*****************input de Nombre de Usuario********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" name="nuevoNombreTSS" placeholder="Ingresar Nombres del Empleado" required>

            </div>

          </div>
        <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" name="nuevoApellidoTSS" placeholder="Ingresar Apellidos del Empleado" required>

            </div>

        </div>
          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa fa-key"></i></span>
              <input type="text" class="form-control input-lg" name="nuevaCedulaTSS" placeholder="Ingresar Cedula del Empleado" required>

            </div>

        </div>

  <div class="form-group col-xs-12 pull-right" >

                   

<h4 style="text-align: center;"><b>Fecha de Ingreso Del Empleado</b></h4>

  </div>
  
     
<div class="form-group col-lg-8">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

   
                   
        <input type="text" class="form-control input-lg" maxlength="6" id="FechaIngresomes" name="FechaIngresomes" placeholder="Año/Mes Ejemplo 202001"  required autofocus>
        

   </div>  
  
  
</div>
<div style="padding-left: 0px" class="form-group col-lg-4">
   

  <div class="input-group">
 <input type="text" class="form-control input-lg" maxlength="2" id="FechaIngresoDia" name="FechaIngresoDia"  placeholder="Día Ejemplo 01" required>
 </div>  
  
  
</div>
<div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>
              <input type="text" class="form-control input-lg" name="cargoTSS" placeholder="Ingresar Cargo del Empleado" required>

            </div>

        </div>

  <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-money"></i></span>
              <input type="text" class="form-control input-lg" name="SueldoTSS" placeholder="Ingresar Sueldo del Empleado" required>

            </div>

        </div>
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Empleado</button>

      </div>

      <?php 
      $crearEmpleados = new ControladorEmpresas();
      $crearEmpleados -> ctrCrearEmpleadoTSS();
      


       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>
<!--************************************************
                      MODAL AGREGAR USUARIO
  ******************************************************* -->
  <!-- Modal -->
<div id="modalEditarEmpleado" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Editar Empleado</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA USUARIO********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="EditarRnc_Empresa_TSS" name="EditarRnc_Empresa_TSS" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="idEmpleado" name="idEmpleado"  readonly>

            </div>


          </div>
          <!--*****************cierra input de RNC de EMPRESA USUARIO************************* -->
            

         <!--*****************input de Nombre de Usuario********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" id="EditarNombreTSS" name="EditarNombreTSS" required>

            </div>

          </div>
        <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" id="EditarApellidoTSS" name="EditarApellidoTSS" required>

            </div>

        </div>
          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa fa-key"></i></span>
              <input type="text" class="form-control input-lg" id="EditarCedulaTSS" name="EditarCedulaTSS" maxlength="11" required>

            </div>

        </div>

  <div class="form-group col-xs-12 pull-right" >

                   

<h4 style="text-align: center;"><b>Fecha de Ingreso Del Empleado</b></h4>

  </div>
  
     
<div class="form-group col-lg-8">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

   
                   
        <input type="text" class="form-control input-lg" maxlength="6" id="EditarFechaIngresomes" name="EditarFechaIngresomes" placeholder="Año/Mes Ejemplo 202001"  required autofocus>
        

   </div>  
  
  
</div>
<div style="padding-left: 0px" class="form-group col-lg-4">
   

  <div class="input-group">
 <input type="text" class="form-control input-lg" maxlength="2" id="EditarFechaIngresoDia" name="EditarFechaIngresoDia"  placeholder="Día Ejemplo 01" required>
 </div>  
  
  
</div>
<div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>
              <input type="text" class="form-control input-lg" id="EditarcargoTSS" name="EditarcargoTSS" required>

            </div>

        </div>

  <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-money"></i></span>
              <input type="text" class="form-control input-lg" id="EditarSueldoTSS" name="EditarSueldoTSS" required>

            </div>

        </div>
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Editar Empleado</button>

      </div>

      <?php 
      $EditarEmpleado = new ControladorEmpresas();
      $EditarEmpleado -> ctrEditarEmpleadoTSS();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>
<?php 
  $eliminarEmpleado = new ControladorEmpresas();
  $eliminarEmpleado -> ctrEliminarEmpleado();

   ?>