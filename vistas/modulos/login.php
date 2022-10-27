<div id="back">
     <!-- ====================================
  lado izquiedo
========================================-->
<div class="col-xs-4 pull-left">
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

<!-- ====================================
  lado derecho
========================================-->

<div id="myCarousel" class="carousel slide col-xs-8 pull-right" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="vistas/img/plantilla/imagen-01.jpeg" class="d-block w-100 img-responsive" alt="First slide">
           
        </div>
        <div class="item">
            <img src="vistas/img/plantilla/imagen-02.jpeg" class="d-block w-100 img-responsive" alt="First slide">
        </div>
        <div class="item">
            <img src="vistas/img/plantilla/imagen-03.jpeg" class="d-block w-100 img-responsive" alt="First slide">
        </div>
        <div class="item">
            <img src="vistas/img/plantilla/imagen-04.jpeg" class="d-block w-100 img-responsive" alt="First slide">
        </div>
    </div>

    <!-- Controls -->
   
</div>
<!-- ====================================
  fin lado derecho
========================================-->
</div><!-- ===CONTENEDOR========-->


