- cd /opt/lampp/htdocs/WWW/PROJECTS/PHP/Smarty
- mkdir pageGenerator
- cd pageGenerator

- mkdir templates templates_c css js img include output output/css output/js output/img customPlugins
- chmod 777 templates_c output
- touch index.php generator.php notfound.php deleteTemplate.php templates/page_1.tpl css/custom.css js/custom.js output/css/custom.css output/js/custom.js include/structures.php include/folderCreation.php include/contentCreation.php

- cp -r ../smarty-4.5.5/libs/ .

- nano templates/page_1.tpl

        <!DOCTYPE html>
            <html lang="it">

            <head>
                <title>{$titolo}</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
                    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
                    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
                </script>

                <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
                <link rel="stylesheet" href="css/custom.css">
            </head>

            <body>
                <div class="headerDiv">{$rooLink}</div>
                <div class='clearDiv'></div>
                <div class='menuDiv'>{$menu}</div>
                <div class='clearDiv'></div>
                <h1>{$titolo}</h1>
                <div>{$contenuto}</div>
            </body>

            </html>

            <script src="js/custom.js"></script>

- nano index.php

        ...

- nano generator.php

        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        require_once __DIR__ . '/libs/Smarty.class.php';

        $smarty = new Smarty();
        $smarty->setTemplateDir(__DIR__ . '/templates/');
        $smarty->setCompileDir(__DIR__ . '/templates_c/');
        $smarty->setCacheDir(__DIR__ . '/cache/');

        $t = isset($_GET['t']) ? intval($_GET['t']) : 1;

        $templateFile = 'page_' . $t . '.tpl';
        if ($smarty->templateExists($templateFile)) {
            include_once __DIR__ . '/include/structures.php';
            include_once __DIR__ . '/include/folderCreation.php';
            include_once __DIR__ . '/include/contentCreation.php';
        } else {
        ?>
            <li style="color:red;">Template mancante: <strong><?= htmlspecialchars($templateFile) ?></strong></li>
        <?php
        }
        ?>
        <button class=" btn btn-sm btn-primary" id="outputLink" name="outputLink" onclick="document.location.href='./'">Home</button>

- nano deleteTemplate.php

        ...

- nano notfound.php

        ...

- nano include/structures.php 
- nano include/folderCreation.php 
- nano include/contentCreation.php

        ...

        $smarty->assign('rooLink', $rooLink);
        $smarty->assign('menu', $menuList);
        $smarty->assign('titolo', $pagina['titolo']);
        $smarty->assign('contenuto', $pagina['contenuto']);

        #   TEMPLATE GENERATION INSTRUCTIONS
        #   --------------------------------
        $html = $smarty->fetch($templateFile);
        file_put_contents($outputDir . '/' . $pagina['slug'] . '.html', $html);

        ...


- sudo /opt/lampp/lampp start

- Browse http://localhost/pageGenerator

