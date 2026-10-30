<?php

declare(strict_types=1);

class PerpustakaanService
{
    public function __construct(
        private BukuRepository $bukuRepo,
        private AnggotaRepository $anggotaRepo,
        private PeminjamanRepository $peminjamanRepo,
        private AturanAnggotaFactory $aturanFactory,
        private MailerInterface $mailer,
        private StrukPrinter $printer
    ) {
    }

    public function prosesPeminjaman(int $idBuku, int $idAnggota, string $tipe): void
    {
        $aturan = $this->aturanFactory->buat($tipe);
        $buku = $this->bukuRepo->cari($idBuku);

        if (!$buku instanceof DapatDipinjam) {
            throw new DomainException('Buku referensi tidak bisa dipinjam');
        }

        $this->peminjamanRepo->simpan($idBuku, $idAnggota, $aturan->lamaPinjam());

        $this->mailer->kirim(
            $this->anggotaRepo->cariEmail($idAnggota),
            'Konfirmasi Peminjaman',
            'Buku berhasil dipinjam'
        );

        $this->printer->cetak($buku->getJudul(), $aturan);
    }
}
