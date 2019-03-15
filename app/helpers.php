<?php
/**
 * Created by PhpStorm.
 * User: Yanfan
 * Date: 2019/3/15
 * Time: 18:08
 */

function get_db_config()
{
    if (getenv('ID_IN_HEROKU')) {
        $url = parse_url(getenv('DATABASE_URL'));
        return [
            'connection' => 'pgsql',
            'host' => $url['host'],
            'database' => substr($url["path"], 1),
            'username'  => $url["user"],
            'password'  => $url["pass"],
        ];
    } else {
        return [
            'connection' => env('DB_CONNECTION', 'mysql'),
            'host' => env('DB_HOST', 'localhost'),
            'database'  => env('DB_DATABASE', 'forge'),
            'username'  => env('DB_USERNAME', 'forge'),
            'password'  => env('DB_PASSWORD', ''),
        ];
    }
}