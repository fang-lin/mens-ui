<?php
/**
 * Created by PhpStorm.
 * User: Justin
 * Date: 13-12-4
 * Time: 下午3:45
 */
    if( ! isset($_GET['action']) )
        $_GET['action'] = 'grid';

    if( file_exists(__BASE_URL__. 'actions/'. $_GET['action']. '.php') ){
        require_once(__BASE_URL__. 'actions/'. $_GET['action']. '.php');
    }else{
        // error page;
    }