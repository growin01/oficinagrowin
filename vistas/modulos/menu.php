<aside class="main-sidebar sidebar-dark-primary elevation-4">

	<section class="sidebar">
		<ul class="sidebar-menu sidebar-toggle-btn">
			<li class="active">
				<a href="inicio">
					<i class="fa fa-home"></i>
					<span>Inicio</span>
				</a>
			</li>
			<?php 
			$PerfilUsuario = $_SESSION["Perfil"];
			$Facturacion = $_SESSION["Facturacion"];
			$Compras = $_SESSION["Compras"];
			$Banco = $_SESSION["Banco"];
			$Contabilidad = $_SESSION["Contabilidad"];
			$Proyecto = $_SESSION["Proyecto"];

			
			 ?>
			 
			<?php 
		switch ($PerfilUsuario) {
			case 'Programador':
			echo'
			<li class="treeview">
				<a href="">
					<i class="fa fa-user-plus"></i>
					<span>Agregar Usuarios</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li class="">
							<a href="usuarios">
								<i class="fa fa-user"></i>
								<span>Usuarios</span>
							</a>
						</li>

						<li class="">
							<a href="clientes">
								<i class="fa fa-users"></i>
								<span>Clientes</span>
							</a>
						</li>

						<li class="">
							<a href="suplidores">
								<i class="fa fa-thumbs-up"></i>
								<span>Suplidores</span>
							</a>
						</li>
													
						

						
						
					</ul>
			</li> 
			';
					
						
			break;
			case 'Gerente':
			echo'
			<li class="treeview">
				<a href="">
					<i class="fa fa-user-plus"></i>
					<span>Agregar Usuarios</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li class="">
							<a href="usuarios">
								<i class="fa fa-user"></i>
								<span>Usuarios</span>
							</a>
						</li>

						<li class="">
							<a href="clientes">
								<i class="fa fa-users"></i>
								<span>Clientes</span>
							</a>
						</li>

						<li class="">
							<a href="suplidores">
								<i class="fa fa-thumbs-up"></i>
								<span>Suplidores</span>
							</a>
						</li>
													
						

						
						
					</ul>
			</li> 
			';
					
						
			break;
	
			case 'Administrador':
			echo'
			<li class="treeview">
				<a href="">
					<i class="fa fa-user-plus"></i>
					<span>Agregar Usuarios</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li class="">
							<a href="usuarios">
								<i class="fa fa-user"></i>
								<span>Usuarios</span>
							</a>
						</li>

						<li class="">
							<a href="clientes">
								<i class="fa fa-users"></i>
								<span>Clientes</span>
							</a>
						</li>

						<li class="">
							<a href="suplidores">
								<i class="fa fa-thumbs-up"></i>
								<span>Suplidores</span>
							</a>
						</li>
													
						

						
						
					</ul>
			</li> 
			';
					
						
			break;
			case 'Especialista':
			echo'
			<li class="treeview">
				<a href="">
					<i class="fa fa-user-plus"></i>
					<span>Agregar Usuarios</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li class="">
							<a href="usuarios">
								<i class="fa fa-user"></i>
								<span>Usuarios</span>
							</a>
						</li>

						<li class="">
							<a href="clientes">
								<i class="fa fa-users"></i>
								<span>Clientes</span>
							</a>
						</li>

						<li class="">
							<a href="suplidores">
								<i class="fa fa-thumbs-up"></i>
								<span>Suplidores</span>
							</a>
						</li>
													
						

						
						
					</ul>
			</li> 
			';
					
						
			break;
					
		}
			

			 ?>

			
			<?php  
		if($Facturacion == "1"){

			switch ($PerfilUsuario) {
				case 'Programador':
					echo '<li class="treeview">
				<a href="">
					<i class="fa fa-th"></i>
					<span>Inventario</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

				<ul class="treeview-menu">	
		
						<li class="">
							<a href="categorias">
								<i class="fa fa-th"></i>
								<span>Categorías</span>
							</a>
						</li>

						<li class="">
							<a href="productos">
								<i class="glyphicon glyphicon-barcode"></i>
								<span>Productos</span>
							</a>
						</li>
						<li class="">
							<a href="productosresumen">
								<i class="fa fa-pie-chart"></i>
								<span>Análisis de Inventario</span>
							</a>
						</li>
						<li class="">
							<a href="librodeinventario">
								<i class="fa fa-book"></i>
								<span>Libro de Inventario</span>
							</a>
						</li>
				</ul>
			</li>



			';
						// code...
						
				break;
					case 'Gerente':
					echo '<li class="treeview">
				<a href="">
					<i class="fa fa-th"></i>
					<span>Inventario</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

				<ul class="treeview-menu">	
		
						<li class="">
							<a href="categorias">
								<i class="fa fa-th"></i>
								<span>Categorías</span>
							</a>
						</li>

						<li class="">
							<a href="productos">
								<i class="glyphicon glyphicon-barcode"></i>
								<span>Productos</span>
							</a>
						</li>
						<li class="">
							<a href="productosresumen">
								<i class="fa fa-pie-chart"></i>
								<span>Análisis de Inventario</span>
							</a>
						</li>
						<li class="">
							<a href="librodeinventario">
								<i class="fa fa-book"></i>
								<span>Libro de Inventario</span>
							</a>
						</li>
				</ul>
			</li>';
			break;
			case 'Administrador':
					echo '<li class="treeview">
				<a href="">
					<i class="fa fa-th"></i>
					<span>Inventario</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

				<ul class="treeview-menu">	
		
						<li class="">
							<a href="categorias">
								<i class="fa fa-th"></i>
								<span>Categorías</span>
							</a>
						</li>

						<li class="">
							<a href="productos">
								<i class="glyphicon glyphicon-barcode"></i>
								<span>Productos</span>
							</a>
						</li>
						<li class="">
							<a href="productosresumen">
								<i class="fa fa-book"></i>
								<span>Análisis de Inventario</span>
							</a>
						</li>
						<li class="">
							<a href="librodeinventario">
								<i class="fa fa-book"></i>
								<span>Libro de Inventario</span>
							</a>
						</li>
				</ul>
			</li>';
			break;
			case 'Especialista':
					echo '<li class="treeview">
				<a href="">
					<i class="fa fa-th"></i>
					<span>Inventario</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

				<ul class="treeview-menu">	
		
						<li class="">
							<a href="categorias">
								<i class="fa fa-th"></i>
								<span>Categorías</span>
							</a>
						</li>

						<li class="">
							<a href="productos">
								<i class="glyphicon glyphicon-barcode"></i>
								<span>Productos</span>
							</a>
						</li>
						<li class="">
							<a href="productosresumen">
								<i class="fa fa-pie-chart"></i>
								<span>Análisis de Inventario</span>
							</a>
						</li>
						<li class="">
							<a href="librodeinventario">
								<i class="fa fa-book"></i>
								<span>Libro de Inventario</span>
							</a>
						</li>
				</ul>
			</li>



			';
						// code...
						
				break;



				}
				
			}
	if($Facturacion == "1"){

			switch ($PerfilUsuario) {
				case 'Programador':
					echo '<li class="treeview">
<a href="">
	
	<i class="fa fa-file-pdf-o"></i>
	<span>Facturación</span>
	<span class="pull-right-container">
	<i class="fa fa-angle-left pull-right"></i>
	</span>
</a>

	<ul class="treeview-menu">
	    <li>
			<a href="cotizaciones">
<i class="glyphicon glyphicon-saved"></i>
<span>Cotización</span>
			</a>
		</li>
		<li>
			<a href="ventasrecurrentes">
				<i class="glyphicon glyphicon-saved"></i>
				<span>Facturación Recurrentes</span>
			</a>
		</li>
		<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Facturar</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="crear-ventas">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura</span>
									</a>
								</li>
								<li>
									<a href="crear-ventas-pro">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura Proforma</span>
									</a>
								</li>
								
								
							</ul>

		</li>
		<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>POS</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="crear-pos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura POS</span>
									</a>
								</li>
								<li>
									<a href="crear-pos-pro">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura POS Proforma</span>
									</a>
								</li>
								
								
							</ul>

		</li>
		
		<li>
			<a href="ventas">
<i class="fa fa-server"></i>
<span>Detalles Ventas</span>
			</a>
		</li>

		
		<li class="treeview">
			<a href="">
<i class="fa fa-server"></i>
<span>Cuentas Por Cobrar</span>
			</a>
			<ul class="treeview-menu">
			

<li>
	<a href="reportecxc">
		<i class="fa fa-server"></i>
		<span>Cuentas Por Cobrar</span>
	</a>
</li>
<li>
	<a href="detallerecibodecobro">
		<i class="fa fa-server"></i>
		<span>Detalle de Recibo de Cobro</span>
	</a>
</li>
<li>
	<a href="detallecobroindividual">
		<i class="fa fa-server"></i>
		<span>Cobros Por Clientes</span>
	</a>
</li>
<li>
	<a href="clientesvscobro">
		<i class="fa fa-server"></i>
		<span>Analisis Cliente Vs Cobro</span>
	</a>
</li>
<li>
	<a href="cobroperiodo">
		<i class="fa fa-server"></i>
		<span>Cobro Por Periodo</span>
	</a>
</li>
	

			</ul>

		</li>



		<li class="treeview">
			<a href="">
<i class="fa fa-server"></i>
<span>Detalles de Recibo de Depósito</span>
			</a>
			<ul class="treeview-menu">
			

<li>
	<a href="reportevc">
		<i class="fa fa-server"></i>
		<span>Ventas de Contado</span>
	</a>
</li>
<li>
	<a href="detallerecibodedeposito">
		<i class="fa fa-server"></i>
		<span>Detalle Recibo de Deposito</span>
	</a>
</li>



			</ul>

		</li>



		<li>
			<a href="reporte">
<i class="fa fa-pie-chart"></i>
<span>Informen de Ventas</span>
			</a>
		</li>



	</ul>
			</li>';
		// code...';
						
				break;
				
				case 'Gerente':
					echo '<li class="treeview">
<a href="">
	
	<i class="fa fa-file-pdf-o"></i>
	<span>Facturación</span>
	<span class="pull-right-container">
	<i class="fa fa-angle-left pull-right"></i>
	</span>
</a>

	<ul class="treeview-menu">
	    <li>
			<a href="cotizaciones">
<i class="glyphicon glyphicon-saved"></i>
<span>Cotización</span>
			</a>
		</li>
		<li>
			<a href="ventasrecurrentes">
				<i class="glyphicon glyphicon-saved"></i>
				<span>Facturación Recurrentes</span>
			</a>
		</li>
		<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Facturar</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="crear-ventas">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura</span>
									</a>
								</li>
								<li>
									<a href="crear-ventas-pro">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura Proforma</span>
									</a>
								</li>
								
								
							</ul>

		</li>
		<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>POS</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="crear-pos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura POS</span>
									</a>
								</li>
								<li>
									<a href="crear-pos-pro">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura POS Proforma</span>
									</a>
								</li>
								
								
							</ul>

		</li>
		
		<li>

		<li>
			<a href="ventas">
<i class="fa fa-server"></i>
<span>Detalles Ventas</span>
			</a>
		</li>

		
		<li class="treeview">
			<a href="">
<i class="fa fa-server"></i>
<span>Cuentas Por Cobrar</span>
			</a>
			<ul class="treeview-menu">
			

<li>
	<a href="reportecxc">
		<i class="fa fa-server"></i>
		<span>Cuentas Por Cobrar</span>
	</a>
</li>
<li>
	<a href="detallerecibodecobro">
		<i class="fa fa-server"></i>
		<span>Detalle de Recibo de Cobro</span>
	</a>
</li>
<li>
	<a href="detallecobroindividual">
		<i class="fa fa-server"></i>
		<span>Cobro Por Clientes</span>
	</a>
</li>
<li>
	<a href="clientesvscobro">
		<i class="fa fa-server"></i>
		<span>Analisis Cliente Vs Cobro</span>
	</a>
</li>
<li>
	<a href="cobroperiodo">
		<i class="fa fa-server"></i>
		<span>Cobro Por Periodo</span>
	</a>
</li>
			</ul>

		</li>


		<li class="treeview">
			<a href="">
<i class="fa fa-server"></i>
<span>Detalles de Recibo de Depósito</span>
			</a>
			<ul class="treeview-menu">
			

<li>
	<a href="reportevc">
		<i class="fa fa-server"></i>
		<span>Ventas de Contado</span>
	</a>
</li>
<li>
	<a href="detallerecibodedeposito">
		<i class="fa fa-server"></i>
		<span>Detalle Recibo de Deposito</span>
	</a>
</li>



			</ul>

		</li>



		<li>
			<a href="reporte">
<i class="fa fa-pie-chart"></i>
<span>Informen de Ventas</span>
			</a>
		</li>



	</ul>
			</li>';
		// code...';
				break;
				
				case 'Administrador':
					echo '<li class="treeview">
<a href="">
	
	<i class="fa fa-file-pdf-o"></i>
	<span>Facturación</span>
	<span class="pull-right-container">
	<i class="fa fa-angle-left pull-right"></i>
	</span>
</a>

	<ul class="treeview-menu">
	    <li>
			<a href="cotizaciones">
<i class="glyphicon glyphicon-saved"></i>
<span>Cotización</span>
			</a>
		</li>
		<li>
			<a href="ventasrecurrentes">
				<i class="glyphicon glyphicon-saved"></i>
				<span>Facturación Recurrentes</span>
			</a>
		</li>
		<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Facturar</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="crear-ventas">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura</span>
									</a>
								</li>
								<li>
									<a href="crear-ventas-pro">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura Proforma</span>
									</a>
								</li>
								
								
							</ul>

						</li>
		
		<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>POS</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="crear-pos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura POS</span>
									</a>
								</li>
								<li>
									<a href="crear-pos-pro">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura POS Proforma</span>
									</a>
								</li>
								
								
							</ul>

		</li>

		<li>
			<a href="ventas">
<i class="fa fa-server"></i>
<span>Detalles Ventas</span>
			</a>
		</li>

		
		<li class="treeview">
			<a href="">
<i class="fa fa-server"></i>
<span>Cuentas Por Cobrar</span>
			</a>
			<ul class="treeview-menu">
			

<li>
	<a href="reportecxc">
		<i class="fa fa-server"></i>
		<span>Cuentas Por Cobrar</span>
	</a>
</li>
<li>
	<a href="detallerecibodecobro">
		<i class="fa fa-server"></i>
		<span>Detalle de Recibo de Cobro</span>
	</a>
</li>
<li>
	<a href="detallecobroindividual">
		<i class="fa fa-server"></i>
		<span>Cobro Por Clientes</span>
	</a>
</li>
<li>
	<a href="clientesvscobro">
		<i class="fa fa-server"></i>
		<span>Analisis Cliente Vs Cobro</span>
	</a>
</li>
<li>
	<a href="cobroperiodo">
		<i class="fa fa-server"></i>
		<span>Cobro Por Periodo</span>
	</a>
</li>

			</ul>

		</li>


		<li class="treeview">
			<a href="">
<i class="fa fa-server"></i>
<span>Detalles de Recibo de Depósito</span>
			</a>
			<ul class="treeview-menu">
			

<li>
	<a href="reportevc">
		<i class="fa fa-server"></i>
		<span>Ventas de Contado</span>
	</a>
</li>
<li>
	<a href="detallerecibodedeposito">
		<i class="fa fa-server"></i>
		<span>Detalle Recibo de Deposito</span>
	</a>
</li>



			</ul>

		</li>



		<li>
			<a href="reporte">
<i class="fa fa-pie-chart"></i>
<span>Informen de Ventas</span>
			</a>
		</li>



	</ul>
			</li>';
		break;

				case 'Especialista':
					echo '<li class="treeview">
<a href="">
	
	<i class="fa fa-file-pdf-o"></i>
	<span>Facturación</span>
	<span class="pull-right-container">
	<i class="fa fa-angle-left pull-right"></i>
	</span>
</a>

	<ul class="treeview-menu">
	    <li>
			<a href="cotizaciones">
<i class="glyphicon glyphicon-saved"></i>
<span>Cotización</span>
			</a>
		</li>
		<li>
			<a href="ventasrecurrentes">
				<i class="glyphicon glyphicon-saved"></i>
				<span>Facturación Recurrentes</span>
			</a>
		</li>
		
		<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Facturar</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="crear-ventas">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura</span>
									</a>
								</li>
								<li>
									<a href="crear-ventas-pro">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura Proforma</span>
									</a>
								</li>
								
								
							</ul>

						</li>
		
		<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>POS</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="crear-pos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura POS</span>
									</a>
								</li>
								<li>
									<a href="crear-pos-pro">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura POS Proforma</span>
									</a>
								</li>
								
								
							</ul>

		</li>

		<li>
			<a href="ventas">
<i class="fa fa-server"></i>
<span>Detalles Ventas</span>
			</a>
		</li>

		
		<li class="treeview">
			<a href="">
<i class="fa fa-server"></i>
<span>Cuentas Por Cobrar</span>
			</a>
			<ul class="treeview-menu">
			

<li>
	<a href="reportecxc">
		<i class="fa fa-server"></i>
		<span>Cuentas Por Cobrar</span>
	</a>
</li>
<li>
	<a href="detallerecibodecobro">
		<i class="fa fa-server"></i>
		<span>Detalle de Recibo de Cobro</span>
	</a>
</li>
<li>
	<a href="detallecobroindividual">
		<i class="fa fa-server"></i>
		<span>Cobro Por Clientes</span>
	</a>
</li>

<li>
	<a href="clientesvscobro">
		<i class="fa fa-server"></i>
		<span>Analisis Cliente Vs Cobro</span>
	</a>
</li>
<li>
	<a href="cobroperiodo">
		<i class="fa fa-server"></i>
		<span>Cobro Por Periodo</span>
	</a>
</li>

			</ul>

		</li>


		<li class="treeview">
			<a href="">
<i class="fa fa-server"></i>
<span>Detalles de Recibo de Depósito</span>
			</a>
			<ul class="treeview-menu">
			

<li>
	<a href="reportevc">
		<i class="fa fa-server"></i>
		<span>Ventas de Contado</span>
	</a>
</li>
<li>
	<a href="detallerecibodedeposito">
		<i class="fa fa-server"></i>
		<span>Detalle Recibo de Deposito</span>
	</a>
</li>



			</ul>

		</li>



		<li>
			<a href="reporte">
<i class="fa fa-pie-chart"></i>
<span>Informen de Ventas</span>
			</a>
		</li>



	</ul>
			</li>';
		// code...';
						// code...
						
				break;
				case 'Vendedor':
					echo '<li class="treeview">
<a href="">
	
	<i class="fa fa-file-pdf-o"></i>
	<span>Facturación</span>
	<span class="pull-right-container">
	<i class="fa fa-angle-left pull-right"></i>
	</span>
</a>

	<ul class="treeview-menu">
	    <li>
			<a href="cotizaciones">
				<i class="glyphicon glyphicon-saved"></i>
				<span>Cotización</span>
			</a>
		</li>
		
		
		<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Facturar</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="crear-ventas">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura</span>
									</a>
								</li>
								<li>
									<a href="crear-ventas-pro">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura Proforma</span>
									</a>
								</li>
								
								
							</ul>

						</li>
		
		<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>POS</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="crear-pos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura POS</span>
									</a>
								</li>
								<li>
									<a href="crear-pos-pro">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Factura POS Proforma</span>
									</a>
								</li>
								
								
							</ul>

		</li>

		<li>
			<a href="ventas">
<i class="fa fa-server"></i>
<span>Detalles Ventas</span>
			</a>
		</li>

		
		<li class="treeview">
			<a href="">
<i class="fa fa-server"></i>
<span>Cuentas Por Cobrar</span>
			</a>
			<ul class="treeview-menu">
			

<li>
	<a href="reportecxc">
		<i class="fa fa-server"></i>
		<span>Cuentas Por Cobrar</span>
	</a>
</li>
<li>
	<a href="detallerecibodecobro">
		<i class="fa fa-server"></i>
		<span>Detalle de Recibo de Cobro</span>
	</a>
</li>
<li>
	<a href="detallecobroindividual">
		<i class="fa fa-server"></i>
		<span>Cobro Por Clientes</span>
	</a>
</li>
<li>
	<a href="clientesvscobro">
		<i class="fa fa-server"></i>
		<span>Analisis Cliente Vs Cobro</span>
	</a>
</li>

			</ul>

		</li>


		<li class="treeview">
			<a href="">
<i class="fa fa-server"></i>
<span>Detalles de Recibo de Depósito</span>
			</a>
			<ul class="treeview-menu">
			

<li>
	<a href="reportevc">
		<i class="fa fa-server"></i>
		<span>Ventas de Contado</span>
	</a>
</li>
<li>
	<a href="detallerecibodedeposito">
		<i class="fa fa-server"></i>
		<span>Detalle Recibo de Deposito</span>
	</a>
</li>



			</ul>

		</li>



		<li>
			<a href="reporte">
<i class="fa fa-pie-chart"></i>
<span>Informen de Ventas</span>
			</a>
		</li>



	</ul>
			</li>';
		// code...';
						// code...
						
				break;




				}
				
			}
			if($Compras == "1"){
				switch ($PerfilUsuario) {
	case 'Programador':
	echo '	   
			 <li class="treeview">
				<a href="">
					<i class="fa fa-shopping-cart"></i>
					<span>Compras</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="">
								<i class="fa fa-circle-o"></i>
								<span>Orden de Pago</span>
							</a>
						</li>
						<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Compra</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="crear-compra-gastosgenerales">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Compra General</span>
									</a>
								</li>
								<li>
									<a href="crear-compra-inventario">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Inventario de Mercancia</span>
									</a>
								</li>
								
								
							</ul>

						</li>
						<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Compra Proforma</span>
							</a>
							<ul class="treeview-menu">
							
								<li>
									<a href="crear-compra-gastosgeneralesNo">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Compra General Proforma</span>
									</a>
								</li>
								<li>
									<a href="crear-compra-inventarioNo">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Inventario de Mercancia Pro</span>
									</a>
								</li>
								
								
							</ul>

						</li>
						<li>
							<a href="compras">
								<i class="fa fa-server"></i>
								<span>Detalles Compras</span>
							</a>
						</li>



						<li class="treeview">
							<a href="">
								<i class="fa fa-server"></i>
								<span>Cuentas Por Pagar</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="recibodepago">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Orden de Pago Facturas</span>
									</a>
								</li>
								
								<li>
									<a href="reportecxp">
										<i class="fa fa-server"></i>
										<span>Cuentas Por Pagar</span>
									</a>
								</li>
								<li>
									<a href="detallerecibodepago">
										<i class="fa fa-server"></i>
										<span>Detalle de Recibo de Pago</span>
									</a>
								</li>
								<li>
									<a href="detallepagoindividual">
										<i class="fa fa-server"></i>
										<span>Facturas con Pagos</span>
									</a>
								</li>
								<li>
									<a href="pagoperiodo">
										<i class="fa fa-server"></i>
										<span>Pago con Periodo</span>
									</a>
								</li>
								
							</ul>

						</li>



					</ul>
			</li>


			';

					
						
	break;
	case 'Gerente':
	echo '	   
			 <li class="treeview">
				<a href="">
					<i class="fa fa-shopping-cart"></i>
					<span>Compras</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="">
								<i class="fa fa-circle-o"></i>
								<span>Orden de Pago</span>
							</a>
						</li>
						<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Compra</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="crear-compra-gastosgenerales">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Compra General</span>
									</a>
								</li>
								<li>
									<a href="crear-compra-inventario">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Inventario de Mercancia</span>
									</a>
								</li>
								
								
							</ul>

						</li>
						<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Compra Proforma</span>
							</a>
							<ul class="treeview-menu">
							
								<li>
									<a href="crear-compra-gastosgeneralesNo">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Compra General Proforma</span>
									</a>
								</li>
								<li>
									<a href="crear-compra-inventarioNo">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Inventario de Mercancia Pro</span>
									</a>
								</li>
								
								
							</ul>

						</li>
						<li>
							<a href="compras">
								<i class="fa fa-server"></i>
								<span>Detalles Compras</span>
							</a>
						</li>



						<li class="treeview">
							<a href="">
								<i class="fa fa-server"></i>
								<span>Cuentas Por Pagar</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="recibodepago">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Orden de Pago Facturas</span>
									</a>
								</li>
								
								<li>
									<a href="reportecxp">
										<i class="fa fa-server"></i>
										<span>Cuentas Por Pagar</span>
									</a>
								</li>
								<li>
									<a href="detallerecibodepago">
										<i class="fa fa-server"></i>
										<span>Detalle de Recibo de Pago</span>
									</a>
								</li>
								<li>
									<a href="detallepagoindividual">
										<i class="fa fa-server"></i>
										<span>Facturas con Pagos</span>
									</a>
								</li>
								<li>
									<a href="pagoperiodo">
										<i class="fa fa-server"></i>
										<span>Pago con Periodo</span>
									</a>
								</li>
								
							</ul>

						</li>



					</ul>
			</li>


			';

					
						
	break;
	
	case 'Administrador':
	echo '	   
			 <li class="treeview">
				<a href="">
					<i class="fa fa-shopping-cart"></i>
					<span>Compras</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="">
								<i class="fa fa-circle-o"></i>
								<span>Orden de Pago</span>
							</a>
						</li>
						<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Compra</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="crear-compra-gastosgenerales">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Compra General</span>
									</a>
								</li>
								<li>
									<a href="crear-compra-inventario">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Inventario de Mercancia</span>
									</a>
								</li>
								
								
							</ul>

						</li>
						<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Compra Proforma</span>
							</a>
							<ul class="treeview-menu">
							
								<li>
									<a href="crear-compra-gastosgeneralesNo">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Compra General Proforma</span>
									</a>
								</li>
								<li>
									<a href="crear-compra-inventarioNo">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Inventario de Mercancia Pro</span>
									</a>
								</li>
								
								
							</ul>

						</li>
						<li>
							<a href="compras">
								<i class="fa fa-server"></i>
								<span>Detalles Compras</span>
							</a>
						</li>



						<li class="treeview">
							<a href="">
								<i class="fa fa-server"></i>
								<span>Cuentas Por Pagar</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="recibodepago">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Orden de Pago Facturas</span>
									</a>
								</li>
								
								<li>
									<a href="reportecxp">
										<i class="fa fa-server"></i>
										<span>Cuentas Por Pagar</span>
									</a>
								</li>
								<li>
									<a href="detallerecibodepago">
										<i class="fa fa-server"></i>
										<span>Detalle de Recibo de Pago</span>
									</a>
								</li>
								<li>
									<a href="detallepagoindividual">
										<i class="fa fa-server"></i>
										<span>Facturas con Pagos</span>
									</a>
								</li>
								<li>
									<a href="pagoperiodo">
										<i class="fa fa-server"></i>
										<span>Pago con Periodo</span>
									</a>
								</li>
								
							</ul>

						</li>



					</ul>
			</li>


			';

					
						
	break;
	case 'Especialista':
	echo '	   
			 <li class="treeview">
				<a href="">
					<i class="fa fa-shopping-cart"></i>
					<span>Compras</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="">
								<i class="fa fa-circle-o"></i>
								<span>Orden de Pago</span>
							</a>
						</li>
						<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Compra</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="crear-compra-gastosgenerales">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Compra General</span>
									</a>
								</li>
								<li>
									<a href="crear-compra-inventario">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Inventario de Mercancia</span>
									</a>
								</li>
								
								
							</ul>

						</li>
						<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Compra Proforma</span>
							</a>
							<ul class="treeview-menu">
							
								<li>
									<a href="crear-compra-gastosgeneralesNo">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Compra General Proforma</span>
									</a>
								</li>
								<li>
									<a href="crear-compra-inventarioNo">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Inventario de Mercancia Pro</span>
									</a>
								</li>
								
								
							</ul>

						</li>
						<li>
							<a href="compras">
								<i class="fa fa-server"></i>
								<span>Detalles Compras</span>
							</a>
						</li>



						<li class="treeview">
							<a href="">
								<i class="fa fa-server"></i>
								<span>Cuentas Por Pagar</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="recibodepago">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Orden de Pago Facturas</span>
									</a>
								</li>
								
								<li>
									<a href="reportecxp">
										<i class="fa fa-server"></i>
										<span>Cuentas Por Pagar</span>
									</a>
								</li>
								<li>
									<a href="detallerecibodepago">
										<i class="fa fa-server"></i>
										<span>Detalle de Recibo de Pago</span>
									</a>
								</li>
								<li>
									<a href="detallepagoindividual">
										<i class="fa fa-server"></i>
										<span>Facturas con Pagos</span>
									</a>
								</li>
								<li>
									<a href="pagoperiodo">
										<i class="fa fa-server"></i>
										<span>Pago con Periodo</span>
									</a>
								</li>
								
							</ul>

						</li>



					</ul>
			</li>


			';

					
						
	break;

					
	}
				
			}

			 ?>
			 <?php 

			 switch ($PerfilUsuario) {
	case 'Programador':
		  echo '<li class="treeview">
				<a href="">
					<i class="fa fa-industry"></i>
					<span>Activos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						
						<li class="treeview">
							<a href="">
								<i class="fa fa-industry"></i>
								<span>Activo Rotativo</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="CategoriasActivoRotativos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Categorias Activo Rotativo</span>
									</a>
								</li>
								<li>
									<a href="ProductosActivoRotativos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Productos Activo Rotativos</span>
									</a>
								</li>
								
								
							</ul>

						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-industry"></i>
								<span>Activo Fijos</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="CategoriasActivoFijo">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Categorias Activo Fijo</span>
									</a>
								</li>
								<li class="">
									<a href=crear-producto-activofijo>
									<i class="glyphicon glyphicon-barcode"></i>
									<span>Productos Activo Fijo</span>
									</a>
								</li>
								<li>
									<a href="crear-compra-inventario">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Inventario de Mercancia</span>
									</a>
								</li>
								
								
							</ul>

						</li>
						
					

					</ul>
			</li>

		
			
			 <li class="treeview">
				<a href="">
					<i class="fa fa-list-ul"></i>
					<span>TSS Nómina</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="empleados">
								<i class="fa fa-circle-o"></i>
								<span>Empleados</span>
							</a>
						</li>

						

					</ul>
			</li>';

					
						
	break;
	case 'Gerente':
		  echo '<li class="treeview">
				<a href="">
					<i class="fa fa-industry"></i>
					<span>Activos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						
						<li class="treeview">
							<a href="">
								<i class="fa fa-industry"></i>
								<span>Activo Rotativo</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="CategoriasActivoRotativos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Categorias Activo Rotativo</span>
									</a>
								</li>
								<li>
									<a href="ProductosActivoRotativos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Productos Activo Rotativos</span>
									</a>
								</li>
								
								
							</ul>

						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-industry"></i>
								<span>Activo Fijos</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="CategoriasActivoFijo">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Categorias Activo Fijo</span>
									</a>
								</li>
								<li class="">
									<a href=crear-producto-activofijo>
									<i class="glyphicon glyphicon-barcode"></i>
									<span>Productos Activo Fijo</span>
									</a>
								</li>
								<li>
									<a href="crear-compra-inventario">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Inventario de Mercancia</span>
									</a>
								</li>
								
								
							</ul>

						</li>
						
					

					</ul>
			</li>

		
			
			 <li class="treeview">
				<a href="">
					<i class="fa fa-list-ul"></i>
					<span>TSS Nómina</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="empleados">
								<i class="fa fa-circle-o"></i>
								<span>Empleados</span>
							</a>
						</li>

						

					</ul>
			</li>';

					
						
	break;
	
	case 'Administrador':
		  echo '<li class="treeview">
				<a href="">
					<i class="fa fa-industry"></i>
					<span>Activos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						
						<li class="treeview">
							<a href="">
								<i class="fa fa-industry"></i>
								<span>Activo Rotativo</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="CategoriasActivoRotativos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Categorias Activo Rotativo</span>
									</a>
								</li>
								<li>
									<a href="ProductosActivoRotativos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Productos Activo Rotativos</span>
									</a>
								</li>
								
								
							</ul>

						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-industry"></i>
								<span>Activo Fijos</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="CategoriasActivoFijo">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Categorias Activo Fijo</span>
									</a>
								</li>
								<li>
								<li class="">
									<a href=crear-producto-activofijo>
									<i class="glyphicon glyphicon-barcode"></i>
									<span>Productos Activo Fijo</span>
									</a>
								</li>
									<a href="crear-compra-inventario">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Inventario de Mercancia</span>
									</a>
								</li>
								
								
							</ul>

						</li>
						
					

					</ul>
			</li>

		
			
			 <li class="treeview">
				<a href="">
					<i class="fa fa-list-ul"></i>
					<span>TSS Nómina</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="empleados">
								<i class="fa fa-circle-o"></i>
								<span>Empleados</span>
							</a>
						</li>

						

					</ul>
			</li>';

					
						
	break;
	case 'Especialista':
		  echo '<li class="treeview">
				<a href="">
					<i class="fa fa-industry"></i>
					<span>Activos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						
						<li class="treeview">
							<a href="">
								<i class="fa fa-industry"></i>
								<span>Activo Rotativo</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="CategoriasActivoRotativos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Categorias Activo Rotativo</span>
									</a>
								</li>
								<li>
									<a href="ProductosActivoRotativos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Productos Activo Rotativos</span>
									</a>
								</li>
								
								
							</ul>

						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-industry"></i>
								<span>Activo Fijos</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="CategoriasActivoFijo">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Categorias Activo Fijo</span>
									</a>
								</li>
								<li class="">
									<a href=crear-producto-activofijo>
									<i class="glyphicon glyphicon-barcode"></i>
									<span>Productos Activo Fijo</span>
									</a>
								</li>
								<li>
									<a href="crear-compra-inventario">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Inventario de Mercancia</span>
									</a>
								</li>
								
								
							</ul>

						</li>
						
					

					</ul>
			</li>

		
			
			 <li class="treeview">
				<a href="">
					<i class="fa fa-list-ul"></i>
					<span>TSS Nómina</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="empleados">
								<i class="fa fa-circle-o"></i>
								<span>Empleados</span>
							</a>
						</li>

						

					</ul>
			</li>';

					
						
	break;
					
}
		

?>
			<?php 
			if($Banco == "1"){
				switch ($PerfilUsuario) {
	case 'Programador':
	echo '<li class="treeview">
				<a href="">
					<i class="fa fa-building-o"></i>
					<span>Banco</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="banco">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Banco</span>
							</a>
						</li>
						<li class="treeview">
								<a href="">
									<i class="glyphicon glyphicon-saved"></i>
									<span>Fondo de Anticipo</span>
								</a>
							<ul class="treeview-menu">
							<li>
									<a href="reporteranticiposrendidos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Reporte Anticipos Rendidos</span>
									</a>
								</li>
								
								<li>
									<a href="reporteanticipos">
										<i class="fa fa-server"></i>
										<span>Reporte de Anticipos</span>
									</a>
								</li>
								<li>
									<a href="anticipos">
										<i class="fa fa-pie-chart"></i>
										<span>Administar Anticipos</span>
									</a>
								</li>
							</ul>


						</li>
						
							
						
						
						<li>
							<a href="conciliacion">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Conciliación</span>
							</a>
						</li>
						<li>
							<a href="librobanco">
								<i class="fa fa-server"></i>
								<span>Libro Banco</span>
							</a>
						</li>
						<li>
							<a href="estadocuenta">
								<i class="fa fa-server"></i>
								<span>Estado de Cuenta</span>
							</a>
						</li>
						
						
						<li>
							<a href="disponibilidad">
								<i class="fa fa-pie-chart"></i>
								<span>Disponibilidad Financiera</span>
							</a>
						</li>

					</ul>
			</li>';
            
					
						
	break;
	case 'Gerente':
	echo '<li class="treeview">
				<a href="">
					<i class="fa fa-building-o"></i>
					<span>Banco</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="banco">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Banco</span>
							</a>
						</li>
						<li class="treeview">
								<a href="">
									<i class="glyphicon glyphicon-saved"></i>
									<span>Fondo de Anticipo</span>
								</a>
							<ul class="treeview-menu">
							<li>
									<a href="reporteranticiposrendidos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Reporte Anticipos Rendidos</span>
									</a>
								</li>
								
								<li>
									<a href="reporteanticipos">
										<i class="fa fa-server"></i>
										<span>Reporte de Anticipos</span>
									</a>
								</li>
								<li>
									<a href="anticipos">
										<i class="fa fa-pie-chart"></i>
										<span>Administar Anticipos</span>
									</a>
								</li>
							</ul>


						</li>
						
							
						
						
						<li>
							<a href="conciliacion">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Conciliación</span>
							</a>
						</li>
						<li>
							<a href="librobanco">
								<i class="fa fa-server"></i>
								<span>Libro Banco</span>
							</a>
						</li>
						<li>
							<a href="estadocuenta">
								<i class="fa fa-server"></i>
								<span>Estado de Cuenta</span>
							</a>
						</li>
						
						
						<li>
							<a href="disponibilidad">
								<i class="fa fa-pie-chart"></i>
								<span>Disponibilidad Financiera</span>
							</a>
						</li>

					</ul>
			</li>';
            
					
						
	break;
	
	case 'Administrador':
	echo '<li class="treeview">
				<a href="">
					<i class="fa fa-building-o"></i>
					<span>Banco</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="banco">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Banco</span>
							</a>
						</li>
						<li class="treeview">
								<a href="">
									<i class="glyphicon glyphicon-saved"></i>
									<span>Fondo de Anticipo</span>
								</a>
							<ul class="treeview-menu">
							<li>
									<a href="reporteranticiposrendidos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Reporte Anticipos Rendidos</span>
									</a>
								</li>
								
								<li>
									<a href="reporteanticipos">
										<i class="fa fa-server"></i>
										<span>Reporte de Anticipos</span>
									</a>
								</li>
								<li>
									<a href="anticipos">
										<i class="fa fa-pie-chart"></i>
										<span>Administar Anticipos</span>
									</a>
								</li>
							</ul>


						</li>
						
							
						
						
						<li>
							<a href="conciliacion">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Conciliación</span>
							</a>
						</li>
						<li>
							<a href="librobanco">
								<i class="fa fa-server"></i>
								<span>Libro Banco</span>
							</a>
						</li>
						<li>
							<a href="estadocuenta">
								<i class="fa fa-server"></i>
								<span>Estado de Cuenta</span>
							</a>
						</li>
						
						
						<li>
							<a href="disponibilidad">
								<i class="fa fa-pie-chart"></i>
								<span>Disponibilidad Financiera</span>
							</a>
						</li>

					</ul>
			</li>';
            
					
						
	break;
	case 'Especialista':
	echo '<li class="treeview">
				<a href="">
					<i class="fa fa-building-o"></i>
					<span>Banco</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="banco">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Banco</span>
							</a>
						</li>
						<li class="treeview">
								<a href="">
									<i class="glyphicon glyphicon-saved"></i>
									<span>Fondo de Anticipo</span>
								</a>
							<ul class="treeview-menu">
							<li>
									<a href="reporteranticiposrendidos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Reporte Anticipos Rendidos</span>
									</a>
								</li>
								
								<li>
									<a href="reporteanticipos">
										<i class="fa fa-server"></i>
										<span>Reporte de Anticipos</span>
									</a>
								</li>
								<li>
									<a href="anticipos">
										<i class="fa fa-pie-chart"></i>
										<span>Administar Anticipos</span>
									</a>
								</li>
							</ul>


						</li>
						
							
						
						
						<li>
							<a href="conciliacion">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Conciliación</span>
							</a>
						</li>
						<li>
							<a href="librobanco">
								<i class="fa fa-server"></i>
								<span>Libro Banco</span>
							</a>
						</li>
						<li>
							<a href="estadocuenta">
								<i class="fa fa-server"></i>
								<span>Estado de Cuenta</span>
							</a>
						</li>
						
						
						<li>
							<a href="disponibilidad">
								<i class="fa fa-pie-chart"></i>
								<span>Disponibilidad Financiera</span>
							</a>
						</li>

					</ul>
			</li>';
            
					
						
	break;
					
}
				


			}




			 ?>
			 <?php  
			if($Proyecto == "1") { 
				switch ($PerfilUsuario) {
	case 'Programador':
	echo '<li class="treeview">
				<a href="">
					<i class="glyphicon glyphicon-list-alt"></i>
					<span>Gestión Proyectos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="proyectos">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Administrar Proyectos</span>
							</a>
						</li>
						<li>
							<a href="proyectosuplidor">
								<i class="fa fa-server"></i>
								<span>Proyecto Suplidor</span>
							</a>
						</li>

						<li>
							<a href="resumenproyectos">
								<i class="fa fa-pie-chart"></i>
								<span>Proyectos Resumen</span>
							</a>
						</li>
						

					</ul>
			</li>'; 
					
						
	break;
	case 'Gerente':
	echo '<li class="treeview">
				<a href="">
					<i class="glyphicon glyphicon-list-alt"></i>
					<span>Gestión Proyectos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="proyectos">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Administrar Proyectos</span>
							</a>
						</li>
						<li>
							<a href="proyectosuplidor">
								<i class="fa fa-server"></i>
								<span>Proyecto Suplidor</span>
							</a>
						</li>

						<li>
							<a href="resumenproyectos">
								<i class="fa fa-pie-chart"></i>
								<span>Proyectos Resumen</span>
							</a>
						</li>
						

					</ul>
			</li>'; 
					
						
	break;
	
	case 'Administrador':
	echo '<li class="treeview">
				<a href="">
					<i class="glyphicon glyphicon-list-alt"></i>
					<span>Gestión Proyectos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="proyectos">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Administrar Proyectos</span>
							</a>
						</li>
						<li>
							<a href="proyectosuplidor">
								<i class="fa fa-server"></i>
								<span>Proyecto Suplidor</span>
							</a>
						</li>

						<li>
							<a href="resumenproyectos">
								<i class="fa fa-pie-chart"></i>
								<span>Proyectos Resumen</span>
							</a>
						</li>
						

					</ul>
			</li>'; 
					
						
	break;
	case 'Especialista':
	echo '<li class="treeview">
				<a href="">
					<i class="glyphicon glyphicon-list-alt"></i>
					<span>Gestión Proyectos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="proyectos">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Administrar Proyectos</span>
							</a>
						</li>
						<li>
							<a href="proyectosuplidor">
								<i class="fa fa-server"></i>
								<span>Proyecto Suplidor</span>
							</a>
						</li>

						<li>
							<a href="resumenproyectos">
								<i class="fa fa-pie-chart"></i>
								<span>Proyectos Resumen</span>
							</a>
						</li>
						

					</ul>
			</li>'; 
					
						
	break;
					
}
            
            
				}
		
			if($Contabilidad == "1") { 
				if($Proyecto == "1"){  
			switch ($PerfilUsuario) {
	case 'Programador':
	 echo '
            <li class="treeview">
				<a href="">
					<i class="glyphicon glyphicon-book"></i>
					<span>Contabilidad</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">

						<li>
							<a href="ingresodiario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Ingreso</span>
							</a>
						</li>

						<li>
							<a href="gastodiario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Gasto</span>
							</a>
						</li>
						<li>
							<a href="ajustediario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Ajuste</span>
							</a>
						</li>
						<li>
							<a href="catalogocuentas">
								<i class="fa fa-server"></i>
								<span>Catálogo de Cuentas</span>
							</a>
						</li>
						<li>
						
							<a href="libromayorpro">
								<i class="fa fa-server"></i>
								<span>Libro Mayor</span>
							</a>
						</li>
						<li>
							<a href="reporteingresos">
								<i class="fa fa-server"></i>
								<span>Ingreso Por Clientes</span>
							</a>
						</li>

						
						<li class="treeview">
							<a href="">
								<i class="fa fa-server"></i>
								<span>Gastos Por Suplidor</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="reportegastos">
										<i class="fa fa-server"></i>
										<span>Gastos Por Suplidor</span>
									</a>
								</li>
								<li>
									<a href="auxiliarsuplidor">
										<i class="fa fa-file-excel-o"></i>
										<span>Auxiliar suplidor</span>
									</a>
								</li>
							</ul>

						</li>
						
						
						<li>
							<a
								
								<span></span>
							</a>
						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Resultado</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="EstadoResultado">
										<i class="fa fa-pie-chart"></i>
										<span>Por Niveles</span>
									</a>
								</li>
								<li>
									<a href="impEstadoResultado">
										<i class="fa fa-file-excel-o"></i>
										<span>Informe</span>
									</a>
								</li>
							</ul>

						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Situación</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="EstadoSituacion">
										<i class="fa fa-pie-chart"></i>
										<span>Por Niveles</span>
									</a>
								</li>
								<li>
									<a href="impEstadoSituacion">
										<i class="fa fa-file-excel-o"></i>
										<span>Informe</span>
									</a>
								</li>
							</ul>

						</li>
						

						<li>
							<a href="BalanceComprobacion">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Comprobación</span>
							</a>
						</li>

					</ul>
			</li>';
					
						
	break;
	case 'Gerente':
	 echo '
            <li class="treeview">
				<a href="">
					<i class="glyphicon glyphicon-book"></i>
					<span>Contabilidad</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">

						<li>
							<a href="ingresodiario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Ingreso</span>
							</a>
						</li>

						<li>
							<a href="gastodiario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Gasto</span>
							</a>
						</li>
						<li>
							<a href="ajustediario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Ajuste</span>
							</a>
						</li>
						<li>
							<a href="catalogocuentas">
								<i class="fa fa-server"></i>
								<span>Catálogo de Cuentas</span>
							</a>
						</li>
						<li>
						
							<a href="libromayorpro">
								<i class="fa fa-server"></i>
								<span>Libro Mayor</span>
							</a>
						</li>
						<li>
							<a href="reporteingresos">
								<i class="fa fa-server"></i>
								<span>Ingreso Por Clientes</span>
							</a>
						</li>

						
						<li class="treeview">
							<a href="">
								<i class="fa fa-server"></i>
								<span>Gastos Por Suplidor</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="reportegastos">
										<i class="fa fa-server"></i>
										<span>Gastos Por Suplidor</span>
									</a>
								</li>
								<li>
									<a href="auxiliarsuplidor">
										<i class="fa fa-file-excel-o"></i>
										<span>Auxiliar suplidor</span>
									</a>
								</li>
							</ul>

						</li>
						
						
						<li>
							<a
								
								<span></span>
							</a>
						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Resultado</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="EstadoResultado">
										<i class="fa fa-pie-chart"></i>
										<span>Por Niveles</span>
									</a>
								</li>
								<li>
									<a href="impEstadoResultado">
										<i class="fa fa-file-excel-o"></i>
										<span>Informe</span>
									</a>
								</li>
							</ul>

						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Situación</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="EstadoSituacion">
										<i class="fa fa-pie-chart"></i>
										<span>Por Niveles</span>
									</a>
								</li>
								<li>
									<a href="impEstadoSituacion">
										<i class="fa fa-file-excel-o"></i>
										<span>Informe</span>
									</a>
								</li>
							</ul>

						</li>
						

						<li>
							<a href="BalanceComprobacion">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Comprobación</span>
							</a>
						</li>

					</ul>
			</li>';
					
						
	break;
	
	case 'Administrador':
	 echo '
            <li class="treeview">
				<a href="">
					<i class="glyphicon glyphicon-book"></i>
					<span>Contabilidad</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">

						<li>
							<a href="ingresodiario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Ingreso</span>
							</a>
						</li>

						<li>
							<a href="gastodiario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Gasto</span>
							</a>
						</li>
						<li>
							<a href="ajustediario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Ajuste</span>
							</a>
						</li>
						<li>
							<a href="catalogocuentas">
								<i class="fa fa-server"></i>
								<span>Catálogo de Cuentas</span>
							</a>
						</li>
						<li>
						
							<a href="libromayorpro">
								<i class="fa fa-server"></i>
								<span>Libro Mayor</span>
							</a>
						</li>
						<li>
							<a href="reporteingresos">
								<i class="fa fa-server"></i>
								<span>Ingreso Por Clientes</span>
							</a>
						</li>

						
						<li class="treeview">
							<a href="">
								<i class="fa fa-server"></i>
								<span>Gastos Por Suplidor</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="reportegastos">
										<i class="fa fa-server"></i>
										<span>Gastos Por Suplidor</span>
									</a>
								</li>
								<li>
									<a href="auxiliarsuplidor">
										<i class="fa fa-file-excel-o"></i>
										<span>Auxiliar suplidor</span>
									</a>
								</li>
							</ul>

						</li>
						
						
						<li>
							<a
								
								<span></span>
							</a>
						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Resultado</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="EstadoResultado">
										<i class="fa fa-pie-chart"></i>
										<span>Por Niveles</span>
									</a>
								</li>
								<li>
									<a href="impEstadoResultado">
										<i class="fa fa-file-excel-o"></i>
										<span>Informe</span>
									</a>
								</li>
							</ul>

						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Situación</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="EstadoSituacion">
										<i class="fa fa-pie-chart"></i>
										<span>Por Niveles</span>
									</a>
								</li>
								<li>
									<a href="impEstadoSituacion">
										<i class="fa fa-file-excel-o"></i>
										<span>Informe</span>
									</a>
								</li>
							</ul>

						</li>
						

						<li>
							<a href="BalanceComprobacion">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Comprobación</span>
							</a>
						</li>

					</ul>
			</li>';
					
						
	break;
	case 'Especialista':
	 echo '
            <li class="treeview">
				<a href="">
					<i class="glyphicon glyphicon-book"></i>
					<span>Contabilidad</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">

						<li>
							<a href="ingresodiario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Ingreso</span>
							</a>
						</li>

						<li>
							<a href="gastodiario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Gasto</span>
							</a>
						</li>
						<li>
							<a href="ajustediario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Ajuste</span>
							</a>
						</li>
						<li>
							<a href="catalogocuentas">
								<i class="fa fa-server"></i>
								<span>Catálogo de Cuentas</span>
							</a>
						</li>
						<li>
						
							<a href="libromayorpro">
								<i class="fa fa-server"></i>
								<span>Libro Mayor</span>
							</a>
						</li>
						<li>
							<a href="reporteingresos">
								<i class="fa fa-server"></i>
								<span>Ingreso Por Clientes</span>
							</a>
						</li>

						
						<li class="treeview">
							<a href="">
								<i class="fa fa-server"></i>
								<span>Gastos Por Suplidor</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="reportegastos">
										<i class="fa fa-server"></i>
										<span>Gastos Por Suplidor</span>
									</a>
								</li>
								<li>
									<a href="auxiliarsuplidor">
										<i class="fa fa-file-excel-o"></i>
										<span>Auxiliar suplidor</span>
									</a>
								</li>
							</ul>

						</li>
						
						
						<li>
							<a
								
								<span></span>
							</a>
						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Resultado</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="EstadoResultado">
										<i class="fa fa-pie-chart"></i>
										<span>Por Niveles</span>
									</a>
								</li>
								<li>
									<a href="impEstadoResultado">
										<i class="fa fa-file-excel-o"></i>
										<span>Informe</span>
									</a>
								</li>
							</ul>

						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Situación</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="EstadoSituacion">
										<i class="fa fa-pie-chart"></i>
										<span>Por Niveles</span>
									</a>
								</li>
								<li>
									<a href="impEstadoSituacion">
										<i class="fa fa-file-excel-o"></i>
										<span>Informe</span>
									</a>
								</li>
							</ul>

						</li>
						

						<li>
							<a href="BalanceComprobacion">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Comprobación</span>
							</a>
						</li>

					</ul>
			</li>';
					
						
	break;
					
}


				}else{


				
		switch ($PerfilUsuario) {
	case 'Programador':
	 echo '
            <li class="treeview">
				<a href="">
					<i class="glyphicon glyphicon-book"></i>
					<span>Contabilidad</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">

						<li>
							<a href="ingresodiario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Ingreso</span>
							</a>
						</li>

						<li>
							<a href="gastodiario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Gasto</span>
							</a>
						</li>
						<li>
							<a href="ajustediario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Ajuste</span>
							</a>
						</li>
						<li>
							<a href="catalogocuentas">
								<i class="fa fa-server"></i>
								<span>Catálogo de Cuentas</span>
							</a>
						</li>
						<li>
						
							<a href="libromayor">
								<i class="fa fa-server"></i>
								<span>Libro Mayor</span>
							</a>
						</li>
						<li>
							<a href="reporteingresos">
								<i class="fa fa-server"></i>
								<span>Ingreso Por Clientes</span>
							</a>
						</li>

						
						<li class="treeview">
							<a href="">
								<i class="fa fa-server"></i>
								<span>Gastos Por Suplidor</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="reportegastos">
										<i class="fa fa-server"></i>
										<span>Gastos Por Suplidor</span>
									</a>
								</li>
								<li>
									<a href="auxiliarsuplidor">
										<i class="fa fa-file-excel-o"></i>
										<span>Auxiliar suplidor</span>
									</a>
								</li>
							</ul>

						</li>
						
						
						<li>
							<a
								
								<span></span>
							</a>
						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Resultado</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="EstadoResultado">
										<i class="fa fa-pie-chart"></i>
										<span>Por Niveles</span>
									</a>
								</li>
								<li>
									<a href="impEstadoResultado">
										<i class="fa fa-file-excel-o"></i>
										<span>Informe</span>
									</a>
								</li>
							</ul>

						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Situación</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="EstadoSituacion">
										<i class="fa fa-pie-chart"></i>
										<span>Por Niveles</span>
									</a>
								</li>
								<li>
									<a href="impEstadoSituacion">
										<i class="fa fa-file-excel-o"></i>
										<span>Informe</span>
									</a>
								</li>
							</ul>

						</li>
						

						<li>
							<a href="BalanceComprobacion">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Comprobación</span>
							</a>
						</li>

					</ul>
			</li>';
					
						
	break;
		case 'Gerente':
	 echo '
            <li class="treeview">
				<a href="">
					<i class="glyphicon glyphicon-book"></i>
					<span>Contabilidad</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">

						<li>
							<a href="ingresodiario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Ingreso</span>
							</a>
						</li>

						<li>
							<a href="gastodiario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Gasto</span>
							</a>
						</li>
						<li>
							<a href="ajustediario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Ajuste</span>
							</a>
						</li>
						<li>
							<a href="catalogocuentas">
								<i class="fa fa-server"></i>
								<span>Catálogo de Cuentas</span>
							</a>
						</li>
						<li>
						
							<a href="libromayor">
								<i class="fa fa-server"></i>
								<span>Libro Mayor</span>
							</a>
						</li>
						<li>
							<a href="reporteingresos">
								<i class="fa fa-server"></i>
								<span>Ingreso Por Clientes</span>
							</a>
						</li>

						
						<li class="treeview">
							<a href="">
								<i class="fa fa-server"></i>
								<span>Gastos Por Suplidor</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="reportegastos">
										<i class="fa fa-server"></i>
										<span>Gastos Por Suplidor</span>
									</a>
								</li>
								<li>
									<a href="auxiliarsuplidor">
										<i class="fa fa-file-excel-o"></i>
										<span>Auxiliar suplidor</span>
									</a>
								</li>
							</ul>

						</li>
						
						
						<li>
							<a
								
								<span></span>
							</a>
						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Resultado</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="EstadoResultado">
										<i class="fa fa-pie-chart"></i>
										<span>Por Niveles</span>
									</a>
								</li>
								<li>
									<a href="impEstadoResultado">
										<i class="fa fa-file-excel-o"></i>
										<span>Informe</span>
									</a>
								</li>
							</ul>

						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Situación</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="EstadoSituacion">
										<i class="fa fa-pie-chart"></i>
										<span>Por Niveles</span>
									</a>
								</li>
								<li>
									<a href="impEstadoSituacion">
										<i class="fa fa-file-excel-o"></i>
										<span>Informe</span>
									</a>
								</li>
							</ul>

						</li>
						

						<li>
							<a href="BalanceComprobacion">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Comprobación</span>
							</a>
						</li>

					</ul>
			</li>';
					
						
	break;
	
	case 'Administrador':
	 echo '
            <li class="treeview">
				<a href="">
					<i class="glyphicon glyphicon-book"></i>
					<span>Contabilidad</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">

						<li>
							<a href="ingresodiario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Ingreso</span>
							</a>
						</li>

						<li>
							<a href="gastodiario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Gasto</span>
							</a>
						</li>
						<li>
							<a href="ajustediario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Ajuste</span>
							</a>
						</li>
						<li>
							<a href="catalogocuentas">
								<i class="fa fa-server"></i>
								<span>Catálogo de Cuentas</span>
							</a>
						</li>
						<li>
						
							<a href="libromayor">
								<i class="fa fa-server"></i>
								<span>Libro Mayor</span>
							</a>
						</li>
						<li>
							<a href="reporteingresos">
								<i class="fa fa-server"></i>
								<span>Ingreso Por Clientes</span>
							</a>
						</li>

						
						<li class="treeview">
							<a href="">
								<i class="fa fa-server"></i>
								<span>Gastos Por Suplidor</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="reportegastos">
										<i class="fa fa-server"></i>
										<span>Gastos Por Suplidor</span>
									</a>
								</li>
								<li>
									<a href="auxiliarsuplidor">
										<i class="fa fa-file-excel-o"></i>
										<span>Auxiliar suplidor</span>
									</a>
								</li>
							</ul>

						</li>
						
						
						<li>
							<a
								
								<span></span>
							</a>
						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Resultado</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="EstadoResultado">
										<i class="fa fa-pie-chart"></i>
										<span>Por Niveles</span>
									</a>
								</li>
								<li>
									<a href="impEstadoResultado">
										<i class="fa fa-file-excel-o"></i>
										<span>Informe</span>
									</a>
								</li>
							</ul>

						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Situación</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="EstadoSituacion">
										<i class="fa fa-pie-chart"></i>
										<span>Por Niveles</span>
									</a>
								</li>
								<li>
									<a href="impEstadoSituacion">
										<i class="fa fa-file-excel-o"></i>
										<span>Informe</span>
									</a>
								</li>
							</ul>

						</li>
						

						<li>
							<a href="BalanceComprobacion">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Comprobación</span>
							</a>
						</li>

					</ul>
			</li>';
					
						
	break;
	case 'Especialista':
	 echo '
            <li class="treeview">
				<a href="">
					<i class="glyphicon glyphicon-book"></i>
					<span>Contabilidad</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">

						<li>
							<a href="ingresodiario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Ingreso</span>
							</a>
						</li>

						<li>
							<a href="gastodiario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Gasto</span>
							</a>
						</li>
						<li>
							<a href="ajustediario">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Diario de Ajuste</span>
							</a>
						</li>
						<li>
							<a href="catalogocuentas">
								<i class="fa fa-server"></i>
								<span>Catálogo de Cuentas</span>
							</a>
						</li>
						<li>
						
							<a href="libromayor">
								<i class="fa fa-server"></i>
								<span>Libro Mayor</span>
							</a>
						</li>
						<li>
							<a href="reporteingresos">
								<i class="fa fa-server"></i>
								<span>Ingreso Por Clientes</span>
							</a>
						</li>

						
						<li class="treeview">
							<a href="">
								<i class="fa fa-server"></i>
								<span>Gastos Por Suplidor</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="reportegastos">
										<i class="fa fa-server"></i>
										<span>Gastos Por Suplidor</span>
									</a>
								</li>
								<li>
									<a href="auxiliarsuplidor">
										<i class="fa fa-file-excel-o"></i>
										<span>Auxiliar suplidor</span>
									</a>
								</li>
							</ul>

						</li>
						
						
						<li>
							<a
								
								<span></span>
							</a>
						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Resultado</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="EstadoResultado">
										<i class="fa fa-pie-chart"></i>
										<span>Por Niveles</span>
									</a>
								</li>
								<li>
									<a href="impEstadoResultado">
										<i class="fa fa-file-excel-o"></i>
										<span>Informe</span>
									</a>
								</li>
							</ul>

						</li>
						<li class="treeview">
							<a href="">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Situación</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="EstadoSituacion">
										<i class="fa fa-pie-chart"></i>
										<span>Por Niveles</span>
									</a>
								</li>
								<li>
									<a href="impEstadoSituacion">
										<i class="fa fa-file-excel-o"></i>
										<span>Informe</span>
									</a>
								</li>
							</ul>

						</li>
						

						<li>
							<a href="BalanceComprobacion">
								<i class="fa fa-pie-chart"></i>
								<span>Estado Comprobación</span>
							</a>
						</li>

					</ul>
			</li>';
					
						
	break;
			
					
}
}/*else proyecto*/
            
           
			}/*if contabilidad*/

			?>

			 
			<?php  
			switch ($PerfilUsuario) {
	case 'Programador':
	echo'<li class="treeview">
				<a href="">
					<i class="fa fa-university"></i>
					<span>Impuestos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="registro-606">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Registro 606</span>
							</a>
						</li>
						<li>
							<a href="registro-607">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Registro 607</span>
							</a>
						</li>
						<li>
							<a href="registro-608">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Registro 608</span>
							</a>
						</li>
						<li>
							<a href="reporte-606">
								<i class="fa fa-server"></i>
								<span>Reporte 606</span>
							</a>
						</li>
						<li>
							<a href="reporte-607">
								<i class="fa fa-server"></i>
								<span>Reporte 607</span>
							</a>
						</li>
						<li>
							<a href="reporte-608">
								<i class="fa fa-server"></i>
								<span>Reporte 608</span>
							</a>
						</li>
						<li>
							<a href="cuadre-itbis">
								<i class="fa fa-pie-chart"></i>
								<span>Cuadre ITBIS</span>
							</a>
						</li>
						<li>
							<a href="anexoA">
								<i class="fa fa-list-alt"></i>
								<span>Declaración IT-1</span>
								<span style="border: 1px solid red; background-color: red; color: white;  text-align:center; font-weight: bold">Nuevo</span>
							</a>
						</li>
						<li>
							<a href="ir17">
								<i class="fa fa-list-alt"></i>
								<span>Declaración IR-17</span>
								<span style="border: 1px solid red; background-color: red; color: white;  text-align:center; font-weight: bold">Nuevo</span>
							</a>
						</li>
						
						
					</ul>
			</li>';

					
						
	break;

	case 'Gerente':
	echo'<li class="treeview">
				<a href="">
					<i class="fa fa-university"></i>
					<span>Impuestos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="registro-606">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Registro 606</span>
							</a>
						</li>
						<li>
							<a href="registro-607">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Registro 607</span>
							</a>
						</li>
						<li>
							<a href="registro-608">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Registro 608</span>
							</a>
						</li>
						<li>
							<a href="reporte-606">
								<i class="fa fa-server"></i>
								<span>Reporte 606</span>
							</a>
						</li>
						<li>
							<a href="reporte-607">
								<i class="fa fa-server"></i>
								<span>Reporte 607</span>
							</a>
						</li>
						<li>
							<a href="reporte-608">
								<i class="fa fa-server"></i>
								<span>Reporte 608</span>
							</a>
						</li>
						<li>
							<a href="cuadre-itbis">
								<i class="fa fa-pie-chart"></i>
								<span>Cuadre ITBIS</span>
							</a>
						</li>
						<li>
							<a href="anexoA">
								<i class="fa fa-list-alt"></i>
								<span>Declaración IT-1</span>
								<span style="border: 1px solid red; background-color: red; color: white;  text-align:center; font-weight: bold">Nuevo</span>
							</a>
						</li>
						<li>
							<a href="ir17">
								<i class="fa fa-list-alt"></i>
								<span>Declaración IR-17</span>
								<span style="border: 1px solid red; background-color: red; color: white;  text-align:center; font-weight: bold">Nuevo</span>
							</a>
						</li>
						
						
					</ul>
			</li>';

					
						
	break;
	
	case 'Administrador':
	echo'<li class="treeview">
				<a href="">
					<i class="fa fa-university"></i>
					<span>Impuestos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="registro-606">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Registro 606</span>
							</a>
						</li>
						<li>
							<a href="registro-607">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Registro 607</span>
							</a>
						</li>
						<li>
							<a href="registro-608">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Registro 608</span>
							</a>
						</li>
						<li>
							<a href="reporte-606">
								<i class="fa fa-server"></i>
								<span>Reporte 606</span>
							</a>
						</li>
						<li>
							<a href="reporte-607">
								<i class="fa fa-server"></i>
								<span>Reporte 607</span>
							</a>
						</li>
						<li>
							<a href="reporte-608">
								<i class="fa fa-server"></i>
								<span>Reporte 608</span>
							</a>
						</li>
						<li>
							<a href="cuadre-itbis">
								<i class="fa fa-pie-chart"></i>
								<span>Cuadre ITBIS</span>
							</a>
						</li>
						<li>
							<a href="anexoA">
								<i class="fa fa-list-alt"></i>
								<span>Declaración IT-1</span>
								<span style="border: 1px solid red; background-color: red; color: white;  text-align:center; font-weight: bold">Nuevo</span>
							</a>
						</li>
						<li>
							<a href="ir17">
								<i class="fa fa-list-alt"></i>
								<span>Declaración IR-17</span>
								<span style="border: 1px solid red; background-color: red; color: white;  text-align:center; font-weight: bold">Nuevo</span>
							</a>
						</li>
						
						
					</ul>
			</li>';

					
						
	break;

	case 'Especialista':
	echo'<li class="treeview">
				<a href="">
					<i class="fa fa-university"></i>
					<span>Impuestos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="registro-606">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Registro 606</span>
							</a>
						</li>
						<li>
							<a href="registro-607">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Registro 607</span>
							</a>
						</li>
						<li>
							<a href="registro-608">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Registro 608</span>
							</a>
						</li>
						<li>
							<a href="reporte-606">
								<i class="fa fa-server"></i>
								<span>Reporte 606</span>
							</a>
						</li>
						<li>
							<a href="reporte-607">
								<i class="fa fa-server"></i>
								<span>Reporte 607</span>
							</a>
						</li>
						<li>
							<a href="reporte-608">
								<i class="fa fa-server"></i>
								<span>Reporte 608</span>
							</a>
						</li>
						<li>
							<a href="cuadre-itbis">
								<i class="fa fa-pie-chart"></i>
								<span>Cuadre ITBIS</span>
							</a>
						</li>
						<li>
							<a href="anexoA">
								<i class="fa fa-list-alt"></i>
								<span>Declaración IT-1</span>
								<span style="border: 1px solid red; background-color: red; color: white;  text-align:center; font-weight: bold">Nuevo</span>
							</a>
						</li>
						<li>
							<a href="ir17">
								<i class="fa fa-list-alt"></i>
								<span>Declaración IR-17</span>
								<span style="border: 1px solid red; background-color: red; color: white;  text-align:center; font-weight: bold">Nuevo</span>
							</a>
						</li>
						
						
					</ul>
			</li>';

					
						
	break;

	case 'Tributario':
	echo'<li class="treeview">
				<a href="">
					<i class="fa fa-university"></i>
					<span>Impuestos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
						<li>
							<a href="registro-606">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Registro 606</span>
							</a>
						</li>
						<li>
							<a href="registro-607">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Registro 607</span>
							</a>
						</li>
						<li>
							<a href="registro-608">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Registro 608</span>
							</a>
						</li>
						<li>
							<a href="reporte-606">
								<i class="fa fa-server"></i>
								<span>Reporte 606</span>
							</a>
						</li>
						<li>
							<a href="reporte-607">
								<i class="fa fa-server"></i>
								<span>Reporte 607</span>
							</a>
						</li>
						<li>
							<a href="reporte-608">
								<i class="fa fa-server"></i>
								<span>Reporte 608</span>
							</a>
						</li>
						<li>
							<a href="cuadre-itbis">
								<i class="fa fa-pie-chart"></i>
								<span>Cuadre ITBIS</span>
							</a>
						</li>
						
						<li>
							<a href="anexoA">
								<i class="fa fa-list-alt"></i>
								<span>Declaración IT-1</span>
								<span style="border: 1px solid red; background-color: red; color: white;  text-align:center; font-weight: bold">Nuevo</span>
							</a>
						</li>
						<li>
							<a href="ir17">
								<i class="fa fa-list-alt"></i>
								<span>Declaración IR-17</span>
								<span style="border: 1px solid red; background-color: red; color: white;  text-align:center; font-weight: bold">Nuevo</span>
							</a>
						</li>
					</ul>
			</li>';

					
						
	break;
					
}


			
			?>
			

			
			 <?php 

      $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
      $Rnc_Empresa_Master = null;
      $Orden = "id";

      $respuesta = ControladorEmpresas::ctrEmpresas($Rnc_Empresa, $Rnc_Empresa_Master, $Orden);
     
      if($respuesta["Tipo_Empresa"] == "Firma" && $respuesta["Rnc_Empresa_Master"] == $Rnc_Empresa && $respuesta["Rnc_Empresa"] == $Rnc_Empresa){
      	switch ($PerfilUsuario) {
	case 'Programador':
	echo '<li class="treeview">
				<a href="">
					<i class="fa fa-file-text-o"></i>
					<span>Control Empresas</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
      						<li class="">
								<a href="listado-empresas">
									<i class="fa fa-address-book"></i>
									<span>Lista de Empresas</span>
								</a>
							</li>
							<li class="">
								<a href="control-procesos">
									<i class="fa fa-braille"></i>
									<span>Control de Procesos</span>
								</a>
							</li>

							<li class="">
								<a href="control-TSS">
									<i class="fa fa-address-card"></i>
									<span>Control de TSS</span>
								</a>
							</li>
							<li class="">
								<a href="control-FondoAnticipo">
									<i class="fa fa-address-card"></i>
									<span>Control de Fondos Anticipos</span>
								</a>
							</li>


					</ul>
							

			 </li>';

					
						
	break;
	
	case 'Gerente':
	echo '<li class="treeview">
				<a href="">
					<i class="fa fa-file-text-o"></i>
					<span>Control Empresas</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
      						<li class="">
								<a href="listado-empresas">
									<i class="fa fa-address-book"></i>
									<span>Lista de Empresas</span>
								</a>
							</li>
							<li class="">
								<a href="control-procesos">
									<i class="fa fa-braille"></i>
									<span>Control de Procesos</span>
								</a>
							</li>

							<li class="">
								<a href="control-TSS">
									<i class="fa fa-address-card"></i>
									<span>Control de TSS</span>
								</a>
							</li>
							<li class="">
								<a href="control-FondoAnticipo">
									<i class="fa fa-address-card"></i>
									<span>Control de Fondos Anticipos</span>
								</a>
							</li>


					</ul>
							

			 </li>';

					
						
	break;
	case 'Administrador':
	echo '<li class="treeview">
				<a href="">
					<i class="fa fa-file-text-o"></i>
					<span>Control Empresas</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
      						<li class="">
								<a href="listado-empresas">
									<i class="fa fa-address-book"></i>
									<span>Lista de Empresas</span>
								</a>
							</li>
							<li class="">
								<a href="control-procesos">
									<i class="fa fa-braille"></i>
									<span>Control de Procesos</span>
								</a>
							</li>

							<li class="">
								<a href="control-TSS">
									<i class="fa fa-address-card"></i>
									<span>Control de TSS</span>
								</a>
							</li>
							<li class="">
								<a href="control-FondoAnticipo">
									<i class="fa fa-address-card"></i>
									<span>Control de Fondos Anticipos</span>
								</a>
							</li>


					</ul>
							

			 </li>';

					
						
	break;
	case 'Especialista':
	echo '<li class="treeview">
				<a href="">
					<i class="fa fa-file-text-o"></i>
					<span>Control Empresas</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
      						<li class="">
								<a href="listado-empresas">
									<i class="fa fa-address-book"></i>
									<span>Lista de Empresas</span>
								</a>
							</li>
							<li class="">
								<a href="control-procesos">
									<i class="fa fa-braille"></i>
									<span>Control de Procesos</span>
								</a>
							</li>

							<li class="">
								<a href="control-TSS">
									<i class="fa fa-address-card"></i>
									<span>Control de TSS</span>
								</a>
							</li>
							<li class="">
								<a href="control-FondoAnticipo">
									<i class="fa fa-address-card"></i>
									<span>Control de Fondos Anticipos</span>
								</a>
							</li>


					</ul>
							

			 </li>';

					
						
	break;
					
}

      	
			 



      }else {
      	switch ($PerfilUsuario) {
	case 'Programador':
	echo '<li class="treeview">
				<a href="">
					<i class="fa fa-file-text-o"></i>
					<span>Control Procesos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
      						
							<li class="">
								<a href="control-impuestos">
									<i class="fa fa-braille"></i>
									<span>Control de Impuestos</span>
								</a>
							</li>

							<li class="">
								<a href="Control-TSS-Empresa">
									<i class="fa fa-address-card"></i>
									<span>Control de TSS</span>
								</a>
							</li>


					</ul>
							

			 </li>';
					
						
	break;
	
	case 'Administrador':
	echo '<li class="treeview">
				<a href="">
					<i class="fa fa-file-text-o"></i>
					<span>Control Procesos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

					<ul class="treeview-menu">
      						
							<li class="">
								<a href="control-impuestos">
									<i class="fa fa-braille"></i>
									<span>Control de Impuestos</span>
								</a>
							</li>

							<li class="">
								<a href="Control-TSS-Empresa">
									<i class="fa fa-address-card"></i>
									<span>Control de TSS</span>
								</a>
							</li>


					</ul>
							

			 </li>';
					
						
	break;
					
}
      		}
                 



       ?>
       <?php 
       switch ($PerfilUsuario) {
	case 'Programador':
	 echo'<li class="treeview">
				<a href="">
					<i class="fa fa-clock-o"></i>
					<span>Historial</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				

					<ul class="treeview-menu">
						<li>
							<a href="logueos">
								<i class="fa fa-circle-o"></i>
								<span>Logueos</span>
							</a>
						</li>
						<li>
							<a href="auditor-606">
								<i class="fa fa-circle-o"></i>
								<span>Auditor 606</span>
							</a>
						</li>
						<li>
							<a href="auditor-607">
								<i class="fa fa-circle-o"></i>
								<span>Auditor 607</span>
							</a>
						</li>
					
						<li>
							<a href="auditor-608">
								<i class="fa fa-circle-o"></i>
								<span>Auditor 608</span>
							</a>
						</li>
					</ul>
			</li>';

					
						
	break;
	
	case 'Gerente':
	  echo'<li class="treeview">
				<a href="">
					<i class="fa fa-clock-o"></i>
					<span>Historial</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				

					<ul class="treeview-menu">
						<li>
							<a href="logueos">
								<i class="fa fa-circle-o"></i>
								<span>Logueos</span>
							</a>
						</li>
						<li>
							<a href="auditor-606">
								<i class="fa fa-circle-o"></i>
								<span>Auditor 606</span>
							</a>
						</li>
						<li>
							<a href="auditor-607">
								<i class="fa fa-circle-o"></i>
								<span>Auditor 607</span>
							</a>
						</li>
						<li>
							<a href="auditor-608">
								<i class="fa fa-circle-o"></i>
								<span>Auditor 608</span>
							</a>
						</li>
					
						
					</ul>
			</li>';
					
						
	break;
	case 'Administrador':
	  echo'<li class="treeview">
				<a href="">
					<i class="fa fa-clock-o"></i>
					<span>Historial</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				

					<ul class="treeview-menu">
						<li>
							<a href="logueos">
								<i class="fa fa-circle-o"></i>
								<span>Logueos</span>
							</a>
						</li>
						<li>
							<a href="auditor-606">
								<i class="fa fa-circle-o"></i>
								<span>Auditor 606</span>
							</a>
						</li>
						<li>
							<a href="auditor-607">
								<i class="fa fa-circle-o"></i>
								<span>Auditor 607</span>
							</a>
						</li>
						<li>
							<a href="auditor-608">
								<i class="fa fa-circle-o"></i>
								<span>Auditor 608</span>
							</a>
						</li>
						
					</ul>
			</li>';
						
	break;
	case 'Especialista':
	 echo'<li class="treeview">
				<a href="">
					<i class="glyphicon glyphicon-search"></i>
					<span>Auditoria</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				

					<ul class="treeview-menu">
						<li>
							<a href="auditor-606">
								<i class="fa fa-circle-o"></i>
								<span>Auditor 606</span>
							</a>
						</li>
						<li>
							<a href="auditor-607">
								<i class="fa fa-circle-o"></i>
								<span>Auditor 607</span>
							</a>
						</li>
						<li>
							<a href="auditor-608">
								<i class="fa fa-circle-o"></i>
								<span>Auditor 608</span>
							</a>
						</li>
					
						
					</ul>
			</li>';

					
						
	break;
	case 'Tributario':
	 echo'<li class="treeview">
				<a href="">
					<i class="glyphicon glyphicon-search"></i>
					<span>Auditoria</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				

					<ul class="treeview-menu">
						<li>
							<a href="auditor-606">
								<i class="fa fa-circle-o"></i>
								<span>Auditor 606</span>
							</a>
						</li>
						<li>
							<a href="auditor-607">
								<i class="fa fa-circle-o"></i>
								<span>Auditor 607</span>
							</a>
						</li>
						<li>
							<a href="auditor-608">
								<i class="fa fa-circle-o"></i>
								<span>Auditor 608</span>
							</a>
						</li>
					
						
					</ul>
			</li>';

					
						
	break;
					
}


        ?>
      
      <li class="treeview">
				<a href="">
					<i class="fa fa-envelope-o"></i>
					<span>Correo</span>&nbsp;
					<?php 
				$Orden = "id";

              $Rnc_Empresa_Comentario = $_SESSION["RncEmpresaUsuario"];
              $idUsuario = $_SESSION["id"];
              $NombreUsuario = $_SESSION["Nombre"];
              $taidUsuario = "id_Usuario_Dirigido";
              $taNombreUsuario = "Nombre_Usuario_Dirigito";
              $taEstado = "Estado";
              $Estado = 1;


              $mensajes = ControladorComentarios::ctrmensajesNuevo($Rnc_Empresa_Comentario, $Orden, $idUsuario, $NombreUsuario, $taidUsuario, $taNombreUsuario, $taEstado, $Estado);

			if($mensajes){
				echo'
					<span style="border: 1px solid red; background-color: red; color: white;  text-align:center; font-weight: bold">Nuevo</span>';



			}
			?>

					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				

					<ul class="treeview-menu">
						<li>
							<a href="bandejaentrada">
								<i class="fa fa-hdd-o"></i>
								<span>Bandeja de Entrada</span>
							</a>
							<a href="enviados">
								<i class="fa fa-envelope-o"></i>
								<span>Enviandos</span>
							</a>
							<a href="comentarios">
								<i class="fa fa-file-text-o"></i>
								<span>Seguimiento</span>
							</a>
						</li>
						
						
					</ul>
			</li>

      <?php 
      switch ($PerfilUsuario) {
	case 'Programador':
	echo '<li class="treeview">
				<a href="">
					<i class="fa fa-cog"></i>
					<span>Configuración</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>


				<ul class="treeview-menu">	
					<li class="treeview">
							<a href="">
							<i class="fa fa-cog"></i>
								
								<span>Configuracion Empresarial</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							
							<ul class="treeview-menu">
							<li>
									<a href="configuracionFiscal">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Configuracion Fiscal</span>
									</a>
								</li>
								<li>
									<a href="configuracionSocial">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Configuracion Identidad</span>
									</a>
								</li>
								<li>
									<a href="configuraciontikect">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Configuracion tikect</span>
									</a>
								</li>
								
								
							</ul>

					
			</li>

			<li class="treeview">
				<a href="">
					<i class="fa fa-cog"></i>
					<span>Control Correlativos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

				<ul class="treeview-menu">	
				<li>
									<a href="correlativos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Agregar Correlativos</span>
									</a>
								</li>
				<li>
					<a href="historicocorrelativos">
						<i class="glyphicon glyphicon-saved"></i>
						<span>Historicos de Correlativos</span>
					</a>
				</li>
								
		
						
								
								
				</ul>

			</ul>		
			</li> ';
					
						
	break;
	
	case 'Gerente':
	echo '<li class="treeview">
				<a href="">
					<i class="fa fa-cog"></i>
					<span>Configuración</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>


				<ul class="treeview-menu">	
					<li class="treeview">
							<a href="">
							<i class="fa fa-cog"></i>
								
								<span>Configuracion Empresarial</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							
							<ul class="treeview-menu">
							<li>
									<a href="configuracionFiscal">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Configuracion Fiscal</span>
									</a>
								</li>
								<li>
									<a href="configuracionSocial">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Configuracion Identidad</span>
									</a>
								</li>
								<li>
									<a href="configuraciontikect">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Configuracion tikect</span>
									</a>
								</li>
								
								
							</ul>

					
			</li>

			<li class="treeview">
				<a href="">
					<i class="fa fa-cog"></i>
					<span>Control Correlativos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

				<ul class="treeview-menu">	
				<li>
									<a href="correlativos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Agregar Correlativos</span>
									</a>
								</li>
				<li>
					<a href="historicocorrelativos">
						<i class="glyphicon glyphicon-saved"></i>
						<span>Historicos de Correlativos</span>
					</a>
				</li>
								
		
						
								
								
				</ul>

			</ul>		
			</li> ';
					
					
						
	break;
	case 'Administrador':
	echo '<li class="treeview">
				<a href="">
					<i class="fa fa-cog"></i>
					<span>Configuración</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>


				<ul class="treeview-menu">	
					<li class="treeview">
							<a href="">
							<i class="fa fa-cog"></i>
								
								<span>Configuracion Empresarial</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							
							<ul class="treeview-menu">
							<li>
									<a href="configuracionFiscal">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Configuracion Fiscal</span>
									</a>
								</li>
								<li>
									<a href="configuracionSocial">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Configuracion Identidad</span>
									</a>
								</li>
								<li>
									<a href="configuraciontikect">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Configuracion tikect</span>
									</a>
								</li>
								
								
							</ul>

					
			</li>

			<li class="treeview">
				<a href="">
					<i class="fa fa-cog"></i>
					<span>Control Correlativos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

				<ul class="treeview-menu">	
				<li>
									<a href="correlativos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Agregar Correlativos</span>
									</a>
								</li>
				<li>
					<a href="historicocorrelativos">
						<i class="glyphicon glyphicon-saved"></i>
						<span>Historicos de Correlativos</span>
					</a>
				</li>
								
		
						
								
								
				</ul>

			</ul>		
			</li> ';
					
					
	break;
	case 'Tributario':
	echo '<li class="treeview">
				<a href="">
					<i class="fa fa-cog"></i>
					<span>Configuración</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>


				<ul class="treeview-menu">	
					<li class="treeview">
							<a href="">
							<i class="fa fa-cog"></i>
								
								<span>Configuracion Empresarial</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							
							<ul class="treeview-menu">
							<li>
									<a href="configuracionFiscal">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Configuracion Fiscal</span>
									</a>
								</li>
								<li>
									<a href="configuracionSocial">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Configuracion Identidad</span>
									</a>
								</li>
								<li>
									<a href="configuraciontikect">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Configuracion tikect</span>
									</a>
								</li>
								
								
							</ul>

					
			</li>

			<li class="treeview">
				<a href="">
					<i class="fa fa-cog"></i>
					<span>Control Correlativos</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

				<ul class="treeview-menu">	
				<li>
									<a href="correlativos">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Agregar Correlativos</span>
									</a>
								</li>
				<li>
					<a href="historicocorrelativos">
						<i class="glyphicon glyphicon-saved"></i>
						<span>Historicos de Correlativos</span>
					</a>
				</li>
								
		
						
								
								
				</ul>

			</ul>		
			</li> ';
					
					
	break;

					
}


       ?>


       <?php 
      switch ($PerfilUsuario) {
	case 'Programador':
echo '<li class="treeview">
		<a href="">
			<i class="fa fa-cog"></i>
			<span>Ajustes Programador</span>
			<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
<ul class="treeview-menu">
		<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Suplidor</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="agregarsuplidorgrowindgii">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Agregar Suplidor Growin DGII</span>
									</a>
								</li>
								<li>
									<a href="">
										<i class="glyphicon glyphicon-saved"></i>
										<span>campolibre</span>
									</a>
								</li>
								</ul>
							</li>	



		<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Contabilidad</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="catalogocuentasmasivaempresas">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Plan cuenta todas empresas</span>
									</a>
								</li>
								<li>
									<a href="">
										<i class="glyphicon glyphicon-saved"></i>
										<span>campolibre</span>
									</a>
								</li>
								
							</ul>

		</li>

<li class="treeview">
							<a href="">
								<i class="glyphicon glyphicon-saved"></i>
								<span>Campos libres</span>
							</a>
							<ul class="treeview-menu">
							<li>
									<a href="catalogocuentasmasivaempresas">
										<i class="glyphicon glyphicon-saved"></i>
										<span>Plan cuenta todas empresas</span>
									</a>
								</li>
								<li>
									<a href="">
										<i class="glyphicon glyphicon-saved"></i>
										<span>campolibre</span>
									</a>
								</li>
								
							</ul>

		</li>


</li>';//** cierre menu

						
	break;
	

	

					
}


       ?>
       </li>


	</ul>
	</section>



</aside>