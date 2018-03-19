<?php

    require 'sys/DB.php';
    
    define('CONF',__DIR__.'/config.json');
    
    
    
    use App\Sys\DB;
    
    //connect
    $gbd=DB::getInstance();
    //print_r($gbd);
    //consult
    /*$sql = 'SELECT username FROM users';
    echo '<h2>';
    $result=$gbd->query($sql);
    print_r($result);*/
    
    echo '<h2>';
    $sql='INSERT INTO users VALUES ("userbeans", "123pass", "01-01-17", "beans@mail.com")';
    $result=$gbd->query($sql);
    print_r($result);
    
    //execute
    $gdb->execute();
    