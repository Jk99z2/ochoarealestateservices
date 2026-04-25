<!-- Pendiente de hacer funcionar el archivo editar con las funciones requeridas del PDO -->
<?php
session_start();
if(!isset($_SESSION['admin_login']))
{
    header('location: ../index.php');
}
if(isset($_SESSION['admin_login']))
  {
    global $correo;
    $correo = $_SESSION['admin_login'];
  }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Nueva propiedad: admin</title>
    <?php 
		  include '../elements/imports.php'; 
		  include '../db/dconn.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <?php 
			include '../elements/top-header.html';
			include '../elements/def_navbar.php';
    ?>
		<div class="wrapper">
			<div class="container col-9">
				<div class="col-lg-12">
          <center>
            <br>
            <h3>Nueva publicación</h3>
            <small>*Nota: Si las propiedades son rentas y ventas, se deben crear publicaciones individuales a cada una.</small>
          </center>
          <!--<form action="insertar_articulo.php" method="post" enctype="multipart/form-data" name="form1" id="propiedad">
            <div class="form-group mb-3 ml-5 mr-5">
              <a class="btn btn-danger" href="datatable-ajax-php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
              </svg>&nbsp; Regresar</a><br><br>
              <label for="titulo" class="form-label">Nombre del inmueble</label>
              <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Ejemplo: CV Casa en Barrio 5" maxlength="24">
            </div>
            <div class="mb-3 ml-5 mr-5">
								<label for="categoria" class="form-label">Categoría</label>
              	<select type="text" class="form-control" name="categoria" id="categoria">
                <option value ="">-- Seleccione la categoría --</option>
                <option value="Casa">Casa</option>
                <option value="Renta">Renta</option>
                <option value="Hectarea">Hectárea</option>
                <option value="Terreno">Terreno</option>
                <option value="Fraccionamiento">Fraccionamiento</option>
                <option value="Coto">Coto</option>
                <option value="Departamento">Departamento</option>
                <option value="Hotel">Hotel</option>
                <option value="Bodega">Bodega</option>
                <option value="Local">Local</option>
                <option value="Oficina">Oficina</option>
              </select>
            </div>
            -->
            <!--<div class="mb-3 ml-5 mr-5">
							<label for="vrenta" class="form-label">En venta/renta</label>
              <select type="text" class="form-control" name="vrenta" id="vrenta">
                <option value ="">-- Seleccione su estado --</option>
                <option value="venta">Venta</option>
                <option value="renta">Renta</option>
              </select>
            </div>
            
            <div class="mb-3 ml-5 mr-5">
							<label for="precio" class="form-label">Precio <small>(separado por ",")</small></label>
              <input type="text" value="" class="form-control" name="precio" id="precio" placeholder="Ejemplo: 1,000,000.00 MXN">
            </div>
            <div class="mb-3 ml-5 mr-5">
						<label for="ubicacion" class="form-label">Ubicación</label>
              <select type="text" class="form-control" name="ubicacion" id="ubicacion">
                <optgroup label="--  Colima  --">
                  <option value="Manzanillo, Colima">Manzanillo</option>
                  <option value="Colima, Colima">Colima</option>
                  <option value="Armería, Colima">Armería</option>
                  <option value="Comala, Colima">Comala</option>
                  <option value="Coquimatlán, Colima">Coquimatlán</option>
                  <option value="Cuauhtémoc, Colima">Cuauhtémoc</option>
                  <option value="Ixtlahuacán, Colima">Ixtlahuacán</option>
                  <option value="Minatitlán, Colima">Minatitlán</option>
                  <option value="Tecomán, Colima">Tecomán</option>
                  <option value="Villa de Álvarez, Colima">Villa de Álvarez</option>
                </optgroup>
                <optgroup label="--  Jalisco  --">
                  <option value="Puerto Vallarta, Jalisco">Puerto Vallarta</option>
                  <option value="Guadalajara, Jalisco">Guadalajara</option>
                  <option value="El Salto, Jalisco">El Salto</option>
                  <option value="Tapalpa, Jalisco">Tapalpa</option>
                  <option value="Degollado, Jalisco">Degollado</option>
                  <option value="Tonila, Jalisco">Tonila</option>
                  <option value= "Mazamitla, Jalisco">Mazamitla</option>
                  <option value="Talpa, Jalisco">Talpa de Allende</option>
                </optgroup>
              </select>
            </div>
            <div class="mb-3 ml-5 mr-5">
						<label for="mapa" class="form-label">Mapa</label>
              <textarea type="text" value="" class="form-control" name="mapa" id="mapa" placeholder="Etiqueta generada por Google Maps. Cambiar los valores de width a 100% y height a 360rem."></textarea>
            </div>
            <div class="mb-3 ml-5 mr-5">
              <label for="terreno" class="form-label">Superficie del Terreno</label>
              <input type="text" class="form-control" name="terreno" id="terreno" value="<?php echo $terreno; ?>" placeholder="Actualiza el área del terreno">
            </div>
            <div class="mb-3 ml-5 mr-5">
							<label for="construccion" class="form-label">Área de Construcción</label>
              <input type="text" class="form-control" name="construccion" id="construccion" maxlenght="30" placeholder="Área de la construcción (en m²)"></input>
            </div>
            <div class="mb-3 ml-5 mr-5">
              <label for="caracteristicas" class="form-label"> Características</label>
              <br>
              <div class="col">
                <small for="niveles" class="mr-5">Niveles</small>
                <small for="recamaras" class="ml-1">Recámaras</small>
                <small for="banios" class="ml-5 mr-3">Baños</small>
                <small for="estacionamientos" class="ml-5">Estacionamientos</small>
              </div>
              <div class="row" style="padding-left: 17px;padding-right: 15px;">
                <input type="text" class="form-control" name="niveles" id="niveles" placeholder="1, 2..."  style="width: 102px; margin-right: 2px;"></input>
                <input type="text" class="form-control" name="recamaras" id="recamaras" placeholder="1, 2..." style="width: 102px; margin-right: 2px;"></input>
                <input type="text" class="form-control" name="banios" id="banios" placeholder="1, 2..." style="width: 102px; margin-right: 2px;"></input>
                <input type="text" class="form-control" name="estac" id="estac" placeholder="1, 2..."  style="width: 102px; margin-right: 2px;"></input>
              </div>
            </div>
            <div class="mb-3 ml-5 mr-5">
              <label for="descripcion" class="form-label">Descripción</label>
              <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Añade la descripción de la propiedad"></textarea>
            </div>
            <div class="mb-3 ml-5 mr-5">
							<label for="expediente" class="form-label">Detalles en la ficha/casa</label>
              <textarea type="text" class="form-control" name="expediente" id="expediente" placeholder="Adjunte aquí detalles sobre el expediente: Información incompleta, falta de documentos/escrituras, sin fotografía, Expediente completo, Propiedad en trámite, etc..."></textarea>
            </div>
            <div class="mb-3 ml-5 mr-5">
							<label for="video" class="form-label">Video YouTube</label>
              <textarea type="text" value="" class="form-control" name="video" id="video" placeholder="Etiqueta de video generada por YouTube (dejar vacío si no tiene)."></textarea>
            </div>
            <div class="mb-3 mr-3 ml-3">
              <center>
                <input type="hidden" name="MAX_TAM" value="2097152">
                <input type="file" class="action-button" name="images[]" id="images" multiple accept=".jpg, .png, .jpeg" required max="10">
                <a class="btn btn-primary" value="Eliminar vista previa" onclick="clearcontent('preview', 'images')" style="color: black;">Eliminar vista previa</a>

              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

              <script type="text/javascript">
                function previewImages() 
                {

                  var preview = document.querySelector('#preview');
                  
                  if (this.files) 
                  {
                    [].forEach.call(this.files, readAndPreview);
                  }

                  function readAndPreview(file) 
                  {

                    // Make sure `file.name` matches our extensions criteria
                    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                      return alert(file.name + " is not an image");
                    } // else...
                    
                    var reader = new FileReader();
                    
                    reader.addEventListener("load", function() 
                    {
                      var image = new Image();
                      image.style.height = "12rem";
                      image.style.width = "12rem";
                      image.style.marginBottom = "1rem";
                      image.style.paddingRight = "1rem";
                      image.title  = file.name;
                      image.src    = this.result;
                      preview.appendChild(image);
                    });
                    
                    reader.readAsDataURL(file);
                  }

                }

                document.querySelector('#images').addEventListener("change", previewImages);

                function clearcontent(elementID) 
                {
                  document.getElementById(elementID).innerHTML = "";
                  document.getElementById('images').value = ''
                }
                </script>


            </div>

            Image preview
            <div class="col-12" id="preview" style="margin-left: 1.8rem;">
            </div>
              </center>
            <br>

            <div class="d-grid gap-2 mb-3 ml-5 mr-5">
              <input type="submit" class="btn btn-primary" name="btn_enviar" id="btn_enviar" value="Guardar">
              <a class="btn btn-danger" href="datatable-ajax-php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
              </svg>&nbsp; Cancelar</a>
            </div>
          </form>-->
  <form action="insertar_articulo.php" method="post" enctype="multipart/form-data" name="form1" id="propiedad">
  <!-- 2 column grid layout with text inputs for the first and last names -->

  <!-- Email input -->
  <div class="form-outline mb-4 mt-4">
    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Ejemplo: CV Casa en Barrio 5" maxlength="50">
    <label class="form-label" for="form3Example3">Nombre del inmueble</label>
  </div>

  <div class="row mb-2">
    <div class="col">
      <div class="form-outline">
      <select type="text" class="form-control" name="ubicacion" id="ubicacion">
        <option value ="">- Seleccione -</option>
                <optgroup label="--  Colima  --">
                  <option value="Manzanillo, Colima">Manzanillo</option>
                  <option value="Colima, Colima">Colima</option>
                  <option value="Armería, Colima">Armería</option>
                  <option value="Comala, Colima">Comala</option>
                  <option value="Coquimatlán, Colima">Coquimatlán</option>
                  <option value="Cuauhtémoc, Colima">Cuauhtémoc</option>
                  <option value="Ixtlahuacán, Colima">Ixtlahuacán</option>
                  <option value="Minatitlán, Colima">Minatitlán</option>
                  <option value="Tecomán, Colima">Tecomán</option>
                  <option value="Villa de Álvarez, Colima">Villa de Álvarez</option>
                </optgroup>
                <optgroup label="--  Jalisco  --">
                  <option value="Puerto Vallarta, Jalisco">Puerto Vallarta</option>
                  <option value="Guadalajara, Jalisco">Guadalajara</option>
                  <option value="El Salto, Jalisco">El Salto</option>
                  <option value="Tapalpa, Jalisco">Tapalpa</option>
                  <option value="Degollado, Jalisco">Degollado</option>
                  <option value="Tonila, Jalisco">Tonila</option>
                  <option value= "Mazamitla, Jalisco">Mazamitla</option>
                  <option value="Talpa, Jalisco">Talpa de Allende</option>
                  <option value="Ciudad Guzmán, Jalisco">Ciudad Guzmán</option>
                </optgroup>
              </select>
        <label class="form-label" for="form3Example1">Ubicación</label>
      </div>
    </div>

    <div class="col">
      <div class="form-outline">
      <select type="text" class="form-control" name="categoria" id="categoria">
                <option value ="">- Seleccione -</option>
                <option value="Casa">Casa</option>
                <option value="Hectarea">Hectárea</option>
                <option value="Terreno">Terreno</option>
                <option value="Fraccionamiento">Fraccionamiento</option>
                <option value="Coto">Coto</option>
                <option value="Departamento">Departamento</option>
                <option value="Hotel">Hotel</option>
                <option value="Bodega">Bodega</option>
                <option value="Local">Local</option>
                <option value="Oficina">Oficina</option>
              </select>
        <label class="form-label" for="form3Example2">Categorías<address></address></label>
      </div>
    </div>
  </div>

  <div class="form-outline mb-4">
    <select type="text" class="form-control" name="vrenta" id="vrenta">
      <option value ="">- Seleccione -</option>
      <option value="venta">Venta</option>
      <option value="renta">Renta</option>
    </select>
    <label for="vrenta" class="form-label">En venta/renta</label>
  </div>

  <!-- Precio input -->
  <div class="form-outline mb-4">
    <input type="text" value="" class="form-control" name="precio" id="precio" placeholder="Ejemplo: 1,000,000.00 MXN">
    <label class="form-label" for="form3Example4">Precio</label>
  </div>

    <!-- Mapa input -->
  <div class="form-outline mb-4">
    <textarea type="text" value="" class="form-control" name="mapa" id="mapa" placeholder="Etiqueta generada por Google Maps. Cambiar los valores de width a 100% y height a 360rem." rows="4"></textarea>
    <label class="form-label" for="form4Example3">Etiqueta de mapa</label>
  </div>

  <div class="row mb-2">
    <div class="col">
      <div class="form-outline">
        <input type="text" class="form-control" name="terreno" id="terreno" placeholder="En m²">
        <label class="form-label" for="form3Example1">Superficie</label>
      </div>
    </div>

    <div class="col">
      <div class="form-outline">
        <input type="text" class="form-control" name="construccion" id="construccion" maxlenght="30" placeholder="En m²"></input>
        <label class="form-label" for="form3Example2">Construcción</label>
      </div>
    </div>
  </div>

  <div class="row mb-2">
    <div class="col">
      <div class="form-outline">
        <input type="text" class="form-control" name="niveles" id="niveles" placeholder="1, 2, 3...">
        <label class="form-label" for="form3Example1">Pisos/niveles</label>
      </div>
    </div>

    <div class="col">
      <div class="form-outline">
        <input type="text" class="form-control" name="recamaras" id="recamaras" maxlenght="30" placeholder="1, 2, 3..."></input>
        <label class="form-label" for="form3Example2">Recámaras</label>
      </div>
    </div>

    <div class="col">
      <div class="form-outline">
        <input type="text" class="form-control" name="banios" id="banios" maxlenght="30" placeholder="1, 1/2, 2..."></input>
        <label class="form-label" for="form3Example2">Baños</label>
      </div>
    </div>

    <div class="col">
      <div class="form-outline">
        <input type="text" class="form-control" name="estac" id="estac" maxlenght="30" placeholder="1, 2, 3..."></input>
        <label class="form-label" for="form3Example2">Estacionamientos</label>
      </div>
    </div>
  </div>

  <div class="form-outline mb-4">
    <textarea class="form-control" rows="4" placeholder="Descripción completa de la propiedad..."  name="descripcion" id="descripcion"></textarea>
    <label class="form-label" for="form4Example3">Descripción del inmueble</label>
  </div>

  <div class="form-outline mb-4">
    <textarea class="form-control" rows="4" placeholder="Estos detalles son solo para los asesores y administradores."  name="expediente" id="expediente"></textarea>
    <label class="form-label" for="form4Example3">Detalles ficha/casa</label>
  </div>

  <div class="form-outline mb-4">
    <textarea class="form-control" id="form4Example3" rows="4" placeholder="Dejar vació si no se tiene video" name="video" id="video"></textarea>
    <label class="form-label" for="form4Example3">Video de Youtube</label>
  </div>


  <div class="form-outline mb-4">
              <center>
                <input type="hidden" name="MAX_TAM" value="2097152">
                <input type="file" class="action-button" name="images[]" id="images" multiple accept=".jpg, .png, .jpeg" required max="10">
                <a class="btn btn-primary" value="Eliminar vista previa" onclick="clearcontent('preview', 'images')" style="color: black;">Eliminar vista previa</a>

              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

              <script type="text/javascript">
                function previewImages() 
                {

                  var preview = document.querySelector('#preview');
                  
                  if (this.files) 
                  {
                    [].forEach.call(this.files, readAndPreview);
                  }

                  function readAndPreview(file) 
                  {

                    // Make sure `file.name` matches our extensions criteria
                    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                      return alert(file.name + " is not an image");
                    } // else...
                    
                    var reader = new FileReader();
                    
                    reader.addEventListener("load", function() 
                    {
                      var image = new Image();
                      image.style.height = "20%";
                      image.style.width = "20%";
                      image.style.marginBottom = "1rem";
                      image.style.paddingRight = "1rem";
                      image.title  = file.name;
                      image.src    = this.result;
                      preview.appendChild(image);
                    });
                    
                    reader.readAsDataURL(file);
                  }

                }

                document.querySelector('#images').addEventListener("change", previewImages);

                function clearcontent(elementID) 
                {
                  document.getElementById(elementID).innerHTML = "";
                  document.getElementById('images').value = ''
                }
                </script>
                <div class="form-outline mb-4 mt-4" id="preview">

            </div>
              </center>
            <br>

              <!--Image preview-->

            </div>

            <div class="d-grid gap-2 mb-3 ml-5 mr-5">
              <input type="submit" class="btn btn-primary" name="btn_enviar" id="btn_enviar" value="Guardar">
              <a class="btn btn-danger" href="datatable-ajax-php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
              </svg>&nbsp; Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>


<?php include '../elements/footer.html'; ?>

<div id="preview"></div>
<!-- loader -->
  <div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg>
  </div>
<!-- loader -->

<?php include '../elements/scripts.html'; ?>
  </body>
</html>