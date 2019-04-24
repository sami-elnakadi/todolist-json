<?php
//Sanitize

if (isset ($_POST['tache'])){
    $tache= htmlspecialchars($_POST['tache']);
}

//Ajouter dans tâche

if(isset($_POST['tache']) AND isset($_POST['valider'])){

    $tache = $_POST['tache'];

    $json = file_get_contents("todolist.json");

    // var_dump($parsed_json);
    $json_arr = json_decode($json, true);

    // add data
    $json_arr[] = array('tache'=> $tache, 'done' => false);
    $checkJson = json_encode($json_arr); 

    // encode json and save to file
    file_put_contents('todolist.json', $checkJson);
    }



//Tranférer dans Fait

$check = $_POST['check'];
$supp = $_POST['supprimer'];

foreach($check as $value){
    if(isset($check) AND isset($supp)){
        $json = file_get_contents("todolist.json");
        $json_arr = json_decode($json, true);

        // add data

        foreach ($json_arr as $key => $val) {
            if($val['tache'] === $value){
                $json_arr[$key]['done'] = "true";
            }
        }
        $checkJson = json_encode($json_arr); 
        file_put_contents('todolist.json', $checkJson);
    }
}

// Delete

$enleve = $_POST['enleve'];
$check1 = $_POST['check1'];

foreach($check1 as $value){
    if(isset($check1) AND isset($enleve)){
        $json = file_get_contents("todolist.json");
        $json_arr = json_decode($json, true);

        $arr_index = array();
    foreach ($json_arr as $key => $val)
    {
        if ($val['tache'] === $value)
        {
            $arr_index[] = $key;
        }
    }

    foreach ($arr_index as $i)
    {
        unset($json_arr[$i]);
    }

    $checkJson = json_encode($json_arr); 
    file_put_contents('todolist.json', $checkJson);
    }
}
?>
