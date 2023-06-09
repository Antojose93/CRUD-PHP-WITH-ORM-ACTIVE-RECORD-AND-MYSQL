<?php include "includes/header.php" ?>




<?php

require_once '../models/repository/UserRepository.php';
require_once '../models/repository/OrderRepository.php';
//Configuramos zona horaria
date_default_timezone_set('America/Bogota');
//$orders = OrderRepository::find_order_by_cedula($_SESSION['cedula']);
$user = User::find_by_cedula($_SESSION['cedula']);
//var_dump($registros);

?>

              <div class="card-header">               
                <div class="row">
                  <div class="col-md-9">
                    <h3 class="card-title">Lista de pedidos</h3>
                  </div>
                  <div class="col-md-3">
                    <a href="crear_pedido.php" type="button" class="btn btn-primary btn-xl pull-right w-100">
                      <i class="fa fa-plus"></i> Ingresar nuevo pedido
                    </a>
                 </div>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tblRegistros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>pedido</th>
                    <th>Cliente</th>
                    <th>Fecha envio</th>               
                    <th>Estado</th>  
                    <th>Fecha Entrega</th>  
                    <th></th>                
                  </tr>
                  </thead>
                  <tbody>
                       <?php foreach ($user->orders as $fila ) :?> 
                      <tr>
                          <td><?php echo $fila->id; ?></td>
                          <td><?php echo $fila ->customer; ?></td>
                          <td> <?php echo $fila ->ship_date->format('Y-m-d '); ?></td>
                          <td><?php echo $fila ->status; ?></td> 
                          <td> <?php echo $fila ->delivery_date->format('Y-m-d '); ?></td>
                          <td>
                              <a href="editar_pedido.php?id=<?php echo $fila->id; ?>" class="btn btn-warning"><i class="bi bi-pencil-fill"></i> <i class="fas fa-edit"></i> Editar</a>
                                &nbsp;
                                <a href="borrar_pedido.php?id=<?php echo $fila->id; ?>" class="btn btn-danger"><i class="bi bi-pencil-fill"></i> <i class="fas fa-trash-alt"></i> Borrar</a>                                               
                            </td>                       
                      </tr>
                      
                      <?php endforeach;?>
                
                  </tbody>                  
                </table>
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
