<?php
    include __DIR__.'/include/ini.php';

    /* CRUD METHOD USAGE *
    if($conn){
        $params = [
            "op" => "read"
            ,"params" => "id,subject,anem,note"
            ,"tableName" => "".CONNDB.".".TABLE_NAME.""
            ,"whereCond" => "WHERE 1"
            ,"orderBy" => "order by ref ASC"
        ];

        try {
            $res = $instance->run($conn,$params);
        }catch(Exception $e) {
            echo 'Error: ' .$e->getMessage();
        }
    }
    /* */

?>
<!DOCTYPE HTML>
<html>
    <head>
		<title><?=PROJ_TITLE?></title>
        
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
        <link href="<?=CSS_PATH?>custom.css" rel="stylesheet" />

    </head>
    <body>
        <div class=""></div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    </body>
</html>

<script src="<?=JS_PATH?>/custom.js"></script>

