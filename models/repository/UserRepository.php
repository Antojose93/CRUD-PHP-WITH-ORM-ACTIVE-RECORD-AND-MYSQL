<?php

require_once  $_SERVER["DOCUMENT_ROOT"].'\Antonio_Hurtado\models\entities\User.php';


class UserRepository{
    
    public static function add_user($cedula , $pass, $name, $last_name, $gender, $email){   
        $u = new User();
        $u->cedula = $cedula;
        $u->pass = $pass;
        $u->name = $name;
        $u->last_name =  $last_name;
        $u->gender = $gender;
        $u->email = $email;       
        try {
            return $u->save();
        } catch (Exception $exc) {
            $mensaje = $exc->getMessage();    
                if (strstr($mensaje, "Duplicate entry")) {
                    echo "El usuario con cedula $u->cedula ya existe";       
                }else{
                    echo 'Error no conocido hasta el momento El usuario no fue insertado en la base de datos';
                }
        }
        
    }// fin de la funcion add_user
    
    
    public static function find_user_by_cedula($cedula){
        
       try{
            return User::find(array($cedula));
       } catch (Exception $ex) {
           echo "Error al buscar al usuario con cedula $cedula   ".$ex->getMessage();
       } 
      
    }//find de find_user_by_cedula
    
    public static function find_all_users(){
        try {
            return User::all();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }// fin de find_all_users()
      
    
    public static function delete_user_by_cedula($cedula){
        
        try {
            return User::delete_all(array('conditions' => array ('cedula' => $cedula)));
        } catch (Exception $exc) {
            echo "Error al tratar de borrar al usuario con cedula $cedula ".$exc->getMessage();
        }
     }  
}

 