<?php
$templates = [
    1 => 'page_1.tpl',
    2 => 'page_2.tpl',
    3 => 'page_3.tpl',
    4 => 'page_4.tpl',
    5 => 'page_5.tpl',
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Page Generator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
    <div class="container">
        <h1>Page Generator</h1>
        <p>Customizable HTML template</p>
        <div class="menulink" id="generatorBtnDiv" name="generatorBtnDiv">
            <?php
            $outputDir = __DIR__ . "/output/";
            foreach ($templates as $t => $n) {
                $outputUrl = "output/" . urlencode($t);
                $refLink = is_dir($outputDir . $t) ? $outputUrl : "notfound.php";
            ?>
                <fieldset class="tplFieldset">
                    <legend class="tplLegend"> Template n°<strong><?= $t ?></strong> </legend>
                    <div class="menulink" id="generatorBtnDiv_<?= $t ?>" name="generatorBtnDiv_<?= $t ?>">
                        <button class="btn btn-sm btn-primary" id="generatorBtn_<?= $t ?>" name="generatorBtn_<?= $t ?>" onclick="document.location.href='generator.php?t=<?= $t ?>'">Generate</button>
                        <button class="btn btn-sm btn-secondary" id="outputBtn_<?= $t ?>" name="outputBtn_<?= $t ?>" onclick="document.location.href='<?= $refLink ?>'">Output</button>
                        <button class="btn btn-sm btn-danger" id="deleteBtn_<?= $t ?>" name="deleteBtn_<?= $t ?>" onclick="document.location.href='deleteTemplate.php?t=<?= $t ?>'">Delete</button>
                    </div>
                </fieldset>
            <?php } ?>
        </div>
    </div>
</body>

</html>