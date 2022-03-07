<?php

//session_start();
if (isset($_SESSION['temp'])) {
  $entre = $_SESSION['temp'];
}
//var_dump($produit);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Stock</title>
  <link href="<?php echo base_url('assets/app.css') ?>" rel="stylesheet">
</head>

<body>

  <div class="wrapper">
    <div class="main">
      <div class="container-fluid p-0">
        <div class="row mt-5">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title mb-0">Details Devis</h5>
              </div>

              <div class="card-body">
                <table class="table table-hover my-0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Produit</th>
                      <th class="d-none d-xl-table-cell">Quantité</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php for ($i = 0; $i < count($produit); $i++) { ?>
                      <tr>
                        <td class="d-none d-xl-table-cell"><?php echo $produit[$i]['idProduit'] ?></td>
                        <td class="d-none d-xl-table-cell"><?php echo $produit[$i]['nom'] ?></td>
                        <td class="d-none d-md-table-cell"><?php echo $produit[$i]['quantite'] ?></td>
                        <td>
                          <form action="<?php echo base_url("index.php/devis/insertDevisDetails"); ?>" method="get">
                            <input type="hidden" name="idproduit" value="<?php echo $produit[$i]['idProduit'] ?>&<?php echo $produit[$i]['nom'] ?>">
                            <input type="hidden" name="entre" value="<?php echo $produit[$i]['quantite'] ?>">
                            <input type="submit" value="inserer au Devis">
                          </form>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="row  mt-5">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title mb-0">Liste Details devis</h5>
              </div>

              <div class="card-body">
                <table class="table table-hover my-0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Produit</th>
                      <th class="d-none d-xl-table-cell">Quantité</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (isset($_SESSION['temp'])) { ?>
                      <?php for ($i = 0; $i < count($entre); $i++) { ?>
                        <tr>
                          <td class="d-none d-xl-table-cell"><?php echo $entre[$i]['idProduit'] ?></td>
                          <td class="d-none d-xl-table-cell"><?php echo $entre[$i]['nom'] ?></td>
                          <td class="d-none d-md-table-cell"><?php echo $entre[$i]['quantite'] ?></td>
                        </tr>
                    <?php }
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title mb-0">Devis</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url("index.php/Devis/insertDevis"); ?>" method="get">
                  <div class="mb-3">
                    <label class="form-label">Fournisseur :</label>
                    <select name="idproduit" class="form-select mb-3">
                      <?php for ($i = 0; $i < count($fournisseur); $i++) {  ?>
                        <option value="<?php echo $fournisseur[$i]['id']; ?>"><?php echo $fournisseur[$i]['nom']; ?></option>
                      <?php } ?>
                    </select>
                    <label class="form-label">Date de validite :</label>
                    <input class="form-control form-control-lg" type="date" min="1" name="entre" value="1" />

                  </div>
                  <div class="text-center mt-3">
                    <button type="submit" class="btn btn-lg btn-primary">Valider</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>