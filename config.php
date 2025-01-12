<?php
// config.php

// تحميل مكتبة .env إذا لم تكن قد قمت بتحميلها بالفعل
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

// تحميل ملف .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


// define('ROOT_PATH', 'http://localhost/company/');
// define('STATIC_PATH', 'http://localhost/company/static/');


define('ROOT_PATH', 'http://company-hub.infy.uk/');
define('STATIC_PATH', 'http://company-hub.infy.uk/static/');


// إعدادات الاتصال بقاعدة البيانات
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_USERNAME', $_ENV['DB_USERNAME']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);

// إعدادات البريد الإلكتروني
define('SMTP_HOST', $_ENV['SMTP_HOST']);
define('SMTP_PORT', $_ENV['SMTP_PORT']);
define('SMTP_USERNAME', $_ENV['SMTP_USERNAME']);
define('SMTP_PASSWORD', $_ENV['SMTP_PASSWORD']);
define('SMTP_SECURE', $_ENV['SMTP_SECURE']);
define('MAIL_FROM_NAME', 'Company Hub');

// إعدادات الاتصال بقاعدة البيانات
try {
    $databass = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $databass->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error connecting to database: " . $e->getMessage());
}

function asset($path='') {
    return 'http://company-hub.infy.uk/' . $path;
}
?>

