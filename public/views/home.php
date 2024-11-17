<?php
// Iniciar la sesión solo si aún no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Establece un idioma predeterminado si no se ha definido en la sesión
if (!isset($_SESSION['idioma'])) {
    $_SESSION['idioma'] = 'es'; // Cambia 'es' por tu idioma predeterminado si es necesario
}

// Asegúrate de que config.php esté incluido para que el idioma y las traducciones se carguen
include_once __DIR__ . '/../config/config.php';  // Asumiendo que 'config.php' está fuera de la carpeta 'views'
?>

<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($_SESSION['idioma']); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Aplicación</title>
</head>
<body>
    <!-- Mostrar el texto traducido -->
    <h1><?php echo _("Welcome in my app"); ?></h1>
    <p><?php echo _("This is the home page."); ?></p>
</body>
</html>
