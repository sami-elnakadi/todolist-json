<?php
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

if(isset($check) AND isset($supp)){
    // $tache = $value['tache'];
    $json = file_get_contents("todolist.json");

    // var_dump($parsed_json);
    $json_arr = json_decode($json, true);
    var_dump($check);


    // add data
    foreach ($check as $val){
    $json_arr[] = array('tache'=> $val['value'], 'done' =>true);
    $checkJson = json_encode($json_arr); 
    }

    // encode json and save to file
    file_put_contents('todolist.json', $checkJson);

}
?>
