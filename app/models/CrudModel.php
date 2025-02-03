<?php

namespace app\models;

use Flight;
use PDO;

class CrudModel
{
    public function listerHabitation(){
        $db = Flight::db();
        $stmt = $db->query("SELECT * FROM properties");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function AjouterHabitation($type, $nbChambre, $loyer, $photos, $neighborhood, $description){
        $db = Flight::db();

        $stmt = $db->prepare("INSERT INTO properties (type, nbChambre,loyer,photos, neighborhood, description) VALUES (:type, :nbChambre, :loyer, :photos, :neighborhood, :description)");
        $result = $stmt->execute([
            ':type' => $type,
            ':nbChambre'=> $nbChambre,
            ':loyer'=> $loyer,
            ':photos'=> $photos,
            ':neighborhood'=> $neighborhood,
            ':description'=> $description

        ]);
        // Gérer les erreurs
        if (!$result) {
            var_dump($stmt->errorInfo());
            return false;
        }

        return true;

    }

    public function ModifierHabitation($idHabitation,$type, $nbChambre, $loyer, $photos, $neighborhood, $description){

        $stmt = $this->db->prepare("UPDATE properties SET type= :type AND nbChambre= :nbrChambre , loyer= :loyer , photos= :photos , neighborhood= :neighborhood , description= :description WHERE id= :idHabitation");
        $result = $stmt->execute([
            ':type' => $type,
            ':nbChambre'=> $nbChambre,
            ':loyer'=> $loyer,
            ':photos'=> $photos,
            ':neighborhood'=> $neigborhood,
            ':neighborhood'=> $neigborhood,
            ':idHabitation'=> $idHabitation

        ]);

        // Gérer les erreurs
        if (!$result) {
            var_dump($stmt->errorInfo());
            return false;
        }

        return true;
        
    }

    public function SupprimerHabitation($idHabitation){
        $db = Flight::db();
        $stmt = $db->query("DELETE FROM properties WHERE id='$idHabitation' ");

        // Gérer les erreurs
        if (!$stmt) {
            var_dump($stmt->errorInfo());
            return false;
        }

        return true;
        
    }
}