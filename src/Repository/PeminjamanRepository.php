<?php

declare(strict_types=1);

class PeminjamanRepository
{
    public function __construct(private DatabaseConnectionInterface $db)
    {
    }

    public function simpan(int $idBuku, int $idAnggota, int $lamaPinjamHari): void
    {
        $this->db->jalankan(
            'INSERT INTO peminjaman (id_buku, id_anggota, tgl_pinjam, tgl_kembali)
             VALUES (?, ?, NOW(), DATE_ADD(NOW(), INTERVAL ? DAY))',
            [$idBuku, $idAnggota, $lamaPinjamHari]
        );
    }
}
