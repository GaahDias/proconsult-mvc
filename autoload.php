<?php

spl_autoload_register(function ($class) {
    $dirs = [
        'controller',
        'core',
        'model',
    ];

    foreach ($dirs as $dir) {
        if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $class . '.php')) {
            require_once(__DIR__ . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $class . '.php');
        }
    }

    require_once('lib/Database/Connection.php');
});
