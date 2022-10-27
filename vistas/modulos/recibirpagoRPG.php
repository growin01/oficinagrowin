<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Conciliación
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Conciliación</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <!--=================================================
          EL FORMULARIO DE CRERAR VENTAS 

        =======================================================-->

        <div class="col-xs-6">
          
          <div class="box box-success">

            <div class="box-header with-border">
               <div class="form-group">
                       <div class="input-group">   
                      <label>Banco</label>
                       <select type="text" class="form-control col-xs-2" id="Conciliacion" name="Conciliacion" required>
                
                    <?php 
                      if(isset($_GET["Banco"])){

                            $id = "id";
                            $valorid = $_GET["Banco"];
                            $Banco = ControladorBanco::ctrModalEditarBanco($id, $valorid); 
                            echo '<option value="'.$Banco["id"].'">'.$Banco["Nombre_Cuenta"].'</option>';
 
                          }else{
                            echo '<option value="">Seleccionar Banco</option>';

                          }

                                $Rnc_Empresa_Banco = $_SESSION["RncEmpresaUsuario"];

                                $Banco = ControladorBanco::ctrMostrarBanco($Rnc_Empresa_Banco);

                                 foreach ($Banco as $key => $value){

                                  echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';


                            }
                            


                      ?>   

                        </select>
                          
                     
                  </div>
                
                </div>





            </div><!--= cierre box del hear===-->

             <div class="box-body">
              <table border="0" cellspacing="5" cellpadding="5">
              
              <tbody>
                <tr>
                    <td>Fecha Desde:</td>
                    <td><input type="text" id="FechaConMin" name="FechaConMin"></td>
                </tr>

                <tr>
                    <td>Fecha Hasta:</td>
                    <td><input type="text" id="FechaConMax" name="FechaConMax"></td>
              </tr>
            </tbody>

          </table>
          
    <br>



          <table class="table table-bordered table-striped conciliar" width="100%">
             

            <!--*****************CABECERA TABLA  USUARIO********************************* -->
        

              
                     
            <thead>
              <tr>
                
                
                <th style="width:5px">Ref.</th>
                <th>Debito</th>
                <th>Credito</th>
                <th>Mes</th>
                <th>Dia</th>
                <th style="width:10px">Empresa</th>
                <th style="width:10px">NCF</th>
                <th></th>
                
                
               
              </tr>

            
            </thead>
    
            <tbody>
 <!--*****************FILA 1  TABLA  USUARIO********************************* -->
              <?php 

              if(isset($_GET["Banco"])){

              $id = "id";
              $valorid = $_GET["Banco"];
              $Banco = ControladorBanco::ctrModalEditarBanco($id, $valorid);
              
              $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
              $valorid_grupo = $Banco["id_grupo"];
              $valorid_categoria = $Banco["id_categoria"];
              $valorid_generica = $Banco["id_generica"];
              $valorid_cuenta = $Banco["id_cuenta"];
              $valorid_banco = $_GET["Banco"];
              $Ordenmes = "Fecha_AnoMes_Trans";
              $Ordendia = "Fecha_dia_Trans";

              
              $librobanco = ControladorBanco::ctrMostrarLibroBanco($Rnc_Empresa_LD, $valorid_banco, $valorid_grupo, $valorid_categoria, $valorid_generica, $valorid_cuenta, $Ordenmes, $Ordendia);

              

               foreach ($librobanco as $key => $value){

                if($value["Estado_Banco"] == 2){

                 
                
                  

                        echo'<td>'.$value["referencia"].'</td>
                        <td>'.number_format($value["debito"], 2).'</td> 
                        <td>'.number_format($value["credito"], 2).'</td>
                        <td>'.$value["Fecha_AnoMes_Trans"].'</td>
                        <td>'.$value["Fecha_dia_Trans"].'</td>
                        <td>'.$value["Nombre_Empresa"].'</td>
                        <td>'.$value["NCF"].'</td>
                        
                        
                        <td><button class="btn btn-primary btn-xs agregarconciliacion recuperarCuenta" id="'.$value["id"].'" nombre="'.$value["Nombre_Empresa"].'" referencia="'.$value["referencia"].'" fechames="'.$value["Fecha_AnoMes_Trans"].'" fechadia="'.$value["Fecha_dia_Trans"].'" debito="'.$value["debito"].'" credito="'.$value["credito"].'">+</button></td></tr>';

                       
                     

               }

             } /*CIERRE FOR*/


             }/*CIERRE DE IF ISSET*/

               


               ?>


              
            

              

            </tbody>
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->
            
            
          </table>
              

            </div><!--= cierre box del cuerpo ===-->

            
          
        </div><!--= cierre box box da la raya  ===-->
        </div><!--= cierre div el que separa con la tabla ===-->
           

         <!--=================================================
            LA TABLA  DE PRODUCTO

        =======================================================-->

        <div class="col-xs-6">
          


          <div class="box box-warning"> 

          <div class="box-header with-border"> 
             <h3>Estádo de Cuenta</h3>


          </div>

            <div class="box-body">

               <form role="form" method="post" class="formularioConciliacion">

                 <div class="box col-xs-7">

            
             
               
                  <div class="form-group col-xs-5">
                    <div class="input-group">

                  <input type="hidden"  id="RncConciliacion" name="RncConciliacion" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
                  <input type="hidden" class="form-control" id="UsuarioConciliacion" name="UsuarioConciliacion" value="<?php echo $_SESSION["Nombre"]?>">
                   </div>
                  </div>
                  <br>
                  <br>
                        

                   

                   <div class="form-group col-xs-5">
                    <div class="input-group">

                      <label>Saldo Inicial</label>

                     
                    <input type="text" id="SaldoInicial" name="SaldoInicial" value="100.00" required>

                    
                  </div>
                  </div>
                  <br>
                  <br>
                  <br>


                 
        
            
                  
            
                  
            <div class="form-group row nuevaconciliacion">

              <div class="col-xs-12" style="background: #D2F1EC">
                <label class="pull-right" style="padding-right:20px">SALDO</label>
                <label class="pull-right" style="padding-right:60px">CREDITO</label>
                <label class="pull-right" style="padding-right:60px">DEBITO</label>
                <label class="pull-right" style="padding-right:60px">FECHA</label>
                <label class="pull-right" style="padding-right:40px">REF.</label>
                <label class="pull-right" style="padding-right:20px">EMPRESA</label>
              </div>

              <br>
                
 

                   
            

            </div>

            <input class="col-lg-11" type="hidden" id="listaConciliacion" name="listaConciliacion">

                
               
            </div>             
              

            </div>


            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">Conciliar</button>

              
            </div>
              </div>

          </form>
          <?php 

            $conciliacion= new ControladorBanco();
            $conciliacion -> ctrEstatusConcialiacion();




           ?>

              
            </div>
             

          


        </div><!--= cierre box box da la raya  ===-->
        

      </div><!--= cierre div el que separa con la tabla ===-->
           

      
    </section>


   </div>

    