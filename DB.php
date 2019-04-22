<?php
class DB
{
    protected static function query($sql, $exec = false)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=psd1811', 'root', '');
        if ($exec) {
            $stmt = $pdo->exec($sql);
        } else {
            $stmt = $pdo->query($sql);
        }

        if ($stmt === false) {
            echo '<pre>';
            // errorInfo 用于读取报错的基本信息
            print_r($pdo->errorInfo());
            die($sql);
        }
        return $stmt;
    }

    public static function fetchAll($sql)
    {
        // $stmt = DB::query();
        //
        // 在类内, 称呼自己为 self
        // $stmt = self::query($sql);
        //
        return self::query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function fetch($sql)
    {

        return self::query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public static function rowCount($sql)
    {
        return self::query($sql)->rowCount();
    }

    public static function exec($sql)
    {
        return self::query($sql, true);
    }
}
