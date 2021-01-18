<?php
// Connecion a la base de datos
include('db.php');
// Archivo de configuracion
include('includes/config.php');

$table = $ftask; // Tabla a consultar
$error_msg = 'ERROR: Contacto no guardado';
$success_msg = 'Contacto guardado satisfactoriamente';
$color = 'danger';

if (isset($_POST['save'])) {

  $name = $_POST['nombre'];
  $last_name = $_POST['apellido'];
  $email = $_POST['email'];
  $contact = $_POST['contacto'];
  // Insertando tarea a la tabla task
  $query = "INSERT INTO $table(nombre, apellido, email, contacto) VALUES ('$name', '$last_name', '$email', '$contact')";
  $result = mysqli_query($conn, $query);
  // Algo fallo
  if(!$result) {
    // Mensajes de alerta 
    $_SESSION['message'] = $error_msg;
    $_SESSION['message_type'] = $color;
    // Redireccion a inicio
    header('Location: index.php');
  }
  // Mensajes de alerta 
  $_SESSION['message'] = $success_msg;
  $_SESSION['message_type'] = 'success';
  // Redireccion a inicio
  header('Location: index.php');

}

?>
