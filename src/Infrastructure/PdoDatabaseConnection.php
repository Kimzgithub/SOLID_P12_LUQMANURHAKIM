<?php

declare(strict_types=1);

class PdoDatabaseConnection implements DatabaseConnectionInterface
{
    public function __construct(private PDO $pdo)
    {
    }

    public function ambilSatu(string $sql, array $params = []): ?array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $hasil = $stmt->fetch(PDO::FETCH_ASSOC);

        return $hasil === false ? null : $hasil;
    }

    public function jalankan(string $sql, array $params = []): void
    {
        $this->pdo->prepare($sql)->execute($params);
    }
}
