<?php

    function langs($phrase){
        static $lang = array(
            'MESSAGE' => 'welcome',
            'ADMIN' => 'admin'
        );
        return $lang[$phrase];
    }


?>