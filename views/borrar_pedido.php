<?php include "includes/header.php" ?>
<?php 

require_once '../models/entities/Order.php';
//Validar si recibimos id del pedido


if (isset($_GET["id"])) {
    $idPedido = $_GET["id"];    
            // obtner el objeto order con id
        try {
           $order = Order::find(array('conditions' => array('id' => $idPedido)));

            // Convertir la fecha a una marca de tiempo Unix
            $timestamp = strtotime($order->ship_date);
            // Formatear la fecha en el formato adecuado para el campo input type="date" de HTML5
            $fecha_envio = date("Y-m-d", $timestamp);


            // Convertir la fecha a una marca de tiempo Unix
            $timestamp = strtotime($order->delivery_date);
            // Formatear la fecha en el formato adecuado para el campo input type="date" de HTML5
            $fecha_entrega = date("Y-m-d", $timestamp);


        } catch (Exception $exc) {
            $error =  $exc->getTraceAsString();
        }
}// Marca el fin del If que pregunta se llego la variable id por metodo GET

if(isset($_POST['borrarPedido'])){

            try {
             Order::delete_all(array('conditions' => array('id' => $idPedido)));
            echo " <div style='color: green;'>Pedido ha sido Eliminado  correctamente</div> ";
             echo '<script>';
            echo 'alert("¡Pedido ha sido Eliminado correctamente! .");';
            echo '</script>';
         //   $mensaje = "El pedido ha sido eliminado";
            // Redirecciona a la página "nueva_pagina.html"
            echo '<script>';
            echo 'window.location.href = "lista_pedidos.php";';
             echo '</script>';
             exit;

        } catch (Exception $exc) {
            $error  = "Error al tratar de borrar la orden con id $id: " . $exc->getMessage();
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
                    <h3 class="card-title">editar  pedido </h3>
                  </div>                 
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                  <form role="form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">            

                      <div class="mb-3">
                    <div class="mb-3">
                        <label for="fecha_envio" class="form-label">Fecha de envio:</label>
                        <input type="date" name="fecha_envio" class="form-control" value="<?php echo $fecha_envio; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="fecha_entrega" class="form-label">Fecha de entrega:</label>
                        <input type="date" name="fecha_entrega" class="form-control" value="<?php echo $fecha_entrega; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="cliente" class="form-label">Cliente:</label>
                        <input type="text" name="cliente" class="form-control"  value="<?php echo $order->customer; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="proveedor" class="form-label">Proveedor:</label>
                        <input type="text" name="proveedor" class="form-control"  value="<?php echo $order->provider ?>">
                      </div>
                      <div class="mb-3">
                        <label for="total" class="form-label">Total:</label>
                        <input type="text" name="total" class="form-control"  value="<?php echo $order->amount ?>">
                      </div>
                      <div class="mb-3">
                        <label for="estado" class="form-label">Estado:</label>
                        <input type="text" name="estado" class="form-control"  value="<?php echo $order->status ?>">
                      </div>
                      <div class="mb-3">
                        <label for="pais" class="form-label">Pais:</label>
                        <input type="text" name="pais" class="form-control" value="<?php echo $order->country ?>">
                      </div>
                      <div class="mb-3">
                        <label for="departamento" class="form-label">Departamento:</label>
                        <input type="text" name="departamento" class="form-control" value="<?php echo $order->state ?>"> 
                      </div>
                      <div class="mb-3">
                        <label for="ciudad" class="form-label">Ciudad:</label>
                        <input type="text" name="ciudad" class="form-control" value="<?php echo $order->city ?>">
                      </div>
                      <div class="mb-3">
                        <label for="direccion" class="form-label">Direccion:</label>
                        <input type="text" name="direccion" class="form-control" value="<?php echo $order->address ?>">
                      </div>
                      <div class="mb-3">
                        <label for="propina" class="form-label">Propina:</label>
                        <input type="number" name="propina" class="form-control" value="<?php echo $order->tips ?>">
                      </div>
      

                            <button type="submit" name="borrarPedido" class="btn btn-primary"><i class="fas fa-cog"></i> Borrar Pedido </button>  

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
