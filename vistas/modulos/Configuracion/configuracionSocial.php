 <div class="row">

       
      <div class="col-lg-6 col-xs-12">
          
          <div class="box box-success">

            <div class="box-header with-border"></div>

        <form role="form" method="post" enctype="multipart/form-data">

            <div class="box-body">
                           
                <div class="box" >

                  <div class="form-group">

                    <div class="input-group">

                       
                        <input type="hidden" class="form-control" id="id_Empresa" name="id_Empresa" value="<?php echo $respuesta["id"];?>">
                        <input type="hidden" class="form-control" id="RncEmpresa" name="RncEmpresa" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
                          <input type="text" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>" readonly>
                    



                    </div>
                   

                  </div>

                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      

                      <input type="text" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>" readonly>
                    

                    </div>
                   

                  </div>

                   <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                      

                      <input type="text" class="form-control" id="Nombre_Empresa" name="Nombre_Empresa" value="<?php echo $respuesta["Nombre_Empresa"]?>" required>
                    

                    </div>
                   

                  </div>
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
                      

                      <input type="text" class="form-control" id="Descripcion_Empresa" name="Descripcion_Empresa" value="<?php echo $respuesta["Descripcion_Empresa"]?>">
                    

                    </div>
                   

                  </div>
                   <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                      

                      <input type="text" class="form-control" id="Direccion_Empresa" name="Direccion_Empresa" value="<?php echo $respuesta["Direccion_Empresa"]?>">
                    

                    </div>
                   

                  </div>
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                      

                      <input type="text" class="form-control" id="Telefono_Empresa" name="Telefono_Empresa" value="<?php echo $respuesta["Telefono_Empresa"]?>">
                    

                    </div>
                   

                  </div>
                   <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      

                      <input type="text" class="form-control" id="Correo_Empresa" name="Correo_Empresa" value="<?php echo $respuesta["Correo_Empresa"]?>">
                    

                    </div>
                   

                  </div>
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon">https://</span>
                      

                      <input type="text" class="form-control" id="Web_Empresa" name="Web_Empresa" value="<?php echo $respuesta["Web_Empresa"]?>">
                    

                    </div>
                   

                  </div>
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                      

                      <input type="text" class="form-control" id="Face_Empresa" name="Face_Empresa" value="<?php echo $respuesta["Face_Empresa"]?>">
                    

                    </div>
                   

                  </div>

                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                      

                      <input type="text" class="form-control" id="Instagran_Empresa" name="Instagran_Empresa" value="<?php echo $respuesta["Instagran_Empresa"]?>">
                    

                    </div>
                   

                  </div>
                     <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

                   

                      <h4 style="text-align: center;"><b>Datos Gráfico de la factura</b></h4>

                 
                </div>
                
                <div class="form-group col-xs-12">
                   <h5 style="text-align: center;">Seleccionara Ancho del Logo de la Empresa en px</h5>

                <div class="input-group">
                 

                   <span class="input-group-addon"><i class="fa fa-text-width"></i></span>

                     
                      

              <input type="text" class="form-control" id="ancho" name="ancho" maxlength="3" value="<?php echo $respuesta["ancho"]?>">
                    

                  </div>
                   

            </div>
            <div class="col-xs-12">
          <br>
          
          <div class="form-group">

          <div class="panel">Seleccionar color de la facturación</div>

          <label>Seleccionar el color de Datos Factura</label>

          <input type="color" name="faccolor1" value="<?php echo $respuesta["faccolor1"]?>">
          <br>

          <label>Seleccionar el color de Datos Clientes</label>

          <input type="color" name="faccolor2" value="<?php echo $respuesta["faccolor2"]?>">
          <br>

          <label>Seleccionar el color De Observaciones Factura</label>

          <input type="color" name="faccolor3" value="<?php echo $respuesta["faccolor3"]?>">
        
          
        </div>

        </div>
        </div>

    </div>
 </div>  


              

         <!--*****************SUBIR FOTO********************** -->

          <div class="form-group col-xs-6">

            <div class="panel">SUBIR LOGO DE LA EMPRESA</div>
            <input type="file" class="nuevoLogo" name="nuevoLogo">
            <p class="help-block">Peso maximo de la foto 8MB</p>

            <?php 
            if($respuesta["Logo"] != ""){
              echo "<img src=\"".$respuesta['Logo']."\" class='img-thumbnail previsualizar' width='350px'>";


            }else{

              echo '<img src="vistas/img/empresas/default/anonymous.png" class="img-thumbnail previsualizar" width="250px">';



            } 

             ?>
            
            <input type="hidden" name="LogoActual" id="LogoActual" value="<?php echo $respuesta["Logo"]?>">

          </div>
           <div class="form-group col-xs-6">

            <div class="panel">SUBIR SELLO DIGITAL DE LA EMPRESA</div>
            <input type="file" class="nuevoSello" name="nuevoSello">
            <p class="help-block">Peso maximo de la foto 8MB</p>

            <?php 
            if($respuesta["Sello"] != ""){
              echo "<img src=\"".$respuesta['Sello']."\" class='img-thumbnail previsualizar' width='350px'>";


            }else{

              echo '<img src="vistas/img/empresas/default/anonymous.png" class="img-thumbnail previsualizar" width="250px">';



            } 

             ?>
            
            <input type="hidden" name="SelloActual" id="SelloActual" value="<?php echo $respuesta["Sello"]?>">
            <br>

          </div>

       <div class="col-xs-12"></div>
        
          <!--*****************CIERRE SUBIR FOTO************************* -->
          

            

            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">Modificar</button>

              
            </div>

          </form>
          <?php 

            $ConfiSocial = new ControladorEmpresas();
            $ConfiSocial -> ctrEditarConfiSocial();





           ?>

       
  </div>
    