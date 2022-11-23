<?php
//     include ('/app/conf/env.php');
//     $dbConf = require '/app/conf/env.php';
//     var_dump($dbConf);
//     echo $DB_HOST;
//     require_once '/app/conf/env.php';
    require_once "/app/conf/.env.php";
    foreach($config as $key => $value) {
        $$key=$value;
    }
    echo $DB_NAME;


?>