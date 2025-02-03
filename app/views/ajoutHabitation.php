<?php
$base_url = Flight::get('flight.base_url');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $base_url?>/public/assets/css/bootstrap.css">
    <title>Ajout habitation</title>
</head>
<body>
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <form method="post" action="<?php echo $base_url?>/ajout" enctype="multipart/form-data" class="p-4 bg-white shadow rounded" style="width: 400px;" >
        <h2 class="text-center mb-4">Ajouter une habitation</h2>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" name="type" class="form-control" id="type" required>
        </div>

        <div class="mb-3">
            <label for="nbChambre" class="form-label">Nombre de chambre(s)</label>
            <input type="number" name="nbChambre" class="form-control" id="nbChambre" required>
        </div>

        <div class="mb-3">
            <label for="loyer" class="form-label">Loyer</label>
            <input type="number" name="loyer" class="form-control" id="loyer" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="photos" class="form-label">Upload Photos</label>
            <input type="file" name="photos[]" class="form-control" id="photos" multiple accept=".png,.jpg,.jpeg,.gif" required>
            <div class="form-text">Formats acceptés : .png, .jpg, .jpeg, .gif</div>
        </div>

        <div class="mb-3">
            <label for="neighborhood" class="form-label">Neighborhood</label>
            <input type="text" name="neighborhood" class="form-control" id="neighborhood" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100">Ajouter</button>
    </form>
</div>
</body>
</html>