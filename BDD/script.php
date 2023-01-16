<?php

function connectBDD()
{
    $user = 'befree';
    $pass = 'befree';
    return new PDO('mysql:host=localhost;dbname=befree;charset=utf8mb4', $user, $pass);
}

function findType()
{

    if (($handle = fopen("type_prestataires.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $result[] =  $data[1];
        }
        fclose($handle);
    }
    var_dump($result);
    $resultUnique = array_unique($result);
    foreach ($resultUnique as $id => $row) {
        importTypePrestataire($id, $row);
        // var_dump($row);

    }
}

function importTypePrestataire($id, $row)
{
    $user = 'befree';
    $pass = 'befree';
    $dbh = new PDO('mysql:host=localhost;dbname=befree', $user, $pass);

    $randonnees = $dbh->query("INSERT IGNORE INTO type_prestataire (id, nom_type_prestataire) VALUES (\"" . $id . "\",\"" . $row . "\")")->execute();;
}



function getTypes()
{

    $db = connectBDD();

    return $db->query('SELECT id, nom_type_prestataire from type_prestataire')->fetchAll();
}


function getDescriptionPrestataire()
{
    $db = connectBDD();
    return $db->query('SELECT id, description_prestataire from prestataire')->fetchAll();
}




//Ajouter une ligne "autres" dans la table des type prestataire
function findTypeInDescription()
{
    $descriptions = getDescriptionPrestataire();
    $types = getTypes();
    $db = connectBDD();

    foreach ($descriptions as $key => $description) {
        $desc = $description["description_prestataire"];
        foreach ($types as $key2 => $type) {
            $type_value = $type["nom_type_prestataire"];
            if (strpos(strtoupper($desc), strtoupper($type_value)) !== false) {
                $db->query("INSERT IGNORE INTO prestataire_type_prestataire (prestataire_id, type_prestataire_id) VALUES (\"" . $description['id'] . "\",\"" . $type["id"] . "\")")->execute();
            } else {
                // 1 = valeur de l'id du type "autres"
                $db->query("INSERT IGNORE INTO prestataire_type_prestataire (prestataire_id, type_prestataire_id) VALUES (\"" . $description['id'] . "\",\"" . 1 . "\")")->execute();
            }
        }
    }
}

findTypeInDescription();
