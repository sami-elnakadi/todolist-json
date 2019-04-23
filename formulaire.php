<?php
require 'contenu.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">
    <link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="./assets/css/.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>To do list AJAX</title>
</head>

<body>  
    <div class="container">
        <h1> To do list</h1>
        
            <div class="row">     
                <div class="col-md-6">   
                
                    <form role="form" name="inscription" method="post" action="formulaire.php" id='form'>
                    
                        <div class="list">
                            <?php
                            $tache = $_POST['tache'];

                            $json = file_get_contents("todolist.json");
                            
                            // var_dump($parsed_json);
                            $json_arr = json_decode($json, true);
                            echo '<h2> A faire</h2>';   
                            echo '<table>';
                            foreach ($json_arr as $value) if($value['done'] == false) {
                                echo '<tr>';
                                echo '<td><input type="checkbox" name="check[]" value="'.$value['tache'].'"/>'.$value['tache'].'</td>';
                                echo '</tr>';
                            }
                            echo '</table>';
                            ?>                    
                        </div>
                        <button type="submit" class="btn btn-primary disparais" name="supprimer" value="supprimer" id="valider">Valider la tâche</button>     
                    </form>
                </div>

                <div class="col-md-6">   
                    <form role="form" name="inscription" method="post" action="formulaire.php" id='form'>
                    
                    <?php
                    echo '<h2> Fait</h2>';   
                    $json_arr = json_decode($json, true);  
                    echo '<table>';
                    var_dump($json_arr);
                    foreach ($json_arr as $value) if($value['done'] == true) {
                        echo '<tr>';
                        echo '<td><input type="checkbox" name="check1[]" value="'.$value['tache'].'"/>'.$value['tache'].'</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                    ?>
                    <button type="submit" class="btn btn-primary disparais" name="enleve" value="supprimer" id="valide">Supprimer la tâche</button>
                    </form>
                </div>
            </div>

                    <div class = "row">
                    <form role="form" name="inscription" method="post" action="formulaire.php" id='form'>
                        <div class="all col-md-12" id="envois">  
                            <label for="tache" >Ajouter une tâche</label>
                            <input class="form-control" type="text" maxlength="60" placeholder="Tâche à faire" name="tache" required/>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="valider" value="Envoyer">Ajouter</button>
                    </form>
    </div>
    <!-- <script src="./assets/js/todo.js" type="text/javascript"></script> -->


</body>
</html>