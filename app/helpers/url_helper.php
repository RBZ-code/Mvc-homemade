<?php 
function redirect($page){
    header('refresh: 1; url="' . URLROOT . '/' . $page.'"');
}