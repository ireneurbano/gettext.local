<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$idiomasSoportados = ['en', 'es', 'fr', 'de'];

// Detectar idioma desde la sesión o asignar uno predeterminado
$idioma = $_SESSION['idioma'] ?? 'en'; // 'en' como predeterminado si no hay idioma en la sesión
if (!in_array($idioma, $idiomasSoportados)) {
    $idioma = 'en';
}

// Configurar `gettext` para usar el idioma de la sesión
putenv("LANG={$idioma}_".strtoupper($idioma).".UTF-8");
setlocale(LC_ALL, "{$idioma}_".strtoupper($idioma).".UTF-8");

// Ruta de los archivos de traducción
$localeDir = __DIR__ . '/../locales';
bindtextdomain("messages", $localeDir);
bind_textdomain_codeset("messages", "UTF-8");
textdomain("messages");
?>
