<?php

    function langs($phrase){
        static $lang = array(

            // navbar links 
            'HOME' => 'Accueil',
            'CTEGORIES' => 'Catégories',
            'ITEMS' => 'Articles',
            'MEMBERS' => 'Membres',
            'STATISTICS' => 'Statistiques',
            'LOGS' => 'Journaux',
            '' => '',
            '' => '',
            '' => '',
        );
        return $lang[$phrase];
    }


?>
