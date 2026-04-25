<?php
	require_once '../db/dconn.php';
	session_start();
	if(isset($_SESSION["admin_login"]))	//Condicion admin
	{
		header("location: ../admin/datatable-ajax.php");	
	}
	if(isset($_SESSION["personal_login"]))	//Condicion personal
	{
		header("location: personal/personal_portada.php"); 
	}
	if(isset($_REQUEST['btn_login']))	
	{
		$email		=$_REQUEST["txt_email"];	//textbox nombre "txt_email"
		$password	=$_REQUEST["txt_password"];	//textbox nombre "txt_password"
		$password 	= hash('sha512', $password);
		$role		=$_REQUEST["txt_role"];		//select opcion nombre "txt_role"
		if(empty($email))
		{						
			$errorMsg[]="Por favor ingrese Email";	//Revisar email
		}
		else if(empty($password))
		{
			$errorMsg[]="Por favor ingrese Password";	//Revisar password vacio
		}
		else if(empty($role))
		{
			$errorMsg[]="Por favor seleccione rol ";	//Revisar rol vacio
		}
		else if($email AND $password AND $role)
		{
			try
			{
				$select_stmt=$db->prepare("SELECT email,pwd,role FROM usuarios WHERE email=:uemail AND pwd=:upassword AND role=:urole"); 
				$select_stmt->bindParam(":uemail",$email);
				$select_stmt->bindParam(":upassword",$password);
				$select_stmt->bindParam(":urole",$role);
				$select_stmt->execute();	//execute query		
				while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))	
				{
					$dbemail	=$row["email"];
					$dbpassword	=$row["pwd"];
					$dbrole		=$row["role"];
				}
				if($email!=null AND $password!=null AND $role!=null)	
				{
					if($select_stmt->rowCount()>0)
					{
						if($email==$dbemail and $password==$dbpassword and $role==$dbrole)
						{
							switch($dbrole)		//inicio de sesión de usuario base de roles
							{
								case "admin":
									$_SESSION["admin_login"]=$email;			
									$loginMsg="Admin: Inicio sesión con éxito";	
										header("refresh:2;../");	
									break;
								case "adminval";
									$_SESSION["personal_login"]=$email;				
									$loginMsg="Personal: Inicio sesión con éxito";		
									header("refresh:3;../");	
									break;	
								default:
									$errorMsg[]="Correo electrónico o contraseña o rol incorrectos";
							}
						}
						else
						{
							$errorMsg[]="correo electrónico o contraseña o rol incorrectos";
						}
					}
					else
					{
						$errorMsg[]="correo electrónico o contraseña o rol incorrectos";
					}
				}
			}
			catch(PDOException $e)
			{
				$e->getMessage();
			}		
		}
		else
		{
			$errorMsg[]="correo electrónico o contraseña o rol incorrectos";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
		<title>Login</title>
		<?php 
			include '../elements/imports.php';
			include '../db/dconn.php';
		?>
		<style type="text/css">

			body {
				background-image: url("../images/bg.jpg");
			}

			.login-form {
				width: 25rem;
				margin: auto auto auto auto;
			}
		    .login-form form {
		    	margin-bottom: 15px;
		        background: #f7f7f7;
		        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		        padding: 25px;
		        border-radius: 30px;
		    }
		    .login-form h2 {
		        margin: 0 0 15px;
						color: white;
		    }
		    .form-control, .btn {
		        min-height: 38px;
		        border-radius: 2px;
		    }
		    .btn {        
		        font-size: 15px;
		        font-weight: bold;
		    }
		</style>
	</head>
	<body>

	<?php
		include '../elements/def_navbar.php';
	?>
		<div class="wrapper">
			<div class="container">
				<div class="col-lg-12">
					<?php
						if(isset($errorMsg))
						{
							foreach($errorMsg as $error)
							{
					?>
								<div class="alert alert-danger">
									<strong><?php echo $error; ?></strong>
								</div>
					<?php
							}
						}
						if(isset($loginMsg))
						{
					?>
						<div class="alert alert-success">
							<strong>ÉXITO ! <?php echo $loginMsg; ?></strong>
						</div>
					<?php
					}
					?> 
					<div class="login-form">
						<center><h2 class="col-lg-7 col-sm-7 pt-4 d-flex">Iniciar sesión</h2></center>
						<form method="post" class="form-horizontal col-lg-12">
							<div class="form-group">
								<label class="col-sm-6 text-left">Email</label>
								<div class="col-sm-12">
									<input type="email" name="txt_email" class="form-control" placeholder="Ingrese email" required/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-6 text-left">Contraseña</label>
								<div class="col-sm-12">
									<input type="password" name="txt_password" id="txt_password" class="form-control" placeholder="Ingrese contraseña" required/>
									<input type="checkbox" onclick="verPass()">&nbsp;Mostrar contraseña
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-6 text-left">Seleccionar rol</label>
								<div class="col-sm-12">
									<select class="form-control" name="txt_role" required>
									  <option value="" selected="selected"> - selecccionar rol - </option>
									  <option value="admin">Admin</option>
									  <option value="adminval">Personal</option>
									  <!--<option value="usuario">Usuarios</option>-->
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input type="submit" name="btn_login" class="btn btn-primary btn-block" value="Iniciar Sesion" style="background: orange; border-color: orange; border-radius: 10px;">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									¿Olvidaste tu correo o contraseña? <a class="text-info" href="https://wa.link/gis5to">Contacta al administrador del sitio &nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
  								<path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg>.</a>
		
								</div>
							</div>
						</form>
					</div>
				<!--Cierra div login-->
				</div>	
			</div>
		</div>
		<script>
			function verPass() {
				var x = document.getElementById("txt_password");
				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
				}
			}
		</script>

<?php include '../elements/footer.html'; ?>
<!-- loader -->
	<div id="ftco-loader" class="show fullscreen">
		<svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg>
	</div>
<!-- loader -->
<?php include '../elements/scripts.html'; ?>

	</body>
</html>