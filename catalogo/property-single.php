<!DOCTYPE html>
<html lang="es">

<!-- Comienza head, importaciones, etc -->
  <head>
    <title>Ochoa Real Estate Services</title>
    <?php 
			include '../elements/imports.php';
			include '../db/dconn.php';
      $host = $_SERVER['HTTP_HOST'];
      $url = $_SERVER['REQUEST_URI'];
      $full_url = 'http://' . $host . $url;
		?>
  </head>
<!-- Termina head, importaciones, etc -->
  
  <body>
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v14.0&appId=365846948799894&autoLogAppEvents=1" nonce="GzYpEEil"></script>
  <script type="text/javascript">
  $('.owl-carousel').owlCarousel({
      items:1,
      margin:10,
      autoHeight:true
  });
  </script>
    <?php include '../elements/top-header.html'; ?>

		<?php
			include '../elements/def_navbar.php';
		?>

    <?php

    if(isset($_GET['id']))
      {
       global $id; 
       $id = $_GET['id'];
       $select_smt = $db->prepare("SELECT * FROM propiedades WHERE id=:upid");
       $select_smt->bindParam(':upid', $id);
       $select_smt->execute();
       while($row = $select_smt->fetch(PDO::FETCH_ASSOC))
        {
          $rows[] = $row;
        }

      $select_smt2 = $db->prepare( "SELECT nombre,apellidos,email,contacto
                                    FROM usuarios
                                    LEFT JOIN propiedades
                                    ON usuarios.email=propiedades.email_usuario
                                    WHERE propiedades.id= :upid");
      $select_smt2->bindParam(':upid', $id);
      $select_smt2->execute();
      while($row2 = $select_smt2->fetch(PDO::FETCH_ASSOC))
        {
          $rows2[] = $row2;
        }

      $select_smt3 = $db->prepare("SELECT * FROM fotos WHERE id_property=:upid");
      $select_smt3->bindParam(':upid', $id);
      $select_smt3->execute();
      while($foto = $select_smt3->fetch(PDO::FETCH_ASSOC))
        {
          $fotos[] = $foto;
        }

      foreach($rows as $row)
      {
        foreach($rows2 as $row2)
        {
          foreach($fotos as $foto){
          ?>
    <div class="hero-wrap" style="background-image: url(../images/properties/<?php echo $foto['foto1']; }?>);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="../">Inicio /</a></span> <span class="mr-2"><a href="<?php echo $row['categoria']; ?>">Catálogo /</a></span> <span><?php echo $row['categoria']; ?></span></p>
            <h1 class="mb-3 bread"><?php echo $row['titulo']; ?></h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="row">
          		<div class="col-md-12 ftco-animate">
                <div class="single-slider owl-carousel" id="carousel">
                <?php             
                  foreach($fotos as $foto)
                    {
                      $fotograph = array($foto['foto1'], $foto['foto2'], $foto['foto3'], $foto['foto4'], $foto['foto5'], $foto['foto6'], $foto['foto7'], $foto['foto8'], $foto['foto9'], $foto['foto10']);
                      $clean = array_filter($fotograph);
                      #var_dump($clean); // Log para comprobar la información dentro del array después de filtrar caracteres en blanco o null
                      foreach($clean as $fotograph)
                      {
                        echo 
                        "
                        <div class='properties-img'>
                          <img src='../images/properties/".$fotograph."' class='img-fluid' alt=''>
                        </div>
                        ";
                      }
                          ?>
                  <?php
                    }
                  ?>
          			</div>
          		</div>
          		<div class="col-md-12 Properties-single mt-4 mb-5 ftco-animate">
          			<p class="rate mb-4">
                  <span class="loc"><button class="btn btn-info" onclick="history.go(-1);"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                  </svg>&nbsp; Regresar a la página anterior</button>
                </p>

								<h3 style="color: #ff8703;">$ <?php echo $row['precio']; ?></h3>
          			<h2><?php echo $row['titulo']; ?></h2>


    						<p><?php echo $row['descripcion']; ?></p>
    						<div class="d-md-flex mt-5 mb-5">
    							<ul>
	    							<li><span>Terreno: </span><?php  if($row['terreno'] == null or $row['terreno'] == '' or $row['terreno'] == '0'){ echo "Información no disponible.";}else{ echo $row['terreno'] . "&nbsp;m&sup2;"; }; ?></li>
	    							<li><span>Recamaras: </span><?php echo $row['recamaras']; ?></li>
	    							<li><span>Baños: </span><?php echo $row['banios']; ?></li>
	    							<li><span>Estacionamientos: </span><?php echo $row['estac']; ?></li>
	    						</ul>
	    						<ul class="ml-md-5">
	    							<li><span>Construccion: </span><?php  if($row['construccion'] == null or $row['construccion'] == '' or $row['construccion'] == '0'){ echo "Información no disponible.";}else{ echo $row['construccion'] . "&nbsp;m&sup2;"; }; ?></li>
	    							<li><span>Niveles/pisos: </span><?php echo $row['niveles']; ?></li>
	    						</ul>
    						</div>
          		</div>
          		<div class="col-md-12 properties-single ftco-animate mb-5 mt-4">
          			<h3 class="mb-4">Video</h3>
          			<div class="block-16">
		              <figure>
                    <?php 
                      if($row['video']=="" || $row['video']==null)
                      {
                        echo '<p>Video no disponible.</p>';
                      }
                      else
                      {
                        echo $row['video'];
                      }
                      {

                      }; 
                    ?>
		              </figure>
		            </div>
          		</div>
          	</div>
          </div> <!-- .col-md-8 -->
    <?php
      }
    }
  }
    ?>

          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box ftco-animate" style="width: 23rem !important;">
							<h5><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-map-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.502.502 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5V.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.498.498 0 0 0-.196 0L5 14.09zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1-.5-.1z"/></svg>
							Mapa</h5>
              <div class="embed-responsive" >
                <p class="container" style="width: 400px !important; height: 300px !important;"><?php echo $row['mapa']; ?></p>
              </div>
              <br>
              <h5><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
  						<path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/><path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>
							Ubicación</h5>
              <p style="padding-left: 2rem;"><?php echo $row['ubicacion']; ?></p>
							<h5><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>
							Agente</h5>
							<p style="padding-left: 2rem;">Publicado por: <br><?php echo $row2['nombre'] . '&nbsp;' . $row2['apellidos']; ?></p>
							<p style="padding-left: 2rem;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/></svg>&nbsp;&nbsp;<?php echo $row2['contacto']; ?></p>

							<p style="padding-left: 2rem;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16"><path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg>&nbsp;&nbsp;<?php echo $row2['contacto']; ?></p>

							<p style="padding-left: 2rem;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16"><path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/></svg>&nbsp;&nbsp;<?php echo $row2['email'] ?></p>

            </div>
          </div>
        </div>
      </div>
    </section> <!-- .section -->
  
  <?php include '../elements/footer.html'; ?>

  <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
      <svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg>
    </div>
  <!-- loader -->

  <?php include '../elements/scripts.html'; 
  ?>
    
  </body>
</html>