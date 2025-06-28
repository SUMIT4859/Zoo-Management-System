<?php
session_start();
require_once '../db/db_connect.php';
require_once '../classes/table.php';
require_once '../functions/functions.php';

$page = isset($_GET['page']) ? basename($_GET['page'], '.php') : 'home';
$file = "../pages/{$page}.php";

if (file_exists($file)) {
    require_once $file;
} else {
    require_once '../pages/home.php';
}

$variables = [
    'title' => $title ?? '',
    'content' => $content ?? ''
];

echo loadTemplate('../templates/layout.php', $variables);
