<?php

namespace app\controllers;

use app\models\ProductModel;
use app\models\LogModel;
use app\models\HomeModel;
use app\models\DetailsModel;
use Flight;

class DetailsController
{
    public function details()
    {
        $idHabitation = $_GET['id'];
        $detailsModel = new DetailsModel();
        $habitations = $detailsModel->detailsHabitation($idHabitation); // Fetch habitations

        $data = [
            'page' => 'details',
            'habitations' => $habitations // Add properties to data
        ];

        Flight::render('template', $data);
    }
}