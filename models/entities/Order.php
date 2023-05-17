<?php

require_once$_SERVER["DOCUMENT_ROOT"].'\Antonio_Hurtado\libs\config.php';

class Order extends ActiveRecord\Model {
    //put your code here
    static $table_name = 'orders';
    public static $belongs_to = array(array("user"));
    
     static $validates_numericality_of = array(
     array('tips', 'greater_than' => 0),
     array('amount', 'greater_than' => 0)
   );
}
