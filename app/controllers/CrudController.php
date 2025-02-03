<?php
namespace app\controllers;

use app\models\CrudModel;
use Flight;

class CrudController{
    public function __construct()
    {

    }

    public function ListeHabitation(){
        
        $crudModel = new CrudModel();
        $habitations = $crudModel->ListerHabitation();

        $data = [
            'page' => 'listeHabitation',
            'habitations' => $habitations
        ];

        Flight::render('template', $data);
    }

    public function AjoutHabitation()
    {
        
        $crudModel = new CrudModel();
        
    
        // Vérifier si la requête est de type POST
        if (Flight::request()->method === 'POST') {
            $data = Flight::request()->data;
    
            // Vérification et récupération des fichiers uploadés
        $photosArray = [];
        if (!empty($_FILES['photos']['name'][0])) {
        // Appeler la fonction uploadPhotos pour gérer l'upload
            $uploadResult = $this->uploadPhotos($_FILES['photos']);
        if (isset($uploadResult['error'])) {
            Flight::json(['status' => 'error', 'message' => $uploadResult['error']], 400);
            return;
        }
        // Si l'upload a réussi, on récupère les chemins des fichiers
            $photosArray = $uploadResult['success'];
        }

        // Convertir le tableau en JSON valide
        $photoTab = json_encode($photosArray);

    
            // Récupérer les autres données du formulaire
            $type = $data->type;
            $nbChambre = $data->nbChambre;
            $loyer = $data->loyer;
            $neighborhood = $data->neighborhood;
            $description = $data->description;
    
            // Vérifier que toutes les valeurs requises sont présentes
            if (!$type || !$nbChambre || !$loyer || !$neighborhood || !$description) {
                Flight::json(['status' => 'error', 'message' => 'Tous les champs sont requis'], 400);
                return;
            }
    
            // Appel au modèle pour ajouter l'habitation
            $result = $crudModel->AjouterHabitation($type, $nbChambre, $loyer, $photoTab, $neighborhood, $description);
    
            if ($result) {
                Flight::json(['status' => 'success', 'message' => 'Habitation ajoutée avec succès']);
                Flight::redirect('/liste');
            } else {
                Flight::json(['status' => 'error', 'message' => 'Erreur lors de l\'ajout'], 500);
            }
        } else {
            Flight::json(['status' => 'error', 'message' => 'Méthode non autorisée'], 405);
        }
    }
    
    public function uploadPhotos($files)
    {
        $base_url = Flight::get('flight.base_url') . '/public/assets/images/';
        $uploadedPaths = [];
        $uploadDir = 'public/assets/images/';
        
         // Répertoire de destination pour les fichiers uploadés
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'avif']; // Extensions autorisées
        /*
        // Vérifie si le répertoire existe, sinon le crée avec les bonnes permissions
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0777, true)) {
                return ['error' => "Impossible de créer le répertoire pour les fichiers uploadés."];
            }
        }
        */
        
    
        // Parcours chaque fichier téléchargé
        foreach ($files['tmp_name'] as $key => $tmpName) {
            $fileName = basename($files['name'][$key]);
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            $filePath = $uploadDir . $fileName;
    
            // Vérifie si l'extension du fichier est autorisée
            if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                // Vérifie si le fichier a bien été déplacé
                if (move_uploaded_file($tmpName, $filePath)) {
                    // Ajoute le chemin du fichier uploadé à la liste
                    $uploadedPaths[] = $fileName;
                } else {
                    return ['error' => "Erreur lors de l'upload du fichier: " . $fileName];
                }
            } else {
                return ['error' => "Extension de fichier non autorisée: " . $fileExtension];
            }
        }
    
        // Si des fichiers ont été uploadés, retourne les chemins
        if (count($uploadedPaths) > 0) {
            return ['success' => $uploadedPaths];
            Flight::redirect('/liste');

        }
    
        return ['error' => "Aucun fichier uploadé"];
        
    }
    

    public function form_AjoutHabitation(){
        $data = [
            'page' => 'ajoutHabitation'
        ];

        Flight::render('template', $data);
    }

    public function ModificationHabitation(){
            
    }

    public function suppressionHabitation(){
        $crudModel = new CrudModel();
        $idHabitation = $_GET['idHabitation'];
        if(!isset($idHabitation)){
            echo "Id ne peut pas etre null";
        }
        $deleteHabitation = $crudModel->SupprimerHabitation($idHabitation);
        Flight::redirect('/liste');
    }
}
?>