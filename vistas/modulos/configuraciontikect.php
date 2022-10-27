
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-file-pdf-o"></i>
        CONFIGURACIONES IDENTIDAD
      </h1>
    
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">configuraciones</li>
      </ol>
    </section>
    <br>
 <br>
    <!-- Main content -->
  <section class="content">

      <div class="row">

        <div class="col-xs-10">

          <div class="box box-success">
             <main role="main" class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Demostrar capacidades de plugin de impresión</h1>
                <a href="//parzibyte.me/blog">By Parzibyte</a>
                <br>
                <a class="btn btn-danger btn-sm" href="../../index.html">Documentación</a>
            </div>
            <!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
            <div class="col-12 col-lg-6">

                <h2>Ajustes de impresora</h2>
                <strong>Nombre de impresora seleccionada: </strong>
                <p id="impresoraSeleccionada"></p>
                <div class="form-group">
                    <select class="form-control" id="listaDeImpresoras"></select>
                </div>
                <button class="btn btn-primary btn-sm" id="btnRefrescarLista">Refrescar lista</button>
                <button class="btn btn-primary btn-sm" id="btnEstablecerImpresora">Establecer como predeterminada</button>
                <h2>Capacidades</h2>
                <p>Utiliza el siguiente botón para imprimir un recibo de prueba en la impresora predeterminada:</p>
                <button class="btn btn-success" id="btnImprimir">Imprimir ticket</button>

            </div>
            <div class="col-12 col-lg-6">
                <h2>Log</h2>
                <button class="btn btn-warning btn-sm" id="btnLimpiarLog">Limpiar log</button>
                <pre id="estado"></pre>
            </div>
        </div>
    </main>



          </div>

      </div>
      

     </div>

      
  </section>


</div>

<script src="vistas/plugins/impresoratermica/ConectorPlugin.js"></script>
  