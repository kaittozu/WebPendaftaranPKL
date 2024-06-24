<?php

$con = pg_connect("host=localhost dbname=webapp user=postgres password=1234");
if (!$con) {
    die("Connection failed: " . pg_last_error());
}

?>