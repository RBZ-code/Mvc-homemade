<?php

session_start();


function checkUserLog(){
    if(isset($_SESSION['user_id']))
        return true;
    else
        return false;
    
}