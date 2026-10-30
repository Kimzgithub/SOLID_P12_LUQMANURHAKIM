<?php

declare(strict_types=1);

class FakeDatabaseConnection implements DatabaseConnectionInterface
{
    private array $buku = [
        1 => ['id' => 1, 'judul' => 'Pemrograman Berorientasi Objek', 'jenis' => 'umum'],
        2 => ['id' => 2, 'judul' => 'Ensiklopedia Indonesia', 'jenis' => 'referensi'],
    ];

    private array $anggota = [
        1 => ['id' => 1, 'email' => 'mahasiswa@untan.ac.id'],
        2 => ['id' => 2, 'email' => 'dosen@untan.ac.id'],
    ];

    private array $peminjaman = [];

    public function ambilSatu(string $sql, array $params = []): ?array
    {
        $id = (int) ($params[0] ?? 0);

        if (str_contains($sql, 'FROM buku')) {
            return $this->buku[$id] ?? null;
        }

        if (str_contains($sql, 'FROM anggota')) {
            return $this->anggota[$id] ?? null;
        }

        return null;
    }

    public function jalankan(string $sql, array $params = []): void
    {
        if (str_contains($sql, 'INSERT INTO peminjaman')) {
            $this->peminjaman[] = $params;
        }
    }

    public function getJumlahPeminjaman(): int
    {
        return count($this->peminjaman);
    }
}
