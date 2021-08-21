<?php

    function langs($phrase){
        static $lang = array(
            'HOME' => 'Home',
            'CTEGORIES' => 'Categories'
        );
        return $lang[$phrase];
    }


?>