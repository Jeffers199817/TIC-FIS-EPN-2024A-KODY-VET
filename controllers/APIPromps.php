<?php

namespace Controllers;

use Model\Prompt;

class APIPrompts{ 

    public static function index() {

        $ponentes = Prompt::all();
        echo json_encode($ponentes);

        

    }

    public static function ponente(){
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id || $id <1){
            echo json_encode([]);
            return;
        }
        $ponente = Prompt::find($id);
        echo json_encode($ponente, JSON_UNESCAPED_SLASHES);
    }
}
 