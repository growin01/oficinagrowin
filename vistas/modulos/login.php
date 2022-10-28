<div id="back">
     <!-- ====================================
  lado izquiedo
========================================-->
<div class="col-xs-12">
    <div class="login-box" style="padding-left: 10px;">
  
  
  <!-- /.login-logo -->
  
  <div class="login-box-body">
    <div class="login-logo">
    <img src="vistas/img/plantilla/logo(png).jpg" class="img-responsive" style="padding:0px 0px 0px 0px">


</div>
<p class="login-box-msg">Oficina Virtual Empresarial</p>


 <form method="post">


      <div class="form-group has-feedback">
        
        <input type="text" class="form-control" maxlength="11" placeholder="RNC de la Empresa" id="ingRncEmpresa" name="ingRncEmpresa" required autofocus>
        <span class="glyphicon glyphicon-registration-mark form-control-feedback"></span>
      
      </div>
      <div class="form-group has-feedback">
        
        <input type="text" class="form-control" placeholder="Nombre de la Empresa" id="NombreEmpresa" name="NombreEmpresa" required readonly>
        <span class="fa fa-user form-control-feedback"></span>
      
      </div>
     
      <div class="form-group has-feedback">
 
        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">
        
        <input type="password" class="form-control" placeholder="Password" name="ingPassword" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      
      </div>
      <div class="row">
        
        
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat is-full-width is-large"> Ingresar</button>
        </div>

      </div>
      <?php 
      $login = new ControladorUsuarios();
      $login -> ctrLoginUsuario();

       ?>
    
    </form>
  
    
  </div>
  <!-- /.login-box-body -->

</div>
    

</div>

