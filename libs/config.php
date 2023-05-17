<?php

 //echo $_SERVER["DOCUMENT_ROOT"];
 require_once $_SERVER["DOCUMENT_ROOT"].'\Antonio_Hurtado\libs\php-activerecord\ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg)
 {
     $cfg->set_model_directory($_SERVER["DOCUMENT_ROOT"].'\Antonio_Hurtado\models\entities');
     $cfg->set_connections(
             array(
                'development' => 'mysql://root:@localhost/orders'));
});
