<?php

declare(strict_types=1);

interface DatabaseConnectionInterface
{
    public function ambilSatu(string $sql, array $params = []): ?array;

    public function jalankan(string $sql, array $params = []): void;
}
