<?php
// Mostrar todos los errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Iniciar la sesión para almacenar el idioma
session_start();

// Verificar si el usuario selecciona un idioma desde la URL
if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'es', 'fr', 'de'])) {
    $_SESSION['idioma'] = $_GET['lang'];  // Establecer el idioma en la sesión

    // Redirigir a la página principal (sin el parámetro 'lang' en la URL)
    header("Location: " . strtok($_SERVER['REQUEST_URI'], '?')); // Quita los parámetros de la URL
    exit;  // Detener la ejecución para evitar problemas de redirección
}

// Incluir el archivo de configuración para manejar el idioma
include __DIR__ . '/config/config.php';  // Asegúrate de que la ruta es correcta

// Cargar la vista principal o según la URL
$request = strtok($_SERVER['REQUEST_URI'], '?'); // Ignorar cualquier parámetro de la URL
$viewDir = '/views/';

switch ($request) {
    case '':
    case '/':
        require __DIR__ . $viewDir . 'home.php';
        break;
    case '/users':
        require __DIR__ . $viewDir . 'users.php';
        break;
    case '/contact':
        require __DIR__ . $viewDir . 'contact.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}
