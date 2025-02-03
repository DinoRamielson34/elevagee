<?php
$base_url = Flight::get('flight.base_url');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $base_url ?>/public/assets/css/bootstrap.css">

    <title>Liste Habitation</title>
</head>
<body>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Type</th>
      <th scope="col">Nombre de chambre(s)</th>
      <th scope="col">Loyer</th>
      <th scope="col">Neighborhood</th>
      <th scope="col">Description</th>
      <th><a href="<?php echo $base_url?>/form_ajout"><button type="button" class="btn btn-info">Ajouter nouveau habitation</button></a></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($habitations as $habitation):?>
    <tr>
      <td>
      <img src="<?php echo $base_url .'/public/assets/images/' . htmlspecialchars(json_decode($habitation['photos'])[0]);?>" alt="" style="width: 100px; height: auto;">
      </td>
      <td><?php echo $habitation['type']; ?></td>
      <td><?php echo $habitation['nbChambre']; ?></td>
      <td><?php echo $habitation['loyer']; ?></td>
      <td><?php echo $habitation['neighborhood']; ?></td>
      <td><?php echo $habitation['description']; ?></td>
      <td>
      <a href="<?php echo $base_url?>/modification?idHabitation=<?php echo $habitation['id']?>"><button type="button" class="btn btn-primary">Modifier</button></a>
      <a href="<?php echo $base_url?>/suppression?idHabitation=<?php echo $habitation['id']?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
</body>
</html>