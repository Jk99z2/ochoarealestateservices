<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<!-- Comienza head, importaciones, etc -->
  <head>
    <title>Ochoa Real Estate Services</title>
    <?php 
		include 'elements/imports.php'; 
		include 'db/dconn.php';
		?>
		<style>
			.dropdown-text-black{
				color: black;
			}
		</style>
  </head>
<!-- Termina head, importaciones, etc -->
  
  <body>

  	<?php 
			include 'elements/top-header.html';
		?>

		<?php
			include 'elements/def_navbar.php';
		?>

    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="">Inicio</a></span> <span></span></p>
            <h1 class="mb-3 bread">Todas las categorías</h1>
          </div>
        </div>
      </div>
    </div>

			<section class="ftco-section bg-light">
				<div class="container">
						<div class="row">

							<div class="col-md-4 ftco-animate">
								<div class="properties">
									<a style="background-image: url(images/bg_1.jpg);" class="img img-2 d-flex justify-content-center align-items-center" href="categories/all">
										<div class="icon d-flex justify-content-center align-items-center">
											<span class="icon-search2"></span>
										</div>
									</a>
									<div class="text p-3">
										<span class="status sale"></span>
										<div class="d-flex">
											<div class="one">
												<h3><a href="categories/all">Todas</a></h3>
												<p>Mostrar todos los inmuebles.</p>
											</div>
											<div class="two">
												<span class="price"></span>
											</div>
										</div>
										<p></p>
										<hr>
									</div>
								</div>
							</div>

							<div class="col-md-4 ftco-animate">
								<div class="properties">
									<a style="background-image: url(images/bg_bodega.jpg);" class="img img-2 d-flex justify-content-center align-items-center" href="categories/bodega">
										<div class="icon d-flex justify-content-center align-items-center">
											<span class="icon-search2"></span>
										</div>
									</a>
									<div class="text p-3">
										<span class="status sale"></span>
										<div class="d-flex">
											<div class="one">
												<h3><a href="categories/bodega">Bodegas</a></h3>
												<p>Mostrar Bodegas.</p>
											</div>
											<div class="two">
												<span class="price"></span>
											</div>
										</div>
										<p></p>
										<hr>
									</div>
								</div>
							</div>

							<div class="col-md-4 ftco-animate">
								<div class="properties">
									<a style="background-image: url(images/bg_coto.jpg);" class="img img-2 d-flex justify-content-center align-items-center" href="categories/cotos">
										<div class="icon d-flex justify-content-center align-items-center">
											<span class="icon-search2"></span>
										</div>
									</a>
									<div class="text p-3">
										<span class="status sale"></span>
										<div class="d-flex">
											<div class="one">
												<h3><a href="categories/cotos">Cotos</a></h3>
												<p>Mostrar Cotos/Residenciales.</p>
											</div>
											<div class="two">
												<span class="price"></span>
											</div>
										</div>
										<p></p>
										<hr>
									</div>
								</div>
							</div>

							<div class="col-md-4 ftco-animate">
								<div class="properties">
									<a style="background-image: url(images/bg_depa.jpg);" class="img img-2 d-flex justify-content-center align-items-center" href="categories/depart">
										<div class="icon d-flex justify-content-center align-items-center">
											<span class="icon-search2"></span>
										</div>
									</a>
									<div class="text p-3">
										<span class="status sale"></span>
										<div class="d-flex">
											<div class="one">
												<h3><a href="categories/depart">Departamentos</a></h3>
												<p>Mostrar Departamentos.</p>
											</div>
											<div class="two">
												<span class="price"></span>
											</div>
										</div>
										<p></p>
										<hr>
									</div>
								</div>
							</div>

							<div class="col-md-4 ftco-animate">
								<div class="properties">
									<a style="background-image: url(images/bg_hectares.jpg);" class="img img-2 d-flex justify-content-center align-items-center" href="categories/hectares">
										<div class="icon d-flex justify-content-center align-items-center">
											<span class="icon-search2"></span>
										</div>
									</a>
									<div class="text p-3">
										<span class="status sale"></span>
										<div class="d-flex">
											<div class="one">
												<h3><a href="categories/hectares">Hectareas</a></h3>
												<p>Mostrar Hectáreas.</p>
											</div>
											<div class="two">
												<span class="price"></span>
											</div>
										</div>
										<p></p>
										<hr>
									</div>
								</div>
							</div>
						
							<div class="col-md-4 ftco-animate">
								<div class="properties">
									<a style="background-image: url(images/bg_hotel.jpg);" class="img img-2 d-flex justify-content-center align-items-center" href="categories/hotels">
										<div class="icon d-flex justify-content-center align-items-center">
											<span class="icon-search2"></span>
										</div>
									</a>
									<div class="text p-3">
										<span class="status sale"></span>
										<div class="d-flex">
											<div class="one">
												<h3><a href="categories/hotels">Hoteles</a></h3>
												<p>Mostrar Hoteles.</p>
											</div>
											<div class="two">
												<span class="price"></span>
											</div>
										</div>
										<p></p>
										<hr>
									</div>
								</div>
							</div>

							<div class="col-md-4 ftco-animate">
								<div class="properties">
									<a style="background-image: url(images/bg_houses.jpeg);" class="img img-2 d-flex justify-content-center align-items-center" href="categories/houses">
										<div class="icon d-flex justify-content-center align-items-center">
											<span class="icon-search2"></span>
										</div>
									</a>
									<div class="text p-3">
										<span class="status sale"></span>
										<div class="d-flex">
											<div class="one">
												<h3><a href="categories/houses">Casas</a></h3>
												<p>Mostrar todas las Casas</p>
											</div>
											<div class="two">
												<span class="price"></span>
											</div>
										</div>
										<p></p>
										<hr>
									</div>
								</div>
							</div>

							<div class="col-md-4 ftco-animate">
								<div class="properties">
									<a style="background-image: url(images/bg_local.jpg);" class="img img-2 d-flex justify-content-center align-items-center" href="categories/locals">
										<div class="icon d-flex justify-content-center align-items-center">
											<span class="icon-search2"></span>
										</div>
									</a>
									<div class="text p-3">
										<span class="status sale"></span>
										<div class="d-flex">
											<div class="one">
												<h3><a href="categories/locals">Locales</a></h3>
												<p>Mostrar Locales comerciales</p>
											</div>
											<div class="two">
												<span class="price"></span>
											</div>
										</div>
										<p></p>
										<hr>
									</div>
								</div>
							</div>

							<div class="col-md-4 ftco-animate">
								<div class="properties">
									<a style="background-image: url(images/bg_houses.jpeg);" class="img img-2 d-flex justify-content-center align-items-center" href="categories/rent">
										<div class="icon d-flex justify-content-center align-items-center">
											<span class="icon-search2"></span>
										</div>
									</a>
									<div class="text p-3">
										<span class="status sale"></span>
										<div class="d-flex">
											<div class="one">
												<h3><a href="categories/rent">Renta</a></h3>
												<p>Mostrar inmuebles en Renta</p>
											</div>
											<div class="two">
												<span class="price"></span>
											</div>
										</div>
										<p></p>
										<hr>
									</div>
								</div>
							</div>

							<div class="col-md-4 ftco-animate">
								<div class="properties">
									<a style="background-image: url(images/bg_fracc.jpg);" class="img img-2 d-flex justify-content-center align-items-center" href="categories/subdivisions">
										<div class="icon d-flex justify-content-center align-items-center">
											<span class="icon-search2"></span>
										</div>
									</a>
									<div class="text p-3">
										<span class="status sale"></span>
										<div class="d-flex">
											<div class="one">
												<h3><a href="categories/subdivisions">Fraccionamientos</a></h3>
												<p>Mostrar Fraccionamientos</p>
											</div>
											<div class="two">
												<span class="price"></span>
											</div>
										</div>
										<p></p>
										<hr>
									</div>
								</div>
							</div>

							<div class="col-md-4 ftco-animate">
								<div class="properties">
									<a style="background-image: url(images/bg_terreno.jpg);" class="img img-2 d-flex justify-content-center align-items-center" href="categories/terrains">
										<div class="icon d-flex justify-content-center align-items-center">
											<span class="icon-search2"></span>
										</div>
									</a>
									<div class="text p-3">
										<span class="status sale"></span>
										<div class="d-flex">
											<div class="one">
												<h3><a href="categories/terrains">Terrenos</a></h3>
												<p>Mostrar Terrenos</p>
											</div>
											<div class="two">
												<span class="price"></span>
											</div>
										</div>
										<p></p>
										<hr>
									</div>
								</div>
							</div>

							<div class="col-md-4 ftco-animate">
								<div class="properties">
									<a style="background-image: url(images/bg_office.jpeg);" class="img img-2 d-flex justify-content-center align-items-center" href="categories/office">
										<div class="icon d-flex justify-content-center align-items-center">
											<span class="icon-search2"></span>
										</div>
									</a>
									<div class="text p-3">
										<span class="status sale"></span>
										<div class="d-flex">
											<div class="one">
												<h3><a href="categories/office">Oficinas</a></h3>
												<p>Mostrar Oficinas</p>
											</div>
											<div class="two">
												<span class="price"></span>
											</div>
										</div>
										<p></p>
										<hr>
									</div>
								</div>
							</div>
						
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