<?php foreach ($livraison as $livraisondetails) { ?>
    <div class="row">
        <div class="col">
            <div class="input-group mt-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">Fournisseur :</span>
                </div>
                <input class="form-control" type="text" value="<?= $livraisondetails["nom"]; ?>" placeholder="Recipient's text" aria-label="Recipient's " disabled>
            </div>
            <div class="input-group mt-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">Date livraison :</span>
                </div>
                <input class="form-control" type="text" value="<?= $livraisondetails["dateLivraison"]; ?>" placeholder="Recipient's text" aria-label="Recipient's " disabled>
            </div>
            <div class="input-group mt-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">Limite livraison :</span>
                </div>
                <input class="form-control" type="text" value="<?= $livraisondetails["limiteLivraison"]; ?>" placeholder="Recipient's text" aria-label="Recipient's " disabled>
            </div>
        </div>
    </div>
<?php } ?>
<form action="<?= base_url("index.php/reception/insert") ?>" method="post">
    <?php foreach ($detailsLivraison as $details) { ?>
        <input type="text" name="detailscommande_id" value="<?= $details["idDetailsCommande"] ?>" id="" hidden>
        <input type="text" name="livraison_id" value="<?= $details["idLivraison"] ?>" id="" hidden>
        <div class="row mt-5">
            <table class="table table-light border">
                <thead class="thead-light">
                    <tr>
                        <th>Produit</th>
                        <th>Quantite</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $details["nom"] ?></td>
                        <td><?= $details["quantite"] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php } ?>
    <div class="row">
        <input type="submit" value="Inserer" class="btn btn-success">
    </div>
</form>