<?php

spl_autoload_register(function($class){
    
    $lastdirectories = substr(getcwd(), strlen(__DIR__));
    
    $numberoflastdirectories = substr_count($lastdirectories, '\\');
    
    $directories = ['database', 'businessService', 'businessService/model', 'presentation', 'presentation/handlers', 'presentation/views', 'presentation/views/login', 'presentation/views/register', 'presentation/views/admin'];
    
    foreach ($directories as $d) {
        $currentdirectory = $d;
        for ($x = 0; $x < $numberoflastdirectories; $x++) {
            $currentdirectory = "../".$currentdirectory;
        }
        $classfile = $currentdirectory."/".$class.".php";
        
        if (is_readable($classfile)) {
            if (require $d."/".$class.".php") {
                break;
            }
        }
    }
    
});
