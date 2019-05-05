<?php
require 'config.php';
require 'usr_funcs.php';
session_start();
if(valid_user()){
    if(valid_user_account_number){
        $_SESSION['valid_user']='';
        $_SESSION['valid_user_account_number']='';
        unset($_SESSION['valid_user']);
        unset($_SESSION['valid_user_account_number']);
        $_SESSION['logout']=1;
        header("Location:index.php");
    }
}else{
    
    header("Location:index.php");
}
?>