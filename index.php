<?php

    require 'sys/DB.php';
    
    define('CONF',__DIR__.'/config.json');
    
    
    
    use App\Sys\DB;
    
    //connect
    $gbd =DB::getInstance();
    //consult
    $sql='INSERT INTO users VALUES ("userbeans", "123pass", "01-01-17", "beans@mail.com")'; 
    
    //set param
    $gdb->bind();
    //query
    $gdb->query($sql);
    //execute
    $gdb->execute();
    