<?php

declare(strict_types=1);

class BukuRepository
{
    public function __construct(private DatabaseConnectionInterface $db)
    {
    }

    public function cari(int $id): Buku
    {
        $row = $this->db->ambilSatu('SELECT * FROM buku WHERE id = ?', [$id]);

        if ($row === null) {
            throw new RuntimeException("Buku dengan id $id tidak ditemukan");
        }

        return $row['jenis'] === 'referensi'
            ? new BukuReferensi($row['judul'])
            : new BukuUmum($row['judul']);
    }
}
