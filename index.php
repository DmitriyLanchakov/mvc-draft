<?php

require_once 'Route.php';
require_once 'Config.php';
require_once 'Db.php';

require_once 'Controllers/Controller.php';
require_once 'Models/Model.php';

$files = array();

function require_once_dir($dir) {
    global $files;
    $item = glob($dir);
    foreach ($item as $filename) {
        if(is_dir($filename)) {
            require_once_dir($filename.'/'. "*");
        }elseif(is_file($filename)){
            $files[] = $filename;
        }
    }
}

$recursive_path = "Models";

require_once_dir($recursive_path. "/*");

for($f = 0; $f < count($files); $f++) {
    $file = $files[$f];
    require_once($file);
}

Route::start();
