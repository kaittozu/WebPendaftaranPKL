<?php

$con = pg_connect("host=localhost dbname=webapp user=postgres password=1234");
if(!$con) {
    echo "An error occurred.<br>";
    exit;
}
?>