<?php

    include_once("php/functions.php");

    ini_set('display_errors', '1');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Balatoni helyszínek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <header class="bg-primary text-white text-center py-5">
        <h1>Hely feltöltés</h1>
    </header>

    <div class="col-md-9 p-3 mx-auto">
        <form method="POST" class="col-md-9 mx-auto p-4">
            <div class="row">
                <div class="col">
                    <h5>Cím</h5>
                    <input type="text" class="form-control" placeholder="Cím" name="title">
                    <br>
                    <h5>Kordináta</h5>
                    <input type="text" class="form-control" placeholder="Kordináta" name="cordinate">
                    <br>
                    <h5>Leírás</h5>
                    <textarea rows="5" class="form-control" name="description">
                    </textarea>
                </div>
                <div class="col">
                    <h5>Város</h5>
                    <input type="text" class="form-control" placeholder="Város" name="town">
                    <br>
                    <h5>Part</h5>
                    <input type="text" class="form-control" placeholder="Part (Északi/Déli)" name="part">
                    <br>
                    <h5>Irány</h5>
                    <input type="text" class="form-control" placeholder="Irány (Nyugat/Kelet)" name="irany">
                    <br>
                    <h5>Címkék</h5>
                    <input type="text" class="form-control" placeholder="Címkék (Pl. Látványosság, Híresség, Szobor" name="tags">
                </div>
            </div>
            <br>
            <input type="submit" class="btn btn-success col-md-9 text-center" value="Beküldés" name="button">
            <?php
                upload($_POST);
            ?>
        </form>
    </div>
</body>
</html>
