<!-- HACER PDO ESTAS CONSULTAS DE ABAJO -->
<?php
    session_start();
    if(!isset($_SESSION['admin_login']))
    {
        header('location: ../index.php');
    }
	if(isset($_SESSION["personal_login"]))	//Condicion personal
	{
		header("location: personal/personal_portada.php"); 
	}
?>

<?php
    require_once "../db/dconn.php";
    if(isset($_REQUEST['btn_register'])) //compruebe el nombre del botón "btn_register" y configúrelo
    {
        $username   = $_REQUEST['txt_username'];    //input nombre "txt_username"
        $nombre     = $_REQUEST['txt_nombre'];
        $apellidos  = $_REQUEST['txt_apellidos'];
        $email      = $_REQUEST['txt_email'];   //input nombre "txt_email"
        $contacto   = $_REQUEST['txt_contacto'];
        $password   = $_REQUEST['txt_password'];
        $password   = hash('sha512', $password);
        $role       = $_REQUEST['txt_role'];    //seleccion nombre "txt_role"
        if(empty($username))
        {
            $errorMsg[]="Ingrese nombre de usuario";    //Compruebe input nombre de usuario no vacío
        }
        else if(empty($nombre))
        {
            $errorMsg[]="Ingrese su nombre";    //Revisar email input no vacio
        }
        else if(empty($apellidos))
        {
            $errorMsg[]="Este campo es obligatorio.";   //Revisar email input no vacio
        }
        else if(empty($email))
        {
            $errorMsg[]="Ingrese email";    //Revisar email input no vacio
        }
        else if(empty($contacto))
        {
            $errorMsg[]="Este campo es obligatorio.";   //Revisar email input no vacio
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errorMsg[]="Ingrese email válido"; //Verificar formato de email
        }
        else if(empty($password))
        {
            $errorMsg[]="Ingrese password"; //Revisar password vacio o nulo
        }
        else if(strlen($password) < 6)
        {
            $errorMsg[] = "Password minimo 6 caracteres";   //Revisar password 6 caracteres
        }
        else if(empty($role))
        {
            $errorMsg[]="Seleccione rol";   //Revisar etiqueta select vacio
        }
        else
        {
            try
            {   
                $select_stmt=$db->prepare("SELECT username, email FROM usuarios 
                                            WHERE username=:uname OR email=:uemail"); // consulta sql
                $select_stmt->bindParam(":uname",$username);   
                $select_stmt->bindParam(":uemail",$email);      //parámetros de enlace
                $select_stmt->execute();
                $row=$select_stmt->fetch(PDO::FETCH_ASSOC); 

                if($row["username"] == $username){
                    $errorMsg[]="Usuario ya existe";    //Verificar usuario existente
                }
                else if($row["email"] == $email){
                    $errorMsg[]="Email ya existe";  //Verificar email existente
                }
                else if(!isset($errorMsg))
                {
                    $insert_stmt=$db->prepare("INSERT INTO usuarios(username,nombre,apellidos,email,contacto,pwd,role) VALUES(:uname,:unombre,:uapellidos,:uemail,:ucontacto,:upassword,:urole)"); //Consulta sql de insertar           
                    $insert_stmt->bindParam(":uname",$username);
                    $insert_stmt->bindParam(":unombre",$nombre);
                    $insert_stmt->bindParam(":uapellidos",$apellidos);  
                    $insert_stmt->bindParam(":uemail",$email);
                    $insert_stmt->bindParam(":ucontacto",$contacto);            //parámetros de enlace 
                    $insert_stmt->bindParam(":upassword",$password);
                    $insert_stmt->bindParam(":urole",$role);
                    if($insert_stmt->execute())
                    {
                        $registerMsg="Registro exitoso: redirigiendo a la página administrativa..."; //Ejecuta consultas 
                        header("refresh:0;usr_adm.php"); //Actualizar despues de 2 segundo a la portada
                    }
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <title>Ochoa Real Estate Services</title>
    <?php 
        include '../elements/imports.php'; 
        include '../db/dconn.php';
    ?>
    </head>
    <body>
    <?php 
        include '../elements/top-header.html';
        include '../elements/def_navbar.php';
    ?>
        <section class="container">
            <h2 style = "color:#0d6efd;"></h2>
            <h3>Gestionar agentes</h3>
            <div class="row">
                <div class="col">
                    <div class="p-3 pb-5 bg-light" style="border-radius: 30px;">
                        <h4>Lista de agentes inmobiliarios</h4>
                        <p style="color: black; margin-bottom: -15px;">Equipo conformado por nuestros agentes más calificados.</p><br>
                        <p></p>
                        <button type="button" id="btn-nueva-cita" 
                        class="btn btn-info d-inline float-end shadow" data-bs-toggle="modal" data-bs-target="#modal-nueva-cita" style="color:rgb(255, 255, 255);">Añadir<i class='bx bxs-plus-square'></i></button><br>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div style="overflow-x:auto">
                <table class="table" style="border-radius: 30px;">
                    <thead class="table-ligth">
                        <tr>
                            <th class="centro" width="15%">Correo</th>
                            <th class="centro" width="15%">Usuario</th>
                            <th class="centro" width="15%">Nombre</th>
                            <th class="centro" width="15%">Apellidos</th>
                            <th class="centro" width="10%">Contacto</th>
                            <th class="centro" width="18%">Eliminar</th>
                        </tr>
                    </thead>
                    <?php
                    $miconexion = mysqli_connect("localhost", "root", "", "u584847502_inmobiliaria");
                    $query="SELECT id,email,username,nombre, apellidos, contacto, role FROM usuarios WHERE role = 'adminval'";
                    $select_stmt2 = $db->prepare(("SELECT id, email, username, nombre, apellidos, contacto, role FROM usuarios WHERE role = 'adminval'"));
                    $select_stmt2->execute();

                    if($select_stmt2->rowCount() > 0)
                    {
                        while($row=$select_stmt2->fetch(PDO::FETCH_ASSOC))
                        {
                            extract($row);
                            ?>
                            <tbody>
                                <tr>
                                    <td class="centro"><?php echo $email; ?></td>
                                    <td class="centro"><?php echo $username; ?></td>
                                    <td class="centro"><?php echo $nombre; ?></td>
                                    <td class="centro"><?php echo $apellidos; ?></td>
                                    <td class="centro"><?php echo $contacto; ?></td>
                                    <td class="centro">
                                        <a href="eliminar_validador.php?id=<?php echo $id; ?>" class="btn btn-danger d-inline shadow" onclick="return confirm('¿Está seguro de eliminar este usuario?');">
                                            <i class='icon-trash'></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </section>
        <br><br>
        <div class="modal" tabindex="-1" id="modal-nueva-cita">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" enctype="multipart/form-data" name="form1">
                        <!---->
                        <div class="form-group pt-2">
                            <label class="col-sm-9 text-left">Usuario</label>
                            <div class="col-sm-12">
                                <input type="text" name="txt_username" class="form-control" placeholder="Ingrese usuario" />
                            </div>
                        </div>
                        <!---->
                        <div class="form-group">
                            <label class="col-sm-9 text-left">Nombre</label>
                            <div class="col-sm-12">
                                <input type="text" name="txt_nombre" class="form-control" placeholder="Ingrese el nombre del validador" />
                            </div>
                        </div>
                        <!---->
                        <div class="form-group">
                            <label class="col-sm-9 text-left">Apellidos</label>
                            <div class="col-sm-12">
                                <input type="text" name="txt_apellidos" class="form-control" placeholder="Ingrese apellidos" />
                            </div>
                        </div>
                        <!---->
                        <div class="form-group">
                            <label class="col-sm-9 text-left">Email</label>
                            <div class="col-sm-12">
                                <input type="text" name="txt_email" class="form-control" placeholder="Ingrese email" />
                            </div>
                        </div>
                        <!---->
                        <div class="form-group">
                            <label class="col-sm-9 text-left">Celular</label>
                            <div class="col-sm-12">
                                <input type="text" name="txt_contacto" class="form-control" placeholder="Número telefónico/celular" />
                            </div>
                        </div>
                        <!---->
                        <div class="form-group">
                            <label class="col-sm-9 text-left">Password</label>
                            <div class="col-sm-12">
                                <input type="password" name="txt_password" class="form-control" placeholder="Ingrese password" />
                            </div>
                        </div>
                        <!---->
                        <div hidden class="form-group">
                            <label class="col-sm-9 text-left">Seleccione tipo</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="txt_role">
                                <!--<option value="" selected="selected"> - seleccione rol - </option>
                                <option value="admin">Admin</option>-->
                                <option value="adminval">Admin Validador</option>
                                <!-- <option value="usuario">Usuario</option>-->
                                </select>
                            </div>
                        </div>
                        <!---->
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="submit" name="btn_register" class="btn btn-primary btn-block bg-success" value="Registrar"><br>
                                <button type="button" class="btn btn-primary bg-danger" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                        <!---->
                    </form>
                </div>
            </div>
        </div>

        <?php include '../elements/footer.html'; ?>

    <!-- loader -->
        <div id="ftco-loader" class="show fullscreen">
            <svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg>
        </div>
    <!-- loader -->

    <?php include '../elements/scripts.html'; ?>
    </body>
</html>