- cd /opt/lampp/htdocs/WWW/PROJECTS/PHP/Smarty
- mkdir rubricaSmarty
- cd rubricaSmarty

- mkdir templates templates_c css js img config classes include DB
- chmod 777 templates_c
- touch index.php templates/home.tpl CSS/custom.css JS/custom.js classes/dbman.php classes/manager.php include/classConn.php

- cp -r ../smarty-4.5.5/libs/ .
- nano templates/home.tpl

        <!DOCTYPE html>
        <html lang="it">
        <head>
            <title>Rubrica Smarty</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

            <link rel="icon" type="image/x-icon" href="{$imgPath}favicon.ico" />
            <link rel="stylesheet" href="{$cssPath}custom.css">
        </head>

        <body>
            <div class="headerDiv">{$appTitle}</div>
        </body>

        </html>

        <script src="{$jsPath}custom.js"></script>


- nano index.php

        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        require_once __DIR__ . '/libs/Smarty.class.php';

        include_once __DIR__ . '/config/config.php';

        $smarty = new Smarty();
        $smarty->setTemplateDir(__DIR__ . '/templates/');
        $smarty->setCompileDir(__DIR__ . '/templates_c/');

        $smarty->assign('cssPath', 'css/');
        $smarty->assign('jsPath', 'js/');
        $smarty->assign('imgPath', 'img/');
        $smarty->assign('appTitle', APP_TITLE);

        $smarty->display('home.tpl');
        ?>

- sudo /opt/lampp/lampp start
- Browse http://localhost/rubricaSmarty/index.php



