<?php

require_once 'config.php';

$classPaths = CLASS_PATHS;

spl_autoload_register(function ($className) use ($classPaths) {
    foreach ($classPaths as $path) {
        $classFile = $path . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
        if (file_exists($classFile)) {
            include_once $classFile;
            return true;
        }
    }
    return false;
});


require_once 'routes.php';
