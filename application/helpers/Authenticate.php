<?php

trait Authenticate
{
    public function checkLogin(){
        if(!isset($_SESSION['user'])){
            return false;
        }
        else{
            return true;
        }
    }
}
?>