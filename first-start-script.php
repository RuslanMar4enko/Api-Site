<?php

$result = [];

exec('php artisan migrate', $result);
exec('php artisan passport:install', $result);



foreach ($result as $item) {
    echo $item."\n";
}
