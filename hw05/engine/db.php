<?php
function getConnection(){
    static $connection = null;
    if(!$connection){
        $connection = mysqli_connect('localhost', 'root', '', 'shop');
    }
    return $connection;
}
function query($query){
    return mysqli_fetch_all(execute($query), MYSQLI_ASSOC);
}

function execute($query){
    return mysqli_query(getConnection(), $query);
}
