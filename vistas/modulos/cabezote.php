<header class="main-header">
	
<!--=========================
	LOGO TIPO
======================================-->
<a href="inicio" class="logo">

	<!--==== logo mini ===========-->
	<span class="logo-mini">
		<img src="vistas/img/plantilla/logo_mini.jpg" class="img-responsive" style="padding: 0px">
	</span>


	<!--==== logo Normal ===========-->
	<span class="logo-lg">
		<img src="vistas/img/plantilla/logo_max.jpg" class="img-responsive" style="padding: 0px 0px">
	</span>


</a>

<!--=========================
	sidebar BARRA DE NAVEGACION
======================================-->
<nav class="navbar navbar-static-top" role="navegation">
	
	<!-- Boton de navegacion ===-->
      
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        
      </a>
      <!-- Perfil Usuario ===-->
      
      <div class="navbar-custom-menu">
            
      	
      	<ul class="nav navbar-nav">

            
      		<li class="dropdown user user-menu">
      			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php 
                        if($_SESSION["Foto"] != ""){
                              echo '<img src="'.$_SESSION["Foto"].'" class="user-image">';

                        }
                        else {
                        
                        echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

                              
                        }                 



                         ?>
      				<span class="hidden-xs"><?php echo $_SESSION["Nombre"];?>&nbsp;</span>
                              <span class="hidden-xs"><?php echo "RNC: ".$_SESSION["RncEmpresaUsuario"]."&nbsp;".$_SESSION["NombreEmpresa"];?>_</span>
                              <span class="hidden-xs"><?php echo $_SESSION["NombreEmpresaMaster"];?></span>

      
      			</a>
      			<ul class="dropdown-menu">
       				<li class="user-body">
       				<div class="pull-right">
       				<a href="salir" class="btn btn-default btn-flat">Salir</a>

       				</div>

       				</li>

       			</ul>
    
      		</li>
      		
      	</ul>
      	
      </div>

       <!-- dropdown toggle es un menu  ===-->
       
  </nav>





</header>