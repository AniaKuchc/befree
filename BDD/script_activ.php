<?php

function findType()
{

    if (($handle = fopen("type_prestataires.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $result[] =  $data[0];
        }
        fclose($handle);
    }
    $resultUnique = array_unique($result);
    foreach ($resultUnique as $id => $row) {
        connectBDD($id, $row);
    }
}
findType();


function connectBDD($id, $row)
{
    $user = 'befree';
    $pass = 'befree';
    $dbh = new PDO('mysql:host=localhost;dbname=befree', $user, $pass);

    $randonnees = $dbh->query("INSERT IGNORE INTO type_prestataire (id, nom_type_prestataire) VALUES (\"" . $id . "\",\"" . $row . "\")")->execute();
}
