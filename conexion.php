<?php
function conectBD()
{
    $host="host=127.0.0.1";
    $port="port=5432";
    $dbname="dbname=dbexp";
    $user="user=postgres";
    $password="password=obed0105";
    $db=pg_connect("$host $port $dbname $user $password");
    if($db)
    {
        echo "exito";
    }
    else
    {
        echo "error".pg_last_error();
    }
    return $db;
}
?>