<?php

class Connection
{
    private function __construct(){}
    private function __clone(){}

    /**
     * @param string $fileName
     * @return PDO
     * @throws Exception Abre a conexão com o banco de dados de acordo com as configurações
     * informadas no arquivo database.ini localizada em app/Config/database.ini
     */
    public static function open(string $fileName): PDO
    {
        if(file_exists("./app/Config/{$fileName}.ini")) {

            $db = parse_ini_file("./app/Config/{$fileName}.ini");

            $db['dbHost'] = $db['dbHost'] ?? null;
            $db['dbName'] = $db['dbName'] ?? null;
            $db['dbUser'] = $db['dbUser'] ?? null;
            $db['dbPass'] = $db['dbPass'] ?? null;
            $db['dbPort'] = $db['dbPort'] ?? null;
            $db['dbType'] = $db['dbType'] ?? null;

            $conn = match ($db['dbType']) {
                'pgsql' => self::pgsql($db),
                'mysql' => self::mysql($db),'sqlite' => self::sqlite($db),
                default => throw new InvalidArgumentException("Tipo de banco de dados nao suportado")
            };

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }

        throw new Exception("Arquivo {$fileName} não encontrado!");
    }

    private static function pgsql(array $db): PDO
    {
        $port = $db['port'] = $db['dbPort'] ?? 5432;

        return new PDO("pgsql:dbname={$db['dbName']}; user={$db['dbUser']};password={$db['dbPass']};
        host{$db['dbHost']};
        port={$port}");
    }

    private static function mysql(array $db): PDO
    {
        $port = $db['port'] = $db['dbPort'] ?? 3606;

        return new PDO("mysql:host={$db['dbHost']}; dbname={$db['dbName']}",
                        "{$db['dbUser']}", "{$db['dbPass']}");
    }
    private static function sqlite(array $db): PDO
    {
        return new PDO("sqlite:{$db['dbName']}");
    }
}