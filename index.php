<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">

<!-- Comienza head, importaciones, etc -->
  <head>
    <title>Ochoa Real Estate Services</title>
    <?php 
			include 'elements/imports.php'; 
			include 'db/dconn.php';
		?>
  </head>
<!-- Termina head, importaciones, etc -->
  
	<body>

		<?php 
			include 'elements/top-header.html';
			include 'elements/def_navbar.php';
		?>

	<!-- Inicia carrusel -->
		<section class="home-slider owl-carousel">
		<?php
						$autorizada 	= 'Si';
						$vendido 			= 'No';
						$hotel 				= 'Hotel';
						$depto 				= 'Departamento';
						$casa 				= 'Casa';
						
						$select_smt = $db->prepare("SELECT propiedades.*, fotos.*
						FROM propiedades
						RIGHT JOIN fotos ON propiedades.id = fotos.id_property
						WHERE propiedades.autorizada=:uautorizada AND propiedades.vendido=:uvendido AND
						propiedades.categoria = :ucasa OR propiedades.categoria = :udepto OR
						propiedades.categoria = :uhotel
						ORDER BY propiedades.fecha DESC LIMIT 4");
						$select_smt->bindValue(':uautorizada', $autorizada);
						$select_smt->bindValue(':uvendido', $vendido);
						$select_smt->bindValue(':ucasa', $casa);
						$select_smt->bindValue(':udepto', $depto);
						$select_smt->bindValue(':uhotel', $hotel);
						$select_smt->execute();
						while($row1 = $select_smt->fetch(PDO::FETCH_ASSOC))
						{
							$rows1[] = $row1;
						}
						foreach($rows1 as $row1)
						{

					?>
				<div class="slider-item" style="background-image:url(images/properties/<?php echo $row1['foto1']; ?>);">
					<div class="overlay"></div>
					<div class="container">
						<div class="row no-gutters slider-text align-items-md-end align-items-center justify-content-end">
							<div class="col-md-6 text p-4 ftco-animate">
								<h1 class="mb-3"><?php echo $row1['titulo']; ?></a></h1>
								<span class="location d-block mb-3"><i class="icon-my_location"></i>&nbsp;<?php echo $row1['ubicacion']; ?></span>
								<p><?php echo $row1['descripcion'];?></p>
								<span class="price">$ &nbsp;<?php echo $row1['precio']; ?></span>
									<a href="/catalogo/property-single.php?id=<?php echo $row1['id']; ?>" class="btn-custom p-3 px-4 bg-primary">Detalles<span class="icon-plus ml-1"></span></a>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			?>
		</section>
	<!-- Termina carrusel -->

<!-- Inician iconos descriptivas -->
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-pin"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Encuentra el lugar ideal</h3>
                <p>Contamos con una gran variedad de bienes inmuebles en Colima y sus alrededores.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-detective"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Tenemos agentes con experiencia</h3>
                <p>Nuestros agentes están preparados para atender todas las dudas que puedas tener.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-sel Searchf-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-house"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Compra y renta las mejores propiedades</h3>
                <p>Consulta en nuestro catálogo de propiedades lo que más se adapte a lo que necesites.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-purse"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Cuida tu bolsillo</h3>
                <p>En Ochoa Real Estate Services cuidamos tu economía, tenemos inmuebles a los mejores precios.</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>
<!-- Terminan iconos descriptivos -->

	<section class="ftco-section ftco-properties">
		<div class="container">

		<!-- Encabezado  de propiedades recientes-->
			<div class="row justify-content-center mb-5 pb-3">
	      <div class="col-md-7 heading-section text-center ftco-animate">
	      	<span class="subheading">Publicaciones recientes</span>
	        <h2 class="mb-4">Nuevas propiedades</h2>
	      </div>
	    </div>
	  <!-- Termina encabezado -->

			<div class="row">
				<div class="col-md-12">
					
					<div class="properties-slider owl-carousel ftco-animate">
					<?php
						$autorizada2 = 'Si';
						$vendido2 = 'No';
						$select_smt2 = $db->prepare("SELECT propiedades.*, fotos.*
						FROM propiedades
						RIGHT JOIN fotos ON propiedades.id = fotos.id_property
						WHERE autorizada=:uautorizada2 and vendido=:uvendido2
						ORDER BY propiedades.fecha DESC LIMIT 9");
						$select_smt2->bindValue(':uautorizada2', $autorizada2);
						$select_smt2->bindValue(':uvendido2', $vendido2);
						$select_smt2->execute();
						while($row2 = $select_smt2->fetch(PDO::FETCH_ASSOC))
						{
							$rows2[] = $row2;
						}
						foreach($rows2 as $row2)
						{

					?>
    		<!-- Inicia propiedad recomendada -->
				<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="properties">
    					<a href="/catalogo/property-single.php?id=<?php echo $row2['id']; ?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/properties/<?php echo $row2['foto1']; ?>);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<span class="status sale">En <?php echo $row2['vrenta']; ?></span>
    						<div class="d-flex">
    							<div class="one">
										<h3><a href="/catalogo/property-single.php?id=<?php echo $row2['id']; ?>"><?php echo $row2['titulo']; ?></a></h3>
		    						<p><?php echo $row2['categoria'] ?></p>
	    						</div>
	    						<div class="two">
	    							<span class="price">$&nbsp;<?php echo $row2['precio']; ?></span>
    							</div>
    						</div>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="flaticon-selection"></i> <?php echo $row2['terreno']; ?>m&sup2;</span>
    							<span class="ml-auto"><i class="flaticon-bathtub"></i><?php echo $row2['banios']; ?></span>
    							<span><i class="flaticon-bed"></i><?php echo $row2['recamaras'] ?></span>
    						</p>
    					</div>
    				</div>
    			</div>
    		<!-- Termina propiedad recomendada -->
					<?php
						}
					?>
					</div>

				</div>
			</div>

		</div>
	</section>

    <section class="ftco-section bg-light">
    <!-- Inicia encabezado recomendados -->
    	<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Propiedades recomendadas</h2>
          </div>
        </div>    		
    	</div>
    <!-- Termina encabezado -->

    	<div class="container-fluid">
    		<div class="row">
				<?php
						$autorizada 	= 'Si';
						$vendido 			= 'No';
						$hotel 				= 'Hotel';
						$depto 				= 'Departamento';
						$casa 				= 'Casa';
						
						$select_smt3 = $db->prepare("SELECT propiedades.*, fotos.*
						FROM propiedades
						RIGHT JOIN fotos ON propiedades.id = fotos.id_property
						WHERE propiedades.autorizada=:uautorizada AND propiedades.vendido=:uvendido AND
						propiedades.categoria = :ucasa OR propiedades.categoria = :udepto OR
						propiedades.categoria = :uhotel
						ORDER BY propiedades.fecha DESC LIMIT 4");
						$select_smt3->bindValue(':uautorizada', $autorizada);
						$select_smt3->bindValue(':uvendido', $vendido);
						$select_smt3->bindValue(':ucasa', $casa);
						$select_smt3->bindValue(':udepto', $depto);
						$select_smt3->bindValue(':uhotel', $hotel);
						$select_smt3->execute();
						while($row3 = $select_smt3->fetch(PDO::FETCH_ASSOC))
						{
							$rows3[] = $row3;
						}

				foreach($rows3 as $row3)
				{
				?>
    		<!-- Inicia propiedad recomendada -->
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="properties">
    					<a href="/catalogo/property-single.php?id=<?php echo $row3['id']; ?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/properties/<?php echo $row3['foto1']; ?>);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<span class="status sale">En <?php echo $row3['vrenta']; ?></span>
    						<div class="d-flex">
    							<div class="one">
										<h3><a href="/catalogo/property-single.php?id=<?php echo $row2['id']; ?>"><?php echo $row3['titulo']; ?></a></h3>
		    						<p><?php echo $row3['categoria'] ?></p>
	    						</div>
	    						<div class="two">
	    							<span class="price">$&nbsp;<?php echo $row3['precio']; ?></span>
    							</div>
    						</div>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="flaticon-selection"></i> <?php echo $row3['terreno']; ?>m&sup2;</span>
    							<span class="ml-auto"><i class="flaticon-bathtub"></i><?php echo $row3['banios']; ?></span>
    							<span><i class="flaticon-bed"></i><?php echo $row3['recamaras'] ?></span>
    						</p>
    					</div>
    				</div>
    			</div>
    		<!-- Termina propiedad recomendada -->
    		<?php
				}
				?>
    		</div>
    	</div>

    </section>

  <?php include 'elements/footer.html'; ?>

  <!-- loader -->
  	<div id="ftco-loader" class="show fullscreen">
  		<svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg>
  	</div>
  <!-- loader -->

  <?php include 'elements/scripts.html'; ?>
  </body>
</html>