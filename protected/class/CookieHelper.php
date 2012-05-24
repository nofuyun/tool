<?php
class CookieHelper{
    public static function setCookie($name,$value,$path='/'){
         setcookie($name,$value,time()+3600*24*365,$path,'',0);
    }
    public static function cancelCookie($name){
          self::setCookie($name, '',-100,'/','',0);
    }
}