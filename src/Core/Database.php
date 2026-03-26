<?php

namespace App\Core;

class Database {

    private string $dbName = 'collectoverse';
    private string $dbHost = 'dev.syhtam.com';
    private string $dbPort = '44026';
    private string $dbUsername = 'collecto';
    private string $dbPassword = 'collecto2026';

    private ?\PDO $pdo = null;

    private function getDsn(): string {
        return "mysql:host={$this->dbHost};port={$this->dbPort};dbname={$this->dbName}";
    }

    private function notFoundPDO() {
        throw new \Exception('Error: Execute SQL request without PDO');
    }

    public function connect(): void {
        try {
            $this->pdo = new \PDO(
                $this->getDsn(),
                $this->dbUsername,
                $this->dbPassword,
                [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                ]
            );
        } catch (\PDOException $err) {
            throw new \Exception('Error connection database: ' . $err->getMessage());
        }
    }

    public function exec(string $query, array $params = []): void {
        if ($this->pdo) {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
        } else {
            $this->notFoundPDO();
        }
    }

    public function getRow(string $query, array $params = []): ?array {
        if ($this->pdo) {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch() ?: null;
        } else {
            $this->notFoundPDO();
        }
    }

    public function getRows(string $query, array $params = []): array {
        if ($this->pdo) {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } else {
            $this->notFoundPDO();
        }
    }
}

?>