<?php

//echo $_SERVER["DOCUMENT_ROOT"].'/co.edu.udec.act1.antoniohurtado/libs/config.php';
require_once$_SERVER["DOCUMENT_ROOT"].'\Antonio_Hurtado\libs\config.php';

class User extends ActiveRecord\Model{
    
    static $table_name = 'users';
    static $primary_key = 'cedula';
    static $has_many = array(
        array('orders', 'class_name' => 'Order', 'foreign_key' => 'users_cedula')
    );
    
   
    /*static $validates_presence_of = array(
        array('name')
    );*/
      /* static $validates_length_of = array(
     array('name', 'within' => array(1,50)),
     array('last_name', 'within' => array(1,50))
   );*/
   
    
    
}
