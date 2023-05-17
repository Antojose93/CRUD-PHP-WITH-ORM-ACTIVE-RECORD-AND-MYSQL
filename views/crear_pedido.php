<?php include "includes/header.php" ?>


<?php

require_once '../models/entities/Order.php';
require_once '../models/entities/User.php';
 $order = new Order();
 $user = User::find_by_cedula($_SESSION['cedula']);

if(isset($_POST['crearPedido'])){
      // Captura los valores enviados y los guarda en variables
        
        $fecha_envio = $_POST['fecha_envio'];
        $fecha_entrega = $_POST['fecha_entrega'];
        $cliente = $_POST['cliente'];
        $proveedor = $_POST['proveedor'];
        $total = $_POST['total'];
        $estado = $_POST['estado'];
        $pais = $_POST['pais'];
        $departamento = $_POST['departamento'];
        $ciudad = $_POST['ciudad'];
        $direccion = $_POST['direccion'];
        $propina = $_POST['propina'];
        
        
        if ( empty($fecha_envio) || empty($fecha_entrega) || empty($cliente) || empty($proveedor) || empty($total) || empty($estado) || empty($pais) || empty($departamento) || empty($ciudad) || empty($direccion) ) {
         // Si alguna variable está vacía, muestra un mensaje de error
         $error = "Por favor, complete todos los campos del formulario.";
         
            } else {
            // Si todas las variables tienen un valor, procesa los datos capturados y actualiza la información en la base de datos
              // Aqui creo una orden nueva y le agrego los datos obtenidos por formulario
             
       
           $attributes = array(
            'date' => date('Y-m-d'),
            'ship_date' => $fecha_envio,
            'delivery_date' => $fecha_entrega,
            'customer' => $cliente,
            'provider' => $proveedor,
            'amount' => $total,
            'status' =>$estado,
            'country' =>$pais,
            'state' => $departamento,
            'city' => $ciudad,
            'address' => $direccion,
            'tips' => $propina,
             'users_cedula' => $_SESSION['cedula']  
        );
           
            $order = Order::create($attributes);
            try{
                 $order->save();
                 $mensaje = "Pedido ha sido agregado correctamente";
            } catch (Exception $ex) {
                $error = $ex->getMessage();
            }
           
        //asigno la orden nueva a usuario de esta sesion
              

         }
}

?>


  <div class="row">
    <div class="col-sm-12">
      <?php  if(isset($mensaje))  :  ?>

            <div class="alert alert-succes alert-dismissible fade show" role="alert">
                <strong> <?php echo $mensaje; ?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

      <?php endif;?>
    </div>
</div>

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



              <div class="card-header">               
                <div class="row">
                  <div class="col-md-9">
                    <h3 class="card-title"> Nuevo pedido</h3>
                  </div>                 
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                  <form role="form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">            

    
                      <div class="mb-3">
                        <label for="fecha_envio" class="form-label">Fecha de envio:</label>
                        <input type="date" name="fecha_envio" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="fecha_entrega" class="form-label">Fecha de entrega:</label>
                        <input type="date" name="fecha_entrega" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="cliente" class="form-label">Cliente:</label>
                        <input type="text" name="cliente" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="proveedor" class="form-label">Proveedor:</label>
                        <input type="text" name="proveedor" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="total" class="form-label">Total:</label>
                        <input type="text" name="total" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="estado" class="form-label">Estado:</label>
                        <input type="text" name="estado" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="pais" class="form-label">Pais:</label>
                        <input type="text" name="pais" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="departamento" class="form-label">Departamento:</label>
                        <input type="text" name="departamento" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="ciudad" class="form-label">Ciudad:</label>
                        <input type="text" name="ciudad" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="direccion" class="form-label">Direccion:</label>
                        <input type="text" name="direccion" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="propina" class="form-label">Propina:</label>
                        <input type="number" name="propina" class="form-control">
                      </div>

      

                            <button type="submit" name="crearPedido" class="btn btn-primary"><i class="fas fa-cog"></i> Crear Pedido</button>  

                        </div>
                      </form>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->


<?php include "includes/footer.php" ?>

<!-- page script -->
<script>
  $(function () {   
    $('#tblRegistros').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    }); 
  });
</script>
