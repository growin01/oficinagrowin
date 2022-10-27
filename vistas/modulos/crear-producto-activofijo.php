
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header col-xs-12">
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-file-pdf-o"></i>
        Producto de Activo Fijo
        
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

    
        <div class="col-xs-6" style="padding-right: 0px">
          
          <div class="box-success">

            
<form role="form" method="post" class="formularioProductoActivoFijo">

            <div class="box-body">



             

                   


<input type="hidden"  id="RncEmpresaVentas" name="RncEmpresaVentas" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">

<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">


   <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

      <h4 style="text-align: center;"><b>INFORMACIÓN ACTIVO FIJO</b></h4>

  </div>                   
     


<div style="padding-right: 0px"  class="form-group col-xs-4">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

   
       <input type="text" class="form-control" maxlength="6" id="FechaFacturames" name="FechaFacturames" value="<?php if (isset($_SESSION['FechaFacturames'])){ echo $_SESSION['FechaFacturames'];}?>" placeholder="Año/Mes Ejemplo 202001" required>
        

   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-xs-4">
   

  <div class="input-group">
 <input type="text" class="form-control" maxlength="2" id="FechaFacturadia" name="FechaFacturadia"  value="<?php if (isset($_SESSION['FechaFacturadia'])){ echo $_SESSION['FechaFacturadia'];}?>" placeholder="Día Ejemplo 01" required autofocus>
 </div>  
  
  
</div>

  <div class="col-xs-12"></div>            


<div class="form-group form-group col-xs-12">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" class="form-control" id="nuevaDescripcion" name="nuevaDescripcion" placeholder="Nombre del Activo" required>

            </div>

          </div>
    <div class="form-group col-xs-12">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" class="form-control" id="nuevaDescripcion" name="nuevaDescripcion" placeholder="Descripción del Activo" required>

            </div>

          </div>

       <div class="form-group col-xs-12">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" class="form-control" id="nuevaDescripcion" name="nuevaDescripcion" placeholder="Ubicación del Activo" required>

            </div>

          </div>
        <div class="form-group col-xs-12">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" class="form-control" id="nuevaDescripcion" name="nuevaDescripcion" placeholder="Codigo del Activo" required>

            </div>

          </div>

              
               
<div class="col-xs-12"><br></div>          

          <div class="form-group">

            <div class="panel col-xs-12">SUBIR IMAGEN</div>
            <input type="file" class="nuevaImagen" name="nuevaImagen">
            <p class="help-block">Peso maximo de la IMAGEN 2MB</p>
            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

          </div>
         
                 
                  
     
              
</div><!-- box-body-->  


  
 

          </div>

          
        </div>

        <div class="col-xs-6" style="padding-left: 2px">

          <div class="box-warning">


            <div class="box-body">

            <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

                   

                <h4 style="text-align: center;"><b>INFORMACIÓN CONTABLE</b></h4>

                 
                </div>
                <div style="padding-right: 0px"  class="form-group col-xs-4">
   
  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

       <input type="text" class="form-control" maxlength="6" id="FechaFacturames" name="FechaFacturames" value="<?php if (isset($_SESSION['FechaFacturames'])){ echo $_SESSION['FechaFacturames'];}?>" placeholder="Año/Mes Ejemplo 202001" required>
  
   </div>  
  
</div>

<div style="padding-left: 0px" class="form-group col-xs-4">
   

  <div class="input-group">
 <input type="text" class="form-control" maxlength="2" id="FechaFacturadia" name="FechaFacturadia"  value="<?php if (isset($_SESSION['FechaFacturadia'])){ echo $_SESSION['FechaFacturadia'];}?>" placeholder="Día Ejemplo 01" required autofocus>
 </div>  
  
  
</div>

 

          <div class="form-group col-xs-12">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <select class="form-control" id="nuevaCategoria" name="nuevaCategoriaproductos" required>
                <option value="">Selecionar Categoria</option>
                
                <?php 
                $Rnc_Empresa_Categoria_ActivoF = $_SESSION["RncEmpresaUsuario"];

                $categorias = ControladorCategoriasActivoF::ctrMostrarCategoriasActivoF($Rnc_Empresa_Categoria_ActivoF);

              
                foreach ($categorias as $key => $value) {
                  echo '<option value="'.$value["id"].'">'.$value["Nombre_Categoria_ActivoF"].'</option>';
                  
                }

                 ?>
               
              </select>

            </div>

          </div>
               
         <?php 
    if($_SESSION["Contabilidad"] == 1){
      echo ' <div class="form-group col-xs-12">
            <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-th"></i></span>
  <select class="form-control input" id="plancuentaProducto" name= "plancuentaProducto" required>
  <option value="">Selecionar Cuenta de Activo a Depreciar</option>';

            $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                $id_grupo = 1;
                    
              $planBanco = ControladorProductos::ctrplanProductos($Rnc_Empresa_Cuentas, $id_grupo);

                foreach ($planBanco as $key => $value) {
                  if($value["id_grupo"] == 1 && $value["id_categoria"] == 7){ 
                  
                  echo '<option value="'.$value["id"].'">'.$value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_subgenerica"].'-'.$value["Nombre_subCuenta"].'</option>';
                 }
                 
                  
                }
                 

echo'</select>
              </div>
            </div>';

    }else{


}


     ?>

<?php 
    if($_SESSION["Contabilidad"] == 1){
      echo ' <div class="form-group col-xs-12">
            <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-th"></i></span>
  <select class="form-control input" id="plancuentaProducto" name= "plancuentaProducto" required>
   <option value="">Selecionar Cuenta de Gasto a Depreciar</option>';


  $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                $id_grupo = 6;
                    
              $planBanco = ControladorProductos::ctrplanProductos($Rnc_Empresa_Cuentas, $id_grupo);

                foreach ($planBanco as $key => $value) {
                  if($value["id_grupo"] == 6 && $value["id_categoria"] == 3 && $value["id_generica"] == "01"){ 
                  
                  echo '<option value="'.$value["id"].'">'.$value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_subgenerica"].'-'.$value["Nombre_subCuenta"].'</option>';
                 }
                 
                  
                }
                 

echo'</select>
              </div>
            </div>';

    }else{


}


     ?>
        

<table class="table table-bordered table-striped dt-responsive"  width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                <th>Costo del Activo Fijo</th>
                <th>
                  <div class="col-xs-10">
                    <input type="text" class="form-control" id="CostoActivof" name="CostoActivof"  value="0.00" required>
                  </div>
                 
              </th>
              </tr>
              <tr>
                <th>Depreciación Acumulada del Activo Fijo</th>
                <th>
                  <div class="col-xs-10">
                    <input type="text" class="form-control" id="DAcumulada" name="DAcumulada"  value="0.00" required>
                  </div>
                  
                </th>
              </tr>
             
              <tr>
                <th>Valor de Salvamento del Activo Fijo</th>
                <th>
                  <div class="col-xs-10">
                    <input type="text" class="form-control" id="ValorSalvamento" name="ValorSalvamento" value="0.00" required>
                  </div>
                  
                </th>
              </tr>

               <tr>
                <th>Vida Util del Activo Fijo</th>
                <th>
                  <div class="col-xs-10">
                    <select class="form-control"  name="VidaUtil" id="VidaUtil">
                    <option value="5">5 Años</option>
                    <option value="1">1 Año</option>
                    <option value="2">2 Años</option>
                    <option value="3">3 Años</option>
                    <option value="4">4 Años</option>
                    <option value="5">5 Años</option>
                    <option value="6">6 Años</option>
                    <option value="7">7 Años</option>
                    <option value="8">8 Años</option>
                    <option value="9">9 Años</option>
                    <option value="10">10 Años</option>
                    <option value="11">11 Años</option>
                    <option value="12">12 Años</option>
                    <option value="13">13 Años</option>
                    <option value="14">14 Años</option>
                    <option value="15">15 Años</option>
                    <option value="16">16 Años</option>
                    <option value="17">17 Años</option>
                    <option value="18">18 Años</option>
                    <option value="19">19 Años</option>
                    <option value="20">20 Años</option>
                    <option value="21">21 Años</option>
                    <option value="22">22 Años</option>
                    <option value="23">23 Años</option>
                    <option value="24">24 Años</option>
                    <option value="25">25 Años</option>
                  </select>
                  </div>
                 
                </th>
              </tr>
               <tr>
                <th>Depreciación Mensual Calculada</th>
                <th>
                  <div class="col-xs-10">
                    <input type="text" class="form-control" id="DepreciacionMensual" name="DepreciacionMensual"  value="0.00" required readonly>
                  </div>
                  
                </th>
              </tr>


              <tr>
                <th>Formula de Depreciación Mensual Calculada</th>
                
                <th>D= ((C.H - D.A)-V.S)/V.U</th>
                 
               
              </tr>
              
              <tr>
                <th>C.H</th>
                
                <th>Costo Historico</th>
                 
               
              </tr>
              <tr>
                <th>D.A</th>
                
                <th>Depreciacion Acumulada</th>
                 
               
              </tr>
              <tr>
                <th>V.S</th>
                
                <th>Valor de Salvamento</th>
                 
               
              </tr>
              <tr>
                <th>V.U</th>
                
                <th>Vida Util</th>
                 
               
              </tr>

              
            </thead>

            





</table>
   
              

            </div>
            

          </div>



          


        </div>
        
        <div class="box-footer">
<button type="submit" class="btn btn-primary pull-right">Registrar Activo</button>
<?php 
  if(isset($_SESSION["FechaFacturadia"])){
    unset($_SESSION["FechaFacturames"]);
    unset($_SESSION["FechaFacturadia"]);
    unset($_SESSION["Comision_Factura"]);

  }

 ?>

</div>

          </form>
          <?php 

            $crearproductof = new ControladorActivoF();
            $crearproductof -> ctrCrearProductoActivoF();


           ?>


      </div>

      
    </section>


   </div>
 