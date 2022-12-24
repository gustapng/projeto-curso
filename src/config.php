<?php

//Main config
define('HOME', 'http://localhost:8080');
define('VIEWS', __DIR__ . '/pages');
define('APP_ROOT', dirname(__DIR__));

//DB config
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'db_curso');
define('DB_USER', 'root');
define('DB_PASSWORD', '5141');

//APP KEY
define('APP_KEY', 'BJ8ZZSxky0');

//Upload Folder
define('FOLDER', dirname(__DIR__) . '/public/assets/uploads');

//SMTP Config
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_USER', 'gustavoferreira.png@gmail.com');
define('SMTP_PASSWORD', 'wyjktuzbpxkqkenl');
define('SMTP_ENCRYPTION', 'tls');
define('SMTP_PORT', '587');
define('SMTP_FROM', 'gustavoferreira.png@gmail.com');
define('SMTP_USER_FROM', 'Gustavo Ferreira');

?>