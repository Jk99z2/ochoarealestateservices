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
    <title>Editar artículo: adm</title>
    <?php 
		  include '../elements/imports.php'; 
		  include '../db/dconn.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <?php 
			include '../elements/top-header.html';
			include '../elements/def_navbar.php';
    ?>
    <?php
    if(isset($_GET['id']))
    {
      $id = $_GET['id'];
      $select_smt = $db -> prepare("SELECT * FROM propiedades
      WHERE id = $id;");
      $select_smt -> execute();

      while($row = $select_smt->fetch(PDO::FETCH_ASSOC))
      {
        $rows[] = $row;
      }
      foreach($rows as $row)
      {
        $id           = $row['id'];
        $titulo       = $row['titulo'];
        $categoria    = $row['categoria'];
        $vrenta       = $row['vrenta'];
        $precio       = $row['precio'];
        $precioint    = str_replace(",", "", $precio);
        $ubicacion    = $row['ubicacion'];
        $mapa         = $row['mapa'];
        $terreno      = $row['terreno'];
        $construccion = $row['construccion'];
        $recamaras    = $row['recamaras'];
        $niveles      = $row['niveles'];
        $banios       = $row['banios'];
        $estac        = $row['estac'];
        $descripcion  = $row['descripcion'];
        $expediente   = $row['expediente'];
        $video        = $row['video'];
      ?>
		<div class="wrapper">
			<div class="container col-9">
				<div class="col-lg-12">
          <center>
            <br>
            <h3>Editar publicación</h3>
            <h5>NOTA: Las imagenes <strong>NO</strong> pueden ser editadas. Si desea cambiar las imagenes, <strong>ELIMINE Y RESUBA</strong> la publicación.</h5>
          </center>
          <form action="editar_articulo.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data" name="form1" class="form-horizontal col-lg-12">
            <div class="form-group mb-3 ml-5 mr-5">
              <a class="btn btn-danger" href="datatable-ajax-php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
              </svg>&nbsp; Regresar</a><br><br>
              <label for="titulo" class="form-label">Nombre del inmueble</label>
              <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $titulo; ?>" placeholder="Actualiza el titulo">
            </div>
            <div class="mb-3 ml-5 mr-5">
              <label for="categoria" class="form-label">Categoría</label>
              <select type="text" class="form-control" name="categoria" id="categoria" required>
                <option value ="<?php echo $categoria; ?>"><?php echo $categoria; ?></option>
                <option value="Casa">Casa</option>
                <option value="Hectarea">Hectárea</option>
                <option value="Terreno">Terreno</option>
                <option value="Fraccionamiento">Fraccionamiento</option>
                <option value="Coto">Coto</option>
                <option value="Departamento">Departamento</option>
                <option value="Bodega">Bodega</option>
                <option value="Local">Local</option>
                <option value="Contrato">Contrato</option>
              </select>
            </div>
            <!---->
            <div class="mb-3 ml-5 mr-5">
              <label for="vrenta" class="form-label">En venta/renta</label>
              <select type="text" class="form-control" name="vrenta" id="vrenta" required>
                <option value ="<?php echo $vrenta; ?>">Sin cambios (en <?php echo "<p>".$vrenta."</p>"; ?>)</option>
                <option value="venta">Venta</option>
                <option value="renta">Renta</option>
              </select>
            </div>
            <!---->
            <div class="mb-3 ml-5 mr-5">
              <label for="precio" class="form-label">Precio <small>(separado por ",")</small></label>
              <input type="text" class="form-control" name="precio" id="precio" value="<?php echo $precio; ?>" placeholder="Actualiza el precio">
            </div>
            <div class="mb-3 ml-5 mr-5">
              <label for="ubicacion" class="form-label">Ubicación</label>
              <select type="text" class="form-control" name="ubicacion" id="ubicacion" required>
                <option value ="<?php echo $ubicacion; ?>"><?php echo "<p>".$ubicacion."</p>"; ?></option>
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
              <textarea type="text" class="form-control" name="mapa" id="mapa" placeholder="Actualiza el link del mapa"><?php echo $mapa; ?></textarea>
            </div>
            <div class="mb-3 ml-5 mr-5">
              <label for="terreno" class="form-label">Superficie del Terreno</label>
              <input type="text" class="form-control" name="terreno" id="terreno" value="<?php echo $terreno; ?>" placeholder="Actualiza el área del terreno">
            </div>
            <div class="mb-3 ml-5 mr-5">
              <label for="construccion" class="form-label">Área de Construcción</label>
              <input type="text" class="form-control" name="construccion" id="construccion" value="<?php echo $construccion; ?>" placeholder="Actualiza el área de construccion">
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
                <input type="text" class="form-control" name="niveles" id="niveles" value="<?php echo $niveles; ?>" placeholder="1, 2..."  style="width: 102px; margin-right: 2px;"></input>
                <input type="text" class="form-control" name="recamaras" id="recamaras" value="<?php echo $recamaras; ?>" placeholder="1, 2..." style="width: 102px; margin-right: 2px;"></input>
                <input type="text" class="form-control" name="banios" id="banios" value="<?php echo $banios; ?>" placeholder="1, 2..." style="width: 102px; margin-right: 2px;"></input>
                <input type="text" class="form-control" name="estac" id="estac" value="<?php echo $estac; ?>" placeholder="1, 2..."  style="width: 102px; margin-right: 2px;"></input>
              </div>
            </div>
            <div class="mb-3 ml-5 mr-5">
              <label for="descripcion" class="form-label">Descripción</label>
              <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Actualiza la descripcion"><?php echo $descripcion; ?></textarea>
            </div>
            <div class="mb-3 ml-5 mr-5">
              <label for="expediente" class="form-label">Detalles de ficha</label>
              <textarea class="form-control" name="expediente" id="expediente" placeholder="Actualiza la información de los detalles"><?php echo $expediente; ?></textarea>
            </div>
            <div class="mb-3 ml-5 mr-5">
              <label for="video" class="form-label">Video YouTube</label>
              <textarea type="text" class="form-control" name="video" id="video" placeholder="Etiqueta de video generada por YouTube"><?php echo $video; ?></textarea> 
            </div>
            <br>
            <div class="d-grid gap-2 mb-3 ml-5 mr-5">
              <input type="submit" class="btn btn-success action-button" name="update" id="btn_enviar" value="Actualizar">

              <a class="btn btn-danger" href="datatable-ajax-php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
            </svg>&nbsp; Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php
      }
    }
    if(isset($_POST['update']))
    {
      $titulo       = $_POST['titulo'];
      $categoria    = $_POST['categoria'];
      $vrenta       = $_POST['vrenta'];
      $precio       = $_POST['precio'];
      $precioint    = str_replace(",", "", $precio);
      $ubicacion    = $_POST['ubicacion'];
      $mapa         = $_POST['mapa'];
      $terreno      = $_POST['terreno'];
      $construccion = $_POST['construccion'];
      $recamaras    = $_POST['recamaras'];
      $niveles      = $_POST['niveles'];
      $banios       = $_POST['banios'];
      $estac        = $_POST['estac'];
      $descripcion  = $_POST['descripcion'];
      $expediente   = $_POST['expediente'];
      $video        = $_POST['video'];
      $update_smt = $db -> prepare("UPDATE propiedades
      SET titulo = '$titulo', categoria = '$categoria', vrenta = '$vrenta', pr_int = '$precioint', precio = '$precio', ubicacion = '$ubicacion', mapa = '$mapa', terreno = '$terreno', construccion = '$construccion', recamaras = '$recamaras', niveles = '$niveles', banios = '$banios', estac = '$estac', descripcion = '$descripcion', expediente = '$expediente', video = '$video'
      WHERE id = $id;");
      $update_smt -> execute();
      echo'<script type="text/javascript">
      alert("Propiedad actualizada correctamente");
      window.location.href="datatable-ajax-php";
      </script>';
    }
    ?>
  
  </body>
</html>