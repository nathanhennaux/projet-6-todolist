<?php 
$jsonString = file_get_contents('todo.json');
$data = json_decode($jsonString, true);
if(isset($_POST['tache'])) {
    $depart = trim(filter_input(INPUT_POST, 'tache', FILTER_SANITIZE_STRING));

    $data[] = ["id" => count($data),"tache" => $_POST['tache'], "statut" => true];
    
    $codejson = json_encode($data,JSON_UNESCAPED_UNICODE);
    $depart = fopen("todo.json", "w");//ouvre le fichier
   /* print_r($codejson);*/
    fwrite($depart, $codejson);//écrit dans le doc
    fclose($depart);//ferme le doc
    }

    
    if(isset($_POST['tic'])) {
        
        foreach ($_POST['tic'] as $id) {
            if ($data[$id]["statut"] == true) {
                $data[$id]["statut"] = false;
                $newJsonString = json_encode($data);
                file_put_contents('todo.json', $newJsonString);
            }
        }
    }

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body class="teal lighten-3">
    <div class="container">
        <div class="card teal lighten 4   white-text z-depth-2">
            <div class='row'>
                <div class="col-s12">
                    <form method="post" action="index.php">
                        <h5 class="amber-text">A FAIRE</h5>
                <ul id="sortable">
                        <?php 
                require('contenu.php');
                          echo $html1;
                ?>
                </ul>
                        <!--<p>
                    <label>
                        <input type="checkbox" name="tache" />
                        <span class="white-text">Perdre ses cheveux</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input type="checkbox" name="tache" />
                        <span class="white-text">Devenir une machine en code</span>
                    </label>
                </p>
                <p>
                    <label>
                        <?php   
                    /*foreach ($parsed_json as $value) {
                        foreach ($value as $value2) {
                        echo '<input type=checkbox name=tache />';
                        echo '<span class=white-text>'.$value2.'</span><br>';
                        }
                    }*/
        ?>
                    </label>-->


                        <p>
                            <label>
                                <button class="btn waves-effect waves-light amber darken-2" type="submit" name="action">Enregistrer</button>
                            </label>
                        </p>
                    </form>
                </div>
                <h5>ARCHIVES</h5>

                <?php 
  echo $html2;
                    ?>



                <div class='row'>
                    <div class="card-action">
                        <div class="col s12">
                            <form method="post" action="index.php">
                                <h5>Ajouter une tâche</h5>
                                Tâche à effectuer :
                                <div class="input-field inline">
                                    <textarea id="textarea1" name="tache" class="materialize-textarea"></textarea>
                                </div>
                                <button class="btn-floating btn-large waves-effect waves-light amber darken-2" type="submit"><i
                                        class="material-icons">playlist_add</i></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>$( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );</script>


</body>

</html>