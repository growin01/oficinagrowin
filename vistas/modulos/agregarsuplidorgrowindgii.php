  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <h1 class="col-xs-3 pull-left" style="font-size: 30px"><i class="fa fa-user fa-lg" style="padding-left:50px"></i>GROWIN DGII
      </h1>
     

        <button class="btn btn-danger" data-toggle="modal" data-target="#DepurarsuplidorGrowinDGII"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Depurar Tabla Growin DGII</button>
       <button class="btn btn-success" data-toggle="modal" data-target="#AgregarsuplidorGrowinDGII"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Agregar Tabla Growin DGII</button>
          
   
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active"><i class="fa fa-user"></i>GrowinDGII</li>
      </ol>
        
    </section>
    
    <section class="content">
  
      <div class="box">

        <div class="box-body">
          <!--*****************TABLA  USUARIO********************************* -->

          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                   
            <thead>
              <tr>
                <th style="width: 10px"></th>
                <th>RNC GROWIN DGII</th>
                <th>NOMBRE EMPRESA GROWIN</th>
                <th></th>
               
               
              </tr>

            </thead>
            

            <tbody>

              <?php 
              $tabla = "growin_dgii";
              

              $growindgii = ControladorProgramador::ctrDgiiGrowin($tabla);
              foreach ($growindgii as $key => $value){
                
                echo ' <tr>
                <td>'.($key+1).'</td>
                <td>'.$value["Rnc_Growin_DGII"].'</td>
                <td>'.$value["Nombre_Empresa_Growin"].'</td>';
                 echo'<td>
                  
                    <button Title="Editar Suplidor" class="btn btn-warning btnEditarSuplidorGrowinDGII btn-xs" idSuplidorGrowindgii="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarSuplidor"><i class="fa fa-pencil"></i></button>
                    <button Title="Eliminar Suplidor" class="btn btn-danger btnEliminarSuplidorGrowinDGII btn-xs" idSuplidorGrowindgii="'.$value["id"].'"><i class="fa fa-trash-o"></i></button>
                                       

                 
                  
                </td>  ';          


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
<div id="DepurarsuplidorGrowinDGII" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Suplidor Growin DGII</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

         <p>Este formulario Depura toda la tabla de GROWIN DGII de todos los campos vacios en el Nombre del Suplidor, y verifica que los RNC con la Tabla DGII coinsida con sus nombres</p>
       
          <div class="form-group">

            <div class="input-group">
             
              <input type="hidden" class="form-control input-RNC" maxlength="11" id="Rnc_Growin_DGIIDepurar" name="Rnc_Growin_DGIIDepurar" placeholder="Ingresar RNC o Cedula del Suplicor" >

            </div>

          </div>
         
        
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-danger">Depurar GROWIN DGII</button>

      </div>

      <?php 
      $ActualizacionGrowinDGII = new ControladorProgramador();
      $ActualizacionGrowinDGII -> ctrDepurarsuplidorGrowinDGII();
      


       ?>
    </div>

  </div>
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>


</div>

<!--************************************************
                    CIERRE DE  MODAL AGREGAR USUARIO
  ******************************************************* -->

  <!--************************************************
                      MODAL AGREGAR USUARIO
  ******************************************************* -->
  <!-- Modal -->
<div id="AgregarsuplidorGrowinDGII" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Suplidor Growin DGII</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

         
       
          <div class="form-group">

            <div class="input-group">
             
              <input type="text" class="form-control input-RNC" maxlength="11" id="Rnc_Growin_DGIIAgregar" name="Rnc_Growin_DGIIAgregar" placeholder="Ingresar RNC o Cedula del Suplicor" required>

            </div>

          </div>
         
         <div class="form-group">

            <div class="input-group">
             
              <input type="text" class="form-control input-RNC" maxlength="50" id="Nombre_Empresa_Growin" name="Nombre_Empresa_Growin" placeholder="Nombre_Empresa_Growin " onkeyup="javascript:this.value=this.value.toUpperCase();" required>

            </div>

          </div>
         
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-danger">Agregar GROWIN DGII</button>

      </div>

      <?php 
      $AgregarGrowinDGII = new ControladorProgramador();
      $AgregarGrowinDGII -> ctrAgregarsuplidorGrowinDGII();
      


       ?>
    </div>

  </div>
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>


</div>

<!--************************************************
                    CIERRE DE  MODAL AGREGAR USUARIO
  ******************************************************* -->
   
  <?php 
  $eliminarGrowindgii = new ControladorProgramador();
  $eliminarGrowindgii -> ctrSuplidorGrowindgii();

   ?>