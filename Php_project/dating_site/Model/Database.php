<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

abstract class Database
{
    const SERVER = "localhost";
    const DATABASE = "project";
    const USERNAME = "project";
    const PASSWORD = "project";
    const CONNECTION_STRING = "mysql:host=" . Database::SERVER . ";dbname=" . self::DATABASE;
    private PDO $_connection;

    public function __construct()
    {
        try {
            $this->_connection = new PDO(self::CONNECTION_STRING, self::USERNAME, self::PASSWORD);
            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection Failed: {$exception->getMessage()}";
            die("Connection to DB Failed");
        }
    }

    protected function execute(string $query): array|false
    {
        $stmt = $this->_connection->prepare($query);
        $stmt->execute($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    protected function registerUser(string $query,  array $userDetails): array|false
    {
        $stmt = $this->_connection->prepare($query);
        $stmt->execute($userDetails);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    protected function message(string $query, array $sendMessage): array|false
    {
        $stmt = $this->_connection->prepare($query);
        $stmt->execute($sendMessage);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
}