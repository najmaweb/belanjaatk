<?php
function loginsuccess($user,$password){
    if(($user==="admin")and($password==="admin")){
        return true;
    }
    return false;
}