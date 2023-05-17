<?php
  session_start();



  require_once'../models/repository/UserRepository.php';

  //validamos si la session esta activa

  if(!empty($SESSION['activo'])){
    header("Location:panel.php");
  }


  


  if (isset($_POST["ingresar"])) {
    
    $cedula = $_POST["cedula"];
    $password = $_POST["password"];

    if(!empty($cedula) && $cedula !="" && !empty($password) && $password !="" ){
        
        
      // traer al usuario con cedula y contrasena
    $usuario= User::find('first', array(
        'conditions' => array(
        'cedula = ? AND pass = ?',
        $cedula,
        $password
                        )
    ));
      if (!$usuario) {
        $error = "Error, acceso invalido";
      }else{
        //Aqui creamos una sesion
        $_SESSION['activo']=true;
        $_SESSION['cedula']= $usuario->cedula;
        $_SESSION['nombre']= $usuario->name;
        $_SESSION['email']= $usuario->email;
       
        //Despues de creada la session, redirigimos al panel.php
        header("Location:panel.php");
      }

    }else{
      $error = "Error, algunos campos estan vacios";
    }
  }


?>



<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
 
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		
    <title>Crud PHP MVC UdeC</title>
  </head>
  <body class="hold-transition login-page">



  <div class="row">
    <div class="col-sm-12">
      <?php  if(isset($error))  :  ?>

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> <?php echo $error; ?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

      <?php endif;?>
    </div>
</div>



  <div class="login-box">
  <div class="login-logo">
    <img src="dist/img/account.png" class="img-fluid" width="200">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingrese sus datos para iniciar sesión</p>

      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="input-group mb-3">
          <input type="number" class="form-control" name="cedula" placeholder="Ingresa cedula">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control"  name="password" placeholder="Ingresa el password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-sm-12">
            <button type="submit" name="ingresar" class="btn btn-primary d-block w-100"><i class="fas fa-user"></i> Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>  

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- REQUIRED SCRIPTS -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>