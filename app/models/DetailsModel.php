<?php

namespace app\models;

use Flight;
use PDO;

class DetailsModel
{
    public function detailsHabitation($id)
    {
        $db = Flight::db();
        $stmt = $db->query("SELECT * FROM properties WHERE id='$id'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}