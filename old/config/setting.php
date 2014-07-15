<?php

    function load_view($view){
        require(__BASE_URL__ . 'views/'. $view);
    }