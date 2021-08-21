<?php

    function langs($phrase){
        static $lang = array(

            // navbar links 
            'HOME' => 'Home',
            'CTEGORIES' => 'Categories',
            'ITEMS' => 'Items',
            'MEMBERS' => 'Members',
            'STATISTICS' => 'Statistics',
            'LOGS' => 'Logs',
            '' => '',
            '' => '',
            '' => '',
        );
        return $lang[$phrase];
    }


?>