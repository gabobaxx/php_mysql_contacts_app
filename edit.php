<?php
// Conneccion a la base de datos
include("db.php");
// Archivo de configuracion
include('includes/config.php');

// Variables de ayuda
$title = '';
$description= '';
$table = $ftask;
$success_msg = 'Contacto actualizado satisfactoriamente';


if  (isset($_GET['id'])) {
  // Consulta a la tabla task
  $id = $_GET['id'];
  $query = "SELECT * FROM $table WHERE id=$id";
  $result = mysqli_query($conn, $query);
  // La consulta fue existosa
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    // Actualiza los valores de las variables de ayuda 
    $name = $row['nombre'];
    $last_name = $row['apellido'];
    $email = $row['email'];
    $contact = $row['contacto'];
  }
}

if (isset($_POST['update'])) {
  // Actualiza variables de ayuda con valores nuevos
  $id = $_GET['id'];
  $name = $_POST['nombre'];
  $last_name = $_POST['apellido'];
  $email = $_POST['email'];
  $contact = $_POST['contacto'];
  // Consulta para actualizar
  $query = "UPDATE $table set nombre = '$name', apellido = '$last_name', email = '$email', contacto = '$contact' WHERE id=$id";
  mysqli_query($conn, $query);
  // Mensajes de alerta
  $_SESSION['message'] = $success_msg;
  $_SESSION['message_type'] = 'warning';
  // Redireccion al inicio
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>

<!-- FORMULARIO DE ACTUALIZACION -->
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
            <input type="text" maxlength="20" name="nombre" class="form-control" value="<?php echo $name;?>" placeholder="Nombre" autofocus>
          </div>
          <div class="form-group">
            <input type="text" maxlength="20" name="apellido" class="form-control" value="<?php echo $last_name;?>" placeholder="Apellido">
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control" value="<?php echo $email;?>" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="text" maxlength="15" name="contacto" class="form-control" value="<?php echo $contact;?>" placeholder="Número de Contacto">
          </div>
          <button class="btn-success" name="update">
            Actualizar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>
