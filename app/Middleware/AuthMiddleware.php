<?php

namespace FdlAmericano\MhdFadhilAp\Middleware;

class AuthMiddleWare implements Middleware{


    function before():void{
         
        session_start();
        if(!isset($_SESSION['user'])){
            header('Location: /login');
            exit();
        }
    }

}