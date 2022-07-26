<?php

namespace App\Connection;

use PDO;

class Connection {
    private static ?PDO $writeDBConnection = null;
    private static ?PDO $readDBConnection = null;

    public static function write() {
        if(!self::$writeDBConnection) {
            self::$writeDBConnection = new PDO("mysql:host=sql;dbname=homestead;charset=utf8", 'root','secret');
            self::$writeDBConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$writeDBConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }

        return self::$writeDBConnection;
    }

    public static function read() {
        if(!self::$readDBConnection) {
            self::$readDBConnection = new PDO("mysql:host=sql;dbname=homestead;charset=utf8", 'root','secret');
            self::$readDBConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$readDBConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }

        return self::$readDBConnection;
    }
}