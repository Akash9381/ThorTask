<?php

use Request as RQ;

if(!function_exists('setActiveClass')){
    function setActiveClass($path){
        return RQ::is($path.'*')?'active':'';
    }
}





