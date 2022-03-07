<?php

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
    <nav class="navbar navbar-expand navbar-light navbar-bg">
      <div class="navbar-collapse collapse">
          <h3 class="card-title mb-0">
              <i class="data"></i> 
          </h3>
      </div>
    </nav>

    <main class="content">
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-4">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title mb-0">Liste devis</h5>
              </div>
                             
              <div class="card-body">
                <table class="table table-hover my-0">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Fournisseur</th>
                              <th class="d-none d-xl-table-cell">Date de devis</th>
                              <th class="d-none d-xl-table-cell">Date de validite</th>
                          </tr>
                      </thead>
                      <tbody>
                        
                        <?php for($i=0;$i<count($devis);$i++){ ?>
                          <tr>
                              <td class="d-none d-xl-table-cell"><?php echo $devis[$i]['id'] ?></td>
                              <td class="d-none d-xl-table-cell"><?php echo $devis[$i]['nom'] ?></td>
                              <td class="d-none d-md-table-cell"><?php echo $devis[$i]['dateDevis'] ?></td>
                              <td class="d-none d-md-table-cell"><?php echo $devis[$i]['dateValidite'] ?></td>
                              <td class="d-none d-md-table-cell">
                                <form action="<?php echo base_url("Devis/detailsDevis"); ?>" method="get"><input type="hidden" name="detail" value="<?php echo $devis[$i]['id'] ?>">
                                  <input type="submit" value="Details">
                              </form></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                  </table>
              </div>
            </div>
          </div>
          <div class="col-4">
              <div class="card">
                <div class="card-header">
                  <?php if(isset($entre)){ ?>
                  <h5 class="card-title mb-0"></h5>
                  <p>Fournisseur: <?php echo $devisRay['nom']; ?></p>
                  <p>Date de Devis: <?php echo $devisRay['dateDevis']; ?></p>
                  <p>Date de Validite: <?php echo $devisRay['dateValidite']; ?></p>
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
                        
                        <?php for($i=0;$i<count($entre);$i++){ ?>
                          <tr>
                              <td class="d-none d-xl-table-cell"><?php echo $entre[$i]['idProduit'] ?></td>
                              <td class="d-none d-xl-table-cell"><?php echo $entre[$i]['nom'] ?></td>
                              <td class="d-none d-md-table-cell"><?php echo $entre[$i]['quantite'] ?></td>
                          </tr>
                        <?php }} ?>
                      </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>
        
        </div>
  </main>


      <footer class="footer">
        <div class="container-fluid">
          <div class="row text-muted">
            <div class="col-6 text-start">
              <p class="mb-0">
                <a class="text-muted" target="_blank"><strong>GESTION</strong></a> &copy;
              </p>
            </div>
            <div class="col-6 text-end">
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a class="text-muted" target="_blank">Support</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" target="_blank">Aide</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" target="_blank">Privée</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" target="_blank">Termes</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  </body>

</html>
