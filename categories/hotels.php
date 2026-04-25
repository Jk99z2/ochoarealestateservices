<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<!-- Comienza head, importaciones, etc -->
  <head>
    <title>Ochoa Real Estate Services</title>
    <?php 
		include '../elements/imports.php'; 
		include '../db/dconn.php';
		?>
		<style>
			.dropdown-text-black
			{
				color: black;
			}
		</style>
  </head>
<!-- Termina head, importaciones, etc -->
  
  <body>

  	<?php 
			include '../elements/top-header.html';
		?>

		<?php
			include '../elements/def_navbar.php';
		?>

    <div class="hero-wrap" style="background-image: url('../images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Inicio</a></span> <span></span></p>
            <h1 class="mb-3 bread">Hoteles</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-search">
    	<div class="container">
	    	<div class="row">
					<div class="col-md-12 search-wrap">
						<h2 class="heading h5 d-flex align-items-center pr-4"><span class="ion-ios-search mr-3"></span> Buscar propiedad</h2>
						<form name="frmSearch" method="post" action="hotels" class="search-property">
	        		<div class="row">

	        			<div class="col-md align-items-end">
	        				<div class="form-group">
	        					<label for="#">Ubicación/municipio</label>
	        					<div class="form-field">
	          					<div class="select-wrap">
	                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                      <select name="ubicacion" id="ubicacion" class="form-control" required>
													<optgroup label="--  Colima  --" class="dropdown-text-black">
														<option value="Manzanillo, Colima" class="dropdown-text-black">Manzanillo</option>
														<option value="Colima, Colima" class="dropdown-text-black">Colima</option>
														<option value="Armería, Colima" class="dropdown-text-black">Armería</option>
														<option value="Comala, Colima" class="dropdown-text-black">Comala</option>
														<option value="Coquimatlán, Colima" class="dropdown-text-black">Coquimatlán</option>
														<option value="Cuauhtémoc, Colima" class="dropdown-text-black">Cuauhtémoc</option>
														<option value="Ixtlahuacán, Colima" class="dropdown-text-black">Ixtlahuacán</option>
														<option value="Minatitlán, Colima" class="dropdown-text-black">Minatitlán</option>
														<option value="Tecomán, Colima" class="dropdown-text-black">Tecomán</option>
														<option value="Villa de Álvarez, Colima" class="dropdown-text-black">Villa de Álvarez</option>
													</optgroup>
													<optgroup label="--  Jalisco  --" class="dropdown-text-black">
														<option value="Puerto Vallarta, Jalisco" class="dropdown-text-black">Puerto Vallarta</option>
														<option value="Guadalajara, Jalisco" class="dropdown-text-black">Guadalajara</option>
														<option value="El Salto, Jalisco" class="dropdown-text-black">El Salto</option>
														<option value="Tapalpa, Jalisco" class="dropdown-text-black">Tapalpa</option>
														<option value="Degollado, Jalisco" class="dropdown-text-black">Degollado</option>
														<option value="Tonila, Jalisco" class="dropdown-text-black">Tonila</option>
														<option value= "Mazamitla, Jalisco" class="dropdown-text-black">Mazamitla</option>
														<option value="Talpa, Jalisco" class="dropdown-text-black">Talpa de Allende</option>
													</optgroup>
	                      </select>
	                    </div>
			              </div>
		              </div>
	        			</div>

	        			<div class="col-md align-items-end">
	        				<div class="form-group">
	        					<label for="#">Fecha de publicación</label>
	        					<div class="form-field">
	          					<div class="select-wrap">
	                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                      <select name="ordenfecha" id="ordenfecha" class="form-control" required>
													<option value="" class="dropdown-text-black">Ordenar por</option>
	                      	<option value="DESC" class="dropdown-text-black">Más recientes</option>
	                        <option value="ASC" class="dropdown-text-black">Más antiguas</option>
	                      </select>
	                    </div>
			              </div>
		              </div>
	        			</div>

	        			<div class="col-md align-items-end">
	        				<div class="form-group">
	        					<label for="#">Tipo</label>
	        					<div class="form-field">
	          					<div class="select-wrap">
	                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                      <select name="tipo" id="tipo" class="form-control" required>
	                      	<option value="" class="dropdown-text-black">Tipo</option>
	                        <option value="renta" class="dropdown-text-black">Renta</option>
	                        <option value="venta" class="dropdown-text-black">Venta</option>
	                      </select>
	                    </div>
			              </div>
		              </div>
	        			</div>
	        		</div>
	        			<div class="col-md align-items-end">
	        				<div class="form-group">
	        					<label for="#">Precio máximo</label>
	        					<div class="form-field">
	          					<div class="select-wrap">
	                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                      <select name="preciomax" id="preciomax" class="form-control" required>
													<option value="" class="dropdown-text-black">Precio</option>
													<option value="500000" class="dropdown-text-black">$500,000</option>
													<option value="600000" class="dropdown-text-black">$600,000</option>
													<option value="700000" class="dropdown-text-black">$700,000</option>
													<option value="800000" class="dropdown-text-black">$800,000</option>
													<option value="900000" class="dropdown-text-black">$900,000</option>
													<option value="1000000" class="dropdown-text-black">$1,000,000</option>
													<option value="2000000" class="dropdown-text-black">$2,000,000</option>
													<option value="3000000" class="dropdown-text-black">$3,000,000</option>
													<option value="5000000" class="dropdown-text-black">$5,000,000</option>
													<option value="10000000" class="dropdown-text-black">$10,000,000</option>
													<option value="50000000" class="dropdown-text-black">$50,000,000</option>
	                      </select>
	                    </div>
			              </div>
		              </div>
	        			</div>
	        			<div class="col-md align-self-end">
	        				<div class="form-group">
	        					<div class="form-field">
			                <button type="submit" class="form-control btn btn-primary">Buscar</button>
			              </div>
		              </div>
	        			</div>
	        		</div>
	        	</form>
					</div>
	    	</div>
	    </div>
    </section>
		
		<?php

			if(isset($_POST['ubicacion'], $_POST['ordenfecha'], $_POST['tipo'], $_POST['preciomax']))
			{
				$ubicacion = $_POST['ubicacion'];
				$ordenfecha = $_POST['ordenfecha'];
				$tipo = $_POST['tipo'];
				$preciomax = $_POST['preciomax'];

				$select_smt = $db->prepare("SELECT propiedades.*, fotos.*
				FROM propiedades
				RIGHT JOIN fotos ON propiedades.id = fotos.id_property
				WHERE ubicacion = :uubicacion AND vrenta = :uvrenta AND pr_int < :uprecio AND categoria = 'Hotel' AND autorizada = 'Si' AND vendido = 'No' ORDER BY fecha $ordenfecha");
				$select_smt->bindParam(':uubicacion', $ubicacion);
				$select_smt->bindParam(':uvrenta', $tipo);
				$select_smt->bindParam(':uprecio', $preciomax);
				$select_smt->execute();
				$count = $select_smt->rowCount();
				if($count == 0)
				{
					$count = 'No hay resultados, lo sentimos&nbsp; :(...';
				}
				else
				{
					$count = 'Mostrando&nbsp;'.$count.'&nbsp;resultados';
				}
			}
			else
			{
				$select_smt = $db->prepare("SELECT propiedades.*, fotos.* 
				FROM propiedades
				RIGHT JOIN fotos ON propiedades.id = fotos.id_property
				WHERE categoria = 'Hotel' AND autorizada = 'Si' AND vendido = 'No'");
				$select_smt->execute();

				$count = $select_smt->rowCount();
				if($count == 0)
				{
					$count = 'No hay resultados, lo sentimos&nbsp; :(...';
				}
				else
				{
					$count = 'Mostrando&nbsp;'.$count.'&nbsp;resultados';
				}
			}
			while($row = $select_smt->fetch(PDO::FETCH_ASSOC))
			{
				$rows[] = $row;
			}
			?>
			<section class="ftco-section bg-light">
				<div class="container">
						<h4><?php echo $count; ?></h4>
						<div class="row">
					<?php
					foreach($rows as $row)
					{
						?>
							<div class="col-md-4 ftco-animate">
								<div class="properties">
									<a style="background-image: url(../images/properties/<?php echo $row['foto1']; ?>);" class="img img-2 d-flex justify-content-center align-items-center" href="../catalogo/property-single.php?id=<?php echo $row['id']; ?>">
										<div class="icon d-flex justify-content-center align-items-center">
											<span class="icon-search2"></span>
										</div>
									</a>
									<div class="text p-3">
										<span class="status sale">En <?php echo $row['vrenta']; ?></span>
										<div class="d-flex">
											<div class="one">
												<h3><a href="../catalogo/property-single.php?id=<?php echo $row['id']; ?>"><?php echo $row['titulo']; ?></a></h3>
												<p><?php echo $row['categoria']; ?></p>
											</div>
											<div class="two">
												<span class="price">$<?php echo $row['precio']; ?></span>
											</div>
										</div>
										<p><?php echo $row['descripcion']; ?></p>
										<hr>
										<p class="bottom-area d-flex">
											<span><i class="flaticon-selection"></i><i class="flaticon-selection"></i> <?php echo $row['terreno']; ?>m&sup2;</span>
											<span class="ml-auto"><i class="flaticon-bathtub"></i><?php echo $row['banios']; ?></span>
											<span><i class="flaticon-bed"></i><?php echo $row['recamaras'] ?></span>
										</p>
									</div>
								</div>
							</div>
		<?php
				}
		?>	
						</div>
					</div>
				</section>
	
  <?php include '../elements/footer.html'; ?>

  <!-- loader -->
  	<div id="ftco-loader" class="show fullscreen">
  		<svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg>
  	</div>
  <!-- loader -->

  <?php include '../elements/scripts.html'; ?>
    
  </body>
</html>