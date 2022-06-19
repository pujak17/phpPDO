<?php

$db = new SQLite3('mydb.db');

$res = $db->query('SELECT * FROM users');

while ($row = $res->fetchArray()) {
    echo "{$row['id']} {$row['name']} {$row['price']} \n";
}