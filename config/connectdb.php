<?php



class Database {
    private static $link = null ;
    private static function getLink() {
        if ( self :: $link ) {
            return self :: $link ;
        }
        self :: $link = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME.";charset=utf8", DB_USERNAME, DB_PASSWORD);
        self::$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self :: $link ;
    }

    public static function __callStatic ( $name, $args ) {
        $callback = array ( self :: getLink ( ), $name ) ;
        return call_user_func_array ( $callback , $args ) ;
    }

    

    public static function Con_delete(){
        self::getLink() == null;
    }

} 











?>