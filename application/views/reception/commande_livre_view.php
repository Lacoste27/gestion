<div class="container-fluid">
    <table class="table table-light border">
        <thead class="thead-light">
            <tr>
                <th>Reference</th>
                <th>Date de livraison</th>
                <th>Date de commande</th>
                <th>Fournisseur</th>
                <th>Adresse</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livraisonlist as $livraison) { ?>
                <tr>
                    <td><?=$livraison["reference"];?></td>
                    <td><?=$livraison["dateLivraison"];?></td>
                    <td><?=$livraison["dateCommande"];?></td>
                    <td><?=$livraison["nom"];?></td>
                    <td><?=$livraison["adresse"];?></td>
                    <td><a href="<?=base_url("index.php/reception/details/".$livraison["livraison_id"])?>">Details</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
