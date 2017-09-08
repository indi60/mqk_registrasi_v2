<?php


    function isActiveRoute($route, $output = 'active')
    {
    	//dd(Route::getCurrentRoute()->getPath() ." ".$route);
        if (Route::getCurrentRoute()->getPath() == $route) {
            return $output;
        }
    }
