<?php

namespace App\Init;

use App\Lib\Db;

class DBInitializer
{
    public static function init()
    {
        Db::getPdo()->exec(<<<CREATE_QUERY
            create table if not exists users (
                id bigserial primary key,
                login varchar(255) not null unique,
                password varchar(255) not null,
                counter int 
            );
        CREATE_QUERY);
    }
}