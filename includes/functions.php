<?php 

/*
Name: Kuldeep Mohanta
Date: October 8, 2023
INFT 2100
*/

#Function to redirect webpage to another url
function redirect($url)
    {
        header("Location: ".$url);
        ob_flush();
    }