<!-- Coneccion a la base de datos -->
<?php include("db.php"); ?>
<!-- Archivo de configuracion -->
<?php include('includes/config.php'); ?>
<!-- Cabecera -->
<?php include('includes/header.php'); ?>

<!-- HTML -->
<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      
      <!-- MENSAJES DE ALERTA-->
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- FORMULARIO -->
      <div class="card card-body">
        <form action="save.php" method="POST">
        <div class="form-group">
            <input type="text" maxlength="20" name="nombre" class="form-control"  placeholder="Nombre" autofocus>
          </div>
          <div class="form-group">
            <input type="text" maxlength="20" name="apellido" class="form-control"  placeholder="Apellido">
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control"  placeholder="Email">
          </div>
          <div class="form-group">
            <input type="text" maxlength="15" name="contacto" class="form-control" placeholder="Número de Contacto">
          </div>
          <input type="submit" name="save" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>

    <!-- TABLA DE TAREAS -->
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Contacto</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

        <!-- Consulta con php a la tabla task/tareas -->
          <?php
          $table = $ftask; // Tabla a consultar
          $query = "SELECT * FROM $table";
          $resultados = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($resultados)) { ?>
          <tr>
            
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['contacto']; ?></td>
            
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<!-- Footer -->
<?php include('includes/footer.php'); ?>
