<?php




for ($i = 0; $i < count($stockageParProduit); $i++) {
    $dataPoints2[$i]['label'] = $stockageParProduit[$i]['nom'];
    $dataPoints2[$i]['y'] = ($stockageParProduit[$i]['quantiteProduit'] / $sommeProduits) * 100;
}


?>


<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4e73df;
        ;
        color: white;
    }
</style>

<script>
    window.onload = function() {
        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Variation Stockage par Produit"
            },
            axisY: {
                suffix: "%",
                scaleBreaks: {
                    autoCalculate: true
                }
            },
            data: [{
                type: "column",
                yValueFormatString: "#,##0\"%\"",
                indexLabel: "{y}",
                indexLabelPlacement: "inside",
                indexLabelFontColor: "white",
                dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart2.render();

    }
</script>

<div>
    <h1>Gestion de Stock</h1><br>
    <table style="width:100%" id="customers">
        <tr>
            <th></th>
            <th></th>

            <th colspan="3">Entrees</th>
            <th colspan="3">Sorties</th>
            <th colspan="4">Stock</th>

        </tr>
        <tr>
            <th>Date</th>
            <th>Produit</th>
            <th>Quantite</th>
            <th>Prix unitaire</th>
            <th>Montant</th>
            <th>Quantite</th>
            <th>Prix unitaire</th>
            <th>Montant</th>
            <th>Quantite</th>
            <th>Prix unitaire</th>
            <th>Montant</th>
            <th>Details</th>
        </tr>
        <?php for ($i = 0; $i < count($mouvement); $i++) { ?>
            <tr>
                <td><?php echo $mouvement[$i]['dateStock'] ?> </td>
                <td><?php echo $mouvement[$i]['nom'] ?> </td>
                <td><?php echo $mouvement[$i]['quantiteAjouter'] ?> </td>
                <td><?php echo $mouvement[$i]['prixAchat'] ?> </td>
                <td><?php echo ($mouvement[$i]['quantiteAjouter'] * $mouvement[$i]['prixAchat']) ?> </td>
                <td><?php echo $mouvement[$i]['quantiteUtilise'] ?> </td>
                <td><?php echo $mouvement[$i]['prixAchat'] ?> </td>
                <td><?php echo ($mouvement[$i]['quantiteUtilise'] * $mouvement[$i]['prixAchat']) ?> </td>
                <td><?php echo $mouvement[$i]['quantiteReste'] ?> </td>
                <td><?php echo $mouvement[$i]['prixAchat'] ?> </td>
                <td><?php echo ($mouvement[$i]['quantiteReste'] * $mouvement[$i]['prixAchat']) ?> </td>
                <form action="<?php echo base_url('Stock/mouvementStockparProduit') ?>" method="POST">
                    <td>
                        <input type="submit" value="Details">
                        <input type="hidden" name="idProduit" value="<?php echo $mouvement[$i]['idProduit'] ?>">
                    </td>
                </form>
            </tr>
        <?php } ?>
    </table>

    <br><br>
    <h2><Strong>Variation des Stocks Par Produit</Strong></h2><br>
    <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
    <script src="<?php echo base_url('assets/js/demo/canvasjs.min.js') ?>"></script>
</div>