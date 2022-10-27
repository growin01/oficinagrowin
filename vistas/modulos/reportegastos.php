
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
       <section class="content-header">
     
       <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-server"></i>
         Gastos Por Suplidor
        
        
      </h1>

 

 <a href="gastodiario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Gasto</a>
 
 <a href="ajustediario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Ajuste</a>
 <a href="libromayor" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Libro Mayor</a>
   
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Reporte Gastos Por Suplidor</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE VENTAS********************************* -->
      
        <div class="box-header with-border">

         
           <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modalDescarga606" >Descarga de TXT</button>

      
          
          
          
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



          <table class="table table-bordered table-striped dt-responsive tablagastos606"  width="100%">
             

            <!--*****************CABECERA TABLA  USUARIO********************************* -->
        

              
                     
            <thead>
              <tr>
                <th style="width:5px">#</th>
                <th style="width:15px">RNC</th>
                <th style="width:20px">Nombre Empresa</th>
                <th style="width:15px">NCF</th>
                <th style="width:15px">Año/Mes</th>
                <th style="width:15px">NCF MOD</th> 
                <th>Total Factura</th> 
                <th>Total ITBIS</th>                 
                <th></th>            
                


              </tr>

              <tr>
                <th style="width:5px">#</th>
                <th style="width:15px">RNC</th>
                <th style="width:20px">Nombre Empresa</th>
                <th style="width:15px">NCF</th>
                <th style="width:15px">Año/Mes</th>
                <th style="width:15px">NCF MOD</th> 
                <th>Total Factura</th> 
                <th>Total ITBIS</th>                
                <th></th>            
                


              </tr>

            </thead>
             
            
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>

             

              <!--*****************FILA 1  TABLA  USUARIO********************************* -->
              <?php 
              $id_606 = null;
              $Valor_id606 = null;
              $Orden = "id";



              $Rnc_Empresa_606 = $_SESSION["RncEmpresaUsuario"];

              $reporte606 = Controlador606::ctrMostrar606($Rnc_Empresa_606, $id_606, $Valor_id606, $Orden);

               foreach ($reporte606 as $key => $value){
                echo '<tr>
                            <td style="width: 5px">'.($key+1).'</td>
                            <td style="width: 15px">'.$value["Rnc_Factura_606"].'</td>
                            <td style="width: 20px">'.$value["Nombre_Empresa_606"].'</td>
                            <td>'.$value["NCF_606"].'</td>
                            <td>'.$value["Fecha_AnoMes_606"].'</td>
                            <td>'.$value["NCF_Modificado_606"].'</td>
                            <td>'.$value["Total_Monto_Factura_606"].'</td>
                            <td>'.$value["ITBIS_Factura_606"].'</td>
                            
                            <td>
                              <div class="btn-group">
                                <button class="btn btn-warning btn-xs btnEditar606" id_606="'.$value["id"].'" data-toggle="modal" data-target="#modalEditar606" ><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs btnEliminar606" id_606="'.$value["id"].'"><i class="fa fa-times"></i></button>
                                                   
                              </div>
                              

                            </td> 



                        </tr>';



               }

               


               ?>


              
              <!--***************** CIERRE FILA 1  TABLA  USUARIO********************************* -->

             <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="font-weight:bold; border:1px solid #eee; background: #EC9538";>TOTALES:</td> 
                <td style="font-weight:bold; border:1px solid #eee; background: #EC9538";></td>                
                <td></td>            
              </tfoot>  
            
        

              

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
$borrar606 = new Controlador606();
$borrar606 -> ctrBorrar606();


 ?>



  
  