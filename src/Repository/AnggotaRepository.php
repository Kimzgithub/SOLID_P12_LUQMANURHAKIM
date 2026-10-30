<?php

declare(strict_types=1);

class AnggotaRepository
{
    public function __construct(private DatabaseConnectionInterface $db)
    {
    }

    public function cariEmail(int $idAnggota): string
    {
        $row = $this->db->ambilSatu('SELECT email FROM anggota WHERE id = ?', [$idAnggota]);

        if ($row === null) {
            throw new RuntimeException("Anggota dengan id $idAnggota tidak ditemukan");
        }

        return $row['email'];
    }
}
