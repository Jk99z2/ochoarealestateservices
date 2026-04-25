<!DOCTYPE html>
<html lang="es">

<!-- Comienza head, importaciones, etc -->
  <head>
    <title>Ochoa Real Estate Services</title>
    <?php include 'elements/imports.php'; ?>
  </head>
<!-- Termina head, importaciones, etc -->
  
  <body>

    <?php 
			include 'elements/top-header.html'; 
			include 'elements/def_navbar.php';
    ?>

    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Inicio</a></span> <span>Contacto</span></p>
            <h1 class="mb-3 bread">Contáctanos</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-white contact-form">
              <div class="col-md-12 mb-4 mt-2">
                <h2 class="h3">Contáctanos</h2>
              </div>
              <div class="info bg-white p-4 mb-2">
                <p><span class="icon icon-map-marker"></span><span>&nbsp;Dirección:</span>Lluvia de Oro 57, Arboledas, 28869 Manzanillo, Col.</p>
              </div>
              <div class="info bg-white p-4 mb-1">
                <p><span class="icon icon-phone"></span><span>&nbsp;Teléfono:</span> <a href="tel://3143333202">+52 (314) 333-3202 Oficina</a></p>
              </div>
              <div class="info bg-white p-4">
                <p><span class="icon icon-phone"></span><span>&nbsp;Celular</span> <a href="tel://3143769162">+52 (314) 376-9162 Celular</a></p>
              </div>
              <div class="info bg-white p-4">
                <p><span class="icon icon-envelope"></span><span>&nbsp;Email:</span><a href="mailto:ventas@ochoarealestateservices.com">	ventas@ochoarealestateservices.com</a></p>
              </div>
            </form>
          </div>

          <div class="col-md-6 d-flex">
          	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3169.874021495058!2d-104.3394292480467!3d19.123585655913434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8424d6f477753ddd%3A0x9d69d8cca9a055c!2sOchoa%20Real%20Estate%20Services!5e0!3m2!1ses!2smx!4v1651766678320!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="bg-white"></iframe>
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