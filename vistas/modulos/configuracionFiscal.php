
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-file-pdf-o"></i>
        CONFIGURACIONES
      </h1>
    
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">configuraciones</li>
      </ol>
    </section>
    <br>

    <!-- Main content -->
  <section class="content">

      <div class="row">

        <div class="col-xs-6">

          <div class="box box-success">
              


       <div class="box-header with-border">
                    <h4>Configuración DGII</h4>
              </div>


               <form role="form" method="post" enctype="multipart/form-data">

                
                    <div class="box">

                      <div class="form-group col-lg-6">

                      <div class="input-group">
                        <label>Usuario DGII</label>
                        <input type="hidden" class="form-control" id="id_EmpresaFiscal" name="id_EmpresaFiscal" value="<?php echo $respuesta["id"];?>">
                        <input type="text" class="form-control" id="RncEmpresa" name="RncEmpresa" value="<?php echo $respuesta["Rnc_Empresa"];?>" readonly>
                          <input type="hidden" class="form-control" id="Usuariologueado" name="Usuariologueado" value="<?php echo $_SESSION["Nombre"]?>" readonly>
                    

                    

                    </div>
                   

                  </div>
                  <div class="form-group col-lg-6">

                      <div class="input-group">
                        <label>Clave DGII</label>


                        
                        <input type="text" class="form-control" id="Clave_DGII" name="Clave_DGII" value="<?php echo $respuesta["Clave_DGII_Empresas"];?>">
                    

                    </div>
                   

                  </div>
                  <label><h4>Tarjeta de Coordenadas</h4></label>
              <!--*****************COMIENZA CORRELATIVOS DE TARGETA DE COORDENADA 1********************************* -->
                  <div class="form-group col-xs-12">

                   <div class="form-group col-xs-2">
                      <div class="input-group">
                        <label>1</label>
                        <input type="text" class="form-control Correlativos" id="Corr_1" name="Corr_1" value="<?php echo $respuesta["Corr_1"];?>"> 
                    </div>
                  </div>

                    <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>11</label>
                        <input type="text" class="form-control Correlativos" id="Corr_11" name="Corr_11" value="<?php echo $respuesta["Corr_11"];?>">
                      
                       </div>
                  </div>

                  <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>21</label>                      
                        <input type="text" class="form-control Correlativos" id="Corr_21" name="Corr_21" value="<?php echo $respuesta["Corr_21"];?>">
                    </div>
                  </div>

                <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>31</label>
                        <input type="text" class="form-control Correlativos" id="Corr_31" name="Corr_31" value="<?php echo $respuesta["Corr_31"];?>">
                    </div>
                   
                </div>
              </div>
                  <!--*****************CIERREDE TARGETA DE COORDENADA 1********************************* -->

<!--*****************COMIENZA CORRELATIVOS DE TARGETA DE COORDENADA 2********************************* -->
                  <div class="form-group col-xs-12">

                   <div class="form-group col-xs-2">
                      <div class="input-group">
                        <label>2</label>
                        <input type="text" class="form-control Correlativos" id="Corr_2" name="Corr_2" value="<?php echo $respuesta["Corr_2"];?>"> 
                    </div>
                  </div>

                    <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>12</label>
                        <input type="text" class="form-control Correlativos" id="Corr_12" name="Corr_12" value="<?php echo $respuesta["Corr_12"];?>">
                      
                       </div>
                  </div>

                  <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>22</label>                      
                        <input type="text" class="form-control Correlativos" id="Corr_22" name="Corr_22" value="<?php echo $respuesta["Corr_22"];?>">
                    </div>
                  </div>

                <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>32</label>
                        <input type="text" class="form-control Correlativos" id="Corr_32" name="Corr_32" value="<?php echo $respuesta["Corr_32"];?>">
                    </div>
                   
                </div>
              </div>
                  <!--*****************CIERREDE TARGETA DE COORDENADA 2********************************* -->
          <!--*****************COMIENZA CORRELATIVOS DE TARGETA DE COORDENADA 3********************************* -->
                  <div class="form-group col-xs-12">

                   <div class="form-group col-xs-2">
                      <div class="input-group">
                        <label>3</label>
                        <input type="text" class="form-control Correlativos" id="Corr_3" name="Corr_3" value="<?php echo $respuesta["Corr_3"];?>"> 
                    </div>
                  </div>

                    <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>13</label>
                        <input type="text" class="form-control Correlativos" id="Corr_13" name="Corr_13" value="<?php echo $respuesta["Corr_13"];?>">
                      
                       </div>
                  </div>

                  <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>23</label>                      
                        <input type="text" class="form-control Correlativos" id="Corr_23" name="Corr_23" value="<?php echo $respuesta["Corr_23"];?>">
                    </div>
                  </div>

                <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>33</label>
                        <input type="text" class="form-control Correlativos" id="Corr_33" name="Corr_33" value="<?php echo $respuesta["Corr_33"];?>">
                    </div>
                   
                </div>
              </div>
                  <!--*****************CIERREDE TARGETA DE COORDENADA 3********************************* -->
<!--*****************COMIENZA CORRELATIVOS DE TARGETA DE COORDENADA 4******************************** -->
                  <div class="form-group col-xs-12">

                   <div class="form-group col-xs-2">
                      <div class="input-group">
                        <label>4</label>
                        <input type="text" class="form-control Correlativos" id="Corr_4" name="Corr_4" value="<?php echo $respuesta["Corr_4"];?>"> 
                    </div>
                  </div>

                    <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>14</label>
                        <input type="text" class="form-control Correlativos" id="Corr_14" name="Corr_14" value="<?php echo $respuesta["Corr_14"];?>">
                      
                       </div>
                  </div>

                  <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>24</label>                      
                        <input type="text" class="form-control Correlativos" id="Corr_24" name="Corr_24" value="<?php echo $respuesta["Corr_24"];?>">
                    </div>
                  </div>

                <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>34</label>
                        <input type="text" class="form-control Correlativos" id="Corr_34" name="Corr_34" value="<?php echo $respuesta["Corr_34"];?>">
                    </div>
                   
                </div>
              </div>
                  <!--*****************CIERREDE TARGETA DE COORDENADA 4********************************* -->
<!--*****************COMIENZA CORRELATIVOS DE TARGETA DE COORDENADA 5******************************** -->
                  <div class="form-group col-xs-12">

                   <div class="form-group col-xs-2">
                      <div class="input-group">
                        <label>5</label>
                        <input type="text" class="form-control Correlativos" id="Corr_5" name="Corr_5" value="<?php echo $respuesta["Corr_5"];?>"> 
                    </div>
                  </div>

                    <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>15</label>
                        <input type="text" class="form-control Correlativos" id="Corr_15" name="Corr_15" value="<?php echo $respuesta["Corr_15"];?>">
                      
                       </div>
                  </div>

                  <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>25</label>                      
                        <input type="text" class="form-control Correlativos" id="Corr_25" name="Corr_25" value="<?php echo $respuesta["Corr_25"];?>">
                    </div>
                  </div>

                <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>35</label>
                        <input type="text" class="form-control Correlativos" id="Corr_35" name="Corr_35" value="<?php echo $respuesta["Corr_35"];?>">
                    </div>
                   
                </div>
              </div>
                  <!--*****************CIERREDE TARGETA DE COORDENADA 5********************************* -->
<!--*****************COMIENZA CORRELATIVOS DE TARGETA DE COORDENADA 6******************************** -->
                  <div class="form-group col-xs-12" >

                   <div class="form-group col-xs-2">
                      <div class="input-group">
                        <label>6</label>
                        <input type="text" class="form-control Correlativos" id="Corr_6" name="Corr_6" value="<?php echo $respuesta["Corr_6"];?>"> 
                    </div>
                  </div>

                    <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>16</label>
                        <input type="text" class="form-control Correlativos" id="Corr_16" name="Corr_16" value="<?php echo $respuesta["Corr_16"];?>">
                      
                       </div>
                  </div>

                  <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>26</label>                      
                        <input type="text" class="form-control Correlativos" id="Corr_26" name="Corr_26" value="<?php echo $respuesta["Corr_26"];?>">
                    </div>
                  </div>

                <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>36</label>
                        <input type="text" class="form-control Correlativos" id="Corr_36" name="Corr_36" value="<?php echo $respuesta["Corr_36"];?>">
                    </div>
                   
                </div>
              </div>
                  <!--*****************CIERREDE TARGETA DE COORDENADA 6********************************* -->
<!--*****************COMIENZA CORRELATIVOS DE TARGETA DE COORDENADA 7******************************** -->
                  <div class="form-group col-xs-12">

                   <div class="form-group col-xs-2">
                      <div class="input-group">
                        <label>7</label>
                        <input type="text" class="form-control Correlativos" id="Corr_7" name="Corr_7" value="<?php echo $respuesta["Corr_7"];?>"> 
                    </div>
                  </div>

                    <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>17</label>
                        <input type="text" class="form-control Correlativos" id="Corr_17" name="Corr_17" value="<?php echo $respuesta["Corr_17"];?>">
                      
                       </div>
                  </div>

                  <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>27</label>                      
                        <input type="text" class="form-control Correlativos" id="Corr_27" name="Corr_27" value="<?php echo $respuesta["Corr_27"];?>">
                    </div>
                  </div>

                <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>37</label>
                        <input type="text" class="form-control Correlativos" id="Corr_37" name="Corr_37" value="<?php echo $respuesta["Corr_37"];?>">
                    </div>
                   
                </div>
              </div>
                  <!--*****************CIERREDE TARGETA DE COORDENADA 7********************************* -->
<!--*****************COMIENZA CORRELATIVOS DE TARGETA DE COORDENADA 8******************************** -->
                  <div class="form-group col-xs-12">

                   <div class="form-group col-xs-2">
                      <div class="input-group">
                        <label>8</label>
                        <input type="text" class="form-control Correlativos" id="Corr_8" name="Corr_8" value="<?php echo $respuesta["Corr_8"];?>"> 
                    </div>
                  </div>

                    <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>18</label>
                        <input type="text" class="form-control Correlativos" id="Corr_18" name="Corr_18" value="<?php echo $respuesta["Corr_18"];?>">
                      
                       </div>
                  </div>

                  <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>28</label>                      
                        <input type="text" class="form-control Correlativos" id="Corr_28" name="Corr_28" value="<?php echo $respuesta["Corr_28"];?>">
                    </div>
                  </div>

                <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>38</label>
                        <input type="text" class="form-control Correlativos" id="Corr_38" name="Corr_38" value="<?php echo $respuesta["Corr_38"];?>">
                    </div>
                   
                </div>
              </div>
                  <!--*****************CIERREDE TARGETA DE COORDENADA 8********************************* -->

<!--*****************COMIENZA CORRELATIVOS DE TARGETA DE COORDENADA 9******************************** -->
                  <div class="form-group col-xs-12">

                   <div class="form-group col-xs-2">
                      <div class="input-group">
                        <label>9</label>
                        <input type="text" class="form-control Correlativos" id="Corr_9" name="Corr_9" value="<?php echo $respuesta["Corr_9"];?>"> 
                    </div>
                  </div>

                    <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>19</label>
                        <input type="text" class="form-control Correlativos" id="Corr_19" name="Corr_19" value="<?php echo $respuesta["Corr_19"];?>">
                      
                       </div>
                  </div>

                  <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>29</label>                      
                        <input type="text" class="form-control Correlativos" id="Corr_29" name="Corr_29" value="<?php echo $respuesta["Corr_29"];?>">
                    </div>
                  </div>

                <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>39</label>
                        <input type="text" class="form-control Correlativos" id="Corr_39" name="Corr_39" value="<?php echo $respuesta["Corr_39"];?>">
                    </div>
                   
                </div>
              </div>
                  <!--*****************CIERREDE TARGETA DE COORDENADA 9********************************* -->
<!--*****************COMIENZA CORRELATIVOS DE TARGETA DE COORDENADA 10******************************** -->
                  <div class="form-group col-xs-12">

                   <div class="form-group col-xs-2">
                      <div class="input-group">
                        <label>10</label>
                        <input type="text" class="form-control Correlativos" id="Corr_10" name="Corr_10" value="<?php echo $respuesta["Corr_10"];?>"> 
                    </div>
                  </div>

                    <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>20</label>
                        <input type="text" class="form-control Correlativos" id="Corr_20" name="Corr_20" value="<?php echo $respuesta["Corr_20"];?>">
                      
                       </div>
                  </div>

                  <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>30</label>                      
                        <input type="text" class="form-control Correlativos" id="Corr_30" name="Corr_30" value="<?php echo $respuesta["Corr_30"];?>">
                    </div>
                  </div>

                <div class="form-group col-xs-2">
                      <div class="input-group">
                         <label>40</label>
                        <input type="text" class="form-control Correlativos" id="Corr_40" name="Corr_40" value="<?php echo $respuesta["Corr_40"];?>">
                    </div>
                   
                </div>
              </div>
                  <!--*****************CIERREDE TARGETA DE COORDENADA 9********************************* -->
 <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

    <h4 style="text-align: center;"><b>Configuración Facturación</b></h4>

                 
  </div> 

              <?php 

              if($_SESSION["Perfil"] == "Programador"){ 
                $Facturacion = $respuesta["Facturacion"]; 

                  switch ($Facturacion){

                     case "0":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Facturación</label>

                      
                     <div class="input-group form-control">

                   
                        <input type="radio" name="Facturacion" value="1" required>SI

                    
                    
                        <input type="radio" name="Facturacion" value="2" required>NO

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;

                    case "2":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Facturación</label>

                      
                     <div class="input-group form-control">

                   
                        <input type="radio" name="Facturacion" value="1" required>SI

                    
                    
                        <input type="radio" name="Facturacion" value="2" required checked>NO

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                   case "1":

              
                  echo '<div class="form-group col-xs-4" style="padding-right: 0px">

                      <div class="input-group">
                         <label>Facturación</label>

                      
                     <div class="input-group form-control">

                   
                        <input type="radio" name="Facturacion" value="1" required checked>SI

                    
                    
                        <input type="radio" name="Facturacion" value="2" required>NO

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                  }
?>
<div class="form-group col-xs-3" style="padding-left: 0px;">
          <div class="input-group">
             <label>% Max. Descuento</label>
          
        <input  class="form-control" type="number" min="0" id="PorDescuento" name="PorDescuento" value="<?php echo $respuesta["Pordescuento"]?>" required>

         </div>
  </div>

<?php   
          $Inventario = $respuesta["Inventario"]; 

        switch ($Inventario){

                     case "1":

              
  echo '<div class="form-group col-lg-5">

          <div class="input-group">
              
              <label>Inventario</label>

                  <div class="input-group form-control">

                    <input type="radio" name="Inventario" value="1" required checked>1-Compra-Venta

                    <input type="radio" name="Inventario" value="2" required>2-Activo-Fijo
                    
                    <input type="radio" name="Inventario" value="3" required>3-
                   
                  </div>  

            </div>
                    
          </div>';
                   break;

                    case "2":

  echo '<div class="form-group col-lg-5">

            <div class="input-group">
                         
                <label>Inventario</label>
  
                     <div class="input-group form-control">

        <input type="radio" name="Inventario" value="1" required>1-Compra-Venta

        <input type="radio" name="Inventario" value="2" required checked>2-Activo Fijo
        
        <input type="radio" name="Inventario" value="3" required>3-

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                   case "3":

              
                  echo '<div class="form-group col-lg-5">

                      <div class="input-group">
                         <label>Inventario</label>

                      
                     <div class="input-group form-control">

                   
        <input type="radio" name="Inventario" value="1" required>1-Compra-Venta

        <input type="radio" name="Inventario" value="2" required >2-Activo Fijo
        
        <input type="radio" name="Inventario" value="3" required checked>3-

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                  }
      ?>

<div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

    <h4 style="text-align: center;"><b>Configuración Contabilidad</b></h4>

                 
  </div> 
  <?php 
                       /*****************CONTABILIDAD********************/
                   $Compras = $respuesta["Compras"]; 

                    
                    switch ($Compras){

                    case "2":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Compras</label>

                      
                     <div class="input-group form-control">

                   
                        <input type="radio" name="Compras" value="1" required>SI

                    
                    
                        <input type="radio" name="Compras" value="2" required checked>NO

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                        case "1":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Compras</label>

                      
                     <div class="input-group form-control">

                   
                        <input type="radio" name="Compras" value="1" required checked>SI

                    
                    
                        <input type="radio" name="Compras" value="2" required>NO

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                  }

                  /*****************CONTABILIDAD********************/
                   $Contabilidad = $respuesta["Contabilidad"]; 

                    
                    switch ($Contabilidad){

                    case "2":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Contabilidad</label>

                      
                     <div class="input-group form-control">

                   
                        <input type="radio" name="Contabilidad" value="1" required>SI

                    
                    
                        <input type="radio" name="Contabilidad" value="2" required checked>NO

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                        case "1":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Contabilidad</label>

                      
                     <div class="input-group form-control">

                   
                        <input type="radio" name="Contabilidad" value="1" required checked>SI

                    
                    
                        <input type="radio" name="Contabilidad" value="2" required>NO

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                  }

                  /*************************************************/ 
                  
                   /*****************BANCO********************/
                   $Banco = $respuesta["Banco"]; 

                    
                    switch ($Banco){

                    case "2":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Banco</label>

                      
                     <div class="input-group form-control">

                   
                        <input type="radio" name="Banco" value="1" required>SI

                    
                    
                        <input type="radio" name="Banco" value="2" required checked>NO

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                        case "1":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Banco</label>

                      
                     <div class="input-group form-control">

                   
                        <input type="radio" name="Banco" value="1" required checked>SI

                    
                    
                        <input type="radio" name="Banco" value="2" required>NO

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                  }

                  /*************************************************/ 
                  /*****************BANCO********************/
                   $Proyecto = $respuesta["Proyecto"]; 

                    
                    switch ($Proyecto){

                    case "2":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Proyecto</label>

                      
                     <div class="input-group form-control">

                   
                        <input type="radio" name="Proyecto" value="1" required>SI

                    
                    
                        <input type="radio" name="Proyecto" value="2" required checked>NO

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                        case "1":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Proyecto</label>

                      
                     <div class="input-group form-control">

                   
                        <input type="radio" name="Proyecto" value="1" required checked>SI

                    
                    
                        <input type="radio" name="Proyecto" value="2" required>NO

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                  }

                  /*************************************************/ 

                  }
                  ?>
        
          

              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Modificar </button>

              
              </div>
              

          </form>
          <?php 

           

            $ConfiSocial = new ControladorEmpresas();
            $ConfiSocial -> ctrEditarConfiFiscal();





           ?>     


          </div>

          </div>
        
        </div>
       
       <div class="col-xs-6">


          <div class="box box-warning">
            <div class="box-header with-border">
                    <h4 class="pull-left">Configuración TSS</h4>

              </div>


               <form role="form" method="post" enctype="multipart/form-data">

                
                    <div class="box">

                      <div class="form-group col-lg-4">

                      <div class="input-group">
                        <label>RNC o Cédula</label>
                        <input type="hidden" class="form-control" id="id_EmpresaTSS" name="id_EmpresaTSS" value="<?php echo $respuesta["id"];?>">
                        <input type="hidden" class="form-control" id="Usuariologueado" name="Usuariologueado" value="<?php echo $_SESSION["Nombre"]?>" readonly>
                        <input type="text" class="form-control" id="RncocedulaTSS" name="RncocedulaTSS" value="<?php echo $respuesta["Rnc_Empresa"];?>" readonly>
                        
                    
                    

                    </div>
                   

                  </div>
                  <div class="form-group col-lg-4">

                      <div class="input-group">
                        <label>Cédula</label>


                        
                        <input type="text" class="form-control" id="CedulaTSS" name="CedulaTSS" value="<?php echo $respuesta["CedulaTSS"];?>">
                    

                    </div>
                   

                  </div>
                  
           <div class="form-group col-lg-4">

                      <div class="input-group">
                        <label>CLASS</label>


                        
                        <input type="text" class="form-control" id="ClaveTSS" name="ClaveTSS" value="<?php echo $respuesta["ClaveTSS"];?>">
                    

                    </div>
                   

            </div>
                 

              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Modificar </button>

              
              </div>
              

          </form>
          <?php 

           

            $ConfiTSS = new ControladorEmpresas();
            $ConfiTSS -> ctrEditarConfiTSS();





           ?>     
     
          </div>

      </div>
      

      </div>

      
  </section>


</div>

  