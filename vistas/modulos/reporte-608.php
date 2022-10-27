
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
       <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-university"></i>
        REPORTE 608
        
      </h1>

    <a href="registro-606" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Registro 606</a>
   <a href="registro-607" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Registro 607</a>
   <a href="registro-608" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Registro 608</a>

   <a href="cuadre-itbis" class="btn btn-success"><i class="fa fa-pie-chart" style="padding-right:5px"></i>Cuadre Itbis</a>

    <button class="btn btn-success" data-toggle="modal" data-target="#modalDescarga606"><i class="fa fa-arrow-down" style="padding-right:5px"></i>TXT 606</button>

    <button class="btn btn-success" data-toggle="modal" data-target="#modalDescarga607"><i class="fa fa-arrow-down" style="padding-right:5px"></i>TXT 607</button>

    <button class="btn btn-success" data-toggle="modal" data-target="#modalDescarga608"><i class="fa fa-arrow-down" style="padding-right:5px"></i>TXT 608</button> 


     
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE VENTAS********************************* -->
      
        <div class="box-header with-border">

         
         
  
        </div>

       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR VENTAS********************************* -->

        <div class="box-body">

          <table border="0" cellspacing="5" cellpadding="5">
              
              <tbody>
                <tr>
                       <td>Período &nbsp;</td>
                    <td><select class="form-control pull-left col-xs-3" name="periodoreporte608" id="periodoreporte608">
  <?php 
if(isset($_GET["periodoreporte608"])){
echo'<option value="'.$_GET["periodoreporte608"].'">'.$_GET["periodoreporte608"].'</option>';
  foreach ($_SESSION["Perido"] as $key => $value) {
    if($_GET["periodoreporte608"] != $value) { 
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
                    <td>Fecha Desde:</td>
                    <td><input type="text" id="min608" name="min608"></td>
                </tr>

                <tr>
                    <td>Fecha Hasta:</td>
                    <td><input type="text" id="max608" name="max608"></td>
              </tr>
            </tbody>

          </table>
    <br>
          <!--*****************TABLA  USUARIO********************************* -->


          <table class="display nowrap table table-bordered table-striped tablareporte608"  width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->
        

              
                     
            <thead>
              <tr>
                    <th>#</th>
                    <th>NCF</th>
                    <th>Año/Mes</th>
                    <th>Dia</th>
                    <th>Tipo de Anulacion</th>
                    <th>Descripción</th>
                    <th>Módulo</th>
                    <th>Estado</th>
                    <th></th>
                    


              </tr>

            
            </thead>
             
            
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>

             

              <!--*****************FILA 1  TABLA  USUARIO********************************* -->
              <?php 
              

               if(isset($_GET["periodoreporte608"])){
               $periodoreporte608 = $_GET["periodoreporte608"];
              }else{
               $periodoreporte608 = $_SESSION["Anologin"];

               }
              $Orden = "id";



              $Rnc_Empresa_608 = $_SESSION["RncEmpresaUsuario"];

              $reporte608 = Controlador608::ctrMostrarReporte608($Rnc_Empresa_608, $Orden, $periodoreporte608);

               foreach ($reporte608 as $key => $value){
                   echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value["NCF_608"].'</td>
                            
                            <td>'.$value["Fecha_comprobante_AnoMes_608"].'</td>
                            <td>'.$value["Fecha_Comprobante_Dia_608"].'</td>
                            <td>'.$value["Tipo_de_Anulacion_608"].'</td>
                            <td>'.$value["Descripcion_608"].'</td>
                            <td>'.$value["Modulo"].'</td>';

                if($value["Estatus"] == 1){

                  echo' <td><button title = "Cambiar estatus del Registro" class="btn btn-warning btn-xs btnEstatus608" id608="'.$value["id"].'"  estatus608="2">No Disponible</button></td>';
                } 
                  else if($value["Estatus"] == 2){

                  echo' <td><button title = "Cambiar estatus del Registro" class="btn btn-success btn-xs btnEstatus608" id608="'.$value["id"].'" estatus608="1">Disponible</button></td>';

                }else {

                  echo' <td><button title = "Cambiar estatus del Registro" class="btn btn-danger btn-xs" id608="'.$value["id"].'" estatus608="3">Declarada</button></td>';

                }
echo'<td>';
                if($value["Modulo"] == "FACTURA"){
                echo'<button class="btn btn-default btn-xs btnVerFactura608" id_608="'.$value["id"].'" data-toggle="modal" data-target="#modalFactura608"><i class="fa fa-eye"></i></button>';
                 }else if($value["Modulo"] == "607"){
                  echo'<button class="btn btn-default btn-xs btnVerRegistro608" id_608="'.$value["id"].'" data-toggle="modal" data-target="#modalRegistro608"><i class="fa fa-eye"></i></button>';

                 }else{
                  echo'<button class="btn btn-default btn-xs btnVerRegistro608" id_608="'.$value["id"].'" data-toggle="modal" data-target="#modalRegistro608"><i class="fa fa-eye"></i></button>';


                 }
                      



                /*condicion para editar 608*/
                if($value["Estatus"] != 3 && $value["EXTRAER_NCF_608"] != "FP1"){
                echo'<button title = "Editar el Registro 608" class="btn btn-warning btn-xs btnEditar608" id_608="'.$value["id"].'" modulo = "reporte-608" data-toggle="modal" data-target="#modalEditar607"><i class="fa fa-pencil"></i></button>';
                 }
                            


echo'</td>';
               }/*cierre for*/
               
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

<!--************************************************
                      MODAL AGREGAR Categoria
  ******************************************************* -->
  <!-- Modal -->
<div id="modalDescarga607" class="modal fade" role="dialog">
  
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
              
              <input type="text" class="form-control input-lg" id="RncEmpresa607Rango" name="RncEmpresa607Rango" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              
            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
            

         <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                      <select type="text" class="form-control" id="Periodoreporte607" name="Periodoreporte607" required>
                        <option value="">Seleccionar Periodo</option>

                        <?php  
                         

                        $Rnc_Empresa_607 = $_SESSION["RncEmpresaUsuario"];

                         $Periodo607 = Controlador607::ctrMostrarPeriodo607($Rnc_Empresa_607);

                       
                         foreach ($Periodo607 as $key => $value){

                          echo '<option value="'.$value["Fecha_comprobante_AnoMes_607"].'">'.$value["Fecha_comprobante_AnoMes_607"].'</option>';



                         }
                    

                         ?>

                      </select>   

                    </div>
                   

                  </div>

          
    
          
        </div>

      
      </div>
      
      <div class="modal-footer">
       

  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       
        
  <a class="btn btn-primary pull-right" role="button" id="descargartxt607">Descargar TXT 607</a>
  <a class="btn btn-warning pull-left" role="button" id="numeraciontxt607">Numeracion TXT 607</a>


        
       
      </div>





      
      
      
      
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>

</div>
  <!-- Modal -->
<div id="modalDescarga608" class="modal fade" role="dialog">
  
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
              
              <input type="text" class="form-control input-lg" id="RncEmpresa608Rango" name="RncEmpresa608Rango" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              
            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
            

         <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                      <select type="text" class="form-control" id="Periodoreporte608" name="Periodoreporte608" required>
                        <option value="">Seleccionar Periodo</option>

                        <?php  
                         

                        $Rnc_Empresa_608 = $_SESSION["RncEmpresaUsuario"];

                         $Periodo608 = Controlador608::ctrMostrarPeriodo608($Rnc_Empresa_608);

                       
                         foreach ($Periodo608 as $key => $value){

                          echo '<option value="'.$value["Fecha_comprobante_AnoMes_608"].'">'.$value["Fecha_comprobante_AnoMes_608"].'</option>';



                         }
                    

                         ?>

                      </select>   

                    </div>
                   

                  </div>

          
    
          
        </div>

      
      </div>
      
      <div class="modal-footer">
       

  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       
        
  <a class="btn btn-primary pull-right" role="button" id="descargartxt608">Descargar TXT 608</a>
  

        
       
      </div>





      
      
      
      
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>

</div>


<div id="modalFactura608" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Registro Factura</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

           <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">

                   

                      <h4 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN CLIENTE</b></h4>

                 
          </div>


      <div class="form-group col-xs-12">

          <div class="input-group col-xs-6 pull-left">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control" id="Rnc_Cliente" readonly>
                

          </div>
             <div class="input-group col-xs-6 pull-right">

             <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

            <input type="text" class="form-control" id="Nombre_Cliente" readonly>

            </div>

    </div>
      
         <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">

                   

              <h4 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN FACTURA</b></h4>

                 
          </div>

                   

       <div style="padding-right: 0px"  class="form-group col-lg-6">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

    <input type="text" class="form-control" maxlength="6" id="Fecha_comprobante_AnoMes_608" readonly>
    
   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-lg-6">
   

  <div class="input-group">
   <input type="text" class="form-control" maxlength="2" id="Fecha_Comprobante_Dia_608" readonly>
 
 </div>  
  
  
</div>



<div class="col-lg-12"></div>
<br>

     
      <div class="form-group col-xs-12">

          <div class="input-group col-xs-6 pull-left">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control" id="Codigo" readonly>

          </div>
             <div class="input-group col-xs-6 pull-right">

              <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control" id="NCF_608" readonly>
                

            </div>

    </div>
   
   <div class="form-group col-xs-12">

          <div class="input-group">
            <span class="input-group-addon">Tipo de Anulación</span>
              <input type="text" class="form-control" id="Tipo_de_Anulacion_608" readonly>

          </div>
            
    </div>
    
      <div class="form-group col-xs-12">

          <div class="input-group">
            <span class="input-group-addon">Descripción</span>
              <input type="text" class="form-control" id="Descripcion_608" readonly>

          </div>
            
    </div>

      <div class="form-group col-xs-4">

          
             <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-money"></i></span>

                <input type="text" class="form-control" id="Moneda" readonly>
                

            </div>

    </div>  
     <div class="form-group col-xs-4">

          
             <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-money"></i></span>

                <input type="text" class="form-control" id="Tasa" readonly>
                

            </div>

    </div>
      <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">

                   

              <h4 style="text-align: center; color: #FFFFFF"><b>PRODUCTOS</b></h4>

                 
          </div>
 
      <div class="form-group Productos col-xs-12">
    
    </div> 
     <div class="col-xs-9 pull-right">
  

<div class="form-group col-xs-8 pull-right " style="background-color: #2B6370">
      <h4 style="text-align: center; color: #FFFFFF"><b>TOTAL FACTURA</b></h4>

        

</div>
   <div class="col-xs-6">
        <label class="pull-right">Sub Total +</label>

    </div>

     <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

               <input type="text" class="form-control" id="Netovi" name="Netovi"  required readonly>

                
                        
              </div>
      </div>

<div class="col-xs-6">

          <label class="pull-right">DESC. -</label>
          
      
</div>



    <div class="form-group col-xs-6">

            <div class="input-group">
               <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

              
          <input type="text" class="form-control" id="Descuentovi" name="Descuentovi" value="0" required readonly>

         
                        
              </div>
    </div>
 
      
<div class="col-xs-6">
       
          <label class="pull-right">ITBIS +</label>
          
      
</div>

 
   <div class="form-group col-xs-6">

            <div class="input-group">

        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>       
  <input type="text" class="form-control" id="Impuestovi"  required readonly>
  

  

                        
              </div>
  </div>
  

   

 <div class="col-xs-6">
            <label class="pull-right">Total =</label>

    </div>

    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
 <input type="text" class="form-control" id="Total" required readonly>

           
                        
              </div>
      </div>

</div>                   
            

   
      <div class="form-group col-xs-12">

          <div class="input-group">
            <span class="input-group-addon">Usuario</span>
              <input type="text" class="form-control" id="Usuario_Creador" readonly>

          </div>
            
    </div>

  
                    

          
  </div>
 
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       

      </div>

    
     
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>

<div id="modalRegistro608" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Registro 608</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          

      
         <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">

                   

              <h4 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN FACTURA</b></h4>

                 
          </div>

                   

       <div style="padding-right: 0px"  class="form-group col-lg-6">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

    <input type="text" class="form-control" maxlength="6" id="Fecha_comprobante_AnoMes_608REGISTRO" readonly>
    
   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-lg-6">
   

  <div class="input-group">
   <input type="text" class="form-control" maxlength="2" id="Fecha_Comprobante_Dia_608REGISTRO" readonly>
 
 </div>  
  
  
</div>



<div class="col-lg-12"></div>
<br>

     
      <div class="form-group col-xs-6">

        
             <div class="input-group ">

              <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control" id="NCF_608REGISTRO" readonly>
                

            </div>
             </div>
               
  
      <div class="form-group col-xs-6">

               <div class="input-group">
            <span class="input-group-addon">Tipo de Anulación</span>
              <input type="text" class="form-control" id="Tipo_de_Anulacion_608REGISTRO" readonly>

          </div>

    </div>
   
  
    
      <div class="form-group col-xs-6">

          <div class="input-group">
            <span class="input-group-addon">Descripción</span>
              <input type="text" class="form-control" id="Descripcion_608REGISTRO" readonly>

          </div>
            
    </div>

      
      <div class="form-group col-xs-6">

          <div class="input-group">
            <span class="input-group-addon">Usuario</span>
              <input type="text" class="form-control" id="Usuario_CreadorREGISTRO" readonly>

          </div>
            
    </div>

  




 
      


   

          
            

 
                    

          
  </div>
 
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       

      </div>

    
     
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>

  
   <?php 
//$borrar608 = new Controlador608();
//$borrar608 -> ctrBorrar608();


 ?>

